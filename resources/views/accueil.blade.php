@include('navbar') 

<script>

  $(document).ready(function()
  {
    $("body").click(function()
    {
      $("#search").val("");
      $("#searchResult").html("");
    });

    $("#search").on('input', function()
    {

      $.ajax(
      {
        type: 'get',
        url: '/search',
        data: {'search':$(this).val()},
        success: function(response)
        {
          let searchResult = $("#searchResult");
          searchResult.html("");
          searchResult.append(response);
        }
      });
    });
  });
</script>

<body class="bg-background">

  <div class="relative block z-10 py-3 px-10 text-lg">
    <input autocomplete="off" class="w-1/4 h-10 relative z-20 text-lg focus:outline-none focus: rounded-full border-2 border-background bg-secondary text-gray-200 px-3" id="search" type="text" placeholder="Recherche" name="search">
    <ul id="searchResult" class="block absolute ml-2 py-1 shadow-sm">
    </ul>
  </div>

  <div class="py-10 grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-1 justify-items-center gap-y-20">
    @foreach($films as $film)
      <div class="transform transition-transform duration-300 ease-in-out hover:shadow-md hover:scale-105 h-auto w-auto">
        <a href="/film_serie/{{$film->id}}">
          <div class="transition-opacity duration-300 ease-in-out z-10 rounded-lg absolute w-48 h-64 bg-black bg-opacity-0 hover:bg-opacity-50">
            <div class="w-48 h-64 opacity-0 hover:opacity-100">
              <h1 class="py-2 px-2 text-center text-gray-200 text-xl">
                {{$film->titre}}
              </h1>
              @if($film->notes)
                <div class="absolute py-2 px-2 bottom-0 text-button">
                  <svg class="inline align-baseline fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 .288l2.833 8.718h9.167l-7.417 5.389 2.833 8.718-7.416-5.388-7.417 5.388 2.833-8.718-7.416-5.389h9.167z"/>
                  </svg>
                  <h2 class="inline text-gray-200 font-semibold text-lg">{{$film->notes}}/5</h2>
                </div>
              @endif
            </div>
          </div>
          <img class="text-gray-200 italic h-64 w-48 object-cover rounded-lg"
          src="{{URL('/storage/'.$film->affiche)}}" alt="Affiche {{$film->titre}}"/>
        </a>
      </div>
    @endforeach
  </div>
</body>