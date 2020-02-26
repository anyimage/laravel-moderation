<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateViolationsTable extends Migration
{

    public function up()
    {
        Schema::create('moderation__violations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('rule_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('value', 512);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('moderation__violations');
    }
}