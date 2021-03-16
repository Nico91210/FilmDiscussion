<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Notification;
use App\Mail\ReceptionCommentaire;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function comment(Request $request)
    {
        $request->validate([
            'avis' => 'required',
        ]);

        $comment = new Commentaire;
        $comment->date = now();
        $comment->avis = $request->input("avis");
        $comment->user_id = Auth::id();
        $comment->post_id = $request->postId;

        $comment->save();

        if (Auth::id() != $comment->post->author->id)
        {
            $notification = new Notification;
            $notification->type = "commentaire";
            $notification->contenu = "";
            $notification->titre = Auth::user()->username. " a commenté votre post!";
            $notification->commentaire_id = $comment->id;
            $notification->user_id = $comment->post->author->id;
    
            $notification->save();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $commentaire = Commentaire::find($id);

        if ($commentaire->author->id != Auth::user()->id)
        {
            $notification = new Notification;
            $notification->type = "suppression";
            $notification->titre = "Un administrateur a supprimé l'un de vos messages";
            $notification->contenu = $commentaire->avis;
            $notification->user_id = $commentaire->author->id;

            $notification->save();
        }

        $commentaire->delete();

        return redirect()->back();
    }
}
