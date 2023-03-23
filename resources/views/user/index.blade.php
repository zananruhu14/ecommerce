@extends('layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List User</h1>
  </div>
@if(session()->has('success'))
<div class="alert alert-success col-3" role="alert">
    {{ session('success') }}
  </div>
@endif
<livewire:adminuser></livewire:adminuser>

  @endsection

