<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemElementsTable extends Migration
{
    public function up()
    {
        Schema::create('item_elements', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('type');
            $table->string('name');
            $table->integer('order')->default(0)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_elements');
    }
}
