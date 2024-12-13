<x-guest-layout>
    <div class="container">
        <div class="flex flex-col items-center w-[98%] h-[90%] bg-red-600 rounded-3xl text-white py-5">
            <div class=" flex flex-col items-center px-10">
                <div class=" text-xl pt-20 flex mb-20">
                    You will be paying {{ $plan->price }} per month to subscribe to our <span class="font-bold">{{ $plan->name }}</span> plan
                </div>
                <div class="">
                    {{-- Our Basic Pro plan offers a lot of the conveniences our customers will surely enjoy! --}}
                    {{-- {{$plan->description}} --}}
                </div>
            </div>
            <a class="rounded-3xl bg-green-500 px-10 py-3 mb-4" href="{{route('subscribe', $plan->id)}}">Subcribe</a>
        </div>
    </div>
</x-guest-layout>