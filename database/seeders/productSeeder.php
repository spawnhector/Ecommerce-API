<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        product::create([
            'category_id'=>1,
            'name'=>'JBL',
            'desc'=>'15 inch speakers',
            'price'=>'180',
            'color'=>'black',
            'size'=>'15',
        ]);
        product::create([
            'category_id'=>2,
            'name'=>'DELL',
            'desc'=>'Smart PC',
            'price'=>'1000',
            'color'=>'grey',
            'size'=>'17',
        ]);
        product::create([
            'category_id'=>3,
            'name'=>'BlackPoint',
            'desc'=>'50 inch screen',
            'price'=>'500',
            'color'=>'black',
            'size'=>'50',
        ]);
    }
}
