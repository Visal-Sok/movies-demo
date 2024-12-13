<x-guest-layout>
    <x-slot:title>
        Nickflix - Manage Your Subscription
    </x-slot:title>

    <div id="myModal" class="modal flex justify-center items-center">

        @if (!Auth::user()->subscription('default')->canceled())
            <div
                class="modal-content flex w-[30%] rounded-xl h-[35%] px-6 bg-white opacity-100 flex-col items-center justify-between py-20">
                <div class="">
                    <span class="close">&nbsp;</span>
                    <p class="text-2xl flex text-center">Are you sure you want to cancel your subscription?</p>
                </div>
                <form action="{{ route('cancelSubscription') }}" method="POST">
                    @csrf
                    <input type="submit" class="hover:cursor-pointer p-3 bg-red-500 rounded-lg text-white font-bold"
                        value="Cancel My Subscription">
                </form>
            </div>
        @else
            <div
                class="modal-content flex w-[30%] rounded-xl h-[35%] px-6 bg-white opacity-100 flex-col items-center justify-between py-20">
                <div class="">
                    <span class="close">&nbsp;</span>
                    <p class="text-2xl flex text-center">Would you like to resume your subscription?</p>
                </div>
                <form action="{{ route('resumeSubscription') }}" method="POST">
                    @csrf
                    <input type="submit" class="hover:cursor-pointer p-3 bg-red-500 rounded-lg text-white font-bold"
                        value="Resume My Subscription">
                </form>
            </div>
        @endif

    </div>

    <style>
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100vh;
            /* Full height */
            overflow: hidden;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            /* margin: 15% auto; */
            /* 15% from the top and centered */
            border: 1px solid #888;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <div class="fixed w-[100%] h-[100%] hidden"></div>

    <h1 class="dark:text-white text-black mt-[50px] text-4xl">Manage Your Subscription</h1>

    <div class="flex flex-col justify-between items-center h-[120px] mt-20">
        <div class="text-2xl">
            You 
            @if (!Auth::user()->subscription('default')->canceled())
                are now subscribed
            @else
                were subscribed
            @endif
             to the <span class="text-red-500 font-bold text-2xl">{{ $name }}</span> plan
        </div>
        @if (Auth::user()->subscription('default')->canceled())
            <span class="text-2xl mb-4">Your subscription will end at {{ $end_date }}</span>
        @endif
        <button type="submit" id="myBtn"
            class="p-4 bg-red-600 text-white font-bold hover:shadow-xl duration-200 rounded-lg">
            @if (!Auth::user()->subscription('default')->canceled())
            Cancel
            @else
            Resume
            @endif
             Your
            Subscription</button>
    </div>
    <script type="text/javascript">
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "flex";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</x-guest-layout>
