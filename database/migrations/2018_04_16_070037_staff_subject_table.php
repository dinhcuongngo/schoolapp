<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_subject', function (Blueprint $table) {
            $table->unsignedInteger('staff_id');
            $table->integer('subject_id')->unsigned();

            $table->foreign('staff_id')->references('id')->on('users');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });

        // Schema::table('staff_subject', function(Blueprint $table) {
        //     $table->foreign('staff_id')->references('id')->on('users');
        //     $table->foreign('subject_id')->references('id')->on('subjects');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_subject');
    }
}
