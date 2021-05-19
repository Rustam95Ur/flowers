<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;


    public $mail;

    /**
     * Create a new message instance.
     *
     * @param $mail
     */
    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): PaymentMail
    {
        return $this->from(env('MAIL_USERNAME'))
            ->subject('Покупка с магазина')
            ->view('mail.payment');
    }
}
