<?php

namespace App\Services\Mail;

use App\Contracts\Services\Mail\MailServiceInterface;
use Illuminate\Support\Facades\Mail;

//MajorService Class
class MailService implements MailServiceInterface
{

    /**
     * MailService Constructor
     *
     * @param MajorDaoInterface $majorDao
     */
    public function __construct()
    {
        
    }
    /**
     * Send Mail 
     *
     * @return void
     */
    public function sendMail(string $email,object $mail) {
        Mail::to($email)->send($mail);
    }
}
