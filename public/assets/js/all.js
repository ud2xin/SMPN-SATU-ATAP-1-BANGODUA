// Toggle hamburger menu
hamburger.addEventListener('click', function() {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});

// **PERBAIKAN: Mobile Dropdown Toggle - Letakkan SEBELUM navLinks**
const dropdowns = document.querySelectorAll('.dropdown > a');

dropdowns.forEach(dropdown => {
    dropdown.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            e.preventDefault(); // Mencegah link dari navigasi di mobile
            e.stopPropagation(); // Mencegah event bubbling
            
            const parent = this.parentElement;
            parent.classList.toggle('active');
            
            // Close other dropdowns
            dropdowns.forEach(otherDropdown => {
                if (otherDropdown !== dropdown) {
                    otherDropdown.parentElement.classList.remove('active');
                }
            });
        }
    });
});

// Close menu when clicking on a link (TAPI TIDAK untuk dropdown parent)
const navLinks = document.querySelectorAll('.nav-menu a');
navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        // Jangan tutup menu jika yang diklik adalah dropdown parent di mobile
        if (window.innerWidth <= 768 && this.parentElement.classList.contains('dropdown')) {
            return; // Skip, biarkan dropdown toggle handler yang menangani
        }
        
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
    });
});

// Close menu when clicking outside
document.addEventListener('click', function(event) {
    const isClickInsideNav = navbar.contains(event.target);
    if (!isClickInsideNav && navMenu.classList.contains('active')) {
        hamburger.classList.remove('active');
        navMenu.classList.remove('active');
    }
});