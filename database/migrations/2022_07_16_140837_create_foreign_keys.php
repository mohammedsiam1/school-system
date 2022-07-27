<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('classRooms', function(Blueprint $table) {
			$table->foreign('grades_id')->references('id')->on('grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('classRooms', function(Blueprint $table) {
			$table->dropForeign('classRooms_grades_id_foreign');
		});
	}
}