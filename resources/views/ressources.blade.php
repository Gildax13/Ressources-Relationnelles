<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ressources') }}
        </h2>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <div class="col-sm-3">
        <a class="btn btn-outline-primary text-white" href="{{url('/createressource')}}">Ajouter une ressource</a>

                </div>
    </x-slot>
    <div class="py-12">
    @foreach($ressources as $res)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul>
                        <li>{{ $res->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</x-app-layout>
