@props([
    'title',
    'array',

])

<x-guest-layout>
    <x-slot:title>
        Nickflix - Actors
    </x-slot:title>
    <h1 class="dark:text-white text-black mt-[50px] text-4xl mb-12">{{ $title }}</h1>
    @if ($title == "Actors")
        <div class="mt-4 grid grid-cols-2  sm:grid-cols-4 gap-x-5 gap-y-5">
            @foreach ($actors as $actor)
                <x-moviestarcard :id="$actor->id" :portrait="$actor->portrait" :name="$actor->name" moviesincluded="+2 Movies" />
            @endforeach
        </div>
    @endif

    

</x-guest-layout>