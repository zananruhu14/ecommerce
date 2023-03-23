@extends('layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Lembaga</h1>
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
  <form method="post" action="/sikeu/departemen"  class="row g-3">
    @csrf
    <div class="col-md-4">
        <label for="nama" class="form-label">Nama Lembaga</label>
        <input type="text" class="form-control @error('nama')
            is-invalid
        @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
        @error('nama')
        <div class="invalid-feedback">
     {{ $message }}
        </div>
        @enderror
    </div>
        <button type="submit" class="btn btn-primary">Tambah Lembaga</button>
  </form>

@endsection

