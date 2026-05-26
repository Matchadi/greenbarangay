// ── Scroll-triggered fade-up animations ──
const observer = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) e.target.classList.add('visible');
  });
}, { threshold: 0.12 });
document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

// ── Bootstrap .needs-validation form handler ──
// Uses checkValidity() as required by the rubric.
// On a local PHP server, the form submits to contact.php via POST.
// On GitHub Pages (static), it shows the in-page success message instead.
(function () {
  'use strict';

  const form = document.getElementById('contactForm');

  form.addEventListener('submit', function (event) {
    // Always prevent default first so we can run checkValidity()
    event.preventDefault();
    event.stopPropagation();

    // Add .was-validated so Bootstrap shows red/green feedback on all fields
    form.classList.add('was-validated');

    // Only proceed if ALL fields pass HTML5 constraint validation
    if (form.checkValidity()) {
      // Detect whether we are on a PHP-capable local server or static GitHub Pages
      const isLocalServer = (
        window.location.hostname === 'localhost' ||
        window.location.hostname === '127.0.0.1'
      );

      if (isLocalServer) {
        // Submit the form normally to contact.php
        form.submit();
      } else {
        // GitHub Pages: show the in-page success message
        document.getElementById('formArea').style.display = 'none';
        document.getElementById('successMsg').style.display = 'block';
      }
    }
  });
})();

// ── Reset form state when modal is closed ──
document.getElementById('volunteerModal').addEventListener('hidden.bs.modal', function () {
  const form = document.getElementById('contactForm');
  form.reset();
  form.classList.remove('was-validated');
  document.getElementById('formArea').style.display = 'block';
  document.getElementById('successMsg').style.display = 'none';
});
