<div>
<header>
<div class="page-header min-vh-50" style="background-image: url('movie/background.jpg')">
<span class="mask bg-gradient-dark"></span>
<div class="container">
<div class="row">
<div class="col-lg-8 mx-auto text-white text-center">
<h2 class="text-white">Selamat datang</h2>
<p class="lead">An arrangement you make to have a hotel room, tickets, etc. at a particular time in the future</p>
</div>
</div>
</div>
</div>
<div class="position-relative overflow-hidden" style="height:36px;margin-top:-33px;">
<div class="w-full absolute bottom-0 start-0 end-0" style="transform: scale(2);transform-origin: top center;color: #fff;">
<svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
</svg>
</div>
</div>
<div class="container">
<div class="row bg-white shadow-lg mt-n6 border-radius-md pb-4 p-3 mx-sm-0 mx-1 position-relative">
<div class="col-lg-3 mt-lg-n2 mt-2">
<label class="">Genre</label>
<select class="form-control" id="choices-button" wire:model="genre">
<option value="Popular" selected="">Popular</option>
<option value="now_playing">Now Playing</option>
<option value="upcoming">Upcoming</option>
<option value="top_rated">Top Rated</option>
</select>
</div>
<div class="col-lg-9 mt-lg-n2 mt-2">
    <label class="text-center">Title</label>
    <div class="input-group">
        <span class="input-group-text"><i class="fas fa-search"></i></span>
        <input class="form-control" type="text" wire:model="query">
    </div>
</div>

</div>
</div>
</header>

<section class="pt-7 pb-0">
<div class="container">
<div class="row">
    @foreach ($movies as $movie)

<div class="col-lg-4 col-md-6">
<div class="card card-blog card-plain">
<div class="position-relative">
<a class="d-block blur-shadow-image" href="/test/{{ $movie->id }}">
<img src="https://image.tmdb.org/t/p/w500/{{ $movie->poster_path }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
</a>
</div>
<div class="card-body px-1 pt-3">
<p class="text-gradient text-dark mb-2 text-sm">{{ $movie->vote_average * 10 . '%' }} | {{ \Carbon\Carbon::parse($movie->release_date)->format('M d, Y') }}</p>
<a href="javascript:;">
<h5>
    {{ $movie->title }}
</h5>
</a>
<p>
{{ $movie->overview }}
</p>

</div>
</div>
</div>


@endforeach

</div>
</div>
</section>



<div class="page-header min-vh-100">
<div class="position-absolute fixed-top ms-auto w-50 h-100 rounded-3 z-index-0 d-none d-sm-none d-md-block me-n4" style="background-image: url('/assets/img/ivancik.jpg'); background-size: cover;">
</div>
<div class="container">
<div class="row">
<div class="col-lg-7 d-flex justify-content-center flex-column">
<div class="card card-body d-flex justify-content-center shadow-lg p-sm-5 blur align-items-center">
<h3 class="text-center">Contact us</h3>
<form id="contact-form" method="post" autocomplete="off">
<div class="card-body">
<div class="row">
<div class="col-md-6">
<label>First Name</label>
<div class="input-group mb-4">
<input class="form-control" placeholder="eg. Jimi" aria-label="First Name..." type="text">
</div>
</div>
<div class="col-md-6 ps-2">
<label>Last Name</label>
<div class="input-group">
<input type="text" class="form-control" placeholder="eg. Mikail" aria-label="Last Name...">
</div>
</div>
</div>
<div class="mb-4">
<label>Email Address</label>
<div class="input-group">
<input type="email" class="form-control" placeholder="eg. muhruhu@gmail.com">
</div>
</div>
<div class="form-group mb-4">
<label>Your message</label>
<textarea name="message" class="form-control" id="message" rows="4"></textarea>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-check form-switch mb-4">
<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
<label class="form-check-label" for="flexSwitchCheckDefault">I agree to the <a href="javascript:;" class="text-dark"><u>Terms and Conditions</u></a>.</label>
</div>
</div>
<div class="col-md-12">
<button type="submit" class="btn bg-gradient-dark w-100">Send Message</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
