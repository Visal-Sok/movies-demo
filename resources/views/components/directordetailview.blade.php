@props([
    'portrait',
    'name',
    'id',
])

<div class="flex flex-col w-[44%] h-[92%] bg-blue-300 p-16 text-white text items-center justify-between rounded-2xl" style="font-family: 'Montserrat', sans-serif;">
    <div class="">
        <h2 class="font-extrabold text-3xl">
            {{ $name }}
        </h2>
        <div class="relative rounded-xl overflow-hidden !h-[350px] mt-10">
            <img src="{{ url('storage/image/' . $portrait) }}" class="object-cover !h-[420px]" />
        </div>
    </div>
    <a wire:navigate href="{{route('EditDirector', $id)}}" class="mt-6 py-4 font-bold bg-green-500 px-10 rounded-xl self-end">Update</a>
</div>