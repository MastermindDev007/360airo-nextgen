<div>
    <x-slot:header>
        <div>
            <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[var(--text-primary)] to-[var(--text-secondary)] tracking-tight">Template Library</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1 font-medium">Discover and manage high-converting outreach sequences</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="bg-[var(--surface-secondary)]/50 backdrop-blur-md p-1 rounded-xl flex mr-2 border border-[var(--border-default)]">
                <button class="px-4 py-1.5 rounded-lg bg-primary-500 text-white text-sm font-semibold shadow-sm transition-all">All Email Templates</button>
                <button class="px-4 py-1.5 rounded-lg text-[var(--text-tertiary)] hover:text-[var(--text-primary)] text-sm font-semibold transition-all">My Saved Templates</button>
            </div>
            
            <x-ui.button class="bg-gradient-to-r from-primary-600 to-primary-500 hover:from-primary-500 hover:to-primary-400 text-white shadow-lg shadow-primary-500/25 border-none">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Create Template
            </x-ui.button>
        </div>
    </x-slot:header>

    <div class="flex gap-8">
        {{-- Left Sidebar: Categories --}}
        <div class="w-64 flex-shrink-0 hidden lg:block">
            <div class="sticky top-6">
                <div class="relative mb-6">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" placeholder="Search templates..." class="w-full h-11 pl-11 pr-4 bg-[var(--surface-secondary)]/50 backdrop-blur-sm border border-[var(--border-default)] rounded-xl text-sm placeholder-[var(--text-tertiary)] text-[var(--text-primary)] focus:outline-none focus:ring-2 focus:ring-primary-500/50 transition-all">
                </div>

                <div class="bg-[var(--surface-secondary)]/30 backdrop-blur-xl border border-[var(--border-default)] rounded-2xl p-4 shadow-xl">
                    <h3 class="text-xs font-bold text-[var(--text-tertiary)] uppercase tracking-widest mb-4 pl-3">Categories</h3>
                    <ul class="space-y-1.5">
                        @php
                        $categories = [
                            ['name' => 'All Templates', 'count' => 54, 'active' => true],
                            ['name' => 'Cold Outreach', 'count' => 12, 'active' => false],
                            ['name' => 'Follow-up', 'count' => 8, 'active' => false],
                            ['name' => 'Sales', 'count' => 15, 'active' => false],
                            ['name' => 'Marketing', 'count' => 6, 'active' => false],
                            ['name' => 'Re-engagement', 'count' => 4, 'active' => false],
                            ['name' => 'Networking', 'count' => 5, 'active' => false],
                            ['name' => 'Recruiting', 'count' => 4, 'active' => false],
                        ];
                        @endphp

                        @foreach($categories as $cat)
                        <li>
                            <button class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ $cat['active'] ? 'bg-primary-500/10 text-primary-400' : 'text-[var(--text-secondary)] hover:bg-[var(--surface-tertiary)] hover:text-[var(--text-primary)]' }}">
                                <div class="flex items-center gap-3">
                                    @if($cat['active'])
                                    <div class="w-1.5 h-1.5 rounded-full bg-primary-500"></div>
                                    @else
                                    <div class="w-1.5 h-1.5 rounded-full bg-transparent"></div>
                                    @endif
                                    {{ $cat['name'] }}
                                </div>
                                <span class="text-xs {{ $cat['active'] ? 'bg-primary-500/20 text-primary-300' : 'bg-[var(--surface-tertiary)] text-[var(--text-tertiary)]' }} px-2 py-0.5 rounded-md font-mono">{{ $cat['count'] }}</span>
                            </button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- Main Grid: Template Cards --}}
        <div class="flex-1">
            <div class="flex justify-between items-center mb-6">
                <p class="text-sm text-[var(--text-tertiary)]"><strong class="text-[var(--text-primary)]">24 templates</strong> found in All Templates</p>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-[var(--text-tertiary)]">Sort by:</span>
                    <select class="bg-transparent text-[var(--text-secondary)] text-sm font-medium focus:outline-none cursor-pointer">
                        <option>Highest Converting</option>
                        <option>Most Used</option>
                        <option>Recently Added</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 stagger-children">
                @php
                $templates = [
                    ['name' => 'Problem Agitation Solve (PAS)', 'type' => 'Cold Outreach', 'badge' => 'Highest Conv', 'badge_color' => 'success', 'subject' => 'Idea for {{company}}\'s {{department}} team', 'open' => '82%', 'reply' => '14%', 'icon' => 'C'],
                    ['name' => 'Personalized Compliment + Ask', 'type' => 'Cold Outreach', 'badge' => 'Trending', 'badge_color' => 'primary', 'subject' => 'Loved your recent post on {{topic}}', 'open' => '78%', 'reply' => '19%', 'icon' => 'C'],
                    ['name' => 'Mutual Connection Intro', 'type' => 'Cold Outreach', 'badge' => 'Most Saved', 'badge_color' => 'info', 'subject' => '{{mutual_connection}} suggested we connect', 'open' => '89%', 'reply' => '24%', 'icon' => 'N'],
                    ['name' => 'Gentle Bump / Bump', 'type' => 'Follow-up', 'badge' => 'Essential', 'badge_color' => 'warning', 'subject' => 'Re: Idea for {{company}}\'s {{department}} team', 'open' => '65%', 'reply' => '11%', 'icon' => 'F'],
                    ['name' => 'Value Add Follow-Up', 'type' => 'Follow-up', 'badge' => 'High Reply', 'badge_color' => 'success', 'subject' => 'Resource: How {{competitor}} solved {{pain_point}}', 'open' => '72%', 'reply' => '16%', 'icon' => 'F'],
                    ['name' => 'The Breakup Email', 'type' => 'Follow-up', 'badge' => 'Essential', 'badge_color' => 'warning', 'subject' => 'Closing the loop?', 'open' => '85%', 'reply' => '21%', 'icon' => 'F'],
                    ['name' => 'Feature Announcement', 'type' => 'Marketing', 'badge' => 'New', 'badge_color' => 'primary', 'subject' => 'Introducing {{feature}} for {{company}}', 'open' => '54%', 'reply' => '4%', 'icon' => 'M'],
                    ['name' => 'Partnership Proposal', 'type' => 'Sales', 'badge' => 'High Conv', 'badge_color' => 'success', 'subject' => 'Partnership between {{my_company}} and {{company}}', 'open' => '68%', 'reply' => '12%', 'icon' => 'S'],
                    ['name' => 'Event Invite / Webinar', 'type' => 'Marketing', 'badge' => 'Trending', 'badge_color' => 'primary', 'subject' => 'You\'re invited: {{event_name}} exclusive', 'open' => '61%', 'reply' => '8%', 'icon' => 'M'],
                ];
                @endphp

                @foreach($templates as $tpl)
                <div class="relative group bg-[var(--surface-secondary)]/40 backdrop-blur-sm border border-[var(--border-default)] rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 hover:border-[var(--border-strong)] flex flex-col h-full">
                    
                    {{-- Card Header --}}
                    <div class="p-5 border-b border-[var(--border-subtle)] bg-white/[0.01]">
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-lg bg-[var(--surface-tertiary)] flex items-center justify-center text-[10px] font-bold text-[var(--text-secondary)]">
                                    {{ $tpl['icon'] }}
                                </div>
                                <span class="text-xs font-semibold text-[var(--text-tertiary)] uppercase tracking-wider">{{ $tpl['type'] }}</span>
                            </div>
                            <x-ui.badge variant="{{ $tpl['badge_color'] }}" size="sm" class="font-semibold">{{ $tpl['badge'] }}</x-ui.badge>
                        </div>
                        <h3 class="text-base font-bold text-[var(--text-primary)] mb-1">{{ $tpl['name'] }}</h3>
                    </div>

                    {{-- Card Body --}}
                    <div class="p-5 flex-1 flex flex-col">
                        <div class="mb-4">
                            <p class="text-[10px] font-semibold text-[var(--text-tertiary)] uppercase tracking-wider mb-1.5">Subject</p>
                            <div class="bg-[var(--surface-primary)] border border-[var(--border-default)] rounded-lg p-2.5 text-sm font-mono text-[var(--text-secondary)] break-words group-hover:border-primary-500/30 transition-colors">
                                {{ $tpl['subject'] }}
                            </div>
                        </div>

                        {{-- Metrics --}}
                        <div class="mt-auto grid grid-cols-2 gap-3 p-3 bg-[var(--surface-primary)]/50 rounded-xl border border-[var(--border-subtle)]">
                            <div>
                                <p class="text-[10px] font-semibold text-[var(--text-tertiary)] uppercase tracking-wider mb-1">Avg Open</p>
                                <div class="flex items-center gap-1.5">
                                    <div class="w-1.5 h-1.5 rounded-full bg-info-400"></div>
                                    <span class="text-sm font-bold text-info-400">{{ $tpl['open'] }}</span>
                                </div>
                            </div>
                            <div>
                                <p class="text-[10px] font-semibold text-[var(--text-tertiary)] uppercase tracking-wider mb-1">Avg Reply</p>
                                <div class="flex items-center gap-1.5">
                                    <div class="w-1.5 h-1.5 rounded-full bg-success-400"></div>
                                    <span class="text-sm font-bold text-success-400">{{ $tpl['reply'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Actions overlay on hover --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-[var(--surface-secondary)] via-[var(--surface-secondary)]/90 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6 gap-3 z-10 backdrop-blur-[2px]">
                        <button class="bg-[var(--surface-primary)] border border-[var(--border-strong)] text-[var(--text-primary)] hover:text-primary-400 font-semibold px-4 py-2 rounded-xl text-sm transition-colors shadow-lg flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Preview
                        </button>
                        <button class="bg-primary-600 hover:bg-primary-500 text-white font-semibold px-4 py-2 rounded-xl text-sm transition-colors shadow-lg shadow-primary-500/25 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            Copy to Use
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            
            {{-- Pagination / Load More --}}
            <div class="mt-8 flex justify-center">
                <button class="px-6 py-2.5 rounded-full bg-[var(--surface-secondary)] border border-[var(--border-default)] text-[var(--text-secondary)] text-sm font-semibold hover:bg-[var(--surface-tertiary)] hover:text-[var(--text-primary)] transition-all">
                    Load More Templates
                </button>
            </div>
        </div>
    </div>
</div>
