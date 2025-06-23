<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistMusicTable extends Migration
{
    public function up()
    {
        Schema::create('playlist_music', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->constrained()->onDelete('cascade');
            $table->foreignId('music_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['playlist_id', 'music_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('playlist_music');
    }
}
