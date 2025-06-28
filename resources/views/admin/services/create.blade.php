<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('service create') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div id="content">
                        @if (session()->has('success'))
                         {{session('success')}}
                        @endif
                        <div class=" text-right my-3">
                            <a href="{{route('admin.services.index')}}"><button class="btn btn-dark">back</button></a>
                        </div>
                        <table class="table table-hover table-responsive">
                            <tr>
                                <th>title</th>
                                <th>content</th>
                                <th>image</th>
                                <th>save</th>
                            </tr>
                            <tr>
                                <form method="post" action="{{route('admin.services.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <td>
                                        <input type="text" name="title" value="{{old('title')}}" >
                                        <div style="color:red">
                                            @error('title')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <textarea cols="35" rows="5" name="content">{{old('content')}}</textarea>
                                        <div style="color:red">
                                            @error('content')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <input type="file" name="image">
                                        <div style="color:red">
                                            @error('image')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    {{-- <td>
                                        @foreach ( $teams as $team )
                                        <input type="checkbox" id="workers" name="team_id[]" value="{{$team['id']}}">
                                        <label for="workers"> {{$team['name']}}</label><br>
                                        @endforeach
                                    </td> --}}

                                    <td><button class="btn btn-info" type="submit" name="submit">add</button></td>
                                </form>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
