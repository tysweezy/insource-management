<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProjectUserPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('project_user', function(Blueprint $table)
		{
		    $table->integer('hours_spent')->nullable();
			$table->integer('number_of_changes')->nullable();
			$table->integer('hours_on_changes')->nullable();
			$table->integer('ot_hours')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('project_user', function(Blueprint $table)
		{
			//
		});
	}

}
