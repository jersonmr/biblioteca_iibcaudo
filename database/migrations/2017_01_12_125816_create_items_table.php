<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->string('title', 255);
            $table->string('author', 255);
            $table->mediumText('abstract');
            $table->string('keywords', 255);
            $table->string('editorial', 50);
            $table->string('collection', 20);
            $table->string('isbn', 50);
            $table->string('issn', 50);
            $table->string('pages', 20);
            $table->string('volume', 20);
            $table->integer('pub_year');
            $table->string('filename', 255);

            $table->integer('user_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->integer('subarea_id')->unsigned();

            $table->foreign('subarea_id')->references('subarea_id')->on('subareas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
