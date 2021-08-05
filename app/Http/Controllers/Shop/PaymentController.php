<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckoutForm;
use App\Http\Controllers\Mail\BaseController as MailBaseController;
use App\Models\City;
use App\Models\Currency;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\RedirectResponse;
use TCG\Voyager\Facades\Voyager;

class PaymentController extends Controller
{
    /**
     * @param StoreCheckoutForm $request
     * @return RedirectResponse
     */
    public function index(StoreCheckoutForm $request): RedirectResponse
    {
        $currency = new Currency();
        $currency_value = $currency->get_currency_value(session()->get('currency', env('MAIN_CURRENCY_CODE')));
        $currency_title = $currency->get_currency_title(session()->get('currency', env('MAIN_CURRENCY_CODE')));
        $total_price = 0;
        $products = '';
        $products_info = [];
        $city_and_price_info = [];
        if( $request['product_pay_type'] == 'one_product') {
            $session_one_product = session()->get('one_product');
            $product_session = $session_one_product['products'];
            for ($i=0; $i < count($product_session); $i++) {
                $product = Product::where('id', '=', $product_session[$i]['id'])->first();
                if ($product) {
                    $price = $product->updated_price * $currency_value;
                    $products .= $product->title . ' x ' . $product_session[$i]['qty'] . ' штук. ';
                    $total_price += $price * $product_session[$i]['qty'];
                }
            }
            array_push($products_info, $product_session);
        } else {
            $session_items = session()->get('cart');
            $size_items = session()->get('size_cart');
            if ($session_items) {
                for ($i=0; $i < count($session_items); $i++) {
                    $product = Product::where('id', '=', $session_items[$i]['product_id'])->first();
                    if ($product) {
                        $price = $product->updated_price * $currency_value;
                        $products .= $product->title . ' x ' . $session_items[$i]['qty'] . ' штук. ';
                        $total_price += $price * $session_items[$i]['qty'];
                        $session_items[$i]['price'] = $product->updated_price;
                    }

                }

                array_push($products_info, $session_items);
            }
            if ($size_items) {
                for ($i=0; $i < count($size_items); $i++) {
                    $product = Product::where('id', '=', $size_items[$i]['product_id'])->first();
                    if ($product) {
                        $size_title = ' ';
                        if (isset($size_items[$i]['sizes'])) {
                            $size_info = Size::find($size_items[$i]['sizes']['id']);
                            $size_title = ' (' . $size_info->title . ') ';
                        }
                        $price = $product->updated_price;
                        $products .= $product->title . $size_title . ' x ' . $size_items[$i]['qty'] . ' штук.';
                        $total_price += $price * $size_items[$i]['qty'];
                        $session_items[$i]['price'] = $product->updated_price;
                    }
                }
                array_push($products_info, $size_items);
            }
        }
        $city_title = 'Не выбрано';
        $city_info = ['city_id' => null, 'city_title' => $city_title];
        if (session('city')) {
            $city = City::find(session('city'));
            $city_info = ['city_id' => $city->id, 'city_title' => $city->title];
            $city_title = $city->title;
        }
        $products .= 'Город: ' . $city_title . ' ';
        $city_and_price_info += ['city_info' => $city_info];
        if (Voyager::setting('site.price_update')) {
            $products .= 'Изменённая цена на: ' . Voyager::setting('site.price_update') . '%';
            $city_and_price_info += ['price_update_val' => Voyager::setting('site.price_update')];
        }
        if ($total_price < (100 * $currency_value)) {
            return back()->with('error', trans('cart.checkout.min_price_error', ['min_price'=> 100 * $currency_value]));
        }
        // Добавить информацию о валюте
        $save_request = ['products'=> $products_info[0], 'info'=> $city_and_price_info];
        $paymentSave = new Payment();
        $paymentSave->customer_name = $request['customer_name'];
        $paymentSave->customer_phone = $request['customer_phone'];
        $paymentSave->customer_email = $request['customer_email'];
        $paymentSave->receiver_name = $request['receiver_name'];
        $paymentSave->receiver_phone = $request['receiver_phone'];
        $paymentSave->address = $request['address'];
        $paymentSave->date = $request['date'];
        $paymentSave->time = $request['time'];
        $paymentSave->payment_type = $request['payment_type'];
        $paymentSave->shipping_type = $request['shipping_type'];
        $paymentSave->add_photo = $request['photo'] == 'on' ? 1 : 0;
        $paymentSave->surprise = $request['surprise'] == 'on' ? 1 : 0;
        $paymentSave->total = $total_price;
        $paymentSave->request = json_encode($save_request);
        $paymentSave->products = $products;
        $paymentSave->comment = $request['comment'];
        $paymentSave->currency = $currency_title;
        $paymentSave->currency_value = $currency_value;
        $payment_type = $request['payment_type'];
        if ($payment_type === 'online') {

            $paymentSave->status = Payment::STATUS_WAIT;
            $order_id = Payment::orderBy('id', 'DESC')->first();
            $order_id = (!isset($orderId->payment_id)) ? $order_id->id + 1 : 1;
            $salt = uniqid(mt_rand(), true);
            $payment_request = [
                'pg_merchant_id' => env('PAYBOX_MERCHANT_ID'),
                'pg_amount' => $total_price,
                'pg_salt' => $salt,
                'pg_currency' => session()->get('currency', env('MAIN_CURRENCY_CODE')),
                'pg_testing_mode' => env('PAYBOX_TEST_MODE'),
                'pg_order_id' => $order_id,
                'pg_user_phone' => $request['customer_phone'],
                'pg_description' => 'Покупка с магазина',
                'pg_success_url' => route('payment-success', ['payment_id' => $order_id]),
                'pg_failure_url' => route('payment-error', ['payment_id' => $order_id])
            ];
            ksort($payment_request);
            array_unshift($payment_request, 'payment.php');
            array_push($payment_request, env('PAYBOX_SECRET_KEY'));
            $payment_request['pg_sig'] = md5(implode(';', $payment_request));
            unset($payment_request[0], $payment_request[1]);
            $query = http_build_query($payment_request);
            $link = 'https://api.paybox.money/payment.php?' . $query;
            $paymentSave->payment_request = $query;
            $paymentSave->status = Payment::STATUS_WAIT;
            $paymentSave->payment_type = $payment_type;
            $paymentSave->save();
            return redirect()->to($link);

        } elseif ($payment_type === 'offline') {
            $paymentSave->status = Payment::STATUS_WAIT;
            $paymentSave->payment_type = $payment_type;
            $paymentSave->save();
            session()->forget('cart');
            session()->forget('one_product');

            MailBaseController::payment_send_mail($request, $total_price, $products);
            return redirect()->route('cart')->with('success', trans('cart.checkout.success-offline'));
        }

        return back()->with('error', trans('cart.checkout.error'));
    }

    /**
     * @param $payment_id
     * @return RedirectResponse
     */
    public function success($payment_id): RedirectResponse
    {
        $payment = Payment::where('id', $payment_id)->firstOrFail();
        $payment->status = Payment::STATUS_PAID;
        $payment->save();
        session()->forget('cart');
        session()->forget('one_product');
        $send_request = [
          'customer_name'  => $payment->customer_name,
          'customer_phone'  => $payment->customer_phone,
          'customer_email'  => $payment->customer_email,
          'receiver_name'  => $payment->receiver_name,
          'receiver_phone'  => $payment->receiver_phone,
          'shipping_type'  => $payment->shipping_type,
          'payment_type'  => $payment->payment_type,
          'address'  => $payment->address,
          'date'  => $payment->date,
          'time'  => $payment->time,
          'photo'  => $payment->photo,
          'surprise'  => $payment->surprise,
          'currency'  => $payment->currency,
          'currency_value'  => $payment->currency_value,
        ];
        MailBaseController::payment_send_mail($send_request, $payment->total, $payment->products);
        return redirect()->route('cart')->with('success', trans('cart.checkout.success-online'));
    }

    /**
     * @param $payment_id
     * @return RedirectResponse
     */
    public function error($payment_id): RedirectResponse
    {
        Payment::where('id', '=', $payment_id)->update(['status' => Payment::STATUS_CANCELED]);
        return redirect()->route('cart')->with('success', trans('cart.checkout.error'));
    }

}
