<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); //UNSIGNED INTEGER - AUTO INCREMENTAL
            $table->string('name');  // VARCHAR
            $table->string('email')->unique();  //VARCHAR -UNIQUE
            $table->string('password');
            $table->Integer('profession_id')->unsigned()->nullable();
            $table->foreign('profession_id')->references('id')->on('professions');
            $table->boolean ('is_admin')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
