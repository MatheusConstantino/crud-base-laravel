<?php

use Illuminate\Database\Seeder;
use RW940cms\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,1)->create( [
	        'name' => 'Rafael William',
	        'email' => 'rafaw940@yahoo.com.br',
            'password' => bcrypt('123456'),
	        'remember_token' => str_random(10)
	    ]);
	   
    }
}
