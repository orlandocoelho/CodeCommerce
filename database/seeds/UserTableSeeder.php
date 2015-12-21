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
        factory('CodeCommerce\User')->create([
            'name' => 'Orlando',
            'email' => 'email@orlandocoelho.com',
            'password' => bcrypt('123456'),
            'is_admin' => true,
            'street' => 'Riachuelo',
            'number' => '260',
            'city' => 'joinville',
            'state' => 'SC',
            'code' => '89223110'
        ]);
        factory('CodeCommerce\User', 5)->create();
    }
}
