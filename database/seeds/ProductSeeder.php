<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
                [
                    'name'=>'Samsung TV',
                    'price'=>'16290',
                    'description'=>'80cm (32 Inches) Wondertainment Series HD Ready LED Smart TV (Glossy Black) ',
                    'category'=>'TV',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71fEd9glTIL._SL1500_.jpg'
                ],
                [
                    'name'=>'OnePlus Y Series TV',
                    'price'=>'15999',
                    'description'=>'80cm (32 inches) HD Ready LED Smart Android TV 32Y1 (Black) ',
                    'category'=>'TV',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/81qtALn%2BGpL._SL1500_.jpg'
                ],
                [
                    'name'=>'Mi TV 4A PRO',
                    'price'=>'14999',
                    'description'=>'80 cm (32 inches) HD Ready Android LED TV (Black) | With Data Save',
                    'category'=>'TV',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71qOOWyfc7L._SL1500_.jpg'
                ],
                [
                    'name'=>'Samsung TV',
                    'price'=>'16290',
                    'description'=>'80cm (32 Inches) Wondertainment Series HD Ready LED Smart TV (Glossy Black) ',
                    'category'=>'TV',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71fEd9glTIL._SL1500_.jpg'
                ],
                [
                    'name'=>'OnePlus Y Series TV',
                    'price'=>'15999',
                    'description'=>'80cm (32 inches) HD Ready LED Smart Android TV 32Y1 (Black) ',
                    'category'=>'TV',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/81qtALn%2BGpL._SL1500_.jpg'
                ],
                [
                    'name'=>'Mi TV 4A PRO',
                    'price'=>'14999',
                    'description'=>'80 cm (32 inches) HD Ready Android LED TV (Black) | With Data Save',
                    'category'=>'TV',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71qOOWyfc7L._SL1500_.jpg'
                ],
                [
                    'name'=>'Samsung TV',
                    'price'=>'16290',
                    'description'=>'80cm (32 Inches) Wondertainment Series HD Ready LED Smart TV (Glossy Black) ',
                    'category'=>'TV',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71fEd9glTIL._SL1500_.jpg'
                ],
                [
                    'name'=>'OnePlus Y Series TV',
                    'price'=>'15999',
                    'description'=>'80cm (32 inches) HD Ready LED Smart Android TV 32Y1 (Black) ',
                    'category'=>'TV',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/81qtALn%2BGpL._SL1500_.jpg'
                ],
                [
                    'name'=>'Mi TV 4A PRO',
                    'price'=>'14999',
                    'description'=>'80 cm (32 inches) HD Ready Android LED TV (Black) | With Data Save',
                    'category'=>'TV',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71qOOWyfc7L._SL1500_.jpg'
                ],
            ]
        );
    }
}
