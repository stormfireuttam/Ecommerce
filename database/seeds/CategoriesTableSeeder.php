<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString(); // Produces something like "2019-03-11 12:25:00"
        Category::insert([
//            ['name'=>'Mobile', 'created_at'=> $now, 'updated_at'=>$now],
//            ['name'=>'TV', 'created_at'=> $now, 'updated_at'=>$now],
//            ['name'=>'Refrigerator', 'created_at'=> $now, 'updated_at'=>$now],
//            ['name'=>'Washing Machine', 'created_at'=> $now, 'updated_at'=>$now],
//            ['name'=>'Laptop', 'created_at'=> $now, 'updated_at'=>$now],
            ['name'=>'Desktop', 'created_at'=> $now, 'updated_at'=>$now]
        ]);
    }
}
