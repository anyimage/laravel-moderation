<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRulesTable extends Migration
{

    public function up()
    {
        Schema::create('moderation__rules', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('severity_id')->unsigned()->default('2');
            $table->string('pattern', 255);
            $table->boolean('is_regex')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('moderation__rules');
    }
}
