<style>
h1 {
        font-weight: 1000 !important;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ressources non validées') }}
        </h2>
    </x-slot>
    <div class="py-12">
    @foreach($ressources as $res)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ url('/shownotverifiedressource', [$res->id]) }}"><div class="p-6 text-gray-900 dark:text-gray-100">
                <table>
                <tr>
                    <td><img class="h-16" src="storage/icons/{{ $res->icon }}"></td>
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
