<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MovieId extends Component
{
    public $query;

    public function mount($query)
    {
        $this->query = $query;
    }

    public function render()
    {

        $api = Movie::get_movie_id($this->query);
        $movies = Collection::make($api);
        $api_2 = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI3ODVmZGEyMTU1M2E4ZGE1ZWUwZGZhMjNmMTAzZmJmMCIsInN1YiI6IjY0MTE0MTI4ZmU2YzE4MDBmOWJjZjc4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.LE-7QZlsOV9r4TSxtCCx7gK-xfYt1INgjTDbej1Duwg')
            ->get('https://api.themoviedb.org/3/movie/' . $this->query . '/recommendations')
            ->json()['results'];
        $movieRecommendations = Collection::make($api_2);

        return view('livewire.movie-id', compact('movies', 'movieRecommendations'))->extends('layout.movie')->section('container');
    }
}
