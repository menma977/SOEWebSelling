<?php

namespace Database\Seeders;

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
    $this->call(CategorySeeder::class);
    $this->call(SubCategorySeeder::class);
    $this->call(SupplierSeeder::class);
    $this->call(UserSeeder::class);
  }
}
