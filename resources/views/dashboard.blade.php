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
  <div class="row">
    @foreach($dataChart as $item)
      <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card border-0 shadow-sm overflow-hidden mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-auto text-center">
                <i class="material-icons icons md-36 icon-50" style="background-color: {{ $item->backgroundColor }} !important">monetization_on</i>
              </div>
              <div class="col pl-0">
                <p class="mb-0">{{ $item->label }}</p>
                <label class="font-weight-light"><small>Rp</small> {{ number_format($item->data, 0, ',', '.') }}</label>
              </div>
            </div>
            <div class="progress h-5 mt-2">
              <div class="progress-bar" role="progressbar" style="width: {{ $item->progress }}%;background-color: {{ $item->backgroundColor }} !important" aria-valuenow="0" aria-valuemin="0"
                   aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection