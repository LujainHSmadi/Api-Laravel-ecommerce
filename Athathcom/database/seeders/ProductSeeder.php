<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

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
            'price' => 50.5,
            'quantity' => 50,
            'name' => 'Chairs',
            'image' => "https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60",
            'description' => 'lorem ipsum',
            'caregory_id' => 1,
            ],
            
            [
            'price' => 10.5,
            'quantity' => 30,
            'name' => 'sofa',
            'image' => "https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60",
            'description' => 'lorem ipsum',
            'caregory_id' => 1,
            ],
            [
            'price' => 70.5,
            'quantity' => 10,
            'name' => 'Accessories',
            'image' => "https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60",
            'description' => 'lorem ipsum',
            'caregory_id' => 1,
        ]
            ]
        );
        // DB::table('products')->insert(
        //     [
        //     'price' => 10.5,
        //     'quantity' => 5,
        //     'name' => 'sofa',
        //     'description' => 'lorem ipsum',
        //     'category_id' => 1,
        // ]
        // );
        // DB::table('products')->insert(
        //     [
        //     'price' => 80.5,
        //     'quantity' => 10,
        //     'name' => 'accssory',
        //     'description' => 'lorem ipsum',
        //     'category_id' => 1,
        // ]
        // );

    }
}
