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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            
            $table->unsignedBigInteger('id_kontak');
            $table->foreign('id_kontak')->references('id')->on('penggunas');

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('penggunas');
            
            $table->unsignedBigInteger('last_messages')->nullable();
            $table->foreign('last_messages')->references('id')->on('messages');
            
            $table->boolean('anonymouse')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
