<x-guest-layout>
    <div class="flex w-full h-[60vh] justify-between items-center p-[2%]">

        <form action="{{ route('pickedSubscription') }}" method="POST">
            @foreach ($plans as $plan)
                <x-plancomponent :plan="$plan" />
            @endforeach
        </form>

    </div>
</x-guest-layout>
