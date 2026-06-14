<div x-data="{
        open: false,
        settings: @entangle('settings'),
        
        init() {
            // Watch for changes and update CSS variables in real-time
            this.$watch('settings', (value) => {
                this.applySettings(value);
                // Debounce save to backend
                clearTimeout(this.saveTimeout);
                this.saveTimeout = setTimeout(() => {
                    $wire.saveSettings(this.settings);
                }, 1000);
            }, { deep: true });

            // Apply initially
            this.applySettings(this.settings);

            // Listen for open event
            window.addEventListener('open-theme-builder', () => {
                this.open = true;
            });

            // Listen for header toggle changes
            window.addEventListener('theme-synced', (e) => {
                this.updateSettingsFromPreset(e.detail.theme);
            });
        },
        
        applySettings(s) {
            const root = document.documentElement;
            // Apply colors
            root.style.setProperty('--color-primary-500', s.color_primary);
            root.style.setProperty('--text-secondary', s.color_secondary);
            root.style.setProperty('--color-primary-400', s.color_accent); // Accent proxy
            root.style.setProperty('--surface-bg', s.color_bg);
            root.style.setProperty('--sidebar-bg', s.color_sidebar);
            root.style.setProperty('--header-bg', s.color_header);
            root.style.setProperty('--surface-primary', s.color_card);
            root.style.setProperty('--border-subtle', s.color_border);
            root.style.setProperty('--text-primary', s.color_text);
            root.style.setProperty('--text-inverse', s.color_heading); // Using inverse as heading for now
            root.style.setProperty('--text-link', s.color_link);
            root.style.setProperty('--color-button-bg', s.color_button);
            root.style.setProperty('--color-button-text', s.color_button_text);
            root.style.setProperty('--color-primary-600', s.color_hover); // Hover proxy
            root.style.setProperty('--color-primary-700', s.color_active); // Active proxy
            root.style.setProperty('--color-success-500', s.color_success);
            root.style.setProperty('--color-warning-500', s.color_warning);
            root.style.setProperty('--color-danger-500', s.color_error);

            // Typography
            root.style.setProperty('--font-sans', s.font_family);
            root.style.setProperty('--font-size-base', s.font_size_base);
            root.style.setProperty('--font-size-heading', s.font_size_heading);
            root.style.setProperty('--font-weight-base', s.font_weight_base);
            root.style.setProperty('--letter-spacing', s.letter_spacing);
            root.style.setProperty('--line-height-base', s.line_height);

            // Components
            root.style.setProperty('--radius-md', s.border_radius);
            
            // Sync layout classes to body
            document.body.className = document.body.className.replace(/layout-\S+/g, '');
            document.body.classList.add(`layout-${s.content_layout}`);
            document.body.classList.add(`spacing-${s.spacing}`);
            
            // Dispatch event so layout components (sidebar/header) can react via Alpine
            window.dispatchEvent(new CustomEvent('theme-settings-updated', { detail: s }));
        },
        
        updateSettingsFromPreset(preset) {
            if (preset === 'dark') {
                this.settings.color_bg = '#09090b';
                this.settings.color_sidebar = '#09090b';
                this.settings.color_card = '#18181b';
                this.settings.color_text = '#fafafa';
                this.settings.color_border = '#27272a';
            } else if (preset === 'light') {
                this.settings.color_bg = '#f8fafc';
                this.settings.color_sidebar = '#ffffff';
                this.settings.color_card = '#ffffff';
                this.settings.color_text = '#0f172a';
                this.settings.color_border = '#e2e8f0';
            } else if (preset === 'glass') {
                this.settings.color_bg = '#0f172a';
                this.settings.color_sidebar = 'rgba(15, 23, 42, 0.4)';
                this.settings.color_card = 'rgba(30, 41, 59, 0.4)';
                this.settings.color_border = 'rgba(255, 255, 255, 0.1)';
            }
        },

        applyPreset(preset) {
            // Set global theme engine
            window.themeEngine.set(preset);
            // Internal settings update happens automatically via 'theme-synced' event
        }
    }"
    @keydown.escape.window="open = false"
>
    {{-- Global Customization Button --}}
    <button @click="open = true" class="fixed bottom-6 right-6 z-50 w-14 h-14 rounded-full bg-primary-600 text-white shadow-[0_0_20px_rgba(99,102,241,0.5)] flex items-center justify-center hover:bg-primary-500 hover:scale-110 transition-all duration-300">
        <svg class="w-6 h-6 animate-[spin_4s_linear_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
    </button>

    {{-- Overlay --}}
    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black/50 z-50 backdrop-blur-sm" @click="open = false" style="display: none;"></div>

    {{-- Slide-out Panel --}}
    <div x-show="open" 
         x-transition:enter="transition ease-[var(--ease-spring)] duration-500"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed top-0 right-0 bottom-0 w-[400px] bg-[var(--surface-primary)] border-l border-[var(--border-subtle)] shadow-2xl z-[60] flex flex-col"
         style="display: none;">
         
        <div class="px-6 py-5 border-b border-[var(--border-subtle)] flex items-center justify-between bg-[var(--surface-secondary)]/50">
            <div>
                <h3 class="text-lg font-black text-[var(--text-primary)]">Theme Builder</h3>
                <p class="text-xs text-[var(--text-tertiary)] mt-0.5">Customize global admin appearance</p>
            </div>
            <button @click="open = false" class="p-2 rounded-lg hover:bg-[var(--surface-tertiary)] text-[var(--text-secondary)] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto p-6 space-y-10 hide-scrollbar">
            
            {{-- Presets --}}
            <section>
                <h4 class="text-sm font-bold text-[var(--text-primary)] mb-4 uppercase tracking-widest">Presets</h4>
                <div class="grid grid-cols-3 gap-3" x-data="{ currentTheme: document.documentElement.getAttribute('data-theme') || 'light' }" @theme-synced.window="currentTheme = $event.detail.theme">
                    <button @click="applyPreset('dark')" class="py-3 bg-[#09090b] border rounded-xl text-xs font-bold text-white transition-all shadow-sm" :class="currentTheme === 'dark' ? 'border-primary-500 ring-2 ring-primary-500/20' : 'border-[#27272a] hover:border-primary-500/50'">Dark</button>
                    <button @click="applyPreset('light')" class="py-3 bg-white border rounded-xl text-xs font-bold text-gray-900 transition-all shadow-sm" :class="currentTheme === 'light' ? 'border-primary-500 ring-2 ring-primary-500/20' : 'border-gray-200 hover:border-primary-500/50'">Light</button>
                    <button @click="applyPreset('glass')" class="py-3 bg-[#0f172a]/50 backdrop-blur-md border rounded-xl text-xs font-bold text-white transition-all shadow-sm" :class="currentTheme === 'glass' ? 'border-primary-500 ring-2 ring-primary-500/20' : 'border-white/10 hover:border-primary-500/50'">Glass</button>
                </div>
            </section>

            {{-- Colors --}}
            <section>
                <h4 class="text-sm font-bold text-[var(--text-primary)] mb-4 uppercase tracking-widest">Colors</h4>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="text-sm text-[var(--text-secondary)] font-medium">Primary</label>
                        <div class="flex items-center gap-2">
                            <input type="text" x-model="settings.color_primary" class="w-20 bg-[var(--surface-secondary)] border border-[var(--border-subtle)] rounded-lg px-2 py-1 text-xs text-[var(--text-primary)] uppercase">
                            <input type="color" x-model="settings.color_primary" class="w-8 h-8 rounded cursor-pointer bg-transparent border-0 p-0">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="text-sm text-[var(--text-secondary)] font-medium">Background</label>
                        <div class="flex items-center gap-2">
                            <input type="text" x-model="settings.color_bg" class="w-20 bg-[var(--surface-secondary)] border border-[var(--border-subtle)] rounded-lg px-2 py-1 text-xs text-[var(--text-primary)] uppercase">
                            <input type="color" x-model="settings.color_bg" class="w-8 h-8 rounded cursor-pointer bg-transparent border-0 p-0">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="text-sm text-[var(--text-secondary)] font-medium">Sidebar</label>
                        <div class="flex items-center gap-2">
                            <input type="text" x-model="settings.color_sidebar" class="w-20 bg-[var(--surface-secondary)] border border-[var(--border-subtle)] rounded-lg px-2 py-1 text-xs text-[var(--text-primary)] uppercase">
                            <input type="color" x-model="settings.color_sidebar" class="w-8 h-8 rounded cursor-pointer bg-transparent border-0 p-0">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="text-sm text-[var(--text-secondary)] font-medium">Cards</label>
                        <div class="flex items-center gap-2">
                            <input type="text" x-model="settings.color_card" class="w-20 bg-[var(--surface-secondary)] border border-[var(--border-subtle)] rounded-lg px-2 py-1 text-xs text-[var(--text-primary)] uppercase">
                            <input type="color" x-model="settings.color_card" class="w-8 h-8 rounded cursor-pointer bg-transparent border-0 p-0">
                        </div>
                    </div>
                </div>
            </section>

            {{-- Layout --}}
            <section>
                <h4 class="text-sm font-bold text-[var(--text-primary)] mb-4 uppercase tracking-widest">Sidebar Layout</h4>
                <div class="grid grid-cols-2 gap-3">
                    <label class="relative flex cursor-pointer border border-[var(--border-subtle)] rounded-xl p-3 hover:bg-[var(--surface-secondary)] transition-colors" :class="{'border-primary-500 bg-primary-500/10': settings.sidebar_style === 'expanded'}">
                        <input type="radio" x-model="settings.sidebar_style" value="expanded" class="hidden">
                        <div class="w-full">
                            <div class="w-full h-12 flex gap-1 mb-2">
                                <div class="w-1/3 bg-[var(--border-strong)] rounded-sm"></div>
                                <div class="w-2/3 bg-[var(--surface-secondary)] rounded-sm"></div>
                            </div>
                            <span class="text-xs font-bold text-[var(--text-primary)]">Expanded</span>
                        </div>
                    </label>
                    <label class="relative flex cursor-pointer border border-[var(--border-subtle)] rounded-xl p-3 hover:bg-[var(--surface-secondary)] transition-colors" :class="{'border-primary-500 bg-primary-500/10': settings.sidebar_style === 'collapsed'}">
                        <input type="radio" x-model="settings.sidebar_style" value="collapsed" class="hidden">
                        <div class="w-full">
                            <div class="w-full h-12 flex gap-1 mb-2">
                                <div class="w-1/6 bg-[var(--border-strong)] rounded-sm"></div>
                                <div class="w-5/6 bg-[var(--surface-secondary)] rounded-sm"></div>
                            </div>
                            <span class="text-xs font-bold text-[var(--text-primary)]">Collapsed (Hover)</span>
                        </div>
                    </label>
                </div>
            </section>

            {{-- Typography --}}
            <section>
                <h4 class="text-sm font-bold text-[var(--text-primary)] mb-4 uppercase tracking-widest">Typography</h4>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs text-[var(--text-secondary)] mb-1">Font Family</label>
                        <select x-model="settings.font_family" class="w-full bg-[var(--surface-secondary)] border border-[var(--border-subtle)] rounded-lg px-3 py-2 text-sm text-[var(--text-primary)] focus:outline-none focus:border-primary-500">
                            <option value="Inter, sans-serif">Inter</option>
                            <option value="'Plus Jakarta Sans', sans-serif">Plus Jakarta Sans</option>
                            <option value="'JetBrains Mono', monospace">JetBrains Mono</option>
                            <option value="system-ui, sans-serif">System Default</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-[var(--text-secondary)] mb-1">Border Radius</label>
                        <select x-model="settings.border_radius" class="w-full bg-[var(--surface-secondary)] border border-[var(--border-subtle)] rounded-lg px-3 py-2 text-sm text-[var(--text-primary)] focus:outline-none focus:border-primary-500">
                            <option value="4px">Sharp (4px)</option>
                            <option value="8px">Default (8px)</option>
                            <option value="16px">Rounded (16px)</option>
                            <option value="24px">Pill (24px)</option>
                        </select>
                    </div>
                </div>
            </section>

            {{-- Cursors --}}
            <section>
                <h4 class="text-sm font-bold text-[var(--text-primary)] mb-4 uppercase tracking-widest">Cursor Style</h4>
                <select x-model="settings.cursor_style" class="w-full bg-[var(--surface-secondary)] border border-[var(--border-subtle)] rounded-lg px-3 py-2 text-sm text-[var(--text-primary)] focus:outline-none focus:border-primary-500">
                    <option value="default">System Default</option>
                    <option value="custom">360Airo Premium Follower</option>
                    <option value="crosshair">Crosshair</option>
                </select>
            </section>

        </div>
        
        <div class="p-6 border-t border-[var(--border-subtle)] bg-[var(--surface-bg)] text-center text-xs text-[var(--text-tertiary)]">
            Changes auto-save. Fully synchronized across devices.
        </div>
    </div>
</div>
