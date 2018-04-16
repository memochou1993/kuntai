<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemAssociationsTable extends Migration
{
    public function up()
    {
        Schema::create('item_associations', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('first_item');
            $table->integer('second_item');
            $table->integer('degree')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_associations');
    }
}
