<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Illuminate\Support\Collection;
use Livewire\Component;

class Popolarmovie extends Component
{
    public $genre;
    public $page = 1;
    public $query;

    public function mount($genre)
    {
        $this->genre = $genre;
    }

    public function loadPage($page)
    {
        $this->page = $page;
    }

    public function render()
    {

        if (!empty(trim($this->query))) {
            $api = Movie::get_movie_genre_query($this->genre, $this->page, $this->query);
        } else {

            $api = Movie::get_movie_genre($this->genre, $this->page);
        }

        $movies = Collection::make($api);
        $previous = $this->page > 1 ? $this->page - 1 : null;
        $next = $movies->count() == 20 ? $this->page + 1 : null;

        return view('livewire.popolarmovie', compact('movies', 'previous', 'next'))->extends('layout.movie')->section('container');
    }
}
