@props([
    'ratings',
    'cover',
    'type',
    'title',
    'status',
    'id',
    'director',
    'genres',
])

<div class="flex flex-col w-[44%] h-[92%] bg-blue-300 p-16 justify-between text-white text items-center rounded-2xl" style="font-family: 'Montserrat', sans-serif;">
    <div class="">
        <h2 class="font-extrabold text-3xl justify-center items-center flex">
            {{ $title }}
        </h2>
        <div class="relative rounded-xl overflow-hidden !h-[280px] mt-10">
            <img src="{{ url('storage/image/' . $cover) }}" class="object-cover !h-[280px]" />
        </div>
        <div class="flex flex-col relative rounded-xl overflow-hidden text-center">
            <table class="w-auto mt-[50px]">
                <tr>
                    <td class="px-8 py-3 font-bold text-xl text-center justify-center">Film Type</td>
                    <td colspan='3' class='px-8 py-3 text-xl font-light text-center justify-center'>{{ $type }}</td>
                </tr>
                <tr>
                    <td class="px-8 py-3 font-bold text-xl text-center justify-center">Ratings</td>
                    <td colspan='3' class='px-8 py-3 text-xl font-light text-center justify-center'>{{ $ratings }}</td>
                </tr>
                <tr>
                    <td class="px-8 py-3 font-bold text-xl text-center justify-center">Status</td>
                    <td colspan='3' class='px-8 py-3 text-xl font-light text-center justify-center'>{{ ($status == 1) ? 'Active' : 'Inactive' }}</td>
                </tr>
                <tr>
                    <td class="px-8 py-3 font-bold text-xl text-center justify-center">Directed By</td>
                    <td colspan='3' class='px-8 py-3 text-xl font-light text-center justify-center'>{{ $director }}</td>
                </tr>
                <tr>
                    <td class="px-8 py-3 font-bold text-xl text-center justify-center">Genre</td>
                    <td colspan='3' class='px-8 py-3 text-xl font-light text-center justify-center'>
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
    </div>
    <div class="flex flex-row">
        {{-- <a wire:navigate href="{{route('MovieAddGenre', $id)}}" class="relative mt-6 py-4 font-bold bg-green-500 px-10 rounded-xl self-end mr-5">Add Genres</a> --}}
        <a wire:navigate href="{{route('MovieAddActor', $id)}}" class="relative mt-6 py-4 font-bold bg-green-500 px-10 rounded-xl self-end mr-5">Add Actors</a>
        <a wire:navigate href="{{route('EditMovie', $id)}}" class="relative mt-6 py-4 font-bold bg-green-500 px-10 rounded-xl self-end">Update</a>
    </div>
</div>