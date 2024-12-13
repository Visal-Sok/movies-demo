@props([
    'label' => '',
    'name' => '',
    'value' => '',
])

<div class="flex flex-row w-full justify-between items-center mb-10">
    <label class="text-white font-bold" for="{{$name}}">{{$label}}: </label>
    <input type="text" name="{{$name}}" class="text-black font-bold rounded-xl p-3" value="{{$value}}" placeholder="{{$label}}" />
</div>