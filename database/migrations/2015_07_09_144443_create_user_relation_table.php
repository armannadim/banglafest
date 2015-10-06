<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRelationTable extends Migration {

	public function up()
	{
		Schema::create('user_relation', function(Blueprint $table) {
			$table->increments('id');			
			$table->integer('user_id')->unsigned();
			$table->integer('festival_id')->unsigned();
                        $table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('user_relation');
	}
}