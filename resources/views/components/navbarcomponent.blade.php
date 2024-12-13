@props([
    'route',
    'href',
    'icon',
    'name',
    'extra' => '',
])

<a class="inline-flex items-center space-x-2 py-1  font-semibold hover:text-red-400 hover:border-r-red-300 transition hover:scale-[1.05]
        {{ request()->is("$route") ? ' pr-20 text-red-600' : ''}} " wire:navigate href="{{ $href }}">
    <span class="material-symbols-outlined">
        {{ $icon }}
    </span>
    <span>{{ $name }}{{ $extra }}</span>
</a>