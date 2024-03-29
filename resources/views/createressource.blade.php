<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formulaire d\'ajout de ressources') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table>
                        <form action="{{ url('storeressource') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <tr>
                                <td><x-input-label for="title" :value="__('Titre')" /></td>
                                <td><x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required /></td>
                            </tr>
                            <tr>
                                <td><x-input-label for="content" :value="__('Contenu')" /></td>
                                <td><x-text-input id="content" class="block mt-1 w-full" type="text" name="content" required /></td>
                            </tr>
                            <tr>
                            <td><x-input-label for="desc" :value="__('Description')" /></td>
                                <td><x-text-input id="desc" class="block mt-1 w-full" type="text" name="desc" required /></td>
                            </tr>
                            <tr>
                                <td><x-input-label for="file" :value="__('Fichier')" /></td>
                                <td><input type="file" name="file" id="file"></td>
                            </tr>
                            <tr>
                                <td><x-input-label for="icon" :value="__('Icone')" /></td>
                                <td><input type="file" name="icon" id="icon" accept="image\png image\jpg"></td>
                            </tr>
                            <tr>
                                <td><x-input-label for="type" :value="__('Type de ressource')" /></td>
                                <td><select name="types_id" id="type" class="form-control">
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select></td>
                            </tr>
                            <tr>
                                <td><x-input-label for="category" :value="__('Catégorie de ressource')" /></td>
                                <td><select name="categories_id" id="category" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select></td>
                            </tr>
                            <br>
                            <!-- Insérez les SELECT pour les ID des catégories, users et Type -->
                    </table>
                    <input type="submit" value="Envoyer !">
                    </form>


                </div>
            </div>
        </div>
</x-app-layout>