<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('my requests') }}
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
                        {{-- @if(session()->has('offers'))
                            {{$offers=session('offers')}}

                        @endif --}}
                        {{$offers->links()}}
                        <div class=" text-left my-3">
                            <form method="GET" action={{route('buyer.offers.myRequests')}} >

                                <label for="type" class="block">catigory</label>
                                <select name="type" class="mb-3">
                                    <option selected>...</option>
                                    <option value="title" {{request('type',old('type'))=='title'?'selected':''}}>title</option>
                                    <option value="description" {{request('type',old('type'))=='description'?'selected':''}}>description</option>
                                    <option value="programmer_id" {{request('type',old('type'))=='programmer_id'?'selected':''}}>programmer</option>
                                    <option value="prise" {{request('type',old('type'))=='prise'?'selected':''}}>prise</option>
                                </select>
                                <div style="color:red">
                                    @error('type')
                                        {{$message}}
                                    @enderror
                                </div>

                                <label for="search" class="block">search ('if you choose prise then that mean less than')</label>
                                <input name="search" value ="{{request('search',old('search'))}}" placeholder="..."
                                 class="form-control mb-3 w-25" type="text"id="search">
                                <div style="color:red">
                                    @error('search')
                                        {{$message}}
                                    @enderror
                                </div>

                                <button class="btn btn-dark my-3"> Search</button>
                            </form>
                        </div>

                        <table class="table table-hover table-responsive">
                            <tr>
                                <th>title</th>
                                <th>description</th>
                                <th>prise</th>
                                <th>programmer</th>
                                <th>#</th>
                            </tr>
                            @foreach ($offers as $offer )
                                <tr>
                                    <td>{{$offer['title']}}</td>
                                    <td>{{$offer['description']}}</td>
                                    <td>{{$offer['prise']}}</td>
                                    {{-- <td><img width="75" height="75" src="{{url('storage/'.$team['image'])}}"></td>
                                    <td>
                                        @foreach ( $service->teams as $team )
                                            <ul>
                                                <li>{{$team['name']}}</li>
                                            </ul>
                                        @endforeach
                                    </td> --}}

                                    <td>{{$offer->programmer->user['name']}}</td>
                                    <td>
                                        @csrf
                                        @if ($offer->buyers()->exists())
                                        <form method="post" action="{{route('buyer.offers.destroyOrder',$offer['id'])}}" >
                                            @csrf
                                            @method('delete')
                                            <button class=" btn btn-danger" type="submit" name="submit">unorder</button>
                                        </form>
                                        @else
                                            <form method="post" action="{{route('buyer.offers.createOrder',$offer['id'])}}" >
                                                @csrf
                                                <button class=" btn btn-warning" type="submit" name="submit">order</button>
                                            </form>
                                        @endif
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
