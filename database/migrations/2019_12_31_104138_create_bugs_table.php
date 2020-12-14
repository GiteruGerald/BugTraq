<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->longText('description');

            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('users');

            $table->integer('assigned');
            $table->foreign('assigned')->references('id')->on('users');

            $table->string('type');
            $table->date('due_date');

            $table->string('reporter');
            $table->integer('att_id')->nullable()->unsigned();
            $table->foreign('att_id')->references('id')->on('bug_attachments');
            $table->integer('reporter_id');

            $table->string('priority');

            $table->string('status')->default('To Do');

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
        Schema::dropIfExists('bugs');
    }
}
