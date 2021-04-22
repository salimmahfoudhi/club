<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('Date_of_Birth')->nullable();
            $table->string('phone_number')->nullable()->unique();
            $table->integer('state')->nullable()->default(0);
            $table->bigInteger('national_identity_card')->unique()->nullable();
            $table->string('f_registration_number')->unique()->nullable();
            $table->string('personal_image')->nullable()->default('/storage/2021/04/22/260a066bb1e4aee72380ba65f3beb11f9960460e.png');
            $table->string('description')->nullable();
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
