<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assigned_to')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('sprint_id')->unsigned();
            $table->string('activity');
            $table->text('description');
            $table->enum('status', ['active', 'done']);
            $table->dateTime('deadline_datetime');
            $table->dateTime('submit_datetime');
            $table->timestamps();

            //Constraints
            $table->foreign('assigned_to')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sprint_id')->references('id')->on('project_sprints')
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
        Schema::table('tasks', function (Blueprint $table) {
            //Drop Constraint
            $table->dropForeign('tasks_assigned_to_foreign');
            $table->dropForeign('tasks_project_id_foreign');
            $table->dropForeign('tasks_sprint_id_foreign');
        });
        Schema::drop('tasks');
    }
}
