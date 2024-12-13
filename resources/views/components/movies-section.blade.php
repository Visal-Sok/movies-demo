@props([
    'movies',
    'sectiontitle' => 'Top Films'
])


<section class="mt-9">
    <div class="flex items-center justify-between">
        <span class="font-semibold text-gray-700 text-base">{{$sectiontitle}}</span>
        <div class="flex items-center space-x-2 fill-gray-500">
            {{-- <svg class="h-7 w-7 rounded-full border p-1 hover:border-red-600 hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M13.293 6.293L7.58 12l5.7 5.7 1.41-1.42 -4.3-4.3 4.29-4.293Z"></path>
            </svg>
            <svg class="h-7 w-7 rounded-full border p-1 hover:border-red-600 hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M10.7 17.707l5.7-5.71 -5.71-5.707L9.27 7.7l4.29 4.293 -4.3 4.29Z"></path>
            </svg> --}}
        </div>
    </div>
   
    
    @if ($movies && count($movies) != 0)
        <div class="mt-4 grid grid-cols-2 gap-y-5 sm:grid-cols-3 gap-x-5 ">
            @foreach ($movies as $movie)
                <x-moviesectioncards :mid="$movie->id" :cover="$movie->cover" :moviename="$movie->title" :ratings="$movie->ratings" />
            @endforeach
        </div>
    @else
        <div class="w-80 h-16 justify-center items-center font-bold text-2xl">
            Sorry, There aren't any movies yet
        </div>
    @endif
</section>