<?php

namespace App\Models;

use App\Models\Grup;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Anggota_Grup;
use App\Models\Message_Grup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Model
{
    use HasFactory;

    protected $guarded=[''];

    

    public function message(): HasMany
    {
        return $this->HasMany(Message::class,'id');
    }

    public function message_grup(): HasMany
    {
        return $this->HasMany(Message_Grup::class,'id');
    }

    public function contact():HasMany
    {
        return $this->HasMany(Contact::class,'id_kontak');
    }

    public function profile():HasMany
    {
        return $this->HasMany(Contact::class);
    }

    public function anggota_grup(): HasMany
    {
        return $this->HasMany(Anggota_Grup::class, 'id_user' );
    }
    
    public function owner_grup():HasMany
    {
        return $this->HasMany(Grup::class,'owner' );
    }

    // public function canJoinRoom($roomid){
    //     $granted=false;

    //     $room=RoomChat::findOrFail($roomid);
    //     $users=explode(":",$room->users);
    //     foreach ($users as $id){
    //         if($this->id==$id){
    //             $granted=true;
    //         }
    //     }
    //     return $granted;
    // public function canJoinRoom($penerimaid){
    //     $granted=false;

    //     $room=Message::findOrFail($penerimaid);
    //     $users=explode(":",$room->users);
    //     foreach ($users as $id){
    //         if($this->id==$id){
    //             $granted=true;
    //         }
    //     }
    //     return $granted;
    // }
}
