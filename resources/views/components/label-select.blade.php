@props([
    'label',
    'name',
    'array',
    'value'
])

<div class="flex flex-row w-full justify-between items-center mb-10">
    <label class="text-white font-bold" for="{{$name}}">{{$label}}: </label>
    <select name="{{$name}}" class="text-black w-[44%] rounded-lg">
        @foreach ($array as $item)
            <option value="{{$item->id}}">{{$item->$value}}</option>
        @endforeach
    </select>
</div>