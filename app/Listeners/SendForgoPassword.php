<?php

namespace App\Listeners;

use App\Events\ForgotPassword;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendForgoPassword
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(
        public readonly User $user
    )
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ForgotPassword $event
     * @return void
     */
    public function handle(ForgotPassword $event)
    {
        $event->user->notify(new \App\Notifications\ForgotPassword($event->user,$event->password));
    }
}
