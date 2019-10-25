<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamousCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('famous_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name', 100);
            $table->string('image', 200);
            $table->string('description', 300);

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
        Schema::dropIfExists('famous_customers');
    }
}
