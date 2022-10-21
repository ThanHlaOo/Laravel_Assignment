<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * User Collection
     *
     * @param Collection $user
     */
    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@admin.com')
        ->markdown('emails/auth/register')
        ->with('user', $this->user);
    }
}
