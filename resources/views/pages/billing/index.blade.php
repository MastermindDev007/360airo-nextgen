<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Billing & Plans</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Manage your subscription and billing details</p>
        </div>
    </x-slot:header>

    {{-- Current Plan Overview --}}
    <div class="card p-6 mb-8 border-primary-500/20 bg-gradient-to-r from-primary-500/5 to-transparent">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <h2 class="text-lg font-bold text-[var(--text-primary)] mb-1">Scale Plan <x-ui.badge variant="success" size="sm" class="ml-2">Active</x-ui.badge></h2>
                <p class="text-sm text-[var(--text-secondary)]">Your next billing cycle is <strong class="text-[var(--text-primary)]">Nov 1, 2026</strong> for <strong class="text-[var(--text-primary)]">$199.00</strong></p>
            </div>
            <div class="flex gap-3 w-full md:w-auto">
                <x-ui.button variant="secondary" class="flex-1 md:flex-none">Cancel Plan</x-ui.button>
                <x-ui.button variant="primary" class="flex-1 md:flex-none">Upgrade</x-ui.button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 pt-6 border-t border-[var(--border-subtle)]">
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-[var(--text-secondary)]">Active Campaigns</span>
                    <span class="font-medium text-[var(--text-primary)]">8 / 25</span>
                </div>
                <div class="w-full h-2 bg-[var(--surface-tertiary)] rounded-full overflow-hidden">
                    <div class="h-full bg-primary-500 rounded-full" style="width: 32%"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-[var(--text-secondary)]">Email Accounts</span>
                    <span class="font-medium text-[var(--text-primary)]">4 / 10</span>
                </div>
                <div class="w-full h-2 bg-[var(--surface-tertiary)] rounded-full overflow-hidden">
                    <div class="h-full bg-info-500 rounded-full" style="width: 40%"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-[var(--text-secondary)]">AI Credits</span>
                    <span class="font-medium text-[var(--text-primary)]">42.5k / 100k</span>
                </div>
                <div class="w-full h-2 bg-[var(--surface-tertiary)] rounded-full overflow-hidden">
                    <div class="h-full bg-success-500 rounded-full" style="width: 42.5%"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Billing History --}}
    <h2 class="text-lg font-semibold text-[var(--text-primary)] mb-4">Billing History</h2>
    <div class="card p-0 overflow-hidden w-full min-w-0">
        <div class="overflow-x-auto hide-scrollbar w-full">
            <table class="w-full text-sm text-left">
            <thead>
                <tr class="bg-[var(--surface-secondary)] border-b border-[var(--border-default)]">
                    <th class="px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Date</th>
                    <th class="px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Description</th>
                    <th class="px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Amount</th>
                    <th class="px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase">Status</th>
                    <th class="px-5 py-3 font-medium text-[var(--text-tertiary)] text-xs uppercase text-right">Invoice</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[var(--border-subtle)]">
                @foreach(['Oct 1, 2026', 'Sep 1, 2026', 'Aug 1, 2026'] as $date)
                <tr>
                    <td class="px-5 py-4 text-[var(--text-secondary)]">{{ $date }}</td>
                    <td class="px-5 py-4 text-[var(--text-primary)] font-medium">Scale Plan - Monthly</td>
                    <td class="px-5 py-4 text-[var(--text-secondary)]">$199.00</td>
                    <td class="px-5 py-4"><x-ui.badge variant="success" size="sm">Paid</x-ui.badge></td>
                    <td class="px-5 py-4 text-right">
                        <button class="text-primary-400 hover:text-primary-300 transition-colors">Download PDF</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
