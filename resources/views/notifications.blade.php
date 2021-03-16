@include('navbar') 

<body class="bg-background">
  @if (Auth::user()->notifications->count() == 0)
    <span class="flex justify-center py-10 text-2xl text-gray-200">Vous n'avez pas encore de notifications</span>
  @else
    @foreach(Auth::user()->notifications->reverse() as $notification)
      @if($notification->lu == 1)
        <form action="notifications/" method="POST">
          @csrf
          <input hidden name="id" value="{{$notification->id}}"/>
          <button class="inline-block opacity-75 focus:outline-none focus:shadow-outline shadow-md bg-darkbackground hover:bg-background w-auto rounded mt-5 ml-3 px-4 py-4">
            <input type="submit" hidden/>
            <h2 class="text-lg text-gray-200 opacity-50">
              {{$notification->titre}}
            </h2>
            @if($notification->contenu != null || $notification->contenu != "")
              <div class="bg-secondary rounded mt-1 px-2 py-2 text-gray-200 opacity-50 flex justif-left">
                {{$notification->contenu}}
              </div>
            @endif
          </button>
      @else
        <form action="notifications/" method="POST">
          @csrf
          <input hidden name="id" value="{{$notification->id}}"/>
          <button class="inline-block focus:outline-none focus:shadow-outline shadow-md bg-darkbackground hover:bg-background w-auto rounded mt-5 ml-3 px-4 py-4">
            <input type="submit" hidden>
            <h2 class="text-lg text-gray-200">
              {{$notification->titre}}
              <div class="float-left pointer-events-none inset-y-0 mt-3 mr-2 px-1 text-button">
                <svg class="fill-current" width="5" height="5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="12"/>
                </svg>
              </div>
            </h2>
            @if($notification->contenu != null || $notification->contenu != "")
              <div class="bg-secondary rounded mt-1 px-2 py-2 text-gray-200 opacity-50 flex justif-left">
                {{$notification->contenu}}
              </div>
            @endif
          </button>
        </form>
      @endif
      <br>
    @endforeach
  @endif
</body>