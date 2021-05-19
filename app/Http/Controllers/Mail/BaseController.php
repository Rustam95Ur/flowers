<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMailForm;
use App\Mail\ContactMail;
use App\Mail\PaymentMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;


class BaseController extends Controller
{
    /**
     * @param StoreMailForm $request
     * @return RedirectResponse
     */
    public function contact_message_send(StoreMailForm $request): RedirectResponse
    {
        $mailForm = new \stdClass();
        $mailForm->name = $request['name'];
        $mailForm->subject = $request['subject'];
        $mailForm->email = $request['email'];
        $mailForm->message = $request['message'];
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($mailForm));

        return redirect()->back()->with('success', trans('mail.contact-success'));
    }


    public function payment_send_mail($request_data, $total_price, $products): RedirectResponse
    {
        $requestForm = new \stdClass();
        $requestForm->customer_name = $request_data['customer_name'];
        $requestForm->customer_phone = $request_data['customer_phone'];
        $requestForm->customer_email = $request_data['customer_email'];
        $requestForm->receiver_name = $request_data['receiver_name'];
        $requestForm->receiver_phone = $request_data['receiver_phone'];
        $requestForm->address = $request_data['address'];
        $requestForm->date = $request_data['date'];
        $requestForm->time = $request_data['time'];
        $requestForm->shipping_type = $request_data['shipping_type'];
        $requestForm->add_photo = $request_data['photo'] == 'on' ? 'Да' : 'Нет';
        $requestForm->surprise = $request_data['surprise'] == 'on' ? 'Да' : 'Нет';
        $requestForm->total = $total_price;
        $requestForm->products = $products;
        $payment_type = $request_data['payment_type'];
        $requestForm->payment_type = trans('cart.checkout.payment.' . $payment_type, [], 'ru');
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new PaymentMail($requestForm));
        return redirect()->back()->with('success', trans('mail.payment-success'));
    }

}
