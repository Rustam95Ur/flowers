<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckoutForm;
use App\Http\Controllers\Mail\BaseController as MailBaseController;
use App\Models\City;
use App\Models\Payment;
use App\Models\Product;
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
        $total_price = 0;
        $session_items = session()->get('cart');
        if (!$session_items) {
            return redirect()->route('cart');
        }
        $products = '';
        foreach ($session_items as $item) {
            $product = Product::where('id', '=', $item['product_id'])->first();
            if ($product) {
                $price = $product->updated_price;
                $products .= $product->title . ' x ' . $item['qty'] . ' штук. ';
                $total_price += $price * $item['qty'];
            }

        }
        $city_title = 'Не выбрано';
        $city_info = ['city_id' => null, 'city_title' => $city_title];
        if (session('city')) {
            $city = City::find(session('city'));
            $city_info = ['city_id' => $city->id, 'city_title' => $city->title];
            $city_title = $city->title;
        }
        $products .= 'Город: ' . $city_title. ' ';
        array_push($session_items, $city_info);
        if (Voyager::setting('site.price_update')) {
            $products .= 'Измененая цена на: ' . Voyager::setting('site.price_update'). '%';
            array_push($session_items, ['price_update_val' => Voyager::setting('site.price_update')]);
        }
        if ($total_price < 100) {
            return back()->with('error', trans('cart.checkout.min_price_error'));
        }
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
        $paymentSave->request = json_encode($session_items);
        $paymentSave->products = $products;
        $payment_type = $request['payment_type'];
        if ($payment_type === 'online') {

//            $paymentSave->status = 'В ожиданий';
//            $order_id = Payment::orderBy('id', 'DESC')->first();
//            $order_id = (!isset($orderId->payment_id)) ? $order_id->id + 1 : 1;
//            $salt = uniqid(mt_rand(), true);
//            $payment_request = [
//                'pg_merchant_id' => env('PAYBOX_MERCHANT_ID'),
//                'pg_amount' => $total_price,
//                'pg_salt' => $salt,
//                'pg_testing_mode' => env('PAYBOX_TEST_MODE'),
//                'pg_order_id' => $order_id,
//                'pg_user_phone' => $request['customer_phone'],
//                'pg_description' => 'Покупка с магазина',
//                'pg_success_url' => route('payment-success', ['id' => $order_id]),
//                'pg_failure_url' => route('payment-error', ['id' => $order_id])
//            ];
//            ksort($payment_request);
//            array_unshift($payment_request, 'payment.php');
//            array_push($payment_request, env('PAYBOX_SECRET_KEY'));
//            $payment_request['pg_sig'] = md5(implode(';', $payment_request));
//            unset($payment_request[0], $payment_request[1]);
//            $query = http_build_query($payment_request);
//            $link = 'https://api.paybox.money/payment.php?' . $query;
//            $paymentSave->payment_request = $query;
            $paymentSave->status = 'В ожиданий';
            $paymentSave->payment_type = trans('cart.checkout.payment.' . $payment_type, [], 'ru');
            $paymentSave->save();
//            return redirect()->to($link);

        } elseif ($payment_type === 'offline') {
            $paymentSave->status = 'В ожиданий';
            $paymentSave->payment_type = trans('cart.checkout.payment.' . $payment_type, [], 'ru');
            $paymentSave->save();
            session()->forget('cart');

            MailBaseController::payment_send_mail($request, $total_price, $products);
            return redirect()->route('cart')->with('success', trans('cart.checkout.success-offline'));
        }

        return back()->with('error', trans('cart.checkout.error'));
    }

    /**
     * @param $id
     */
    public function success($id): RedirectResponse
    {
        Payment::where('id', '=', $id)->update(['status' => 'Пользователь оплатил']);
        $paymentInfo = Payment::where('id', '=', $id)->first();
        session()->forget('cart');
//        $this->sendMail($paymentInfo->full_name, $paymentInfo->email, $paymentInfo->user_phone, $paymentInfo->total, $paymentInfo->products, $paymentInfo->shipping_type, $paymentInfo->payment_type, $address);
        return redirect()->route('cart')->with('success', trans('checkout.success-offline'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function error($id): RedirectResponse
    {
        Payment::where('id', '=', $id)->update(['status' => 'Отмена платежа']);
        return redirect()->route('cart')->with('success', trans('checkout.error'));
    }

}
