<?php

namespace App\Models;

use App\Models\Message;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;

class Contact extends Model
{
    use HasFactory;
    protected $guarded=[''];

    public function pengguna():BelongsTo
    {
        return $this->BelongsTo(Pengguna::class,'id_kontak');
    }

    public function profile():BelongsTo
    {
        return $this->BelongsTo(Pengguna::class,'id_user');
    }

    public function message():BelongsTo
    {
        return $this->BelongsTo(Message::class,'last_messages');
    }

    


    
}
