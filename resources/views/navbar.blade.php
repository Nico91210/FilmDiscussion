<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>FilmDiscussion</title>
  <link href = {{ asset('css/tw.css') }} rel = "stylesheet" />
  <script src={{ asset('js/app.js') }}></script>
  <script src={{ asset('js/jquery.js') }}></script>

  <script>
    $(document).ready(function()
    {
      $("#button_compte").click(function()
      {		
        //$("#navbar_compte").animate({height: 'toggle'}, 250);
        $("#navbar_compte").toggle();
        $("#hide_compte_zone").show();
      });

      $("#hide_compte_zone").click(function()
      {
        $("#navbar_compte").hide();
        $("#hide_compte_zone").hide();
      }
      );
    }); 
  </script>

</head>
<body>
  <div class="bg-darkbackground sticky top-0 h-auto z-30 shadow-md">
    <ul class="flex justify-between text-right py-2 px-2 sm:text-base md:text-xl">
      <li>
        <a class="block focus:outline-none focus:shadow-outline rounded text-gray-200 hover:bg-secondary py-2 px-4" href="/">Accueil</a>
      </li>
      @if(Auth::check() && Auth::user()->role->isAdmin())
      <li>
        <a class="block focus:outline-none focus:shadow-outline rounded text-gray-200 hover:bg-secondary py-2 px-4" href="/film_serie/create">Ajouter Films/Séries</a>
      </li>
      @endif
      <div class="block">
        <a id="button_compte" class="inline-block text-gray-200" href="#">
          <li class="relative hover:bg-secondary py-2 px-2 focus:outline-none focus:shadow-outline rounded">
            <div class="pointer-events-none absolute inset-y-0 left-0 px-1 mt-2 flex items-center text-gray-200">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
            <span class="inline ml-4">
              @if(Auth::check())
                @if(Auth::user()->notificationsNotRead()->count() > 0)
                  {{Auth::user()->username}} ({{Auth::user()->notificationsNotRead()->count()}})
                @else
                  {{Auth::user()->username}}
                @endif
              @else
                Compte
              @endif
            </span>
          </li>
        </a>
        <button id="hide_compte_zone" class="hidden fixed top-0 right-0 left-0 bottom-0 focus:outline-none w-full h-full cursor-default"></button>
        <div id="navbar_compte" class="mx-2 hidden absolute shadow-md rounded-md overflow-hidden right-0">
          @if(!Auth::check())
          <li>
            <a class="block bg-background text-gray-400 hover:bg-secondary py-2 px-4" href="/register">S'enregistrer</a>
          </li>
          <li>
            <a class="block bg-background text-gray-400 hover:bg-secondary py-2 px-4" href="/login">Connexion</a>
          </li>
          @endif
          @if(Auth::check())
          <li>
            <a class="block bg-background text-gray-400 hover:bg-secondary py-2 px-4" href="/profile">Profil</a>
          </li>
          <li>
            <a class="block bg-background text-gray-400 hover:bg-secondary py-2 px-4" href="/notifications">
              @if (Auth::user()->notificationsNotRead()->count() > 0)
                <div class="pointer-events-none absolute inset-y-0 top-0 left-0 px-2 mt-1 flex items-center text-button">
                  <svg class="fill-current" width="5" height="5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="12"/>
                  </svg>
                </div>
              @endif
              <span class="inline ml-2">
                Notifications
              </span>
            </a>
          </li>
          <li>
            <a class="block bg-background text-gray-400 hover:bg-secondary py-2 px-4" href="/logout">Déconnexion</a>
          </li>
          @endif
        </div>
      </div>
    </ul>
  </div>
</body>
</html>