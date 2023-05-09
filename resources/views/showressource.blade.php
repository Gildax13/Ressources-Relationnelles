<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $ressource->title }}
        </h2>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
                <table>
                <tr>
                    <td><img class="h-16" src="storage/icons/{{ $ressource->icon }}"></td>
                    <td><h1>{{ $ressource->title }}</h1> <p>{{ $ressource->description }}</p></td>
                </tr>

                </table>
                </div></a>
            </div>
        </div>
        <br>
    </div>
</x-app-layout>
