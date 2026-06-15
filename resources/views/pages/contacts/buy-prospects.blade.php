<div>
    <x-slot:header>
        <div>
            <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--text-primary)] to-[var(--text-secondary)] tracking-tight">Buy Prospects</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1 font-medium">Power your outreach with verified, high-intent B2B contact data</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="px-4 py-2 rounded-xl bg-primary-500/10 border border-primary-500/20 text-primary-400 font-semibold text-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Current Balance: 250 Credits
            </div>
        </div>
    </x-slot:header>

    {{-- Value Prop / Hero Section --}}
    <div class="relative overflow-hidden rounded-3xl bg-[var(--surface-secondary)]/30 backdrop-blur-xl border border-[var(--border-default)] p-8 mb-10 shadow-2xl">
        {{-- Background Effects --}}
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary-500/20 rounded-full blur-[80px]"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-purple-500/20 rounded-full blur-[80px]"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-xl">
                <h2 class="text-2xl font-bold text-[var(--text-primary)] mb-3">Scale your pipeline instantly</h2>
                <p class="text-[var(--text-secondary)] mb-6 text-sm leading-relaxed">
                    Unlock access to our database of over 250 million verified B2B professionals. 
                    Every prospect comes with double-verified work emails, mobile numbers, and rich firmographic data to hyper-personalize your outreach.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center gap-2 text-sm text-[var(--text-tertiary)] font-medium">
                        <svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        98% Email Deliverability
                    </div>
                    <div class="flex items-center gap-2 text-sm text-[var(--text-tertiary)] font-medium">
                        <svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Real-time Verification
                    </div>
                    <div class="flex items-center gap-2 text-sm text-[var(--text-tertiary)] font-medium">
                        <svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        No Expiring Credits
                    </div>
                </div>
            </div>
            
            <div class="flex-shrink-0 relative">
                <div class="w-32 h-32 bg-gradient-to-br from-primary-500/20 to-purple-500/20 rounded-full flex items-center justify-center border border-[var(--border-strong)] relative overflow-hidden group hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPgo8cmVjdCB3aWR0aD0iOCIgaGVpZ2h0PSI4IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz4KPC9zdmc+')] opacity-20 group-hover:opacity-40 transition-opacity"></div>
                    <svg class="w-12 h-12 text-primary-400 relative z-10 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Credit Packages --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger-children">
        @php
        $packages = [
            ['name' => 'Starter Pack', 'credits' => '1,000', 'price' => '$49', 'popular' => false, 'per_credit' => '$0.049', 'color' => 'blue'],
            ['name' => 'Growth Pack', 'credits' => '5,000', 'price' => '$199', 'popular' => true, 'per_credit' => '$0.039', 'color' => 'primary'],
            ['name' => 'Scale Pack', 'credits' => '25,000', 'price' => '$799', 'popular' => false, 'per_credit' => '$0.031', 'color' => 'purple'],
        ];
        @endphp

        @foreach($packages as $pkg)
        <div class="relative flex flex-col h-full bg-[var(--surface-secondary)]/50 backdrop-blur-sm border {{ $pkg['popular'] ? 'border-primary-500 shadow-xl shadow-primary-500/10 scale-105 z-10' : 'border-[var(--border-default)] hover:border-[var(--border-strong)]' }} rounded-3xl p-6 transition-all duration-300">
            @if($pkg['popular'])
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-primary-600 to-primary-400 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg whitespace-nowrap">
                Most Popular
            </div>
            @endif

            <div class="text-center mb-6 pt-4">
                <h3 class="text-lg font-bold text-[var(--text-primary)] mb-1">{{ $pkg['name'] }}</h3>
                <div class="text-[var(--text-tertiary)] text-xs font-medium uppercase tracking-wider">{{ $pkg['credits'] }} Credits</div>
            </div>

            <div class="text-center mb-8">
                <div class="flex items-end justify-center gap-1">
                    <span class="text-4xl font-extrabold text-[var(--text-primary)] tracking-tight">{{ $pkg['price'] }}</span>
                </div>
                <p class="text-xs text-[var(--text-tertiary)] mt-2">{{ $pkg['per_credit'] }} per prospect</p>
            </div>

            <div class="flex-1">
                <ul class="space-y-3 text-sm text-[var(--text-secondary)] mb-8">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-{{ $pkg['color'] }}-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ $pkg['credits'] }} verified email addresses</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-{{ $pkg['color'] }}-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Direct dial phone numbers</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-{{ $pkg['color'] }}-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Advanced firmographic filtering</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-{{ $pkg['color'] }}-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Credits never expire</span>
                    </li>
                </ul>
            </div>

            <button class="w-full py-3 px-4 rounded-xl font-bold transition-all {{ $pkg['popular'] ? 'bg-primary-600 hover:bg-primary-500 text-white shadow-lg shadow-primary-500/25' : 'bg-[var(--surface-tertiary)] hover:bg-[var(--border-subtle)] text-[var(--text-primary)]' }}">
                Select {{ $pkg['name'] }}
            </button>
        </div>
        @endforeach
    </div>

    {{-- Enterprise Banner --}}
    <div class="mt-10 rounded-2xl bg-[var(--surface-primary)] border border-[var(--border-default)] p-6 flex flex-col md:flex-row items-center justify-between gap-6 hover:border-[var(--border-strong)] transition-colors">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-[var(--surface-secondary)] flex items-center justify-center">
                <svg class="w-6 h-6 text-[var(--text-secondary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <div>
                <h4 class="text-base font-bold text-[var(--text-primary)]">Need more than 25,000 credits?</h4>
                <p class="text-sm text-[var(--text-tertiary)]">Get custom pricing and an enterprise account manager.</p>
            </div>
        </div>
        <x-ui.button variant="secondary">Contact Sales</x-ui.button>
    </div>
</div>
