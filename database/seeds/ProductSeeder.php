<?php

use Illuminate\Database\Seeder;
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
        // Laptops
        for ($i=1; $i <= 20; $i++) {
            Product::create([
                'name' => 'Laptop '.$i,
                'category' => 'Laptop',
                'price' => rand(14999, 50999),
                'quantity' => rand(10,50),
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'https://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/dell_client_products/notebooks/inspiron_notebooks/14_5401_5408/pdp/notebooks-inspiron-14-5401-5408-laptop-pdp-design-gallery504x350_silver.jpg?fmt=jpg&wid=570&hei=400',
            ]);
        }
//
        // Desktops
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Desktop ' . $i,
                'category' => 'Desktop',
                'price' => rand(14999, 44999),
                'quantity' => rand(10,50),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/71o-TLc1RkL._SL1000_.jpg',
            ]);
        }
////
//        // Mobiles
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Phone ' . $i,
                'category' => 'Mobile',
                'price' => rand(7999, 20999),
                'quantity' => rand(10,50),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/71UqqpGVheL._SL1500_.jpg',
            ]);
        }
//
////        // TVs
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'TV ' . $i,
                'category' => 'TV',
                'price' => rand(7999, 14999),
                'quantity' => rand(10,50),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/71fEd9glTIL._SL1500_.jpg',
            ]);
        }
        // Washing Machine
        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name' => 'Machine ' . $i,
                'category' => 'Washing Machine',
                'price' => rand(3999, 8999),
                'quantity' => rand(10,50),
                'description' => 'Lorem ' . $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/LGwashingmachine.jpg/220px-LGwashingmachine.jpg',
            ]);
        }

    }
}
