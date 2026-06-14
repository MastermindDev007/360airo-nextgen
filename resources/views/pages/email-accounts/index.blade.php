<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Email Accounts</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Manage sending accounts and monitor health</p>
        </div>
        <div class="flex gap-2">
            <x-ui.button variant="secondary"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>Refresh</x-ui.button>
            <x-ui.button variant="primary"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>Add Account</x-ui.button>
        </div>
    </x-slot:header>

    {{-- KPIs --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8 stagger-children">
        <x-ui.kpi-card title="Active Accounts" value="8" color="success"><x-slot:icon><svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Daily Limit" value="400" color="primary"><x-slot:icon><svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Sent Today" value="156" trend="up" trendValue="39%" color="info"><x-slot:icon><svg class="w-5 h-5 text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg></x-slot:icon></x-ui.kpi-card>
        <x-ui.kpi-card title="Avg Health" value="92" suffix="/100" color="success"><x-slot:icon><svg class="w-5 h-5 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></x-slot:icon></x-ui.kpi-card>
    </div>

    {{-- Account Cards --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        @php
        $accounts = [
            ['email' => 'john@company.com', 'provider' => 'Gmail', 'status' => 'Active', 'health' => 95, 'spf' => true, 'dkim' => true, 'dmarc' => true, 'warmup' => 75, 'sent' => 23, 'limit' => 50, 'reputation' => 92],
            ['email' => 'outreach@company.com', 'provider' => 'Gmail', 'status' => 'Active', 'health' => 88, 'spf' => true, 'dkim' => true, 'dmarc' => false, 'warmup' => 100, 'sent' => 45, 'limit' => 50, 'reputation' => 85],
            ['email' => 'sales@company.com', 'provider' => 'Outlook', 'status' => 'Active', 'health' => 91, 'spf' => true, 'dkim' => true, 'dmarc' => true, 'warmup' => 60, 'sent' => 18, 'limit' => 50, 'reputation' => 89],
            ['email' => 'john@personalmail.com', 'provider' => 'SMTP', 'status' => 'Warning', 'health' => 62, 'spf' => true, 'dkim' => false, 'dmarc' => false, 'warmup' => 30, 'sent' => 12, 'limit' => 50, 'reputation' => 58],
        ];
        @endphp
        @foreach($accounts as $acc)
        <div class="card card-elevated hover:border-[var(--border-strong)] transition-all group">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-[var(--radius-lg)] {{ $acc['provider'] === 'Gmail' ? 'bg-danger-500/10' : ($acc['provider'] === 'Outlook' ? 'bg-info-500/10' : 'bg-[var(--surface-secondary)]') }} flex items-center justify-center">
                        <svg class="w-5 h-5 {{ $acc['provider'] === 'Gmail' ? 'text-danger-400' : ($acc['provider'] === 'Outlook' ? 'text-info-400' : 'text-[var(--text-tertiary)]') }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <div class="font-semibold text-[var(--text-primary)]">{{ $acc['email'] }}</div>
                        <div class="text-xs text-[var(--text-tertiary)]">{{ $acc['provider'] }}</div>
                    </div>
                </div>
                <x-ui.badge variant="{{ $acc['status'] === 'Active' ? 'success' : 'warning' }}" :dot="true">{{ $acc['status'] }}</x-ui.badge>
            </div>

            {{-- DNS Status --}}
            <div class="grid grid-cols-4 gap-2 mb-4">
                @foreach(['SPF' => $acc['spf'], 'DKIM' => $acc['dkim'], 'DMARC' => $acc['dmarc'], 'DNS' => $acc['spf'] && $acc['dkim']] as $check => $valid)
                <div class="flex flex-col items-center gap-1 py-2 rounded-[var(--radius-md)] {{ $valid ? 'bg-success-500/5' : 'bg-danger-500/5' }}">
                    <svg class="w-4 h-4 {{ $valid ? 'text-success-400' : 'text-danger-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($valid)<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        @else<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>@endif
                    </svg>
                    <span class="text-[10px] font-semibold {{ $valid ? 'text-success-400' : 'text-danger-400' }}">{{ $check }}</span>
                </div>
                @endforeach
            </div>

            {{-- Metrics --}}
            <div class="space-y-3">
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-[var(--text-tertiary)]">Warmup Progress</span>
                        <span class="font-medium text-[var(--text-secondary)]">{{ $acc['warmup'] }}%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[var(--surface-tertiary)] rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-primary-600 to-primary-400 rounded-full transition-all" style="width:{{ $acc['warmup'] }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-[var(--text-tertiary)]">Reputation</span>
                        <span class="font-medium {{ $acc['reputation'] >= 80 ? 'text-success-400' : ($acc['reputation'] >= 60 ? 'text-warning-400' : 'text-danger-400') }}">{{ $acc['reputation'] }}/100</span>
                    </div>
                    <div class="w-full h-1.5 bg-[var(--surface-tertiary)] rounded-full overflow-hidden">
                        <div class="h-full rounded-full transition-all {{ $acc['reputation'] >= 80 ? 'bg-gradient-to-r from-success-600 to-success-400' : ($acc['reputation'] >= 60 ? 'bg-gradient-to-r from-warning-600 to-warning-400' : 'bg-gradient-to-r from-danger-600 to-danger-400') }}" style="width:{{ $acc['reputation'] }}%"></div>
                    </div>
                </div>
                <div class="flex justify-between text-xs text-[var(--text-tertiary)]">
                    <span>Sent today: <strong class="text-[var(--text-secondary)]">{{ $acc['sent'] }}/{{ $acc['limit'] }}</strong></span>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex gap-2 mt-4 pt-4 border-t border-[var(--border-default)]">
                <x-ui.button variant="ghost" size="xs">Settings</x-ui.button>
                <x-ui.button variant="ghost" size="xs">Warmup</x-ui.button>
                <x-ui.button variant="ghost" size="xs">Pause</x-ui.button>
            </div>
        </div>
        @endforeach
    </div>
</div>
