<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Profile Settings</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Manage your personal account details and preferences</p>
        </div>
        <x-ui.button variant="primary" class="mt-4 sm:mt-0">Save Changes</x-ui.button>
    </x-slot:header>

    <div class="flex flex-col lg:flex-row gap-8 min-w-0">
        {{-- Profile Nav --}}
        <div class="w-full lg:w-64 flex-shrink-0 space-y-1">
            <a href="#" class="block px-4 py-2.5 text-sm font-medium rounded-[var(--radius-md)] bg-primary-500/10 text-primary-400">Personal Info</a>
            <a href="#" class="block px-4 py-2.5 text-sm font-medium rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] transition-colors">Security</a>
            <a href="#" class="block px-4 py-2.5 text-sm font-medium rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] transition-colors">Notifications</a>
        </div>

        {{-- Profile Content --}}
        <div class="flex-1 space-y-6 max-w-2xl min-w-0">
            <div class="card p-6">
                <div class="flex items-center gap-6 mb-8 pb-8 border-b border-[var(--border-default)]">
                    <div class="relative group cursor-pointer">
                        <div class="w-20 h-20 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-2xl font-bold text-white">JD</div>
                        <div class="absolute inset-0 bg-black/50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-[var(--text-primary)]">Profile Photo</h3>
                        <p class="text-sm text-[var(--text-tertiary)] mt-1">PNG, JPG up to 5MB.</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[var(--text-secondary)] mb-1.5">First Name</label>
                            <input type="text" value="John" class="w-full h-10 px-3 bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] focus:border-primary-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[var(--text-secondary)] mb-1.5">Last Name</label>
                            <input type="text" value="Doe" class="w-full h-10 px-3 bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-primary)] focus:border-primary-500 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[var(--text-secondary)] mb-1.5">Email Address</label>
                        <input type="email" value="john@company.com" disabled class="w-full h-10 px-3 bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-lg)] text-[var(--text-tertiary)] opacity-60 cursor-not-allowed">
                        <p class="text-xs text-[var(--text-tertiary)] mt-1">To change your email, contact support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
