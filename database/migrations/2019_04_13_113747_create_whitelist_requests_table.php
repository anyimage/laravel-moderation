<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWhitelistRequestsTable extends Migration
{

    public function up()
    {
        Schema::create('moderation__whitelist_requests', function (Blueprint $table)
        {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('email', 255);
            $table->string('url', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('moderation__whitelist_requests');
    }
}
