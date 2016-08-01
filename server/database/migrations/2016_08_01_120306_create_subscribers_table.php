<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('subscribers', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sex');
            $table->string('localization');
            $table->string('email')->unique();
            $table->string('date_of_birth');
            $table->string('team');
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
        //
        Schema::drop('subscribers');
    }
}
