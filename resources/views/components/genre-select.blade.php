@props(['allgenres', 'selectedgenres'])

<div class="flex flex-col">
    <label class="underline mb-5">Genres</label>
    <div class="flex flex-wrap gap-5">
        @php
            $selected_array = [];
            foreach ($selectedgenres as $key) {
                array_push($selected_array, $key->id);
            }
            $jsonString = json_encode($selected_array);
        @endphp
        @foreach ($allgenres as $gen)
            @php
                if (in_array($gen->id, $selected_array)) {
                    $selected = 1;
                } else {
                    $selected = 0;
                }
            @endphp
            <livewire:genre-button :buttonid="$gen->id" :genrename="$gen->genre" :selectedcss="$selected" />
        @endforeach
        <script>
            var passedArray = <?php echo $jsonString; ?>;
            function push(num) {
                passedArray.push(num);
            }
        </script>
    </div>
</div>
