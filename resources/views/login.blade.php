@extends('layout.movie')
@section('container')
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../../../assets/img/curved-images/curved9.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-5 text-center mx-auto">
    <h1 class="text-white mb-2 mt-5">Welcome!</h1>
    <p class="text-lead text-white">Please Login!</p>
    </div>
    </div>
    </div>
    </div>
    <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
    <div class="card z-index-0">
    <div class="card-header text-center pt-4">
    <h5>Sign in</h5>
    </div>

    <div class="card-body">
    <form role="form" class="text-start" action="/login" method="POST">
        @csrf
    <div class="mb-3">
    <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email">
    </div>
    <div class="mb-3">
    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password">
    </div>

    <div class="text-center">
    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Sign in</button>
    </div>
    <div class="mb-2 position-relative text-center">
    <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
    or
    </p>
    </div>
    <div class="text-center">
        <a href="/register">
    <button type="button" class="btn bg-gradient-dark w-100 mt-2 mb-4">Sign up</button>
</a>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </main>
@endsection
