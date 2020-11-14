<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $subCategories = new SubCategory();
    $subCategories->name = "Top";
    $subCategories->category = 2;
    $subCategories->save();

    $subCategories = new SubCategory();
    $subCategories->name = "Bottom";
    $subCategories->category = 2;
    $subCategories->save();

    $subCategories = new SubCategory();
    $subCategories->name = "Homey Dress";
    $subCategories->category = 2;
    $subCategories->save();

    $subCategories = new SubCategory();
    $subCategories->name = "Shoes";
    $subCategories->category = 2;
    $subCategories->save();

    $subCategories = new SubCategory();
    $subCategories->name = "Hijab";
    $subCategories->category = 2;
    $subCategories->save();

    $subCategories = new SubCategory();
    $subCategories->name = "Tunic";
    $subCategories->category = 2;
    $subCategories->save();
  }
}
