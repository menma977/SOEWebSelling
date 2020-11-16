<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Supplier;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View
   */
  public function index()
  {
    return view('product.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Application|Factory|View
   */
  public function create()
  {
    $supplier = Supplier::all();

    $subCategory = SubCategory::all();
    $subCategory->map(function ($item) {
      $item->category = Category::withTrashed()->find($item->category);
    });

    $data = [
      'supplier' => $supplier,
      'subCategory' => $subCategory,
    ];

    return view('product.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return RedirectResponse
   * @throws ValidationException
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|string',
      'supplier' => 'required|numeric|exists:suppliers,id',
      'sub_category' => 'required|numeric|exists:sub_categories,id',
      'image' => 'required|image|mimes:jpg,jpeg,png|max:2000',
    ]);

    $imageName = time() . '.' . $request->image->extension();
    Storage::putFileAs('public/product', $request->image, $imageName, 'public');

    $product = new Product();
    $product->name = $request->name;
    $product->supplier = Supplier::find($request->supplier)->id;
    $product->sub_category = SubCategory::find($request->sub_category)->id;
    $product->img = $imageName;
    $product->save();

    return redirect()->route('product.index');
  }

  /**
   * Display the specified resource.
   *
   * @param string $filter
   * @return JsonResponse
   */
  public function show($filter = "")
  {
    if ($filter) {
      $products = Product::where('name', 'like', "%" . $filter . "%")->get();
    } else {
      $products = Product::take(100)->get();
    }

    $products->map(function ($item) {
      $item->img = Storage::url('product/' . $item->img);
      $item->supplier = Supplier::find($item->supplier)->name;
      $sub_category = SubCategory::find($item->sub_category);
      $category = Category::find($sub_category->category);
      $item->sub_category = $category->name . ' - ' . $sub_category->name;
    });

    return response()->json($products, 200);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param $id
   * @return Application|Factory|View
   */
  public function edit($id)
  {
    $product = Product::find($id);
    $product->img = Storage::url('product/' . $product->img);
    $supplier = Supplier::all();

    $subCategory = SubCategory::all();
    $subCategory->map(function ($item) {
      $item->category = Category::withTrashed()->find($item->category);
    });

    $data = [
      'product' => $product,
      'supplier' => $supplier,
      'subCategory' => $subCategory,
    ];

    return view('product.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param $id
   * @return RedirectResponse
   * @throws ValidationException
   */
  public function update(Request $request, $id)
  {
    $product = Product::find($id);
    if ($request->name) {
      $this->validate($request, [
        'name' => 'required|string',
      ]);
      $product->name = $request->name;
    }

    if ($request->supplier) {
      $this->validate($request, [
        'supplier' => 'required|numeric|exists:suppliers,id',
      ]);

      $product->supplier = Supplier::find($request->supplier)->id;
    }

    if ($request->sub_category) {
      $this->validate($request, [
        'sub_category' => 'required|numeric|exists:sub_categories,id',
      ]);

      $product->sub_category = SubCategory::find($request->sub_category)->id;
    }

    if ($request->image) {
      $this->validate($request, [
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2000',
      ]);
      Storage::delete('public/product' . $product->img);
      $imageName = time() . '.' . $request->image->extension();
      Storage::putFileAs('public/product', $request->image, $imageName, 'public');

      $product->img = $imageName;
    }

    $product->save();

    return redirect()->route('product.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param $id
   * @return RedirectResponse|void
   */
  public function destroy($id)
  {
    Product::deleted($id);

    return redirect()->route('product.index');
  }
}
