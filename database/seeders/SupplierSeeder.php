<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $supplier = new Supplier();
    $supplier->name = "Ylinstore";
    $supplier->address = "Madiun";
    $supplier->phone = "081330048245";
    $supplier->save();

    $supplier = new Supplier();
    $supplier->name = "gudang_daster_pekalongan";
    $supplier->address = "Pekalongan";
    $supplier->phone = "0";
    $supplier->save();

    $supplier = new Supplier();
    $supplier->name = "stefashionrita";
    $supplier->address = "Denpasar";
    $supplier->phone = "0";
    $supplier->save();

    $supplier = new Supplier();
    $supplier->name = "armada.batik";
    $supplier->address = "Pekalongan";
    $supplier->phone = "0";
    $supplier->save();

    $supplier = new Supplier();
    $supplier->name = "rajatashop";
    $supplier->address = "Denpasar";
    $supplier->phone = "0";
    $supplier->save();

    $supplier = new Supplier();
    $supplier->name = "konveksibajubali";
    $supplier->address = "Denpasar";
    $supplier->phone = "0";
    $supplier->save();

  }
}
