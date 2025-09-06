<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('project create') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div id="content">
                        <div class=" text-right my-3">
                            <a href="{{route('admin.projects.index')}}"><button class="btn btn-dark">back</button></a>
                        </div>
                        <table class="table table-hover table-responsive">
                            <tr>
                                <th>title</th>
                                <th>content</th>
                                <th>type</th>
                                <th>image</th>
                                <th>save</th>

                            </tr>
                            <tr>
                                <form method="post" action="{{route('admin.projects.update',$project['id'])}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input type="text" name="title" value="{{$project['title']}}" >
                                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">
                                            @error('title')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <textarea cols="35" rows="5" name="content">{{$project['content']}}</textarea>
                                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">
                                            @error('content')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <select name="type">
                                        <option value="app" {{$project['type']=='app'?'selected':''}}>app</option>
                                        <option value="branding" {{$project['type']=='branding'?'selected':''}}>branding</option>
                                        <option value="product" {{$project['type']=='product'?'selected':''}}>product</option>
                                        </select>
                                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">
                                            @error('type')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <img width="75" height="75" src="{{url('storage/'.$project['image'])}}"><br>
                                        <input type="file" value="{{$project['image']}}" name="image">
                                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">
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
                                    <td><button class="btn btn-warning" type="submit" name="submit">save</button></td>
                                </form>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
