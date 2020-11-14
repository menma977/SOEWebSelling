<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Header extends Component
{
  /**
   * Get the view / contents that represent the component.
   *
   * @return View|string
   */
  public function render()
  {
    $image = Storage::url('users/'.Auth::user()->img);

    $data = [
      'image' => $image
    ];
    return view('components.header', $data);
  }
}
