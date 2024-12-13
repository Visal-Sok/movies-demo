<div class="absolute right-0 h-[100vh] w-[80vw] flex justify-between px-[4%] items-center">
    <livewire:searchactor />

    @if (isset($portrait) && isset($name))
        <x-actordetailview :actor="$actor"/>
    @endif
</div>