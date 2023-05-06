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
                    <form action="{{ url('storeressource') }}" method="POST">
                        @csrf
                        <label class="text-white" for="title">Entrez le titre: </label>
                        <input type="text" name="title" id="title">
                        <br>
                        <label class="text-white" for="content">Entrez le Contenu: </label>
                        <input type="text" name="content" id="content">
                        <br>
                        <label class="text-white" for="slug">Entrez le slug: </label>
                        <input type="text" name="slug" id="slug">
                        <br>
                        <label class="text-white" for="file">Entrez le file: </label>
                        <input type="file" name="file" id="file">
                        <br>
                        <label class="text-white" for="icon">Ajouter l'icone: </label>
                        <input type="file" name="icon" id="icon">
                        <br>
                        <!-- Insérez les SELECT pour les ID des catégories, users et Type -->
                        <input type="submit" value="Envoyer !">
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
