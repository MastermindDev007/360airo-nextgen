<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Integrations</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Connect 360Airo with your favorite tools</p>
        </div>
        <div class="relative w-64">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" placeholder="Search integrations..." class="w-full h-9 pl-9 pr-3 text-sm bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] placeholder-[var(--text-tertiary)] focus:border-[var(--border-focus)] focus:outline-none">
        </div>
    </x-slot:header>

    {{-- Categories --}}
    <div class="flex gap-2 overflow-x-auto pb-4 mb-4 hide-scrollbar">
        @foreach(['All', 'CRM', 'Email', 'Data Providers', 'Webhooks'] as $i => $cat)
        <button class="px-4 py-2 rounded-full border {{ $i === 0 ? 'bg-[var(--surface-primary)] border-[var(--border-strong)] text-[var(--text-primary)] font-medium' : 'bg-transparent border-[var(--border-default)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)]' }} text-sm transition-colors whitespace-nowrap">
            {{ $cat }}
        </button>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 stagger-children">
        @php
        $integrations = [
            ['name' => 'HubSpot CRM', 'desc' => 'Sync contacts and log activities automatically.', 'status' => 'Connected', 'icon' => 'H', 'color' => 'bg-[#ff7a59]', 'cat' => 'CRM'],
            ['name' => 'Salesforce', 'desc' => 'Two-way sync for Leads, Contacts, and Opportunities.', 'status' => 'Not Connected', 'icon' => 'S', 'color' => 'bg-[#00a1e0]', 'cat' => 'CRM'],
            ['name' => 'Apollo.io', 'desc' => 'Import contacts directly from Apollo searches.', 'status' => 'Connected', 'icon' => 'A', 'color' => 'bg-[#18181b]', 'cat' => 'Data Providers'],
            ['name' => 'Clearbit', 'desc' => 'Enrich email addresses with firmographic data.', 'status' => 'Not Connected', 'icon' => 'C', 'color' => 'bg-[#0a4d8c]', 'cat' => 'Data Providers'],
            ['name' => 'Google Workspace', 'desc' => 'Connect Gmail accounts for sending and reading.', 'status' => 'Connected', 'icon' => 'G', 'color' => 'bg-[#4285f4]', 'cat' => 'Email'],
            ['name' => 'Microsoft 365', 'desc' => 'Connect Outlook/Exchange accounts.', 'status' => 'Not Connected', 'icon' => 'M', 'color' => 'bg-[#00a4ef]', 'cat' => 'Email'],
            ['name' => 'Slack', 'desc' => 'Get notifications for replies and booked meetings.', 'status' => 'Not Connected', 'icon' => 'Sl', 'color' => 'bg-[#4a154b]', 'cat' => 'Notifications'],
            ['name' => 'Webhooks', 'desc' => 'Push events to any external URL in real-time.', 'status' => 'Not Connected', 'icon' => 'W', 'color' => 'bg-[var(--surface-tertiary)]', 'cat' => 'Webhooks'],
        ];
        @endphp

        @foreach($integrations as $int)
        <div class="card card-elevated flex flex-col items-center text-center group hover:border-[var(--border-strong)] transition-all">
            <div class="w-16 h-16 rounded-2xl {{ $int['color'] }} flex items-center justify-center text-white text-2xl font-bold shadow-lg mb-4 group-hover:scale-110 transition-transform">
                {{ $int['icon'] }}
            </div>
            <h3 class="font-bold text-[var(--text-primary)] mb-1">{{ $int['name'] }}</h3>
            <p class="text-xs text-[var(--text-secondary)] mb-6 flex-1">{{ $int['desc'] }}</p>
            
            <div class="w-full">
                @if($int['status'] === 'Connected')
                <x-ui.button variant="outline" fullWidth="true" size="sm">
                    <span class="w-2 h-2 rounded-full bg-success-500 mr-1.5"></span>
                    Manage
                </x-ui.button>
                @else
                <x-ui.button variant="secondary" fullWidth="true" size="sm">Connect</x-ui.button>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
