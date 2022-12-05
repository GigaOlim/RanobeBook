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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agent_id')->unsigned()->index();
            $table->bigInteger('player_id')->unsigned()->index();
            $table->bigInteger('status_id')->unsigned()->index();
            $table->bigInteger('club_id')->unsigned()->index();
            $table->timestamps();

            // ! RelationShips
            $table->foreign('agent_id')->references('id')->on('users');
            $table->foreign('player_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('deal_statuses');
            $table->foreign('club_id')->references('id')->on('clubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
};
