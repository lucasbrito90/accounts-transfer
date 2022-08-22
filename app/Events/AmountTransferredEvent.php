<?php

namespace App\Events;

use App\Models\Customer;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AmountTransferredEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $source;
    public $target;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Customer $source, Customer $target)
    {
        $this->source = $source;
        $this->target = $target;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
