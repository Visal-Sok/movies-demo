<x-guest-layout>

    <div class="mt-4 grid grid-cols-2 gap-x-5 gap-y-5">
        <div class="relative rounded-xl overflow-hidden !h-[520px]">
            <img src="{{ url('storage/image/' . $actor->portrait) }}" class="object-cover !h-[625px]" />
        </div>
        <div class="flex flex-col relative rounded-xl overflow-hidden text-center">
            <span class="mt-6 font-bold text-3xl">{{ $actor->name }}</span>
            <table class="w-auto mt-[50px]">
                <tr>
                    <td class="py-8 font-bold text-xl text-center justify-center">Date of Birth</td>
                    <td colspan='3' class='py-8 text-xl font-light text-gray-500 text-center justify-center'>{{ $dob }}</td>
                </tr>
                <tr>
                    <td class="py-8 font-bold text-xl text-center justify-center">Age</td>
                    <td colspan='3' class='py-8 text-xl font-light text-gray-500 text-center justify-center'>{{ $age }}</td>
                </tr>
            </table>
        </div>
    </div>
    @if ($inmovies)
        <div class="pt-16 text-3xl font-light">More of <span class="font-extrabold">{{ $actor->name }}'s</span> films</div>
        <x-movies-section :movies="$inmovies" sectiontitle=""/>
    @endif
</x-guest-layout>