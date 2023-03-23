<div>
    <header>
        <div class="page-header bg-gradient-dark" style="min-height: 10vh;">
        </div>
        <div class="page-header min-vh-85">
        <div class="position-absolute border-radius-lg border-top-start-radius-0 border-top-end-radius-0 border-bottom-end-radius-0 fixed-top ms-auto w-50 h-100 z-index-0 d-none d-sm-none d-md-block"
        style="background-image: url('{{ "https://image.tmdb.org/t/p/w500/" . $movies["poster_path"] }}'); background-size:cover;">
        </div>
        <div class="container">
        <div class="row">
        <div class="col-lg-7 d-flex justify-content-center flex-column">
        <div class="card card-body blur d-flex justify-content-center px-5 shadow-lg mt-lg-5 mt-3 py-5">
        <h1 class="text-gradient text-primary mb-0">{{ $movies['original_name'] }}</h1>
        <h3 class="mt-2">Overview</h3>
        <p class="lead pe-sm-5 me-sm-5">{{ $movies["overview"] }} </p>
        {{-- <a href="https://www.youtube.com/watch?v={{ $movies['videos']['results'][1]['key'] }}">
            <h5 class="mt-3 text-primary">Play Trailer</h5>
            </a> --}}

        </div>
        </div>

        </div>
        </div>
        </div>
        </header>


        <section class="py-5 mt-5">
        <div class="container">
        <div class="row">
        <div class="col-lg-12 ms-auto me-auto">
        <h6 class="opacity-7 text-uppercase font-weight-bolder text-sm text-center">The Cast</h6>
        <h3 class="title text-center">Top Billed Cast</h3>

        </div>
        </div>
        <section class="py-7 position-relative">
        <div id="carousel-testimonials" class="carousel slide carousel-team">
        <div class="carousel-inner">

            @foreach ($movies['credits']['cast'] as $cast)

        <div class="carousel-item  {{ $loop->first ? 'active' : '' }}">
        <div class="container">
        <div class="row align-items-center">
        <div class="col-md-5 me-lg-auto position-relative">

        <h1 class="text-dark display-3 font-weight-bolder fadeIn2 fadeInBottom">{{ $cast['name'] }}</h1>
        <p class="my-4 lead text-dark fadeIn2 fadeInBottom">
            {{ $cast['character'] }}
        </p>
        </div>
        <div class="col-md-5 ms-lg-auto">
        <div class="p-3">
         <img class="w-100 border-radius-md max-height-600 fadeIn2 fadeInBottom" src="{{ 'https://image.tmdb.org/t/p/w500/' . $cast['profile_path'] }}" alt="First slide">
        </div>
        </div>
        </div>
        </div>
        </div>

        @endforeach

        </div>
        <div class="position-relative mt-n6">
        <a class="carousel-control-prev text-dark position-absolute bottom-0 start-0" href="#carousel-testimonials" role="button" data-bs-slide="prev">
        <i class="fas fa-2x fa-chevron-left position-absolute start-0 ms-3"></i>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-dark position-absolute bottom-0 start-0 ms-4" href="#carousel-testimonials" role="button" data-bs-slide="next">
        <i class="fas fa-2x fa-chevron-right"></i>
        <span class="sr-only">Next</span>
        </a>
        </div>
        </div>

        </section>
        </div>

        <div class="container">
        <div class="row">
        <div class="col-lg-8 ms-auto me-auto mt-7">
            <div class="movie-recommendation">
                <div class="container my-5">
                  <h2 class="text-center text-uppercase mb-4">Recommendations</h2>
                  <div class="row row-cols-2 row-cols-md-4 g-4">
                    @foreach ($movieRecommendations as $movie)
                      @if ($loop->index < 8)
                        <div class="col">
                          <div class="card h-100">
                            <a href="/test/{{ $movie['id']}}">
                              <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" class="card-img-top rounded-lg" alt="{{ $movie['original_name'] }}">
                            </a>
                            <div class="card-body">
                              <h5 class="card-title">{{ $movie['original_name'] }}</h5>
                              <p class="text-gradient text-dark mb-2 text-sm">{{ $movie['vote_average'] * 10 . '%' }} | {{ $movie['popularity'] }}</p>
                            </div>
                          </div>
                        </div>
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>

        </div>
        </div>
        </section>


</div>
