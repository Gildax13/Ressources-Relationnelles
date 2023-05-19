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
                        <form action="{{ url('storesupport') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <tr>
                                <td><label class="dark:text-white text-black" for="subject">Entrez le titre : </label></td>
                                <td><input type="text" name="subject" id="subject"></td>
                            </tr>
                            <tr>
                                <td><label class="dark:text-white text-black" for="reason">Entrez le Contenu : </label></td>
                                <td>
                                    <br>
                                    <input type="radio" name="reason" id="reason" value="Ressources" /> Ressources<br>
                                    <input type="radio" name="reason" id="reason" value="Site" /> Site<br>
                                    <input type="radio" name="reason" id="reason" value="Signalement" /> Signalement<br>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="dark:text-white text-black" for="information">Entrez la description : </label></td>
                                <td><input type="text" name="information" id="information"></td>
                            </tr>
                    </table>
                    <input type="submit" value="Envoyer !">
                    </form>


                </div>
            </div>
        </div>
</x-app-layout>