<?php

namespace App\Listeners;

use App\Events\ForbiddenTranferEvent;
use App\Notifications\ForbiddenTransferNotify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ForbiddenCustomerTransferListener
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
     * @param  \App\Events\ForbiddenTranferEvent  $event
     * @return void
     */
    public function handle(ForbiddenTranferEvent $event)
    {
        $event->customer->notify(new ForbiddenTransferNotify($event->customer));
    }
}
