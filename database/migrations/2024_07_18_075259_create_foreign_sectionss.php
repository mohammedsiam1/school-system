<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignSectionss extends Migration {

	public function up()
	{

		Schema::table('sections', function(Blueprint $table) {
			$table->foreign('classRooms_id')->references('id')->on('classRooms')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sections', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('grades')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
        Schema::table('my__parents', function(Blueprint $table) {
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Father_id')->references('id')->on('religions');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Mother_id')->references('id')->on('religions');
        });
        Schema::table('parent_attachments', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my__parents')->cascadeOnDelete();
        });
	}
	public function down()
	{
		Schema::table('classRooms', function(Blueprint $table) {
			$table->dropForeign('classRooms_grades_id_foreign');
		});
		Schema::table('sections', function(Blueprint $table) {
			$table->dropForeign('sections_classRooms_id_foreign');
		});
		Schema::table('sections', function(Blueprint $table) {
			$table->dropForeign('sections_Grade_id_foreign');
		});
	}
}
