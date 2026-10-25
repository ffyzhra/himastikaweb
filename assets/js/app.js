/* HIMASTIKA UEU — small UI behaviours, no dependencies. */
(function () {
  'use strict';

  // Admin sidebar on small screens
  var sidebar = document.getElementById('sidebar');
  var backdrop = document.getElementById('backdrop');
  var menuBtn = document.getElementById('menuBtn');
  function setSidebar(open) {
    if (!sidebar) return;
    sidebar.classList.toggle('open', open);
    backdrop.classList.toggle('show', open);
  }
  if (menuBtn) menuBtn.addEventListener('click', function () { setSidebar(!sidebar.classList.contains('open')); });
  if (backdrop) backdrop.addEventListener('click', function () { setSidebar(false); });

  // Confirm before destructive links: <a data-confirm="Hapus data ini?">
  document.addEventListener('click', function (e) {
    var el = e.target.closest('[data-confirm]');
    if (el && !window.confirm(el.getAttribute('data-confirm'))) e.preventDefault();
  });

  // Programme status switch (Program Kerja) — saves via AJAX
  document.querySelectorAll('[data-proker-status]').forEach(function (input) {
    input.addEventListener('change', function () {
      var row = input.closest('tr');
      var label = input.parentNode.querySelector('.switch-text');
      var done = input.checked;
      if (row) row.classList.toggle('done-row', done);
      if (label) label.textContent = done ? 'Selesai' : 'Berjalan';
      fetch(window.BASE_URL + 'proker/update_status/' + input.getAttribute('data-proker-status'), {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
        body: 'status=' + (done ? 1 : 0)
      }).catch(function () {
        input.checked = !done;
        if (row) row.classList.toggle('done-row', !done);
        if (label) label.textContent = !done ? 'Selesai' : 'Berjalan';
        alert('Gagal menyimpan status. Coba lagi.');
      });
    });
  });

  // Show the chosen file name inside a .file-drop
  document.querySelectorAll('.file-drop input[type=file]').forEach(function (input) {
    input.addEventListener('change', function () {
      var name = input.files.length ? input.files[0].name : '';
      var target = input.closest('.file-drop').querySelector('span');
      if (name && target) target.textContent = name;
    });
  });

  // Show / hide password
  document.querySelectorAll('.toggle-pw').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var input = btn.parentNode.querySelector('input');
      var show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      btn.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
    });
  });

  // Public site: navbar background on scroll + mobile menu
  var pubNav = document.getElementById('pubNav');
  if (pubNav) {
    var solid = pubNav.hasAttribute('data-solid');
    var onScroll = function () { pubNav.classList.toggle('scrolled', solid || window.scrollY > 30); };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    var toggle = document.getElementById('pubMenu');
    var links = document.getElementById('pubLinks');
    if (toggle) toggle.addEventListener('click', function () {
      var open = !links.classList.contains('open');
      links.classList.toggle('open', open);
      pubNav.classList.toggle('menu-open', open);
      toggle.setAttribute('aria-expanded', open);
    });
    if (links) links.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () { links.classList.remove('open'); pubNav.classList.remove('menu-open'); });
    });
  }

  // Reveal sections on scroll
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); } });
    }, { threshold: 0.12 });
    document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });
  } else {
    document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('in'); });
  }
})();
