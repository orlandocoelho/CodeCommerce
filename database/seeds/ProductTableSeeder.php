<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        factory('CodeCommerce\Product', 40)->create()->each(function ($u){
            $u->tags()->sync([rand(0, 10)]);
        });
    }
}
