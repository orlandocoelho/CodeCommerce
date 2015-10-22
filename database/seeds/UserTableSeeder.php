<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create(['name' => 'Orlando', 'email' => 'email@orlandocoelho.com', 'password' => '123']);
        factory('CodeCommerce\User', 5)->create();
    }
}
