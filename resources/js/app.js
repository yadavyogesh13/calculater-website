import './bootstrap';

// Toggle mobile menu
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenu) {
        mobileMenu.classList.toggle('hidden');
    }
}

// Toggle mobile tools submenu
function toggleToolsMenu() {
    const toolsMenu = document.getElementById('mobile-tools-menu');
    if (toolsMenu) {
        toolsMenu.classList.toggle('hidden');
    }
}

// Close menus when clicking outside
document.addEventListener('click', function(event) {
    const header = document.querySelector('header');
    if (header && !header.contains(event.target)) {
        const mobileMenu = document.getElementById('mobile-menu');
        const toolsMenu = document.getElementById('mobile-tools-menu');
        
        if (mobileMenu) mobileMenu.classList.add('hidden');
        if (toolsMenu) toolsMenu.classList.add('hidden');
    }
});

// Close mobile menu when screen is resized to desktop
window.addEventListener('resize', function() {
    if (window.innerWidth >= 768) {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            mobileMenu.classList.add('hidden');
        }
    }
});

// Expose functions to window scope for inline onclick handlers
window.toggleMobileMenu = toggleMobileMenu;
window.toggleToolsMenu = toggleToolsMenu;
