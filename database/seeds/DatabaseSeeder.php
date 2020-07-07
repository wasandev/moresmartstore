<?php

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
        $this->call([
            //CategoriesTableSeeder::class,
            UnitsTableSeeder::class,
            //BusinesstypesTableSeeder::class,
            //ThaiAddressTablesSeeder::class,
        ]);
        //factory(App\Product::class, 25)->create();
    }
}
