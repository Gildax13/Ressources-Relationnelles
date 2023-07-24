<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ressources Relationelles</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- style -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <nav class="" style="background-color:#03989E">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('accueil') }}">
                            <img class="h-16 w-auto bg-white dark:bg-gray-900"
                                src="{{ asset('img/logo.png') }}"></img>
                        </a>
                    </div>
                </div>
                @if (Route::has('login'))
                    <div class="sm:top-0 sm:right-0 text-right" style="display:flex; align-items:center">
                        @auth
                            <a href="{{ url('/accueil') }}"
                                class="font-semibold text-white hover:text-gray-900 dark:text-white dark:hover:text-gray focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 ml-3">Accueil</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-white hover:text-gray-900 dark:text-white dark:hover:text-gray focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 ml-3">Connexion</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="font-semibold text-white hover:text-gray-900 dark:text-white dark:hover:text-gray focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 ml-3">Enregistrement</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>
    <h2 class="mx-auto py-0 sm:px-6 lg:px-8 text-black dark:text-white dark:bg-gray-800 bg-white">
        <a style="align-items: center" class="scale-100 p-6 py-2 bg-white dark:bg-gray-800 dark:shadow-none flex" href="{{ url('/') }}"><img style="width:5vw;height:auto;" src="{{ asset('img/retour.png') }}">
            <h2 class="mx-auto font-semibold text-2xl text-black dark:text-white leading-tight">
                {{ $ressource->title }}
            </h2></a>
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
            <div>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="justify-content: center; display: flex;">
                        <div class="dark:bg-gray-800 bg-white dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
                            <table class="m-4">
                                <tr>
                                    <td colspan="2" class="center mx-auto sm:px-6 lg:px-8">
                                        <img id="icon" src="{{ asset($url) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="pt-4 center mx-auto sm:px-6 lg:px-8">
                                        <h1>{{ $ressource->title }}</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="center mx-auto sm:px-6 lg:px-8">
                                        Ecrit par : {{ $user}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="p-4 center mx-auto sm:px-6 lg:px-8"><hr></td>
                                </tr>
                                <td colspan="2" class="center mx-auto sm:px-6 lg:px-8">
                                    {{$ressource->content}}
                            </td>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5" style="min-width: 80vw;">
                <div class="pb-4 dark:bg-gray-800 bg-white dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg ">
                    <h2 class="text-xl font-semibold text-black dark:text-white p-4 pb-0">Commentaires</h2>
                    @if (!$comment)
                    <br>
                    <div class="p-4 pt-0 pb-2 text-black dark:text-white">
                    <hr>
                    <p class="pt-4">Cette ressource n'a pas de commentaires</p>
                    </div>
                    @else
                    @foreach($comment as $com)
                    <br>
                    <div class="p-4 pt-0 pb-2 text-black dark:text-white">
                    <hr>
                    <p style="font-style:italic; color:darkgray">Posté {{$com->created_at}}</p>
                    <p><strong style="color:#03989E">{{ $com->name }}</strong> a dit :</p>
                    <p>{{ $com->content }}</p>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
    </div>
    </div>
</body>

</html>
