<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Add New Series') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-slate-800">
                    <x-auth-validation-errors />

                    <form method="POST" action="{{ route('serial.store') }}" enctype="multipart/form-data">
                        @csrf
                            {{-- <div class="grid grid-rows-5"> --}}
                                <div>
                                    <x-label for="judul" :value="__('Judul')" />
                                    <x-input id="judul" class="block my-2 w-full" type="text" name="judul" autofocus />
                                </div>
                                <div>
                                    <x-label for="tahun" :value="__('Tahun')" />
                                    <x-input id="tahun" class="block my-2 w-full" type="number" name="tahun" autofocus />
                                </div>
                                <div>
                                    <x-label for="season" :value="__('Season')" />
                                    <input type="number" name="season" id="season"
                                    class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                                    focus:ring-slate-400 focus:ring-offset-1 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                                    dark:text-gray-300 dark:focus:ring-offset-dark-eval-1 block my-2 w-full" autofocus>
                                </div>
                                <div>
                                    <x-label for="episode" :value="__('Episode')" />
                                    <input type="number" name="episode" id="episode"
                                    class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                                    focus:ring-slate-400 focus:ring-offset-1 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                                    dark:text-gray-300 dark:focus:ring-offset-dark-eval-1 block my-2 w-full" autofocus>
                                </div>
                                <div>
                                    <x-label for="rating" :value="__('Rating')" />
                                    <input type="number" name="rating" id="rating"
                                    class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                                    focus:ring-slate-400 focus:ring-offset-1 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                                    dark:text-gray-300 dark:focus:ring-offset-dark-eval-1 block my-2 w-full" step="0.1" autofocus placeholder="1-10">
                                </div>
                                <div>
                                    <x-label for="genre" :value="__('Genre')" />
                                    <x-input id="genre" class="block my-2 w-full" type="text" name="genre" autofocus />
                                </div>
                                <div>
                                    <x-label for="sinopsis" :value="__('Sinopsis')" />
                                    <textarea name="sinopsis" class="block my-2 w-full py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                                    focus:ring-slate-400 focus:ring-offset-1 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                                    dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" id="sinopsis" cols="30" rows="10" style="resize:none;"></textarea>
                                </div>
                                <div>
                                    <x-label for="poster" :value="__('Poster Series')" />
                                    <x-input  id="poster" class="block my-2 w-full" type="file" name="poster" autofocus />
                                </div>
                                <div>
                                    <x-label for="cover" :value="__('Cover Series')" />
                                    <x-input  id="cover" class="block my-2 w-full" type="file" name="cover" autofocus />
                                </div>
                            {{-- </div> --}}
                        </div>
                        <div class="flex items-center justify-end mb-4 mx-4">
                            <x-button class="ml-3">
                                {{ __('Add Series') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>