<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_id');
            $table->string('poll_name');
            $table->datetime('poll_start_date');
            $table->datetime('poll_end_date');
            $table->string('sample');
            $table->string('moe');
            $table->integer('clinton');
            $table->integer('sanders');
            $table->integer('omalley');
            $table->integer('undecided');
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
        Schema::drop('polls');
    }
}