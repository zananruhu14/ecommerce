@extends('layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
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
  <form method="post" action="/sikeu/users/{{ $user->id }}" class="row g-3">
    @method('PUT')
    @csrf
    <div class="col-md-12">
        <label for="tpq_id" class="form-label">Lembaga</label>
        <select class="form-select" name="departemen_id">
            @if(auth()->user()->departemen_id == 1)
            @foreach ($departemens as $departemen)
          <option value="{{ $departemen->id }}" >{{ $departemen->nama }}</option>
          @endforeach
            @else
        <option  value=" {{ auth()->user()->departemen_id }}" selected reaonly>{{auth()->user()->departemen->nama}}</option>
        @endif

        </select>
    </div>


    <div class="col-md-6">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid
        @enderror" name="name" id="name" required value="{{ old('name', $user->name) }}">

        @error('name')
        <div class="invalid-feedback">
     {{ $message }}
        </div>
        @enderror

      </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid
        @enderror" name="email" id="email" required value="{{ old('email', $user->email) }}">
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

      <button type="submit" class="btn btn-primary">Edit User</button>
    </div>

  </form>

@endsection

