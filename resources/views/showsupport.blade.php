
<x-app-layout>
    <x-slot name="header">
    <div style="width:20px;height:20px;">
        <a href="{{ url('/checksupport') }}"><img style="width:20px;height:20px;" src="{{ asset('img/retour.png') }}"></a>
        </div>
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Demande de support pour : {{ $support->subject}}
        </h2>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        </div>
    </x-slot>
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 bg-white dark:text-white text-black overflow-hidden shadow-sm sm:rounded-lg">
                <table>
                    <tr>
                        <td colspan="2">Support de : {{ $user}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr><br></td>
                    </tr>
                    <td colspan="2" class="center mx-auto sm:px-6 lg:px-8">
                        {{$support->information}}
                </td>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>