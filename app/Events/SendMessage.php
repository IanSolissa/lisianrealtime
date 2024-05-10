<?php

namespace App\Events;

use App\Models\Contact;
use App\Models\Message;
use App\Models\Pengguna;
use Illuminate\Broadcasting\InteractsWithSocketstoOthers;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\InteractsWithBroadcasting;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Http\Request;
use Laravel\Reverb\Protocols\Pusher\Channels\PrivateChannel as ChannelsPrivateChannel;
use PhpParser\Node\Stmt\Echo_;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $message;
    // public function __construct(public string $authuser,public string $penerima,public string $pesan,public Pengguna $pengguna ,public $number)  
    public function __construct(string $userId,string $message)  
    {
        
$this->$userId=$userId;
$this->message=$message;
// $this->$authuser=$authuser;
// // dd($this->$authuser);
// $this->penerima=$penerima;
// // dd($this->penerima);
// $this->pesan=$pesan;
// // dd($this->pesan);
$this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn():array   
    {

        return [
            new PrivateChannel('user'),
        ];
    }
  
    public function broadcastWith(): array  
{
    // $pesanTerakhir=Message::where('penerima_id',$this->penerima)->where('user_id',$this->authuser)->orWhere('penerima_id',$this->authuser)->where('user_id',$this->penerima)->latest('id')->value('message');
    return [
        
        // 'number'=>$this->number,
        // 'user_id'=>$this->authuser,
        // 'penerima_id'=>$this->penerima,
        // 'message'=>$this->pesan,
        // 'BroadcastPesan'=>$pesanTerakhir,
        'BroadcastPesan'=>$this->message,

    ];
}

    public function broadcastAs():string
    {
        return 'roomchat';
    }
        // public function join(): bool
        // {
        //     return true;
            
        // }
}
