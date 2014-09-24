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
			$table->string('requested_month');
			$table->string('requester_name');
			$table->string('client_name');
			$table->string('project_number');
			$table->string('project_status');
			$table->integer('question_count');
			$table->string('request_type');
			$table->string('complexity');
			$table->string('department');
			$table->string('notes');
			$table->string('qa_name');
			$table->integer('hours_spent');
			$table->integer('number_of_changes');
			$table->integer('hours_on_changes');
			$table->integer('ot_hours');
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
