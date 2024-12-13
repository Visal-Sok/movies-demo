@props([
    'actors',
    'sectiontitle' => 'Top Stars',
    'seemore' => '',
])


<section class="mt-9">
    <div class="flex items-center justify-between">
        <span class="font-semibold text-gray-700 text-base">{{ $sectiontitle }}</span>
        <a href="{{ route('actors') }}" class="flex items-center {{$seemore}} space-x-2 fill-gray-500 border-b-4 p-3 rounded-xl border-red-300 shadow-xl text-black font-extrabold">See More
        </a>
    </div>
   
    
    @if ($actors)
        <div class="mt-4 grid grid-cols-2  sm:grid-cols-4 gap-x-5 gap-y-5">
            @foreach ($actors as $actor)
                <x-moviestarcard :id="$actor->id" :portrait="$actor->portrait" :name="$actor->name" moviesincluded="+2 Movies" />
            @endforeach
        </div>
    @endif
        
</section>