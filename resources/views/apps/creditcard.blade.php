<x-guest-layout>
    <form action="{{ route('processSubscription') }}" id="subscribe-form" method="POST"
        class="flex flex-col justify-between items-center h-[50%]">

        <div class="mt-6 w-[60%] flex flex-row justify-between items-center">
            <a href="{{ route('subscribe') }}"
                class="p-4 rounded-xl bg-red-600 text-white shadow-sm hover:shadow-2xl duration-500 hover:bg-red-500">Return</a>
            <div class="text-lg">You have chosen the <span class="text-red-500 font-bold text-xl">{{ $name }}</span> plan</div>
        </div>

        <div
            class="w-[60%] flex h-[300px] bg-blue-600 rounded-2xl flex-col p-8 justify-between text-white shadow-sm hover:shadow-2xl duration-200 hover:mb-[2.5px]">
            @csrf
            <div class="flex mb-8 flex-row justify-between items-center">
                <label for="card-holder-name" class="text-black-600 font-semibold text-xl mr-4">Card Holder Name</label>
                <input id="card-holder-name" type="text"
                    value="{{ auth()->user()->name }}"class="w-auto px-3 font-semibold text-black rounded-2xl text-xl">
            </div>
            <div class="form-row">
                <div class="flex flex-col justify-between mb-4">
                    <label for="card-element" class="text-black-600 font-semibold text-xl mb-4 mr-4">Credit or debit
                        card</label>
                    <div id="card-element" class="form-control text-white"> </div>
                </div>
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
            <div class="stripe-errors"></div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            <div class="form-group text-center py-4 px-3 mx-auto">
                <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}"
                    class="btn p-5 bg-green-700 rounded-xl text-gray-100 font-bold ">Pay Now</button>
            </div>
            <input type="hidden" id="plan-silver" name="plan" value='{{ $plan }}'>
        </div>
    </form>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#f0f0f0',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#e0e5ea'
                }
            },
            invalid: {
                color: '#CC0000',
                iconColor: '#CC0000'
            }
        };
        var card = elements.create('card', {
            hidePostalCode: true,
            style: style
        });
        card.mount('#card-element');
        console.log(document.getElementById('card-element'));
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', async (e) => {
            console.log("attempting");
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );
            if (error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                paymentMethodHandler(setupIntent.payment_method);
            }
        });

        function paymentMethodHandler(payment_method) {
            var form = document.getElementById('subscribe-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', payment_method);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
</x-guest-layout>
