<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('image', 300)->default('services-default.png');
            $table->string('description', 300)->nullable();
            $table->double('price', 10, 2);
            $table->string('completion_time', 100);
            $table->string('slug', 300);

            $table->unsignedInteger('type_of_services_id');
            $table->foreign('type_of_services_id')
                ->references('id')
                ->on('type_of_services')
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
        Schema::dropIfExists('services');
    }
}
