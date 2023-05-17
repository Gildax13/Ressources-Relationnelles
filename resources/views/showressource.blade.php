<style>
    .center {
        text-align: center;
    }

    table {
        width: 100%;
    }

    #icon {
        width: 50%;
        display: inline;
    }

    h1 {
        font-weight: 1000 !important;
    }
</style>
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
                        <td colspan="2" class="center mx-auto sm:px-6 lg:px-8">
                            <img id="icon" src="{{ asset($url) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="center mx-auto sm:px-6 lg:px-8">
                            <h1>{{ $ressource->title }}</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>Ecrit par : {{ $user}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr><br></td>
                    </tr>
                    <td colspan="2" class="center mx-auto sm:px-6 lg:px-8">
                        {{$ressource->content}}
                </td>
                </table>
            </div>
        </div>
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
            <table>
                        <form action="{{ url('/storecomment', [$ressource->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <tr>
                                <td style="width:20%"><label class="dark:text-white text-black" for="content">Saisir votre Commentaire</label></td>
                                <td><input type="text" name="content" id="content" style="width:100%"></td>
                            </tr>
                            </table>
                            <input type="submit" value="Envoyer !" style="border: 1px ridge black;">
                </form>
                <h1>Commentaires :</h1>
                @foreach($comment as $com)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table>
                <tr>
                    <td>{{ $com->name }} : <p>{{ $com->content }}</p></td>
                </tr>
                </table>
                </div>
            </div>
        </div>
        <br>
        @endforeach
            </div>
        </div>
    </div>
    </div>
</x-app-layout>