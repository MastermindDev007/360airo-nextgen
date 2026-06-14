@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconRight' => null,
    'loading' => false,
    'disabled' => false,
    'fullWidth' => false,
    'href' => null,
    'type' => 'button',
])

@php
$variants = [
    'primary'   => 'bg-primary-600 hover:bg-primary-500 text-white shadow-[var(--shadow-xs)]',
    'secondary' => 'bg-[var(--surface-secondary)] hover:bg-[var(--surface-tertiary)] text-[var(--text-primary)] border border-[var(--border-default)]',
    'outline'   => 'bg-transparent hover:bg-primary-500/10 text-primary-400 border border-primary-500/40 hover:border-primary-400',
    'ghost'     => 'bg-transparent hover:bg-[var(--surface-secondary)] text-[var(--text-secondary)] hover:text-[var(--text-primary)]',
    'danger'    => 'bg-danger-600 hover:bg-danger-500 text-white shadow-[var(--shadow-xs)]',
    'success'   => 'bg-success-600 hover:bg-success-500 text-white shadow-[var(--shadow-xs)]',
];

$sizes = [
    'xs' => 'h-7 px-2 text-xs gap-1.5 rounded-[var(--radius-md)]',
    'sm' => 'h-8 px-3 text-[13px] gap-2 rounded-[var(--radius-md)]',
    'md' => 'h-9 px-4 text-sm gap-2 rounded-[var(--radius-lg)]',
    'lg' => 'h-11 px-5 text-base gap-2.5 rounded-[var(--radius-lg)]',
];

$classes = implode(' ', [
    'inline-flex items-center justify-center font-semibold transition-all',
    'duration-[var(--duration-fast)] ease-[var(--ease-default)]',
    'active:scale-[0.98] focus-visible:ring-2 focus-visible:ring-primary-500/50',
    $variants[$variant] ?? $variants['primary'],
    $sizes[$size] ?? $sizes['md'],
    $fullWidth ? 'w-full' : '',
    $disabled || $loading ? 'opacity-50 cursor-not-allowed pointer-events-none' : 'cursor-pointer',
]);
@endphp

@if($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if($loading)
        <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
    @elseif($icon)
        {!! $icon !!}
    @endif
    {{ $slot }}
    @if($iconRight)
        {!! $iconRight !!}
    @endif
</a>
@else
<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} @disabled($disabled || $loading)>
    @if($loading)
        <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
    @elseif($icon)
        {!! $icon !!}
    @endif
    {{ $slot }}
    @if($iconRight)
        {!! $iconRight !!}
    @endif
</button>
@endif
