<?php

namespace App\Models;

use App\Models\Pengguna;
use App\Models\Anggota_Grup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Grup extends Model
{
    use HasFactory;
    protected $guarded=[''];

    /**
     * The roles that belong to the Anggota_Grup
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function anggota_grup():HasMany
    {
        return $this->HasMany(Anggota_Grup::class,'id_grup' );
    }
    
    public function pemilik():BelongsTo
    {
        return $this->BelongsTo(Pengguna::class,'owner' );
    }
    

}
