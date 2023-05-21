<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Merci pour votre avis') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <br>
                    <div class="container">
                        <div class="row card text-vblack bg-dark dark:text-white">
                            <h4 class="card-header">Merci pour votre commentaire</h4>
                            <div class="card-body">
                            <a href="{{ url('/accueil') }}"><button style="border: 1px ridge black;">Retour a l'accueil</button></a> <a href="{{ url('/showressource', [$ressource]) }}"><button style="border: 1px ridge black;">Retourner a la ressource commentée</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
