<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|View|Response
   */
  public function index()
  {
    return view('category.index');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @param string $id
   * @return RedirectResponse
   * @throws ValidationException
   */
  public function store(Request $request, $id = "")
  {
    if ($id) {
      $this->validate($request, [
        'name' => 'required|string',
      ]);
      $category = Category::find($id);
      $category->name = $request->name;
      $category->save();
    } else {
      $this->validate($request, [
        'name' => 'required|string|unique:categories',
      ]);
      $category = new Category();
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
      $data = Category::where('name', 'like', "%" . $filter . "%")->get();
    } else {
      $data = Category::take(100)->get();
    }

    return response()->json($data, 200);
  }

  /**
   * @param $id
   * @return RedirectResponse
   */
  public function destroy($id)
  {
    Category::deleted($id);

    return redirect()->back();
  }
}
