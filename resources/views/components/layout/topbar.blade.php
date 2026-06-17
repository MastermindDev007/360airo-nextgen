{{-- NextGen Reimagined Top Bar --}}
<header class="h-[72px] bg-[var(--surface-primary)] border-b border-[var(--border-subtle)] flex items-center justify-between px-4 sm:px-6 z-30">
    
    {{-- Left Side: Toggle & Context --}}
    <div class="flex items-center gap-3 sm:gap-4 w-auto lg:w-1/3 gsap-topbar-item">
        {{-- Advanced Hamburger Toggle --}}
        <button 
            @click="isMobile ? (mobileSidebarOpen = !mobileSidebarOpen) : (sidebarStyle = sidebarStyle === 'collapsed' ? 'expanded' : 'collapsed')"
            class="glow-element p-2 rounded-xl text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)] transition-all focus:outline-none flex-shrink-0" 
            aria-label="Toggle Sidebar">
            
            {{-- Hamburger / Close Icon (Animates based on state) --}}
            <div class="relative w-5 h-5 flex flex-col justify-center items-center">
                <span class="absolute block h-[2px] w-5 bg-current rounded-full transition-all duration-300 ease-[var(--ease-spring)]" 
                      :class="{'rotate-45': (isMobile ? mobileSidebarOpen : sidebarStyle === 'expanded'), '-translate-y-1.5': (isMobile ? !mobileSidebarOpen : sidebarStyle === 'collapsed')}"></span>
                <span class="absolute block h-[2px] w-5 bg-current rounded-full transition-all duration-300 ease-[var(--ease-spring)]" 
                      :class="{'opacity-0 scale-x-0': (isMobile ? mobileSidebarOpen : sidebarStyle === 'expanded')}"></span>
                <span class="absolute block h-[2px] w-5 bg-current rounded-full transition-all duration-300 ease-[var(--ease-spring)]" 
                      :class="{'-rotate-45': (isMobile ? mobileSidebarOpen : sidebarStyle === 'expanded'), 'translate-y-1.5': (isMobile ? !mobileSidebarOpen : sidebarStyle === 'collapsed')}"></span>
            </div>
        </button>

        {{-- Mobile Logo --}}
        <div class="lg:hidden flex items-center">
            <x-logo variant="compact" />
        </div>

        <div class="hidden sm:flex flex-col justify-center">
            <h1 class="text-lg font-bold text-[var(--text-primary)] tracking-tight">Welcome back Dev 👋</h1>
            <p class="text-[12px] text-[var(--text-tertiary)] font-medium mt-0.5">Here's what's happening with your campaigns today.</p>
        </div>
    </div>

    {{-- Center: Command-K Search (Vercel/Linear Style) --}}
    <div class="hidden md:flex flex-1 justify-center lg:w-1/3 gsap-topbar-item">
        <button class="glow-element flex items-center justify-between w-full max-w-md px-4 py-2 bg-[var(--surface-secondary)] border border-[var(--border-subtle)] hover:border-[var(--border-strong)] rounded-xl text-[13px] text-[var(--text-tertiary)] transition-all shadow-sm hover:shadow group focus:outline-none focus:ring-2 focus:ring-primary-500/20">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-[var(--text-tertiary)] group-hover:text-[var(--text-secondary)] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <span class="group-hover:text-[var(--text-secondary)] transition-colors">Search campaigns, lists, or commands...</span>
            </div>
            <div class="flex items-center gap-1">
                <kbd class="hidden sm:inline-block px-1.5 py-0.5 text-[10px] font-sans font-medium text-[var(--text-tertiary)] bg-[var(--surface-primary)] border border-[var(--border-subtle)] rounded shadow-sm">⌘</kbd>
                <kbd class="hidden sm:inline-block px-1.5 py-0.5 text-[10px] font-sans font-medium text-[var(--text-tertiary)] bg-[var(--surface-primary)] border border-[var(--border-subtle)] rounded shadow-sm">K</kbd>
            </div>
        </button>
    </div>

    {{-- Right Side: Actions & Profile --}}
    <div class="flex items-center justify-end gap-2 sm:gap-3 w-auto lg:w-1/3 gsap-topbar-item">
        
        {{-- 3-State Segmented Theme Toggle --}}
        <div class="relative flex items-center p-1 bg-[var(--surface-primary)] border border-[var(--border-subtle)] rounded-xl overflow-hidden"
             x-data="{ theme: document.documentElement.getAttribute('data-theme') || 'light' }"
             @theme-synced.window="theme = $event.detail.theme">
             
            {{-- Active Sliding Pill --}}
            <div class="absolute inset-y-1 left-1 bg-[var(--surface-secondary)] border border-[var(--border-strong)] shadow-sm rounded-lg transition-transform duration-300 ease-[var(--ease-spring)]"
                 :class="{
                    'translate-x-0 w-[32px]': theme === 'dark',
                    'translate-x-[32px] w-[32px]': theme === 'light',
                    'translate-x-[64px] w-[32px]': theme === 'glass'
                 }">
            </div>

            {{-- Dark --}}
            <button @click="window.themeEngine.set('dark')"
                    class="relative z-10 w-8 h-7 flex items-center justify-center text-[var(--text-tertiary)] hover:text-[var(--text-primary)] transition-colors focus:outline-none"
                    :class="theme === 'dark' ? '!text-[var(--text-primary)]' : ''"
                    aria-label="Dark theme">
                <svg class="w-[15px] h-[15px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
            </button>
            
            {{-- Light --}}
            <button @click="window.themeEngine.set('light')"
                    class="relative z-10 w-8 h-7 flex items-center justify-center text-[var(--text-tertiary)] hover:text-[var(--text-primary)] transition-colors focus:outline-none"
                    :class="theme === 'light' ? '!text-[var(--text-primary)]' : ''"
                    aria-label="Light theme">
                <svg class="w-[15px] h-[15px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </button>

            {{-- Glass --}}
            <button @click="window.themeEngine.set('glass')"
                    class="relative z-10 w-8 h-7 flex items-center justify-center text-[var(--text-tertiary)] hover:text-[var(--text-primary)] transition-colors focus:outline-none"
                    :class="theme === 'glass' ? '!text-[var(--text-primary)]' : ''"
                    aria-label="Glass theme">
                <svg class="w-[15px] h-[15px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
            </button>
        </div>

        {{-- Notification Icon --}}
        <button class="glow-element relative p-2 rounded-lg text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)] transition-all focus:outline-none" aria-label="Notifications">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-danger-500 border-2 border-[var(--surface-primary)]"></span>
        </button>

        <div class="h-6 w-px bg-[var(--border-subtle)] mx-1"></div>

        {{-- Reimagined Profile Dropdown (Alpine.js) --}}
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @click.away="open = false" class="glow-element flex items-center gap-2 p-1 pl-2 pr-1 rounded-full border border-transparent hover:border-[var(--border-subtle)] hover:bg-[var(--surface-secondary)] transition-all focus:outline-none">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=Dev+Davda&background=6366f1&color=fff&bold=true" alt="Dev Davda" class="w-7 h-7 rounded-full shadow-sm">
                    <div class="absolute bottom-0 right-0 w-2 h-2 rounded-full bg-success-500 border border-[var(--surface-primary)]"></div>
                </div>
                <svg class="w-4 h-4 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            {{-- Premium Dropdown Menu --}}
            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="transform opacity-0 scale-95 translate-y-2"
                 x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                 x-transition:leave-end="transform opacity-0 scale-95 translate-y-2"
                 class="absolute right-0 mt-3 w-64 bg-[var(--surface-primary)] border border-[var(--border-subtle)] rounded-xl shadow-2xl py-2 z-50 origin-top-right"
                 style="display: none;">
                
                {{-- Header Section --}}
                <div class="px-4 py-3 border-b border-[var(--border-subtle)] flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Dev+Davda&background=6366f1&color=fff&bold=true" alt="Dev Davda" class="w-10 h-10 rounded-full shadow-sm">
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-[var(--text-primary)] truncate leading-tight">Dev Davda</p>
                        <p class="text-xs text-[var(--text-tertiary)] truncate mt-0.5">dev@360airo.com</p>
                    </div>
                </div>

                {{-- Body Section --}}
                <div class="py-2 px-2">
                    <a href="/profile" class="flex items-center gap-3 px-3 py-2 text-[13px] font-medium text-[var(--text-secondary)] rounded-lg hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)] transition-colors">
                        <svg class="w-4 h-4 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        My Profile
                    </a>
                    <a href="/billing" class="flex items-center gap-3 px-3 py-2 text-[13px] font-medium text-[var(--text-secondary)] rounded-lg hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)] transition-colors">
                        <svg class="w-4 h-4 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        Billing
                    </a>
                    <a href="/settings" class="flex items-center gap-3 px-3 py-2 text-[13px] font-medium text-[var(--text-secondary)] rounded-lg hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)] transition-colors">
                        <svg class="w-4 h-4 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Settings
                    </a>
                </div>

                <div class="px-2 py-2 border-t border-[var(--border-subtle)]">
                    <a href="/affiliate" class="flex items-center gap-3 px-3 py-2 text-[13px] font-medium text-[var(--text-secondary)] rounded-lg hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)] transition-colors">
                        <svg class="w-4 h-4 text-warning-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Affiliate
                    </a>
                    <a href="/prospects/buy" class="flex items-center gap-3 px-3 py-2 text-[13px] font-medium text-[var(--text-secondary)] rounded-lg hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)] transition-colors">
                        <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Buy Prospects
                    </a>
                    <a href="/help" class="flex items-center gap-3 px-3 py-2 text-[13px] font-medium text-[var(--text-secondary)] rounded-lg hover:bg-[var(--surface-secondary)] hover:text-[var(--text-primary)] transition-colors">
                        <svg class="w-4 h-4 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Help Center
                    </a>
                </div>

                {{-- Footer Section --}}
                <div class="px-2 py-2 border-t border-[var(--border-subtle)] bg-danger-500/5 rounded-b-xl">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 w-full px-3 py-2 text-[13px] font-bold text-danger-600 dark:text-danger-500 rounded-lg hover:bg-danger-500/10 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</header>
