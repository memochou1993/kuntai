<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTagsTable extends Migration
{
    public function up()
    {
        Schema::create('item_tags', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('name');
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_tags');
    }
}
