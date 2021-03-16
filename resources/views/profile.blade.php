@include('navbar')

<body class="bg-background">
<div class="flex justify-center py-20">    
    <div class="flex items-center">
        <form method="POST" action=/users/{{ Auth::id() }} class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="background-color: #333f52;">
            @csrf
            @method("put")
            
            <div class="mb-4">
                <label class="text-gray-200 block mb-2" for="username" >
                    Nom d'utilisateur
                </label>
                <input value="{{ Auth::user()->username }}" name="username" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Nom d'utilisateur">
                @error('username')
                    <span class="text-red-500 text-xs italic">
                    {{$message}}
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-gray-200 block mb-2" for="email" >
                    E-mail
                </label>
                <input value="{{ Auth::user()->email }}" value="{{ Auth::user()->username }}" name="email" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="ex: abc@def.xyz">
                @error('email')
                    <span class="text-red-500 text-xs italic">
                    {{$message}}
                    </span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="text-gray-200 block mb-2" for="password" >
                    Nouveau mot de passe
                </label>
                <input name="password" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
            </div>

            <input type="submit" value="Valider les changements" class="cursor-pointer bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none focus:shadow-outline"/>
        </form>
    </div>
</div>  
<div class="flex justify-center bg-background">
    <form method="POST" action=/users/{{ Auth::id() }}>
        @csrf
        @method("delete")
        <input type="submit" value="Supprimer le compte" class="cursor-pointer bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none focus:shadow-outline"/>
    </form>
</div>
</body>
