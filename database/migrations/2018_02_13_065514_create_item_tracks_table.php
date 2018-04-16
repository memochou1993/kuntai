<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTracksTable extends Migration
{
    public function up()
    {
        Schema::create('item_tracks', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('type');
            $table->string('guest_token');
            $table->string('content');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_tracks');
    }
}
