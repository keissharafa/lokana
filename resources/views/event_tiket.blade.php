<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Event & Tiket - Lokana</title>

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
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 0.76rem;
      color: #8a8a8a;
      margin-bottom: 14px;
    }

    .product-meta svg {
      width: 14px;
      height: 14px;
      stroke: #8a8a8a;
      fill: none;
      stroke-width: 1.8;
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

    .price small {
      display: block;
      font-size: 0.68rem;
      font-weight: 600;
      color: #999;
      text-transform: uppercase;
      letter-spacing: 0.05em;
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
    <li><a href="{{ route('produk') }}">Produk Lokal</a></li>
    <li><a href="{{ route('event') }}" class="active">Event &amp; Tiket</a></li>
    <li><a href="{{ route('artikel') }}">Artikel Lokal</a></li>
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
  <a href="{{ route('produk') }}">Produk Lokal</a>
  <a href="{{ route('event') }}" class="active">Event &amp; Tiket</a>
  <a href="{{ route('artikel') }}">Artikel Lokal</a>

  <div class="mobile-menu-divider"></div>

  <a href="{{ route('keranjang') }}">Keranjang</a>
  <a href="#">Akun Saya</a>
</div>

<!-- EVENT & TIKET PAGE -->
<main class="catalog-page">
  <section class="catalog-header">
    <div class="catalog-title">
      <h1>Event & Tiket Bali</h1>
      <p>
        Jangan cuma bawa pulang produknya—datang juga ke acaranya. Temukan festival budaya, seni, kuliner, dan musik khas Bali, lalu amankan tiketmu langsung dari Lokana.
      </p>
    </div>

    <div class="search-box">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      <input type="text" placeholder="Cari event atau festival..." />
    </div>
  </section>

  <div class="categories">
    <a href="#" class="pill active">Semua Event</a>
    <a href="#" class="pill">Seni & Budaya</a>
    <a href="#" class="pill">Musik</a>
    <a href="#" class="pill">Kuliner</a>
    <a href="#" class="pill">Literasi</a>
  </div>

  <div class="catalog-toolbar">
    <h2>Event Mendatang</h2>

    <select class="sort-select">
      <option>Urutkan: Tanggal Terdekat</option>
      <option>Harga Terendah</option>
      <option>Harga Tertinggi</option>
      <option>Paling Banyak Dicari</option>
    </select>
  </div>

  <section class="product-grid">

    <div class="product-card" onclick="window.location.href='{{ route('event.tiket_a') }}'">
      <img class="product-img" src="https://i.pinimg.com/736x/fb/6b/54/fb6b54371c86c497c1d363cb4c9b495d.jpg" alt="Pesta Kesenian Bali"/>

      <div class="product-info">
        <span class="product-category">Seni & Budaya</span>
        <h3>Pesta Kesenian Bali</h3>
        <p>Festival seni dan budaya terbesar di Bali, menampilkan tari, gamelan, dan kerajinan dari seluruh penjuru pulau selama sebulan penuh.</p>
        <div class="product-meta">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          13 Jun – 11 Jul 2026 · Denpasar
        </div>

        <div class="product-footer">
          <span class="price"><small>Mulai dari</small>Rp 75.000</span>
          <button class="add-btn" type="button" onclick="event.stopPropagation()">+</button>
        </div>
      </div>
    </div>

    <div class="product-card" onclick="window.location.href='{{ route('event.tiket_b') }}'">
      <img class="product-img" src="https://i.pinimg.com/1200x/be/97/9f/be979f32037751d6582dc618e67235ae.jpg" alt="Bali Kite Festival"/>

      <div class="product-info">
        <span class="product-category">Seni & Budaya</span>
        <h3>Bali Kite Festival</h3>
        <p>Festival layang-layang raksasa khas Bali sebagai ungkapan syukur atas hasil panen, dipenuhi warna dan kreasi layang-layang tradisional.</p>
        <div class="product-meta">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          Jul 2026 · Denpasar
        </div>

        <div class="product-footer">
          <span class="price"><small>Mulai dari</small>Rp 50.000</span>
          <button class="add-btn" type="button" onclick="event.stopPropagation()">+</button>
        </div>
      </div>
    </div>

    <div class="product-card" onclick="window.location.href='{{ route('event.tiket_c') }}'">
      <img class="product-img" src="https://i.pinimg.com/736x/a9/ca/80/a9ca80790fc348a4168c9a90571cf8dc.jpg" alt="Ubud Food Festival"/>

      <div class="product-info">
        <span class="product-category">Kuliner</span>
        <h3>Ubud Food Festival</h3>
        <p>Perayaan kuliner Indonesia di jantung Ubud, menghadirkan chef, produsen lokal, demo masak, dan eksplorasi rasa nusantara.</p>
        <div class="product-meta">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          29–31 Mei 2026 · Ubud, Gianyar
        </div>

        <div class="product-footer">
          <span class="price"><small>Mulai dari</small>Rp 150.000</span>
          <button class="add-btn" type="button" onclick="event.stopPropagation()">+</button>
        </div>
      </div>
    </div>

    <div class="product-card" onclick="window.location.href='{{ route('event.tiket_d') }}'">
      <img class="product-img" src="https://i.pinimg.com/736x/b0/7e/a2/b07ea256bc19d4db235acd4717510c80.jpg" alt="Ubud Writers & Readers Festival"/>

      <div class="product-info">
        <span class="product-category">Literasi</span>
        <h3>Ubud Writers & Readers Festival</h3>
        <p>Pertemuan penulis, pembaca, dan pemikir dari seluruh dunia dalam diskusi panel, peluncuran buku, dan lokakarya kreatif selama empat hari.</p>
        <div class="product-meta">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          21–25 Okt 2026 · Ubud, Gianyar
        </div>

        <div class="product-footer">
          <span class="price"><small>Mulai dari</small>Rp 200.000</span>
          <button class="add-btn" type="button" onclick="event.stopPropagation()">+</button>
        </div>
      </div>
    </div>

    <div class="product-card" onclick="window.location.href='{{ route('event.tiket_e') }}'">
      <img class="product-img" src="https://i.pinimg.com/736x/33/6b/e1/336be162b0627138f1c0940414dd27c7.jpg" alt="Sanur Village Festival"/>

      <div class="product-info">
        <span class="product-category">Seni & Budaya</span>
        <h3>Sanur Village Festival</h3>
        <p>Festival tahunan pesisir Sanur yang memadukan pasar kreatif, pertunjukan musik, dan kegiatan komunitas di sepanjang pantai.</p>
        <div class="product-meta">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          Nov 2026 · Sanur, Denpasar
        </div>

        <div class="product-footer">
          <span class="price"><small>Mulai dari</small>Rp 60.000</span>
          <button class="add-btn" type="button" onclick="event.stopPropagation()">+</button>
        </div>
      </div>
    </div>

    <div class="product-card" onclick="window.location.href='{{ route('event.tiket_f') }}'">
      <img class="product-img" src="https://images.unsplash.com/photo-1470229538611-16ba8c7ffbd7?w=800&q=80" alt="Denpasar Festival"/>

      <div class="product-info">
        <span class="product-category">Musik</span>
        <h3>Denpasar Festival (Denfest)</h3>
        <p>Festival kota tahunan Denpasar dengan pasar kreatif, kuliner malam, dan deretan musisi lokal yang menutup tahun dengan meriah.</p>
        <div class="product-meta">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          Des 2026 · Denpasar
        </div>

        <div class="product-footer">
          <span class="price"><small>Mulai dari</small>Rp 65.000</span>
          <button class="add-btn" type="button" onclick="event.stopPropagation()">+</button>
        </div>
      </div>
    </div>

  </section>

  <section class="feature-banner">
    <div class="feature-banner-content">
      <span>Niche Lokana</span>
      <h2>Bukan cuma belanja oleh-oleh, tapi juga ikut merayakannya.</h2>
      <p>
        Bali punya ratusan event budaya, seni, dan kuliner sepanjang tahun. Lokana membantu kamu menemukan dan memesan tiketnya, supaya pengalaman lokal yang kamu bawa pulang lebih dari sekadar barang.
      </p>
    </div>

    <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=1200&q=80" alt="Festival budaya Bali">
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