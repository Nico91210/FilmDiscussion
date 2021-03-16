<?php

namespace App\Http\Controllers;
use App\Models\FilmSerie;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only("post");
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        if ($post != null)
        {
            return view("post", ["post"=>$post]);
        }
        else
        {
            return abort(404);
        }
    }

    private function calculerMoyenne($id)
    {
        $not = 0.0;
        $compte = 0;
        foreach (DB::table("posts")->select("notes")->whereNotNull("notes")->where("film_serie_id", "=", $id)->get() as $post)
        {
            $compte += 1;
            $not += $post->notes;
        }

        $film = FilmSerie::findOrFail($id);
        if ($compte == 0)
        {
            $film->notes = null;
        }
        else
        {
            $moyennes_notes = $not/$compte;
            $film->notes = $moyennes_notes;
        }
        $film->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'avis' => 'required',
            'notes' => 'numeric|between:0,5',
        ]);

        $post = new Post;
        $post->titre = $request->input("titre");
        $post->avis = $request->input("avis");
        $post->film_serie_id = $request->input("filmId");
        if ($request->input("notes"))
        {
            $post->notes = $request->input("notes");
        }
        $post->user_id = Auth::id();
        $post->date = now();
        $post->save();

        if ($request->input('notes') != null)
        {
            $this->calculerMoyenne($request->input("filmId"));
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post->author->id != Auth::user()->id)
        {
            $notification = new Notification;
            $notification->type = "suppression";
            $notification->titre = "Un administrateur a supprimé l'un de vos messages";
            $notification->contenu = $post->avis;
            $notification->user_id = $post->author->id;
    
            $notification->save();
        }

        $filmId = $post->filmSerie->id;

        $post->delete();

        $this->calculerMoyenne($filmId);

        return redirect()->back();
    }
}
