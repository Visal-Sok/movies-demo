@props([
    'label',
    'value',
    'group',
    'checked' => '',
])


<div class="ml-10 flex justify-center items-center">
    <input class="mr-3" type="radio" name="{{$group}}" value="{{$value}}" {{($checked !='') ? 'checked' : ''}}>
    <label for="{{$value}}">{{$label}}</label><br>
</div>