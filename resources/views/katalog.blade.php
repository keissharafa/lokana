<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Produk Lokal - Lokana</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>"/>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --purple: #5B3FD9;
      --purple-dark: #4730B3;
      --gold: #C8963C;
      --text: #1a1a1a;
      --muted: #666;
      --light-bg: #f9f7f4;
      --white: #fff;
      --border: #e8e3dc;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: var(--text);
      background: var(--light-bg);
      overflow-x: hidden;
    }

    nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 200;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 48px;
      height: 64px;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(0,0,0,0.06);
    }

    .nav-brand {
      font-size: 1.15rem;
      font-weight: 700;
      color: var(--text);
      text-decoration: none;
      letter-spacing: -0.02em;
      z-index: 201;
    }

    .nav-links {
      display: flex;
      gap: 36px;
      list-style: none;
    }

    .nav-links a {
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }

    .nav-links a:hover,
    .nav-links a.active {
      color: var(--purple);
    }

    .nav-actions {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .nav-actions svg {
      width: 20px;
      height: 20px;
      stroke: var(--text);
      fill: none;
      stroke-width: 1.7;
      cursor: pointer;
      transition: stroke 0.2s;
    }

    .nav-actions svg:hover { stroke: var(--purple); }

    .hamburger {
      display: none;
      flex-direction: column;
      justify-content: center;
      gap: 5px;
      width: 36px;
      height: 36px;
      cursor: pointer;
      background: none;
      border: none;
      padding: 4px;
      z-index: 201;
    }

    .hamburger span {
      display: block;
      height: 2px;
      border-radius: 2px;
      background: var(--text);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      transform-origin: center;
    }

    .hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
    .hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    .mobile-menu {
      display: none;
      position: fixed;
      top: 64px; left: 0; right: 0;
      background: var(--white);
      border-bottom: 1px solid var(--border);
      z-index: 199;
      flex-direction: column;
      padding: 8px 0 24px;
      box-shadow: 0 12px 40px rgba(0,0,0,0.08);
      transform: translateY(-8px);
      opacity: 0;
      pointer-events: none;
      transition: transform 0.25s cubic-bezier(0.4,0,0.2,1), opacity 0.25s;
    }

    .mobile-menu.open {
      transform: translateY(0);
      opacity: 1;
      pointer-events: all;
    }

    .mobile-menu a {
      display: block;
      padding: 14px 28px;
      font-size: 0.95rem;
      font-weight: 500;
      color: var(--text);
      text-decoration: none;
      border-left: 3px solid transparent;
      transition: all 0.15s;
    }

    .mobile-menu a:hover,
    .mobile-menu a.active {
      color: var(--purple);
      border-left-color: var(--purple);
      background: #f5f3ff;
    }

    .mobile-menu-divider {
      height: 1px;
      background: var(--border);
      margin: 8px 28px;
    }

    .catalog-page {
      padding: 128px 48px 72px;
      min-height: 100vh;
      background: var(--light-bg);
    }

    .catalog-header {
      max-width: 1120px;
      margin: 0 auto 34px;
      display: flex;
      justify-content: space-between;
      gap: 32px;
      align-items: flex-end;
    }

    .catalog-title h1 {
      font-size: clamp(2rem, 4vw, 3.2rem);
      font-weight: 800;
      letter-spacing: -0.04em;
      margin-bottom: 12px;
    }

    .catalog-title p {
      max-width: 560px;
      color: var(--muted);
      font-size: 0.95rem;
      line-height: 1.7;
    }

    .search-box {
      width: 320px;
      min-width: 280px;
      height: 46px;
      border: 1px solid var(--border);
      border-radius: 999px;
      background: var(--white);
      display: flex;
      align-items: center;
      padding: 0 18px;
      gap: 10px;
    }

    .search-box svg {
      width: 18px;
      height: 18px;
      stroke: var(--muted);
      fill: none;
      stroke-width: 1.8;
    }

    .search-box input {
      width: 100%;
      border: none;
      outline: none;
      font-family: inherit;
      font-size: 0.86rem;
      color: var(--text);
      background: transparent;
    }

    .search-box input::placeholder {
      color: #aaa;
    }

    .categories {
      max-width: 1120px;
      margin: 0 auto 38px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .pill {
      display: inline-block;
      padding: 9px 20px;
      border: 1px solid var(--border);
      border-radius: 50px;
      font-size: 0.82rem;
      font-weight: 500;
      color: var(--muted);
      cursor: pointer;
      text-decoration: none;
      transition: all 0.2s;
      background: var(--white);
    }

    .pill:hover,
    .pill.active {
      border-color: var(--purple);
      color: var(--purple);
      background: #f3f0ff;
    }

    .catalog-toolbar {
      max-width: 1120px;
      margin: 0 auto 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
    }

    .catalog-toolbar h2 {
      font-size: 1.25rem;
      font-weight: 800;
      letter-spacing: -0.02em;
    }

    .sort-select {
      border: 1px solid var(--border);
      border-radius: 999px;
      background: var(--white);
      padding: 10px 16px;
      font-family: inherit;
      font-size: 0.82rem;
      color: var(--muted);
      outline: none;
    }

    .product-grid {
      max-width: 1120px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
    }

    .product-card {
      border: 1px solid rgba(232, 227, 220, 0.85);
      border-radius: 18px;
      overflow: hidden;
      background: var(--white);
      transition: box-shadow 0.25s, transform 0.25s;
      cursor: pointer;
    }

    .product-card:hover {
      box-shadow: 0 12px 40px rgba(0,0,0,0.09);
      transform: translateY(-4px);
    }

    .product-img {
      width: 100%;
      aspect-ratio: 4/3;
      object-fit: cover;
      display: block;
      background: #eee;
    }

    .product-info {
      padding: 18px 20px 20px;
    }

    .product-category {
      display: inline-block;
      font-size: 0.68rem;
      font-weight: 800;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--purple);
      margin-bottom: 9px;
    }

    .product-info h3 {
      font-weight: 700;
      font-size: 1rem;
      margin-bottom: 7px;
      letter-spacing: -0.01em;
    }

    .product-info p {
      font-size: 0.82rem;
      color: var(--muted);
      line-height: 1.55;
      margin-bottom: 18px;
    }

    .product-meta {
      font-size: 0.76rem;
      color: #8a8a8a;
      margin-bottom: 14px;
    }

    .product-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .price {
      font-size: 1rem;
      font-weight: 800;
      color: var(--purple);
    }

    .add-btn {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: var(--purple);
      color: #fff;
      border: none;
      font-size: 1.25rem;
      line-height: 1;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s, transform 0.2s, box-shadow 0.25s;
      box-shadow: 0 8px 24px rgba(91,63,217,0.25);
    }

    .add-btn:hover {
      background: var(--purple-dark);
      transform: scale(1.08);
    }

    .feature-banner {
      max-width: 1120px;
      margin: 56px auto 0;
      border-radius: 24px;
      overflow: hidden;
      background: var(--white);
      display: grid;
      grid-template-columns: 1fr 1fr;
      border: 1px solid rgba(232, 227, 220, 0.85);
    }

    .feature-banner-content {
      padding: 48px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .feature-banner-content span {
      font-size: 0.72rem;
      font-weight: 800;
      color: var(--purple);
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 14px;
    }

    .feature-banner-content h2 {
      font-size: clamp(1.8rem, 4vw, 2.7rem);
      line-height: 1.15;
      letter-spacing: -0.04em;
      margin-bottom: 16px;
    }

    .feature-banner-content p {
      color: var(--muted);
      font-size: 0.92rem;
      line-height: 1.75;
    }

    .feature-banner img {
      width: 100%;
      height: 100%;
      min-height: 360px;
      object-fit: cover;
      display: block;
    }

    footer {
      padding: 56px 48px 36px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 48px;
      border-top: 1px solid var(--border);
      background: var(--white);
    }

    .footer-brand p {
      font-size: 0.82rem;
      color: var(--muted);
      margin-top: 10px;
      line-height: 1.6;
      max-width: 260px;
    }

    .footer-brand .brand-name {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--purple);
    }

    .footer-links {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 10px;
    }

    .footer-links a {
      font-size: 0.82rem;
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }

    .footer-links a:hover { color: var(--purple); }

    .footer-bottom {
      grid-column: 1 / -1;
      border-top: 1px solid var(--border);
      padding-top: 24px;
      font-size: 0.75rem;
      color: #aaa;
      text-align: center;
    }

    @media (max-width: 900px) {
      nav { padding: 0 24px; }

      .nav-links { display: none; }
      .hamburger { display: flex; }
      .mobile-menu { display: flex; }

      .catalog-page {
        padding: 112px 24px 56px;
      }

      .catalog-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .search-box {
        width: 100%;
      }

      .product-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .feature-banner {
        grid-template-columns: 1fr;
      }

      .feature-banner img {
        min-height: 260px;
      }

      footer {
        grid-template-columns: 1fr;
        padding-left: 24px;
        padding-right: 24px;
      }

      .footer-links { align-items: flex-start; }
    }

    @media (max-width: 580px) {
      nav { padding: 0 20px; }

      .catalog-page {
        padding: 96px 20px 44px;
      }

      .catalog-header {
        margin-bottom: 28px;
      }

      .catalog-title h1 {
        font-size: 2rem;
      }

      .categories {
        flex-wrap: nowrap;
        overflow-x: auto;
        margin-bottom: 28px;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
      }

      .categories::-webkit-scrollbar { display: none; }

      .pill {
        flex-shrink: 0;
      }

      .catalog-toolbar {
        align-items: flex-start;
        flex-direction: column;
      }

      .product-grid {
        grid-template-columns: 1fr;
        gap: 14px;
      }

      .product-card {
        display: flex;
        flex-direction: row;
      }

      .product-img {
        width: 120px;
        min-width: 120px;
        aspect-ratio: 1/1;
      }

      .product-info {
        padding: 12px 14px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      .product-info p,
      .product-meta,
      .product-category {
        display: none;
      }

      .feature-banner-content {
        padding: 28px;
      }

      .feature-banner img {
        min-height: 220px;
      }

      footer {
        padding: 36px 20px 24px;
      }
    }
  </style>
</head>

<body>

<!-- NAV -->
<nav>
  <a class="nav-brand" href="{{ route('home') }}">Lokana</a>

  <ul class="nav-links">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('produk') }}" class="active">Produk Lokal</a></li>
    <li><a href="{{ route('event') }}">Event &amp; Tiket</a></li>
    <li><a href="{{ route('artikel') }}">Artikel Lokal</a></li>
    <li><a href="{{ route('history') }}">History</a></li>
  </ul>

  <div class="nav-actions">
    <a href="{{ route('keranjang') }}" aria-label="Keranjang">
      <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
    </a>

    <a href="#" aria-label="Akun">
      <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
    </a>

    <button class="hamburger" id="hamburger" aria-label="Buka menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</nav>

<!-- MOBILE DRAWER -->
<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('home') }}">Home</a>
  <a href="{{ route('produk') }}" class="active">Produk Lokal</a>
  <a href="{{ route('event') }}">Event &amp; Tiket</a>
  <a href="{{ route('artikel') }}">Artikel Lokal</a>
  <a href="{{ route('history') }}">History</a>
  <div class="mobile-menu-divider"></div>

  <a href="{{ route('keranjang') }}">Keranjang</a>
  <a href="{{ route('login') }}">Akun Saya</a>
</div>

<!-- PRODUK PAGE -->
<main class="catalog-page">
  <section class="catalog-header">
    <div class="catalog-title">
      <h1>Produk Lokal Pilihan</h1>
      <p>
        Kurasi produk Bali dari UMKM, pengrajin, dan brand lokal yang punya karakter jelas—mulai dari kain, kopi, self-care, sampai oleh-oleh harian.
      </p>
    </div>

    <div class="search-box">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      <input type="text" placeholder="Cari produk lokal..." />
    </div>
  </section>

  <div class="categories">
    <a href="#" class="pill active">Semua Produk</a>
    <a href="#" class="pill">Fashion Lokal</a>
    <a href="#" class="pill">Kopi & Minuman</a>
    <a href="#" class="pill">Self-care</a>
    <a href="#" class="pill">Oleh-Oleh</a>
    <a href="#" class="pill">Kerajinan Handmade</a>
  </div>

  <div class="catalog-toolbar">
    <h2>Semua Produk</h2>

    <select class="sort-select">
      <option>Urutkan: Terbaru</option>
      <option>Harga Terendah</option>
      <option>Harga Tertinggi</option>
      <option>Paling Banyak Dicari</option>
    </select>
  </div>

  <section class="product-grid">

    <!-- Produk dari Home Page -->
    <div class="product-card" onclick="window.location.href='{{ route('produk.scarf_endek') }}'">
      <img class="product-img" src="https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg" alt="Scarf Endek Bali Handmade"/>

      <div class="product-info">
        <span class="product-category">Fashion Lokal</span>
        <h3>Scarf Endek Bali Handmade</h3>
        <p>Dibuat dari kain Endek pilihan dengan motif clean minimalis, cocok melengkapi tampilan kasual maupun semi-formal.</p>
        <div class="product-meta">★ 4.8 · 120 terjual</div>

        <div class="product-footer">
          <span class="price">Rp 250.000</span>
          <button class="add-btn" type="button" onclick="event.stopPropagation()">+</button>
        </div>
      </div>
    </div>

    <div class="product-card" onclick="window.location.href='{{ route('produk.kintamani_coffee') }}'">
      <img class="product-img" src="https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg" alt="Kintamani Coffee"/>

      <div class="product-info">
        <span class="product-category">Kopi & Minuman</span>
        <h3>Kintamani Coffee</h3>
        <p>Kopi arabika dari dataran tinggi Bali dengan karakter rasa yang ringan, segar, dan cocok buat seduhan harian.</p>
        <div class="product-meta">★ 4.9 · 85 terjual</div>

        <div class="product-footer">
          <span class="price">Rp 65.000</span>
          <button class="add-btn" type="button" onclick="event.stopPropagation()">+</button>
        </div>
      </div>
    </div>

    <div class="product-card">
      <img class="product-img" src="https://i.pinimg.com/736x/a9/84/83/a9848382e0f00383dc3a020ddae17ca0.jpg" alt="Essential Oil Bali"/>

      <div class="product-info">
        <span class="product-category">Self-care</span>
        <h3>Essential Oil Bali</h3>
        <p>Aroma natural dengan karakter tropis yang ringan. Cocok untuk relaksasi, diffuser, atau pelengkap rutinitas harian.</p>
        <div class="product-meta">★ 4.7 · 73 terjual</div>

        <div class="product-footer">
          <span class="price">Rp 150.000</span>
          <button class="add-btn">+</button>
        </div>
      </div>
    </div>

    <!-- Produk tambahan -->
    <div class="product-card">
      <img class="product-img" src="https://i.pinimg.com/736x/e2/09/38/e20938d213c820fd70d01cc121501ccb.jpg" alt="Beach Jewelry"/>

      <div class="product-info">
        <span class="product-category">Fashion Lokal</span>
        <h3>Beach Jewelry</h3>
        <p>Aksesori bernuansa pantai dengan detail simpel yang mudah dipakai harian. Ringan, manis, dan cocok buat nambah sentuhan summer look.</p>
        <div class="product-meta">★ 4.8 · 210 terjual</div>

        <div class="product-footer">
          <span class="price">Rp 115.000</span>
          <button class="add-btn">+</button>
        </div>
      </div>
    </div>

    <div class="product-card">
      <img class="product-img" src="https://i.pinimg.com/736x/50/fd/aa/50fdaa7ad7ae0c1b77979bbaa76b3604.jpg" alt="Kayu Bowls"/>

      <div class="product-info">
        <span class="product-category">Oleh-Oleh</span>
        <h3>Kayu Bowls</h3>
        <p>Mangkuk kayu handmade dengan finishing natural. Cocok untuk plating buah, snack, atau dekor meja dengan tone lebih warm.</p>
        <div class="product-meta">★ 4.7 · 160 terjual</div>

        <div class="product-footer">
          <span class="price">Rp 62.000</span>
          <button class="add-btn">+</button>
        </div>
      </div>
    </div>

    <div class="product-card">
      <img class="product-img" src="https://i.pinimg.com/736x/8b/f0/71/8bf07143983397c98a31f74da77f1b53.jpg" alt="Beaded Basket"/>

      <div class="product-info">
        <span class="product-category">Kerajinan Handmade</span>
        <h3>Beaded Basket</h3>
        <p>Keranjang handmade dengan detail manik yang playful dan rapi. Bisa jadi statement piece buat outfit santai atau liburan.</p>
        <div class="product-meta">★ 4.9 · 92 terjual</div>

        <div class="product-footer">
          <span class="price">Rp 50.000</span>
          <button class="add-btn">+</button>
        </div>
      </div>
    </div>

  </section>

  <section class="feature-banner">
    <div class="feature-banner-content">
      <span>Kurasi Lokana</span>
      <h2>Produk lokal yang gampang ditemukan, tanpa kehilangan karakternya.</h2>
      <p>
        Lokana mengangkat produk Bali yang punya fungsi jelas, tampilan rapi, dan cerita produksi yang layak diketahui pembeli. Bukan cuma cantik dilihat, tapi juga relevan dipakai.
      </p>
    </div>

    <img src="https://i.pinimg.com/1200x/fb/bd/51/fbbd512d4d47f937e8a40f877aff92e4.jpg" alt="Pengrajin lokal Bali">
  </section>
</main>

<!-- FOOTER -->
<footer>
  <div class="footer-brand">
    <div class="brand-name">Lokana</div>
    <p>Marketplace produk lokal Bali — dari tangan pengrajin langsung ke tanganmu.</p>
  </div>

  <div class="footer-links">
    <a href="#">Tentang Kami</a>
    <a href="#">Kebijakan Privasi</a>
    <a href="#">Kontak</a>
    <a href="#">Info Pengiriman</a>
  </div>

  <div class="footer-bottom">
    © 2026 Lokana
  </div>
</footer>

<script>
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');

  hamburger.addEventListener('click', () => {
    const isOpen = mobileMenu.classList.toggle('open');
    hamburger.classList.toggle('open', isOpen);
    hamburger.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
    document.body.style.overflow = isOpen ? 'hidden' : '';
  });

  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
      hamburger.classList.remove('open');
      document.body.style.overflow = '';
    });
  });

  document.addEventListener('click', (e) => {
    if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
      mobileMenu.classList.remove('open');
      hamburger.classList.remove('open');
      document.body.style.overflow = '';
    }
  });
</script>

</body>
</html>