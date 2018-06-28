<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTensesExampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenses_example', function (Blueprint $table) {
            $table->increments('id');
            $table->string('describe')->nullable();
            $table->string('describe_vi')->nullable();
            $table->integer('tenses_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenses_example');
    }
}
