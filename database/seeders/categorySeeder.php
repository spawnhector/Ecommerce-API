<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create([
            'name'=>'Speaker',
            'desc'=>'music speaker',
        ]);
        category::create([
            'name'=>'Laptop',
            'desc'=>'laptop',
        ]);
        category::create([
            'name'=>'Television',
            'desc'=>'television',
        ]);
    }
}
