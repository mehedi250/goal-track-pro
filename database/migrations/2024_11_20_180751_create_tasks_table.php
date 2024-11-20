<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('assigned_to')->unsigned()->nullable()->comment('user_id');
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('project_id')->unsigned();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->integer('value')->default(1);
            $table->enum('priority', ['LOW', 'MEDIUM', 'HIGH'])->default('LOW');
            $table->enum('status', ['OPEN', 'IN_PROGRESS', 'OVERDUE', 'COMPLETE'])->default('OPEN');
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
        Schema::dropIfExists('tasks');
    }
}
