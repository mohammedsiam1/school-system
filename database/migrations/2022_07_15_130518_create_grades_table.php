<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration {

	public function up()
	{
		Schema::create('grades', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('note')->nullable();
			$table->string('name' )->unique();
		});
	}

	public function down()
	{
		Schema::drop('grades');
	}
}
