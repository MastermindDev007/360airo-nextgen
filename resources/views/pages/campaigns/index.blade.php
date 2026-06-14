<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Campaigns</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Manage your outreach campaigns</p>
        </div>
        <x-ui.button variant="primary" href="/campaigns/create">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Campaign
        </x-ui.button>
    </x-slot:header>

    {{-- KPI Row --}}
    <div class="grid grid-cols-2 lg:grid-cols-6 gap-4 mb-6 stagger-children">
        <x-ui.kpi-card title="Total" value="24" color="primary"><x-slot:icon><svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Active" value="8" color="success"><x-slot:icon><svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Open Rate" value="42.5" suffix="%" trend="up" trendValue="+4.2%" color="info"><x-slot:icon><svg class="w-5 h-5 text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Click Rate" value="5.1" suffix="%" color="warning"><x-slot:icon><svg class="w-5 h-5 text-warning-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Reply Rate" value="8.3" suffix="%" trend="up" trendValue="+1.7%" color="success"><x-slot:icon><svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Recipients" value="12,450" color="primary"><x-slot:icon><svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></x-slot:icon></x-ui.kpi-card>
    </div>

    {{-- Tabs --}}
    <div class="flex items-center gap-1 mb-6 border-b border-[var(--border-default)]">
        @php $tabs = ['All' => true, 'Active' => false, 'Draft' => false, 'Paused' => false, 'Completed' => false]; @endphp
        @foreach($tabs as $tab => $active)
        <button class="px-4 py-2.5 text-sm font-medium transition-colors relative {{ $active ? 'text-primary-400' : 'text-[var(--text-tertiary)] hover:text-[var(--text-secondary)]' }}">
            {{ $tab }}
            @if($active)
            <span class="absolute bottom-0 left-0 right-0 h-0.5 bg-primary-500 rounded-full"></span>
            @endif
        </button>
        @endforeach
    </div>

    {{-- Search & Filters --}}
    <div class="flex items-center gap-3 mb-4">
        <div class="relative flex-1 max-w-sm">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" placeholder="Search campaigns..." class="w-full h-9 pl-9 pr-3 text-sm bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] placeholder-[var(--text-tertiary)] focus:border-[var(--border-focus)] focus:outline-none">
        </div>
        <x-ui.button variant="secondary" size="sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
            Filters
        </x-ui.button>
    </div>

    {{-- Campaign Table --}}
    <div class="card card-elevated overflow-hidden p-0">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[var(--surface-secondary)]">
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">
                            <input type="checkbox" class="rounded border-[var(--border-strong)] bg-transparent">
                        </th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Campaign</th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Status</th>
                        <th class="text-left px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Type</th>
                        <th class="text-right px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Sent</th>
                        <th class="text-right px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Opens</th>
                        <th class="text-right px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Replies</th>
                        <th class="text-right px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase tracking-wider">Meetings</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--border-subtle)]">
                    @php
                    $campaigns = [
                        ['name' => 'Q3 SaaS Outbound', 'status' => 'Active', 'sc' => 'success', 'type' => 'AI', 'sent' => '2,450', 'opens' => '42.5%', 'replies' => '8.3%', 'meetings' => '12'],
                        ['name' => 'Enterprise Decision Makers', 'status' => 'Active', 'sc' => 'success', 'type' => 'Manual', 'sent' => '1,200', 'opens' => '38.1%', 'replies' => '6.7%', 'meetings' => '5'],
                        ['name' => 'Product Hunt Launch', 'status' => 'Completed', 'sc' => 'info', 'type' => 'AI', 'sent' => '5,000', 'opens' => '51.2%', 'replies' => '12.4%', 'meetings' => '18'],
                        ['name' => 'VC Fund Managers', 'status' => 'Paused', 'sc' => 'warning', 'type' => 'Manual', 'sent' => '800', 'opens' => '35.6%', 'replies' => '4.2%', 'meetings' => '2'],
                        ['name' => 'Agency Partners Outreach', 'status' => 'Draft', 'sc' => 'default', 'type' => 'AI', 'sent' => '—', 'opens' => '—', 'replies' => '—', 'meetings' => '—'],
                        ['name' => 'Series A Startups', 'status' => 'Active', 'sc' => 'success', 'type' => 'Manual', 'sent' => '3,200', 'opens' => '44.8%', 'replies' => '9.1%', 'meetings' => '8'],
                    ];
                    @endphp
                    @foreach($campaigns as $c)
                    <tr class="hover:bg-[var(--surface-secondary)] transition-colors cursor-pointer group">
                        <td class="px-5 py-3.5"><input type="checkbox" class="rounded border-[var(--border-strong)] bg-transparent"></td>
                        <td class="px-5 py-3.5">
                            <div class="font-medium text-[var(--text-primary)] group-hover:text-primary-400 transition-colors">{{ $c['name'] }}</div>
                        </td>
                        <td class="px-5 py-3.5"><x-ui.badge variant="{{ $c['sc'] }}" :dot="true">{{ $c['status'] }}</x-ui.badge></td>
                        <td class="px-5 py-3.5">
                            <span class="text-xs font-medium {{ $c['type'] === 'AI' ? 'text-primary-400' : 'text-[var(--text-tertiary)]' }}">{{ $c['type'] }}</span>
                        </td>
                        <td class="px-5 py-3.5 text-right text-[var(--text-secondary)]">{{ $c['sent'] }}</td>
                        <td class="px-5 py-3.5 text-right text-[var(--text-secondary)]">{{ $c['opens'] }}</td>
                        <td class="px-5 py-3.5 text-right text-[var(--text-secondary)]">{{ $c['replies'] }}</td>
                        <td class="px-5 py-3.5 text-right text-[var(--text-secondary)]">{{ $c['meetings'] }}</td>
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
        {{-- Pagination --}}
        <div class="flex items-center justify-between px-5 py-3 border-t border-[var(--border-default)] bg-[var(--surface-secondary)]">
            <span class="text-sm text-[var(--text-tertiary)]">Showing 1–6 of 24 campaigns</span>
            <div class="flex items-center gap-1">
                <button class="px-3 py-1.5 text-sm rounded-[var(--radius-md)] text-[var(--text-tertiary)] hover:bg-[var(--surface-tertiary)] transition-colors">Previous</button>
                <button class="px-3 py-1.5 text-sm rounded-[var(--radius-md)] bg-primary-600 text-white">1</button>
                <button class="px-3 py-1.5 text-sm rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-tertiary)] transition-colors">2</button>
                <button class="px-3 py-1.5 text-sm rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-tertiary)] transition-colors">3</button>
                <button class="px-3 py-1.5 text-sm rounded-[var(--radius-md)] text-[var(--text-tertiary)] hover:bg-[var(--surface-tertiary)] transition-colors">Next</button>
            </div>
        </div>
    </div>
</div>
