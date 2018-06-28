<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word', function (Blueprint $table) {
            $table->increments('id');
            $table->string('word');
            $table->string('sound')->nullable();
            $table->string('meaning')->nullable();
            $table->string('example')->nullable();
            $table->string('example1')->nullable();
            $table->string('subjects_id')->nullable();
        });

        DB::table('word')->insert(['word'=>'focus','meaning'=>'tập trung']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word');
    }
}
