@props([
    'mid',
    'cover',
    'moviename',
    'views',
])


<a wire:navigate class="flex flex-col rounded-xl overflow-hidden aspect-square border" href="{{route('moviesdetail', $mid)}}">
    <img src="{{  url('storage/image/' . $cover)  }}" class=" h-4/5 object-cover w-full  " alt="">
    <div class="w-full h-1/5 bg-white px-3 flex items-center justify-between border-t-2 border-t-red-600">
     <span class="capitalize  font-medium truncate">{{ $moviename }}</span>
     <div class="flex space-x-2 items-center text-xs">
        <span class="material-symbols-outlined">
            visibility
        </span>
        <span>{{ $views }}</span>
    </div>
    </div>
</a>