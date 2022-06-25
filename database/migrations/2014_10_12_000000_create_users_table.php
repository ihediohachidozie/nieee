<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $memberid;
    public function up()
    {
        $this->memberid = date('Y').date('m').random_int(1000, 9999);
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('membershipgroup')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->boolean('status')->default(0);
            $table->integer('memberid')->default($this->memberid);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('about')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
};
