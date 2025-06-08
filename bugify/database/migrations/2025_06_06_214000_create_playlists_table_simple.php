<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTableSimple extends Migration
{
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->json('music')->nullable(); // JSON met muziek ID's of info
            $table->integer('total_duration')->default(0); // totale tijd in seconden
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('playlists');
    }
}
