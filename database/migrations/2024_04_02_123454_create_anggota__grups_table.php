<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota__grups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_grup");
            $table->foreign("id_grup")->references("id")->on("grups");
            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")->references("id")->on("penggunas");
            $table->boolean('admin')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota__grups');
    }
};
