<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use GuzzleHttp\Middleware;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class FilmController extends Controller
{

    public function __construct()
    {
        // Middleware only applied to these methods
        $this->middleware('auth', [
            'only' => [
                'update',
                'create',
                'watch'
            ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Film $data)
    {
        $news = $data->query()->where('tahun', '>=' , 2021)->get();
        $trends = $data->query()->where('rating', '>=' , 8.9)->get();
        $datas = $data->all();
        return view('films.film', compact('datas','news','trends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create_film');

        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFilmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilmRequest $request, Film $film)
    {
        $this->authorize('create_film');

        $data = $request->validated();

        $imagepath = request('poster')->store('filmposter', 'public');
        $image = Image::make(public_path("storage/{$imagepath}"))->fit(600 , 800);
        $image->save();

        $imageArray = ['poster'=>$imagepath];

        $coverpath = request('cover')->store('serialcover', 'public');
        $cover = Image::make(public_path("storage/{$coverpath}"))->fit(960 , 540);
        $cover->save();

        $coverArray = ['cover'=>$coverpath];

        $film->create(array_merge(
            $data,
            $imageArray,
            $coverArray
        ));
        
        return redirect()->route('film.index')->with('success', 'New Film Is Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $news = Film::query()->where('tahun', '>=' , 2020)->get();

        $films = Film::all();
        return view('films.show', compact('film','films','news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        $this->authorize('create_film');

        return view('films.edit' , compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilmRequest  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        $this->authorize('create_film');

        $data = $request->validated();

        if(request('poster')){
            $imagepath = request('poster')->store('filmposter', 'public');
            $image = Image::make(public_path("storage/{$imagepath}"))->fit(600 , 800);
            $image->save();
            $imageArray = ['poster'=>$imagepath];
        }
        if(request('cover')){
            $coverpath = request('cover')->store('serialcover', 'public');
            $cover = Image::make(public_path("storage/{$coverpath}"))->fit(600 , 800);
            $cover->save();
            $coverArray = ['cover'=>$coverpath];
        }

        $film->update(array_merge(
            $data,
            $imageArray ?? [],
            $coverArray ?? []
        ));

        return redirect()->route('film.index')->with('success', 'Film Is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $this->authorize('create_film');

        $film->delete();

        return redirect()->route('film.index')->with('success', 'Film Is Deleted!');
    }
}