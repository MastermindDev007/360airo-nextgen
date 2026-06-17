<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $metaDescription ?? '360Airo — AI-Powered Outbound Outreach Platform' }}">
    <title>{{ isset($title) ? $title . ' — 360Airo' : '360Airo' }}</title>

    {{-- Favicon & Branding --}}
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">

    {{-- Preload critical fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    {{-- Global Drag and Drop Engine (Alpine Sort Plugin) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>

    {{-- Prevent flash of wrong theme --}}
    <script>
        (function() {
            window.themeEngine = {
                init() {
                    let t = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
                    this.apply(t, false);
                    
                    // Listen for Alpine/Livewire theme changes from customizer
                    window.addEventListener('theme-changed', (e) => {
                        this.apply(e.detail.theme, true);
                    });
                },
                apply(newTheme, dispatch = true) {
                    const current = document.documentElement.getAttribute('data-theme');
                    if (current === newTheme && dispatch === false) return; // Only skip if not dispatching

                    document.documentElement.setAttribute('data-theme', newTheme);
                    
                    // Class management for Tailwind
                    document.documentElement.classList.remove('dark', 'light', 'glass');
                    if (newTheme === 'dark' || newTheme === 'glass') {
                        // Keep 'dark' for tailwind dark: variants even in glass mode, or handle glass differently
                        document.documentElement.classList.add('dark');
                    }
                    if (newTheme === 'glass') {
                        document.documentElement.classList.add('glass');
                    }
                    
                    localStorage.setItem('theme', newTheme);
                    
                    if (dispatch) {
                        window.dispatchEvent(new CustomEvent('theme-synced', { detail: { theme: newTheme } }));
                    }
                },
                set(newTheme) {
                    this.apply(newTheme, true);
                }
            };
            window.themeEngine.init();
        })();

        // Global proxy for inline onclick handlers if they still exist
        function toggleTheme() {
            const current = document.documentElement.getAttribute('data-theme');
            window.themeEngine.set(current === 'dark' ? 'light' : 'dark');
        }
    </script>
</head>
<body class="font-sans antialiased overflow-hidden" 
      x-data="{ sidebarStyle: 'expanded', isHovered: false, mobileSidebarOpen: false, isMobile: window.innerWidth < 1024 }" 
      @resize.window="isMobile = window.innerWidth < 1024"
      @theme-settings-updated.window="sidebarStyle = $event.detail.sidebar_style">
    {{-- Skip to content --}}
    <a href="#main-content" class="skip-link">Skip to content</a>

    {{-- Global 3D Preloader --}}
    <script>if(sessionStorage.getItem('preloaderShown') === 'true') document.write('<style>#global-preloader { display: none !important; }</style>');</script>
    <div id="global-preloader" class="fixed inset-0 z-[99999] flex flex-col items-center justify-center bg-[var(--surface-bg)] transition-opacity duration-700">
        <canvas id="preloader-3d-canvas" class="absolute inset-0 pointer-events-none"></canvas>
        
        <div class="relative z-10 flex flex-col items-center">
            <x-logo variant="glass" class="mb-6 scale-150 transform origin-center drop-shadow-2xl" />
            
            <div class="h-[2px] w-48 bg-[var(--surface-tertiary)] rounded-full overflow-hidden relative">
                <div id="preloader-bar" class="absolute top-0 left-0 h-full w-0 bg-[var(--color-primary-500)] shadow-[0_0_10px_var(--color-primary-500)] rounded-full transition-all duration-300"></div>
            </div>
            
            <div class="mt-4 flex items-center justify-between w-48 text-sm font-mono text-[var(--text-secondary)]">
                <span class="uppercase tracking-widest text-[10px]">Initializing System</span>
                <span id="preloader-percentage">0%</span>
            </div>
        </div>
    </div>

    {{-- Premium Dynamic Mesh Gradient Orbs --}}
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        {{-- Orb 1 (Top Right) --}}
        <div class="absolute -top-[20%] -right-[10%] w-[60vw] max-w-[800px] aspect-square rounded-full bg-[var(--color-primary-500)] opacity-[0.08] [html[data-theme=light]_&]:opacity-[0.12] [html[data-theme=glass]_&]:opacity-[0.15] blur-[100px] md:blur-[140px] animate-[float-mesh_20s_ease-in-out_infinite] transition-opacity duration-1000"></div>
        {{-- Orb 2 (Bottom Left) --}}
        <div class="absolute -bottom-[20%] -left-[10%] w-[50vw] max-w-[600px] aspect-square rounded-full bg-[var(--color-info-500,var(--color-primary-400))] opacity-[0.06] [html[data-theme=light]_&]:opacity-[0.10] [html[data-theme=glass]_&]:opacity-[0.12] blur-[100px] md:blur-[140px] animate-[float-mesh_25s_ease-in-out_infinite_reverse] transition-opacity duration-1000"></div>
    </div>

    {{-- Ultra-Light 3D Background Particle Field (Enhanced Visibility) --}}
    <canvas id="global-three-bg" class="fixed inset-0 z-0 pointer-events-none opacity-[0.35] [html[data-theme=light]_&]:opacity-[0.55] [html[data-theme=glass]_&]:opacity-[0.45] transition-opacity duration-1000"></canvas>

    <div class="flex h-screen relative z-10">
        {{-- Mobile overlay --}}
        <div id="mobile-overlay" 
             x-show="mobileSidebarOpen" 
             x-transition.opacity 
             @click="mobileSidebarOpen = false"
             class="fixed inset-0 bg-black/60 z-30 lg:hidden" style="display: none;"></div>

        {{-- Sidebar --}}
        @include('components.layout.sidebar')

        {{-- Main Area --}}
        <div class="flex-1 flex flex-col overflow-hidden min-w-0" id="main-wrapper">
            {{-- Top Bar --}}
            @include('components.layout.topbar')

            {{-- Page Content --}}
            <main id="main-content" class="flex-1 overflow-y-auto">
                <div class="px-4 py-6 sm:px-6 lg:px-8 max-w-[1600px] mx-auto">
                    {{-- Breadcrumb --}}
                    @isset($breadcrumbs)
                    <div class="mb-4">
                        {{ $breadcrumbs }}
                    </div>
                    @endisset

                    {{-- Page Header --}}
                    @isset($header)
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                        {{ $header }}
                    </div>
                    @endisset

                    {{-- Main Slot --}}
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    {{-- Toast Container --}}
    <div class="toast-container" id="toast-container"></div>

    {{-- Custom Live Cursor --}}
    <div class="custom-cursor-dot" id="cursor-dot"></div>
    <div class="custom-cursor-ring" id="cursor-ring"></div>

    {{-- Animation & Visualization Libraries --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    {{-- GridStack removed. Using CSS Grid + Alpine Sort --}}
    
    {{-- Premium Animation Engine --}}
    <style>
        /* Custom Cursor */
        * {
            /* Hide default cursor on desktop where custom cursor applies, except on specific elements */
            cursor: none !important;
        }
        
        .custom-cursor-dot,
        .custom-cursor-ring {
            position: fixed;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 9999;
            border-radius: 50%;
            /* transform managed entirely by GSAP */
        }

        .custom-cursor-dot {
            width: 6px;
            height: 6px;
            background-color: var(--text-primary);
        }

        .custom-cursor-ring {
            width: 32px;
            height: 32px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: width 0.2s, height 0.2s, border-color 0.2s, background-color 0.2s;
        }

        /* When hovering over clickable things */
        .cursor-hover .custom-cursor-ring {
            width: 48px;
            height: 48px;
            border-color: var(--text-primary);
            background-color: transparent; /* Removed background fill to keep it clean */
            /* Removed backdrop-filter: blur(2px) as requested */
        }
        .cursor-hover .custom-cursor-dot {
            display: none;
        }

        /* Global Flashlight Cursor Effect */
        .glow-element {
            position: relative;
            overflow: hidden;
        }
        
        .glow-element::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.3s ease;
            background: radial-gradient(
                600px circle at var(--mouse-x, 0) var(--mouse-y, 0),
                rgba(255, 255, 255, 0.04),
                transparent 40%
            );
            z-index: 1;
            pointer-events: none;
        }
        
        .glow-element::after {
            content: "";
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.3s ease;
            padding: 1px;
            border-radius: inherit;
            background: radial-gradient(
                400px circle at var(--mouse-x, 0) var(--mouse-y, 0),
                rgba(255, 255, 255, 0.15),
                transparent 40%
            );
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
            z-index: 2;
        }

        .glow-element:hover::before,
        .glow-element:hover::after {
            opacity: 1;
        }

        /* (Removed old CSS live-bg) */
        
        /* GSAP Initial States */
        .gsap-sidebar-item { opacity: 0; transform: translateX(-15px); }
        .gsap-topbar-item { opacity: 0; transform: translateY(-10px); }
        .gsap-bento-card { opacity: 0; transform: translateY(20px); }

        /* Premium Floating Mesh Keyframes */
        @keyframes float-mesh {
            0% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0, 0) scale(1); }
        }
    </style>

    <script>
        // --- Global 3D Preloader Engine ---
        const initGlobalPreloader = () => {
            if (sessionStorage.getItem('preloaderShown') === 'true') {
                const p = document.getElementById('global-preloader');
                if (p) p.style.display = 'none';
                return;
            }

            const preloader = document.getElementById('global-preloader');
            const canvas = document.getElementById('preloader-3d-canvas');
            const percentText = document.getElementById('preloader-percentage');
            const bar = document.getElementById('preloader-bar');
            const mainWrapper = document.getElementById('main-wrapper');
            
            if(!preloader || !canvas || typeof THREE === 'undefined' || typeof gsap === 'undefined') {
                if(preloader) preloader.style.display = 'none';
                return;
            }

            // Cinematic Entrance Prep
            if(mainWrapper) gsap.set(mainWrapper, { scale: 0.95, opacity: 0 });

            // Scene Setup
            const scene = new THREE.Scene();
            // Fallback for primary color if CSS var is empty during early load
            let primaryColorStr = getComputedStyle(document.documentElement).getPropertyValue('--color-primary-500').trim();
            if(!primaryColorStr) primaryColorStr = '#6366f1';
            
            const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 20;

            const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

            // The Orbital Core (Icosahedron)
            const coreGeometry = new THREE.IcosahedronGeometry(2, 0);
            const coreMaterial = new THREE.MeshBasicMaterial({ 
                color: primaryColorStr,
                wireframe: true,
                transparent: true,
                opacity: 0.8
            });
            const core = new THREE.Mesh(coreGeometry, coreMaterial);
            scene.add(core);

            // Orbital Rings
            const rings = [];
            for(let i=0; i<3; i++) {
                const ringGeo = new THREE.TorusGeometry(3.5 + i*1.2, 0.02, 32, 100);
                const ringMat = new THREE.MeshBasicMaterial({ 
                    color: primaryColorStr, 
                    transparent: true, 
                    opacity: 0.3 - (i*0.05)
                });
                const ring = new THREE.Mesh(ringGeo, ringMat);
                ring.rotation.x = Math.random() * Math.PI;
                ring.rotation.y = Math.random() * Math.PI;
                scene.add(ring);
                rings.push({ 
                    mesh: ring, 
                    speed: (Math.random() * 0.015) + 0.01, 
                    axis: new THREE.Vector3(Math.random(), Math.random(), Math.random()).normalize() 
                });
            }

            // Animation Loop
            let reqId;
            const clock = new THREE.Clock();
            
            const animate = () => {
                reqId = requestAnimationFrame(animate);
                const time = clock.getElapsedTime();

                // Core rotation
                core.rotation.y += 0.01;
                core.rotation.x += 0.005;
                
                // Core pulsing
                const scale = 1 + Math.sin(time * 2) * 0.05;
                core.scale.set(scale, scale, scale);

                // Rings rotation
                rings.forEach(r => r.mesh.rotateOnAxis(r.axis, r.speed));

                renderer.render(scene, camera);
            };
            
            animate();

            // Resize Handler
            const onResize = () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            };
            window.addEventListener('resize', onResize);

            // Progress Simulation Engine
            let progress = { val: 0 };
            
            const progressAnim = gsap.to(progress, {
                val: 85,
                duration: 2.5,
                ease: "power2.out",
                onUpdate: () => {
                    percentText.innerText = Math.round(progress.val) + '%';
                    bar.style.width = progress.val + '%';
                }
            });

            // Cinematic Exit Routine
            const finishLoading = () => {
                progressAnim.kill();
                
                gsap.to(progress, {
                    val: 100,
                    duration: 0.6,
                    ease: "power2.inOut",
                    onUpdate: () => {
                        percentText.innerText = Math.round(progress.val) + '%';
                        bar.style.width = progress.val + '%';
                    },
                    onComplete: () => {
                        const tl = gsap.timeline({
                            onComplete: () => {
                                preloader.style.display = 'none';
                                cancelAnimationFrame(reqId);
                                renderer.dispose();
                                window.removeEventListener('resize', onResize);
                                sessionStorage.setItem('preloaderShown', 'true');
                                document.dispatchEvent(new CustomEvent('preloader-finished'));
                            }
                        });
                        
                        // Warp Exit Effect
                        tl.to(core.scale, { x: 0.1, y: 0.1, z: 0.1, duration: 0.5, ease: "back.in(1.7)" }, 0);
                        rings.forEach((r, idx) => {
                            tl.to(r.mesh.scale, { x: 3, y: 3, z: 3, duration: 0.8, ease: "power3.out" }, 0);
                            tl.to(r.mesh.material, { opacity: 0, duration: 0.5, ease: "power2.out" }, 0.1);
                        });
                        
                        // Fade out Text UI
                        tl.to(preloader.querySelector('.relative.z-10'), { opacity: 0, y: -20, duration: 0.4, ease: "power2.in" }, 0.2);
                        
                        // Fade Preloader Overlay
                        tl.to(preloader, { opacity: 0, duration: 0.8, ease: "power2.inOut" }, 0.4);
                        
                        // Scale in Main App
                        if(mainWrapper) {
                            tl.to(mainWrapper, { scale: 1, opacity: 1, duration: 1.2, ease: "expo.out" }, 0.6);
                        }
                    }
                });
            };

            // Trigger Finish on Load
            if (document.readyState === 'complete') {
                setTimeout(finishLoading, 600);
            } else {
                window.addEventListener('load', () => setTimeout(finishLoading, 600));
            }
            
            // Handle Livewire SPA Navigation Hook (Optional)
            document.addEventListener('livewire:navigating', () => {
                // Preloader is handled gracefully on full-page loads.
                // We leave SPA micro-loaders to Livewire's default progress bar to avoid heavy 3D hijacking.
            });
        };
        
        // Execute immediately
        initGlobalPreloader();

        document.addEventListener('DOMContentLoaded', () => {
            
            // --- Custom Live Cursor Logic ---
            const cursorDot = document.getElementById('cursor-dot');
            const cursorRing = document.getElementById('cursor-ring');
            
            // Default GSAP setter for instant dot
            gsap.set(cursorDot, { xPercent: -50, yPercent: -50 });
            gsap.set(cursorRing, { xPercent: -50, yPercent: -50 });

            // Detect screen to disable on mobile
            const isMobile = window.matchMedia("(max-width: 768px)").matches;
            if (isMobile) {
                cursorDot.style.display = 'none';
                cursorRing.style.display = 'none';
                document.body.style.cursor = 'auto'; // Reset
                const style = document.createElement('style');
                style.innerHTML = '* { cursor: auto !important; }';
                document.head.appendChild(style);
            }

            // Interactive elements that trigger hover state
            const interactives = document.querySelectorAll('a, button, input, select, textarea, .bento-card-wrapper, [x-sort\\:item]');
            interactives.forEach(el => {
                el.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
                el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));
            });

            // 1. Global Mouse Tracking for Flashlight Effect & Cursor
            document.addEventListener('mousemove', (e) => {
                if (!isMobile) {
                    // Update dot instantly
                    gsap.to(cursorDot, { x: e.clientX, y: e.clientY, duration: 0 });
                    // Update ring with a smooth lagging effect
                    gsap.to(cursorRing, { x: e.clientX, y: e.clientY, duration: 0.15, ease: "power2.out" });
                }

                // Flashlight update
                const target = e.target.closest('.glow-element, .bento-card-wrapper, #app-sidebar, #main-wrapper');
                if (!target) return;
                
                document.documentElement.style.setProperty('--mouse-x', `${e.clientX}px`);
                document.documentElement.style.setProperty('--mouse-y', `${e.clientY}px`);
                
                const glowElements = document.querySelectorAll('.glow-element, .bento-card');
                glowElements.forEach(el => {
                    const rect = el.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    el.style.setProperty('--mouse-x', `${x}px`);
                    el.style.setProperty('--mouse-y', `${y}px`);
                });
            });

            // Click feedback
            document.addEventListener('mousedown', () => {
                if (!isMobile) gsap.to(cursorRing, { scale: 0.7, duration: 0.1 });
            });
            document.addEventListener('mouseup', () => {
                if (!isMobile) gsap.to(cursorRing, { scale: 1, duration: 0.2, ease: "back.out(2)" });
            });

            // 2. GSAP Orchestration (Entry Animations)
            const tl = gsap.timeline({ defaults: { ease: "power4.out" } });
            
            // Sidebar entries
            if(document.querySelectorAll('.gsap-sidebar-item').length) {
                tl.to('.gsap-sidebar-item', { opacity: 1, x: 0, duration: 0.6, stagger: 0.03 }, 0.1);
            }

            // Topbar entries
            if(document.querySelectorAll('.gsap-topbar-item').length) {
                tl.to('.gsap-topbar-item', { opacity: 1, y: 0, duration: 0.8, stagger: 0.05 }, 0.3);
            }

            // Dashboard Grid entries
            if(document.querySelectorAll('.gsap-bento-card').length) {
                tl.to('.gsap-bento-card', { opacity: 1, y: 0, duration: 0.8, stagger: 0.04 }, 0.4);
            }

            // 3. GSAP Number Counter Micro-Animations
            // Example usage: <h3 class="gsap-counter" data-target="1248" data-prefix="" data-suffix="K" data-decimals="1">0</h3>
            const counters = document.querySelectorAll('.gsap-counter');
            counters.forEach(counter => {
                const targetValue = parseFloat(counter.getAttribute('data-target') || 0);
                const prefix = counter.getAttribute('data-prefix') || '';
                const suffix = counter.getAttribute('data-suffix') || '';
                const formatComma = counter.hasAttribute('data-comma');
                
                // Animate from 0 to target
                gsap.to(counter, {
                    innerHTML: targetValue,
                    duration: 1.5,
                    ease: "power2.out",
                    delay: 0.8, // Wait for grid to animate in
                    onUpdate: function() {
                        let val = Number(this.targets()[0].innerHTML);
                        // If it's a whole number target, don't show decimals
                        if(Number.isInteger(targetValue)) {
                            val = Math.round(val);
                            if(formatComma) val = val.toLocaleString();
                        } else {
                            val = val.toFixed(1);
                        }
                        counter.innerHTML = `${prefix}${val}${suffix}`;
                    }
                });
            });
            
            // 4. Icon Micro-animations inside Dashboard Cards
            // Find icons inside cards and give them a subtle entry pop
            const cardIcons = document.querySelectorAll('.bento-card svg');
            if(cardIcons.length) {
                gsap.from(cardIcons, {
                    scale: 0.5,
                    opacity: 0,
                    duration: 0.5,
                    stagger: 0.02,
                    ease: "back.out(1.7)",
                    delay: 0.6
                });
            }

            // --- Ultra-Light Three.js Background ---
            const initThreeBackground = () => {
                const canvas = document.getElementById('global-three-bg');
                if(!canvas || typeof THREE === 'undefined') return;

                const scene = new THREE.Scene();
                // Very subtle fog to blend out the edges
                scene.fog = new THREE.FogExp2(0x000000, 0.001);

                const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
                camera.position.z = 30;

                const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
                renderer.setSize(window.innerWidth, window.innerHeight);
                renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

                // Create a minimalist particle system
                const geometry = new THREE.BufferGeometry();
                const particlesCount = 1500;
                const posArray = new Float32Array(particlesCount * 3);

                for(let i = 0; i < particlesCount * 3; i++) {
                    posArray[i] = (Math.random() - 0.5) * 100;
                }

                geometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));

                // Minimal dynamic dots
                const material = new THREE.PointsMaterial({
                    size: 0.2,
                    color: 0x818cf8, // primary-400 equivalent
                    transparent: true,
                    opacity: 0.6,
                    blending: THREE.AdditiveBlending
                });

                const particlesMesh = new THREE.Points(geometry, material);
                scene.add(particlesMesh);

                // Mouse interaction variable
                let mouseX = 0;
                let mouseY = 0;
                
                document.addEventListener('mousemove', (event) => {
                    mouseX = event.clientX / window.innerWidth - 0.5;
                    mouseY = event.clientY / window.innerHeight - 0.5;
                });

                const clock = new THREE.Clock();

                const animate = () => {
                    requestAnimationFrame(animate);
                    const elapsedTime = clock.getElapsedTime();

                    // Subtle rotation
                    particlesMesh.rotation.y = elapsedTime * 0.05;
                    particlesMesh.rotation.x = elapsedTime * 0.02;

                    // Subtle mouse parallax
                    camera.position.x += (mouseX * 5 - camera.position.x) * 0.05;
                    camera.position.y += (-mouseY * 5 - camera.position.y) * 0.05;
                    camera.lookAt(scene.position);

                    renderer.render(scene, camera);
                };

                animate();

                // Handle resize
                window.addEventListener('resize', () => {
                    camera.aspect = window.innerWidth / window.innerHeight;
                    camera.updateProjectionMatrix();
                    renderer.setSize(window.innerWidth, window.innerHeight);
                });
            };
            
            initThreeBackground();

        });
    </script>

    @livewireScripts
    @stack('scripts')
    {{-- Theme Builder Panel & Global Admin Customizations --}}
    <livewire:theme-builder />
</body>
</html>
