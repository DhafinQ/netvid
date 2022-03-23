<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            {{-- <h2 class="text-xl font-semibold leading-tight">
                {{ __('Search Result') }}
            </h2> --}}
        </div>
    </x-slot>


        
    @if (count($results) > 0)
            <h2 class="flex text-white font-semibold text-2xl mt-4 items-center content-center mb-8">
                <div class="mr-2">
                    <x-heroicon-o-search class="w-8 h-8 text-gray-200 "/>
                </div>
                Search Result
            </h2>
            <div class="mt-4 grid md:grid-cols-5 sm:grid sm:grid-cols-2 gap-6 sm:justify-center">
                @foreach ($results as $keys=>$result)
                <a href="{{class_basename($result) == 'Film' ? route('film.show' , $result->id) : route('serial.show' , $result->id)}}">
                    <div class="w-48 h-64 bg-grey-100 relative hover:scale-105 ease-out duration-300">
                        <div class="absolute inset-0 bg-center z-0 opacity-60 rounded-lg" style="background-size: 100% 100%; background-repeat:no-repeat; background-image: url('{{$result->posterImage()}}')"></div>
                        <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex items-end text-1xl text-left text-white font-semibold mb-2 mx-2">{{$result->judul}}</div>
                    </div>
                </a>
                @endforeach
            </div>
                
            @else
                <h2 class="flex text-white font-semibold text-2xl mt-4 items-center content-center">
                    No Search result as {{Request::get('term')}}
                </h2>
            @endif
                
  

    
</x-app-layout>