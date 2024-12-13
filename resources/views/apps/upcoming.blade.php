<x-guest-layout>

    <x-slot:title>
        Nickflix - Upcoming Films
    </x-slot>

    <h1 class="dark:text-white text-black mt-[50px] text-4xl">Upcoming Films</h1>

    <x-movie-viewsection :movies="$movies"/>

</x-guest-layout>