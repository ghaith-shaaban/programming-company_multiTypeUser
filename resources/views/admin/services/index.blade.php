<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('services') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <div id="content">
                        @if (session()->has('success'))
                        <p style="color:red"> {{session('success')}}</p>
                        @endif
                        {{$services->links()}}
                        <div class=" text-right my-3">
                        <a href="{{route('admin.services.create')}}"><button class="btn btn-success">new</button></a>
                        </div>
                        <table class="table table-hover table-responsive">
                            <tr>
                                <th>title</th>
                                <th>content</th>
                                <th>image</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($services as $service )
                                <tr>
                                    <td>{{$service['title']}}</td>
                                    <td>{{$service['content']}}</td>
                                    <td><img width="75" height="75" src="{{url('storage/'.$service['image'])}}"></td>
                                    {{-- <td>
                                        @foreach ( $service->teams as $team )
                                            <ul>
                                                <li>{{$team['name']}}</li>
                                            </ul>
                                        @endforeach
                                    </td> --}}
                                    <td><a href="{{route('admin.services.edit',$service['id'])}}"> <button class="btn btn-warning">edit</button></a></td>
                                    <td>
                                        <form method="post" action="{{route('admin.services.destroy',$service['id'])}}" >
                                        @csrf
                                        @method('delete')
                                            <button class=" btn btn-danger" type="submit" name="submit">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
