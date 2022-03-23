<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            {{-- <h2 class="text-xl font-semibold leading-tight">
                {{ __('Film') }}
            </h2> --}}
            @auth
                <a href="{{route('film.create')}}" class="text-gray-400 underline hover:text-gray-300 hover:scale-110">Add Film</a>
            @endauth
        </div>
    </x-slot>
        {{-- Slider --}}
        <div class="swiper mySwiper px-4 py-2 mb-8 mt-4">
            <div class="swiper-wrapper">
            @foreach ($datas as $keys => $film)
            <div class="swiper-slide">
                <div class="object-cover w-full h-96 grid grid-cols-2">
                  <div class="ml-32 mt-8">
                      <div class="font-semibold text-2xl text-white">{{$film->judul}}</div>
                      <div class="mb-8 mt-4">{{$film->sinopsis}}</div>
                      <div class="content-end">
                          <a href="{{ route('film.show' , $film->id) }}" class="py-4 w-48 underline text-gray-200 hover:text-white rounded-md hover:scale-110 ease-out duration-300"> 
                               See More!
                          </a>
                      </div>
                  </div>
                  <div class="ml-32 mt-8">
                      <img class="rounded-md scale-100 w-52 h-72 ml-16" src="{{$film->posterImage()}}" alt="">
                  </div>
                </div>
            </div>
            <!--{{++$keys}}-->
            @if ($keys == 4)
                @break
            @endif
            @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
    
    {{--  Movie Poster  --}}
    <div class="p-6 overflow-hidden bg-slate-800 rounded-md shadow-md">
        <x-auth-validation-errors />
        <x-success-message />

        <h2 class="flex text-white font-semibold text-2xl mt-4 items-center content-center">
            <div class="mr-2">
                <x-heroicon-o-lightning-bolt class="w-8 h-8 text-gray-200"/>
            </div>
            News
        </h2>
        <div class="mt-4 grid grid-cols-5 gap-6 sm:justify-center">
            @foreach ($datas as $keys=>$data)
            <a href="{{route('film.show' , $data->id)}}">
                <div class="w-48 h-64 bg-grey-100 relative hover:scale-105 ease-out duration-300">
                    <div class="absolute inset-0 bg-center z-0 opacity-60 rounded-lg" style="background-size: 100% 100%; background-repeat:no-repeat; background-image: url('{{$data->posterImage()}}')"></div>
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex items-end text-1xl text-left text-white font-semibold mb-2 mx-2">{{$data->judul}}</div>
                </div>
            </a>
            <!-- {{++$keys}} -->
            @if ($keys == 5)
                @break
            @endif
            @endforeach
        </div>

        <h2 class="flex text-white font-semibold text-2xl mt-12 items-center content-center">
            <div class="mr-2">
                <x-heroicon-o-fire class="w-8 h-8 text-gray-200"/>
            </div>
            Trending
        </h2>

        <div class="mt-4 grid grid-cols-5 gap-6 sm:justify-center">
            @foreach ($datas as $keys=>$data)
            <a href="{{route('film.show' , $data->id)}}">
                <div class="w-48 h-64 bg-grey-100 relative hover:scale-105 ease-out duration-300">
                    <div class="absolute inset-0 bg-center z-0 opacity-60 rounded-lg" style="background-size: 100% 100%; background-repeat:no-repeat; background-image: url('{{$data->posterImage()}}')"></div>
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex items-end text-1xl text-left text-white font-semibold mb-2 mx-2">{{$data->judul}}</div>
                </div>
            </a>
            <!--{{++$keys}}-->
            @if ($keys == 5)
                @break
            @endif
            @endforeach
        </div>
        
        <h2 class="flex text-white font-semibold text-2xl items-center content-center mt-12">
            <div class="mr-2">
                <x-heroicon-o-emoji-happy class="w-8 h-8 text-gray-200"/>
            </div>
            Recommended
        </h2>
        <div class="mt-4 grid grid-cols-7 gap-6 sm:justify-center">
            @foreach ($datas as $data)
            <a href="{{route('film.show' , $data->id)}}">
                <div class="w-32 h-48 bg-grey-100 relative hover:scale-105 ease-out duration-300">
                    <div class="absolute inset-0 bg-center z-0 opacity-60 rounded-lg" style="background-size: 100% 100%; background-repeat:no-repeat; background-image: url('{{$data->posterImage()}}')"></div>
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex items-end text-1xl text-left text-white font-semibold mb-2 mx-2">{{$data->judul}}</div>
                </div>
            </a>
            @endforeach
            @foreach ($datas as $data)
            <a href="{{route('film.show' , $data->id)}}">
                <div class="w-32 h-48 bg-grey-100 relative hover:scale-105 ease-out duration-300">
                    <div class="absolute inset-0 bg-center z-0 opacity-60 rounded-lg" style="background-size: 100% 100%; background-repeat:no-repeat; background-image: url('{{$data->posterImage()}}')"></div>
                    <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex items-end text-1xl text-left text-white font-semibold mb-2 mx-2">{{$data->judul}}</div>
                </div>
            </a>
            @endforeach
        </div>
        
    </div>

     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
     <script>
       var swiper = new Swiper('.mySwiper', {
         spaceBetween: 30,
         centeredSlides: true,
         autoplay: {
           delay: 2500,
           disableOnInteraction: false,
         },
         pagination: {
           el: '.swiper-pagination',
           clickable: true,
         },
         navigation: {
           nextEl: '.swiper-button-next',
           prevEl: '.swiper-button-prev',
         },
       });
     </script>

</x-app-layout>