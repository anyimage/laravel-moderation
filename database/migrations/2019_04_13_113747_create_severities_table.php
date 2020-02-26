<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeveritiesTable extends Migration
{

    public function up()
    {
        Schema::create('moderation__severities', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 12)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('moderation__severities');
    }
}
