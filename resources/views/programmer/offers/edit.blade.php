<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('offer edit') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div id="content">
                        <div class=" text-right my-3">
                            <a href="{{route('programmer.offers.index')}}"><button class="btn btn-dark">back</button></a>
                        </div>
                        <table class="table table-hover table-responsive">
                            <tr>
                                <th>title</th>
                                <th>prise</th>
                                <th>description</th>
                                <th>save</th>

                            </tr>
                            <tr>
                                <form method="post" action="{{route('programmer.offers.update',$offer['id'])}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        <input type="text" name="title" value="{{$offer['title']}}" >
                                        <div style="color:red">
                                            @error('title')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="prise" value="{{$offer['prise']}}" >
                                        <div style="color:red">
                                            @error('prise')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <textarea cols="20" rows="5" name="description">{{$offer['description']}}</textarea>
                                        <div style="color:red">
                                            @error('description')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <img width="75" height="75" src="{{url('storage/'.$team['image'])}}"><br>
                                        <input type="file" value="{{$team['image']}}" name="image">
                                        <div style="color:red">
                                            @error('image')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
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
