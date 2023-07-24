
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Demande de Support') }}
        </h2>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    </x-slot>
    <style>
        h1 {
                font-weight: 1000 !important;
            }
        </style>
    <div class="py-12">
    @foreach($support as $sup)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 bg-white dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ url('/showsupport', [$sup->id]) }}"><div class="p-6 text-gray-900 dark:text-gray-100">
                <table>
                <tr>
                    <td><h1>{{ $sup->subject }}</h1> <p>{{ $sup->user }}</p></td>
                </tr>

                </table>
                </div></a>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</x-app-layout>
