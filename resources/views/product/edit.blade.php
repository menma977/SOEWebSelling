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
              <a class="dropdown-item {{ request()->is(['product']) ? 'active' : '' }}" href="{{ route('product.index') }}">Index</a>
              <a class="dropdown-item {{ request()->is(['product/*']) ? 'active' : '' }}" href="{{ route('product.store') }}">Create/Edit</a>
            </div>
          </div>
          <ul class="nav nav-pills mr-auto d-none d-sm-flex">
            <li class="nav-item ">
              <a class="nav-link {{ request()->is(['product']) ? 'active' : '' }}" href="{{ route('product.index') }}">Index</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is(['product/*']) ? 'active' : '' }}" href="{{ route('product.store') }}">Create/Edit</a>
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
        <form enctype="multipart/form-data" action="{{ route('product.update', $product->id) }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-10 mx-auto">
                <h5 class="m-0">Create New Product</h5>
                <hr>
                <div class="form-group row">
                  <div class="col-lg-6 col-md-6">
                    <label for="_supplier">Supplier</label>
                    <select class="form-control @error('sub_category') is-invalid @enderror" name="supplier" id="_supplier">
                      @foreach($supplier as $item)
                        <option value="" {{ old('supplier') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                      @endforeach
                    </select>
                    @error('supplier')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <label for="_sub_category">Category</label>
                    <select class="form-control @error('sub_category') is-invalid @enderror" name="sub_category" id="_sub_category">
                      @foreach($subCategory as $item)
                        <option value="" {{ old('sub_category') == $item->id ? 'selected' : '' }}>{{ $item->category->name }} - {{ $item->name }}</option>
                      @endforeach
                    </select>
                    @error('sub_category')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="_name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="_name" value="{{ old('name') ?: $product->name }}">
                  @error('name')
                  <div class="alert alert-danger" role="alert">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <hr>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Image</label>
                    @error('image')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                    <br>
                    <label for="_image" class="custom-dropzone text-center align-items-center col-md-12 @error('image') is-invalid @enderror" id="my_dropzone">
                      <div class="dz-default dz-message" data-dz-message="">
                        <img id="show_image" src="{{ $product->img ? asset($product->img) : asset('assets/img/logoicon.svg') }}" alt="" class="w-50">
                        <p>Click here to upload</p>
                      </div>
                    </label>
                    <input type="file" class="form-control" name="image" id="_image" value="{{ old('image') }}" style="display: none;">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('supplier.index')}}" class="btn btn-outline-light">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('addJs')
  <script>
    $(function () {
      $('#_image').change(function () {
        changeImage(this);
      });

      function changeImage(input) {
        let reader;
        if (input.files && input.files[0]) {
          reader = new FileReader();
          reader.onload = function (e) {
            $('#show_image').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
    });
  </script>
@endsection