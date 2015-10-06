<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityLogTable extends Migration {

	public function up()
	{
		Schema::create('activity_log', function(Blueprint $table) {			
                        $table->increments('id');
                        $table->string('activity', 500);
			$table->integer('user_id');                        
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('activity_log');
	}
}