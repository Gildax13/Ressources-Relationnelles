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
                            <img class="h-16 w-auto bg-gray-100 dark:bg-gray-900"
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
    <h2 class="py-6 sm:px-6 lg:px-8 dark:text-white dark:bg-gray-800 bg-white">
        {{ __('Accueil') }}
    </h2>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold text-black dark:text-white">Qu'est ce que c'est Ressources
                        Relationelles ?</h2>

                    <p class="mt-4 text-black dark:text-white text-sm leading-relaxed">
                        Ressources Relationelles est une plateforme mettant a dispositions des documents permettant
                        d'augmenter et d'améliorer les relations sociales
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Ressources : </h1>
                    <br>
                    @foreach ($ressources as $res)
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <a href="{{ url('/showressourceguest', [$res->id]) }}">
                                <div
                                    class="dark:bg-gray-800 bg-white dark:text-white text-black overflow-hidden shadow-md sm:rounded-lg">
                                    <table>
                                        <tr>
                                            <td><img class="h-16" src="{{ asset('storage/icons/' . $res->icon) }}">
                                            </td>
                                            <td>
                                                <h1>{{ $res->title }}</h1>
                                                <p>{{ $res->description }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                        </div>
                        <br>
                    @endforeach
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>CESI / RESSOURCES / MINISTERE </h1>
                    <!-- A -->
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
