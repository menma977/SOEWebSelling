<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sell;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
  /**
   * @return Application|Factory|View
   * @throws \Exception
   */
  public function index()
  {
    $dataChart = Sell::where('debit', 0)->orderBy('created_at', 'asc')->get()->groupBy(function ($item) {
      return $item->product;
    })->map(function ($item) {
      $item->type = 'bar';
      $item->label = Product::find($item[0]->product)->name;
      $item->data = $item->sum('credit');
      $item->backgroundColor = sprintf('#%06X', random_int(0, 0xFFFFFF));
      $item->borderColor = $item->backgroundColor;

      return $item;
    });

    $data = [
      'dataChart' => $dataChart,
    ];

    dump($dataChart);

    return view('dashboard', $data);
  }

  /**
   * @return Application|Factory|View
   */
  public function debitCreate()
  {
    $product = Product::all();

    $data = [
      'product' => $product,
    ];

    return view('sell.debit.store', $data);
  }

  /**
   * @param Request $request
   * @return RedirectResponse
   * @throws ValidationException
   */
  public function debitStore(Request $request)
  {
    $this->validate($request, [
      'product' => 'required|exists:products,id',
      'amount' => 'required|numeric|min:1',
      'description' => 'required|string'
    ]);

    $data = new Sell();
    $data->product = $request->product;
    $data->debit = number_format($request->amount, 0, '.', '');
    $data->description = $request->description;
    $data->save();

    return redirect()->back();
  }

  /**
   * @return Application|Factory|View
   */
  public function creditCreate()
  {
    $product = Product::all();

    $data = [
      'product' => $product,
    ];

    return view('sell.credit.store', $data);
  }

  /**
   * @param Request $request
   * @return RedirectResponse
   * @throws ValidationException
   */
  public function creditStore(Request $request)
  {
    $this->validate($request, [
      'product' => 'required|exists:products,id',
      'amount' => 'required|numeric|min:1',
      'description' => 'required|string'
    ]);

    $data = new Sell();
    $data->product = $request->product;
    $data->credit = number_format($request->amount, 0, '.', '');
    $data->description = $request->description;
    $data->save();

    return redirect()->back();
  }
}
