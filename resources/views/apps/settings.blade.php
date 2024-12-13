<x-guest-layout>
    <x-slot:title>
        Nickflix - Settings
    </x-slot:title>

    <h1 class="dark:text-white text-black mt-[50px] text-4xl">Settings</h1>

    <div class="container grid grid-cols-1 w-[65%] flex-col justify-center items-center mt-[80px] mx-auto bg-red-600 px-[72px] py-[36px] rounded-3xl gap-y-[14px]">
        <div class="text-white text-xl font-extrabold underline">Payment Details</div>
        @if (Auth::user()->subscribed())
            <a class="justify-center relative items-center flex text-black font-semibold text-lg bg-white rounded-xl p-[12px]" wire:navigate href="{{route('manage')}}">
                Manage Your Subsciption
            </a>
        @else
            <a class="justify-center relative items-center flex text-black font-semibold text-lg bg-white rounded-xl p-[12px]" wire:navigate href="{{route('subscribe')}}">
                Plans and Subscription
            </a>
        @endif
        
        {{-- <a class="justify-center relative items-center flex text-black font-semibold text-lg bg-white rounded-xl p-[12px]" wire:navigate href="">
            Membership and Billing
        </a> --}}
        <hr/>
        <div class="text-white text-xl font-extrabold">Appearance</div>
        <a class="justify-center relative items-center flex text-black font-semibold text-lg bg-white rounded-xl p-[12px]" wire:navigate href="">
            Themes
        </a>
    </div>

</x-guest-layout>