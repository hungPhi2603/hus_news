<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
    }
}

/**
 * 
 */



class userSeeder extends Seeder
{
	public function run() {

		DB::table('users')->insert([
			['name'=>'HungPhi', 'email'=>'admin@gmail.com', 'quyen'=>'2', 'password'=>bcrypt('123456')]
		]);
	}
}
