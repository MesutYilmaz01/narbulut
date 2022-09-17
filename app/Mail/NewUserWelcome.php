<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserWelcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    private User $user;

    /**
     * @var string
     */
    private string $pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = ['user'=>$this->user, 'pass' => $this->pass];
        return $this->from('mesutyilmaz@example.com')
                ->subject('Hoşgeldiniz!')
                ->view('email.userWelcome', $data);
    }
}
