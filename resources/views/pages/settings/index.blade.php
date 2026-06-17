<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Settings</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Manage your workspace preferences and team</p>
        </div>
        <x-ui.button variant="primary" class="mt-4 sm:mt-0">Save Changes</x-ui.button>
    </x-slot:header>

    <div class="flex flex-col lg:flex-row gap-8 min-w-0">
        {{-- Settings Nav --}}
        <div class="w-full lg:w-64 flex-shrink-0 space-y-1">
            <a href="#" class="block px-4 py-2.5 text-sm font-medium rounded-[var(--radius-md)] bg-primary-500/10 text-primary-400">General</a>
            <a href="#" class="block px-4 py-2.5 text-sm font-medium rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] transition-colors">Team & Members</a>
            <a href="#" class="block px-4 py-2.5 text-sm font-medium rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] transition-colors">Domains & Tracking</a>
            <a href="#" class="block px-4 py-2.5 text-sm font-medium rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] transition-colors">Safety Limits</a>
            <a href="#" class="block px-4 py-2.5 text-sm font-medium rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] transition-colors">Unsubscribe Link</a>
        </div>

        {{-- Settings Content --}}
        <div class="flex-1 space-y-6 min-w-0">
            {{-- Workspace Info --}}
            <div class="card p-6">
                <h2 class="text-lg font-bold text-[var(--text-primary)] mb-4">Workspace Information</h2>
                <div class="space-y-4 max-w-lg">
                    <div>
                        <label class="block text-sm font-medium text-[var(--text-secondary)] mb-1.5">Workspace Name</label>
                        <input type="text" value="360Airo Main" class="w-full h-10 px-3 bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[var(--text-secondary)] mb-1.5">Company Website</label>
                        <input type="url" value="https://360airo.com" class="w-full h-10 px-3 bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] focus:border-primary-500 focus:ring-1 focus:ring-primary-500 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[var(--text-secondary)] mb-1.5">Timezone</label>
                        <select class="w-full h-10 px-3 bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] focus:border-primary-500 outline-none transition-all">
                            <option value="UTC">UTC (Coordinated Universal Time)</option>
                            <option value="America/New_York" selected>Eastern Time (US & Canada)</option>
                            <option value="America/Los_Angeles">Pacific Time (US & Canada)</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Danger Zone --}}
            <div class="card p-6 border-danger-500/20 bg-gradient-to-r from-danger-500/5 to-transparent">
                <h2 class="text-lg font-bold text-danger-400 mb-2">Danger Zone</h2>
                <p class="text-sm text-[var(--text-tertiary)] mb-4">Deleting a workspace is irreversible and will delete all associated campaigns, contacts, and email accounts.</p>
                <x-ui.button variant="danger">Delete Workspace</x-ui.button>
            </div>
        </div>
    </div>
</div>
