<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SupplierController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View|Response
   */
  public function index()
  {
    return view('supplier.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Application|Factory|View|Response
   */
  public function create()
  {
    return view('supplier.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return RedirectResponse|Response
   * @throws ValidationException
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|string',
      'address' => 'required|string',
      'phone' => 'required|numeric',
    ]);

    $supplier = new Supplier();
    $supplier->name = $request->name;
    $supplier->address = $request->address;
    $supplier->phone = $request->phone;
    $supplier->save();

    return redirect()->route('supplier.index');
  }

  /**
   * Display the specified resource.
   *
   * @param string $filter
   * @return JsonResponse|Response
   */
  public function show($filter = "")
  {
    if ($filter) {
      $suppliers = Supplier::where('name', 'like', "%" . $filter . "%")->orWhere('address', 'like', "%" . $filter . "%")->orWhere('phone', 'like', "%" . $filter . "%")->get();
    } else {
      $suppliers = Supplier::take(100)->get();
    }
    return response()->json($suppliers, 200);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param $id
   * @return Application|Factory|View|Response
   */
  public function edit($id)
  {
    $supplier = Supplier::find($id);

    $data = [
      'supplier' => $supplier
    ];

    return view('supplier.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param $id
   * @return RedirectResponse|Response
   * @throws ValidationException
   */
  public function update(Request $request, $id)
  {
    $supplier = Supplier::find($id);
    if ($request->name) {
      $this->validate($request, [
        'name' => 'required|string',
      ]);
      $supplier->name = $request->name;
    }

    if ($request->address) {
      $this->validate($request, [
        'address' => 'required|string',
      ]);
      $supplier->address = $request->address;
    }

    if ($request->phone) {
      $this->validate($request, [
        'phone' => 'required|numeric',
      ]);
      $supplier->phone = $request->phone;
    }

    $supplier->save();

    return redirect()->route('supplier.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param $id
   * @return RedirectResponse|void
   */
  public function destroy($id)
  {
    Supplier::deleted($id);
    return redirect()->route('supplier.index');
  }
}
