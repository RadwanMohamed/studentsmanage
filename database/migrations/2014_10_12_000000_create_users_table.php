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
            $table->increments('id');
            $table->string('file_number')->unique();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('surname');
            $table->string('personal_photo');
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('country');
            $table->boolean('gander');
            $table->string('passport_image');
            $table->string('graduation_degree');
            $table->string('graduation_photos');
            $table->rememberToken();
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
