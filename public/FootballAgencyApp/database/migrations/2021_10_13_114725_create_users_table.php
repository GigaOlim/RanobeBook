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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password', 255);
            $table->string('name', 70);
            $table->string('surname', 80);
            $table->string('photoPath')->default('defaultAvatar.png');
            $table->date('date_birth');
            $table->string('phone_number', 12)->unique();

            $table->bigInteger('role_id')->unsigned()->default(1)->index();
            $table->bigInteger('country_id')->unsigned()->index();

            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();

            // ! RelationShips
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('country_id')->references('id')->on('countries');
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
