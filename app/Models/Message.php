<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Message extends Model
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
    public function penerima(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class,'penerima_id');
    }

    public function contact():HasMany
    {
        return $this->hasMany(Contact::class,'id');
    }

}
