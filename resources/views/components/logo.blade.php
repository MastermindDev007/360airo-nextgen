@props([
    'variant' => 'full', // 'full', 'icon', 'compact', 'monochrome-light', 'monochrome-dark', 'glass'
    'class' => ''
])

@php
    // Determine SVG dimensions based on variant
    $svgClass = 'flex-shrink-0 ';
    if (in_array($variant, ['icon', 'compact'])) {
        $svgClass .= 'w-8 h-8'; // Matches sidebar icon size
    } else {
        $svgClass .= 'w-9 h-9'; // Slightly larger for full headers
    }
@endphp

<div class="flex items-center gap-3 {{ $class }} group">
    {{-- The "Orbital A" Icon --}}
    <svg class="{{ $svgClass }} transition-transform duration-500 ease-out group-hover:scale-105" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <defs>
            @if(in_array($variant, ['monochrome-light']))
                <linearGradient id="gradPrimary-{{ $variant }}" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFFFFF"/>
                    <stop offset="1" stop-color="#E2E8F0"/>
                </linearGradient>
            @elseif(in_array($variant, ['monochrome-dark']))
                <linearGradient id="gradPrimary-{{ $variant }}" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#0F172A"/>
                    <stop offset="1" stop-color="#334155"/>
                </linearGradient>
            @else
                <linearGradient id="gradPrimary-{{ $variant }}" x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#818CF8"/>
                    <stop offset="1" stop-color="#4F46E5"/>
                </linearGradient>
                <linearGradient id="gradSecondary-{{ $variant }}" x1="100" y1="0" x2="0" y2="100" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#38BDF8"/>
                    <stop offset="1" stop-color="#0284C7"/>
                </linearGradient>
                <linearGradient id="gradOrbit-{{ $variant }}" x1="0" y1="100" x2="100" y2="0" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#6366F1"/>
                    <stop offset="1" stop-color="#0EA5E9"/>
                </linearGradient>
            @endif
        </defs>

        @if(in_array($variant, ['monochrome-light', 'monochrome-dark']))
            <!-- Left Leg -->
            <path d="M50 15 L25 85 L42 85 L60 40 L50 15 Z" fill="url(#gradPrimary-{{ $variant }})"/>
            <!-- Right Leg Overlap -->
            <path d="M50 15 L75 85 L58 85 L40 40 L50 15 Z" fill="url(#gradPrimary-{{ $variant }})" opacity="0.8"/>
            <!-- 360 Orbit -->
            <ellipse cx="50" cy="55" rx="38" ry="14" fill="none" stroke="url(#gradPrimary-{{ $variant }})" stroke-width="6" opacity="0.6" transform="rotate(-15 50 55)"/>
            <circle cx="50" cy="25" r="4" fill="url(#gradPrimary-{{ $variant }})"/>
        @else
            <!-- Left Leg -->
            <path d="M50 15 L25 85 L42 85 L60 40 L50 15 Z" fill="url(#gradPrimary-{{ $variant }})"/>
            <!-- Right Leg Overlap -->
            <path d="M50 15 L75 85 L58 85 L40 40 L50 15 Z" fill="url(#gradSecondary-{{ $variant }})" opacity="0.9"/>
            <!-- 360 Orbit -->
            <ellipse cx="50" cy="55" rx="38" ry="14" fill="none" stroke="url(#gradOrbit-{{ $variant }})" stroke-width="6" opacity="0.6" transform="rotate(-15 50 55)"/>
            <!-- AI Core Dot -->
            <circle cx="50" cy="25" r="4" fill="#FFFFFF"/>
        @endif
    </svg>

    {{-- The Typography --}}
    @if(in_array($variant, ['full', 'glass']))
        <div class="font-display font-bold tracking-tight leading-none text-2xl flex items-center">
            <span class="text-[var(--text-primary)] opacity-90 transition-colors">360</span>
            <span class="text-[var(--color-primary-500)]">Airo</span>
        </div>
    @endif
</div>
