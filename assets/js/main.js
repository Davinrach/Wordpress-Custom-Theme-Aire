/**
 * Main JavaScript for Airemodern theme
 * Built with Vanilla JS
 */

document.addEventListener('DOMContentLoaded', () => {
    console.log('Airemodern theme loaded!');
    
    // Navbar Scroll Effect
    const header = document.getElementById('masthead');
    
    const handleScroll = () => {
        if (window.scrollY > 50) {
            header.classList.add('header-scrolled');
        } else {
            header.classList.remove('header-scrolled');
        }
    };

    window.addEventListener('scroll', handleScroll);
    // Initial check in case page is refreshed while scrolled
    handleScroll();
});
