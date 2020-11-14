@extends('components.login-layout')

@section('content')
  <div class="col-12 col-md-6 col-lg-5 col-xl-4  align-self-center">
    <div class="card border-0 shadow-lg blur elevation-4">
      <div class="card-body py-5">
        <h5 class="font-weight-light mb-1 text-mute-high">Welcome,</h5>
        <h3 class="font-weight-normal mb-4">Please Sign In</h3>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="card  mb-2 overflow-hidden">
            <div class="card-body p-0">
              <label for="_username" class="sr-only">Username</label>
              <input type="text" id="_username" name="username" class="form-control rounded-0 border-0 @error('username') is-invalid @enderror" placeholder="Username" required="" autofocus="">
              @error('username')
              <small class="text-danger">{{ $message }}</small>
              @enderror
              <hr class="my-0">
              <label for="_password" class="sr-only">Password</label>
              <input type="password" id="_password" name="password" class="form-control rounded-0 border-0 @error('password') is-invalid @enderror" placeholder="Password" required="">
              @error('password')
              <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="my-3 row">
            <div class="col-12 col-md py-1">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="_remember" name="remember" checked="">
                <label class="custom-control-label" for="_remember">Remember Me</label>
              </div>
            </div>
          </div>
          <div class="mb-0">
            <button type="submit" class=" btn btn-primary btn-block">Sign In <i class="material-icons md-18">arrow_forward</i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection