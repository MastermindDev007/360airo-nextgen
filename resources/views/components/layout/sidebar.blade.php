{{-- NextGen Reimagined Sidebar --}}
<aside class="flex-shrink-0 flex flex-col bg-[var(--surface-bg)] border-r border-[var(--border-subtle)] hidden lg:flex fixed lg:relative h-screen z-40 transition-all duration-300 ease-[var(--ease-spring)]" 
       :class="[
           (sidebarStyle === 'expanded' || isHovered) ? 'w-[260px]' : 'w-[72px]',
           (sidebarStyle === 'collapsed' && isHovered) ? 'absolute left-0 top-0 h-full shadow-2xl z-50' : 'relative z-40'
       ]"
       @mouseenter="if(sidebarStyle === 'collapsed') isHovered = true"
       @mouseleave="isHovered = false"
       id="app-sidebar">
    
    {{-- Workspace Switcher (Replaces basic logo) --}}
    <div class="p-4 border-b border-[var(--border-subtle)] gsap-sidebar-item">
        <button class="w-full flex items-center justify-between p-2 rounded-xl hover:bg-[var(--surface-secondary)] transition-all group glow-element">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-b from-primary-500 to-primary-700 flex items-center justify-center shadow-[inset_0_1px_0_rgba(255,255,255,0.2)]">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <div class="text-left" x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity>
                    <div class="text-sm font-bold text-[var(--text-primary)] leading-tight tracking-tight">360Airo</div>
                    <div class="text-[11px] font-medium text-[var(--text-tertiary)] leading-tight">Master Workspace</div>
                </div>
            </div>
            <svg x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="w-4 h-4 text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/></svg>
        </button>
    </div>

    {{-- Main Navigation --}}
    <div class="flex-1 overflow-y-auto py-5 hide-scrollbar flex flex-col gap-6 px-4">
        
        {{-- CORE SECTION --}}
        <div class="gsap-sidebar-item">
            <h3 x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="px-2 text-[10px] font-black tracking-[0.15em] text-[var(--text-tertiary)] uppercase mb-2">Core</h3>
            <nav class="space-y-0.5">
                <a href="/dashboard" class="glow-element flex items-center gap-3 px-2 py-2 rounded-lg text-[13px] font-semibold {{ request()->is('dashboard') ? 'bg-primary-500/10 text-primary-600 dark:text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)]' }} transition-colors group">
                    <svg class="w-4 h-4 flex-shrink-0 {{ request()->is('dashboard') ? 'text-primary-500' : 'text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Dashboard</span>
                </a>
                <a href="/inbox" class="glow-element flex items-center justify-between px-2 py-2 rounded-lg text-[13px] font-semibold {{ request()->is('inbox*') ? 'bg-primary-500/10 text-primary-600 dark:text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)]' }} transition-colors group">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 flex-shrink-0 {{ request()->is('inbox*') ? 'text-primary-500' : 'text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                        <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Inbox</span>
                    </div>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="bg-primary-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-md shadow-sm">3</span>
                </a>
                <a href="/scheduled" class="glow-element flex items-center gap-3 px-2 py-2 rounded-lg text-[13px] font-semibold {{ request()->is('scheduled*') ? 'bg-primary-500/10 text-primary-600 dark:text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)]' }} transition-colors group">
                    <svg class="w-4 h-4 flex-shrink-0 {{ request()->is('scheduled*') ? 'text-primary-500' : 'text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Scheduled Events</span>
                </a>
            </nav>
        </div>

        {{-- OUTREACH SECTION --}}
        <div class="gsap-sidebar-item">
            <h3 x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="px-2 text-[10px] font-black tracking-[0.15em] text-[var(--text-tertiary)] uppercase mb-2">Outreach</h3>
            <nav class="space-y-0.5">
                <a href="/lists" class="glow-element flex items-center gap-3 px-2 py-2 rounded-lg text-[13px] font-semibold {{ request()->is('lists*') ? 'bg-primary-500/10 text-primary-600 dark:text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)]' }} transition-colors group">
                    <svg class="w-4 h-4 flex-shrink-0 {{ request()->is('lists*') ? 'text-primary-500' : 'text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Email Lists</span>
                </a>
                <a href="/accounts" class="glow-element flex items-center gap-3 px-2 py-2 rounded-lg text-[13px] font-semibold {{ request()->is('accounts*') ? 'bg-primary-500/10 text-primary-600 dark:text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)]' }} transition-colors group">
                    <svg class="w-4 h-4 flex-shrink-0 {{ request()->is('accounts*') ? 'text-primary-500' : 'text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Email Accounts</span>
                </a>
                <a href="/campaigns" class="glow-element flex items-center gap-3 px-2 py-2 rounded-lg text-[13px] font-semibold {{ request()->is('campaigns*') ? 'bg-primary-500/10 text-primary-600 dark:text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)]' }} transition-colors group">
                    <svg class="w-4 h-4 flex-shrink-0 {{ request()->is('campaigns*') ? 'text-primary-500' : 'text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Email Campaigns</span>
                </a>
                <a href="/templates" class="glow-element flex items-center gap-3 px-2 py-2 rounded-lg text-[13px] font-semibold {{ request()->is('templates*') ? 'bg-primary-500/10 text-primary-600 dark:text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)]' }} transition-colors group">
                    <svg class="w-4 h-4 flex-shrink-0 {{ request()->is('templates*') ? 'text-primary-500' : 'text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Template Library</span>
                </a>
                <a href="/pipeline" class="glow-element flex items-center gap-3 px-2 py-2 rounded-lg text-[13px] font-semibold {{ request()->is('pipeline*') ? 'bg-primary-500/10 text-primary-600 dark:text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)]' }} transition-colors group">
                    <svg class="w-4 h-4 flex-shrink-0 {{ request()->is('pipeline*') ? 'text-primary-500' : 'text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Pipeline</span>
                </a>
                <a href="/integrations" class="glow-element flex items-center gap-3 px-2 py-2 rounded-lg text-[13px] font-semibold {{ request()->is('integrations*') ? 'bg-primary-500/10 text-primary-600 dark:text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)]' }} transition-colors group">
                    <svg class="w-4 h-4 flex-shrink-0 {{ request()->is('integrations*') ? 'text-primary-500' : 'text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Integrations</span>
                </a>
            </nav>
        </div>

        {{-- GROWTH (PREMIUM) SECTION --}}
        <div class="gsap-sidebar-item">
            <h3 x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="px-2 text-[10px] font-black tracking-[0.15em] text-warning-600 dark:text-warning-500 uppercase mb-2 flex items-center gap-1.5">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/></svg>
                Growth Engine
            </h3>
            <nav class="space-y-0.5">
                <a href="/warmup" class="glow-element flex items-center justify-between px-2 py-2 rounded-lg text-[13px] font-semibold text-[var(--text-secondary)] hover:bg-warning-500/10 hover:text-warning-700 dark:hover:text-warning-400 transition-colors group">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 flex-shrink-0 text-[var(--text-tertiary)] group-hover:text-warning-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/></svg>
                        <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">Email Warmup</span>
                    </div>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="text-[9px] font-bold uppercase tracking-wider text-warning-600 bg-warning-100 dark:bg-warning-500/20 px-1.5 py-0.5 rounded border border-warning-200 dark:border-warning-500/30">Pro</span>
                </a>
                <a href="/ai-automation" class="glow-element flex items-center justify-between px-2 py-2 rounded-lg text-[13px] font-semibold text-[var(--text-secondary)] hover:bg-warning-500/10 hover:text-warning-700 dark:hover:text-warning-400 transition-colors group">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 flex-shrink-0 text-[var(--text-tertiary)] group-hover:text-warning-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                        <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">AI Automation</span>
                    </div>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="text-[9px] font-bold uppercase tracking-wider text-warning-600 bg-warning-100 dark:bg-warning-500/20 px-1.5 py-0.5 rounded border border-warning-200 dark:border-warning-500/30">Pro</span>
                </a>
                <a href="/linkedin" class="glow-element flex items-center justify-between px-2 py-2 rounded-lg text-[13px] font-semibold text-[var(--text-secondary)] hover:bg-warning-500/10 hover:text-warning-700 dark:hover:text-warning-400 transition-colors group">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 flex-shrink-0 text-[var(--text-tertiary)] group-hover:text-warning-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="whitespace-nowrap">LinkedIn</span>
                    </div>
                    <span x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="text-[9px] font-bold uppercase tracking-wider text-warning-600 bg-warning-100 dark:bg-warning-500/20 px-1.5 py-0.5 rounded border border-warning-200 dark:border-warning-500/30">Pro</span>
                </a>
            </nav>
        </div>
    </div>

    {{-- Reimagined Quota Widget Footer --}}
    <div x-show="sidebarStyle === 'expanded' || isHovered" x-transition.opacity class="p-4 bg-[var(--surface-primary)] border-t border-[var(--border-subtle)] relative overflow-hidden gsap-sidebar-item">
        {{-- Subtle background decoration --}}
        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-500/5 rounded-full blur-2xl -mr-10 -mt-10 pointer-events-none"></div>
        
        <div class="relative z-10">
            <div class="flex items-end justify-between mb-3">
                <div>
                    <h4 class="text-sm font-bold text-[var(--text-primary)]">Free Plan</h4>
                    <p class="text-[11px] text-[var(--text-tertiary)] mt-0.5">Getting Started • $0/mo</p>
                </div>
                <span class="text-[11px] font-bold text-primary-500">2 / 5</span>
            </div>
            
            {{-- Progress Bar --}}
            <div class="w-full h-1.5 bg-[var(--surface-secondary)] rounded-full overflow-hidden mb-4 shadow-inner">
                <div class="h-full bg-primary-500 rounded-full" style="width: 40%"></div>
            </div>
            
            <div class="grid grid-cols-2 gap-2">
                <button class="glow-element w-full py-1.5 px-3 bg-[var(--surface-secondary)] text-[var(--text-secondary)] text-[11px] font-semibold rounded-lg hover:bg-[var(--border-subtle)] hover:text-[var(--text-primary)] transition-all text-center">
                    View Plan
                </button>
                <button class="glow-element w-full py-1.5 px-3 bg-primary-600 text-white text-[11px] font-semibold rounded-lg hover:bg-primary-500 shadow-sm transition-all text-center">
                    Upgrade
                </button>
            </div>
        </div>
    </div>
</aside>
