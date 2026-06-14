// 360Airo NextGen — Main JavaScript

// Theme Toggle
function initTheme() {
    const stored = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const theme = stored || (prefersDark ? 'dark' : 'light');
    document.documentElement.setAttribute('data-theme', theme);
}

function toggleTheme() {
    const current = document.documentElement.getAttribute('data-theme') || 'light';
    const next = current === 'dark' ? 'light' : 'dark';
    
    document.documentElement.setAttribute('data-theme', next);
    if (next === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    
    localStorage.setItem('theme', next);
    window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: next } }));
}

// Sidebar Toggle
function initSidebar() {
    const collapsed = localStorage.getItem('sidebar-collapsed') === 'true';
    if (collapsed) {
        document.querySelector('.sidebar')?.classList.add('collapsed');
    }
}

function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    if (!sidebar) return;
    sidebar.classList.toggle('collapsed');
    localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed'));
}

// Command Palette (Ctrl+K)
function initCommandPalette() {
    document.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
            e.preventDefault();
            window.dispatchEvent(new CustomEvent('toggle-command-palette'));
        }
        if (e.key === 'Escape') {
            window.dispatchEvent(new CustomEvent('close-overlays'));
        }
    });
}

// Keyboard shortcuts
function initKeyboardShortcuts() {
    let gPressed = false;
    let gTimeout = null;

    document.addEventListener('keydown', (e) => {
        // Ignore if typing in input
        if (['INPUT', 'TEXTAREA', 'SELECT'].includes(e.target.tagName)) return;
        if (e.target.isContentEditable) return;

        // ? = Show shortcuts help
        if (e.key === '?' && !e.metaKey && !e.ctrlKey) {
            window.dispatchEvent(new CustomEvent('show-shortcuts'));
            return;
        }

        // G + key combos
        if (e.key === 'g' && !e.metaKey && !e.ctrlKey) {
            if (!gPressed) {
                gPressed = true;
                gTimeout = setTimeout(() => { gPressed = false; }, 500);
                return;
            }
        }

        if (gPressed) {
            clearTimeout(gTimeout);
            gPressed = false;
            const routes = { 'd': '/dashboard', 'i': '/inbox', 'c': '/campaigns', 'p': '/pipeline', 'e': '/email-accounts', 't': '/templates', 's': '/settings' };
            if (routes[e.key]) {
                window.location.href = routes[e.key];
            }
        }
    });
}

// Mobile sidebar drawer
function initMobileNav() {
    const overlay = document.getElementById('mobile-overlay');
    const sidebar = document.querySelector('.sidebar');

    if (overlay) {
        overlay.addEventListener('click', () => {
            sidebar?.classList.remove('mobile-open');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    }
}

function openMobileSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('mobile-overlay');
    sidebar?.classList.add('mobile-open');
    overlay?.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closeMobileSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('mobile-overlay');
    sidebar?.classList.remove('mobile-open');
    overlay?.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

// Initialize everything
document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initSidebar();
    initCommandPalette();
    initKeyboardShortcuts();
    initMobileNav();
});

// Expose to global
window.toggleTheme = toggleTheme;
window.toggleSidebar = toggleSidebar;
window.openMobileSidebar = openMobileSidebar;
window.closeMobileSidebar = closeMobileSidebar;
