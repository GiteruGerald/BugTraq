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
            $table->integer('project_id');
            $table->foreign('project_id')->references('id')->on('users');

            $table->string('project_name');
            $table->foreign('project_name')->references('pj_name')->on('projects');

            $table->longText('description');

            $table->string('assigned');
            $table->foreign('assigned')->references('name')->on('users');

            $table->string('type');
            $table->date('due_date');

            $table->string('priority');
            $table->foreign('priority')->references('impact')->on('priorities');

            $table->string('status');
            $table->foreign('status')->references('status')->on('bug_statuses');

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
