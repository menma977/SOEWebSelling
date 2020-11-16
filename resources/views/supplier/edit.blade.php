@extends('components.app')

@section('subHeader')
  <div class="row submenu">
    <div class="container-fluid" id="submenu-container">
      <div class="row">
        <nav class="navbar col-12">
          <div class="dropdown mr-auto d-flex d-sm-none">
            <button class="btn dropdown-toggle btn-sm btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Supplier
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item {{ request()->is(['supplier']) ? 'active' : '' }}" href="{{ route('supplier.index') }}">Index</a>
              <a class="dropdown-item {{ request()->is(['supplier/*']) ? 'active' : '' }}" href="{{ route('supplier.store') }}">Create/Edit</a>
            </div>
          </div>
          <ul class="nav nav-pills mr-auto d-none d-sm-flex">
            <li class="nav-item ">
              <a class="nav-link {{ request()->is(['supplier']) ? 'active' : '' }}" href="{{ route('supplier.index') }}">Index</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is(['supplier/*']) ? 'active' : '' }}" href="{{ route('supplier.store') }}">Create/Edit</a>
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
  <div class="row">
    <div class="col-12 col-md-11 col-lg-10 col-xl-8 mx-auto align-self-center">
      <div class="card shadow-sm border-0 mb-4">
        <form enctype="multipart/form-data" action="{{ route('supplier.update', $supplier->id) }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-10 mx-auto">
                <h5 class="m-0">Update Supplier</h5>
                <hr>
                <div class="form-group row">
                  <div class="col-lg-6 col-md-6">
                    <label for="_name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="_name" value="{{ old('name') ?: $supplier->name }}">
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <label for="_phone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="_phone" value="{{ old('phone') ?: $supplier->phone }}">
                    @error('phone')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="_address">Address</label>
                  <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="_address" value="{{ old('address') ?: $supplier->address }}">
                  @error('address')
                  <div class="alert alert-danger" role="alert">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('supplier.index')}}" class="btn btn-outline-light">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Done</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection