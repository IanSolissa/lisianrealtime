<?php

namespace App\Models;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message_Grup extends Model
{
    protected $guarded=[''];   
    
    // public function roomchat(): BelongsTo
    // {
    //     return $this->belongsTo(RoomChat::class,'room_id');
    // }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class,'user_id');
    }
    

    
}
