<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bug_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('att_name');
            $table->integer('bug_id')->unsigned();

//            $table->foreign('bug_id')->references('id')->on('bugs');

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
        Schema::dropIfExists('bug_attachments');
    }
}
