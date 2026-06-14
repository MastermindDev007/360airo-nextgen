<div x-data="{ 
        loaded: false,
        activeModal: null,
        openModal(id) { this.activeModal = id; document.body.style.overflow = 'hidden'; },
        closeModal() { this.activeModal = null; document.body.style.overflow = ''; }
    }" 
    x-init="setTimeout(() => loaded = true, 100)"
    @keydown.escape.window="closeModal()"
    class="relative w-full pb-32" id="dashboard-container">

    {{-- Premium God-Level CSS --}}
    <style>
        .glass-panel {
            background: linear-gradient(135deg, color-mix(in srgb, var(--surface-primary) 70%, transparent), color-mix(in srgb, var(--surface-primary) 40%, transparent));
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid color-mix(in srgb, var(--border-subtle) 80%, transparent);
            box-shadow: 
                0 4px 24px -1px rgba(0,0,0,0.1),
                inset 0 1px 1px rgba(255,255,255,0.05);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-2xl);
        }

        .glass-panel:hover {
            border-color: color-mix(in srgb, var(--color-primary-500) 40%, transparent);
            box-shadow: 
                0 20px 40px -8px rgba(0,0,0,0.2),
                0 0 40px -10px color-mix(in srgb, var(--color-primary-500) 20%, transparent),
                inset 0 1px 1px rgba(255,255,255,0.1);
            transform: translateY(-4px);
        }

        .premium-text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(135deg, var(--text-primary) 0%, var(--text-secondary) 100%);
        }

        .primary-text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(135deg, var(--color-primary-400) 0%, var(--color-primary-600) 100%);
        }

        .stat-card-icon-wrap {
            position: relative;
            z-index: 10;
        }

        .stat-card-icon-wrap::after {
            content: '';
            position: absolute;
            inset: -10px;
            border-radius: 50%;
            background: inherit;
            filter: blur(16px);
            opacity: 0.4;
            z-index: -1;
            transition: opacity 0.4s;
        }

        .glass-panel:hover .stat-card-icon-wrap::after {
            opacity: 0.8;
            transform: scale(1.2);
        }

        /* Staggered entrance animations */
        .stagger-1 { transition-delay: 100ms; }
        .stagger-2 { transition-delay: 200ms; }
        .stagger-3 { transition-delay: 300ms; }
        .stagger-4 { transition-delay: 400ms; }
        .stagger-5 { transition-delay: 500ms; }
        .stagger-6 { transition-delay: 600ms; }

        .list-item-hover {
            transition: all 0.3s ease;
        }
        .list-item-hover:hover {
            background: color-mix(in srgb, var(--surface-secondary) 50%, transparent);
            transform: translateX(6px);
            border-left-color: var(--color-primary-500);
        }
    </style>

    {{-- ==========================================
         HERO SECTION (Span Full)
         ========================================== --}}
    <div class="relative w-full rounded-[32px] mb-10 overflow-hidden border border-[var(--border-subtle)] shadow-2xl flex flex-col md:flex-row items-center px-8 md:px-16 py-12 group transition-all duration-1000 transform"
         style="background: color-mix(in srgb, var(--surface-primary) 65%, transparent); backdrop-filter: blur(32px); -webkit-backdrop-filter: blur(32px);"
         :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
        
        {{-- Animated Gradient Orbs Background --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-[-50%] right-[-10%] w-[800px] h-[800px] rounded-full bg-[radial-gradient(circle,var(--color-primary-500)_0%,transparent_60%)] opacity-10 mix-blend-screen animate-[spin_20s_linear_infinite]"></div>
            <div class="absolute bottom-[-50%] left-[-10%] w-[600px] h-[600px] rounded-full bg-[radial-gradient(circle,var(--color-info-500)_0%,transparent_60%)] opacity-10 mix-blend-screen animate-[spin_15s_linear_infinite_reverse]"></div>
        </div>

        {{-- Left Side: Admin Welcome --}}
        <div class="relative z-10 w-full md:w-1/2 flex flex-col items-start">
            <div class="mb-4">
                <span class="px-3 py-1 rounded-md bg-[var(--color-primary-500)]/10 text-[var(--color-primary-500)] text-[10px] font-bold tracking-[0.2em] uppercase border border-[var(--color-primary-500)]/20 mb-4 inline-block shadow-[0_0_15px_var(--color-primary-500)]/10">
                    System Overview
                </span>
                <h1 class="text-3xl md:text-4xl font-black tracking-tight text-[var(--text-primary)] flex items-center gap-3">
                    Welcome back, Admin
                    <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-success-500)] shadow-[0_0_8px_var(--color-success-500)] animate-pulse"></span>
                </h1>
            </div>
            <div class="flex items-center gap-3 mb-3">
                <span class="text-xl md:text-2xl font-bold tracking-tight text-[var(--text-secondary)]">360Airo Engine</span>
                <span class="px-2 py-0.5 rounded text-[10px] font-bold tracking-widest bg-[var(--surface-secondary)] text-[var(--text-tertiary)] border border-[var(--border-subtle)]">v2.0</span>
            </div>
            <p class="text-sm font-medium text-[var(--text-tertiary)] max-w-md leading-relaxed">
                All systems operational. Network latency is optimal and global outreach pipelines are fully synchronized.
            </p>
        </div>

        {{-- Right Side: The Globe Thing --}}
        <div class="relative z-10 w-full md:w-1/2 h-[300px] md:h-[350px] flex items-center justify-center mt-8 md:mt-0">
            <div id="globe-container" class="w-full h-full absolute inset-0"></div>
        </div>
    </div>

    {{-- ==========================================
         TOP TIER: KPI CARDS (6 Metrics)
         ========================================== --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        
        {{-- KPI 1: Total Campaigns --}}
        <div class="glass-panel group p-8 transition-all duration-700 transform stagger-1 flex flex-col justify-between h-[200px]"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="flex justify-between items-start z-10">
                <div>
                    <p class="text-xs font-black tracking-[0.15em] text-[var(--text-tertiary)] uppercase mb-2">Total Campaigns</p>
                    <h3 class="text-4xl font-black text-[var(--text-primary)] tracking-tighter leading-none flex items-baseline gap-1">0</h3>
                </div>
                <div class="stat-card-icon-wrap w-12 h-12 rounded-xl bg-[var(--color-primary-500)]/10 text-[var(--color-primary-500)] flex items-center justify-center border border-[var(--color-primary-500)]/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
            </div>
            <div class="mt-auto z-10 w-full">
                <p class="text-sm font-semibold text-[var(--text-secondary)] mb-3">Active & completed</p>
                <div class="w-full bg-[var(--surface-secondary)] rounded-full h-1.5 mb-1.5 overflow-hidden">
                    <div class="bg-[var(--color-primary-500)] h-1.5 rounded-full shadow-[0_0_10px_var(--color-primary-500)]" style="width: 0%"></div>
                </div>
                <p class="text-[11px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider">0% of target</p>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-[var(--color-primary-500)] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        {{-- KPI 2: Total Recipients --}}
        <div class="glass-panel group p-8 transition-all duration-700 transform stagger-2 flex flex-col justify-between h-[200px]"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="flex justify-between items-start z-10">
                <div>
                    <p class="text-xs font-black tracking-[0.15em] text-[var(--text-tertiary)] uppercase mb-2">Total Recipients</p>
                    <h3 class="text-4xl font-black text-[var(--text-primary)] tracking-tighter leading-none flex items-baseline gap-1">0</h3>
                </div>
                <div class="stat-card-icon-wrap w-12 h-12 rounded-xl bg-[var(--color-primary-500)]/10 text-[var(--color-primary-500)] flex items-center justify-center border border-[var(--color-primary-500)]/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
            </div>
            <div class="mt-auto z-10 w-full">
                <p class="text-sm font-semibold text-[var(--text-secondary)] mb-3">Reached contacts</p>
                <div class="w-full bg-[var(--surface-secondary)] rounded-full h-1.5 mb-1.5 overflow-hidden">
                    <div class="bg-[var(--color-primary-500)] h-1.5 rounded-full shadow-[0_0_10px_var(--color-primary-500)]" style="width: 0%"></div>
                </div>
                <p class="text-[11px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider">0% of target</p>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-[var(--color-primary-500)] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        {{-- KPI 3: Avg Open Rate --}}
        <div class="glass-panel group p-8 transition-all duration-700 transform stagger-3 flex flex-col justify-between h-[200px]"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="flex justify-between items-start z-10">
                <div>
                    <p class="text-xs font-black tracking-[0.15em] text-[var(--text-tertiary)] uppercase mb-2">Avg Open Rate</p>
                    <h3 class="text-4xl font-black text-[var(--text-primary)] tracking-tighter leading-none flex items-baseline gap-1">0.0<span class="text-xl text-[var(--text-tertiary)] font-bold">%</span></h3>
                </div>
                <div class="stat-card-icon-wrap w-12 h-12 rounded-xl bg-[var(--color-success-500)]/10 text-[var(--color-success-500)] flex items-center justify-center border border-[var(--color-success-500)]/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/></svg>
                </div>
            </div>
            <div class="mt-auto z-10 w-full">
                <p class="text-sm font-semibold text-[var(--text-secondary)] mb-3">Email engagement</p>
                <div class="w-full bg-[var(--surface-secondary)] rounded-full h-1.5 mb-1.5 overflow-hidden">
                    <div class="bg-[var(--color-success-500)] h-1.5 rounded-full shadow-[0_0_10px_var(--color-success-500)]" style="width: 0%"></div>
                </div>
                <p class="text-[11px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider">0% of target</p>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-[var(--color-success-500)] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        {{-- KPI 4: Avg Click Rate --}}
        <div class="glass-panel group p-8 transition-all duration-700 transform stagger-4 flex flex-col justify-between h-[200px]"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="flex justify-between items-start z-10">
                <div>
                    <p class="text-xs font-black tracking-[0.15em] text-[var(--text-tertiary)] uppercase mb-2">Avg Click Rate</p>
                    <h3 class="text-4xl font-black text-[var(--text-primary)] tracking-tighter leading-none flex items-baseline gap-1">0.0<span class="text-xl text-[var(--text-tertiary)] font-bold">%</span></h3>
                </div>
                <div class="flex flex-col items-end">
                    <span class="text-[13px] font-bold text-[var(--color-danger-500)] flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg> -0.3%
                    </span>
                    <div class="stat-card-icon-wrap w-10 h-10 mt-2 rounded-xl bg-[var(--color-warning-500)]/10 text-[var(--color-warning-500)] flex items-center justify-center border border-[var(--color-warning-500)]/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                    </div>
                </div>
            </div>
            <div class="mt-auto z-10 w-full">
                <p class="text-sm font-semibold text-[var(--text-secondary)] mb-3">Link interactions</p>
                <div class="w-full bg-[var(--surface-secondary)] rounded-full h-1.5 mb-1.5 overflow-hidden">
                    <div class="bg-[var(--color-warning-500)] h-1.5 rounded-full shadow-[0_0_10px_var(--color-warning-500)]" style="width: 0%"></div>
                </div>
                <p class="text-[11px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider">0% of target</p>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-[var(--color-warning-500)] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        {{-- KPI 5: Emails Delivered --}}
        <div class="glass-panel group p-8 transition-all duration-700 transform stagger-5 flex flex-col justify-between h-[200px]"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="flex justify-between items-start z-10">
                <div>
                    <p class="text-xs font-black tracking-[0.15em] text-[var(--text-tertiary)] uppercase mb-2">Emails Delivered</p>
                    <h3 class="text-4xl font-black text-[var(--text-primary)] tracking-tighter leading-none flex items-baseline gap-1">0</h3>
                </div>
                <div class="flex flex-col items-end">
                    <span class="text-[13px] font-bold text-[var(--color-success-500)] flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg> 0
                    </span>
                    <div class="stat-card-icon-wrap w-10 h-10 mt-2 rounded-xl bg-[var(--color-success-500)]/10 text-[var(--color-success-500)] flex items-center justify-center border border-[var(--color-success-500)]/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
            </div>
            <div class="mt-auto z-10 w-full">
                <p class="text-sm font-semibold text-[var(--text-secondary)] mb-3">Successfully sent</p>
                <div class="w-full bg-[var(--surface-secondary)] rounded-full h-1.5 mb-1.5 overflow-hidden">
                    <div class="bg-[var(--color-success-500)] h-1.5 rounded-full shadow-[0_0_10px_var(--color-success-500)]" style="width: 0%"></div>
                </div>
                <p class="text-[11px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider">0% of target</p>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-[var(--color-success-500)] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        {{-- KPI 6: Bounce Rate --}}
        <div class="glass-panel group p-8 transition-all duration-700 transform stagger-6 flex flex-col justify-between h-[200px]"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="flex justify-between items-start z-10">
                <div>
                    <p class="text-xs font-black tracking-[0.15em] text-[var(--text-tertiary)] uppercase mb-2">Bounce Rate</p>
                    <h3 class="text-4xl font-black text-[var(--text-primary)] tracking-tighter leading-none flex items-baseline gap-1">0.0<span class="text-xl text-[var(--text-tertiary)] font-bold">%</span></h3>
                </div>
                <div class="flex flex-col items-end">
                    <span class="text-[13px] font-bold text-[var(--color-success-500)] flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg> -0.5%
                    </span>
                    <div class="stat-card-icon-wrap w-10 h-10 mt-2 rounded-xl bg-[var(--color-danger-500)]/10 text-[var(--color-danger-500)] flex items-center justify-center border border-[var(--color-danger-500)]/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/></svg>
                    </div>
                </div>
            </div>
            <div class="mt-auto z-10 w-full">
                <p class="text-sm font-semibold text-[var(--text-secondary)] mb-3">Failed deliveries</p>
                <div class="w-full bg-[var(--surface-secondary)] rounded-full h-1.5 mb-1.5 overflow-hidden">
                    <div class="bg-[var(--color-danger-500)] h-1.5 rounded-full shadow-[0_0_10px_var(--color-danger-500)]" style="width: 100%"></div>
                </div>
                <p class="text-[11px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider">100% of target</p>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-[var(--color-danger-500)] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>
    </div>

    {{-- ==========================================
         MIDDLE TIER: MAIN CHART & ACTIVITY (12 Cols)
         ========================================== --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-10">
        
        {{-- Large Activity Chart (Span 8) --}}
        <div class="glass-panel lg:col-span-8 p-8 transition-all duration-700 transform stagger-5 flex flex-col min-h-[460px]"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="flex justify-between items-center mb-8 z-10">
                <div>
                    <h3 class="text-xl font-black text-[var(--text-primary)] tracking-tight">Outreach Velocity</h3>
                    <p class="text-sm font-medium text-[var(--text-tertiary)] mt-1">Emails sent vs Opens over the last 30 days</p>
                </div>
                <div class="flex items-center gap-2 bg-[var(--surface-secondary)]/50 p-1 rounded-xl border border-[var(--border-subtle)]">
                    <button class="px-4 py-1.5 rounded-lg text-xs font-bold text-[var(--text-primary)] bg-[var(--surface-primary)] shadow-sm">30D</button>
                    <button class="px-4 py-1.5 rounded-lg text-xs font-bold text-[var(--text-tertiary)] hover:text-[var(--text-primary)] transition-colors">7D</button>
                    <button class="px-4 py-1.5 rounded-lg text-xs font-bold text-[var(--text-tertiary)] hover:text-[var(--text-primary)] transition-colors">24H</button>
                </div>
            </div>
            <div class="flex-1 w-full relative z-10">
                <div id="god-tier-chart" class="absolute inset-0"></div>
            </div>
        </div>

        {{-- Live Activity Feed (Span 4) --}}
        <div class="glass-panel lg:col-span-4 p-0 transition-all duration-700 transform stagger-6 flex flex-col h-[460px]"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="p-8 border-b border-[var(--border-subtle)] bg-[var(--surface-primary)]/40 z-10">
                <h3 class="text-xl font-black text-[var(--text-primary)] tracking-tight flex items-center gap-3">
                    <span class="w-2.5 h-2.5 rounded-full bg-[var(--color-primary-500)] animate-pulse shadow-[0_0_10px_var(--color-primary-500)]"></span>
                    Live Signals
                </h3>
            </div>
            <div class="flex-1 overflow-y-auto hide-scrollbar p-4 space-y-2 z-10 relative">
                
                {{-- Feed Item 1 --}}
                <div class="list-item-hover p-4 rounded-xl border border-transparent border-l-2 border-l-transparent flex items-start gap-4 cursor-pointer">
                    <div class="w-10 h-10 rounded-full bg-[var(--color-success-500)]/10 text-[var(--color-success-500)] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-[var(--text-primary)]">John Doe <span class="font-normal text-[var(--text-secondary)]">opened</span> Q3 Proposal</p>
                        <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">Just now • Campaign: Q3 Enterprise</p>
                    </div>
                </div>

                {{-- Feed Item 2 --}}
                <div class="list-item-hover p-4 rounded-xl border border-transparent border-l-2 border-l-transparent flex items-start gap-4 cursor-pointer">
                    <div class="w-10 h-10 rounded-full bg-[var(--color-primary-500)]/10 text-[var(--color-primary-500)] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-[var(--text-primary)]">Sarah Jenkins <span class="font-normal text-[var(--text-secondary)]">replied to</span> Follow Up #2</p>
                        <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">2m ago • Sentiment: <span class="text-[var(--color-success-500)]">Positive</span></p>
                    </div>
                </div>

                {{-- Feed Item 3 --}}
                <div class="list-item-hover p-4 rounded-xl border border-transparent border-l-2 border-l-transparent flex items-start gap-4 cursor-pointer">
                    <div class="w-10 h-10 rounded-full bg-[var(--color-warning-500)]/10 text-[var(--color-warning-500)] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-[var(--text-primary)]">Acme Corp <span class="font-normal text-[var(--text-secondary)]">clicked link</span> Pricing Page</p>
                        <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">15m ago • Campaign: Tech Startups</p>
                    </div>
                </div>

                {{-- Feed Item 4 --}}
                <div class="list-item-hover p-4 rounded-xl border border-transparent border-l-2 border-l-transparent flex items-start gap-4 cursor-pointer">
                    <div class="w-10 h-10 rounded-full bg-[var(--color-danger-500)]/10 text-[var(--color-danger-500)] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-[var(--text-primary)]">System <span class="font-normal text-[var(--text-secondary)]">alert</span> Bounce rate spike</p>
                        <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">1h ago • Account: sales@domain.com</p>
                    </div>
                </div>

                {{-- Gradient Fade at bottom --}}
                <div class="sticky bottom-0 left-0 w-full h-12 bg-gradient-to-t from-[var(--surface-primary)] to-transparent pointer-events-none"></div>
            </div>
            
            <button class="w-full py-4 text-center text-[13px] font-bold text-[var(--color-primary-500)] hover:bg-[var(--color-primary-500)]/5 transition-colors border-t border-[var(--border-subtle)] z-10">
                View All Signals
            </button>
        </div>
    </div>

    {{-- ==========================================
         BOTTOM TIER: QUICK ACTIONS (6 Cols)
         ========================================== --}}
    <div class="mb-6 z-10 relative">
        <h3 class="text-lg font-black text-[var(--text-primary)] tracking-tight">Quick Actions</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        {{-- Action 1: Create Campaign --}}
        <div class="glass-panel p-6 transition-all duration-700 transform stagger-6 flex items-center gap-5 cursor-pointer group"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="w-14 h-14 rounded-2xl bg-[var(--surface-secondary)] border border-[var(--border-subtle)] flex items-center justify-center text-[var(--text-secondary)] group-hover:bg-[var(--color-primary-500)]/10 group-hover:text-[var(--color-primary-500)] group-hover:border-[var(--color-primary-500)]/30 transition-all duration-500 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-bold text-[var(--text-primary)] group-hover:text-[var(--color-primary-500)] transition-colors">Create Campaign</h4>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold tracking-wider uppercase bg-[var(--color-primary-500)]/10 text-[var(--color-primary-500)] border border-[var(--color-primary-500)]/20">Popular</span>
                </div>
                <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">Design stunning email campaigns</p>
                <div class="mt-2 text-[11px] font-bold tracking-wide text-[var(--text-secondary)] flex items-center gap-1 group-hover:text-[var(--color-primary-500)] transition-colors">Get started <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
            </div>
        </div>

        {{-- Action 2: Import Contacts --}}
        <div class="glass-panel p-6 transition-all duration-700 transform stagger-6 flex items-center gap-5 cursor-pointer group"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="w-14 h-14 rounded-2xl bg-[var(--surface-secondary)] border border-[var(--border-subtle)] flex items-center justify-center text-[var(--text-secondary)] group-hover:bg-[#a855f7]/10 group-hover:text-[#a855f7] group-hover:border-[#a855f7]/30 transition-all duration-500 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <div class="flex-1">
                <h4 class="text-base font-bold text-[var(--text-primary)] group-hover:text-[#a855f7] transition-colors">Import Contacts</h4>
                <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">Add new subscribers easily</p>
                <div class="mt-2 text-[11px] font-bold tracking-wide text-[var(--text-secondary)] flex items-center gap-1 group-hover:text-[#a855f7] transition-colors">Get started <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
            </div>
        </div>

        {{-- Action 3: View Analytics --}}
        <div class="glass-panel p-6 transition-all duration-700 transform stagger-6 flex items-center gap-5 cursor-pointer group"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="w-14 h-14 rounded-2xl bg-[var(--surface-secondary)] border border-[var(--border-subtle)] flex items-center justify-center text-[var(--text-secondary)] group-hover:bg-[var(--color-success-500)]/10 group-hover:text-[var(--color-success-500)] group-hover:border-[var(--color-success-500)]/30 transition-all duration-500 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div class="flex-1">
                <h4 class="text-base font-bold text-[var(--text-primary)] group-hover:text-[var(--color-success-500)] transition-colors">View Analytics</h4>
                <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">Track performance metrics</p>
                <div class="mt-2 text-[11px] font-bold tracking-wide text-[var(--text-secondary)] flex items-center gap-1 group-hover:text-[var(--color-success-500)] transition-colors">Get started <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
            </div>
        </div>
        
        {{-- Action 4: Browse Templates --}}
        <div class="glass-panel p-6 transition-all duration-700 transform stagger-6 flex items-center gap-5 cursor-pointer group"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="w-14 h-14 rounded-2xl bg-[var(--surface-secondary)] border border-[var(--border-subtle)] flex items-center justify-center text-[var(--text-secondary)] group-hover:bg-[var(--color-warning-500)]/10 group-hover:text-[var(--color-warning-500)] group-hover:border-[var(--color-warning-500)]/30 transition-all duration-500 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
            </div>
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-bold text-[var(--text-primary)] group-hover:text-[var(--color-warning-500)] transition-colors">Browse Templates</h4>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold tracking-wider uppercase bg-[var(--color-success-500)]/10 text-[var(--color-success-500)] border border-[var(--color-success-500)]/20">New</span>
                </div>
                <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">Access proven email frameworks</p>
                <div class="mt-2 text-[11px] font-bold tracking-wide text-[var(--text-secondary)] flex items-center gap-1 group-hover:text-[var(--color-warning-500)] transition-colors">Explore library <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
            </div>
        </div>

        {{-- Action 5: Segment Lists --}}
        <div class="glass-panel p-6 transition-all duration-700 transform stagger-6 flex items-center gap-5 cursor-pointer group"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="w-14 h-14 rounded-2xl bg-[var(--surface-secondary)] border border-[var(--border-subtle)] flex items-center justify-center text-[var(--text-secondary)] group-hover:bg-[var(--color-info-500)]/10 group-hover:text-[var(--color-info-500)] group-hover:border-[var(--color-info-500)]/30 transition-all duration-500 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
            </div>
            <div class="flex-1">
                <h4 class="text-base font-bold text-[var(--text-primary)] group-hover:text-[var(--color-info-500)] transition-colors">Segment Lists</h4>
                <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">Manage dynamic audiences</p>
                <div class="mt-2 text-[11px] font-bold tracking-wide text-[var(--text-secondary)] flex items-center gap-1 group-hover:text-[var(--color-info-500)] transition-colors">Manage lists <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
            </div>
        </div>

        {{-- Action 6: Email Accounts --}}
        <div class="glass-panel p-6 transition-all duration-700 transform stagger-6 flex items-center gap-5 cursor-pointer group"
             :class="loaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="w-14 h-14 rounded-2xl bg-[var(--surface-secondary)] border border-[var(--border-subtle)] flex items-center justify-center text-[var(--text-secondary)] group-hover:bg-[var(--color-danger-500)]/10 group-hover:text-[var(--color-danger-500)] group-hover:border-[var(--color-danger-500)]/30 transition-all duration-500 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-bold text-[var(--text-primary)] group-hover:text-[var(--color-danger-500)] transition-colors">Email Accounts</h4>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold tracking-wider uppercase bg-[#e879f9]/10 text-[#e879f9] border border-[#e879f9]/20">Pro</span>
                </div>
                <p class="text-xs text-[var(--text-tertiary)] mt-1 font-medium">Monitor sender reputation</p>
                <div class="mt-2 text-[11px] font-bold tracking-wide text-[var(--text-secondary)] flex items-center gap-1 group-hover:text-[var(--color-danger-500)] transition-colors">View health <svg class="w-3 h-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
            </div>
        </div>

    </div>

    {{-- ApexCharts Initialization for God-Tier Chart --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if(typeof ApexCharts === 'undefined' || !document.querySelector("#god-tier-chart")) return;
            
            // Get CSS variables for dynamic chart styling
            const style = getComputedStyle(document.body);
            const primaryColor = style.getPropertyValue('--color-primary-500').trim() || '#6366f1';
            const secondaryColor = style.getPropertyValue('--color-info-500').trim() || '#0ea5e9';
            const textColor = style.getPropertyValue('--text-tertiary').trim() || '#71717a';
            const borderColor = style.getPropertyValue('--border-subtle').trim() || '#27272a';

            const options = {
                series: [{
                    name: 'Emails Sent',
                    data: [3100, 4000, 2800, 5100, 4200, 6900, 8100, 7200, 9500, 8400, 10200, 11500]
                }, {
                    name: 'Total Opens',
                    data: [1100, 2100, 1500, 2800, 2400, 4200, 5100, 4500, 6100, 5200, 7100, 8200]
                }],
                chart: {
                    type: 'area',
                    height: '100%',
                    parentHeightOffset: 0,
                    toolbar: { show: false },
                    fontFamily: 'inherit',
                    animations: { enabled: true, easing: 'easeinout', speed: 1200 },
                    background: 'transparent'
                },
                colors: [primaryColor, secondaryColor],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.4,
                        opacityTo: 0.05,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: { enabled: false },
                stroke: {
                    curve: 'smooth',
                    width: 3,
                    lineCap: 'round'
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    axisBorder: { show: false },
                    axisTicks: { show: false },
                    labels: { style: { colors: textColor, fontSize: '13px', fontWeight: 600 } },
                    crosshairs: {
                        stroke: { color: primaryColor, width: 1, dashArray: 4 }
                    }
                },
                yaxis: {
                    labels: { style: { colors: textColor, fontSize: '13px', fontWeight: 600 }, formatter: (value) => value > 999 ? (value / 1000).toFixed(1) + 'k' : value }
                },
                grid: { 
                    borderColor: borderColor, 
                    strokeDashArray: 4, 
                    position: 'back',
                    xaxis: { lines: { show: true } }, 
                    yaxis: { lines: { show: true } },
                    padding: { top: 0, right: 0, bottom: 0, left: 10 }
                },
                theme: { mode: document.documentElement.classList.contains('dark') ? 'dark' : 'light' },
                legend: { show: false },
                tooltip: {
                    theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
                    y: { formatter: function (val) { return val.toLocaleString() } },
                    marker: { show: true }
                }
            };
            
            const chart = new ApexCharts(document.querySelector("#god-tier-chart"), options);
            
            // Render with slight delay for the entrance animation
            setTimeout(() => { chart.render(); }, 600);

            // Listen for theme changes
            window.addEventListener('theme-changed', (e) => {
                chart.updateOptions({
                    theme: { mode: e.detail.theme },
                    tooltip: { theme: e.detail.theme }
                });
            });
            
            // Initialize Globe
            initGlobe();
        });

        function initGlobe() {
            const container = document.getElementById('globe-container');
            if (!container || typeof THREE === 'undefined') return;

            // Clear any existing canvas
            container.innerHTML = '';

            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            
            renderer.setSize(container.clientWidth, container.clientHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.appendChild(renderer.domElement);

            const style = getComputedStyle(document.body);
            const primaryColor = style.getPropertyValue('--color-primary-500').trim() || '#6366f1';

            const geometry = new THREE.SphereGeometry(5, 32, 32);
            const material = new THREE.MeshBasicMaterial({ 
                color: primaryColor, 
                wireframe: true, 
                transparent: true, 
                opacity: 0.25 
            });
            const globe = new THREE.Mesh(geometry, material);
            scene.add(globe);

            const innerGeometry = new THREE.SphereGeometry(4.8, 32, 32);
            const innerMaterial = new THREE.MeshBasicMaterial({ 
                color: primaryColor, 
                transparent: true, 
                opacity: 0.05 
            });
            const innerGlobe = new THREE.Mesh(innerGeometry, innerMaterial);
            scene.add(innerGlobe);

            camera.position.z = 15;

            function animate() {
                requestAnimationFrame(animate);
                globe.rotation.y += 0.002;
                globe.rotation.x += 0.001;
                renderer.render(scene, camera);
            }
            animate();

            window.addEventListener('resize', () => {
                if (!container) return;
                camera.aspect = container.clientWidth / container.clientHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(container.clientWidth, container.clientHeight);
            });

            window.addEventListener('theme-changed', () => {
                const newStyle = getComputedStyle(document.body);
                const newColor = newStyle.getPropertyValue('--color-primary-500').trim() || '#6366f1';
                material.color.set(newColor);
                innerMaterial.color.set(newColor);
            });
        }

        // =========================================
        // CRAZY MOUSE FX ANIMATION
        // =========================================
        function initMouseFX() {
            const canvas = document.getElementById('mouse-fx-canvas');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            
            let width = window.innerWidth;
            let height = window.innerHeight;
            canvas.width = width;
            canvas.height = height;

            window.addEventListener('resize', () => {
                width = window.innerWidth;
                height = window.innerHeight;
                canvas.width = width;
                canvas.height = height;
            });

            const ripples = [];
            let mouseX = width / 2;
            let mouseY = height / 2;
            let isMoving = false;
            let stopTimeout = null;

            let primaryColor = getComputedStyle(document.body).getPropertyValue('--color-primary-500').trim() || '#6366f1';
            window.addEventListener('theme-changed', () => {
                primaryColor = getComputedStyle(document.body).getPropertyValue('--color-primary-500').trim() || '#6366f1';
            });

            class Ripple {
                constructor(x, y) {
                    this.x = x;
                    this.y = y;
                    this.radius = 0;
                    this.life = 0.6; // Start slightly transparent for elegance
                    this.color = primaryColor;
                }
                update() {
                    this.radius += 1.5; // Slower, smoother expansion
                    this.life -= 0.015;  // Slower fade out
                }
                draw() {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                    ctx.strokeStyle = this.color;
                    ctx.lineWidth = 1.5; // Thinner, more precise line
                    ctx.globalAlpha = this.life > 0 ? this.life : 0;
                    ctx.stroke();
                }
            }

            window.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                isMoving = true;

                clearTimeout(stopTimeout);
                stopTimeout = setTimeout(() => {
                    if(isMoving) {
                        isMoving = false;
                        triggerBurst(mouseX, mouseY);
                    }
                }, 120); // 120ms stop detection
            });

            function triggerBurst(x, y) {
                // Just a single elegant ripple
                ripples.push(new Ripple(x, y));
            }

            function animate() {
                ctx.clearRect(0, 0, width, height);
                
                for (let i = ripples.length - 1; i >= 0; i--) {
                    if(ripples[i].radius > 0) {
                        ripples[i].draw();
                    }
                    ripples[i].update();
                    if (ripples[i].life <= 0) ripples.splice(i, 1);
                }

                
                ctx.globalAlpha = 1;
                requestAnimationFrame(animate);
            }
            
            animate();
        }

        document.addEventListener('DOMContentLoaded', () => {
            initMouseFX();
        });
    </script>

    {{-- Canvas for mouse FX --}}
    <canvas id="mouse-fx-canvas" class="pointer-events-none fixed inset-0 z-[9999] w-full h-full"></canvas>
</div>
