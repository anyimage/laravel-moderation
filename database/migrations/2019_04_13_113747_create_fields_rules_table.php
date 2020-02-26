<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFieldsRulesTable extends Migration
{

    public function up()
    {
        Schema::create('moderation__field_rule', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('field_id')->unsigned();
            $table->integer('rule_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('moderation__field_rule');
    }
}
