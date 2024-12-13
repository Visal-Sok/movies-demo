@props([
    'portrait',
    'name',
    'dob',
    'age',
    'id',
])

<div class="flex flex-col w-[44%] h-[92%] bg-blue-300 p-16 text-white text items-center rounded-2xl" style="font-family: 'Montserrat', sans-serif;">
    <h2 class="font-extrabold text-3xl">
        {{ $name }}
    </h2>
    <div class="relative rounded-xl overflow-hidden !h-[350px] mt-10">
        <img src="{{ url('storage/image/' . $portrait) }}" class="object-cover !h-[420px]" />
    </div>
    <div class="flex flex-col relative rounded-xl overflow-hidden text-center">
        <table class="w-auto mt-[50px]">
            <tr>
                <td class="p-8 font-bold text-xl text-center justify-center">Date of Birth</td>
                <td colspan='3' class='p-8 text-xl font-light text-center justify-center'>{{ $dob }}</td>
            </tr>
            <tr>
                <td class="p-8 font-bold text-xl text-center justify-center">Age</td>
                <td colspan='3' class='p-8 text-xl font-light text-center justify-center'>{{ $age }}</td>
            </tr>
        </table>
    </div>
    <a wire:navigate href="{{route('EditActor', $id)}}" class="mt-6 py-4 font-bold bg-green-500 px-10 rounded-xl self-end">Update</a>
</div>