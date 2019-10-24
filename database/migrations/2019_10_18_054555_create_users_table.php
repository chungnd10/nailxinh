<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('avatar', 300);
            $table->string('phone_number', 11);
            $table->date('birthday');
            $table->string('address');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches')
                ->onDelete('CASCADE');

            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
                ->onDelete('CASCADE');

            $table->unsignedBigInteger('operation_status_id');
            $table->foreign('operation_status_id')
                ->references('id')
                ->on('operation_statuses')
                ->onDelete('CASCADE');

            $table->unsignedInteger('role_id');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
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
        Schema::dropIfExists('users');
    }
}
