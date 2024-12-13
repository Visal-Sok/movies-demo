@props([
    'label',
    'name',
])

<div class="flex flex-row justify-between">
    <div class="flex flex-col w-full justify-between items-start mb-10">
        <label class="text-white font-bold mb-10" for="actorname">{{$label}}: </label>
        <input type="file" name="{{$name}}" class="text-white font-bold w-80" />
    </div>
    <img src="" alt="">
</div>