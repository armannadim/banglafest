<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');

        Model::reguard();
    }
}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'Nadim',
            'full_name' => 'Admin Nadim',
            'username' => 'admin',
            'email' => 'armannadim@msn.com',
            'password' =>Hash::make('nadim123'),
            ]);
    }

}