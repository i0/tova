<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('participant_id');
            $table->integer('correct');
            $table->integer('omission');
            $table->integer('commission');
            $table->integer('rt');
            $table->integer('parts');
            $table->integer('type');
            $table->integer('dt');
            $table->integer('isi');
            $table->integer('testPercentage');
            $table->string('targetVariableType');
            $table->string('targetVariable');
            $table->string('totalTestTime');
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
        Schema::drop('results');
    }
}
