<?php

namespace App\Listeners;

use App\Events\NewUserWelcomeEvent;
use App\Jobs\SendEmailToNewUser;
use App\Mail\NewUserWelcome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NewUserWelcomeListener implements ShouldQueue
{

    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'redis';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\NewUserWelcomeEvent $event
     * @return void
     */
    public function handle(NewUserWelcomeEvent $event)
    {
        Mail::to($event->user->email)->send(new NewUserWelcome($event->user, $event->pass));
    }
}
