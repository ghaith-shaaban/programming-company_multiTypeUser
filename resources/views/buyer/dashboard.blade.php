<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded-lg">
                        <h1 class="text-center text-gray-800 text-2xl">info</h1>
                            <h3 class=" text-gray-800 text-xl">name</h3>
                            <p class=" text-center text-gray-500">{{$buyer['name']}}</p>
                            <h3 class=" text-gray-800 text-xl">email</h3>
                            <p class=" text-center text-gray-500">{{$buyer['email']}}</p>
                            <h3 class=" text-gray-800 text-xl">bank account</h3>
                            <p class=" text-center text-gray-500">{{$buyer['bank_account']}}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg">
                        <h1 class="text-center text-gray-800 text-2xl">requests</h1>
                            <h3 class=" text-gray-800 text-xl">number</h3>
                            <p class=" text-center text-gray-500">{{$request['number']}}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg">
                        else
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
