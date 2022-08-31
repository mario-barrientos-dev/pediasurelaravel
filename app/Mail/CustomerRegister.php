<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Customer;

class CustomerRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user instance.
     *
     * @var Customer
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $user)
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
        return $this->subject('Bienvenido!')->view('emails.auth.register')
            ->with([
                'name' => $this->user->name . ' ' . $this->user->last_name,
                'url' => url('/'),
            ]);
    }
}
