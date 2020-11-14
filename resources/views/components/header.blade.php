<div class="row header">
  <div class="container-fluid " id="header-container">
    <div class="row">
      <nav class="navbar col-12 navbar-expand ">
        <button class="menu-btn btn btn-link btn-sm" type="button">
          <i class="material-icons">menu</i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown ml-0 ml-sm-4">
              <a class="nav-link dropdown-toggle profile-link" href="#" id="navbarDropdown6" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <figure class="rounded avatar avatar-30">
                  <img src="{{ $image ? asset($image) : asset('assets/img/user1.png') }}" alt="">
                </figure>
                <div class="username-text ml-2 mr-2 d-none d-lg-inline-block">
                  <h6 class="username"><span>Welcome,</span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h6>
                </div>
                <figure class="rounded avatar avatar-30 d-none d-md-inline-block">
                  <i class="material-icons">expand_more</i>
                </figure>
              </a>
              <div class="dropdown-menu dropdown-menu-right w-300 pt-0 overflow-hidden" aria-labelledby="navbarDropdown6">
                <div class="position-relative text-center rounded py-5">
                  <div class="background">
                    <img src="{{ asset('assets/img/background-part.png') }}" alt="">
                  </div>
                </div>
                <div class="text-center mb-3 top-60 z-2">
                  <figure class="avatar avatar-120 mx-auto shadow">
                    <img src="{{ $image ? asset($image) : asset('assets/img/user1.png') }}" alt="">
                  </figure>
                </div>
                <h5 class="text-center mb-0">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h5>
                <p class="text-center">{{ \Illuminate\Support\Facades\Auth::user()->username }}</p>
                <a class="dropdown-item border-top" href="#">
                  <div class="row">
                    <div class="col-auto align-self-center">
                      <i class="material-icons text-success">account_box</i>
                    </div>
                    <div class="col pl-0">
                      <p class="mb-0">My Profile</p>
                      <p class="small text-mute text-trucated">Update details and information</p>
                    </div>
                    <div class="col-auto align-self-center text-right pl-0">
                      <i class="material-icons text-mute small">chevron_right</i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item border-top" href="#">
                  <div class="row">
                    <div class="col-auto align-self-center">
                      <i class="material-icons text-info">account_balance_wallet</i>
                    </div>
                    <div class="col pl-0">
                      <p class="mb-0">My Wallet</p>
                      <p class="small text-mute text-trucated">Add Money or withdrow</p>
                    </div>
                    <div class="col-auto align-self-center text-right pl-0">
                      <i class="material-icons text-mute small">chevron_right</i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item border-top" href="#">
                  <div class="row">
                    <div class="col-auto align-self-center">
                      <i class="material-icons text-warning">date_range</i>
                    </div>
                    <div class="col pl-0">
                      <p class="mb-0">My Schedule</p>
                      <p class="small text-mute text-trucated">Appointments and schedules</p>
                    </div>
                    <div class="col-auto align-self-center text-right pl-0">
                      <i class="material-icons text-mute small">chevron_right</i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item border-top" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <div class="row">
                    <div class="col-auto align-self-center">
                      <i class="material-icons text-danger">exit_to_app</i>
                    </div>
                    <div class="col pl-0">
                      <p class="mb-0 text-danger">Logout</p>
                    </div>
                    <div class="col-auto align-self-center text-right pl-0">
                      <i class="material-icons text-mute small text-danger">chevron_right</i>
                    </div>
                  </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>