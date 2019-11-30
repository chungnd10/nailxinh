<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200)->nullable();
            $table->string('description', 300)->nullable();
            $table->string('images', 300)->default('slide-default.png');
            $table->string('url', 300)->nullable();
            $table->integer('location_display');

            $table->unsignedInteger('display_status_id');

            $table->foreign('display_status_id')
                ->references('id')
                ->on('display_statuses')
                ->onDelete('CASCADE');

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
        Schema::dropIfExists('slides');
    }
}
