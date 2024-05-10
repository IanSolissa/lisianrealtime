<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RoomChat extends Model
{
    use HasFactory;
    protected $guarded=[''];
    
    // public function message(): HasOne
    // {
    //     return $this->hasOne(Message::class,'id');
    // }
}
