<div>
    <x-slot:header>
        <div>
            <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--text-primary)] to-[var(--text-secondary)] tracking-tight">Email Accounts</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1 font-medium">Configure and orchestrate your sending accounts and domains</p>
        </div>
        <div class="flex items-center gap-3">
            <x-ui.button variant="secondary" class="bg-[var(--surface-secondary)]/50 backdrop-blur-md border-[var(--border-subtle)] hover:bg-[var(--surface-tertiary)]">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Refresh
            </x-ui.button>
            <x-ui.button class="bg-gradient-to-r from-warning-500 to-warning-600 hover:from-warning-400 hover:to-warning-500 text-white shadow-lg shadow-warning-500/25 border-none">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Get Professional Email
            </x-ui.button>
            <x-ui.button class="bg-gradient-to-r from-primary-600 to-primary-500 hover:from-primary-500 hover:to-primary-400 text-white shadow-lg shadow-primary-500/25 border-none">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Email Account
            </x-ui.button>
        </div>
    </x-slot:header>

    {{-- God Tier KPIs --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 stagger-children">
        {{-- KPI 1 --}}
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#064E3B] to-[#022C22] p-6 border border-success-500/20 shadow-xl group">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-success-500/20 rounded-full blur-2xl group-hover:bg-success-400/30 transition-all duration-500"></div>
            <div class="relative z-10 flex justify-between items-start">
                <div>
                    <p class="text-success-200 text-sm font-semibold mb-1">Active Accounts</p>
                    <h3 class="text-3xl font-bold text-white mb-2">0</h3>
                    <p class="text-success-400/80 text-xs">of 0 total accounts</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-success-500/20 flex items-center justify-center border border-success-500/30">
                    <svg class="w-5 h-5 text-success-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        </div>

        {{-- KPI 2 --}}
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#1E3A8A] to-[#172554] p-6 border border-blue-500/20 shadow-xl group">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-500/20 rounded-full blur-2xl group-hover:bg-blue-400/30 transition-all duration-500"></div>
            <div class="relative z-10 flex justify-between items-start">
                <div>
                    <p class="text-blue-200 text-sm font-semibold mb-1">Daily Limit</p>
                    <h3 class="text-3xl font-bold text-white mb-2">0</h3>
                    <p class="text-blue-400/80 text-xs">emails per day</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center border border-blue-500/30">
                    <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>
        </div>

        {{-- KPI 3 --}}
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#4C1D95] to-[#2E1065] p-6 border border-purple-500/20 shadow-xl group">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-purple-500/20 rounded-full blur-2xl group-hover:bg-purple-400/30 transition-all duration-500"></div>
            <div class="relative z-10 flex justify-between items-start">
                <div>
                    <p class="text-purple-200 text-sm font-semibold mb-1">Sent Today</p>
                    <h3 class="text-3xl font-bold text-white mb-2">0</h3>
                    <p class="text-purple-400/80 text-xs">across all accounts</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center border border-purple-500/30">
                    <svg class="w-5 h-5 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
            </div>
        </div>

        {{-- KPI 4 --}}
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#7C2D12] to-[#451A03] p-6 border border-orange-500/20 shadow-xl group">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-orange-500/20 rounded-full blur-2xl group-hover:bg-orange-400/30 transition-all duration-500"></div>
            <div class="relative z-10 flex justify-between items-start">
                <div>
                    <p class="text-orange-200 text-sm font-semibold mb-1">Utilization</p>
                    <h3 class="text-3xl font-bold text-white mb-2">0%</h3>
                    <p class="text-orange-400/80 text-xs">of daily capacity</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-orange-500/20 flex items-center justify-center border border-orange-500/30">
                    <svg class="w-5 h-5 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content Section --}}
    <div class="relative bg-[var(--surface-secondary)]/30 backdrop-blur-xl border border-[var(--border-default)] rounded-2xl overflow-hidden shadow-2xl">
        {{-- Section Header --}}
        <div class="px-6 py-5 border-b border-[var(--border-subtle)] flex items-center justify-between bg-white/[0.02]">
            <div>
                <h2 class="text-lg font-semibold text-[var(--text-primary)]">Email Accounts</h2>
                <p class="text-sm text-[var(--text-tertiary)]">Manage your configured email accounts</p>
            </div>
            <div class="flex gap-2">
                <span class="px-3 py-1 text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-full">0 accounts</span>
                <span class="px-3 py-1 text-xs font-medium bg-danger-500/10 text-danger-400 border border-danger-500/20 rounded-full">Limit Reached</span>
            </div>
        </div>

        {{-- Simulated Data / Empty State --}}
        @php
        // Set to empty array to show the gorgeous empty state by default, simulating the user's uploaded image.
        // Or we could show some populated data if desired. I'll show the empty state to match the screenshot precisely, but heavily elevated.
        $accounts = []; 
        @endphp

        @if(count($accounts) === 0)
        <div class="px-6 py-24 flex flex-col items-center justify-center text-center relative overflow-hidden">
            {{-- Decorative Background Elements for Empty State --}}
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-20">
                <div class="w-96 h-96 bg-primary-500/30 rounded-full blur-[100px]"></div>
            </div>
            
            <div class="w-20 h-20 bg-gradient-to-b from-[var(--surface-tertiary)] to-transparent rounded-full flex items-center justify-center mb-6 shadow-inner border border-[var(--border-strong)] relative">
                <div class="absolute inset-0 bg-primary-500/10 rounded-full animate-pulse"></div>
                <svg class="w-10 h-10 text-[var(--text-tertiary)] relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-[var(--text-primary)] mb-2 tracking-tight">No email accounts configured</h3>
            <p class="text-[var(--text-tertiary)] max-w-md mb-8">Add your first email account to start sending automated, high-converting outreach campaigns.</p>
            
            <x-ui.button class="relative bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 text-white shadow-xl shadow-primary-500/30 border-none px-8 py-3 group overflow-hidden">
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
                <span class="relative z-10 flex items-center font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Add Your First Account
                </span>
            </x-ui.button>
        </div>
        @else
        <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- If there were accounts, they would render here with glassmorphism --}}
        </div>
        @endif
    </div>
</div>
