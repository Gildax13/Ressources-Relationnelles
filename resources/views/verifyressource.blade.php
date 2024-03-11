<style>
    .case{
        margin-bottom:15px
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ressources non validées') }}
        </h2>
    </x-slot>
    <div class="py-12">
        @foreach($ressources as $res)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="case bg-white dark:bg-gray-800 dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ url('/shownotverifiedressource', [$res->id]) }}">
                    <table>
                        <tr>
                            <td><img class="h-16" src="{{ asset('storage/icons/'.$res->icon) }}"></td>
                            <td>
                                <h1>{{ $res->title }}</h1>
                                <p>{{ $res->description }}</p>
                            </td>
                            <td>
                                <a href="{{ url('/verifyressource', [$res->id]) }}">
                                    <img class="h-8 w-auto bg-gray-100 dark:bg-gray-900" src="{{ asset('img/check.png') }}"></img>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('/deletenotverifiedressource', [$res->id]) }}">
                                    <img class="h-8 w-auto bg-gray-100 dark:bg-gray-900" src="{{ asset('img/cross.svg') }}"></img>
                                </a>
                            </td>
                        </tr>
                    </table>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <br>

    </div>
</x-app-layout>
