<x-guest-layout>
    <h2 class="text-center text-red-600 font-bold text-3xl underline mb-2 mt-2">Choose A Payment Plan</h2>
    {{-- <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
    <stripe-pricing-table pricing-table-id="prctbl_1OnFI0GHEf820fpX1aXrQjNY"
        publishable-key="pk_test_51MpDeSGHEf820fpXucX4idrwXpJzsqYuHhQvnkXU0wtQyMGdZndFkIIit8YNhAXyq7PRqu9cW7n3ZeGQJ4A094i500dtmYLiHD">
    </stripe-pricing-table> --}}
    <div class="grid grid-cols-2 gap-4 w-full h-[75vh] justify-between items-center p-[1%]">
        @foreach ($plans as $plan)
            <x-plancomponent :plan="$plan" />
        @endforeach
    </div>
</x-guest-layout>
