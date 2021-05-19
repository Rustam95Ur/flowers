<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckoutForm;

//use App\Mail\PaymentMail;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use mysql_xdevapi\Session;

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
        $products = '';
        foreach ($session_items as $item) {
            $product = Product::where('id', '=', $item['product_id'])->first();
            if ($product) {
                $products .= $product->title . ' x ' . $item['qty'] . ' штук. ';
                $total_price += $product->price * $item['qty'];
            }

        }
        if ($total_price < 100) {
            return back()->with('error', 'cart.checkout.min_price_error');
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
//            $paymentSave->request = $query;
            $paymentSave->payment_type = trans('cart.checkout.payment.' . $payment_type, [], 'ru');
            $paymentSave->save();
//            return redirect()->to($link);

        } elseif ($payment_type === 'offline') {
            $paymentSave->status = 'В ожиданий';
            $paymentSave->payment_type = trans('cart.checkout.payment.' . $payment_type, [], 'ru');
            $paymentSave->save();
            session()->forget('cart');
//            $this->sendMail($full_name, $email, $phone, $total_price, $products, trans('checkout.' . $shipping_type, [], 'ru'), trans('checkout.payment.' . $payment_type, [], 'ru'), $address);
            return redirect()->route('cart')->with('success', trans('cart.checkout.success-offline'));
        }
        return back()->with('error', trans('cart.checkout.error'));
    }

    /**
     * @param $id
     */
    public function success($id)
    {
        $updateStatus = Payment::where('id', '=', $id)->update(['status' => 'Пользователь оплатил']);
        $paymentInfo = Payment::where('id', '=', $id)->first();
        $address = [];
        if ($paymentInfo->shipping_type == trans('checkout.exline')) {
            $address = [
                'city' => $paymentInfo->city,
                'street' => $paymentInfo->street,
                'tariff' => $paymentInfo->tariff
            ];
        }
        session()->forget('cart');
        $this->sendMail($paymentInfo->full_name, $paymentInfo->email, $paymentInfo->user_phone, $paymentInfo->total, $paymentInfo->products, $paymentInfo->shipping_type, $paymentInfo->payment_type, $address);
        return redirect()->route('cart')->with('success', trans('checkout.success-offline'));
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function error($id)
    {
        $updateStatus = Payment::where('id', '=', $id)->update(['status' => 'Отмена платежа']);
        return redirect()->route('cart')->with('success', trans('checkout.error'));
    }


    /**
     * @param $user_full_name
     * @param $user_email
     * @param $user_phone
     * @param $price
     * @param $products
     * @param $shipping_type
     * @param $payment_type
     * @param null $address
     * @return RedirectResponse
     */
    protected function sendMail($user_full_name, $user_email, $user_phone, $price, $products, $shipping_type, $payment_type, $address = null)
    {
        $requestForm = new \stdClass();
        $requestForm->full_name = $user_full_name;
        $requestForm->email = $user_email;
        $requestForm->phone = $user_phone;
        $requestForm->price = $price;
        $requestForm->products = $products;
        $requestForm->shipping_type = $shipping_type;
        $requestForm->payment_type = $payment_type;
        if (count($address) > 0) {
            $requestForm->city = $address['city'];
            $requestForm->street = $address['street'];
            $requestForm->tariff = $address['tariff'];
        }
//        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new PaymentMail($requestForm));
        return redirect()->back()->with('success', trans('request.send-success'));
    }
}
