<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }} Bienvenue sur Ressources Relationelles.
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Dernière ressource : </h1>
                    <br>
                    @foreach($ressource as $res)
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <a href="{{ url('/showressource', [$res->id]) }}">
                            <div class="bg-white dark:bg-gray-800 dark:text-white text-black overflow-hidden shadow-md sm:rounded-lg">
                                <table>
                                    <tr>
                                        <td><img class="h-16" src="storage/icons/{{ $res->icon }}"></td>
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Dernière ressource : </h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>