// Basic interactive behavior: mobile menu toggle + simple form handling
document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.getElementById('menu-toggle');
  const mainNav = document.getElementById('main-nav');
  const yearEl = document.getElementById('year');
  const form = document.getElementById('contact-form');
  const formMsg = document.getElementById('form-msg');

  // set year in footer
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  // mobile menu toggle
  if (menuToggle) {
    menuToggle.addEventListener('click', function () {
      const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', String(!expanded));
      mainNav.style.display = expanded ? 'none' : 'block';
    });
  }

  // basic form validation + fake submit
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      formMsg.textContent = '';

      const name = form.name.value.trim();
      const phone = form.phone.value.trim();
      const email = form.email.value.trim();
      const city = form.city.value.trim();

      if (!name || !phone || !email || !city) {
        formMsg.style.color = 'crimson';
        formMsg.textContent = 'Please fill all required fields.';
        return;
      }

      // minimal phone validation
      if (!/^\+?\d{7,14}$/.test(phone)) {
        formMsg.style.color = 'crimson';
        formMsg.textContent = 'Please enter a valid phone number.';
        return;
      }

      // fake submit: in a real site you'd POST to your backend
      formMsg.style.color = 'green';
      formMsg.textContent = 'Application submitted. Our team will contact you shortly.';
      form.reset();
    });
  }

  // Close mobile nav when clicking a link
  const navLinks = mainNav ? mainNav.querySelectorAll('a') : [];
  navLinks.forEach(function (a) {
    a.addEventListener('click', function () {
      if (window.innerWidth <= 680 && mainNav) {
        mainNav.style.display = 'none';
        if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
      }
    });
  });
});

document.getElementById("call").addEventListener("click", function() {
    window.location.href = "tel:+919876543210"; 
});
