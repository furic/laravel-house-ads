<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateHouseAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_ads', function(Blueprint $table) {
            $table->id();

            $table->integer('game_id')->unsigned();
            $table->string('media_portrait', 128)->nullable();
            $table->string('media_landscape', 128)->nullable();
            $table->boolean('open_url')->default(true);
            $table->string('url_ios', 256)->nullable();
            $table->string('url_android', 256)->nullable();
            $table->tinyInteger('repeat_count')->unsigned()->default('1');
            $table->tinyInteger('priority')->unsigned()->default('1');
            $table->date('start_at');
            $table->date('end_at');
            $table->mediumInteger('shown_count')->unsigned()->default('0');
            $table->mediumInteger('confirmed_count')->unsigned()->default('0');
            $table->mediumInteger('cancelled_count')->unsigned()->default('0');

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
        Schema::dropIfExists('house_ads');
    }
}
