<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    //use WithoutModelEvents; for 9.x and more version
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class
        ]);
    }
}
