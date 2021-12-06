<?php

namespace Database\Seeders;

use App\Models\cart;
use Illuminate\Database\Seeder;

class cartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        cart::create([
            'user_id'=>1,
            'product_id'=>1,
        ]);
        cart::create([
            'user_id'=>1,
            'product_id'=>2,
        ]);
        cart::create([
            'user_id'=>1,
            'product_id'=>2,
        ]);
    }
}
