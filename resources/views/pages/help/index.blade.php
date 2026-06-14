<div>
    <x-slot:header>
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-primary)] tracking-tight">Help Center</h1>
            <p class="text-sm text-[var(--text-tertiary)] mt-1">Get support, read guides, and join the community</p>
        </div>
    </x-slot:header>

    {{-- Search --}}
    <div class="relative max-w-2xl mx-auto mb-12 mt-6">
        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-[var(--text-tertiary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Search for articles, guides, or keywords..." class="w-full h-14 pl-12 pr-4 bg-[var(--surface-primary)] border border-[var(--border-default)] rounded-[var(--radius-xl)] text-base text-[var(--text-primary)] placeholder-[var(--text-tertiary)] focus:border-primary-500 focus:ring-1 focus:ring-primary-500 shadow-sm transition-all">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto stagger-children">
        <a href="#" class="card card-elevated group hover:border-primary-500 transition-all text-center flex flex-col items-center">
            <div class="w-12 h-12 rounded-full bg-primary-500/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <h3 class="font-bold text-[var(--text-primary)] mb-2">Knowledge Base</h3>
            <p class="text-sm text-[var(--text-secondary)]">Read comprehensive guides on setting up campaigns and domains.</p>
        </a>
        
        <a href="#" class="card card-elevated group hover:border-info-500 transition-all text-center flex flex-col items-center">
            <div class="w-12 h-12 rounded-full bg-info-500/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="font-bold text-[var(--text-primary)] mb-2">Video Tutorials</h3>
            <p class="text-sm text-[var(--text-secondary)]">Watch step-by-step videos to master the platform quickly.</p>
        </a>

        <a href="#" class="card card-elevated group hover:border-success-500 transition-all text-center flex flex-col items-center">
            <div class="w-12 h-12 rounded-full bg-success-500/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-success-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
            <h3 class="font-bold text-[var(--text-primary)] mb-2">Contact Support</h3>
            <p class="text-sm text-[var(--text-secondary)]">Create a ticket or chat with our 24/7 customer success team.</p>
        </a>
    </div>
</div>
