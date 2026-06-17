<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">AI Workflows</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Automate tasks, enrichment, and personalization with AI</p>
        </div>
        <div class="flex flex-wrap gap-2 mt-4 sm:mt-0">
            <x-ui.button variant="primary" class="flex-1 sm:flex-none justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Create Workflow
            </x-ui.button>
        </div>
    </x-slot:header>

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card p-5">
            <div class="flex justify-between items-start mb-2">
                <div class="w-10 h-10 rounded-[var(--radius-lg)] bg-primary-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
            </div>
            <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1">Tasks Automated (30d)</div>
            <div class="text-2xl font-bold text-[var(--text-primary)]">14,250</div>
        </div>
        <div class="card p-5">
            <div class="flex justify-between items-start mb-2">
                <div class="w-10 h-10 rounded-[var(--radius-lg)] bg-info-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1">Credits Used</div>
            <div class="text-2xl font-bold text-[var(--text-primary)]">42,500 <span class="text-sm font-normal text-[var(--text-tertiary)]">/ 100k</span></div>
        </div>
        <div class="card p-5">
            <div class="flex justify-between items-start mb-2">
                <div class="w-10 h-10 rounded-[var(--radius-lg)] bg-success-500/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1">Active Workflows</div>
            <div class="text-2xl font-bold text-[var(--text-primary)]">8</div>
        </div>
    </div>

    {{-- Workflows List --}}
    <h2 class="text-lg font-semibold text-[var(--text-primary)] mb-4">Your Workflows</h2>
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 stagger-children">
        @php
        $workflows = [
            ['name' => 'Icebreaker Generator', 'desc' => 'Scrapes LinkedIn profiles and company news to generate personalized first lines.', 'status' => 'Active', 'runs' => '4,500', 'cost' => '1.2c/run', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'color' => 'primary'],
            ['name' => 'Auto-Enrichment (Clearbit)', 'desc' => 'Enriches new contacts with company data, revenue, and technologies used.', 'status' => 'Active', 'runs' => '8,200', 'cost' => '0.5c/run', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', 'color' => 'info'],
            ['name' => 'Objection Handling', 'desc' => 'Classifies replies and drafts AI responses for common objections (not interested, timing, budget).', 'status' => 'Active', 'runs' => '1,150', 'cost' => '2.5c/run', 'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'color' => 'success'],
            ['name' => 'Meeting Scheduler', 'desc' => 'Detects meeting intent and replies with personalized Calendly link.', 'status' => 'Paused', 'runs' => '400', 'cost' => '1.0c/run', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'color' => 'warning'],
        ];
        @endphp

        @foreach($workflows as $wf)
        <div class="card card-elevated flex flex-col group hover:border-[var(--border-strong)] transition-all">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-[var(--radius-lg)] bg-{{ $wf['color'] }}-500/10 flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6 text-{{ $wf['color'] }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $wf['icon'] }}"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[var(--text-primary)] group-hover:text-{{ $wf['color'] }}-400 transition-colors">{{ $wf['name'] }}</h3>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="flex items-center gap-1.5 text-xs font-medium {{ $wf['status'] === 'Active' ? 'text-success-400' : 'text-warning-400' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $wf['status'] === 'Active' ? 'bg-success-500' : 'bg-warning-500' }}"></span>
                                {{ $wf['status'] }}
                            </span>
                        </div>
                    </div>
                </div>
                <button class="p-1.5 rounded-[var(--radius-md)] hover:bg-[var(--surface-secondary)] text-[var(--text-tertiary)] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                </button>
            </div>
            
            <p class="text-sm text-[var(--text-secondary)] mb-6 flex-1">{{ $wf['desc'] }}</p>
            
            <div class="grid grid-cols-2 gap-4 py-4 border-t border-b border-[var(--border-subtle)] mb-4">
                <div>
                    <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider">Runs (30d)</div>
                    <div class="text-sm font-semibold text-[var(--text-primary)] mt-0.5">{{ $wf['runs'] }}</div>
                </div>
                <div>
                    <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider">Est. Cost</div>
                    <div class="text-sm font-semibold text-[var(--text-primary)] mt-0.5">{{ $wf['cost'] }}</div>
                </div>
            </div>
            
            <div class="flex gap-2">
                <x-ui.button variant="secondary" size="sm" class="flex-1">Edit Logic</x-ui.button>
                <x-ui.button variant="secondary" size="sm" class="flex-1">View Logs</x-ui.button>
            </div>
        </div>
        @endforeach
    </div>
</div>
