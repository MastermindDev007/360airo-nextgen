<div>
    <x-slot:header>
        <div>
            <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--text-primary)] to-[var(--text-secondary)] tracking-tight">Email Campaigns</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1 font-medium">Create, schedule and track your sophisticated outreach campaigns</p>
        </div>
        <div class="flex flex-wrap items-center gap-3 mt-4 sm:mt-0 w-full sm:w-auto">
            <x-ui.button variant="secondary" class="bg-[var(--surface-secondary)]/50 backdrop-blur-md border-[var(--border-subtle)] hover:bg-[var(--surface-tertiary)] flex-1 sm:flex-none justify-center">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Refresh
            </x-ui.button>
            <x-ui.button class="bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 text-white shadow-lg shadow-primary-500/25 border-none flex-1 sm:flex-none justify-center">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                New Campaign
            </x-ui.button>
        </div>
    </x-slot:header>

    {{-- God Tier KPIs --}}
    <div class="grid grid-cols-2 lg:grid-cols-6 gap-4 mb-8 stagger-children">
        {{-- KPI 1: Total Campaigns --}}
        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-[#1E3A8A] to-[#172554] p-5 border border-blue-500/20 shadow-lg group">
            <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-blue-500/20 rounded-full blur-xl group-hover:bg-blue-400/30 transition-all"></div>
            <p class="text-blue-200 text-xs font-semibold uppercase tracking-wider mb-1">Total Campaigns</p>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">0</h3>
                <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center border border-blue-500/30">
                    <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
            </div>
            <p class="text-blue-400/80 text-[10px] mt-1">All campaigns</p>
        </div>

        {{-- KPI 2: Manual Campaigns --}}
        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-[#064E3B] to-[#022C22] p-5 border border-success-500/20 shadow-lg group">
            <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-success-500/20 rounded-full blur-xl group-hover:bg-success-400/30 transition-all"></div>
            <p class="text-success-200 text-xs font-semibold uppercase tracking-wider mb-1">Manual Campaigns</p>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">0</h3>
                <div class="w-8 h-8 rounded-lg bg-success-500/20 flex items-center justify-center border border-success-500/30">
                    <svg class="w-4 h-4 text-success-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
            </div>
            <p class="text-success-400/80 text-[10px] mt-1">User created</p>
        </div>

        {{-- KPI 3: AI Campaigns --}}
        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-[#4C1D95] to-[#2E1065] p-5 border border-purple-500/20 shadow-lg group">
            <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-purple-500/20 rounded-full blur-xl group-hover:bg-purple-400/30 transition-all"></div>
            <p class="text-purple-200 text-xs font-semibold uppercase tracking-wider mb-1">AI Campaigns</p>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">0</h3>
                <div class="w-8 h-8 rounded-lg bg-purple-500/20 flex items-center justify-center border border-purple-500/30">
                    <svg class="w-4 h-4 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
            </div>
            <p class="text-purple-400/80 text-[10px] mt-1">AI personalized</p>
        </div>

        {{-- KPI 4: Total Recipients --}}
        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-[#7C2D12] to-[#451A03] p-5 border border-orange-500/20 shadow-lg group">
            <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-orange-500/20 rounded-full blur-xl group-hover:bg-orange-400/30 transition-all"></div>
            <p class="text-orange-200 text-xs font-semibold uppercase tracking-wider mb-1">Total Recipients</p>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">0</h3>
                <div class="w-8 h-8 rounded-lg bg-orange-500/20 flex items-center justify-center border border-orange-500/30">
                    <svg class="w-4 h-4 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
            </div>
            <p class="text-orange-400/80 text-[10px] mt-1">Email contacts</p>
        </div>

        {{-- KPI 5: Open Rate --}}
        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-[#831843] to-[#4C0519] p-5 border border-pink-500/20 shadow-lg group">
            <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-pink-500/20 rounded-full blur-xl group-hover:bg-pink-400/30 transition-all"></div>
            <p class="text-pink-200 text-xs font-semibold uppercase tracking-wider mb-1">Open Rate</p>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">0%</h3>
                <div class="w-8 h-8 rounded-lg bg-pink-500/20 flex items-center justify-center border border-pink-500/30">
                    <svg class="w-4 h-4 text-pink-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/></svg>
                </div>
            </div>
            <p class="text-pink-400/80 text-[10px] mt-1">Unique opens</p>
        </div>

        {{-- KPI 6: Click Rate --}}
        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-[#0F766E] to-[#042F2E] p-5 border border-teal-500/20 shadow-lg group">
            <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-teal-500/20 rounded-full blur-xl group-hover:bg-teal-400/30 transition-all"></div>
            <p class="text-teal-200 text-xs font-semibold uppercase tracking-wider mb-1">Click Rate</p>
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-bold text-white">0%</h3>
                <div class="w-8 h-8 rounded-lg bg-teal-500/20 flex items-center justify-center border border-teal-500/30">
                    <svg class="w-4 h-4 text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5"/></svg>
                </div>
            </div>
            <p class="text-teal-400/80 text-[10px] mt-1">Average clicks</p>
        </div>
    </div>

    {{-- Filters Toolbar --}}
    <div class="flex flex-col md:flex-row items-center gap-4 mb-6">
        <div class="relative flex-1 w-full group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-[var(--text-tertiary)] group-focus-within:text-primary-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <input type="text" placeholder="Search campaigns by name, description, or email list..." class="block w-full pl-11 pr-4 py-3 bg-[var(--surface-secondary)]/50 backdrop-blur-sm border border-[var(--border-default)] rounded-xl text-sm placeholder-[var(--text-tertiary)] text-[var(--text-primary)] focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 transition-all shadow-sm">
        </div>
        
        <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
            <select class="flex-1 sm:flex-none bg-[var(--surface-secondary)]/50 backdrop-blur-sm border border-[var(--border-default)] text-[var(--text-secondary)] text-sm rounded-xl focus:ring-primary-500 focus:border-primary-500 block p-3 appearance-none hover:bg-[var(--surface-tertiary)] transition-colors cursor-pointer min-w-[140px]">
                <option selected>All Status</option>
                <option value="active">Active</option>
                <option value="draft">Draft</option>
                <option value="paused">Paused</option>
                <option value="completed">Completed</option>
            </select>
            
            <select class="flex-1 sm:flex-none bg-[var(--surface-secondary)]/50 backdrop-blur-sm border border-[var(--border-default)] text-[var(--text-secondary)] text-sm rounded-xl focus:ring-primary-500 focus:border-primary-500 block p-3 appearance-none hover:bg-[var(--surface-tertiary)] transition-colors cursor-pointer min-w-[140px]">
                <option selected>All Types</option>
                <option value="ai">AI Generated</option>
                <option value="manual">Manual</option>
            </select>

            <button class="flex-1 sm:flex-none flex items-center justify-center gap-2 px-4 py-3 bg-[var(--surface-secondary)]/50 backdrop-blur-sm border border-[var(--border-default)] rounded-xl hover:bg-[var(--surface-tertiary)] transition-colors text-sm font-medium text-[var(--text-secondary)]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                Filters
            </button>
            
            <div class="flex items-center bg-[var(--surface-secondary)]/50 backdrop-blur-sm border border-[var(--border-default)] rounded-xl p-1">
                <button class="p-2 bg-[var(--surface-primary)] rounded-lg shadow-sm text-primary-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                </button>
                <button class="p-2 text-[var(--text-tertiary)] hover:text-[var(--text-secondary)] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Main View Area / Empty State --}}
    <div class="relative bg-[var(--surface-secondary)]/30 backdrop-blur-xl border border-[var(--border-default)] rounded-2xl overflow-hidden shadow-2xl min-h-[400px] flex items-center justify-center">
        
        <div class="px-6 py-24 flex flex-col items-center justify-center text-center relative w-full h-full">
            {{-- Decorative Background Elements for Empty State --}}
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-20 overflow-hidden">
                <div class="w-64 h-64 md:w-[500px] md:h-[500px] bg-purple-500/20 rounded-full blur-[80px] md:blur-[120px]"></div>
            </div>
            
            <div class="w-24 h-24 bg-gradient-to-br from-[var(--surface-secondary)] to-[var(--surface-tertiary)] rounded-2xl flex items-center justify-center mb-8 shadow-inner border border-[var(--border-strong)] relative transform rotate-3">
                <div class="absolute inset-0 bg-primary-500/10 rounded-2xl animate-pulse"></div>
                <div class="absolute -top-3 -right-3 w-8 h-8 bg-gradient-to-r from-purple-500 to-primary-500 rounded-full flex items-center justify-center shadow-lg transform -rotate-3">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <svg class="w-12 h-12 text-[var(--text-tertiary)] relative z-10 transform -rotate-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            
            <h3 class="text-2xl font-bold text-[var(--text-primary)] mb-3 tracking-tight">No Campaigns Yet</h3>
            <p class="text-[var(--text-secondary)] max-w-lg mb-10 text-lg leading-relaxed">Get started by creating your first highly targeted email campaign. Choose between powerful manual sequencing or AI-personalized outreach.</p>
            
            <x-ui.button class="relative bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 text-white shadow-xl shadow-primary-500/30 border-none px-8 py-3.5 group overflow-hidden text-base">
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
                <span class="relative z-10 flex items-center font-bold tracking-wide">
                    <svg class="w-5 h-5 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Create Your First Campaign
                </span>
            </x-ui.button>
        </div>
        
    </div>
</div>
