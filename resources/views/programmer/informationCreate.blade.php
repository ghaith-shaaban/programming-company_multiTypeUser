<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('information') }}
        </h2>
    </x-slot>

                            @if (session()->has('success'))
                            <div class="bg-gray-100 p-3 text-center text-red-500">
                            {{session('success')}}
                            </div>
                            @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-30 my-10">
                <div class="grid grid-cols-1 md:grid-cols-1 ">
                    <div class="bg-white p-4 rounded-lg">
                        <div class="flex items-center justify-between m-2">
                            <h1 class="text-4xl font-extrabold text-gray-800 mx-auto">
                                info
                            </h1>
                            <div class="items-center my-4 inline-block justify-end">
                            <a href="{{route('profile.edit')}}">
                                <x-primary-button class="ms-4">
                                {{ __('profile') }}
                                </x-primary-button>
                            </a>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('programmer.information.store',Auth::user()->id) }}">
                            @csrf
                            <!-- job -->
                            <div>
                                <x-input-label for="job" :value="__('job')" />
                                <select id="job" class="block mt-2 w-full" name="job" required autocomplete="job">
                                    <option selected>...</option>
                                    <option value="web developer" {{old('job')=='web developer'?'selected':''}}>web developer</option>
                                    <option value="mobile app developer" {{old('job')=='mobile app developer'?'selected':''}}>mobile app developer</option>
                                    <option value="windows app developer" {{old('job')=='windows app developer'?'selected':''}}>windows app developer</option>
                                    <option value="mac app developer" {{old('job')=='mac app developer'?'selected':''}}>mac app developer</option>
                                </select>
                                <x-input-error :messages="$errors->get('job')" class="mt-2" />
                            </div>
                            <!-- city -->
                            <div>
                                <x-input-label for="city" :value="__('city')" />
                                <x-text-input id="city" class="block my-2 w-full" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>
                            <!-- button -->
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ms-4">
                                    {{ __('save') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
