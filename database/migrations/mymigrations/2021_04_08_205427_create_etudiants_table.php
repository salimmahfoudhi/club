<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('role');
            $table->bigInteger('national_identity_card')->unique();
            $table->string('f_registration_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('personal_image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('Date_of_Birth');
            $table->integer('phone_number')->nullable()->unique();
            $table->string('description')->nullable();
            $table->integer('state')->default(1);






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
