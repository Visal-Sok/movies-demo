<x-app-layout>
    <form method="post" enctype="multipart/form-data"
        class="absolute right-0 h-[100vh] w-[80vw] flex justify-between px-[4%] items-center">
        @csrf
        <div class="flex flex-col w-[48%] h-[92%] bg-blue-500 p-16 text-white text justify-between items-center rounded-2xl"
            style="font-family: 'Montserrat', sans-serif;">
            <span class="text-5xl mb-20">Edit Movie</span>
            <div class="w-[80%] h-[100%] flex flex-col justify-between">
                <input type="hidden" name="movieid" value="{{ $id }}" />
                <div class="">
                    <x-label-text label="Movie's Title" name="movietitle" :value="$title" />
                    <x-label-text label="Ratings" name="ratings" :value="$ratings" />
                    <x-label-select label="Type" name="type" :array="$type" value="type" />
                    <x-label-select label="Director" name="directed_by" :array="$director" value="name" />
                    <x-genre-select :allgenres="$all_genre" :selectedgenres="$genre" />
                </div>
                {{-- <button type="submit"
                    class="relative bottom-0 bg-orange-500 px-10 py-4 rounded-lg font-bold">Update</button> --}}
            </div>
        </div>
        <div class="flex flex-col w-[48%] h-[92%] bg-blue-500 p-16 text-white text justify-between items-center rounded-2xl"
            style="font-family: 'Montserrat', sans-serif;">
            <span class="text-5xl mb-20"></span>
            <div class="w-[80%] h-[100%] flex flex-col justify-between">
                <div class="">
                    <x-label-text label="Description" name="description" :value="$description" />
                </div>
                <div class="flex flex-row justify-between mb-8 font-bold">
                    <label>Active Status</label>
                    <div class="flex flex-row">
                        <x-label-radio label="Active" group="status" value="1" checked="checked" />
                        <x-label-radio label="Inactive" group="status" value="0" />
                    </div>
                </div>
                <x-label-file label="Cover" name="cover" />
                <button type="submit"
                    class="relative bottom-0 bg-orange-500 px-10 py-4 rounded-lg font-bold">Update</button>
            </div>
        </div>
    </form>
</x-app-layout>
