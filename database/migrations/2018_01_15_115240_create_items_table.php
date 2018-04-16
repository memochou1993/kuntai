<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->integer('year')->unsigned()->nullable();
            $table->string('first_genre')->nullable();
            $table->string('second_genre')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('maker')->nullable();
            $table->string('brand')->nullable();
            $table->integer('capacity')->unsigned()->nullable();
            $table->decimal('abv', 3, 1)->nullable();
            $table->integer('price')->unsigned()->nullable();
            $table->float('discount')->default(1)->nullable();
            $table->string('first_unit')->nullable();
            $table->string('second_unit')->nullable();
            $table->string('barcode');
            $table->text('description')->nullable();
            $table->text('full_text')->nullable();
            $table->integer('views')->default(0);
            $table->string('editor')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
