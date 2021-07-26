<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\LeaveApproval;
use App\Models\LeaveRequest;


class LeaveApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $leaveApproval;
    public $leaveRequest;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($leaveApproval ,$leaveRequest)
    {
        $this->leaveApproval = $leaveApproval;
        $this->leaveRequest = $leaveRequest;
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
