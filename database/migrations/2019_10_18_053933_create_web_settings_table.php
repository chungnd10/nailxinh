<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('open_time', 50);
            $table->string('close_time', 50);
            $table->string('address', 200);
            $table->string('introduction', 200);
            $table->string('facebook', 300)->nullable();
            $table->string('phone_number', 11);
            $table->string('email', 200);
            $table->string('logo',300)->default('logo-default.png');
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
        Schema::dropIfExists('web_settings');
    }
}
