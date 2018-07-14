<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhraseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phrase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phrase')->nullable();
            $table->string('meaning')->nullable();
            $table->string('example')->nullable();
            $table->string('example1')->nullable();
        });

        DB::table('phrase')->insert(['phrase'=>'Keep up','meaning'=>'Tiếp tục','example'=>'Well done! Keep up the good work/Keep it up']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phrase');
    }
}
