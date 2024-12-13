<x-guest-layout>

    <span class="mt-6 font-bold text-3xl w-auto m-auto text-center flex self-center">{{ $movie->title }}</span>

    <div class="mt-4 grid gap-x-5 gap-y-5">
        @if ($request->user() and ! $request->user()->subscribed('default'))
            <div class="relative rounded-xl overflow-hidden !h-[520px]">
                <img src="{{ url('storage/image/' . $movie->cover) }}" class="object-cover !h-[625px]" />
            </div>
        @else
        <iframe class="rounded-xl" width="900" height="450" src="{{ $movie->link }}" title="{{ $movie->trailer_title }}" frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        @endif
    </div>
    <div class="flex flex-col relative rounded-xl overflow-hidden text-center">
        @if (!Auth::user()->subscribed('default'))
            <form method="post" action="{{ route('buyMovie') }}">
                @csrf
                <input type="hidden" name="movie_id" value="{{ $movie->stripe_product_key }}">
                <button class="w-[900px] bg-green-600 text-white text-3xl font-[450] py-5 rounded-lg mt-4 flex justify-center items-center hover:bg-green-500 duration-200 hover:shadow-xl">Buy this movie individually <span class="text-lg">&nbsp;&nbsp;(${{number_format($movie->buy_price, 2, ',', '');}})</span></button>
            </form>
        @endif
        
        <table class="w-auto mt-[50px]">
            <tr>
                <td class="py-8 font-bold text-xl text-center justify-center">Director</td>
                <td class='py-8 text-xl font-light text-gray-500 text-center justify-center'>{{ $director }}</td>
            </tr>
            <tr>
                <td class="py-8 font-bold text-xl text-center justify-center">Release Date</td>
                <td class='py-8 text-xl font-light text-gray-500 text-center justify-center'>{{ $release_date }}</td>
            </tr>
            <tr>
                <td class="py-8 font-bold text-xl text-center justify-center">Genres</td>
                <td class='py-8 text-xl font-light text-gray-500 text-center justify-center'>
                    @foreach ($genres as $genre)
                        {{ $genre->genre }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach  
                </td>
            </tr>
        </table>
    </div>
    @if ($starring)
        <div class="pt-16 text-3xl font-light"><span class="font-extrabold">Starring: </span></div>
        <x-actor-section :actors="$starring" sectiontitle="" seemore="invisible"/>
    @endif
</x-guest-layout>