<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMultimediaTable extends Migration {

	public function up()
	{
		Schema::create('multimedia', function(Blueprint $table) {			
			$table->increments('id');
                        $table->integer('festival_id')->unsigned();
			$table->string('file_type', 5);
			$table->string('filename', 100);                        
                        $table->integer('user_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('multimedia');
	}
}