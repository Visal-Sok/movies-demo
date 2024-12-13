@props([
    'id',
    'typearray',
    'directorarray',
])



<div class="flex flex-col w-[44%] h-[92%] bg-blue-500 p-16 justify-between text-white text items-center rounded-2xl" style="font-family: 'Montserrat', sans-serif;">
    <span class="text-5xl mb-20">Create Movie</span>
        <form method="post" class="w-[80%] h-[100%] flex flex-col justify-between" enctype="multipart/form-data">
            @csrf
            @foreach ($id as $item)
                <input type="hidden" value="{{$item->id+1}}" name="movieid">
            @endforeach
            <div class="">
                <x-label-text label="Movie's Title" name="movietitle" />
                <x-label-text label="Ratings" name="ratings" />
                <x-label-select label="Type" name="type" :array="$typearray" value="type" />
                <x-label-select label="Director" name="directed_by" :array="$directorarray" value="name" />
                <div class="flex flex-row justify-between mb-8 font-bold">
                    <label>Active Status</label>
                    <div class="flex flex-row">
                        <x-label-radio label="Active" group="status" value="1" checked="checked" />
                        <x-label-radio label="Inactive" group="status" value="0"/>
                    </div>
                </div>
                <x-label-file label="Cover" name="cover" />
            </div>
            <button type="submit" class="relative bottom-0 bg-green-500 px-10 py-4 rounded-lg font-bold">Create</button>
        </form>
</div>