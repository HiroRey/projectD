<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert([

            [   'category_id' => 1,
                'name' => 'iPhone X',
                'name_en' => 'iPhone X',
                'code' => 'iphone_x',
                'description' => 'Отличный продвинутый телефон',
                'description_en' => 'The best phone',
                'image' => 'products/iphone_x.jpg',
                'price'=> 42700,
                'count' => rand(0,10)],
            [ 'category_id' => 1,
                'name' => 'iPhone XL',
                'name_en' => 'iPhone XL',
                'code' => 'iphone_xl',
                'description' => 'Огромный продвинутый телефон',
                'description_en' => 'The best huge phone',
                'image' => 'products/iphone_x_silver.jpg',
                'price'=> 31400,
                'count' => rand(0,10)],

            [ 'category_id' => 1,
                'name' => 'HTC One S',
                'name_en' => 'HTC One S',
                'code' => 'htc_one_s',
                'description' => 'Зачем платить за лишнее? Легендарный HTC One S',
                'description_en' => 'Why do you need to pay more? Legendary HTC One S',
                'image' => 'products/htc_one_s.png',
                'price'=> 7300,
                'count' => rand(0,10)],
            ['category_id' => 1,
                'name' => 'iPhone 5SE',
                'name_en' => 'iPhone 5SE',
                'code' => 'iphone_5se',
                'description' => 'Отличный классический iPhone',
                'description_en' => 'The best classic iPhone',
                'image' => 'products/iphone_5.jpg',
                'price'=> 32100,
                'count' => rand(0,10)
                ],

            ['category_id' => 1,
                'name' => 'Samsung Galaxy J6',
                'name_en' => 'Samsung Galaxy J6',
                'code' => 'samsung_j6',
                'description' => 'Современный телефон начального уровня',
                'description_en' => 'Modern phone of basic level',
                'image' => 'products/samsung_j6.jpg',
                'price'=> 34700,
                'count' => rand(0,10)],
            ['category_id' => 2,
                'name' => 'Наушники Beats Audio',
                'name_en' => 'Headphones Beats Audio',
                'code' => 'beats_audio',
                'description' => 'Отличный звук от Dr. Dre',
                'description_en' => 'Great sound from Dr. Dre',
                'image' => 'products/beats.jpg',
                'price'=> 400,
                'count' => rand(0,10)
            ],
            ['category_id' => 2,
                'name' => 'Камера GoPro',
                'name_en' => 'Camera GoPro',
                'code' => 'gopro',
                'description' => 'Снимай самые яркие моменты с помощью этой камеры',
                'description_en' => 'Capture the best moments of your life with that camera',
                'image' => 'products/gopro.jpg',
                'price'=> 1570,
                'count' => rand(0,10)],
            [ 'category_id' => 2,
                'name' => 'Камера Panasonic HC-V770',
                'name_en' => 'Camera Panasonic HC-V770',
                'code' => 'panasonic_hc-v770',
                'description' => 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!',
                'description_en' => 'For serious video you need the profession camera. Panasonic HC-V770 is that you need!',
                'image' => 'products/video_panasonic.jpg',
                'price'=> 900,
                'count' => rand(0,10)],
            ['category_id' => 3,
                'name' => 'Кофемашина DeLongi',
                'name_en' => 'Coffee machine DeLongi',
                'code' => 'delongi',
                'description' => 'Хорошее утро начинается с хорошего кофе!',
                'description_en' => 'Good morning starts with a good coffee!',
                'image' => 'products/delongi.jpg',
                'price'=> 800,
                'count' => rand(0,10)],
            ['category_id' => 3,
                'name' => 'Холодильник Haier',
                'name_en' => 'Refrigerator Haier',
                'code' => 'haier',
                'description' => 'Для большой семьи большой холодильник!',
                'description_en' => 'The huge refrigerator for a big family!',
                'image' => 'products/haier.jpg', 'price'=> 2500,
                'count' => rand(0,10)],
            ['category_id' => 3,
                'name' => 'Блендер Moulinex',
                'name_en' => 'Blender Moulinex',
                'code' => 'moulinex',
                'description' => 'Для самых смелых идей',
                'description_en' => 'For best ideas',
                'image' => 'products/moulinex.jpg', 'price'=> 1100,
                'count' => rand(0,10)],
            ['category_id' => 3,
                'name' => 'Мясорубка Bosch',
                'name_en' => 'Food processor Bosch',
                'code' => 'bosch',
                'description' => 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!',
                'description_en' => 'Do you like home cutlets? You need to see that combine!',
                'image' => 'products/bosch.jpg',
                'price'=> 1500,
                'count' => rand(0,10)
                ],
            ]);

    }
}
