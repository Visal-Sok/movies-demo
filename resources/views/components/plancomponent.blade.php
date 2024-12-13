@props(['plan'])

<form action="{{ route('pickedSubscription') }}" method="POST" id="subscribe-form" class = "">
    @csrf
    <input type="hidden" id="plan-silver" name="plan" value='{{ $plan->id }}'>
    <input type="hidden" id="plan-silver" name="name" value='{{ $plan->product->name }}'>
    <div class="flex flex-col flex-wrap justify-between p-6 items-center bg-red-600 rounded-3xl text-white h-[320px]">
        <div class="font-bold text-xl underline flex justify-self-start">
            {{ $plan->product->name }}
        </div>
        <div class="h-[20%] flex relative flex-col items-center px-6 top-[-50px]">
            <div class="font-semibold text-xl text-green-300 flex">
                {{ strtoupper($plan->price->currency) }} {{ $plan->price->unit_amount / 100 }} /{{ strtoupper($plan->price->recurring->interval) }}
            </div>
            <div class="mt-3 text-base">
                {{ $plan->product->description }}
            </div>
        </div>
        <button class="place-self-center content-center rounded-3xl bg-green-500 px px-10 py-3 w-[144px] h-[48px]">
            Subcribe
        </button>
    </div>
</form>
