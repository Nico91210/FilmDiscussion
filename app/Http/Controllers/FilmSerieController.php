<?php

namespace App\Http\Controllers;

use App\Models\FilmSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmSerieController extends Controller
{
    public function __construct()
    {
        $this->middleware("admin")->only(["create", "edit"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ajouterFilm");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'dateSortie' => 'required|date',
            'nombreEpisode' => 'digits_between:0,9999|nullable',
            'duree' => 'digits_between:0,99999|nullable',
            'resume' => 'required',
            'production' => 'required',
            'affiche' => 'image'
        ]);
        
        $filmSerie = new FilmSerie;
        $filmSerie->titre = $request->input("titre");
        $filmSerie->date_sortie = $request->input("dateSortie");
        $filmSerie->type = $request->input("type");
        $filmSerie->nombreEpisode = $request->input("nombreEpisode");
        $filmSerie->duree = $request->input("duree");
        $filmSerie->resume = $request->input("resume");
        $filmSerie->production = $request->input("production");
        if ($request->hasFile("affiche"))
        {
            $filmSerie->affiche = $request->file("affiche")->store("affiches", 'public');
        }
        
        $filmSerie->save();

        $filmSerie->genres()->attach($request->input("genres"));

        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilmSerie  $filmSerie
     * @return \Illuminate\Http\Response
     */
    public function show(FilmSerie $filmSerie)
    {
        return view("film_serie", ["filmSerie" => $filmSerie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilmSerie  $filmSerie
     * @return \Illuminate\Http\Response
     */
    public function edit(FilmSerie $filmSerie)
    {
        return view("modifierFilm", ["filmSerie" => $filmSerie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilmSerie  $filmSerie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FilmSerie $filmSerie)
    {
        $filmSerie->titre = $request->input("titre");
        $filmSerie->date_sortie = $request->input("dateSortie");
        $filmSerie->type = $request->input("type");
        $filmSerie->nombreEpisode = $request->input("nombreEpisode");
        $filmSerie->duree = $request->input("duree");
        $filmSerie->resume = $request->input("resume");
        $filmSerie->production = $request->input("production");
        if ($request->hasFile("affiche"))
        {
            $filmSerie->affiche = $request->file("affiche")->store("affiches", 'public');
        }
        
        $filmSerie->save();

        $filmSerie->genres()->sync($request->input("genres"));

        return redirect()->route("home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilmSerie  $filmSerie
     * @return \Illuminate\Http\Response
     */
    public function destroy(FilmSerie $filmSerie)
    {
        $filmSerie->genres()->detach();
        $filmSerie->delete();
        return redirect()->route("home");
    }

    public function search(Request $request)
    {
        if ($request->ajax() && $request->search != "")
        {
            $films = DB::table("film_series")->where('titre', 'like', $request->search.'%')->get();
            return view("searchResult", ["films"=>$films]);
        }
    }
}
