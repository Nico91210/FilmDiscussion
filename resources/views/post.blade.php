@include('navbar')

<body class="bg-background">
<div class="bg-background px-10">
  <div class="py-5">
      <h1 class="inline px-2 font-semibold text-4xl text-gray-200">{{$post->author->username}}
      @if((Auth::check() && Auth::user()->role->isAdmin()) || (Auth::check() && $post->author->id == Auth::user()->id))
        <div class="ml-20 inline-block">
          <form method="POST" action="/post/{{$post->id}}">
            @csrf
            @method('delete')
            <input class="align-middle text-lg cursor-pointer text-red-100 focus:outline-none focus:shadow-outline rounded px-3 py-2 bg-button hover:bg-red-500" type="submit" value="Supprimer"/>
          </form>
        </div>
      @endif
      </h1>
      <br>
      <br>
      <div class="inline-block w-auto px-4 py-2 mt-2 rounded bg-secondary w-2/3">
        <div>
          <h2 class="inline pb-4 text-gray-200 font-semibold text-3xl">{{$post->titre}}</h2>
          @if($post->notes)
            <div class="float-right ml-2 inline text-button">
              <svg class="inline align-baseline fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 .288l2.833 8.718h9.167l-7.417 5.389 2.833 8.718-7.416-5.388-7.417 5.388 2.833-8.718-7.416-5.389h9.167z"/>
              </svg>
              <h2 class="inline text-gray-200 font-semibold text-lg">{{$post->notes}}/5</h2>
            </div>
            @endif
        </div>
        <p class="pt-2 text-gray-200 break-words">{{$post->avis}}</p>
      </div>
    </div>

  @if(Auth::check())
    <div id="ajoutcomm">
      <br>
      <form method="POST" action="/comment">
          @csrf
          <input hidden name="postId" value="{{$post->id}}"/>
          <textarea class="focus:outline-none rounded border-background bg-secondary text-gray-200 px-3 py-2" name="avis" cols=35 rows=4 placeholder="Commentaire"></textarea>
          <br>
          <input class="py-2 mt-4 px-4 cursor-pointer bg-button hover:bg-red-500 text-red-100 rounded focus:outline-none focus:shadow-outline" type="submit" value="Ajouter un commentaire"/>
      </form>
    </div>
  @endif

  <div class="bg-background">
    @if ($post->commentaires->count() == 0)
      <span class="block py-10 text-2xl text-gray-200">Il n'y a aucun commentaire 💩</span>
    @else
      <span class="block pt-10 pb-2 text-2xl text-gray-200">Commentaires: </span>
      @foreach($post->commentaires as $comment)
        <div class="pb-4 pt-2 px-4">
          <h3 class="pt-4 text-gray-200 text-xl">
            {{$comment->author->username}}
            @if((Auth::check() && Auth::user()->role->isAdmin()) || (Auth::check() && $comment->author->id == Auth::user()->id))
              <form class="inline" method="POST" action="/comment/{{$comment->id}}">
                @csrf
                @method('delete')
                <input class="ml-10 float-right text-sm cursor-pointer text-red-100 focus:outline-none focus:shadow-outline rounded-full px-2 bg-button hover:bg-red-500" type="submit" value="Supprimer"/>
              </form>
            @endif
          </h3>
          <div class="mt-1 bg-secondary rounded">
            <p class="py-2 px-2 text-lg text-gray-200">{{$comment->avis}}</p>
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>
</body>

