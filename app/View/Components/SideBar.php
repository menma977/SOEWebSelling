<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideBar extends Component
{
  /**
   * Get the view / contents that represent the component.
   *
   * @return View|string
   */
  public function render()
  {
    return view('components.side-bar');
  }
}
