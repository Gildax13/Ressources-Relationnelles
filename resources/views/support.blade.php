<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Demande de Support') }}
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
                                <td><label class="dark:text-white text-black" for="title">Entrez le titre : </label></td>
                                <td><input type="text" name="title" id="title"></td>
                            </tr>
                            <tr>
                                <td><label class="dark:text-white text-black" for="content">Entrez le Contenu : </label></td>
                                <td><input type="text" name="content" id="content"></td>
                            </tr>
                            <tr>
                                <td><label class="dark:text-white text-black" for="desc">Entrez la description : </label></td>
                                <td><input type="text" name="desc" id="desc"></td>
                            </tr>
                            <tr>
                                <td><label class="dark:text-white text-black" for="file">Entrez le file : </label></td>
                                <td><input type="file" name="file" id="file"></td>
                            </tr>
                            <tr>
                                <td><label class="dark:text-white text-black" for="icon">Ajouter l'icone : </label></td>
                                <td><input type="file" name="icon" id="icon" accept="image\png image\jpg"></td>
                            </tr>
                            <tr>
                                <td><label class="dark:text-white text-black" for="icon">Type : </label></td>
                                <td><select name="types_id" id="type" class="form-control">
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select></td>
                            </tr>
                            <tr>
                                <td><label class="dark:text-white text-black" for="icon">Catégorie : </label></td>
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