(function () {
    'use strict';

    function init() {
        const toggle   = document.querySelector('.custom-menu-toggle');
        const sidebar  = document.getElementById('hsw-sidebar');
        const closeBtn = sidebar && sidebar.querySelector('.mobile-close');
        const overlay  = document.querySelector('.sidebar-overlay');

        if (!toggle || !sidebar) return;

        function openMenu() {
            toggle.classList.add('active');
            toggle.setAttribute('aria-expanded', 'true');
            sidebar.classList.add('open');
            if (overlay) overlay.classList.add('active');
            document.body.classList.add('no-scroll');
        }

        function closeMenu() {
            toggle.classList.remove('active');
            toggle.setAttribute('aria-expanded', 'false');
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
            document.body.classList.remove('no-scroll');
            toggle.focus();
        }

        toggle.addEventListener('click', function () {
            sidebar.classList.contains('open') ? closeMenu() : openMenu();
        });

        if (closeBtn) closeBtn.addEventListener('click', closeMenu);
        if (overlay)  overlay.addEventListener('click', closeMenu);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) closeMenu();
        });

        sidebar.addEventListener('click', function (e) {
            if (!sidebar.classList.contains('open')) return;

            const parentLi = e.target.closest('.menu-item-has-children');
            if (!parentLi) return;

            e.preventDefault();
            e.stopPropagation();

            const isOpen  = parentLi.classList.contains('active');
            const parentUl = parentLi.parentElement;

            if (parentUl) {
                parentUl.querySelectorAll(':scope > .menu-item-has-children.active')
                    .forEach(function (li) { li.classList.remove('active'); });
            }

            if (!isOpen) {
                parentLi.classList.add('active');
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
