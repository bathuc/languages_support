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
            $table->integer('word_meaning_id')->nullable();
            $table->integer('word_example_id')->nullable();
        });

        DB::table('word')->insert(['word'=>'focus']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('english_word');
    }
}
