
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ressources non validées') }}
        </h2>
    </x-slot>
    <style>
        h1 {
                font-weight: 1000 !important;
            }
        </style>
    <div class="py-12">
    @foreach($ressources as $res)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 bg-white dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ url('/shownotverifiedressource', [$res->id]) }}"><div class="p-6 text-gray-900 dark:text-gray-100">
                <table style="width: 100%">
                <tr>
                    <td style="width: 10%"><img class="h-16" src="{{ asset('storage/icons/'.$res->icon) }}"></td>
                    <td style="width: 85%"><h1>{{ $res->title }}</h1> <p>{{ $res->description }}</p></td>
                    <td ><a href="{{ url('/verifyressource', [$res->id]) }}">
                        <img class="h-8 w-auto bg-gray-100 dark:bg-gray-900" style="width:35px;height:30px;" src="{{ asset('img/check.png') }}"></img>
                    </a>
                </td>
                </tr>

                </table>
                </div></a>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</x-app-layout>
