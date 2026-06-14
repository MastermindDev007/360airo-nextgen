@props([
    'title' => '',
    'value' => '',
    'suffix' => '',
    'prefix' => '',
    'trend' => null,
    'trendValue' => null,
    'icon' => null,
    'color' => 'primary',
    'sparkline' => null,
])

@php
$colors = [
    'primary' => ['bg' => 'bg-primary-500/10', 'text' => 'text-primary-400', 'icon' => 'text-primary-400'],
    'success' => ['bg' => 'bg-success-500/10', 'text' => 'text-success-400', 'icon' => 'text-success-400'],
    'warning' => ['bg' => 'bg-warning-500/10', 'text' => 'text-warning-400', 'icon' => 'text-warning-400'],
    'danger'  => ['bg' => 'bg-danger-500/10',  'text' => 'text-danger-400',  'icon' => 'text-danger-400'],
    'info'    => ['bg' => 'bg-info-500/10',    'text' => 'text-info-400',    'icon' => 'text-info-400'],
];
$c = $colors[$color] ?? $colors['primary'];
@endphp

<div {{ $attributes->merge(['class' => 'card card-elevated group hover:border-[var(--border-strong)] transition-all duration-[var(--duration-fast)]']) }}>
    <div class="flex items-start justify-between mb-3">
        <div class="flex items-center gap-2">
            @if($icon)
            <div class="w-9 h-9 rounded-[var(--radius-lg)] {{ $c['bg'] }} flex items-center justify-center">
                {!! $icon !!}
            </div>
            @endif
            <span class="text-[13px] font-medium text-[var(--text-secondary)]">{{ $title }}</span>
        </div>
        @if($trend)
        <div class="flex items-center gap-1 text-xs font-semibold {{ $trend === 'up' ? 'text-success-400' : ($trend === 'down' ? 'text-danger-400' : 'text-[var(--text-tertiary)]') }}">
            @if($trend === 'up')
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l9.2-9.2M17 17V7H7"/></svg>
            @elseif($trend === 'down')
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 7l-9.2 9.2M7 7v10h10"/></svg>
            @endif
            {{ $trendValue }}
        </div>
        @endif
    </div>

    <div class="flex items-baseline gap-1">
        @if($prefix)
        <span class="text-lg font-semibold text-[var(--text-secondary)]">{{ $prefix }}</span>
        @endif
        <span class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">{{ $value }}</span>
        @if($suffix)
        <span class="text-lg font-semibold text-[var(--text-secondary)]">{{ $suffix }}</span>
        @endif
    </div>

    {{-- Sparkline placeholder area --}}
    @if($sparkline)
    <div class="mt-3 h-8 opacity-50 group-hover:opacity-80 transition-opacity">
        {{ $sparkline }}
    </div>
    @endif
</div>
