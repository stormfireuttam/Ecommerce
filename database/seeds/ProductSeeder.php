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
                    'name'=>'Samsung Galaxy A51',
                    'price'=>'20999',
                    'description'=>'Haze Crush Silver, 6GB RAM, 128GB Storage',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/81w61J-zDKL._SL1500_.jpg'
                ],
                [
                    'name'=>'Samsung Galaxy S21 Plus 5G',
                    'price'=>'81999',
                    'description'=>'Phantom Violet, 8GB, 128GB Storage',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/91v6gUJghLL._SL1500_.jpg'
                ],
                [
                    'name'=>'Redmi Note 9 Pro',
                    'price'=>'12999',
                    'description'=>'Aurora Blue, 4GB RAM, 64GB Storage',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/811axeBSeRL._SL1500_.jpg'
                ],
                [
                    'name'=>'Redmi 9 Power',
                    'price'=>'10999',
                    'description'=>'Mighty Black 4GB RAM 64GB Storage - 6000mAh Battery | 48MP Quad Camera',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71hEzQGO5qL._SL1500_.jpg'
                ],
                [
                    'name'=>'OnePlus Nord 5G',
                    'price'=>'29999',
                    'description'=>'Blue Marble, 12GB RAM, 256GB Storage',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71Lx9l3NivL._SL1500_.jpg'
                ],
                [
                    'name'=>'Samsung Galaxy A51',
                    'price'=>'20999',
                    'description'=>'Haze Crush Silver, 6GB RAM, 128GB Storage',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/81w61J-zDKL._SL1500_.jpg'
                ],
                [
                    'name'=>'Samsung Galaxy S21 Plus 5G',
                    'price'=>'81999',
                    'description'=>'Phantom Violet, 8GB, 128GB Storage',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/91v6gUJghLL._SL1500_.jpg'
                ],
                [
                    'name'=>'Redmi Note 9 Pro',
                    'price'=>'12999',
                    'description'=>'Aurora Blue, 4GB RAM, 64GB Storage',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/811axeBSeRL._SL1500_.jpg'
                ],
                [
                    'name'=>'Redmi 9 Power',
                    'price'=>'10999',
                    'description'=>'Mighty Black 4GB RAM 64GB Storage - 6000mAh Battery | 48MP Quad Camera',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71hEzQGO5qL._SL1500_.jpg'
                ],
                [
                    'name'=>'OnePlus Nord 5G',
                    'price'=>'29999',
                    'description'=>'Blue Marble, 12GB RAM, 256GB Storage',
                    'category'=>'Mobile',
                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71Lx9l3NivL._SL1500_.jpg'
                ]
            ]
        );
    }
}
