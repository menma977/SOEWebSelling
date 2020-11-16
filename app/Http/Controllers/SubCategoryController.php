<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SubCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View|Response
   */
  public function index()
  {
    $category = Category::all();

    $data = [
      'category' => $category
    ];

    return view('category.sub.index', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @param string $id
   * @return RedirectResponse|Response
   * @throws ValidationException
   */
  public function store(Request $request, $id = "")
  {
    if ($id) {
      $this->validate($request, [
        'category' => 'required|integer|exists:categories,id',
        'name' => 'required|string',
      ]);
      $category = SubCategory::find($id);
      $category->category = $request->category;
      $category->name = $request->name;
      $category->save();
    } else {
      $this->validate($request, [
        'category' => 'required|integer|exists:categories,id',
        'name' => 'required|string',
      ]);
      $category = new SubCategory();
      $category->category = $request->category;
      $category->name = $request->name;
      $category->save();
    }

    return redirect()->back();
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
      $data = SubCategory::where('name', 'like', "%" . $filter . "%")->get();
    } else {
      $data = SubCategory::take(100)->get();
    }

    $data->map(function ($item) {
      $item->category = Category::withTrashed()->find($item->category)->name;
    });

    return response()->json($data, 200);
  }

  /**
   * @param $id
   * @return RedirectResponse
   * @throws \Exception
   */
  public function destroy($id)
  {
    SubCategory::deleted($id);

    return redirect()->back();
  }
}
