<x-app-layout>
    <x-slot name="header">
        <h2 class="mx-auto py-0 sm:px-6 lg:px-8 text-black dark:text-white dark:bg-gray-800 bg-white">
            <a style="align-items: center" class="scale-100 p-6 py-2 bg-white dark:bg-gray-800 dark:shadow-none flex"
                href="{{ url('/ressources') }}"><img style="width:5vw;height:auto;" src="{{ asset('img/retour.png') }}">
                <h2 class="mx-auto font-semibold text-2xl text-black dark:text-white leading-tight">
                    {{ $ressource->title }}
                </h2>
            </a>
        </h2>
    </x-slot>
    <style>
        .hoverbordergreen:hover {
            border-color: #03989E !important;
            transition: border-color 112ms linear !important;
        }
    </style>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
        <div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="justify-content: center; display: flex;">
                    <div
                        class="dark:bg-gray-800 bg-white dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
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
                                    Ecrit par : {{ $user }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="p-4 center mx-auto sm:px-6 lg:px-8">
                                    <hr>
                                </td>
                            </tr>
                            <td colspan="2" class="center mx-auto sm:px-6 lg:px-8">
                                {{ $ressource->content }}
                            </td>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5" style="min-width: 80vw;">
            <div
                class="pb-4 dark:bg-gray-800 bg-white dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg ">
                <form action="{{ url('/storecomment', [$ressource->id]) }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    <x-input-label for="content" :value="__('Saisir votre Commentaire')" />
                    <x-text-input id="content" class="block mt-1 w-full" type="text" name="content" required/>
                    <input type="submit" value="Envoyer !" style="border: 1px ridge black;" class="mt-4 px-3 py-1 rounded-md float-right hoverbordergreen">
                </form>
                <h2 class="text-xl font-semibold text-black dark:text-white p-4 pb-0">Commentaires</h2>
                @if (!$comment)
                    <br>
                    <div class="p-4 pt-0 pb-2 text-black dark:text-white">
                        <hr>
                        <p class="pt-4">Cette ressource n'a pas de commentaires</p>
                    </div>
                @else
                    @foreach ($comment as $com)
                        <br>
                        <div class="p-4 pt-0 pb-2 text-black dark:text-white">
                            <hr>
                            <p style="font-style:italic; color:darkgray">Posté {{ $com->created_at }}</p>
                            <p><strong style="color:#03989E">{{ $com->name }}</strong> a dit :</p>
                            <p>{{ $com->content }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
