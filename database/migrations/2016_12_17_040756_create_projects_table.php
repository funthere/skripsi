<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name')->unique();
            $table->text('description');
            $table->dateTime('start_datetime');
            $table->dateTime('finish_datetime');
            $table->integer('pic')->unsigned();
            $table->text('message_board');
            $table->enum('status_progress', ['on_going', 'complete', 'pending']);
            $table->timestamps();

            //Constraints
            $table->foreign('pic')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //Drop Constraint
            $table->dropForeign('projects_pic_foreign');
        });
        Schema::drop('projects');
    }
}
