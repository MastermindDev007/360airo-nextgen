<div>
    <x-slot:header>
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-[var(--radius-lg)] bg-[#0A66C2]/10 flex items-center justify-center">
                <svg class="w-5 h-5 text-[#0A66C2]" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">LinkedIn</h1>
                <p class="text-sm text-[var(--text-tertiary)] mt-1">Automate LinkedIn connection requests and messages</p>
            </div>
        </div>
        <div class="flex flex-wrap gap-2 mt-4 sm:mt-0 w-full sm:w-auto">
            <x-ui.button variant="secondary" class="flex-1 sm:flex-none justify-center">Manage Accounts</x-ui.button>
            <x-ui.button variant="primary" class="flex-1 sm:flex-none justify-center bg-[#0A66C2] hover:bg-[#004182]">New Campaign</x-ui.button>
        </div>
    </x-slot:header>

    {{-- Alert --}}
    <x-ui.alert type="warning" title="Safety Limits Enabled" class="mb-6">
        To protect your accounts, LinkedIn outreach is currently capped at <strong>40 connections/day</strong> per account. We automatically randomize delays between actions.
    </x-ui.alert>

    {{-- KPIs --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8 stagger-children">
        <x-ui.kpi-card title="Connected Accounts" value="3" color="info"><x-slot:icon><svg class="w-5 h-5 text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Connection Rate" value="38.5" suffix="%" trend="up" trendValue="2.1%" color="success"><x-slot:icon><svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Reply Rate" value="12.4" suffix="%" trend="up" trendValue="1.5%" color="primary"><x-slot:icon><svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Actions Today" value="112" color="warning"><x-slot:icon><svg class="w-5 h-5 text-warning-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg></x-slot:icon></x-ui.kpi-card>
    </div>

    {{-- Active Campaigns --}}
    <h2 class="text-lg font-semibold text-[var(--text-primary)] mb-4">Active Campaigns</h2>
    <div class="card card-elevated overflow-hidden p-0 w-full min-w-0">
        <div class="overflow-x-auto hide-scrollbar w-full">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[var(--surface-secondary)]">
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Campaign</th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Account</th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Status</th>
                        <th class="text-right px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Invites Sent</th>
                        <th class="text-right px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Accepted</th>
                        <th class="text-right px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Replies</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--border-subtle)]">
                    <tr class="hover:bg-[var(--surface-secondary)] transition-colors cursor-pointer group">
                        <td class="px-5 py-4 font-medium text-[var(--text-primary)]">SaaS Founders Q3</td>
                        <td class="px-5 py-4 text-[var(--text-secondary)]">John Doe</td>
                        <td class="px-5 py-4"><x-ui.badge variant="success" :dot="true">Running</x-ui.badge></td>
                        <td class="px-5 py-4 text-right text-[var(--text-secondary)]">845</td>
                        <td class="px-5 py-4 text-right text-[var(--text-secondary)]">324 (38%)</td>
                        <td class="px-5 py-4 text-right text-[var(--text-secondary)]">45 (13%)</td>
                        <td class="px-5 py-4 text-right">
                            <button class="p-1.5 rounded-[var(--radius-md)] hover:bg-[var(--surface-tertiary)] text-[var(--text-tertiary)] opacity-0 group-hover:opacity-100 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-[var(--surface-secondary)] transition-colors cursor-pointer group">
                        <td class="px-5 py-4 font-medium text-[var(--text-primary)]">VP Marketing Outreach</td>
                        <td class="px-5 py-4 text-[var(--text-secondary)]">Sarah Chen</td>
                        <td class="px-5 py-4"><x-ui.badge variant="warning" :dot="true">Paused</x-ui.badge></td>
                        <td class="px-5 py-4 text-right text-[var(--text-secondary)]">420</td>
                        <td class="px-5 py-4 text-right text-[var(--text-secondary)]">180 (42%)</td>
                        <td class="px-5 py-4 text-right text-[var(--text-secondary)]">22 (12%)</td>
                        <td class="px-5 py-4 text-right">
                            <button class="p-1.5 rounded-[var(--radius-md)] hover:bg-[var(--surface-tertiary)] text-[var(--text-tertiary)] opacity-0 group-hover:opacity-100 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
