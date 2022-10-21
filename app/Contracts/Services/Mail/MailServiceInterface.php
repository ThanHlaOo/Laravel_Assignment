<?php

namespace App\Contracts\Services\Mail;

interface MailServiceInterface
{
    /**
     * Send Mail
     *
     * @return void
     */
    public function sendMail(string $email, object $mail);
  
}
