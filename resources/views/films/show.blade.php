<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row-reverse">
                    <form action="" method="post">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="Delete" class="text-slate-600 hover:text-slate-500 justify-end items-end self-end">
                    </form>
                    <a href="{{ route('film.edit' , $film->id)}}" class="text-slate-600 hover:text-slate-500 justify-end items-end self-end mr-2">Edit</a>
                </div>
                <div class="p-6">
                    <x-auth-validation-errors />
                    <x-success-message />

                    <div class="grid grid-cols-2 gap-6 mb-36">
                        <div class="">
                            <div class="font-semibold text-2xl text-white">
                                {{$film->judul}}
                                <div class="text-yellow-400 flex items-center">
                                    <x-heroicon-o-star class="w-6 h-6 mr-2"/> {{$film->rating}}
                                </div>
                            </div>
                            <div class="mr-2 mt-2 text-gray-400 flex items-center">
                                <x-heroicon-o-clock class="w-4 h-4 mr-2"/>  {{$film->durasi}} Minute 
                                | <x-heroicon-o-tag class="w-4 h-4 mx-2"/>  {{$film->genre}} 
                                | {{$film->tahun}}
                            </div>
                            <div class="mb-8 mt-4">{{$film->sinopsis}}</div>
                            <div class="content-end items-end justify-end">
                                <a href="{{ route('login') }}" class="py-4 px-6 w-48 bg-red-600 hover:bg-red-500 text-white rounded-md hover:scale-110 ease-out duration-300 flex justify-center items-center"> 
                                    <span class="mr-2">
                                        <x-heroicon-o-play class="w-8 h-8 text-white"/>
                                    </span>
                                     Watch Now!
                                </a>
                            </div>
                        </div>
                        <div class="">
                            <img class="rounded-md scale-100 w-52 h-72 ml-16" src="{{$film->posterImage()}}" alt="">
                        </div>
                    </div>

                    {{-- WatchOther --}}
                    <div class="pt-4 pb-8 pl-8 pr-4 rounded-lg bg-slate-800">
                        <h2 class="flex text-white font-semibold text-2xl mt-4 items-center content-center">
                            <div class="mr-2">
                                <x-heroicon-o-lightning-bolt class="w-8 h-8 text-gray-200"/>
                            </div>
                            News
                        </h2>
                        <div class="mt-4 grid md:grid-cols-7 sm:grid sm:grid-cols-2 gap-6 sm:justify-center">
                            @foreach ($news as $keys=>$data)
                            <a href="{{route('serial.show' , $data->id)}}">
                                <div class="w-32 h-48 mr-4 bg-grey-100 relative hover:scale-105 ease-out duration-300">
                                    <div class="absolute inset-0 bg-center z-0 opacity-60 rounded-lg" style="margin-right:8px;background-size: 100% 100%; background-repeat:no-repeat; background-image: url('{{$data->posterImage()}}')"></div>
                                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex items-end text-1xl text-left text-white font-semibold mb-2 mx-2">{{$data->judul}}</div>
                                </div>
                            </a>
                            <!-- {{++$keys}} -->
                            @if ($keys == 7)
                                @break
                            @endif
                            @endforeach
                        </div>
    
                        <h2 class="flex text-white font-semibold text-2xl mt-4 items-center content-center">
                            <div class="mr-2">
                                <x-heroicon-o-emoji-happy class="w-8 h-8 text-gray-200"/>
                            </div>
                            Recommended
                        </h2>
                        <div class="mt-4 grid md:grid-cols-7 sm:grid sm:grid-cols-2 gap-6 sm:justify-center">
                            @foreach ($films as $keys=>$data)
                            <a href="{{route('serial.show' , $data->id)}}">
                                <div class="w-32 h-48 bg-grey-100 relative hover:scale-105 ease-out duration-300">
                                    <div class="absolute inset-0 bg-center z-0 opacity-60 rounded-lg" style="margin-right:8px;background-size: 100% 100%; background-repeat:no-repeat; background-image: url('{{$data->posterImage()}}')"></div>
                                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex items-end text-1xl text-left text-white font-semibold mb-2 mx-2">{{$data->judul}}</div>
                                </div>
                            </a>
                            <!-- {{++$keys}} -->
                            @if ($keys == 7)
                                @break
                            @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>