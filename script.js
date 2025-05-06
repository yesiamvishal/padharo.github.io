// Smooth Scroll for Navigation Links
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        // e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        
        window.scrollTo({
            top: targetElement.offsetTop - 50,
            behavior: 'smooth'
        });
    });
});

// Form Validation with Visual Feedback
const loginForm = document.querySelector('form');
const usernameField = document.getElementById('username');
const passwordField = document.getElementById('password');

loginForm.addEventListener('submit', function(e) {
    e.preventDefault();

    let valid = true;

    if (usernameField.value === '') {
        usernameField.style.borderColor = '#ff6f61';
        valid = false;
    } else {
        usernameField.style.borderColor = '#ccc';
    }

    if (passwordField.value === '') {
        passwordField.style.borderColor = '#ff6f61';
        valid = false;
    } else {
        passwordField.style.borderColor = '#ccc';
    }

    if (valid) {
        alert('Login Successful!');
    } else {
        alert('Please fill in both fields.');
    }
});

// Scroll-based Animations
window.addEventListener('scroll', () => {
    const loginSection = document.getElementById('login');
    const scrollPosition = window.scrollY;

    // Adding a scale effect to the login section when the user scrolls down
    if (scrollPosition > 100) {
        loginSection.style.transform = 'scale(1)';
    } else {
        loginSection.style.transform = 'scale(0.95)';
    }
});

// Hover Animation for Sections
const sections = document.querySelectorAll('section');
sections.forEach(section => {
    section.addEventListener('mouseover', () => {
        section.style.transform = 'scale(1.05)';
        section.style.transition = 'transform 0.3s ease-in-out';
    });

    section.addEventListener('mouseout', () => {
        section.style.transform = 'scale(1)';
        section.style.transition = 'transform 0.3s ease-in-out';
    });
});
