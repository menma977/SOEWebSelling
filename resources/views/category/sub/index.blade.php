@extends('components.app')

@section('subHeader')
  <div class="row submenu">
    <div class="container-fluid" id="submenu-container">
      <div class="row">
        <nav class="navbar col-12">
          <div class="dropdown mr-auto d-flex d-sm-none">
            <button class="btn dropdown-toggle btn-sm btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Category
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item {{ request()->is(['category']) ? 'active' : '' }}" href="{{ route('category.index') }}">Category</a>
              <a class="dropdown-item {{ request()->is(['category/*']) ? 'active' : '' }}" href="{{ route('category.sub.index') }}">Sub Category</a>
            </div>
          </div>
          <ul class="nav nav-pills mr-auto d-none d-sm-flex">
            <li class="nav-item ">
              <a class="nav-link {{ request()->is(['category']) ? 'active' : '' }}" href="{{ route('category.index') }}">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is(['category/*']) ? 'active' : '' }}" href="{{ route('category.sub.index') }}">Sub Category</a>
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
    <form id="_up" action="{{ route('category.sub.store') }}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group ">
          <label for="_category">List Category</label>
          <select class="form-control @error('category') is-invalid @enderror" name="category" id="_category">
            @foreach($category as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
          @error('category')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="_name">Name</label>
          <input type="text" id="_name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
          @error('name')
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="card-footer">
        <dvi class="row">
          <div class="col-md-6">
            <button id="_cancel" type="button" class="btn btn-warning btn-block">Cancel</button>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
        </dvi>
      </div>
    </form>
  </div>

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
          <th style="width:250px">Category</th>
          <th style="width:250px">Name</th>
          <th style="width:50px">Edit</th>
          <th style="width:50px">Delete</th>
        </tr>
        </thead>
        <tbody>
        <template id="template-user-row">
          <tr>
            <td class="id"></td>
            <td class="category"></td>
            <td class="name"></td>
            <td>
              <a class="btn btn-primary btn-sm btn-block edit" id="##id##" name="##name##">
                EDIT
              </a>
            </td>
            <td>
              <a class="btn btn-danger btn-sm btn-block delete" href="{{ route('category.sub.destroy', '##id##') }}">
                Delete
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

      $(document).on("click", ".edit", function () {
        const url = "{{ route('category.sub.store', '#id') }}".replace('#id', $(this).attr('id'));
        $('#_up').attr('action', url);
        $('#_name').attr('value', $(this).attr('name'));
        $('#_name').focus();
      });

      $('#_cancel').on('click', function () {
        $('#_up').attr('action', "{{ route('category.sub.store') }}");
        $('#_name').attr('value', '');
        $('#_name').focus();
      });
    });

    async function refreshTable(e) {
      if (e)
        e.preventDefault();
      const filter = document.getElementById('search-user').value;
      const response = await fetch("{{ route('category.sub.show', '##filter##') }}".replace("##filter##", filter), {
        method: 'GET',
        headers: {
          Accept: "application/json",
          "X-CSRF-TOKEN": $("input[name='_token']").val()
        }
      });
      if (response && response.ok) {
        const dataset = await response.json();
        const old_tbody = table.querySelector("tbody");
        const new_tbody = document.createElement('tbody');
        for (const data of dataset) {
          const newRow = row.cloneNode(true);
          newRow.querySelector(".id").innerText = data.id;
          newRow.querySelector(".category").innerText = data.category;
          newRow.querySelector(".name").innerText = data.name;
          newRow.querySelector(".edit").id = newRow.querySelector(".edit").id.replace("##id##", data.id)
          newRow.querySelector(".edit").name = newRow.querySelector(".edit").name.replace("##name##", data.name)
          newRow.querySelector(".delete").href = newRow.querySelector(".delete").href.replace("##id##", data.id)
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