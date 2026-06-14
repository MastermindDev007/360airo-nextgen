@props([
    'icon' => null,
    'title' => 'No data yet',
    'description' => '',
    'actionLabel' => null,
    'actionUrl' => null,
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-16 px-6 text-center']) }}>
    @if($icon)
    <div class="w-16 h-16 rounded-2xl bg-[var(--surface-secondary)] flex items-center justify-center mb-5">
        {!! $icon !!}
    </div>
    @endif

    <h3 class="text-lg font-semibold text-[var(--text-primary)] mb-2">{{ $title }}</h3>

    @if($description)
    <p class="text-sm text-[var(--text-tertiary)] max-w-sm mb-6">{{ $description }}</p>
    @endif

    @if($actionLabel && $actionUrl)
    <x-ui.button variant="primary" size="md" href="{{ $actionUrl }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        {{ $actionLabel }}
    </x-ui.button>
    @endif

    {{ $slot }}
</div>
