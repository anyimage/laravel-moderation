<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration
{

    public function up()
    {
        Schema::table('moderation__rules', function (Blueprint $table)
        {
            $table->foreign('severity_id')->references('id')->on('moderation__severities')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        Schema::table('moderation__field_rule', function (Blueprint $table)
        {
            $table->foreign('field_id')->references('id')->on('moderation__fields')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        Schema::table('moderation__field_rule', function (Blueprint $table)
        {
            $table->foreign('rule_id')->references('id')->on('moderation__rules')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        Schema::table('moderation__violations', function (Blueprint $table)
        {
            $table->foreign('rule_id')->references('id')->on('moderation__rules')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        Schema::table('moderation__violations', function (Blueprint $table)
        {
            $table->foreign('field_id')->references('id')->on('moderation__fields')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
    }
}
