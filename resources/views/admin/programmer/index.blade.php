<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('programmers') }}
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
                         {{$users->links()}}

                        <table class="table table-hover table-responsive">
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>city</th>
                                <th>job</th>
                                <th>delete</th>
                            </tr>
                            @foreach ($users as $user )
                                <tr>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user->programmer['city']??'not set yet'}}</td>
                                    <td>{{$user->programmer['job']??'not set yet'}}</td>
                                    <td>
                                        <form method="post" action="{{route('admin.programmer.destroy',$user['id'])}}" >
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
