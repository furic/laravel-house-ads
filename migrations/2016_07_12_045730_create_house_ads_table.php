<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_ads', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('game_id')->unsigned();
            $table->string('image_portrait', 128);
            $table->string('image_landscape', 128);
            $table->boolean('open_url', 128)->default(true);
            $table->string('url_ios', 256);
            $table->string('url_android', 256);
            $table->tinyInteger('repeat_count')->unsigned();
            $table->tinyInteger('priority')->unsigned();
            $table->date('start_at');
            $table->date('end_at');
            $table->mediumInteger('clicked_count')->unsigned();
            $table->mediumInteger('cancelled_count')->unsigned();

            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('house_ads');
    }
}
