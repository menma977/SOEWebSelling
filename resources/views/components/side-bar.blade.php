<div class="sidebar">
  <!-- Logo sidebar -->
  <a href="" class="logo">
    <img src="{{ asset('assets/img/logoicon.svg') }}" alt="" class="logo-icon">
    <div class="logo-text">
      <h5 class="fs22 mb-0">SOE Web <sup class="badge badge-danger">SELL</sup></h5>
      <p class="text-uppercase fs11">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
    </div>
  </a>
  <!-- Logo sidebar ends -->

  <!-- Navigation menu sidebar-->
  <h6 class="subtitle fs11">Navigation Menu</h6>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="material-icons icon">dashboard</i>
        <span>Dashboard</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('user.index') }}">
        <i class="material-icons icon">people</i>
        <span>List User</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="material-icons icon">assignment</i>
        <span>List Supplier</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="material-icons icon">assignment</i>
        <span>List Category</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="material-icons icon">assignment</i>
        <span>List Sub Category</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="material-icons icon">assignment</i>
        <span>List Product</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="javascript:void(0)">
        <i class="material-icons icon">dashboard</i>
        <span>Dashboard</span>
        <i class="material-icons arrow">expand_more</i>
      </a>
      <div class="nav flex-column">
        <div class="nav-item">
          <a class="nav-link" href="#">
            <span>Production</span>
          </a>
        </div>
      </div>
    </li>
  </ul>
  <!-- Navigation menu sidebar ends -->
</div>