<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processNotification(Request $request)
    {
        $notification = Notification::findOrFail($request->input("id"));

        if ($notification->lu == 0)
        {
            $notification->lu = true;
            $notification->save();
        }

        switch($notification->type)
        {
            case "commentaire":
                $postId = $notification->commentaire->post->id;
                return redirect("post/".$postId);
            break;
            case "suppression":
                return redirect("notifications/");
            break;
            default:
                return redirect()->route("home");
            break;
        }
    }
}
