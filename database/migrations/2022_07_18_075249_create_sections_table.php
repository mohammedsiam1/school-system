<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->id();
            $table->string('name_section');
            $table->smallInteger('Status')->default(1);
            $table->bigInteger('classRooms_id')->unsigned();
			$table->bigInteger('Grade_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}
