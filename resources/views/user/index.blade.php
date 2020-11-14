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
  <div class="card border-0 shadow-sm mb-4">
    <div class="card-header border-0 bg-none">
      <div class="col-auto align-self-center">
        <div class="form-group">
          <label for="search-user">Filter</label>
          <input type="text" class="form-control" id="search-user" onkeyup="refreshTable()">
        </div>
      </div>
    </div>
    <div class="card-body">
      <table id="user-table" class="table display responsive w-100" style="width:100%;">
        <thead>
        <tr>
          <th style="width:5px">ID</th>
          <th style="width:250px">Name</th>
          <th style="width:50px">Username</th>
          <th style="width:50px">Action</th>
        </tr>
        </thead>
        <tbody>
        <template id="template-user-row">
          <tr>
            <td class="id"></td>
            <td>
              <div class="media">
                <figure class="avatar avatar-40 mr-2">
                  <img class="img" src="{{ asset('##img##') }}" alt="image">
                </figure>
                <div class="media-body">
                  <p class="name text-template-primary-light"></p>
                </div>
              </div>
            </td>
            <td class="username"></td>
            <td>
              <a class="detail btn btn-primary btn-sm btn-block" href="{{ route('user.update', '##username##') }}">
                EDIT
              </a>
            </td>
          </tr>
        </template>
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('addJs')
  <script>
    const table = document.querySelector("#user-table")
    const row = document.querySelector('#template-user-row').content.querySelector("tr");

    $(function () {
      refreshTable();
    });

    async function refreshTable(e) {
      if (e)
        e.preventDefault();
      const filter = document.getElementById('search-user').value;
      const response = await fetch("{{ route('user.filter', '##filter##') }}".replace("##filter##", filter), {
        method: 'GET',
        headers: {
          Accept: "application/json",
          "X-CSRF-TOKEN": $("input[name='_token']").val()
        }
      });
      if (response && response.ok) {
        const users = await response.json();
        const old_tbody = table.querySelector("tbody");
        const new_tbody = document.createElement('tbody');
        for (const user of users) {
          // console.log(user)
          const newRow = row.cloneNode(true);
          newRow.querySelector(".id").innerText = user.id;
          newRow.querySelector(".name").innerText = user.name;
          newRow.querySelector(".username").innerText = user.username;
          if (user.img) {
            newRow.querySelector(".img").src = user.img
          }
          newRow.querySelector(".detail").href = newRow.querySelector(".detail").href.replace("##username##", user.id)
          new_tbody.appendChild(newRow);
        }
        if (old_tbody)
          old_tbody.parentNode.replaceChild(new_tbody, old_tbody)
        else
          table.appendChild(new_tbody)
      }
    }
  </script>
@endsection