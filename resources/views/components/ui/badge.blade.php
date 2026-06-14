@props([
    'variant' => 'default',
    'size' => 'md',
    'dot' => false,
    'removable' => false,
])

@php
$variants = [
    'default' => 'bg-[var(--surface-secondary)] text-[var(--text-secondary)] border border-[var(--border-default)]',
    'primary' => 'bg-primary-500/15 text-primary-400 border border-primary-500/20',
    'success' => 'bg-success-500/15 text-success-400 border border-success-500/20',
    'warning' => 'bg-warning-500/15 text-warning-400 border border-warning-500/20',
    'danger'  => 'bg-danger-500/15 text-danger-400 border border-danger-500/20',
    'info'    => 'bg-info-500/15 text-info-400 border border-info-500/20',
];
$sizes = [
    'sm' => 'text-[10px] px-1.5 py-0.5',
    'md' => 'text-xs px-2 py-0.5',
];
@endphp

<span {{ $attributes->merge(['class' => implode(' ', [
    'inline-flex items-center gap-1 font-semibold rounded-full whitespace-nowrap',
    $variants[$variant] ?? $variants['default'],
    $sizes[$size] ?? $sizes['md'],
])]) }}>
    @if($dot)
        <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
    @endif
    {{ $slot }}
    @if($removable)
        <button class="ml-0.5 hover:text-[var(--text-primary)] transition-colors" aria-label="Remove">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    @endif
</span>
