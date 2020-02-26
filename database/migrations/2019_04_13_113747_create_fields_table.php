<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFieldsTable extends Migration
{

    public function up()
    {
        Schema::create('moderation__fields', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 64);
            $table->string('description', 128);
            $table->string('matcher', 255);
            $table->integer('priority')->unsigned()->default('1');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('moderation__fields');
    }
}
