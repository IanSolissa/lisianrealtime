<?php

use App\Broadcasting\MessageChannel;
use App\Events\SendMessage;
use App\Models\Message;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Broadcast;
use App\Models\User;
 


Broadcast::channel('user', function () {
    // $id_pengirim=Message::where('user_id',auth()->user()->id)->latest('user_id')->value('user_id');  
    
    // if(auth()->user()->id!=$id_pengirim){
    //     return false;
    // }
    // else{return true;}
    return true;
});