<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowController extends Controller
{
    public function tvShows()
    {
        $genreList = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=8a9121945fb215b83aac6b1896a8adfe')
            ->json()['genres'];
        $popularTvShows = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=8a9121945fb215b83aac6b1896a8adfe')
            ->json()['results'];
        $popularTvShowAiring = Http::get('https://api.themoviedb.org/3/tv/airing_today?api_key=8a9121945fb215b83aac6b1896a8adfe')
            ->json()['results'];
        return view('tvShows.index', compact(['popularTvShows', 'genreList', 'popularTvShowAiring']));
    }
    public function ShowTvShows($id)

    {
        $TvShow = Http::get('https://api.themoviedb.org/3/tv/' . $id . '?api_key=8a9121945fb215b83aac6b1896a8adfe&append_to_response=credits,videos,images')
            ->json();
        return view('tvShows.show', compact(['TvShow']));
    }
}
