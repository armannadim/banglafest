<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('city', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('country')
						->onDelete('restrict')
						->onUpdate('restrict');
		});		
		Schema::table('user_relation', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('user_relation', function(Blueprint $table) {
			$table->foreign('festival_id')->references('id')->on('festival')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('multimedia', function(Blueprint $table) {
			$table->foreign('festival_id')->references('id')->on('festival')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('city', function(Blueprint $table) {
			$table->dropForeign('city_country_id_foreign');
		});		
		Schema::table('user_relation', function(Blueprint $table) {
			$table->dropForeign('user_relation_user_id_foreign');
		});
		Schema::table('user_relation', function(Blueprint $table) {
			$table->dropForeign('user_relation_festival_id_foreign');
		});
		Schema::table('multimedia', function(Blueprint $table) {
			$table->dropForeign('multimedia_festival_id_foreign');
		});
	}
}