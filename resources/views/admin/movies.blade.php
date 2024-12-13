<x-app-layout>
    <div class="absolute right-0 h-[100vh] w-[80vw] flex justify-between px-[4%] items-center">
        <livewire:searchmovie />

        @if (isset($ratings))
            <x-moviedetailview :ratings="$ratings" :cover="$cover" :id="$id" :type="$type" :status="$status" :director="$director" :genres="$genre" :title="$title" />
        @elseif (isset($director))
            <x-moviecreate :id="$movie" :directorarray="$director" :typearray="$type" />
        @elseif (isset($actors))
            <x-movieaddactor :movie="$movie" :actorarray="$actors" />
        @elseif (isset($genres))
            <x-movieaddgenre :movie="$movie" :genrearray="$genres" />
        @endif
    </div>
</x-app-layout>