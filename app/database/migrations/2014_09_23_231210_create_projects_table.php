<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('requested_month')->nullable();
			$table->string('requester_name')->nullable();
			$table->string('client_name')->nullable();
			$table->string('project_number')->nullable();
			$table->string('project_status')->nullable();
			$table->integer('question_count')->nullable();
			$table->string('request_type')->nullable();
			$table->string('complexity')->nullable();
			$table->string('department')->nullable();
			$table->string('notes')->nullable();
			$table->string('qa_name')->nullable();
			$table->integer('hours_spent')->nullable();
			$table->integer('number_of_changes')->nullable();
			$table->integer('hours_on_changes')->nullable();
			$table->integer('ot_hours')->nullable();
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
		Schema::drop('projects');
	}

}
