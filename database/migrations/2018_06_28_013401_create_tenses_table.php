<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_eng')->nullable();
            $table->string('name_vi')->nullable();
            $table->string('signal_words')->nullable();
            $table->string('common')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenses');
    }
}
