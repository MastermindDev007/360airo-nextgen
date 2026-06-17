<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Contacts & Lists</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Manage your prospects and contact database</p>
        </div>
        <div class="flex flex-wrap gap-2 mt-4 sm:mt-0">
            <x-ui.button variant="secondary" href="/contacts/import" class="flex-1 sm:flex-none justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                Import
            </x-ui.button>
            <x-ui.button variant="primary" class="flex-1 sm:flex-none justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Contact
            </x-ui.button>
        </div>
    </x-slot:header>

    {{-- Tabs --}}
    <div class="flex items-center gap-1 mb-6 border-b border-[var(--border-default)] overflow-x-auto hide-scrollbar whitespace-nowrap">
        @foreach(['All Contacts' => true, 'Lists' => false, 'Segments' => false, 'Prospect Finder' => false] as $tab => $active)
        <button class="px-4 py-2.5 text-sm font-medium transition-colors relative {{ $active ? 'text-primary-400' : 'text-[var(--text-tertiary)] hover:text-[var(--text-secondary)]' }}">
            {{ $tab }}
            @if($active)<span class="absolute bottom-0 left-0 right-0 h-0.5 bg-primary-500 rounded-full"></span>@endif
        </button>
        @endforeach
    </div>

    {{-- Search and Filters --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 mb-4">
        <div class="relative flex-1 w-full sm:max-w-sm">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" placeholder="Search contacts..." class="w-full h-9 pl-9 pr-3 text-sm bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] placeholder-[var(--text-tertiary)] focus:border-[var(--border-focus)] focus:outline-none">
        </div>
        <div class="flex flex-wrap gap-2 w-full sm:w-auto">
            <x-ui.button variant="secondary" size="sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                Filters
            </x-ui.button>
            <x-ui.button variant="secondary" size="sm">Tags</x-ui.button>
            <x-ui.button variant="secondary" size="sm">Export</x-ui.button>
        </div>
    </div>

    {{-- Contacts Table --}}
    <div class="card card-elevated overflow-hidden p-0 w-full min-w-0">
        <div class="overflow-x-auto hide-scrollbar w-full">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[var(--surface-secondary)]">
                        <th class="text-left px-5 py-3"><input type="checkbox" class="rounded border-[var(--border-strong)] bg-transparent"></th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Name</th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Email</th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Company</th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Title</th>
                        <th class="text-center px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Score</th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Tags</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--border-subtle)]">
                    @php
                    $contacts = [
                        ['name' => 'Sarah Chen', 'email' => 'sarah@techcorp.com', 'company' => 'TechCorp', 'title' => 'VP Engineering', 'score' => 92, 'tags' => ['Hot', 'Enterprise']],
                        ['name' => 'Michael Park', 'email' => 'mpark@innovate.io', 'company' => 'Innovate.io', 'title' => 'CEO', 'score' => 87, 'tags' => ['Decision Maker']],
                        ['name' => 'Emma Wilson', 'email' => 'emma@growthco.com', 'company' => 'GrowthCo', 'title' => 'Head of Marketing', 'score' => 78, 'tags' => ['Marketing']],
                        ['name' => 'James Rodriguez', 'email' => 'james@scaleup.io', 'company' => 'ScaleUp', 'title' => 'CTO', 'score' => 85, 'tags' => ['Technical']],
                        ['name' => 'Lisa Thompson', 'email' => 'lisa@cloudbase.com', 'company' => 'CloudBase', 'title' => 'Director of Sales', 'score' => 71, 'tags' => ['Sales']],
                        ['name' => 'David Kim', 'email' => 'dkim@fundx.com', 'company' => 'FundX', 'title' => 'Partner', 'score' => 95, 'tags' => ['VC', 'Hot']],
                    ];
                    @endphp
                    @foreach($contacts as $c)
                    <tr class="hover:bg-[var(--surface-secondary)] transition-colors cursor-pointer group">
                        <td class="px-5 py-3.5"><input type="checkbox" class="rounded border-[var(--border-strong)] bg-transparent"></td>
                        <td class="px-5 py-3.5">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center flex-shrink-0">
                                    <span class="text-xs font-semibold text-white">{{ substr($c['name'], 0, 1) }}</span>
                                </div>
                                <span class="font-medium text-[var(--text-primary)] group-hover:text-primary-400 transition-colors">{{ $c['name'] }}</span>
                            </div>
                        </td>
                        <td class="px-5 py-3.5 text-[var(--text-secondary)]">{{ $c['email'] }}</td>
                        <td class="px-5 py-3.5 text-[var(--text-secondary)]">{{ $c['company'] }}</td>
                        <td class="px-5 py-3.5 text-[var(--text-secondary)]">{{ $c['title'] }}</td>
                        <td class="px-5 py-3.5 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full text-xs font-bold
                                {{ $c['score'] >= 90 ? 'bg-success-500/15 text-success-400' : ($c['score'] >= 75 ? 'bg-info-500/15 text-info-400' : 'bg-warning-500/15 text-warning-400') }}">
                                {{ $c['score'] }}
                            </span>
                        </td>
                        <td class="px-5 py-3.5">
                            <div class="flex gap-1">
                                @foreach($c['tags'] as $tag)
                                <x-ui.badge variant="{{ $tag === 'Hot' ? 'danger' : 'default' }}" size="sm">{{ $tag }}</x-ui.badge>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-5 py-3.5 text-right">
                            <button class="p-1.5 rounded-[var(--radius-md)] hover:bg-[var(--surface-tertiary)] text-[var(--text-tertiary)] opacity-0 group-hover:opacity-100 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex flex-col sm:flex-row items-center justify-between px-5 py-3 border-t border-[var(--border-default)] bg-[var(--surface-secondary)] gap-3">
            <span class="text-sm text-[var(--text-tertiary)] text-center sm:text-left">Showing 1–6 of 12,450 contacts</span>
            <div class="flex items-center gap-1 flex-wrap justify-center">
                <button class="px-3 py-1.5 text-sm rounded-[var(--radius-md)] bg-primary-600 text-white">1</button>
                <button class="px-3 py-1.5 text-sm rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-tertiary)]">2</button>
                <button class="px-3 py-1.5 text-sm rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-tertiary)]">3</button>
                <span class="text-[var(--text-tertiary)]">...</span>
                <button class="px-3 py-1.5 text-sm rounded-[var(--radius-md)] text-[var(--text-tertiary)] hover:bg-[var(--surface-tertiary)]">Next</button>
            </div>
        </div>
    </div>
</div>
