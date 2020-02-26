<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWhitelistEntriesTable extends Migration
{

    public function up()
    {
        Schema::create('moderation__whitelist_entries', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('url');
            $table->boolean('whole_domain')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('moderation__whitelist_entries');
    }
}
