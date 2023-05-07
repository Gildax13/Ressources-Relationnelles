<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formulaire d\'ajout de ressources') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <br>
                    <div class="container">
                        <div class="row card text-white bg-dark">
                            <h4 class="card-header">Merci pour l'ajout de votre ressource</h4>
                            <div class="card-body">
                                <p class="card-text">Votre ressource a bien été ajouter dans le système</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</x-app-layout>
