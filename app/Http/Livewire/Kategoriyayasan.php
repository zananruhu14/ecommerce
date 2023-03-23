<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Livewire\Component;

class Kategoriyayasan extends Component
{

    public $genre = "popular";
    public $query;

    public function render()
    {
        $client = new Client();

        if (!empty(trim($this->query))) {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/search/movie', [
                'query' => [
                    'api_key' => 'ce31100dc355960c4c9bb8f9b79e2c22',
                    'query' => $this->query,
                ],
            ]);
        } else {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $this->genre, [
                'query' => [
                    'api_key' => 'ce31100dc355960c4c9bb8f9b79e2c22',
                ],
            ]);
        }

        $moviesCollection = json_decode($response->getBody()->getContents())->results;
        $movies = Collection::make($moviesCollection);

        return view('livewire.kategoriyayasan', compact('movies'))->extends('layout.movie')->section('container');
    }
}
