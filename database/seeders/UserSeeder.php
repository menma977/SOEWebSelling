<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = new User();
    $user->role = 1;
    $user->name = "Smitty Weber Jagger Man Jonson";
    $user->username = "menma977";
    $user->password = Hash::make("462066");
    $user->save();

    $user = new User();
    $user->role = 2;
    $user->name = "Ika Nurfallah";
    $user->username = "missikalol";
    $user->password = Hash::make("120522");
    $user->save();
  }
}
