<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->dropColumn('music');
        });
    }

    public function down()
    {
        Schema::table('playlists', function (Blueprint $table) {
            $table->json('music')->nullable();
        });
    }
};
