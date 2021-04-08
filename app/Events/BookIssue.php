<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\BookIssued;
use App\Models\BookRequest;

class BookIssue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bookIssued;
    public $bookRequest;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($bookIssued ,$bookRequest)
    {
        $this->bookIssued = $bookIssued;
        $this->bookRequest = $bookRequest;
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
