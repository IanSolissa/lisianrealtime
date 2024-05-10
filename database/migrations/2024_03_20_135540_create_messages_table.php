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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('penggunas');
            $table->unsignedBigInteger('penerima_id');
            $table->foreign('penerima_id')->references('id')->on('penggunas');
            $table->boolean('anonymous')->default(false);
            $table->string('path_file')->nullable();
            $table->boolean('isfile')->default(false);
       
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
