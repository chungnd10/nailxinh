<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_library', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image', 300);

            $table->unsignedInteger('type_of_service_id');
            $table->foreign('type_of_service_id')
                ->references('id')
                ->on('type_of_services')
                ->onDelete('CASCADE');

            $table->unsignedInteger('display_status_id')->default(config('contants.display_status_hide'));
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
        Schema::dropIfExists('photo_library');
    }
}
