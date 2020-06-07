<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(ShoppingListTableSeeder::class);
        $this->call(SlistsTableSeeder::class);

    }
}


