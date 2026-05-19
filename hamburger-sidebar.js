(function () {
    'use strict';

    function init() {
        const toggle  = document.querySelector('.custom-menu-toggle');
        const sidebar = document.getElementById('hsw-sidebar');
        const overlay = document.querySelector('.sidebar-overlay');

        // If no toggle, nothing to do. Sidebar may be null in editor (expected).
        if (!toggle) return;

        function openMenu() {
            if (!sidebar) return;
            toggle.classList.add('active');
            toggle.setAttribute('aria-expanded', 'true');
            sidebar.classList.add('open');
            if (overlay) overlay.classList.add('active');
            document.body.classList.add('no-scroll');
            bindSubmenuToggles();
        }

        function closeMenu() {
            if (!sidebar) return;
            toggle.classList.remove('active');
            toggle.setAttribute('aria-expanded', 'false');
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
            document.body.classList.remove('no-scroll');
            toggle.focus();
        }

        toggle.addEventListener('click', function () {
            if (!sidebar) return;
            sidebar.classList.contains('open') ? closeMenu() : openMenu();
        });

        // Close button (inside sidebar)
        if (sidebar) {
            const closeBtn = sidebar.querySelector('.mobile-close');
            if (closeBtn) closeBtn.addEventListener('click', closeMenu);
        }

        // Overlay click
        if (overlay) overlay.addEventListener('click', closeMenu);

        // Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && sidebar && sidebar.classList.contains('open')) {
                closeMenu();
            }
        });

        /* --------------------------------------------------------------
           SUBMENU TOGGLE LOGIC
           -------------------------------------------------------------- */
        let togglesBound = false;

        function bindSubmenuToggles() {
            if (togglesBound || !sidebar) return;
            togglesBound = true;

            const isTouch = window.matchMedia('(pointer: coarse)').matches;

            const parentLinks = sidebar.querySelectorAll('.menu-item-has-children > a');

            parentLinks.forEach(function (link) {
                link.addEventListener('click', function (e) {
                    if (!isTouch) return; // Desktop: let link navigate

                    e.preventDefault();
                    e.stopPropagation();

                    const parentLi = link.closest('.menu-item-has-children');
                    if (!parentLi) return;

                    const isOpen   = parentLi.classList.contains('active');
                    const parentUl = parentLi.parentElement;

                    // Accordion: close siblings only
                    if (parentUl) {
                        parentUl.querySelectorAll(':scope > .menu-item-has-children.active')
                            .forEach(function (li) {
                                if (li !== parentLi) li.classList.remove('active');
                            });
                    }

                    parentLi.classList.toggle('active', !isOpen);
                });
            });
        }

        // Bind immediately if sidebar already exists
        bindSubmenuToggles();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
