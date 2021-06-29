<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        \App\Models\User::factory(1)->create();

        DB::table('products')->truncate();
        \App\Models\Product::factory(30)->create();
    }
}
