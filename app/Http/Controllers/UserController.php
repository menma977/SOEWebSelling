<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
  /**
   * @return Application|Factory|View
   */
  public function index()
  {
    return view('user.index');
  }

  /**
   * @param string $filter
   * @return JsonResponse
   */
  public function filter($filter = "")
  {
    if ($filter) {
      $users = User::where('username', 'like', "%" . $filter . "%")->orWhere('name', 'like', "%" . $filter . "%")->get();
    } else {
      $users = User::take(50)->get();
    }
    $users->map(function ($item) {
      if ($item->img) {
        $item->img = Storage::url('users/' . $item->img);
      } else {
        $item->img = "assets/img/user3.png";
      }
    });
    return response()->json($users, 200);
  }

  /**
   * @return Application|Factory|View
   */
  public function create()
  {

    return view('user.create');
  }

  /**
   * @param Request $request
   * @return Application|Factory|View|RedirectResponse
   * @throws ValidationException
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|string',
      'username' => 'required|string|unique:users,username',
      'password' => 'required|string|min:6|same:password_confirmation',
      'image' => 'required|image|mimes:jpg,jpeg,png|max:2000',
    ]);

    $imageName = time() . '.' . $request->image->extension();
    Storage::putFileAs('public/users', $request->image, $imageName, 'public');

    $user = new User();
    $user->name = $request->name;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->img = $imageName;
    $user->save();

    return redirect()->route('user.index');
  }

  /**
   * @param $id
   * @return Application|Factory|View
   */
  public function edit($id)
  {
    $users = User::find($id);
    $users->img = Storage::url('users/' . $users->img);

    $data = [
      'user' => $users,
    ];

    return view('user.edit', $data);
  }

  /**
   * @param Request $request
   * @param $id
   * @return RedirectResponse
   * @throws ValidationException
   */
  public function update(Request $request, $id)
  {
    $user = User::find($id);
    if ($request->name) {
      $this->validate($request, [
        'name' => 'required|string',
      ]);
      $user->name = $request->name;
    }

    if ($request->password) {
      $this->validate($request, [
        'password' => 'required|string|min:6|same:password_confirmation',
      ]);
      $user->password = Hash::make($request->password);
    }

    if ($request->image) {
      $this->validate($request, [
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2000',
      ]);
      Storage::delete('public/users/' . $user->img);
      $imageName = time() . '.' . $request->image->extension();
      Storage::putFileAs('public/users', $request->image, $imageName, 'public');
      $user->img = $imageName;
    }
    $user->save();

    return redirect()->route('user.index');
  }
}
