<x-app-layout>
    <div class="absolute right-0 h-[100vh] w-[80vw] flex justify-between px-[4%] items-center">
        <livewire:SearchDirector />

        @if (isset($portrait) && isset($name))
            <x-directordetailview :name="$name" :portrait="$portrait" :id="$id" />
        @else
            <x-directorcreate :id="$director"/>
        @endif
    </div>
</x-app-layout>