<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        // Laptops
//        for ($i=1; $i <= 30; $i++) {
//            Product::create([
//                'name' => 'Laptop '.$i,
//                'category' => 'Laptop',
//                'price' => rand(149999, 249999),
//                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
//                'image' => 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/inspiron_notebooks/14_5401_5408/pdp/notebooks-inspiron-14-5401-5408-laptop-pdp-design-gallery504x350_silver.jpg?fmt=jpg&wid=570&hei=400',
//            ])->categories()->attach(5);
//        }

        // Make Laptop 1 a Desktop as well. Just to test multiple categories
//        $product = Product::find(32);
//        $product->categories()->attach(6);

        // Desktops
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Desktop ' . $i,
                'category' => 'Desktop',
                'price' => rand(249999, 449999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/71o-TLc1RkL._SL1000_.jpg',
            ])->categories()->attach(6);
        }
//
        // Mobiles
        for ($i = 1; $i <= 9; $i++) {
            Product::create([
                'name' => 'Phone ' . $i,
                'category' => 'Mobile',
                'price' => rand(79999, 149999),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/71UqqpGVheL._SL1500_.jpg',
            ])->categories()->attach(1);
        }
//
        // Tablets
//        for ($i = 1; $i <= 9; $i++) {
//            Product::create([
//                'name' => 'Tablet ' . $i,
//                'slug' => 'tablet-' . $i,
//                'details' => [16, 32, 64][array_rand([16, 32, 64])] . 'GB, 5.' . [10, 11, 12][array_rand([10, 11, 12])] . ' inch screen, 4GHz Quad Core',
//                'price' => rand(49999, 149999),
//                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
//                'image' => 'products/dummy/tablet-'.$i.'.jpg',
//                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
//            ])->categories()->attach(4);
//        }
//
//        // TVs
//        for ($i = 1; $i <= 9; $i++) {
//            Product::create([
//                'name' => 'TV ' . $i,
//                'slug' => 'tv-' . $i,
//                'details' => [46, 50, 60][array_rand([7, 8, 9])] . ' inch screen, Smart TV, 4K',
//                'price' => rand(79999, 149999),
//                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
//                'image' => 'products/dummy/tv-'.$i.'.jpg',
//                'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
//            ])->categories()->attach(5);
//        }


//        DB::table('products')->insert([
//                [
//                    'name'=>'Samsung TV',
//                    'price'=>'16290',
//                    'description'=>'80cm (32 Inches) Wondertainment Series HD Ready LED Smart TV (Glossy Black) ',
//                    'category'=>'TV',
//                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71fEd9glTIL._SL1500_.jpg'
//                ],
//                [
//                    'name'=>'OnePlus Y Series TV',
//                    'price'=>'15999',
//                    'description'=>'80cm (32 inches) HD Ready LED Smart Android TV 32Y1 (Black) ',
//                    'category'=>'TV',
//                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/81qtALn%2BGpL._SL1500_.jpg'
//                ],
//                [
//                    'name'=>'Mi TV 4A PRO',
//                    'price'=>'14999',
//                    'description'=>'80 cm (32 inches) HD Ready Android LED TV (Black) | With Data Save',
//                    'category'=>'TV',
//                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71qOOWyfc7L._SL1500_.jpg'
//                ],
//                [
//                    'name'=>'Samsung TV',
//                    'price'=>'16290',
//                    'description'=>'80cm (32 Inches) Wondertainment Series HD Ready LED Smart TV (Glossy Black) ',
//                    'category'=>'TV',
//                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71fEd9glTIL._SL1500_.jpg'
//                ],
//                [
//                    'name'=>'OnePlus Y Series TV',
//                    'price'=>'15999',
//                    'description'=>'80cm (32 inches) HD Ready LED Smart Android TV 32Y1 (Black) ',
//                    'category'=>'TV',
//                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/81qtALn%2BGpL._SL1500_.jpg'
//                ],
//                [
//                    'name'=>'Mi TV 4A PRO',
//                    'price'=>'14999',
//                    'description'=>'80 cm (32 inches) HD Ready Android LED TV (Black) | With Data Save',
//                    'category'=>'TV',
//                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71qOOWyfc7L._SL1500_.jpg'
//                ],
//                [
//                    'name'=>'Samsung TV',
//                    'price'=>'16290',
//                    'description'=>'80cm (32 Inches) Wondertainment Series HD Ready LED Smart TV (Glossy Black) ',
//                    'category'=>'TV',
//                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71fEd9glTIL._SL1500_.jpg'
//                ],
//                [
//                    'name'=>'OnePlus Y Series TV',
//                    'price'=>'15999',
//                    'description'=>'80cm (32 inches) HD Ready LED Smart Android TV 32Y1 (Black) ',
//                    'category'=>'TV',
//                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/81qtALn%2BGpL._SL1500_.jpg'
//                ],
//                [
//                    'name'=>'Mi TV 4A PRO',
//                    'price'=>'14999',
//                    'description'=>'80 cm (32 inches) HD Ready Android LED TV (Black) | With Data Save',
//                    'category'=>'TV',
//                    'image'=>'https://images-na.ssl-images-amazon.com/images/I/71qOOWyfc7L._SL1500_.jpg'
//                ],
//            ]);
    }
}
