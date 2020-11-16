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
      <a class="nav-link" href="{{ route('supplier.index') }}">
        <i class="material-icons icon">assignment</i>
        <span>List Supplier</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('category.index') }}">
        <i class="material-icons icon">assignment</i>
        <span>List Category</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('product.index') }}">
        <i class="material-icons icon">assignment</i>
        <span>List Product</span>
      </a>
    </li>
  </ul>
</div>