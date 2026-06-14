<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Events & Triggers</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Trigger campaigns based on real-world intent signals</p>
        </div>
        <x-ui.button variant="primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Create Trigger
        </x-ui.button>
    </x-slot:header>

    {{-- Event Types Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8 stagger-children">
        @php
        $events = [
            ['name' => 'Funding Rounds', 'desc' => 'Trigger when target accounts raise Seed, Series A-C rounds.', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'success', 'active' => true],
            ['name' => 'Job Changes', 'desc' => 'Reach out when prospects change jobs or get promoted.', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'color' => 'info', 'active' => true],
            ['name' => 'Hiring Signals', 'desc' => 'Target companies posting specific job roles (e.g., "VP Sales").', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'color' => 'primary', 'active' => false],
            ['name' => 'Tech Stack Install', 'desc' => 'Trigger when a company installs a competitor or complementary tech.', 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 'color' => 'warning', 'active' => false],
            ['name' => 'Website Visitors', 'desc' => 'Identify and email anonymous visitors to your pricing page.', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z', 'color' => 'danger', 'active' => false],
        ];
        @endphp

        @foreach($events as $ev)
        <div class="card card-elevated group relative overflow-hidden">
            @if(!$ev['active'])
                <div class="absolute inset-0 bg-[var(--surface-primary)]/80 backdrop-blur-[1px] flex items-center justify-center z-10">
                    <x-ui.badge variant="default">Upgrade to Pro</x-ui.badge>
                </div>
            @endif
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-[var(--radius-lg)] bg-{{ $ev['color'] }}-500/10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-{{ $ev['color'] }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $ev['icon'] }}"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-[var(--text-primary)] mb-1">{{ $ev['name'] }}</h3>
                    <p class="text-sm text-[var(--text-secondary)]">{{ $ev['desc'] }}</p>
                </div>
            </div>
            @if($ev['active'])
            <div class="mt-4 pt-4 border-t border-[var(--border-subtle)] flex justify-between items-center">
                <span class="text-xs text-[var(--text-tertiary)]">2 Active Triggers</span>
                <button class="text-sm font-medium text-primary-400 hover:text-primary-300">Configure →</button>
            </div>
            @endif
        </div>
        @endforeach
    </div>

    {{-- Recent Event Logs --}}
    <h2 class="text-lg font-semibold text-[var(--text-primary)] mb-4">Recent Trigger Logs</h2>
    <div class="card p-0 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead>
                <tr class="bg-[var(--surface-secondary)] border-b border-[var(--border-default)]">
                    <th class="px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Time</th>
                    <th class="px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Event</th>
                    <th class="px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Company/Person</th>
                    <th class="px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Action Taken</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[var(--border-subtle)]">
                <tr>
                    <td class="px-5 py-3 text-[var(--text-tertiary)] text-xs">10 mins ago</td>
                    <td class="px-5 py-3"><x-ui.badge variant="success" size="sm">Funding Raised</x-ui.badge></td>
                    <td class="px-5 py-3 text-[var(--text-primary)] font-medium">Acme Corp <span class="text-[var(--text-tertiary)] font-normal text-xs ml-1">($10M Series A)</span></td>
                    <td class="px-5 py-3 text-[var(--text-secondary)]">Added to "Post-Funding Outreach"</td>
                </tr>
                <tr>
                    <td class="px-5 py-3 text-[var(--text-tertiary)] text-xs">1 hour ago</td>
                    <td class="px-5 py-3"><x-ui.badge variant="info" size="sm">Job Change</x-ui.badge></td>
                    <td class="px-5 py-3 text-[var(--text-primary)] font-medium">Mike Smith <span class="text-[var(--text-tertiary)] font-normal text-xs ml-1">(Now VP Sales at TechFlow)</span></td>
                    <td class="px-5 py-3 text-[var(--text-secondary)]">Sent "Congrats on new role" email</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
