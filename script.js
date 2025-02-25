document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');

        // Allow external links like "profile.php" to work normally
        if (!targetId.startsWith("#")) return;

        e.preventDefault();
        const targetSection = document.getElementById(targetId.substring(1));
        if (targetSection) {
            window.scrollTo({
                top: targetSection.offsetTop - 60,
                behavior: 'smooth'
            });
        }
    });
});


// Navbar background change on scroll
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.style.background = '#1a252f';
    } else {
        header.style.background = '#2c3e50';
    }
});

// Hero text animation
document.addEventListener('DOMContentLoaded', function() {
    const heroText = document.querySelector('.hero h1');
    heroText.style.opacity = 0;
    heroText.style.transform = 'translateY(-20px)';
    setTimeout(() => {
        heroText.style.opacity = 1;
        heroText.style.transform = 'translateY(0)';
    }, 500);
});
