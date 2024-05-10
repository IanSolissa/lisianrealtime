<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageChannel implements ShouldBroadcast
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(): array|bool
    {
    return true;
    }
    public function broadcastOn(): Channel  
{
    return new Channel('Josh');
}
    public function broadcastWith(): array  
{
    return [
    'id' =>1,
    'name'=>"yosua",
    'status'=>true,
];
}
}
