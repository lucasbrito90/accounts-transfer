<?php

namespace App\Listeners;

use App\Events\NoBalanceEnoughEvent;
use App\Notifications\NoBalanceEnough;

class SendEmailNoBalanceEnough
{
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
     * @param  \App\Events\NoBalanceEnoughEvent  $event
     * @return void
     */
    public function handle(NoBalanceEnoughEvent $event)
    {
        $event->wallet->customer->notify(new NoBalanceEnough($event->wallet->customer));
    }
}
