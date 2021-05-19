<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CalculatorMail extends Mailable
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
    public function build(): CalculatorMail
    {
        return $this->from(env('MAIL_USERNAME'))
            ->subject('Цветочный калькулятор')
            ->view('mail.calculator');
    }
}
