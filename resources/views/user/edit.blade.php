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
              <a class="dropdown-item {{ request()->is(['user']) ? 'active' : '' }}" href="{{ route('user.index') }}">Index</a>
              <a class="dropdown-item {{ request()->is(['user/*']) ? 'active' : '' }}" href="{{ route('user.store') }}">Create/Edit</a>
            </div>
          </div>
          <ul class="nav nav-pills mr-auto d-none d-sm-flex">
            <li class="nav-item ">
              <a class="nav-link {{ request()->is(['user']) ? 'active' : '' }}" href="{{ route('user.index') }}">Index</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is(['user/*']) ? 'active' : '' }}" href="{{ route('user.store') }}">Create/Edit</a>
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
        <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-10 mx-auto">
                <h5 class="m-0">Create New User</h5>
                <hr>
                <div class="form-group row">
                  <div class="col-lg-12 col-md-12">
                    <label for="_name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="_name" value="{{ old('name') ?: $user->name }}">
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <hr>
                <div class="form-group text-center">
                  <small>Ignore when not change</small>
                </div>
                <div class="form-group row">
                  <div class="col-lg-6 col-md-6">
                    <label for="_password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="_password" value="{{ old('password') }}">
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <label for="_password_confirmation">Password Confirmation</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="_password_confirmation"
                           value="{{ old('password_confirmation')}}">
                    @error('password_confirmation')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
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
                        <img id="show_image" src="{{ $user->img ? asset($user->img) : asset('assets/img/logoicon.svg') }}" alt="" class="w-50">
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
            <a href="{{ route('user.index')}}" class="btn btn-outline-light">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Done</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('addCss')
  <!-- dataTables picker -->
  <link href="{{ asset('assets/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/DataTables-1.10.18/css/responsive.dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/DataTables-1.10.18/css/fixedHeader.dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/DataTables-1.10.18/css/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('addJs')
  <!-- DataTables js  -->
  <script src="{{ asset('assets/vendor/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/DataTables-1.10.18/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/DataTables-1.10.18/js/dataTables.fixedHeader.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/DataTables-1.10.18/js/dataTables.fixedColumns.min.js') }}"></script>

  <script>
    $(function () {
      $('.datatable').DataTable({
        'fixedHeader': true,
        'responsive': true,
        'searching': false,
        "bLengthChange": false,
        scrollY: 220,
      });

      $('#_image').change(function () {
        changeImage(this);
      });

      function changeImage(input) {
        let reader;
        if (input.files && input.files[0]) {
          reader = new FileReader();
          reader.onload = function (e) {
            //$('#my_dropzone').remove();
            $('#show_image').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
    });
  </script>
@endsection