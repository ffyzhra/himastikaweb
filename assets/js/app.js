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

/* ---------- V3: photos and motion ---------- */
(function () {
  'use strict';
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Hero slideshow (crossfade + Ken Burns from CSS)
  var slides = document.querySelectorAll('.hero-slides .slide');
  var dots = document.querySelectorAll('.hero-dots button');
  if (slides.length) {
    var cur = 0, timer;
    var show = function (i) {
      slides[cur].classList.remove('on'); if (dots[cur]) dots[cur].classList.remove('on');
      cur = (i + slides.length) % slides.length;
      slides[cur].classList.add('on'); if (dots[cur]) dots[cur].classList.add('on');
    };
    var start = function () { if (!reduce && slides.length > 1) timer = setInterval(function () { show(cur + 1); }, 6000); };
    dots.forEach(function (d, i) { d.addEventListener('click', function () { clearInterval(timer); show(i); start(); }); });
    start();
  }

  // Count-up numbers: <b class="count" data-to="22">0</b>
  var counters = document.querySelectorAll('.count[data-to]');
  var runCount = function (el) {
    var to = parseInt(el.getAttribute('data-to'), 10) || 0;
    if (reduce) { el.textContent = to; return; }
    var t0 = null, dur = 1400;
    var step = function (ts) {
      if (!t0) t0 = ts;
      var p = Math.min((ts - t0) / dur, 1);
      el.textContent = Math.round(to * (1 - Math.pow(1 - p, 3)));
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };
  if ('IntersectionObserver' in window) {
    var co = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { runCount(e.target); co.unobserve(e.target); } });
    }, { threshold: .5 });
    counters.forEach(function (c) { co.observe(c); });
  } else counters.forEach(runCount);

  // Scroll progress + back-to-top
  var bar = document.querySelector('.scroll-progress');
  var toTop = document.querySelector('.to-top');
  if (bar || toTop) {
    var onScroll = function () {
      var h = document.documentElement.scrollHeight - window.innerHeight;
      if (bar) bar.style.width = (h > 0 ? (window.scrollY / h) * 100 : 0) + '%';
      if (toTop) toTop.classList.toggle('show', window.scrollY > 600);
    };
    window.addEventListener('scroll', onScroll, { passive: true }); onScroll();
    if (toTop) toTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' }); });
  }

  // Lightbox for [data-lightbox] links (grouped by attribute value)
  var lb = document.getElementById('lightbox');
  if (lb) {
    var lbImg = lb.querySelector('img'), lbCap = lb.querySelector('.cap'), list = [], idx = 0;
    var open = function (items, i) { list = items; idx = i; render(); lb.classList.add('open'); document.body.style.overflow = 'hidden'; };
    var close = function () { lb.classList.remove('open'); document.body.style.overflow = ''; };
    var render = function () { var a = list[idx]; lbImg.hidden = false; lbImg.src = a.getAttribute('href'); lbImg.alt = a.getAttribute('data-caption') || ''; lbCap.textContent = a.getAttribute('data-caption') || ''; };
    var move = function (d) { idx = (idx + d + list.length) % list.length; render(); };
    document.addEventListener('click', function (e) {
      var a = e.target.closest('[data-lightbox]');
      if (!a) return;
      e.preventDefault();
      var group = a.getAttribute('data-lightbox');
      var items = Array.prototype.filter.call(document.querySelectorAll('[data-lightbox="' + group + '"]'), function (x) { return !x.classList.contains('hide'); });
      open(items, items.indexOf(a));
    });
    lb.querySelector('.lb-close').addEventListener('click', close);
    lb.querySelector('.lb-prev').addEventListener('click', function () { move(-1); });
    lb.querySelector('.lb-next').addEventListener('click', function () { move(1); });
    lb.addEventListener('click', function (e) { if (e.target === lb) close(); });
    document.addEventListener('keydown', function (e) {
      if (!lb.classList.contains('open')) return;
      if (e.key === 'Escape') close(); if (e.key === 'ArrowLeft') move(-1); if (e.key === 'ArrowRight') move(1);
    });
  }

  // Gallery filters: <button data-filter="proker">, items with data-cat
  document.querySelectorAll('.filters').forEach(function (wrap) {
    wrap.addEventListener('click', function (e) {
      var b = e.target.closest('button'); if (!b) return;
      wrap.querySelectorAll('button').forEach(function (x) { x.classList.toggle('on', x === b); });
      var f = b.getAttribute('data-filter');
      document.querySelectorAll('.gitem[data-cat]').forEach(function (it) {
        it.classList.toggle('hide', f !== 'all' && it.getAttribute('data-cat').split(' ').indexOf(f) === -1);
      });
    });
  });

  // Admin: preview a chosen photo inside .foto-field
  document.querySelectorAll('.foto-field input[type=file]').forEach(function (input) {
    input.addEventListener('change', function () {
      var f = input.files && input.files[0]; if (!f) return;
      var box = input.closest('.foto-field').querySelector('.preview');
      var img = document.createElement('img'); img.className = box.className; img.alt = 'Pratinjau foto';
      img.src = URL.createObjectURL(f); box.replaceWith(img);
    });
  });
})();
