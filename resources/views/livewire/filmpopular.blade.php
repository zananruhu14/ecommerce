<div>
    <header>
        <div class="page-header bg-gradient-dark" style="min-height: 10vh;">
        </div>
        </header>
    <div class="row mt-4">
            <div class="col-lg-2 mb-lg-0 mb-3 ">

                    <label for="">Sort By:</label>
                    <select class="form-control" name="choices-button" id="choices-button" placeholder="Departure">
                        <option value="Choice 1" selected="">Popularity Descending</option>
                        <option value="Choice 2">Popularity Ascending</option>
                        <option value="Choice 1" >Rating Descending</option>
                        <option value="Choice 2">Rating Ascending</option>
                        <option value="Choice 1" >Release Date Descending</option>
                        <option value="Choice 2">Release Date Ascending</option>
                        <option value="Choice 1" >Title (A-Z)</option>
                        <option value="Choice 2">Title (Z-A)</option>
                      </select>


                      <div class="input-group mt-3">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input class="form-control" type="text" wire:model="query">
                    </div>



                </div>
                <div class="col-lg-10">
                    <section class="py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 mx-auto text-center">
                                <h2 class="text-uppercase">{{ $genre }}</h2>
                                </div>
                            </div>
                            <div class="row mt-md-5 mt-4">
                                @foreach ($movies as $movie)
                                <div class="col-lg-3 col-6 mb-lg-2 mb-4">
                                <div class="card card-profile card-plain">
                                    <div class="card-body text-center bg-white shadow-lg border-radius-lg p-3">
                                    <a href="/testfilm/{{ $movie->id }}">
                                        <img class="w-100 border-radius-md" src="https://image.tmdb.org/t/p/w500/{{ $movie->poster_path }}">

                                    <h5 class="mt-3 mb-1 d-md-block d-none">{{ $movie->original_name }}</h5>
                                </a>
                                    <p class="text-gradient text-dark mb-2 text-sm">{{ $movie->vote_average * 10 . '%' }} | {{ $movie->popularity }}</p>

                                    </div>
                                </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-between mb-3">
                                        @if ($previous)
                                        <button wire:click="loadPage({{ $previous }})" class="btn btn-dark">&laquo; Previous</button>
                                        @else
                                        <button class="btn btn-dark" disabled>&laquo; Previous</button>
                                        @endif

                                        @if ($next)
                                        <button wire:click="loadPage({{ $next }})" class="btn btn-dark">Next &raquo;</button>
                                        @else
                                        <button class="btn btn-dark" disabled>Next &raquo;</button>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            </div>
                        </section>


            </div>
        </div>
    </div>
</div>
