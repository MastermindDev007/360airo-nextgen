<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Pipeline</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Track deals through your sales pipeline</p>
        </div>
        <div class="flex gap-2">
            <x-ui.button variant="secondary" size="sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Settings
            </x-ui.button>
            <x-ui.button variant="primary"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>Add Deal</x-ui.button>
        </div>
    </x-slot:header>

    {{-- KPIs --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6 stagger-children">
        <x-ui.kpi-card title="Total Prospects" value="234" color="primary"><x-slot:icon><svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Pipeline Value" value="142,800" prefix="$" color="success"><x-slot:icon><svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Deals Won" value="18" trend="up" trendValue="+5 this month" color="success"><x-slot:icon><svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Win Rate" value="32" suffix="%" color="info"><x-slot:icon><svg class="w-5 h-5 text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg></x-slot:icon></x-ui.kpi-card>
    </div>

    {{-- Kanban Board --}}
    <div class="flex gap-4 overflow-x-auto pb-4 -mx-4 px-4 lg:mx-0 lg:px-0">
        @php
        $stages = [
            ['name' => 'Contact', 'color' => 'primary', 'count' => 12, 'value' => '$18,500', 'deals' => [
                ['title' => 'Acme Corp', 'contact' => 'Sarah Chen', 'value' => '$5,000', 'days' => 3],
                ['title' => 'TechFlow', 'contact' => 'Mike Park', 'value' => '$3,200', 'days' => 1],
                ['title' => 'DataSync', 'contact' => 'Emma W.', 'value' => '$2,800', 'days' => 5],
            ]],
            ['name' => 'Interested', 'color' => 'info', 'count' => 8, 'value' => '$42,000', 'deals' => [
                ['title' => 'CloudBase', 'contact' => 'Lisa T.', 'value' => '$12,000', 'days' => 7],
                ['title' => 'ScaleUp', 'contact' => 'James R.', 'value' => '$8,500', 'days' => 4],
            ]],
            ['name' => 'Meeting', 'color' => 'warning', 'count' => 5, 'value' => '$65,000', 'deals' => [
                ['title' => 'FundX Capital', 'contact' => 'David Kim', 'value' => '$25,000', 'days' => 2],
                ['title' => 'GrowthCo', 'contact' => 'Emma W.', 'value' => '$15,000', 'days' => 1],
            ]],
            ['name' => 'Closed Won', 'color' => 'success', 'count' => 18, 'value' => '$82,300', 'deals' => [
                ['title' => 'Innovate.io', 'contact' => 'Mike P.', 'value' => '$8,000', 'days' => 0],
            ]],
        ];
        @endphp

        @foreach($stages as $stage)
        <div class="flex-shrink-0 w-[300px] lg:flex-1 lg:min-w-[250px]">
            {{-- Stage Header --}}
            <div class="flex items-center justify-between mb-3 px-1">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-{{ $stage['color'] }}-500"></span>
                    <span class="text-sm font-semibold text-[var(--text-primary)]">{{ $stage['name'] }}</span>
                    <span class="text-xs text-[var(--text-tertiary)] bg-[var(--surface-secondary)] px-1.5 py-0.5 rounded-full">{{ $stage['count'] }}</span>
                </div>
                <span class="text-xs font-medium text-[var(--text-tertiary)]">{{ $stage['value'] }}</span>
            </div>

            {{-- Deal Cards --}}
            <div class="space-y-2 min-h-[200px] p-2 rounded-[var(--radius-xl)] bg-[var(--surface-secondary)]/50 border border-[var(--border-subtle)]">
                @foreach($stage['deals'] as $deal)
                <div class="card p-3 cursor-grab active:cursor-grabbing hover:border-{{ $stage['color'] }}-500/40 transition-all group">
                    <div class="flex items-start justify-between mb-2">
                        <span class="text-sm font-semibold text-[var(--text-primary)] group-hover:text-{{ $stage['color'] }}-400 transition-colors">{{ $deal['title'] }}</span>
                        <span class="text-sm font-bold text-[var(--text-primary)]">{{ $deal['value'] }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-5 h-5 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                                <span class="text-[8px] font-bold text-white">{{ substr($deal['contact'], 0, 1) }}</span>
                            </div>
                            <span class="text-xs text-[var(--text-tertiary)]">{{ $deal['contact'] }}</span>
                        </div>
                        <span class="text-[10px] text-[var(--text-tertiary)]">{{ $deal['days'] }}d ago</span>
                    </div>
                </div>
                @endforeach

                {{-- Add deal button --}}
                <button class="w-full py-2 text-xs text-[var(--text-tertiary)] hover:text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] rounded-[var(--radius-lg)] border border-dashed border-[var(--border-default)] transition-colors">
                    + Add deal
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
