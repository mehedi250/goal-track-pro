<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('manager_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_value')->default(0);
            $table->integer('complete_value')->default(0);
            $table->enum('status', ['OPEN', 'RUNNING', 'COMPLETE'])->default('OPEN');
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
        Schema::dropIfExists('projects');
    }
}
