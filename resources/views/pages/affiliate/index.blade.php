<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Partner Program</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Refer users and earn 30% recurring commission</p>
        </div>
    </x-slot:header>

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 stagger-children">
        <div class="card p-5 border-success-500/20 bg-gradient-to-br from-success-500/10 to-transparent">
            <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1">Unpaid Earnings</div>
            <div class="text-3xl font-bold text-success-400">$450.00</div>
            <x-ui.button variant="success" size="sm" class="w-full mt-4">Request Payout</x-ui.button>
        </div>
        <div class="card p-5">
            <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1">Total Earned</div>
            <div class="text-3xl font-bold text-[var(--text-primary)]">$1,250.00</div>
        </div>
        <div class="card p-5">
            <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1">Active Referrals</div>
            <div class="text-3xl font-bold text-[var(--text-primary)]">12</div>
        </div>
        <div class="card p-5">
            <div class="text-[10px] uppercase font-semibold text-[var(--text-tertiary)] tracking-wider mb-1">Clicks (30d)</div>
            <div class="text-3xl font-bold text-[var(--text-primary)]">342</div>
        </div>
    </div>

    {{-- Link Copy --}}
    <div class="card p-6 mb-8 max-w-3xl">
        <h2 class="text-base font-bold text-[var(--text-primary)] mb-4">Your Referral Link</h2>
        <div class="flex gap-2">
            <input type="text" readonly value="https://360airo.com/?ref=johndoe" class="flex-1 h-10 px-4 bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] font-mono text-sm outline-none">
            <x-ui.button variant="primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                Copy Link
            </x-ui.button>
        </div>
        <p class="text-xs text-[var(--text-tertiary)] mt-3">Share this link to earn 30% recurring commission for up to 12 months for every paying customer.</p>
    </div>
</div>
