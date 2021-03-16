@include('navbar')

<script>
    $(document).ready(function()
    {
      $("#ajoutcomm").hide()
      $("#button_ajoutcomm").click(function()
      {		
        $("#ajoutcomm").animate({height: 'toggle'}, 150);
      });
    }); 
</script>

<body class="bg-background">
  <div class="py-4 px-4">
    <div class="flex">
      <img class="object-scale-down rounded-lg h-auto w-1/4 text-gray-200 italic" src="{{URL('/storage/'.$filmSerie->affiche)}}" alt="Affiche {{$filmSerie->titre}}"/>
      <div class="px-2">
        <h1 class="inline text-5xl text-gray-200">
          {{$filmSerie->titre}}
          @if(Auth::check() && Auth::user()->role->isAdmin())
            <br>
            <a href="/film_serie/{{$filmSerie->id}}/edit" class="text-lg align-middle bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier ou Supprimer</a>
            <br>
          @endif
        </h1>
        @if ($filmSerie->notes)
          <div class="pb-2 text-button">
            <svg class="inline align-baseline mr-2 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M12 .288l2.833 8.718h9.167l-7.417 5.389 2.833 8.718-7.416-5.388-7.417 5.388 2.833-8.718-7.416-5.389h9.167z"/>
            </svg>
            <h3 class="inline text-xl text-gray-200">{{$filmSerie->notes}}/5</h3>
          </div>
        @endif
        <h3 class="text-gray-200 text-sm font-thin leading-tight">{{date('d/m/Y', strtotime($filmSerie->date_sortie))}}</h3>
        <p class="pt-6 text-gray-200 font-medium text-lg leading-none">
          @foreach($filmSerie->genres as $genre)
            @if(!$loop->last)
              {{$genre->nom}},
            @else
              {{$genre->nom}}
            @endif 
          @endforeach
        </p>
        <br>
        <p class="flex-grow text-justify text-gray-200 text-sm font-normal leading-4">
          <span>{{$filmSerie->resume}}</span>
        </p>
        @if($filmSerie->type == "serie")
          <p id="serie" class="pt-6 text-gray-200 font-normal">
          @if($filmSerie->nombreEpisode == null)
            Nombre d'épisodes non renseigné
          @else
            {{$filmSerie->nombreEpisode}} Épisodes
          @endif
          </p>
        @else
          <p id="film" class="pt-6 text-gray-200 font-normal">
          @if($filmSerie->duree == null)
            Aucune durée renseignée
          @else
            {{$filmSerie->duree}} Minutes
          @endif
          </p>
        @endif
        
        <p class="pt-6 text-gray-200 font-light italic">{{$filmSerie->production}}</p>
      </div>
    </div>

  <br>

  @if(Auth::check())
    <button id="button_ajoutcomm" class="w-auto bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      Ajouter un commentaire
      <div class="w-full">
        <svg class="block m-auto fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
        </svg>
      </div>
    </button>
    <div id="ajoutcomm">
      <br>
      <form method="POST" action="/post">
          @csrf
          <input hidden name="filmId" value="{{$filmSerie->id}}" />
          <input class="focus:outline-none focus: rounded-full border-background bg-secondary text-gray-200 px-3" type="text" name="titre" placeholder="Titre"/>
          @error("titre")
            <span class="block text-red-500 text-xs italic">
              {{$message}}
            </span>
          @enderror
          <br><br>
          <input class="focus:outline-none focus: rounded-full border-background bg-secondary text-gray-200 px-3" type="float" name="notes" placeholder="0 à 5"/>
          @error("notes")
            <span class="block text-red-500 text-xs italic">
              {{$message}}
            </span>
          @enderror
          <br><br>
          <textarea class="focus:outline-none rounded border-background bg-secondary text-gray-200 px-3 py-2" name="avis" cols=35 rows=4 placeholder="Commentaire"></textarea>
          @error("avis")
            <span class="block text-red-500 text-xs italic">
              {{$message}}
            </span>
          @enderror
          <br><br>
          <input class="py-2 px-4 cursor-pointer bg-button hover:bg-red-500 text-red-100 rounded focus:outline-none focus:shadow-outline" type="submit" value="envoyer"/>
      </form>
    </div>
  @endif
  @foreach($filmSerie->posts as $post)
    <div class="py-5">
      <h1 class="inline px-2 font-semibold text-lg text-gray-200">{{$post->author->username}}</h1>
      @if((Auth::check() && Auth::user()->role->isAdmin()) || (Auth::check() && $post->author->id == Auth::user()->id))
        <div class="inline-block">
          <form method="POST" action="/post/{{$post->id}}">
            @csrf
            @method('delete')
            <input class="cursor-pointer text-gray-400 focus:outline-none focus:shadow-outline rounded px-2 bg-secondary hover:bg-gray-700" type="submit" value="Supprimer"/>
          </form>
        </div>
      @endif
      <br>
      <a href="/post/{{$post->id}}">
        <div class="inline-block w-auto px-4 py-2 mt-2 rounded bg-secondary hover:bg-gray-700 divide-y">
          <div class="pb-2">
            <h2 class="inline text-gray-200 font-semibold text-lg">{{$post->titre}}</h2>
            @if($post->notes)
              <div class="float-right ml-2 inline text-button">
                <svg class="inline align-baseline fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12 .288l2.833 8.718h9.167l-7.417 5.389 2.833 8.718-7.416-5.388-7.417 5.388 2.833-8.718-7.416-5.389h9.167z"/>
                </svg>
                <h2 class="inline text-gray-200 font-semibold text-lg">{{$post->notes}}/5</h2>
              </div>
            @endif
          </div>
          <p class="pt-2 text-gray-200">{{$post->avis}}</p>
        </div>
      </a>
    </div>
  @endforeach
  </div>
</body>