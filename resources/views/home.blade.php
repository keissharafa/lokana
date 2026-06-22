<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lokana</title>
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
      background: var(--white);
      overflow-x: hidden;
    }

    /* ── NAV ── */
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
      backdrop-filter: blur(12px); /* navbar transparan tapi background belakangnya blur supaya teks readable */
      border-bottom: 1px solid rgba(0,0,0,0.06);
    }

    .nav-brand {
      font-family: 'Plus Jakarta Sans', sans-serif;
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
      letter-spacing: 0.01em;
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
      width: 20px; height: 20px;
      stroke: var(--text);
      fill: none;
      stroke-width: 1.7;
      cursor: pointer;
      transition: stroke 0.2s;
    }

    .nav-actions svg:hover { stroke: var(--purple); }

    /* hamburger button — hanya muncul di mobile */
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

    /* animasi 3 garis → X saat menu terbuka */
    .hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
    .hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    /* mobile drawer — tersembunyi secara default, muncul saat .open */
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

    /* ── HERO ── */
    .hero {
      position: relative;
      height: 100vh;
      min-height: 600px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      overflow: hidden;
    }

    .hero-bg {
      position: absolute;
      inset: 0;
      background: url('https://i.pinimg.com/1200x/48/7e/8a/487e8a7019ba7f896540017fbfe8cddc.jpg') center/cover no-repeat;
    }

    .hero-bg::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(
        to bottom,
        rgba(0,0,0,0.25) 0%, /* gradasi gelap di bagian atas untuk memastikan teks tetap terbaca meski latar belakangnya terang, lalu makin transparan ke bawah supaya foto tetap terlihat jelas */
        rgba(0,0,0,0.15) 40%,
        rgba(240,230,210,0.55) 100% /* gradasi warna hangat di bagian bawah untuk memberikan kesan ramah dan menguatkan nuansa lokal Bali, sekaligus membantu transisi visual ke bagian konten berikutnya yang memiliki background putih */
      );
    }

    .hero-content {
      position: relative;
      z-index: 1;
      max-width: 560px;
      padding: 0 24px;
    }

    .hero-content h1 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(2.4rem, 5vw, 3.6rem); /* ukuran font fleksibel mengikuti ukuran layar tanpa perlu banyak media query */
      font-weight: 800;
      color: var(--white);
      line-height: 1.1;
      text-shadow: 0 2px 24px rgba(0,0,0,0.3);
      margin-bottom: 16px;
    }

    .hero-content p {
      font-size: 1rem;
      color: rgba(255,255,255,0.88);
      line-height: 1.6;
      margin-bottom: 36px;
      text-shadow: 0 1px 8px rgba(0,0,0,0.2);
    }

    .btn-primary {
      display: inline-block;
      background: var(--purple);
      color: #fff;
      font-size: 0.9rem;
      font-weight: 600;
      padding: 14px 36px;
      border-radius: 50px;
      text-decoration: none;
      letter-spacing: 0.02em;
      transition: background 0.25s, transform 0.2s, box-shadow 0.25s;
      box-shadow: 0 8px 28px rgba(91,63,217,0.4);
    }

    .btn-primary:hover {
      background: var(--purple-dark);
      transform: translateY(-2px);
      box-shadow: 0 12px 36px rgba(91,63,217,0.5);
    }

    /* ── CATEGORY PILLS ── */
    .categories {
      padding: 32px 48px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      border-bottom: 1px solid var(--border);
    }

    .pill {
      display: inline-block;
      padding: 8px 20px;
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

    .pill:hover {
      border-color: var(--purple);
      color: var(--purple);
      background: #f3f0ff;
    }

    /* ── RECOMMENDED ── */
    .section-header {
      display: flex;
      align-items: baseline;
      justify-content: space-between;
      margin-bottom: 28px;
    }

    .section-header h2 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 1.6rem;
      font-weight: 700;
    }

    .view-all {
      font-size: 0.82rem;
      font-weight: 500;
      color: var(--purple);
      text-decoration: none;
    }

    .view-all:hover { text-decoration: underline; }

    .recommended {
      padding: 56px 48px;
      background: var(--white);
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
    }

    .product-card {
      border: 1px solid var(--border);
      border-radius: 16px;
      overflow: hidden;
      background: var(--white);
      transition: box-shadow 0.25s, transform 0.25s;
      cursor: pointer;
    }

    .product-card:hover {
      box-shadow: 0 12px 40px rgba(0,0,0,0.1);
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
      padding: 16px 18px 18px;
    }

    .product-info h3 {
      font-weight: 600;
      font-size: 0.97rem;
      margin-bottom: 5px;
    }

    .product-info p {
      font-size: 0.8rem;
      color: var(--muted);
      line-height: 1.4;
      margin-bottom: 14px;
    }

    .product-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .price {
      font-size: 1rem;
      font-weight: 700;
      color: var(--purple);
    }

    .add-btn {
      width: 30px; height: 30px;
      border-radius: 50%;
      background: var(--purple);
      color: #fff;
      border: none;
      font-size: 1.2rem;
      line-height: 1;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s, transform 0.2s;
    }

    .add-btn:hover {
      background: var(--purple-dark);
      transform: scale(1.1);
    }

    /* ── BANNER ── */
    .banner {
      position: relative;
      padding: 96px 48px;
      text-align: center;
      overflow: hidden;
    }

    .banner-bg {
      position: absolute;
      inset: 0;
      background: url('https://i.pinimg.com/736x/56/ea/f7/56eaf767668022765360582a2527f25c.jpg') center/cover no-repeat;
    }

    .banner-bg::after {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(20,12,8,0.72);
    }

    .banner-content {
      position: relative;
      z-index: 1;
      max-width: 560px;
      margin: 0 auto;
    }

    .banner-content h2 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: clamp(1.8rem, 3.5vw, 2.8rem);
      font-weight: 800;
      color: var(--white);
      line-height: 1.15;
      margin-bottom: 16px;
    }

    .banner-content p {
      font-size: 0.92rem;
      color: rgba(255,255,255,0.75);
      line-height: 1.7;
    }

    /* ── JURNAL ── */
    .jurnal {
      padding: 72px 48px;
      background: var(--light-bg);
    }

    .jurnal-header {
      text-align: center;
      margin-bottom: 48px;
    }

    .jurnal-header h2 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 1.7rem;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .jurnal-header p {
      font-size: 0.88rem;
      color: var(--muted);
      max-width: 400px;
      margin: 0 auto;
      line-height: 1.6;
    }

    .article-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr); /* card otomatis terbagi 3 kolom dengan lebar yang sama dan lebih gampang responsive */
      gap: 28px;
    }

    .article-card {
      background: var(--white);
      border-radius: 16px;
      overflow: hidden;
      transition: box-shadow 0.25s, transform 0.25s;
      cursor: pointer;
    }

    .article-card:hover {
      box-shadow: 0 12px 40px rgba(0,0,0,0.09);
      transform: translateY(-4px);
    }

    .article-img {
      width: 100%;
      aspect-ratio: 4/3;
      object-fit: cover;
      display: block;
      background: #ddd;
    }

    .article-body {
      padding: 20px;
    }

    .article-tag {
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.12em;
      color: var(--purple);
      text-transform: uppercase;
      margin-bottom: 8px;
    }

    .article-body h3 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 1.05rem;
      font-weight: 700;
      margin-bottom: 8px;
      line-height: 1.3;
    }

    .article-body p {
      font-size: 0.8rem;
      color: var(--muted);
      line-height: 1.55;
      margin-bottom: 16px;
    }

    .read-more {
      font-size: 0.78rem;
      font-weight: 700;
      color: var(--text);
      text-decoration: none;
      letter-spacing: 0.04em;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .read-more::after {
      content: '→';
      transition: transform 0.2s;
    }

    .read-more:hover::after { transform: translateX(4px); }

    /* ── FOOTER ── */
    footer {
      padding: 56px 48px 36px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 48px;
      border-top: 1px solid var(--border);
    }

    .footer-brand p {
      font-size: 0.82rem;
      color: var(--muted);
      margin-top: 10px;
      line-height: 1.6;
      max-width: 260px;
    }

    .footer-brand .brand-name {
      font-family: 'Plus Jakarta Sans', sans-serif;
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

    /* ── Placeholder images via gradient ── */
    .img-placeholder {
      background: linear-gradient(135deg, #e8e0d5 0%, #c8bfb0 100%);
    }

    /* ── RESPONSIVE TABLET (≤900px) ── */
    @media (max-width: 900px) {
      nav { padding: 0 24px; }

      /* sembunyikan nav links desktop, tampilkan hamburger */
      .nav-links { display: none; }
      .hamburger { display: flex; }
      .mobile-menu { display: flex; }

      .categories, .recommended, .jurnal, footer { padding-left: 24px; padding-right: 24px; }
      .banner { padding: 72px 24px; }
      .product-grid, .article-grid { grid-template-columns: 1fr 1fr; }
      footer { grid-template-columns: 1fr; }
      .footer-links { align-items: flex-start; }
    }

    /* ── RESPONSIVE MOBILE (≤580px) ── */
    @media (max-width: 580px) {
      nav { padding: 0 20px; }

      /* hero teks lebih kecil agar tidak overflow */
      .hero { min-height: 85vh; }
      .hero-content { padding: 0 20px; }
      .hero-content h1 { font-size: 1.9rem; line-height: 1.15; }
      .hero-content p { font-size: 0.88rem; margin-bottom: 28px; }
      .btn-primary { padding: 13px 28px; font-size: 0.87rem; }

      /* categories jadi single-row scrollable supaya tidak wrap ke bawah dan memakan ruang */
      .categories { flex-wrap: nowrap; overflow-x: auto; padding: 16px 20px; -webkit-overflow-scrolling: touch; scrollbar-width: none; }
      .categories::-webkit-scrollbar { display: none; }
      .pill { flex-shrink: 0; }

      .recommended { padding: 36px 20px; }
      .jurnal { padding: 40px 20px; }
      footer { padding: 36px 20px 24px; }

      /* product card jadi layout horizontal di mobile supaya lebih compact dan gambar tetap kelihatan */
      .product-grid { grid-template-columns: 1fr; gap: 14px; }
      .product-card { display: flex; flex-direction: row; }
      .product-img { width: 120px; min-width: 120px; aspect-ratio: 1/1; }
      .product-info { display: flex; flex-direction: column; justify-content: space-between; padding: 12px 14px; }

      /* article card juga horizontal di mobile, excerpt disembunyikan untuk menghemat ruang */
      .article-grid { grid-template-columns: 1fr; gap: 14px; }
      .article-card { display: flex; flex-direction: row; }
      .article-img { width: 110px; min-width: 110px; aspect-ratio: 1/1; }
      .article-body { padding: 12px 14px; }
      .article-body p { display: none; }

      .banner { padding: 60px 20px; }
    }
  </style>
</head>
<body>

<!-- NAV -->
<nav>
  <a class="nav-brand" href="#">Lokana</a>
  <ul class="nav-links">
  <li>
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
      Home
    </a>
  </li>

  <li>
    <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk') ? 'active' : '' }}">
      Produk Lokal
    </a>
  </li>

  <li>
    <a href="{{ route('event') }}" class="{{ request()->routeIs('event') ? 'active' : '' }}">
      Event &amp; Tiket
    </a>
  </li>

  <li>
    <a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel') || request()->routeIs('artikel.*') ? 'active' : '' }}">
      Artikel Lokal
    </a>
  </li>
</ul>

  <div class="nav-actions">
  <!-- Cart icon -->
  <a href="{{ route('keranjang') }}" aria-label="Keranjang">
    <svg viewBox="0 0 24 24">
      <circle cx="9" cy="21" r="1"/>
      <circle cx="20" cy="21" r="1"/>
      <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
    </svg>
  </a>

  <!-- User icon -->
  <a href="{{ route('login') }}" aria-label="Login">
    <svg viewBox="0 0 24 24">
      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
      <circle cx="12" cy="7" r="4"/>
    </svg>
  </a>
    <!-- Hamburger button — hanya tampil di mobile via CSS -->
    <button class="hamburger" id="hamburger" aria-label="Buka menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</nav>

<!-- MOBILE DRAWER — tersembunyi di desktop, slide down di mobile -->
<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
    Home
  </a>

  <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk') ? 'active' : '' }}">
    Produk Lokal
  </a>

  <a href="{{ route('event') }}" class="{{ request()->routeIs('event') ? 'active' : '' }}">
    Event &amp; Tiket
  </a>

  <a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel') || request()->routeIs('detail-artikel') ? 'active' : '' }}">
    Artikel Lokal
  </a>

  <div class="mobile-menu-divider"></div>

  <a href="{{ route('keranjang') }}">Keranjang</a>
<a href="{{ route('login') }}">Login / Akun Saya</a>
</div>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="hero-content">
    <h1>Produk Lokal Bali Kini Lebih Mudah Ditemukan</h1>
    <p>Merayakan karya, budaya, dan kreativitas lokal Bali dalam satu platform.</p>
    <a href="#" class="btn-primary">Mulai Belanja</a>
  </div>
</section>

<!-- CATEGORIES -->
<div class="categories">
  <a href="#" class="pill">Fashion &amp; Wastra</a>
  <a href="#" class="pill">Kuliner Lokal</a>
  <a href="#" class="pill">Kerajinan Handmade</a>
  <a href="#" class="pill">Dekorasi &amp; Home Living</a>
  <a href="#" class="pill">Event dan Tiket</a>
  <a href="#" class="pill">Cerita Budaya</a>
</div>

<!-- RECOMMENDED -->
<section class="recommended">
  <div class="section-header">
    <h2>Pilihan Untukmu</h2>
    <a href="#" class="view-all">Lihat Semua →</a>
  </div>
  <div class="product-grid">

    <div class="product-card">
      <img class="product-img" src="https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg" alt="Handmade Sarong Bali"/>
      <div class="product-info">
        <h3>Scarf Endek Bali Handmade</h3>
        <p>Dibuat dari kain Endek pilihan dengan motif yang clean minimalis, cocok melengkapi tampilan kasual maupun semi formal.</p>
        <div class="product-footer">
          <span class="price">Rp 250.000</span>
          <button class="add-btn">+</button>
        </div>
      </div>
    </div>

    <div class="product-card">
      <img class="product-img" src="https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg" alt="Pie Susu Dian"/>
      <div class="product-info">
        <h3>Kintamani Coffee</h3>
        <p>Kopi arabika dari dataran tinggi Bali dengan karakter rasa yang ringan, segar, dan cocok buat seduhan harian.</p>
        <div class="product-footer">
          <span class="price">Rp 65.000</span>
          <button class="add-btn">+</button>
        </div>
      </div>
    </div>

    <div class="product-card">
      <img class="product-img" src="https://i.pinimg.com/736x/a9/84/83/a9848382e0f00383dc3a020ddae17ca0.jpg" alt="Tas Anyaman"/>
      <div class="product-info">
        <h3>Essential Oil Bali</h3>
        <p>Aroma natural dengan karakter tropis yang ringan. Cocok untuk relaksasi, diffuser, atau pelengkap rutinitas harian.</p>
        <div class="product-footer">
          <span class="price">Rp 150.000</span>
          <button class="add-btn">+</button>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- BANNER -->
<section class="banner">
  <div class="banner-bg"></div>
  <div class="banner-content">
    <h2>Karya Lokal Bali Layak Dikenal Lebih Luas.</h2>
    <p>Kami ingin membantu UMKM dan pengrajin lokal Bali menjangkau lebih banyak konsumen tanpa kehilangan cerita dan identitas budayanya.</p>
  </div>
</section>

<!-- JURNAL -->
<section class="jurnal">
  <div class="jurnal-header">
    <h2>Jurnal Lokana</h2>
      <p>Budaya, rasa lokal, dan kisah di balik karya-karya yang membuat Bali selalu punya tempat di hati banyak orang.</p>
  </div>
  <div class="article-grid">

    <div class="article-card">
      <img class="article-img" src="https://i.pinimg.com/1200x/71/64/04/716404ae798ba8c4f8b98762a31b97ca.jpg" alt="Kain Endek"/>
      <div class="article-body">
        <div class="article-tag">Budaya</div>
        <h3>Endek Bali dalam Gaya Hidup Modern</h3>
        <p>Kain Endek tidak hanya hadir sebagai warisan budaya, tetapi juga berkembang menjadi bagian dari fashion, desain, dan produk lokal Bali hari ini...</p>
        <a href="#" class="read-more">Baca Selengkapnya</a>
      </div>
    </div>

    <div class="article-card">
      <img class="article-img" src="https://i.pinimg.com/1200x/fb/bd/51/fbbd512d4d47f937e8a40f877aff92e4.jpg" alt="Kegiatan Masyarakat"/>
      <div class="article-body">
        <div class="article-tag">UMKM dan Pengrajin</div>
        <h3>Di balik produk anyaman Bali</h3>
        <p>Dari pemilihan material hingga proses pengerjaan manual, produk anyaman Bali menunjukkan bagaimana detail kecil bisa membentuk nilai sebuah karya....</p>
        <a href="#" class="read-more">Baca Selengkapnya</a>
      </div>
    </div>

    <div class="article-card">
      <img class="article-img" src="https://i.pinimg.com/736x/0b/42/7b/0b427b1e0a03fbf8724ab701497a1729.jpg" alt="Kuliner Bali"/>
      <div class="article-body">
        <div class="article-tag">Kuliner</div>
        <h3>Rasa Lokal Bali dalam Satu Sajian</h3>
        <p>Dari sambal matah, sate lilit, sampai lawar khas Bali, setiap sajian membawa rasa yang dekat dengan rumah makan lokal dan dapur keluarga....</p>
        <a href="#" class="read-more">Baca Selengkapnya</a>
      </div>
    </div>

  </div>
</section>

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
    document.body.style.overflow = isOpen ? 'hidden' : ''; /* kunci scroll body saat drawer terbuka */
  });

  /* tutup drawer saat salah satu link diklik */
  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
      hamburger.classList.remove('open');
      document.body.style.overflow = '';
    });
  });

  /* tutup drawer saat klik di luar area menu */
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