<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Testingevent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    // public function __construct(public User $user)
    public function __construct($pesan)
    {
        return $this->message=$pesan;
    //  $this->name="Ian Solissa";
    //  return $this->message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        // return [
        //     new Channel('User.'. $this->user->id),
        // ];
        return [
            new Channel('testing-chanel'),
        ];
    }
    public function broadcastAs(): string
{
    return 'Testingevent2';
}
public function broadcastWith(){

    return[
        'data'=>$this->message,
    ];

}
}
