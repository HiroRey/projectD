<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([

    [   'name' => 'Мобильные телефоны',
        'name_en' => 'Mobile phones',
        'code' => 'mobiles',
        'description' => 'В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!',
        'description_en' => 'Mobile phones section with best prices for best popular phones!',
        'image' => 'categories/mobile.jpg',
        ],
        [   'name' => 'Портативная техника',
            'name_en' => 'Portable',
            'code' => 'portable',
            'description' => 'Раздел с портативной техникой.',
            'description_en' => 'Great sound from Dr. Dre',
            'image' => 'categories/portable.jpg',
        ] ,
            [   'name' => 'Бытовая техника',
                'name_en' => 'Appliance',
                'code' => 'appliances',
                'description' => 'Раздел с бытовой техникой',
                'description_en' => 'Good morning starts with a good coffee!',
                'image' => 'categories/appliance.jpg',
            ],]);



    }
}
