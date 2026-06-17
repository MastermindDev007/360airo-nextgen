<div class="min-h-[calc(100vh-100px)] lg:h-[calc(100vh-100px)] flex flex-col -m-6">
    {{-- Unified Top Bar for Inbox --}}
    <div class="h-14 border-b border-[var(--border-default)] bg-[var(--surface-primary)] flex items-center justify-between px-6 flex-shrink-0">
        <div>
            <h1 class="text-lg font-semibold text-[var(--text-primary)]">Unified Inbox</h1>
        </div>
        <div class="flex items-center gap-3">
            <x-ui.button variant="secondary" size="sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                Filter
            </x-ui.button>
        </div>
    </div>

    {{-- Strict 3-Pane Layout --}}
    <div class="flex flex-col lg:flex-row flex-1 overflow-y-auto lg:overflow-hidden bg-[var(--surface-bg)]">
        
        {{-- Pane 1: Thread List (25%) --}}
        <div class="w-full lg:w-80 border-b lg:border-b-0 lg:border-r border-[var(--border-default)] bg-[var(--surface-primary)] flex flex-col flex-shrink-0 h-[350px] lg:h-auto overflow-y-auto lg:overflow-hidden">
            <div class="p-3 border-b border-[var(--border-subtle)]">
                <input type="text" placeholder="Search conversations..." class="w-full h-9 px-3 text-sm bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-md)] text-[var(--text-primary)] placeholder-[var(--text-tertiary)] focus:border-blue-500 focus:outline-none">
            </div>
            
            <div class="flex-1 overflow-y-auto">
                {{-- Intent Group: Hot --}}
                <div class="bg-[var(--surface-secondary)] px-4 py-1.5 border-b border-[var(--border-subtle)] sticky top-0 z-10 flex justify-between items-center">
                    <span class="text-[10px] font-bold text-success-600 uppercase tracking-wider">🔥 Hot Intent</span>
                    <span class="text-[10px] font-medium text-[var(--text-tertiary)]">2</span>
                </div>
                @php
                $hot_convos = [
                    ['name' => 'Sarah Chen', 'subject' => 'Re: Next Steps for Q3', 'preview' => 'Could we schedule a quick demo for later this week?', 'time' => '10m', 'unread' => true, 'channel' => 'email'],
                    ['name' => 'David Kim', 'subject' => 'Meeting availability', 'preview' => 'Tuesday at 2 PM PST works for me.', 'time' => '1h', 'unread' => false, 'channel' => 'linkedin'],
                ];
                @endphp
                @foreach($hot_convos as $conv)
                <div class="p-4 border-b border-[var(--border-subtle)] cursor-pointer transition-colors {{ $loop->first ? 'bg-blue-50 border-l-2 border-l-blue-600 dark:bg-blue-900/10' : 'hover:bg-[var(--surface-secondary)] border-l-2 border-l-transparent' }}">
                    <div class="flex justify-between items-baseline mb-1">
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold {{ $conv['unread'] ? 'text-gray-900 dark:text-white' : 'text-[var(--text-secondary)]' }}">{{ $conv['name'] }}</span>
                            @if($conv['channel'] === 'linkedin')
                            <svg class="w-3 h-3 text-[#0A66C2]" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            @endif
                        </div>
                        <span class="text-[11px] text-[var(--text-tertiary)]">{{ $conv['time'] }}</span>
                    </div>
                    <div class="text-sm font-medium text-[var(--text-primary)] truncate">{{ $conv['subject'] }}</div>
                    <div class="text-xs text-[var(--text-tertiary)] truncate mt-0.5">{{ $conv['preview'] }}</div>
                </div>
                @endforeach

                {{-- Intent Group: Warm --}}
                <div class="bg-[var(--surface-secondary)] px-4 py-1.5 border-y border-[var(--border-subtle)] sticky top-0 z-10 mt-2 flex justify-between items-center">
                    <span class="text-[10px] font-bold text-amber-600 uppercase tracking-wider">🤔 Questions / Warm</span>
                    <span class="text-[10px] font-medium text-[var(--text-tertiary)]">1</span>
                </div>
                <div class="p-4 border-b border-[var(--border-subtle)] cursor-pointer hover:bg-[var(--surface-secondary)] border-l-2 border-l-transparent transition-colors">
                    <div class="flex justify-between items-baseline mb-1">
                        <span class="text-sm font-semibold text-[var(--text-secondary)]">Emma Wilson</span>
                        <span class="text-[11px] text-[var(--text-tertiary)]">1d</span>
                    </div>
                    <div class="text-sm font-medium text-[var(--text-primary)] truncate">Re: Partnership Opportunity</div>
                    <div class="text-xs text-[var(--text-tertiary)] truncate mt-0.5">I'm interested, but what is the pricing?</div>
                </div>

                {{-- Intent Group: OOO --}}
                <div class="bg-[var(--surface-secondary)] px-4 py-1.5 border-y border-[var(--border-subtle)] sticky top-0 z-10 mt-2 flex justify-between items-center">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">✈️ Out of Office</span>
                    <span class="text-[10px] font-medium text-[var(--text-tertiary)]">1</span>
                </div>
                <div class="p-4 border-b border-[var(--border-subtle)] cursor-pointer hover:bg-[var(--surface-secondary)] border-l-2 border-l-transparent transition-colors opacity-75">
                    <div class="flex justify-between items-baseline mb-1">
                        <span class="text-sm font-semibold text-[var(--text-secondary)]">Michael Park</span>
                        <span class="text-[11px] text-[var(--text-tertiary)]">1d</span>
                    </div>
                    <div class="text-sm font-medium text-[var(--text-primary)] truncate">Out of Office</div>
                    <div class="text-xs text-[var(--text-tertiary)] truncate mt-0.5">I am away until next Monday.</div>
                </div>
            </div>
        </div>

        {{-- Pane 2: Conversation Thread (50%) --}}
        <div class="flex-1 flex flex-col min-w-0 bg-[var(--surface-primary)] min-h-[500px] lg:min-h-0">
            <div class="p-4 border-b border-[var(--border-default)] flex items-center justify-between flex-shrink-0">
                <div>
                    <h2 class="text-base font-bold text-[var(--text-primary)]">Re: Next Steps for Q3</h2>
                    <div class="text-xs text-[var(--text-tertiary)] mt-0.5">Via Email • Q3 Outbound Campaign</div>
                </div>
                <div class="flex items-center gap-2">
                    <x-ui.button variant="secondary" size="sm">Mark as Unread</x-ui.button>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-8 bg-[var(--surface-bg)]">
                {{-- Sent Message --}}
                <div class="flex flex-col items-end">
                    <div class="max-w-[80%] bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-900/50 rounded-lg p-4 text-sm text-[var(--text-primary)]">
                        <p class="mb-3">Hi Sarah,</p>
                        <p class="mb-3">Following up on my previous note. We've just released a new feature that directly solves the outreach automation bottleneck we discussed.</p>
                        <p>Do you have 10 minutes next week to see it in action?</p>
                    </div>
                    <span class="text-[11px] text-[var(--text-tertiary)] mt-1.5">You • Oct 22, 9:00 AM</span>
                </div>

                {{-- Received Message --}}
                <div class="flex flex-col items-start">
                    <div class="max-w-[80%] bg-[var(--surface-primary)] border border-[var(--border-default)] shadow-sm rounded-lg p-4 text-sm text-[var(--text-primary)]">
                        <p class="mb-3">Hi John,</p>
                        <p class="mb-3">Thanks for reaching out. We are currently evaluating our options for outreach automation and your platform looks interesting.</p>
                        <p class="mb-3">Could we schedule a quick demo for later this week?</p>
                        <p class="text-[var(--text-tertiary)]">Best,<br>Sarah Chen<br>VP Engineering, TechCorp</p>
                    </div>
                    <span class="text-[11px] text-[var(--text-tertiary)] mt-1.5">Sarah Chen • Today, 2:30 PM</span>
                </div>
            </div>

            {{-- Reply Editor --}}
            <div class="p-4 bg-[var(--surface-primary)] border-t border-[var(--border-default)] flex-shrink-0">
                <div class="border border-[var(--border-strong)] rounded-lg focus-within:border-blue-500 transition-colors bg-[var(--surface-bg)] shadow-sm">
                    <textarea rows="3" placeholder="Draft your reply to Sarah..." class="w-full p-3 bg-transparent text-sm text-[var(--text-primary)] focus:outline-none resize-none"></textarea>
                    <div class="flex justify-between items-center p-2 border-t border-[var(--border-subtle)] bg-[var(--surface-primary)] rounded-b-lg">
                        <div class="flex gap-1">
                            <button class="p-1.5 text-[var(--text-tertiary)] hover:text-[var(--text-primary)] rounded transition-colors" title="Insert Meeting Link">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </button>
                            <button class="p-1.5 text-[var(--text-tertiary)] hover:text-[var(--text-primary)] rounded transition-colors" title="Use Template">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            </button>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-[11px] text-[var(--text-tertiary)] hidden sm:block">Cmd + Enter to Send</span>
                            <x-ui.button variant="primary" size="sm">Send Reply</x-ui.button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pane 3: CRM Context (25%) --}}
        <div class="w-80 border-l border-[var(--border-default)] bg-[var(--surface-primary)] flex-shrink-0 flex flex-col hidden xl:flex">
            <div class="p-6 border-b border-[var(--border-subtle)] text-center">
                <div class="w-16 h-16 rounded-full bg-blue-100 text-blue-700 mx-auto flex items-center justify-center font-bold text-xl mb-3">SC</div>
                <h2 class="text-base font-bold text-[var(--text-primary)]">Sarah Chen</h2>
                <p class="text-sm text-[var(--text-secondary)] mt-0.5">VP Engineering at TechCorp</p>
                <div class="flex items-center justify-center gap-2 mt-3">
                    <a href="#" class="text-[#0A66C2] hover:opacity-80 transition-opacity">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-5">
                <h3 class="text-xs font-bold text-[var(--text-tertiary)] uppercase tracking-wider mb-4">Pipeline Status</h3>
                <div class="bg-[var(--surface-secondary)] border border-[var(--border-subtle)] rounded-lg p-3 mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-[var(--text-primary)]">Acme Deal</span>
                        <span class="text-xs font-bold text-success-600 bg-success-50 px-2 py-0.5 rounded-full">Meeting Booked</span>
                    </div>
                    <div class="text-sm font-bold text-[var(--text-primary)]">$12,000 <span class="text-xs font-normal text-[var(--text-tertiary)]">ARR</span></div>
                </div>

                <h3 class="text-xs font-bold text-[var(--text-tertiary)] uppercase tracking-wider mb-4">Activity Timeline</h3>
                <div class="relative border-l-2 border-[var(--border-subtle)] ml-3 space-y-5 pb-4">
                    <div class="relative pl-5">
                        <div class="absolute -left-[5px] top-1 w-2 h-2 rounded-full bg-blue-500 ring-4 ring-[var(--surface-primary)]"></div>
                        <p class="text-sm font-medium text-[var(--text-primary)]">Replied to Email</p>
                        <p class="text-xs text-[var(--text-tertiary)] mt-0.5">Today, 2:30 PM</p>
                    </div>
                    <div class="relative pl-5">
                        <div class="absolute -left-[5px] top-1 w-2 h-2 rounded-full bg-gray-300 dark:bg-gray-600 ring-4 ring-[var(--surface-primary)]"></div>
                        <p class="text-sm font-medium text-[var(--text-secondary)]">Opened Email (x3)</p>
                        <p class="text-xs text-[var(--text-tertiary)] mt-0.5">Oct 23</p>
                    </div>
                    <div class="relative pl-5">
                        <div class="absolute -left-[5px] top-1 w-2 h-2 rounded-full bg-gray-300 dark:bg-gray-600 ring-4 ring-[var(--surface-primary)]"></div>
                        <p class="text-sm font-medium text-[var(--text-secondary)]">Sent Step 2</p>
                        <p class="text-xs text-[var(--text-tertiary)] mt-0.5">Oct 22</p>
                    </div>
                    <div class="relative pl-5">
                        <div class="absolute -left-[5px] top-1 w-2 h-2 rounded-full bg-gray-300 dark:bg-gray-600 ring-4 ring-[var(--surface-primary)]"></div>
                        <p class="text-sm font-medium text-[var(--text-secondary)]">Imported to Campaign</p>
                        <p class="text-xs text-[var(--text-tertiary)] mt-0.5">Oct 19</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
