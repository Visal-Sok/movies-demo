@props([
    'id',
    'portrait',
    'name',
    'moviesincluded',
])


<a wire:navigate class="relative rounded-xl overflow-hidden" href="{{ route('actorsdetail', $id) }}">
    <img src="{{ url('storage/image/' . $portrait) }}" class="object-cover h-full w-full -z-10" alt="">
    <div class="absolute top-0 h-full w-full bg-gradient-to-t from-black/50 p-3 flex flex-col justify-end">
        <div class="self-center flex flex-col items-center space-y-2">
            <span class="capitalize text-white font-medium drop-shadow-md">{{ $name }}</span>
            <span class="text-gray-100 text-xs">+{{ rand(1,9) }} Movies</span>
        </div>
    </div>
</a>