<?php

namespace App\Models;

use App\Models\Grup;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Anggota_Grup extends Model
{
    
    protected $guarded=[''];

    /**
     * The roles that belong to the Anggota_Grup
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function grup(): BelongsTo
    {
        return $this->belongsTo(Grup::class, 'id_grup' );
    }
    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_user' );
    }

}
