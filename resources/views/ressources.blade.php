<style>
h1 {
        font-weight: 1000 !important;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ressources') }}
        </h2>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <div class="col-sm-3">
        <a class="btn btn-outline-primary dark:text-white text-black" href="{{url('/createressource')}}">Ajouter une ressource</a>

                </div>
    </x-slot>
    <div class="py-12">
    @foreach($ressources as $res)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ url('/showressource', [$res->id]) }}"><div class="p-6 text-gray-900 dark:text-gray-100">
                <table>
                <tr>
                    <td><img class="h-16" src="{{ asset('storage/icons/'.$res->icon) }}"></td>
                    <td><h1>{{ $res->title }}</h1> <p>{{ $res->description }}</p></td>
                </tr>

                </table>
                </div></a>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</x-app-layout>
