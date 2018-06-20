<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('avail_flg', 1)->default(1);
            $table->timestamp('created_date')->useCurrent();;
            $table->timestamp('modified_date')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));;
            $table->rememberToken();
        });

        $user = ['name'=>'admin', 'email'=>'admin@admin.com', 'password'=>\Hash::make('admin123')];
        DB::table('administrators')->insert($user);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrators');
    }
}
