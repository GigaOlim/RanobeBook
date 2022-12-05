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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->decimal('transfer_price', 13, 3)->unsigned();
            $table->bigInteger('club_id')->unsigned()->index();
            $table->bigInteger('status_id')->unsigned()->index();
            $table->bigInteger('agent_id')->unsigned()->index();

            $table->timestamps();

            // ! relationships
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('status_id')->references('id')->on('status_players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
