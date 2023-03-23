@extends('layout.movie')
@section('container')

<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../../../assets/img/curved-images/curved6.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-5 text-center mx-auto">
    <h1 class="text-white mb-2 mt-5">Welcome!</h1>
    <p class="text-lead text-white">Please Register</p>
    </div>
    </div>
    </div>
    </div>
    <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
    <div class="card z-index-0">
    <div class="card-header text-center pt-4">
    <h5>Register</h5>
    </div>
    <div class="row px-xl-5 px-sm-4 px-3">


    <div class="card-body">
    <form role="form" action="/register" method="POST">
        @csrf
    <div class="mb-3">
    <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="name">
    </div>
    <div class="mb-3">
    <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email">
    </div>
    <div class="mb-3">
    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password">
    </div>

    <div class="text-center">
    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
    </div>
    <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </main>
@endsection
