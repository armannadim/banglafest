<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFestivalTable extends Migration {

	public function up()
	{
		Schema::create('festival', function(Blueprint $table) {			
			$table->increments('id');
                        $table->string('name', 100);
			$table->timestamp('start_datetime');
			$table->timestamp('end_datetime');
			$table->integer('city');
			$table->string('special_guest', 500);
			$table->string('special_performers', 500);
			$table->string('organizers', 500);
			$table->string('description', 1000);
			$table->string('contact_person', 100);
			$table->string('Contact_person_phn', 20);
			$table->string('contact_person_email', 100);
			$table->string('link', 100);
			$table->string('facebook', 100);
			$table->string('twitter', 100);
			$table->string('budget', 10);
			$table->integer('country');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('festival');
	}
}