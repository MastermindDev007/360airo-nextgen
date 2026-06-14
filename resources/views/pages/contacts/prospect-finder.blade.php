<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Prospect Finder</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Search our B2B database of 250M+ contacts</p>
        </div>
        <div class="flex gap-2">
            <x-ui.button variant="secondary">Saved Searches</x-ui.button>
            <x-ui.button variant="primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Export Selected
            </x-ui.button>
        </div>
    </x-slot:header>

    <div class="flex flex-col lg:flex-row gap-6 h-[calc(100vh-180px)]">
        {{-- Search Filters Sidebar --}}
        <div class="w-full lg:w-72 flex-shrink-0 flex flex-col gap-4 overflow-y-auto pr-2 custom-scrollbar">
            <div class="card p-4">
                <h3 class="text-sm font-semibold text-[var(--text-primary)] mb-3">Job Titles</h3>
                <input type="text" placeholder="e.g. CEO, VP Marketing" class="w-full h-9 px-3 text-sm bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] placeholder-[var(--text-tertiary)] focus:border-primary-500 outline-none mb-2">
                <div class="flex flex-wrap gap-1.5">
                    <x-ui.badge variant="primary" removable="true">CEO</x-ui.badge>
                    <x-ui.badge variant="primary" removable="true">Founder</x-ui.badge>
                </div>
            </div>

            <div class="card p-4">
                <h3 class="text-sm font-semibold text-[var(--text-primary)] mb-3">Location</h3>
                <input type="text" placeholder="e.g. United States, London" class="w-full h-9 px-3 text-sm bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] placeholder-[var(--text-tertiary)] focus:border-primary-500 outline-none">
            </div>

            <div class="card p-4">
                <h3 class="text-sm font-semibold text-[var(--text-primary)] mb-3">Industry</h3>
                <select class="w-full h-9 px-3 text-sm bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] outline-none">
                    <option>Software Development</option>
                    <option>Financial Services</option>
                    <option>Healthcare</option>
                    <option>Marketing & Advertising</option>
                </select>
            </div>

            <div class="card p-4">
                <h3 class="text-sm font-semibold text-[var(--text-primary)] mb-3">Company Size</h3>
                <div class="space-y-2">
                    @foreach(['1-10', '11-50', '51-200', '201-500', '501-1000', '1000+'] as $size)
                    <label class="flex items-center gap-2 text-sm text-[var(--text-secondary)] cursor-pointer">
                        <input type="checkbox" class="rounded border-[var(--border-strong)] bg-[var(--surface-secondary)]" {{ $size === '11-50' || $size === '51-200' ? 'checked' : '' }}>
                        {{ $size }} employees
                    </label>
                    @endforeach
                </div>
            </div>

            <x-ui.button variant="secondary" fullWidth="true">Clear All Filters</x-ui.button>
        </div>

        {{-- Results --}}
        <div class="flex-1 flex flex-col card p-0 overflow-hidden">
            <div class="p-4 border-b border-[var(--border-default)] flex justify-between items-center bg-[var(--surface-secondary)]/50">
                <span class="text-sm font-medium text-[var(--text-primary)]">14,205 prospects found</span>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-[var(--text-tertiary)]">Sort by:</span>
                    <select class="h-8 px-2 text-xs bg-transparent border-none text-[var(--text-primary)] outline-none font-medium">
                        <option>Relevance</option>
                        <option>Company Size</option>
                        <option>Recently Updated</option>
                    </select>
                </div>
            </div>
            
            <div class="flex-1 overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-[var(--surface-secondary)] border-b border-[var(--border-default)]">
                            <th class="text-left px-5 py-3"><input type="checkbox" class="rounded border-[var(--border-strong)] bg-transparent"></th>
                            <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Prospect</th>
                            <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Company</th>
                            <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Location</th>
                            <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Data</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[var(--border-subtle)]">
                        @php
                        $results = [
                            ['name' => 'Alex Johnson', 'title' => 'CEO & Founder', 'company' => 'TechNova', 'size' => '51-200', 'loc' => 'San Francisco, CA', 'email' => true, 'phone' => false],
                            ['name' => 'Maria Garcia', 'title' => 'Chief Executive Officer', 'company' => 'DataFlow Inc', 'size' => '11-50', 'loc' => 'Austin, TX', 'email' => true, 'phone' => true],
                            ['name' => 'James Wilson', 'title' => 'Founder', 'company' => 'CloudScale', 'size' => '11-50', 'loc' => 'London, UK', 'email' => true, 'phone' => false],
                            ['name' => 'Sarah Chen', 'title' => 'Co-Founder & CEO', 'company' => 'InnovateAI', 'size' => '51-200', 'loc' => 'New York, NY', 'email' => true, 'phone' => true],
                        ];
                        @endphp
                        @foreach($results as $r)
                        <tr class="hover:bg-[var(--surface-secondary)] transition-colors group">
                            <td class="px-5 py-4"><input type="checkbox" class="rounded border-[var(--border-strong)] bg-transparent"></td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-[var(--surface-tertiary)] flex items-center justify-center font-bold text-[var(--text-primary)] text-xs">{{ substr($r['name'], 0, 1) }}</div>
                                    <div>
                                        <div class="font-medium text-[var(--text-primary)] group-hover:text-primary-400 transition-colors cursor-pointer">{{ $r['name'] }}</div>
                                        <div class="text-xs text-[var(--text-secondary)]">{{ $r['title'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4">
                                <div class="font-medium text-[var(--text-primary)]">{{ $r['company'] }}</div>
                                <div class="text-xs text-[var(--text-tertiary)]">{{ $r['size'] }} employees</div>
                            </td>
                            <td class="px-5 py-4 text-[var(--text-secondary)]">{{ $r['loc'] }}</td>
                            <td class="px-5 py-4">
                                <div class="flex gap-2">
                                    @if($r['email']) <span class="w-6 h-6 rounded bg-success-500/10 text-success-400 flex items-center justify-center" title="Email Available"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></span> @endif
                                    @if($r['phone']) <span class="w-6 h-6 rounded bg-info-500/10 text-info-400 flex items-center justify-center" title="Phone Available"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg></span> @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="p-4 border-t border-[var(--border-default)] bg-[var(--surface-secondary)]/50 flex justify-center">
                <x-ui.button variant="outline" size="sm">Load More Results</x-ui.button>
            </div>
        </div>
    </div>
</div>
