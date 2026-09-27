import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    initAnnouncementBar();
    initNavbar();
    initMobileMenu();
    initDropdowns();
    initThemeSwitcher();
    initReveal();
    initCarousels();
    initCountUp();
    initShareButtons();
    initCopiedFeedback();
});

function initThemeSwitcher() {
    const root = document.documentElement;
    const STORAGE = 'zbs-theme';
    const systemDark = window.matchMedia('(prefers-color-scheme: dark)');

    const getStored = () => {
        try {
            return localStorage.getItem(STORAGE);
        } catch (e) {
            return null;
        }
    };

    let mode = getStored() || 'system';

    const resolve = (next) =>
        next === 'light' || next === 'dark' ? next : (systemDark.matches ? 'dark' : 'light');

    const apply = (next) => {
        root.setAttribute('data-theme', resolve(next));
    };

    const render = () => {
        const active = resolve(mode);
        document.querySelectorAll('[data-theme-switcher]').forEach((group) => {
            group.querySelectorAll('[data-theme-option]').forEach((btn) => {
                btn.setAttribute('aria-pressed', String(resolve(btn.dataset.themeOption) === active));
            });
        });
        const meta = document.querySelector('meta[name="theme-color"]');
        if (meta) meta.setAttribute('content', active === 'dark' ? '#0A1815' : '#163832');
    };

    document.querySelectorAll('[data-theme-option]').forEach((btn) => {
        btn.addEventListener('click', () => {
            mode = btn.dataset.themeOption;
            try {
                localStorage.setItem(STORAGE, mode);
            } catch (e) { /* private mode */ }
            apply(mode);
            render();
        });
    });

    if (typeof systemDark.addEventListener === 'function') {
        systemDark.addEventListener('change', () => {
            apply(mode);
            render();
        });
    }

    apply(mode);
    render();
}

function initAnnouncementBar() {
    const bar = document.getElementById('announcement-bar');
    const closeBtn = document.getElementById('announcement-close');
    if (!bar || !closeBtn) return;

    if (localStorage.getItem('zbs-announcement-closed') === '1') {
        bar.style.display = 'none';
        document.body.classList.remove('has-announcement');
        return;
    }

    closeBtn.addEventListener('click', () => {
        bar.style.maxHeight = bar.offsetHeight + 'px';
        bar.style.transition = 'max-height 0.3s ease, opacity 0.3s ease';
        requestAnimationFrame(() => {
            bar.style.maxHeight = '0';
            bar.style.opacity = '0';
        });
        localStorage.setItem('zbs-announcement-closed', '1');
        setTimeout(() => {
            bar.remove();
            document.body.classList.remove('has-announcement');
        }, 320);
    });
}

function initNavbar() {
    const header = document.getElementById('site-header');
    if (!header) return;
    const onScroll = () => {
        header.classList.toggle('is-scrolled', window.scrollY > 8);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

function initMobileMenu() {
    const toggle = document.getElementById('mobile-menu-toggle');
    const overlay = document.getElementById('mobile-menu-overlay');
    const panel = document.getElementById('mobile-menu');
    if (!toggle || !overlay || !panel) return;

    const setOpen = (open) => {
        panel.classList.toggle('translate-x-0', open);
        panel.classList.toggle('translate-x-full', !open);
        overlay.classList.toggle('opacity-0', !open);
        overlay.classList.toggle('pointer-events-none', !open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.querySelectorAll('svg').forEach((svg) => svg.classList.toggle('hidden', (svg.dataset.icon === 'open') === open));
        document.body.style.overflow = open ? 'hidden' : '';
    };

    toggle.addEventListener('click', () => setOpen(!panel.classList.contains('translate-x-0')));
    overlay.addEventListener('click', () => setOpen(false));
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') setOpen(false);
    });

    panel.addEventListener('click', (e) => {
        const btn = e.target.closest('button[data-submenu-toggle]');
        if (!btn) return;
        e.preventDefault();
        const li = btn.closest('li');
        const target = li ? li.querySelector('ul') : null;
        if (!target) return;
        const isOpen = !target.classList.contains('hidden');
        target.classList.toggle('hidden', isOpen);
        btn.setAttribute('aria-expanded', String(!isOpen));
        const icon = btn.querySelector('[data-submenu-chevron]');
        if (icon) icon.classList.toggle('rotate-180', !isOpen);
    });
}

function initDropdowns() {
    document.querySelectorAll('[data-dropdown]').forEach((wrap) => {
        let timeout;
        const button = wrap.querySelector('[data-dropdown-button]');
        const menu = wrap.querySelector('[data-dropdown-menu]');
        if (!button || !menu) return;

        const open = () => {
            clearTimeout(timeout);
            menu.classList.add('opacity-100', 'pointer-events-auto', 'translate-y-0');
            menu.classList.remove('invisible', 'opacity-0', 'pointer-events-none', 'translate-y-2');
            button.setAttribute('aria-expanded', 'true');
        };
        const close = () => {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                menu.classList.add('invisible', 'opacity-0', 'pointer-events-none', 'translate-y-2');
                menu.classList.remove('opacity-100', 'pointer-events-auto', 'translate-y-0');
                button.setAttribute('aria-expanded', 'false');
            }, 120);
        };

        wrap.addEventListener('mouseenter', open);
        wrap.addEventListener('mouseleave', close);
        button.addEventListener('click', (e) => {
            e.preventDefault();
            menu.classList.contains('opacity-100') ? close() : open();
        });
        document.addEventListener('click', (e) => {
            if (!wrap.contains(e.target)) close();
        });
    });
}

function initReveal() {
    const elements = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window)) {
        elements.forEach((el) => el.classList.add('is-visible'));
        return;
    }
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -32px 0px' }
    );
    elements.forEach((el) => observer.observe(el));
}

function initCarousels() {
    document.querySelectorAll('[data-carousel]').forEach((carousel) => {
        const slides = [...carousel.querySelectorAll('[data-slide]')];
        const dots = [...carousel.querySelectorAll('[data-carousel-dot]')];
        const prev = carousel.querySelector('[data-carousel-prev]');
        const next = carousel.querySelector('[data-carousel-next]');
        const captions = [...carousel.querySelectorAll('[data-hero-caption]')];
        const autoplayMs = parseInt(carousel.dataset.autoplay, 10) || 0;
        const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (slides.length < 2) return;

        let current = 0;
        let timer = null;

        const restart = () => {
            if (timer) clearInterval(timer);
            timer = null;
            if (autoplayMs && !reduced) {
                timer = setInterval(() => {
                    go(current >= slides.length - 1 ? 0 : current + 1);
                }, autoplayMs);
            }
        };

        const go = (index) => {
            current = Math.max(0, Math.min(index, slides.length - 1));
            slides.forEach((slide, i) => {
                const active = i === current;
                slide.classList.toggle('is-active', active);
                slide.setAttribute('aria-hidden', String(!active));
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('is-active', i === current);
                dot.setAttribute('aria-pressed', String(i === current));
            });
            if (captions.length) {
                const caption = slides[current]?.dataset.caption;
                if (caption) captions.forEach((cap) => { cap.textContent = caption; });
            }
            if (prev) prev.disabled = current === 0;
            if (next) next.disabled = current === slides.length - 1;
            restart();
        };

        if (prev) prev.addEventListener('click', () => go(current - 1));
        if (next) next.addEventListener('click', () => go(current + 1));
        dots.forEach((dot, i) => dot.addEventListener('click', () => go(i)));

        if (autoplayMs && !reduced) {
            carousel.addEventListener('mouseenter', () => { if (timer) clearInterval(timer); });
            carousel.addEventListener('mouseleave', restart);
            carousel.addEventListener('focusin', () => { if (timer) clearInterval(timer); });
            carousel.addEventListener('focusout', restart);
        }

        go(0);
    });
}

function initCountUp() {
    const elements = document.querySelectorAll('[data-count]');
    const formatNumber = (value) =>
        new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(value);

    const animate = (el) => {
        const raw = el.dataset.count;
        if (!raw) return;
        const target = parseFloat(raw);
        if (Number.isNaN(target)) return;
        const duration = 1200;
        const start = performance.now();
        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = formatNumber(Math.round(target * eased));
            if (progress < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
    };

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        elements.forEach((el) => { if (el.dataset.count) el.textContent = formatNumber(parseFloat(el.dataset.count)); });
        return;
    }

    if (!('IntersectionObserver' in window)) {
        elements.forEach(animate);
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animate(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.4 }
    );
    elements.forEach((el) => observer.observe(el));
}

function initShareButtons() {
    document.querySelectorAll('[data-share]').forEach((btn) => {
        btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const { url, title, network } = btn.dataset;
            const shareUrl = url || window.location.href;
            const shareTitle = title || document.title;

            if (network === 'native' && navigator.share) {
                try {
                    await navigator.share({ title: shareTitle, url: shareUrl });
                } catch {
                    /* user cancelled */
                }
                return;
            }

            const targets = {
                facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}`,
                twitter: `https://twitter.com/intent/tweet?url=${encodeURIComponent(shareUrl)}&text=${encodeURIComponent(shareTitle)}`,
                whatsapp: `https://wa.me/?text=${encodeURIComponent(shareTitle + ' ' + shareUrl)}`,
                telegram: `https://t.me/share/url?url=${encodeURIComponent(shareUrl)}&text=${encodeURIComponent(shareTitle)}`,
                copied: null,
            };
            const target = targets[network];
            if (target) window.open(target, '_blank', 'noopener,width=640,height=480');
        });
    });
}

function initCopiedFeedback() {
    document.querySelectorAll('[data-copy]').forEach((btn) => {
        btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const text = btn.dataset.copy || window.location.href;
            try {
                await navigator.clipboard.writeText(text);
            } catch {
                const ta = document.createElement('textarea');
                ta.value = text;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                ta.remove();
            }
            const original = btn.innerHTML;
            btn.innerHTML = '<span class="inline-flex items-center gap-1.5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>Tersalin</span>';
            setTimeout(() => { btn.innerHTML = original; }, 2000);
        });
    });
}