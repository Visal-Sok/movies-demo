<div class="flex flex-col w-[54%] h-[92%] bg-red-500 p-16 text-white text justify-between items-center rounded-2xl" style="font-family: 'Montserrat', sans-serif;">
    <h2 class="font-extrabold text-5xl">
        Movie's List
    </h2>
    
    <div class="h-[65vh] w-full flex flex-col">
        <input type="text" wire:model.live="search" class="self-end rounded-md border-0 w-full text-black" placeholder="Search Title">
        <table class="table-fixed w-[99%] mt-6 border-0">
            <tr class="h-[80px]">
                <th>Title</th>
                <th>Director's Name</th>
                <th>Associations</th>
            </tr>
            @foreach ($movies as $movie)
                <tr class="h-[60px]">
                    <th>{{ $movie->title }}</th>
                    <th>{{ $movie->name }}</th>
                    <th>
                        <a href="{{route('ViewMovie', $movie->id)}}" class="py-4 px-10 bg-green-500 rounded-xl">View</a>
                    </th>
                </tr>
            @endforeach
        </table>
        <div class="mt-6">
            {{ $movies->links() }}
        </div>
    </div>
</div>
