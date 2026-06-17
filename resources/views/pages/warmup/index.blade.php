<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Email Warmup</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Build and protect your sender reputation automatically</p>
        </div>
        <div class="flex flex-wrap gap-2 mt-4 sm:mt-0">
            <x-ui.button variant="secondary" class="flex-1 sm:flex-none justify-center">Global Settings</x-ui.button>
            <x-ui.button variant="primary" class="flex-1 sm:flex-none justify-center">Add to Warmup</x-ui.button>
        </div>
    </x-slot:header>

    {{-- Network Health --}}
    <div class="card card-elevated border-success-500/20 bg-gradient-to-r from-success-500/5 to-transparent mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-full bg-success-500/10 flex items-center justify-center relative">
                    <svg class="w-7 h-7 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-success-500 border-2 border-[var(--surface-primary)] rounded-full animate-pulse"></span>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-[var(--text-primary)]">Network is Healthy</h2>
                    <p class="text-sm text-[var(--text-tertiary)]">12,450 active seed accounts interacting globally</p>
                </div>
            </div>
            <div class="flex flex-wrap justify-between sm:justify-start gap-4 sm:gap-8 w-full lg:w-auto mt-4 lg:mt-0">
                <div class="text-center flex-1 sm:flex-none">
                    <div class="text-2xl font-bold text-[var(--text-primary)]">8</div>
                    <div class="text-xs text-[var(--text-tertiary)] uppercase tracking-wider mt-1">Warming</div>
                </div>
                <div class="text-center flex-1 sm:flex-none">
                    <div class="text-2xl font-bold text-success-400">98.5%</div>
                    <div class="text-xs text-[var(--text-tertiary)] uppercase tracking-wider mt-1">Inbox Rate</div>
                </div>
                <div class="text-center flex-1 sm:flex-none">
                    <div class="text-2xl font-bold text-[var(--text-primary)]">1.2k</div>
                    <div class="text-xs text-[var(--text-tertiary)] uppercase tracking-wider mt-1">Interactions Today</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Warming Accounts --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 stagger-children">
        @php
        $accounts = [
            ['email' => 'john@company.com', 'status' => 'Warming', 'day' => 14, 'sent' => 45, 'received' => 42, 'inbox' => 99, 'spam' => 1, 'saved' => 1, 'trend' => [40,50,60,70,80,90,99]],
            ['email' => 'sales@company.com', 'status' => 'Warming', 'day' => 8, 'sent' => 25, 'received' => 22, 'inbox' => 95, 'spam' => 5, 'saved' => 2, 'trend' => [20,30,40,50,70,85,95]],
            ['email' => 'outreach@company.com', 'status' => 'Maintaining', 'day' => 45, 'sent' => 50, 'received' => 48, 'inbox' => 100, 'spam' => 0, 'saved' => 0, 'trend' => [98,99,100,100,99,100,100]],
            ['email' => 'hello@newdomain.com', 'status' => 'Paused', 'day' => 3, 'sent' => 10, 'received' => 8, 'inbox' => 80, 'spam' => 20, 'saved' => 5, 'trend' => [50,60,80,80,80,80,80]],
        ];
        @endphp

        @foreach($accounts as $acc)
        <div class="card card-elevated">
            <div class="flex flex-col sm:flex-row sm:justify-between items-start mb-4 gap-3">
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white font-bold">{{ substr($acc['email'], 0, 1) }}</div>
                    <div>
                        <h3 class="font-semibold text-[var(--text-primary)]">{{ $acc['email'] }}</h3>
                        <div class="text-xs text-[var(--text-tertiary)]">Day {{ $acc['day'] }} • {{ $acc['status'] }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-1.5 px-2 py-1 bg-[var(--surface-secondary)] rounded-[var(--radius-md)] border border-[var(--border-default)]">
                        <span class="w-2 h-2 rounded-full {{ $acc['status'] === 'Paused' ? 'bg-warning-500' : 'bg-success-500' }}"></span>
                        <span class="text-xs font-medium text-[var(--text-secondary)]">{{ $acc['status'] }}</span>
                    </div>
                    <button class="p-1.5 rounded-[var(--radius-md)] hover:bg-[var(--surface-secondary)] text-[var(--text-tertiary)] transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg></button>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="p-3 rounded-[var(--radius-lg)] bg-[var(--surface-secondary)] border border-[var(--border-subtle)]">
                    <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1">Inbox Placement</div>
                    <div class="text-2xl font-bold {{ $acc['inbox'] >= 95 ? 'text-success-400' : ($acc['inbox'] >= 85 ? 'text-warning-400' : 'text-danger-400') }}">{{ $acc['inbox'] }}%</div>
                </div>
                <div class="p-3 rounded-[var(--radius-lg)] bg-[var(--surface-secondary)] border border-[var(--border-subtle)]">
                    <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1">Today's Volume</div>
                    <div class="text-2xl font-bold text-[var(--text-primary)]">{{ $acc['sent'] }} <span class="text-sm font-normal text-[var(--text-tertiary)]">sent</span></div>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs mb-1.5">
                        <span class="text-[var(--text-secondary)]">Landed in Inbox</span>
                        <span class="font-medium text-[var(--text-primary)]">{{ $acc['inbox'] }}%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[var(--surface-tertiary)] rounded-full overflow-hidden">
                        <div class="h-full bg-success-500 rounded-full" style="width: {{ $acc['inbox'] }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-xs mb-1.5">
                        <span class="text-[var(--text-secondary)]">Landed in Spam (Saved)</span>
                        <span class="font-medium text-[var(--text-primary)]">{{ $acc['spam'] }}% ({{ $acc['saved'] }})</span>
                    </div>
                    <div class="w-full h-1.5 bg-[var(--surface-tertiary)] rounded-full overflow-hidden">
                        <div class="h-full bg-danger-500 rounded-full" style="width: {{ $acc['spam'] }}%"></div>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex gap-2">
                <x-ui.button variant="secondary" size="sm" class="flex-1">Settings</x-ui.button>
                <x-ui.button variant="secondary" size="sm" class="flex-1">Report</x-ui.button>
            </div>
        </div>
        @endforeach
    </div>
</div>
