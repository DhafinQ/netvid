<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Serial;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;


class SearchController extends Controller
{
    public function index(Request $request)
    {

        $results = Search::add(Film::class, 'judul')
        ->add(Serial::class, 'judul')
    
        ->search($request->get('term'));

        // dd($results);
        
        return view('search' , compact('results'));
    }
}
