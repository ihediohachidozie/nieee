<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('specialty_id')->nullable();
            $table->integer('subspecialty_id')->nullable();
            $table->integer('chapter_id')->nullable();
            $table->string('address')->nullable();
            $table->integer('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('phone')->nullable();
            $table->string('nextofkin')->nullable();
            $table->integer('relationship')->nullable();
            $table->string('kphone')->nullable();
            $table->string('kaddress')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
