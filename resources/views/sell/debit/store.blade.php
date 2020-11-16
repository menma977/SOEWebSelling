@extends('components.app')

@section('subHeader')
  <div class="row submenu">
    <div class="container-fluid" id="submenu-container">
      <div class="row">
        <nav class="navbar col-12">
          <div class="dropdown mr-auto d-flex d-sm-none">
            <button class="btn dropdown-toggle btn-sm btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dashboard
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item {{ request()->is(['dashboard']) ? 'active' : '' }}" href="{{ route('dashboard') }}">dashboard</a>
              <a class="dropdown-item {{ request()->is(['debit']) ? 'active' : '' }}" href="{{ route('sell.debit') }}">Modal</a>
              <a class="dropdown-item {{ request()->is(['credit']) ? 'active' : '' }}" href="{{ route('sell.credit') }}">Sell</a>
            </div>
          </div>
          <ul class="nav nav-pills mr-auto d-none d-sm-flex">
            <li class="nav-item ">
              <a class="nav-link {{ request()->is(['dashboard']) ? 'active' : '' }}" href="{{ route('dashboard') }}">dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is(['debit']) ? 'active' : '' }}" href="{{ route('sell.debit') }}">Modal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is(['credit']) ? 'active' : '' }}" href="{{ route('sell.credit') }}">Sell</a>
            </li>
          </ul>
          <div class="form-inline ml-auto ml-sm-3">
            <div class="form-control form-control-sm">
              <span id="time"></span> <i class="material-icons avatar avatar-26 text-template-primary cal-icon">event</i>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="card border-0 shadow-sm mb-4">
    <form id="_up" action="{{ route('sell.debit') }}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group ">
          <label for="_product">List Product</label>
          <select class="form-control @error('product') is-invalid @enderror" name="product" id="_product">
            @foreach($product as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
          @error('product')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="_description">Description</label>
            <input type="text" id="_description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
            @error('description')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="_amount">Amount</label>
            <input type="number" id="_amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}">
            @error('amount')
            <div class="alert alert-danger" role="alert">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </form>
  </div>
@endsection