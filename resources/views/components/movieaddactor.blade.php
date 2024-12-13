@props([
    'movie',
    'actorarray',
])



<div class="flex flex-col w-[44%] h-[92%] bg-blue-500 p-16 justify-between text-white text items-center rounded-2xl" style="font-family: 'Montserrat', sans-serif;">
    <span class="text-2xl mb-20">Add Actor to <span class="font-bold underline">{{$movie->title}}</span></span>
        <form method="post" action="{{route('addactortomovie')}}" class="w-[80%] h-[100%] flex flex-col justify-between">
            @csrf
            <input type="hidden" name="movieid" value="{{$movie->id}}" />
            <div class="">
                <div class="relative rounded-xl overflow-hidden !h-[280px] mt-10 mb-20">
                    <img src="{{ url('storage/image/' . $movie->cover) }}" class="object-cover !h-[280px]" />
                </div>
                <x-label-select label="Actor" name="actor" :array="$actorarray" value="name" />
            </div>
            <button type="submit" class="relative bottom-0 bg-green-500 px-10 py-4 rounded-lg font-bold">Create</button>
        </form>
</div>