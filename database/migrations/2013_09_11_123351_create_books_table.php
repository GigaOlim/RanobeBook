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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('description');
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('publisher_id')->unsigned();
            $table->bigInteger('translator_id')->unsigned();
            $table->timestamps();

            $table->index('author_id');
            $table->index('publisher_id');
            $table->index('translator_id');


            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('translator_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
