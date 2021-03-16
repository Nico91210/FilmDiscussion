@include('navbar')

<script>
  $(document).ready(function()
  {
    $("#serie").hide();
    $("#list").change(function()
    {
      var liste = $(this).children("option:selected").text();
      if (liste === "Série") 
      {
        $("#film").hide();
        $("#serie").show();
      } 
      else if (liste === "Film") 
      {
        $("#film").show();
        $("#serie").hide();
      }
    });
  });
</script>
<body class="bg-background">
<div class="bg-background flex justify-center py-4">
    <form enctype="multipart/form-data" method="POST" action="/film_serie/" class="bg-secondary shadow-md rounded px-8 pt-6 pb-8 mb-4">
      @csrf
      <div class="mb-2">
        <label class="text-gray-200 block mb-2">Titre</label>
        <input placeholder="ex: John Wick" type="text" name="titre" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline"/>
        @error('titre')
          <span class="text-red-500 text-xs italic">
            {{$message}}
          </span>
        @enderror
      </div>

      <div class="mb-2">
        <label class="text-gray-200 block mb-2" >Date de sortie</label>
        <input type="date" name="dateSortie" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline"/>
        @error('dateSortie')
          <span class="text-red-500 text-xs italic">
            {{$message}}
          </span>
        @enderror
      </div>

      <label class="text-gray-200 block mb-2" >Type</label>
      <div class="inline-block mb-2 relative w-1/4">
        <select id="list" name="type" class="block bg-darkbackground w-full appearance-none rounded py-2 px-2 text-gray-400 focus:outline-none focus:shadow-outline">
            <option selected value="film" >Film</option>
            <option value="serie" >Série</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 px-1 flex items-center text-gray-500">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>

      <div id="serie" class="mb-2">
        <label class="text-gray-200 block mb-2" >Nombre d'épisodes</label>
        <input type="text" placeholder="ex: 100" name="nombreEpisode" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline"/>
      </div>
      <div id="film" class="mb-2">
        <label class="text-gray-200 block mb-2" >Durée (minutes)</label>
        <input type="text" placeholder="ex: 120" name="duree" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline"/>
      </div>

      <div class="mb-2">
        <label class="text-gray-200 block mb-2" >Résumé</label>
        <textarea placeholder="ex: Ancien tueur à gages repenti, John Wick vient de perdre sa femme Helen, décédée des suites d'une longue maladie."
         name="resume" cols=25 rows=4 class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline"></textarea>
        @error('resume')
          <span class="text-red-500 text-xs italic">
            {{$message}}
          </span>
        @enderror
      </div>

      <div class="mb-2">
        <label class="text-gray-200 block mb-2" >Production</label>
        <input type="text" placeholder="ex: Metropolitan Pictures" name="production" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline"/>
        @error('production')
          <span class="text-red-500 text-xs italic">
            {{$message}}
          </span>
        @enderror
      </div>

      <label class="text-gray-200 block mb-2">Genres</label>
      <select class="bg-darkbackground rounded w-full mb-2 py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" name="genres[]" multiple>
        @foreach(App\Models\Genre::all() as $genre)
            <option value="{{$genre->id}}">{{$genre->nom}}</option>
        @endforeach
      </select>

      <div>
        <button disabled class="relative w-auto inline-flex items-center bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none">
          <input type="file" name="affiche" class="cursor-pointer absolute opacity-0 left-0 top-0 bottom-0 right-0"/>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current stroke-2 inline h-4 w-4" viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
            <polyline points="17 8 12 3 7 8"></polyline>
            <line x1="12" y1="3" x2="12" y2="15"></line>
          </svg>
          <span class="ml-2">Choisir une affiche</span>
        </button>
      </div>
      <input type="submit" value="Valider" class="mt-4 cursor-pointer bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none focus:shadow-outline"/>
    </form>
</div>
</body>

