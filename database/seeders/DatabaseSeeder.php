<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\comercial\Client;
use App\Models\comercial\Provider;
use App\Models\comercial\Purchase;
use App\Models\comercial\Sale;
use App\Models\inventarios\Category;
use App\Models\inventarios\Product;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        //Role::factory(3)->create();
        User::factory(2)->create();        
    }
}
