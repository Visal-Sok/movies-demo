<x-app-layout>
    <div class="absolute right-0 h-[100vh] w-[80vw] flex justify-between px-[4%] items-center">
        <div class="flex flex-col w-[54%] h-[92%] bg-blue-500 p-16 text-white text justify-between items-center rounded-2xl" 
        style="font-family: 'Montserrat', sans-serif;">
        <span class="text-5xl mb-20">Create Director</span>
            <form method="post" class="w-[80%] h-[100%] flex flex-col justify-between" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="directorid" value="{{$id}}" />
                <div class="">
                    <x-label-text label="Director's Name" name="directorname" :value="$name" />
                    <x-label-file label="Portrait" name="portrait" />
                </div>
                <button type="submit" class="relative bottom-0 bg-green-500 px-10 py-4 rounded-lg font-bold">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>