<?php

namespace App\Listeners;

use App\Events\AmountTransferredEvent;
use App\Notifications\AmountSucessFullyReceived as SucessFullyReceivedNotification;
use App\Notifications\AmountSucessFullyTransferred as AmountSucessFullyTransferredNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AmountSucessFullyReceived
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
     * @param  \App\Events\AmountTransferredEvent  $event
     * @return void
     */
    public function handle(AmountTransferredEvent $event)
    {
        $event->target->notify(new SucessFullyReceivedNotification($event->target));
    }
}
