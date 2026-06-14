<div x-data="{ 
        loaded: false,
        isUploading: false,
        refresh() {
            $dispatch('notify', { message: 'Lists refreshed successfully!', type: 'success' });
        }
    }" 
    x-init="setTimeout(() => loaded = true, 100)"
    class="relative w-full px-6 md:px-10 py-8 pb-32 min-h-screen" id="email-lists-container">

    {{-- ==========================================
         PAGE HEADER
         ========================================== --}}
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-8 transition-all duration-700 transform"
         :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
        
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-black tracking-tight text-[var(--text-primary)] mb-2">
                    Email Lists
                </h1>
                <p class="text-sm font-medium text-[var(--text-tertiary)] max-w-2xl">
                    Manage and organise your contact lists
                </p>
            </div>
            
            {{-- View Toggles (Segmented Control) --}}
            <div class="relative flex items-center p-1 bg-black/40 border border-white/10 backdrop-blur-xl rounded-xl shadow-inner w-max" x-data="{ view: @entangle('viewMode') }">
                {{-- Sliding Indicator --}}
                <div class="absolute inset-y-1 left-1 bg-white/10 border border-white/10 shadow-[0_2px_8px_rgba(0,0,0,0.5)] rounded-lg transition-transform duration-300 ease-[var(--ease-spring)]"
                     :class="{
                        'translate-x-0 w-[72px]': view === 'Lists',
                        'translate-x-[76px] w-[90px]': view === 'Contacts'
                     }">
                </div>
                {{-- Options --}}
                <button wire:click="setViewMode('Lists')" class="relative z-10 w-[72px] py-1.5 text-xs font-bold transition-colors focus:outline-none" :class="view === 'Lists' ? 'text-white' : 'text-white/50 hover:text-white'">Lists</button>
                <button wire:click="setViewMode('Contacts')" class="relative z-10 w-[90px] py-1.5 text-xs font-bold transition-colors focus:outline-none" :class="view === 'Contacts' ? 'text-white' : 'text-white/50 hover:text-white'">Contacts</button>
            </div>
        </div>

        <div class="flex items-center gap-3">
            {{-- Refresh Action --}}
            <button @click="refresh()" 
                    class="flex items-center gap-2 px-4 py-2.5 bg-black/40 hover:bg-white/5 border border-white/10 text-white/70 hover:text-white font-bold text-sm rounded-xl transition-all shadow-sm backdrop-blur-xl">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                <span>Refresh</span>
            </button>
            {{-- Upload Action --}}
            <button class="glow-element flex items-center gap-2 px-6 py-2.5 bg-primary-600 hover:bg-primary-500 text-white font-bold text-sm rounded-xl transition-all shadow-[0_4px_14px_rgba(99,102,241,0.39)] hover:shadow-[0_6px_20px_rgba(99,102,241,0.23)]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                <span>Upload</span>
            </button>
        </div>
    </div>

    {{-- ==========================================
         STATISTICS CARDS (Pro-Level Refined)
         ========================================== --}}
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5 mb-8">
        
        {{-- Total Lists --}}
        <div class="relative overflow-hidden flex flex-col p-5 rounded-2xl bg-gradient-to-b from-white/[0.04] to-transparent border-t-2 border-t-info-500 border-x border-b border-x-white/5 border-b-white/5 shadow-lg hover:bg-white/[0.06] transition-colors group stagger-1" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="absolute top-0 right-0 p-4 opacity-30 group-hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8 text-info-500 drop-shadow-[0_0_12px_rgba(56,189,248,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
            </div>
            <p class="text-[11px] font-bold text-white/50 mb-1 z-10">Total Lists</p>
            <h3 class="text-3xl font-black text-white leading-none z-10 mb-1">0</h3>
            <p class="text-[10px] text-info-400 font-bold z-10 tracking-wider uppercase">Active</p>
        </div>

        {{-- Total Contacts --}}
        <div class="relative overflow-hidden flex flex-col p-5 rounded-2xl bg-gradient-to-b from-white/[0.04] to-transparent border-t-2 border-t-success-500 border-x border-b border-x-white/5 border-b-white/5 shadow-lg hover:bg-white/[0.06] transition-colors group stagger-2" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="absolute top-0 right-0 p-4 opacity-30 group-hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8 text-success-500 drop-shadow-[0_0_12px_rgba(34,197,94,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <p class="text-[11px] font-bold text-white/50 mb-1 z-10">Total Contacts</p>
            <h3 class="text-3xl font-black text-white leading-none z-10 mb-1">0</h3>
            <p class="text-[10px] text-success-400 font-bold z-10 tracking-wider uppercase">Valid</p>
        </div>

        {{-- This Month --}}
        <div class="relative overflow-hidden flex flex-col p-5 rounded-2xl bg-gradient-to-b from-white/[0.04] to-transparent border-t-2 border-t-primary-500 border-x border-b border-x-white/5 border-b-white/5 shadow-lg hover:bg-white/[0.06] transition-colors group stagger-3" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="absolute top-0 right-0 p-4 opacity-30 group-hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8 text-primary-500 drop-shadow-[0_0_12px_rgba(99,102,241,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <p class="text-[11px] font-bold text-white/50 mb-1 z-10">This Month</p>
            <h3 class="text-3xl font-black text-white leading-none z-10 mb-1">+0</h3>
            <p class="text-[10px] text-primary-400 font-bold z-10 tracking-wider uppercase">New</p>
        </div>

        {{-- Avg Quality --}}
        <div class="relative overflow-hidden flex flex-col p-5 rounded-2xl bg-gradient-to-b from-white/[0.04] to-transparent border-t-2 border-t-warning-500 border-x border-b border-x-white/5 border-b-white/5 shadow-lg hover:bg-white/[0.06] transition-colors group stagger-4" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="absolute top-0 right-0 p-4 opacity-30 group-hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8 text-warning-500 drop-shadow-[0_0_12px_rgba(245,158,11,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
            </div>
            <p class="text-[11px] font-bold text-white/50 mb-1 z-10">Avg. Quality</p>
            <h3 class="text-3xl font-black text-white leading-none z-10 mb-1">0%</h3>
            <p class="text-[10px] text-warning-400 font-bold z-10 tracking-wider uppercase">Score</p>
        </div>

        {{-- Open Rate --}}
        <div class="relative overflow-hidden flex flex-col p-5 rounded-2xl bg-gradient-to-b from-white/[0.04] to-transparent border-t-2 border-t-danger-500 border-x border-b border-x-white/5 border-b-white/5 shadow-lg hover:bg-white/[0.06] transition-colors group stagger-5" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="absolute top-0 right-0 p-4 opacity-30 group-hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8 text-danger-500 drop-shadow-[0_0_12px_rgba(239,68,68,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <p class="text-[11px] font-bold text-white/50 mb-1 z-10">Open Rate</p>
            <h3 class="text-3xl font-black text-white leading-none z-10 mb-1">0%</h3>
            <p class="text-[10px] text-danger-400 font-bold z-10 tracking-wider uppercase">Avg</p>
        </div>

        {{-- Click Rate --}}
        <div class="relative overflow-hidden flex flex-col p-5 rounded-2xl bg-gradient-to-b from-white/[0.04] to-transparent border-t-2 border-t-cyan-500 border-x border-b border-x-white/5 border-b-white/5 shadow-lg hover:bg-white/[0.06] transition-colors group stagger-6" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            <div class="absolute top-0 right-0 p-4 opacity-30 group-hover:opacity-100 transition-opacity">
                <svg class="w-8 h-8 text-cyan-500 drop-shadow-[0_0_12px_rgba(6,182,212,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
            </div>
            <p class="text-[11px] font-bold text-white/50 mb-1 z-10">Click Rate</p>
            <h3 class="text-3xl font-black text-white leading-none z-10 mb-1">0%</h3>
            <p class="text-[10px] text-cyan-400 font-bold z-10 tracking-wider uppercase">Avg</p>
        </div>

    </div>

    {{-- ==========================================
         HOLOGRAPHIC INFO BANNER
         ========================================== --}}
    <div class="mb-8 transition-all duration-700 transform stagger-7" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 py-3 px-5 rounded-full bg-gradient-to-r from-primary-500/20 via-primary-500/5 to-transparent border border-primary-500/20 backdrop-blur-xl shadow-[0_0_30px_rgba(99,102,241,0.05)] overflow-hidden relative">
            <div class="absolute inset-y-0 left-0 w-1 bg-primary-500 shadow-[0_0_15px_rgba(99,102,241,0.8)]"></div>
            
            <div class="flex items-center gap-4 pl-2">
                <div class="text-primary-400 animate-[pulse_3s_infinite] drop-shadow-[0_0_8px_rgba(99,102,241,0.6)]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white flex items-center gap-2 tracking-wide">
                        Need Targeted Prospects? 
                        <span class="px-2 py-0.5 rounded-md bg-primary-500/20 border border-primary-500/30 text-primary-400 text-[9px] uppercase tracking-widest">Verified Lists</span>
                    </h4>
                    <p class="text-xs text-white/60 mt-0.5 font-medium">
                        Tell us your target audience (industry, location, titles), and we'll deliver a highly qualified prospect list.
                    </p>
                </div>
            </div>
            <button class="shrink-0 px-4 py-1.5 bg-primary-600 hover:bg-primary-500 text-white font-bold text-xs rounded-full transition-all shadow-[0_0_15px_rgba(99,102,241,0.4)] hover:shadow-[0_0_25px_rgba(99,102,241,0.6)]">
                Wanna buy prospects? ⚡
            </button>
        </div>
    </div>

    {{-- ==========================================
         MAIN LIST AREA (Deep Frosted Glass)
         ========================================== --}}
    <div class="bg-[#0B1121]/80 backdrop-blur-2xl border border-white/10 shadow-[0_16px_40px_rgba(0,0,0,0.5),inset_0_1px_0_rgba(255,255,255,0.05)] rounded-2xl p-6 md:p-8 mb-8 transition-all duration-700 transform stagger-8 relative overflow-hidden" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
        
        {{-- Subtle ambient glow inside the panel --}}
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-32 bg-primary-500/5 blur-[100px] pointer-events-none"></div>

        {{-- Toolbar Island --}}
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-10 bg-black/40 border border-white/10 p-2 rounded-2xl backdrop-blur-md relative z-10">
            
            {{-- Search --}}
            <div class="flex-1 w-full md:w-auto relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-white/40 group-focus-within:text-primary-400 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" wire:model.live="searchQuery" placeholder="Search lists by name, description, or tags..." 
                       class="w-full pl-11 pr-4 py-2.5 bg-white/5 border border-transparent focus:bg-white/10 focus:border-white/20 rounded-xl text-sm text-white placeholder-white/30 transition-all outline-none">
            </div>

            <div class="flex items-center gap-2">
                {{-- Status Select --}}
                <select class="px-4 py-2.5 bg-white/5 border border-transparent focus:border-white/20 rounded-xl text-sm font-bold text-white/80 outline-none transition-all cursor-pointer appearance-none">
                    <option class="bg-[#0B1121] text-white">All Status</option>
                    <option class="bg-[#0B1121] text-white">Active</option>
                    <option class="bg-[#0B1121] text-white">Archived</option>
                </select>

                {{-- Filter Button --}}
                <button class="flex items-center gap-2 px-4 py-2.5 bg-white/5 hover:bg-white/10 border border-transparent text-white/80 hover:text-white font-bold text-sm rounded-xl transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                    <span>Filters</span>
                </button>

                {{-- Vertical Divider --}}
                <div class="w-px h-8 bg-white/10 mx-1"></div>

                {{-- Grid/List Toggle --}}
                <div class="flex items-center bg-black/50 border border-white/5 rounded-xl p-1">
                    <button wire:click="setLayoutMode('Grid')" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold transition-all focus:outline-none" :class="$wire.layoutMode === 'Grid' ? 'bg-white/10 text-white shadow-sm' : 'text-white/40 hover:text-white'">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    </button>
                    <button wire:click="setLayoutMode('List')" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold transition-all focus:outline-none" :class="$wire.layoutMode === 'List' ? 'bg-white/10 text-white shadow-sm' : 'text-white/40 hover:text-white'">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Active Dropzone Empty State --}}
        <div class="flex flex-col items-center justify-center py-20 px-4 border-2 border-dashed border-white/5 hover:border-white/10 bg-white/[0.01] hover:bg-white/[0.02] rounded-3xl transition-all relative z-10 group">
            <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center text-white/30 mb-6 group-hover:text-primary-400 group-hover:bg-primary-500/10 transition-colors relative">
                <div class="absolute inset-0 rounded-full bg-primary-500/10 scale-0 group-hover:scale-150 group-hover:opacity-0 transition-all duration-1000 ease-out"></div>
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
            </div>
            <h3 class="text-xl font-black text-white mb-2">No Email Lists Found</h3>
            <p class="text-sm text-white/50 text-center max-w-sm mb-8 font-medium">
                Upload your first CSV file and begin building connections with your audience.
            </p>
            <button class="glow-element flex items-center gap-2 px-6 py-3 bg-primary-600 hover:bg-primary-500 text-white font-bold text-sm rounded-xl transition-all shadow-[0_4px_14px_rgba(99,102,241,0.39)] hover:shadow-[0_6px_20px_rgba(99,102,241,0.23)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                Upload Your First List
            </button>
        </div>
    </div>

    {{-- ==========================================
         UNSUBSCRIBED USERS SECTION (Deep Frosted Glass)
         ========================================== --}}
    <div class="bg-[#0B1121]/80 backdrop-blur-2xl border border-white/10 shadow-[0_16px_40px_rgba(0,0,0,0.5),inset_0_1px_0_rgba(255,255,255,0.05)] rounded-2xl overflow-hidden transition-all duration-700 transform stagger-9 relative" :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
        {{-- Orange/Red Top Border Accent & Glow --}}
        <div class="h-1 w-full bg-gradient-to-r from-danger-500 via-warning-500 to-danger-500 shadow-[0_0_20px_rgba(239,68,68,0.8)]"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-32 bg-danger-500/5 blur-[100px] pointer-events-none"></div>
        
        <div class="p-6 md:p-8 relative z-10">
            {{-- Header --}}
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-danger-500/10 flex items-center justify-center text-danger-500 border border-danger-500/20 shadow-[inset_0_1px_0_rgba(255,255,255,0.1)]">
                        <svg class="w-6 h-6 drop-shadow-[0_0_8px_rgba(239,68,68,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6"/></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-black text-white leading-tight">Unsubscribed Users</h3>
                        <p class="text-xs text-white/50 mt-1 font-medium">Contacts who replied with unsubscribe / not-interested messages</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 bg-black/40 p-2 rounded-2xl border border-white/5">
                    <div class="relative w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-white/40">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <input type="text" placeholder="Search..." 
                               class="w-full pl-9 pr-4 py-2 bg-white/5 border border-transparent focus:border-danger-500/50 focus:ring-1 focus:ring-danger-500/50 rounded-xl text-sm text-white placeholder-white/30 transition-all outline-none">
                    </div>
                    <button class="flex items-center gap-2 px-4 py-2 bg-white/5 hover:bg-white/10 border border-transparent text-white/80 hover:text-white font-bold text-sm rounded-xl transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </button>
                </div>
            </div>

            {{-- Empty State (Dropzone Aesthetic) --}}
            <div class="flex flex-col items-center justify-center py-16 border-2 border-dashed border-white/5 hover:border-white/10 bg-white/[0.01] rounded-3xl transition-all group">
                <div class="w-16 h-16 rounded-full bg-success-500/10 flex items-center justify-center text-success-500 mb-4 border border-success-500/20 shadow-[0_0_30px_rgba(34,197,94,0.15)] group-hover:scale-110 transition-transform duration-500">
                    <svg class="w-8 h-8 drop-shadow-[0_0_12px_rgba(34,197,94,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h4 class="text-md font-bold text-white mb-1">No unsubscribed users</h4>
                <p class="text-xs text-white/50 font-medium">No unsubscribe replies detected yet</p>
            </div>
        </div>
    </div>

</div>
