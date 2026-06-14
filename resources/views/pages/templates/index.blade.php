<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Template Library</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">High-converting outreach templates for every scenario</p>
        </div>
        <div class="flex gap-2">
            <x-ui.button variant="secondary" size="sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                My Collections
            </x-ui.button>
            <x-ui.button variant="primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Create Template
            </x-ui.button>
        </div>
    </x-slot:header>

    {{-- Search and Categories --}}
    <div class="flex flex-col lg:flex-row gap-6 mb-8">
        <div class="flex-1 relative">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" placeholder="Search templates..." class="w-full h-12 pl-12 pr-4 bg-[var(--surface-primary)] border border-[var(--border-default)] rounded-[var(--radius-xl)] text-[var(--text-primary)] placeholder-[var(--text-tertiary)] focus:border-[var(--border-focus)] focus:ring-1 focus:ring-[var(--border-focus)] shadow-sm">
        </div>
        <div class="flex gap-2 overflow-x-auto pb-2 lg:pb-0 hide-scrollbar">
            @foreach(['All', 'Cold Outreach', 'Follow-Up', 'Networking', 'Sales', 'Recruiting'] as $i => $cat)
            <button class="px-4 py-2.5 whitespace-nowrap rounded-full border {{ $i === 0 ? 'bg-primary-500/10 border-primary-500/20 text-primary-400 font-semibold' : 'bg-transparent border-[var(--border-default)] text-[var(--text-secondary)] hover:border-[var(--border-strong)]' }} transition-colors text-sm">
                {{ $cat }}
            </button>
            @endforeach
        </div>
    </div>

    {{-- Template Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 stagger-children">
        @php
        $templates = [
            ['name' => 'SaaS Cold Intro v3', 'subject' => 'Quick question about {{company}}', 'open' => '68%', 'reply' => '14%', 'tags' => ['Cold Outreach', 'B2B']],
            ['name' => 'Value Prop Push', 'subject' => 'Idea for {{company}} growth', 'open' => '55%', 'reply' => '9%', 'tags' => ['Sales', 'Growth']],
            ['name' => 'Gentle Follow-Up 1', 'subject' => 'Re: Quick question about {{company}}', 'open' => '42%', 'reply' => '18%', 'tags' => ['Follow-Up']],
            ['name' => 'Breakup Email', 'subject' => 'Closing the loop', 'open' => '71%', 'reply' => '22%', 'tags' => ['Follow-Up', 'Breakup']],
            ['name' => 'Agency Pitch', 'subject' => 'Scaling {{company}}\'s outbound', 'open' => '48%', 'reply' => '11%', 'tags' => ['Cold Outreach', 'Agency']],
            ['name' => 'Podcast Invite', 'subject' => 'Invite: The SaaS Growth Podcast', 'open' => '82%', 'reply' => '45%', 'tags' => ['Networking']],
            ['name' => 'Candidate Reachout', 'subject' => 'Engineering roles at {{my_company}}', 'open' => '65%', 'reply' => '28%', 'tags' => ['Recruiting']],
            ['name' => 'Feedback Request', 'subject' => 'Quick feedback on your recent trial', 'open' => '58%', 'reply' => '15%', 'tags' => ['Product']],
        ];
        @endphp

        @foreach($templates as $tpl)
        <div class="card card-elevated group flex flex-col h-full hover:-translate-y-1 transition-transform duration-[var(--duration-normal)]">
            <div class="flex justify-between items-start mb-4">
                <div class="flex flex-wrap gap-1.5">
                    @foreach($tpl['tags'] as $tag)
                    <x-ui.badge size="sm">{{ $tag }}</x-ui.badge>
                    @endforeach
                </div>
                <button class="text-[var(--text-tertiary)] hover:text-danger-400 transition-colors" aria-label="Favorite">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </button>
            </div>
            <h3 class="text-base font-semibold text-[var(--text-primary)] mb-1">{{ $tpl['name'] }}</h3>
            <p class="text-sm text-[var(--text-secondary)] mb-4 truncate font-mono text-xs p-2 bg-[var(--surface-secondary)] rounded-[var(--radius-md)] border border-[var(--border-default)]">Subj: {{ $tpl['subject'] }}</p>

            <div class="flex justify-between mt-auto pt-4 border-t border-[var(--border-subtle)]">
                <div class="flex gap-4">
                    <div class="flex flex-col">
                        <span class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider">Avg Open</span>
                        <span class="text-sm font-semibold text-info-400">{{ $tpl['open'] }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider">Avg Reply</span>
                        <span class="text-sm font-semibold text-success-400">{{ $tpl['reply'] }}</span>
                    </div>
                </div>
                <x-ui.button variant="secondary" size="xs" class="opacity-0 group-hover:opacity-100 transition-opacity">Use</x-ui.button>
            </div>
        </div>
        @endforeach
    </div>
</div>
