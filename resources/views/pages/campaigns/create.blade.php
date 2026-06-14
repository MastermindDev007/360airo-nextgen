<div class="h-[calc(100vh-100px)] flex flex-col -m-6">
    {{-- Wizard Top Bar --}}
    <div class="h-16 border-b border-[var(--border-default)] bg-[var(--surface-primary)] flex items-center justify-between px-6 flex-shrink-0">
        <div>
            <div class="text-[10px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider mb-0.5">Campaign Builder</div>
            <h1 class="text-base font-bold text-[var(--text-primary)]">Q3 Enterprise Outbound</h1>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-xs text-[var(--text-tertiary)] mr-2">Draft saved 2 mins ago</span>
            <x-ui.button variant="ghost" size="sm" href="/campaigns">Exit</x-ui.button>
            <x-ui.button variant="secondary" size="sm">Save Draft</x-ui.button>
            <x-ui.button variant="primary" size="sm">Review & Launch</x-ui.button>
        </div>
    </div>

    {{-- Main Wizard Layout --}}
    <div class="flex flex-1 overflow-hidden bg-[var(--surface-bg)]">
        
        {{-- Left Sidebar: Sticky Navigation (20%) --}}
        <div class="w-64 border-r border-[var(--border-default)] bg-[var(--surface-primary)] flex-shrink-0 overflow-y-auto">
            <nav class="p-4 space-y-1">
                <h3 class="text-[10px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider mb-3 px-2">Setup</h3>
                
                <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] transition-colors">
                    <span class="w-5 h-5 rounded-full border border-[var(--border-strong)] flex items-center justify-center text-[10px]">1</span>
                    Settings
                </a>
                
                <h3 class="text-[10px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider mt-6 mb-3 px-2">Content</h3>
                
                <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-[var(--radius-md)] bg-blue-50 dark:bg-blue-900/10 text-blue-600 dark:text-blue-400 transition-colors">
                    <span class="w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center text-[10px]">2</span>
                    Sequences
                </a>
                
                <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] transition-colors">
                    <span class="w-5 h-5 rounded-full border border-[var(--border-strong)] flex items-center justify-center text-[10px]">3</span>
                    A/B Testing
                </a>

                <h3 class="text-[10px] font-bold text-[var(--text-tertiary)] uppercase tracking-wider mt-6 mb-3 px-2">Audience</h3>
                
                <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-[var(--radius-md)] text-[var(--text-secondary)] hover:bg-[var(--surface-secondary)] transition-colors">
                    <span class="w-5 h-5 rounded-full border border-[var(--border-strong)] flex items-center justify-center text-[10px]">4</span>
                    Leads
                </a>
            </nav>
        </div>

        {{-- Right Canvas: Active Form (80%) --}}
        <div class="flex-1 overflow-y-auto p-8 relative">
            <div class="max-w-3xl mx-auto">
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-[var(--text-primary)]">Build Sequence</h2>
                    <p class="text-sm text-[var(--text-secondary)] mt-1">Design the multi-channel steps for this campaign.</p>
                </div>

                {{-- Node Builder Canvas --}}
                <div class="space-y-4 relative">
                    {{-- Vertical connecting line --}}
                    <div class="absolute left-6 top-10 bottom-10 w-0.5 bg-[var(--border-strong)] -z-10"></div>

                    {{-- Step 1: Email --}}
                    <div class="card bg-[var(--surface-primary)] border border-[var(--border-default)] shadow-sm relative group">
                        <div class="absolute -left-3 top-6 w-6 h-6 rounded-full bg-blue-100 border-2 border-white flex items-center justify-center text-blue-600 z-10 shadow-sm">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        
                        <div class="flex items-center justify-between mb-4 pl-4">
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-bold text-[var(--text-primary)]">Day 1</span>
                                <x-ui.badge variant="primary" size="sm">Email</x-ui.badge>
                            </div>
                            <div class="flex items-center gap-2">
                                <button class="text-[var(--text-tertiary)] hover:text-[var(--text-primary)] transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                            </div>
                        </div>

                        <div class="space-y-4 pl-4">
                            <div>
                                <label class="block text-xs font-medium text-[var(--text-secondary)] mb-1">Subject</label>
                                <input type="text" value="Quick question about {{companyName}}" class="w-full h-9 px-3 text-sm bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-md)] text-[var(--text-primary)] focus:border-blue-500 focus:outline-none">
                            </div>
                            <div>
                                <div class="flex justify-between items-center mb-1">
                                    <label class="block text-xs font-medium text-[var(--text-secondary)]">Body</label>
                                    <button class="text-xs text-blue-600 hover:text-blue-700 font-medium">Use AI Assistant ✨</button>
                                </div>
                                <div class="border border-[var(--border-default)] rounded-[var(--radius-md)] bg-[var(--surface-secondary)] overflow-hidden focus-within:border-blue-500 transition-colors">
                                    <div class="px-2 py-1.5 border-b border-[var(--border-subtle)] bg-[var(--surface-primary)] flex gap-2">
                                        <button class="text-[var(--text-tertiary)] hover:text-[var(--text-primary)]"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg></button>
                                        <button class="text-[var(--text-tertiary)] hover:text-[var(--text-primary)]"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg></button>
                                    </div>
                                    <textarea rows="4" class="w-full p-3 bg-transparent text-sm text-[var(--text-primary)] focus:outline-none resize-none">Hi {{firstName}},&#10;&#10;I noticed that {{companyName}} is expanding the sales team. How are you currently handling cold outreach volume?&#10;&#10;Best,&#10;John</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 2: LinkedIn --}}
                    <div class="card bg-[var(--surface-primary)] border border-[var(--border-default)] shadow-sm relative group mt-4">
                        <div class="absolute -left-3 top-6 w-6 h-6 rounded-full bg-blue-50 border-2 border-white flex items-center justify-center text-[#0A66C2] z-10 shadow-sm">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </div>
                        
                        <div class="flex items-center justify-between mb-4 pl-4">
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-bold text-[var(--text-primary)]">Day 3</span>
                                <x-ui.badge variant="info" size="sm">LinkedIn Connect</x-ui.badge>
                            </div>
                            <div class="flex items-center gap-2">
                                <button class="text-[var(--text-tertiary)] hover:text-[var(--text-primary)] transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                            </div>
                        </div>

                        <div class="space-y-4 pl-4">
                            <div>
                                <label class="block text-xs font-medium text-[var(--text-secondary)] mb-1">Connection Message (Optional)</label>
                                <textarea rows="2" placeholder="Leave blank to send a connection request without a note..." class="w-full p-3 bg-[var(--surface-secondary)] border border-[var(--border-default)] rounded-[var(--radius-md)] text-sm text-[var(--text-primary)] focus:border-blue-500 focus:outline-none resize-none"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Add Step Button --}}
                    <div class="pl-14 pt-4">
                        <button class="flex items-center gap-2 text-sm font-medium text-[var(--text-secondary)] hover:text-[var(--text-primary)] transition-colors">
                            <div class="w-8 h-8 rounded-full border border-[var(--border-strong)] flex items-center justify-center border-dashed">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            </div>
                            Add Step
                        </button>
                    </div>

                </div>

                {{-- Action Footer inside Canvas --}}
                <div class="mt-10 pt-6 border-t border-[var(--border-default)] flex justify-between">
                    <x-ui.button variant="secondary">Back: Settings</x-ui.button>
                    <x-ui.button variant="primary">Next: Audience</x-ui.button>
                </div>

            </div>
        </div>
    </div>
</div>
