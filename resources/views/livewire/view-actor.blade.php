@props([
    'actor',
])

<div class="flex w-[44%] h-[92%] bg-blue-300 p-16 text-white text justify-center rounded-2xl" style="font-family: 'Montserrat', sans-serif;">
    <h2 class="font-extrabold text-3xl">
        {{ $actor->name }}
    </h2>
</div>