<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
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
                                <td><x-input-label for="subject" :value="__('Sujet du support')" /></td>
                                <td><x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" required /></td>
                            </tr>
                            <tr>
                            <td><x-input-label for="subject" :value="__('Catégorie du Support :')" /></td>
                                <td style="padding-left:10px">
                                    <br>
                                    <input type="radio" name="reason" id="reason" value="Ressources" required /> Ressources<br>
                                    <input type="radio" name="reason" id="reason" value="Site" required /> Site<br>
                                    <input type="radio" name="reason" id="reason" value="Signalement" required /> Signalement<br>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                            <td><x-input-label for="information" :value="__('Information')" /></td>
                                <td><x-text-input id="information" class="block mt-1 w-full" type="text" name="information" required /></td>
                            </tr>
                    </table>
                    <input type="submit" value="Envoyer !">
                    </form>


                </div>
            </div>
        </div>
</x-app-layout>