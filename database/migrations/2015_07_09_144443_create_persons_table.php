<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonsTable extends Migration {

	public function up()
	{
		Schema::create('persons', function(Blueprint $table) {			
                        $table->increments('id');	
                        $table->string('full_name', 100);
			$table->string('name', 45);
			$table->string('position', 100);
			$table->string('contact_number', 45);
			$table->string('email', 100);
			$table->string('status', 2);                        
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('persons');
	}
}