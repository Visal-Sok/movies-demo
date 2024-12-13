@props([
    'id',
])


<div class="flex flex-col w-[44%] h-[92%] bg-blue-300 p-16 text-white text items-center rounded-2xl" style="font-family: 'Montserrat', sans-serif;">
    <span class="text-5xl mb-20">Create Actor</span>
    <form method="post" class="w-[80%] h-[100%] flex flex-col justify-between" enctype="multipart/form-data">
        @csrf
        <div class="">
            @foreach ($id as $item)
                <input type="hidden" value="{{$item->id+1}}" name="actorid">
            @endforeach
            <x-label-text label="Actor's Name" name="actorname" />
            <x-label-text label="Actor's Date of Birth" name="actordob" />
            <x-label-file label="Portrait" name="portrait" />
        </div>
        <button type="submit" class="relative bottom-0 bg-green-500 px-10 py-4 rounded-lg font-bold">Create</button>
    </form>
</div>