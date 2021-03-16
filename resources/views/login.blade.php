@include('navbar')

<body class="bg-background">
<div class="bg-background justify-center flex py-20">    
  <div class="flex items-center">
    <form method="post" action= /processCredentials class="bg-secondary shadow-md rounded px-8 py-8 mb-4">
    @csrf
      <div class="mb-4">
        <label class="text-gray-200 block mb-2" for="username" >
          Nom d'utilisateur
        </label>
        <input name="username" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Nom d'utilisateur">
        @error('username')
          <span class="text-red-500 text-xs italic">
            {{$message}}
          </span>
        @enderror
      </div>
      <div class="mb-6">
        <label class="text-gray-200 block mb-2" for="password" >
          Mot de passe
        </label>
        <input name="password" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
        @error('password')
          <span class="text-red-500 text-xs italic">
            {{$message}}
          </span>
        @enderror
      </div>
      <input type="submit" value="Se connecter" class="mb-4 cursor-pointer bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none focus:shadow-outline"/>
      @if(session('error'))
        <span class="block text-red-500 text-xs italic">
          {{ session('error') }}
        </span>
      @endif
    </form>
  </div>
</div>  
</body>

