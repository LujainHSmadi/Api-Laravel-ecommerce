<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
    [
    [
        'name' => 'Chairs',
        'image' => "https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60",
        'description' => 'lorem ipsum',
        'parent_category_id' => 1,

    ],

        [
            'name' => 'Chairs',
            'image' => "https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60",
            'description' => 'lorem ipsum',
            'parent_category_id' => 2,

        ],
        [
            'name' => 'Chairs',
            'image' => "https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60",
            'description' => 'ipsum lorem',
            'parent_category_id' => 1,

        ],
    ]
);

    }
}
