<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');            
            $table->string('name', 200);
            $table->string('full_name', 200);
            $table->string('username', 16)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 60);
            $table->string('role', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
