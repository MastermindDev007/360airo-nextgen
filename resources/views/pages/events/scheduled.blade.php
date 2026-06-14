<div x-data="{ 
        loaded: false,
        isRefreshing: false,
        refresh() {
            this.isRefreshing = true;
            $wire.refreshEvents().then(() => {
                this.isRefreshing = false;
                $dispatch('notify', { message: 'Events refreshed successfully!', type: 'success' });
            });
        }
    }" 
    x-init="setTimeout(() => loaded = true, 100)"
    class="relative w-full px-6 md:px-10 py-8 pb-32 min-h-screen" id="scheduled-events-container">

    {{-- ==========================================
         PAGE HEADER
         ========================================== --}}
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10 transition-all duration-700 transform"
         :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
        
        <div class="flex-1">
            <h1 class="text-3xl md:text-4xl font-black tracking-tight text-[var(--text-primary)] mb-2">
                Scheduled Events Calendar
            </h1>
            <p class="text-sm font-medium text-[var(--text-tertiary)] max-w-2xl">
                View and manage all your scheduled LinkedIn & campaigns events
            </p>
        </div>

        <div class="flex flex-col items-end gap-4">
            {{-- God-Level Success Badge (Replacing Old Toast) --}}
            <div class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-success-500/10 border border-success-500/20 backdrop-blur-md shadow-[0_0_15px_rgba(34,197,94,0.1)]">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-success-500"></span>
                </span>
                <span class="text-xs font-bold text-success-600 dark:text-success-400 tracking-wide">
                    Loaded 0 scheduled calls
                </span>
            </div>

            {{-- Refresh Action --}}
            <button @click="refresh()" 
                    class="glow-element group flex items-center gap-2 px-5 py-2.5 bg-primary-600 hover:bg-primary-500 text-white font-bold text-sm rounded-xl transition-all shadow-[0_4px_14px_rgba(99,102,241,0.39)] hover:shadow-[0_6px_20px_rgba(99,102,241,0.23)]">
                <svg class="w-4 h-4 transition-transform duration-500" :class="isRefreshing ? 'animate-spin' : 'group-hover:rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                <span x-text="isRefreshing ? 'Refreshing...' : 'Refresh'"></span>
            </button>
        </div>
    </div>

    {{-- ==========================================
         STATISTICS CARDS (Compact Card Format)
         ========================================== --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        
        {{-- Scheduled --}}
        <div class="flex items-center justify-between p-5 rounded-xl bg-[var(--surface-primary)] border border-success-500/40 shadow-md hover:border-success-500 hover:shadow-[0_0_15px_rgba(34,197,94,0.15)] transition-all group stagger-1" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="flex flex-col">
                <p class="text-[11px] font-black tracking-widest text-success-500 uppercase mb-1">Scheduled</p>
                <h3 class="text-3xl font-black text-[var(--text-primary)] leading-none">0</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-success-500/10 flex items-center justify-center text-success-500 border border-success-500/20 group-hover:scale-110 group-hover:bg-success-500/20 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </div>

        {{-- Completed --}}
        <div class="flex items-center justify-between p-5 rounded-xl bg-[var(--surface-primary)] border border-info-500/40 shadow-md hover:border-info-500 hover:shadow-[0_0_15px_rgba(56,189,248,0.15)] transition-all group stagger-2" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="flex flex-col">
                <p class="text-[11px] font-black tracking-widest text-info-500 uppercase mb-1">Completed</p>
                <h3 class="text-3xl font-black text-[var(--text-primary)] leading-none">0</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-info-500/10 flex items-center justify-center text-info-500 border border-info-500/20 group-hover:scale-110 group-hover:bg-info-500/20 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        {{-- No Show --}}
        <div class="flex items-center justify-between p-5 rounded-xl bg-[var(--surface-primary)] border border-warning-500/40 shadow-md hover:border-warning-500 hover:shadow-[0_0_15px_rgba(245,158,11,0.15)] transition-all group stagger-3" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="flex flex-col">
                <p class="text-[11px] font-black tracking-widest text-warning-500 uppercase mb-1">No Show</p>
                <h3 class="text-3xl font-black text-[var(--text-primary)] leading-none">0</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-warning-500/10 flex items-center justify-center text-warning-500 border border-warning-500/20 group-hover:scale-110 group-hover:bg-warning-500/20 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
        </div>

        {{-- Cancelled --}}
        <div class="flex items-center justify-between p-5 rounded-xl bg-[var(--surface-primary)] border border-danger-500/40 shadow-md hover:border-danger-500 hover:shadow-[0_0_15px_rgba(239,68,68,0.15)] transition-all group stagger-4" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="flex flex-col">
                <p class="text-[11px] font-black tracking-widest text-danger-500 uppercase mb-1">Cancelled</p>
                <h3 class="text-3xl font-black text-[var(--text-primary)] leading-none">0</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-danger-500/10 flex items-center justify-center text-danger-500 border border-danger-500/20 group-hover:scale-110 group-hover:bg-danger-500/20 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
    </div>

    {{-- ==========================================
         INFO BANNER
         ========================================== --}}
    <div class="mb-8 transition-all duration-700 transform stagger-5" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
        <div class="flex items-center gap-3 p-4 rounded-2xl bg-info-500/10 border border-info-500/20 backdrop-blur-md shadow-sm">
            <div class="p-2 rounded-full bg-info-500/20 text-info-500 animate-[pulse_3s_infinite]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <p class="text-sm font-medium text-[var(--text-secondary)]">
                <span class="font-bold text-info-600 dark:text-info-400">Click on any date</span> to see all scheduled emails and LinkedIn messages for that day.
            </p>
        </div>
    </div>

    {{-- ==========================================
         CALENDAR UI (Premium Glass Panel)
         ========================================== --}}
    <div class="glass-panel p-6 md:p-8 transition-all duration-700 transform stagger-6" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
        
        {{-- Calendar Header --}}
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6 mb-8">
            
            {{-- Navigation --}}
            <div class="flex items-center gap-2">
                <button class="px-4 py-2 text-sm font-bold text-[var(--text-secondary)] hover:text-[var(--text-primary)] bg-[var(--surface-secondary)] hover:bg-[var(--border-subtle)] border border-[var(--border-subtle)] rounded-lg transition-colors shadow-sm">
                    Today
                </button>
                <div class="flex items-center bg-[var(--surface-secondary)] border border-[var(--border-subtle)] rounded-lg shadow-sm">
                    <button class="p-2 text-[var(--text-tertiary)] hover:text-[var(--text-primary)] border-r border-[var(--border-subtle)] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button class="p-2 text-[var(--text-tertiary)] hover:text-[var(--text-primary)] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            {{-- Month / Year --}}
            <h2 class="text-2xl font-black text-[var(--text-primary)] tracking-tight">
                {{ $currentMonth }}
            </h2>

            {{-- View Toggles (Segmented Control) --}}
            <div class="relative flex items-center p-1 bg-[var(--surface-primary)] border border-[var(--border-subtle)] rounded-xl shadow-sm overflow-hidden" x-data="{ view: @entangle('viewMode') }">
                
                {{-- Sliding Indicator --}}
                <div class="absolute inset-y-1 left-1 bg-primary-600 rounded-lg transition-transform duration-300 ease-[var(--ease-spring)]"
                     :class="{
                        'translate-x-0 w-[64px]': view === 'Month',
                        'translate-x-[64px] w-[64px]': view === 'Week',
                        'translate-x-[128px] w-[54px]': view === 'Day',
                        'translate-x-[182px] w-[70px]': view === 'Agenda'
                     }">
                </div>

                {{-- Options --}}
                <button wire:click="setViewMode('Month')" class="relative z-10 w-[64px] py-1.5 text-xs font-bold transition-colors focus:outline-none" :class="view === 'Month' ? 'text-white' : 'text-[var(--text-tertiary)] hover:text-[var(--text-primary)]'">Month</button>
                <button wire:click="setViewMode('Week')" class="relative z-10 w-[64px] py-1.5 text-xs font-bold transition-colors focus:outline-none" :class="view === 'Week' ? 'text-white' : 'text-[var(--text-tertiary)] hover:text-[var(--text-primary)]'">Week</button>
                <button wire:click="setViewMode('Day')" class="relative z-10 w-[54px] py-1.5 text-xs font-bold transition-colors focus:outline-none" :class="view === 'Day' ? 'text-white' : 'text-[var(--text-tertiary)] hover:text-[var(--text-primary)]'">Day</button>
                <button wire:click="setViewMode('Agenda')" class="relative z-10 w-[70px] py-1.5 text-xs font-bold transition-colors focus:outline-none" :class="view === 'Agenda' ? 'text-white' : 'text-[var(--text-tertiary)] hover:text-[var(--text-primary)]'">Agenda</button>
            </div>
        </div>

        {{-- Calendar Grid --}}
        <div class="w-full border border-[var(--border-subtle)] rounded-2xl overflow-hidden bg-[var(--surface-primary)] shadow-inner">
            
            {{-- Days Header --}}
            <div class="grid grid-cols-7 border-b border-[var(--border-subtle)] bg-[var(--surface-secondary)]/50">
                @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                    <div class="py-3 text-center text-xs font-black tracking-widest text-[var(--text-tertiary)] uppercase">
                        {{ $day }}
                    </div>
                @endforeach
            </div>

            {{-- Grid Dates (5 rows x 7 cols = 35 cells) --}}
            <div class="grid grid-cols-7 bg-[var(--border-subtle)] gap-px">
                {{-- Example: Rendering previous month days, current month days --}}
                @php
                    $days = array_merge(
                        [31], // prev month day
                        range(1, 30), // current month days
                        range(1, 4) // next month days
                    );
                @endphp

                @foreach($days as $index => $day)
                    @php
                        $isCurrentMonth = ($index >= 1 && $index <= 30);
                        $isToday = ($isCurrentMonth && $day == 15); // dummy logic for today
                    @endphp
                    <div class="min-h-[120px] p-2 bg-[var(--surface-primary)] hover:bg-[var(--surface-secondary)] transition-colors cursor-pointer group relative {{ $isToday ? 'ring-2 ring-inset ring-primary-500 bg-primary-500/5' : '' }}">
                        <span class="text-xs font-bold p-1.5 rounded-lg {{ $isToday ? 'bg-primary-500 text-white shadow-md' : ($isCurrentMonth ? 'text-[var(--text-secondary)]' : 'text-[var(--text-tertiary)]') }}">
                            {{ str_pad($day, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        {{-- Empty state styling for standard cells --}}
                        <div class="absolute inset-0 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                            <div class="w-6 h-6 rounded-full bg-primary-500/10 flex items-center justify-center text-primary-500">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/></svg>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
