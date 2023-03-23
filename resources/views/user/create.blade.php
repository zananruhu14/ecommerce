@extends('layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah User</h1>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form method="post" action="/sikeu/users" class="row g-3">
    @csrf

    <div class="col-md-12">
      <label for="tpq_id" class="form-label">Lembaga</label>
      <select class="form-select" name="departemen_id">
        @foreach ($departemens as $departemen)
        <option value="{{ $departemen->id }}">{{ $departemen->nama }}</option>
        @endforeach
      </select>
  </div>
    <div class="col-md-6">
        <label class="form-label">Nama Bendahara:</label>
        <input type="text" class="form-control @error('name') is-invalid
        @enderror" name="name" id="name" required >

        @error('name')
        <div class="invalid-feedback">
     {{ $message }}
        </div>
        @enderror

      </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid
        @enderror" name="email" id="email" required >
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    <div class="col-md-6">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
          @error('password')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
      </div>


      <button type="submit" class="btn btn-primary">Tambah User</button>
    </div>

  </form>

@endsection

