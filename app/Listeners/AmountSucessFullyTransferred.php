<?php

namespace App\Listeners;

use App\Events\AmountTransferredEvent;
use App\Notifications\AmountSucessFullyTransferred as SucessFullyTransferredNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AmountSucessFullyTransferred
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
        $event->source->notify(new SucessFullyTransferredNotification($event->source));
    }
}
