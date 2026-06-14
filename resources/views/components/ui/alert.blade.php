@props([
    'type' => 'info',
    'title' => null,
    'dismissible' => false,
])

@php
$types = [
    'info'    => ['bg' => 'bg-info-500/10',    'border' => 'border-info-500/20',    'icon' => 'text-info-400'],
    'success' => ['bg' => 'bg-success-500/10', 'border' => 'border-success-500/20', 'icon' => 'text-success-400'],
    'warning' => ['bg' => 'bg-warning-500/10', 'border' => 'border-warning-500/20', 'icon' => 'text-warning-400'],
    'danger'  => ['bg' => 'bg-danger-500/10',  'border' => 'border-danger-500/20',  'icon' => 'text-danger-400'],
];
$t = $types[$type] ?? $types['info'];
$icons = [
    'info'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
    'success' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
    'warning' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>',
    'danger'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
];
@endphp

<div {{ $attributes->merge(['class' => "flex items-start gap-3 px-4 py-3 rounded-[var(--radius-xl)] border {$t['bg']} {$t['border']}"]) }}
     role="alert">
    <svg class="w-5 h-5 flex-shrink-0 mt-0.5 {{ $t['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $icons[$type] ?? $icons['info'] !!}</svg>
    <div class="flex-1 min-w-0">
        @if($title)
        <p class="text-sm font-semibold text-[var(--text-primary)] mb-0.5">{{ $title }}</p>
        @endif
        <div class="text-sm text-[var(--text-secondary)]">{{ $slot }}</div>
    </div>
    @if($dismissible)
    <button class="flex-shrink-0 p-1 rounded-[var(--radius-sm)] hover:bg-white/10 text-[var(--text-tertiary)]" onclick="this.closest('[role=alert]').remove()">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    @endif
</div>
