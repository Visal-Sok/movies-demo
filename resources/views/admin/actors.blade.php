<x-app-layout>
    <div class="absolute right-0 h-[100vh] w-[80vw] flex justify-between px-[4%] items-center">
        <livewire:searchactor />
    
        @if (isset($portrait) && isset($name))
            <x-actordetailview :name="$name" :portrait="$portrait" :age="$age" :dob="$dob" :id="$id" />
        @else
            <x-actorcreate :id="$actor"/>
        @endif
    </div>
</x-app-layout>