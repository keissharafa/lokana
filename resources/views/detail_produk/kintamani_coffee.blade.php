<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kintamani Coffee - Lokana</title>

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

    .product-detail-page {
      padding: 112px 48px 72px;
      min-height: 100vh;
      background: var(--light-bg);
    }

    .detail-wrap {
      max-width: 1120px;
      margin: 0 auto;
    }

    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 28px;
      font-size: 0.82rem;
      color: var(--muted);
    }

    .breadcrumb a {
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }

    .breadcrumb a:hover {
      color: var(--purple);
    }

    .product-detail-card {
      display: grid;
      grid-template-columns: 1.05fr 0.95fr;
      gap: 42px;
      background: var(--white);
      border: 1px solid rgba(232, 227, 220, 0.85);
      border-radius: 24px;
      padding: 32px;
      box-shadow: 0 16px 50px rgba(0,0,0,0.045);
    }

    .product-gallery {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .main-product-img {
      width: 100%;
      aspect-ratio: 4 / 4.4;
      object-fit: cover;
      border-radius: 20px;
      display: block;
      background: #eee;
    }

    .thumbnail-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
    }

    .thumbnail-row img {
      width: 100%;
      aspect-ratio: 1 / 1;
      object-fit: cover;
      border-radius: 14px;
      border: 1px solid var(--border);
      background: #eee;
    }

    .product-detail-info {
      padding: 8px 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .product-category {
      display: inline-block;
      width: fit-content;
      font-size: 0.72rem;
      font-weight: 800;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--purple);
      margin-bottom: 14px;
    }

    .product-detail-info h1 {
      font-size: clamp(2rem, 4vw, 3.3rem);
      line-height: 1.1;
      font-weight: 800;
      letter-spacing: -0.05em;
      margin-bottom: 16px;
    }

    .product-subtitle {
      color: var(--muted);
      line-height: 1.75;
      font-size: 0.96rem;
      margin-bottom: 22px;
      max-width: 520px;
    }

    .rating-row {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      align-items: center;
      color: var(--muted);
      font-size: 0.86rem;
      margin-bottom: 24px;
    }

    .rating {
      color: var(--gold);
      font-weight: 800;
    }

    .price {
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--purple);
      margin-bottom: 24px;
    }

    .product-options {
      display: grid;
      gap: 18px;
      margin-bottom: 28px;
    }

    .option-group label {
      display: block;
      font-size: 0.82rem;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .option-pills {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .option-pill {
      padding: 10px 16px;
      border: 1px solid var(--border);
      border-radius: 999px;
      background: var(--white);
      color: var(--muted);
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
    }

    .option-pill.active {
      color: var(--purple);
      border-color: var(--purple);
      background: #f3f0ff;
    }

    .quantity-box {
      display: inline-flex;
      width: fit-content;
      align-items: center;
      gap: 16px;
      padding: 10px 16px;
      border: 1px solid var(--border);
      border-radius: 999px;
      background: var(--white);
    }

    .quantity-box button {
      border: none;
      background: transparent;
      font-size: 1.1rem;
      font-weight: 800;
      cursor: pointer;
      color: var(--purple);
    }

    .action-row {
      display: flex;
      gap: 14px;
      margin-bottom: 30px;
    }

    .btn-primary,
    .btn-outline {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 48px;
      padding: 0 24px;
      border-radius: 999px;
      font-size: 0.88rem;
      font-weight: 800;
      text-decoration: none;
      cursor: pointer;
      transition: background 0.25s, transform 0.2s, box-shadow 0.25s, border-color 0.2s;
    }

    .btn-primary {
      background: var(--purple);
      color: var(--white);
      border: 1px solid var(--purple);
      box-shadow: 0 10px 28px rgba(91,63,217,0.28);
    }

    .btn-primary:hover {
      background: var(--purple-dark);
      transform: translateY(-2px);
      box-shadow: 0 14px 34px rgba(91,63,217,0.36);
    }

    .btn-outline {
      background: var(--white);
      color: var(--purple);
      border: 1px solid rgba(91,63,217,0.35);
    }

    .btn-outline:hover {
      border-color: var(--purple);
      background: #f3f0ff;
      transform: translateY(-2px);
    }

    .info-list {
      display: grid;
      gap: 12px;
      padding-top: 24px;
      border-top: 1px solid var(--border);
    }

    .info-item {
      display: flex;
      justify-content: space-between;
      gap: 24px;
      font-size: 0.84rem;
      color: var(--muted);
    }

    .info-item strong {
      color: var(--text);
      font-weight: 700;
    }

    .story-section {
      max-width: 1120px;
      margin: 42px auto 0;
      display: grid;
      grid-template-columns: 0.8fr 1.2fr;
      gap: 28px;
    }

    .story-card,
    .shipping-card {
      background: var(--white);
      border: 1px solid rgba(232, 227, 220, 0.85);
      border-radius: 22px;
      padding: 30px;
    }

    .story-card span,
    .shipping-card span {
      display: inline-block;
      font-size: 0.72rem;
      font-weight: 800;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--purple);
      margin-bottom: 14px;
    }

    .story-card h2,
    .shipping-card h2 {
      font-size: 1.4rem;
      letter-spacing: -0.03em;
      margin-bottom: 14px;
    }

    .story-card p,
    .shipping-card p {
      color: var(--muted);
      line-height: 1.75;
      font-size: 0.9rem;
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

      .product-detail-page {
        padding: 96px 24px 56px;
      }

      .product-detail-card {
        grid-template-columns: 1fr;
        padding: 24px;
      }

      .story-section {
        grid-template-columns: 1fr;
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

      .product-detail-page {
        padding: 88px 20px 44px;
      }

      .product-detail-card {
        padding: 18px;
        border-radius: 20px;
      }

      .main-product-img {
        aspect-ratio: 1 / 1;
      }

      .product-detail-info h1 {
        font-size: 2rem;
      }

      .action-row {
        flex-direction: column;
      }

      .btn-primary,
      .btn-outline {
        width: 100%;
      }

      .story-card,
      .shipping-card {
        padding: 24px;
      }

      footer {
        padding: 36px 20px 24px;
      }
    }
  </style>
</head>

<body>

<nav>
  <a class="nav-brand" href="{{ route('home') }}">Lokana</a>

  <ul class="nav-links">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('produk') }}" class="active">Produk Lokal</a></li>
    <li><a href="{{ route('event') }}">Event &amp; Tiket</a></li>
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

<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('home') }}">Home</a>
  <a href="{{ route('produk') }}" class="active">Produk Lokal</a>
  <a href="{{ route('event') }}">Event &amp; Tiket</a>
  <a href="{{ route('artikel') }}">Artikel Lokal</a>

  <div class="mobile-menu-divider"></div>

  <a href="{{ route('keranjang') }}">Keranjang</a>
  <a href="#">Akun Saya</a>
</div>

<main class="product-detail-page">
  <div class="detail-wrap">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Home</a>
      <span>/</span>
      <a href="{{ route('produk') }}">Produk Lokal</a>
      <span>/</span>
      <span>Kintamani Coffee</span>
    </div>

    <section class="product-detail-card">
      <div class="product-gallery">
        <img 
          class="main-product-img"
          src="https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg"
          alt="Kintamani Coffee"
        >

        <div class="thumbnail-row">
          <img src="https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg" alt="Kopi Kintamani">
          <img src="https://i.pinimg.com/736x/69/10/66/691066ad1ad55d660660535fa2c28dc8.jpg" alt="Biji kopi Bali">
          <img src="https://i.pinimg.com/736x/6e/a0/52/6ea0529d947fb83e9ad1a2ec0b2b6d0e.jpg" alt="Manual brew coffee">
        </div>
      </div>

      <div class="product-detail-info">
        <span class="product-category">Kopi & Minuman</span>

        <h1>Kintamani Coffee</h1>

        <p class="product-subtitle">
          Kopi arabika dari dataran tinggi Kintamani dengan karakter rasa yang ringan, segar, dan nyaman diminum harian. Cocok buat manual brew, morning coffee, atau stok kopi di kos.
        </p>

        <div class="rating-row">
          <span class="rating">★ 4.9</span>
          <span>85 terjual</span>
          <span>Stok tersedia</span>
        </div>

        <div class="price" id="productPrice" data-price="65000">Rp 65.000</div>

        <div class="product-options">
          <div class="option-group">
            <label>Pilihan Grind Size</label>
            <div class="option-pills">
              <button class="option-pill active">Beans</button>
              <button class="option-pill">Medium Grind</button>
              <button class="option-pill">Fine Grind</button>
            </div>
          </div>

          <div class="option-group">
            <label>Jumlah</label>
            <div class="quantity-box">
              <button type="button" id="decreaseQty">−</button>
              <span id="quantityValue">1</span>
              <button type="button" id="increaseQty">+</button>
            </div>
          </div>
        </div>

        <div class="action-row">
          <a href="{{ route('keranjang') }}" class="btn-outline">Tambah ke Keranjang</a>
          <a href="{{ route('pembayaran') }}" class="btn-primary">Beli Sekarang</a>
        </div>

        <div class="info-list">
          <div class="info-item">
            <strong>Kategori</strong>
            <span>Kopi & Minuman</span>
          </div>
          <div class="info-item">
            <strong>Berat</strong>
            <span>200 gram</span>
          </div>
          <div class="info-item">
            <strong>Profil Rasa</strong>
            <span>Light, citrusy, clean aftertaste</span>
          </div>
          <div class="info-item">
            <strong>Asal Produk</strong>
            <span>Kintamani, Bali</span>
          </div>
        </div>
      </div>
    </section>

    <section class="story-section">
      <div class="story-card">
        <span>Cerita Produk</span>
        <h2>Kopi lokal yang enak buat rutinitas harian</h2>
        <p>
          Kintamani Coffee dipilih karena punya karakter rasa yang friendly untuk banyak orang. Nggak terlalu berat, aromanya clean, dan masih nyaman diminum tanpa banyak tambahan.
        </p>
      </div>

      <div class="shipping-card">
        <span>Catatan Belanja</span>
        <h2>Cocok untuk manual brew dan stok di rumah</h2>
        <p>
          Pilih beans kalau kamu punya grinder sendiri. Kalau mau lebih praktis, pilih medium grind untuk V60 atau fine grind untuk seduhan yang lebih halus.
        </p>
      </div>
    </section>
  </div>
</main>

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

  const productPrice = document.getElementById('productPrice');
  const quantityValue = document.getElementById('quantityValue');
  const decreaseQty = document.getElementById('decreaseQty');
  const increaseQty = document.getElementById('increaseQty');

  const basePrice = parseInt(productPrice.dataset.price);
  let quantity = 1;

  function formatRupiah(number) {
    return 'Rp ' + number.toLocaleString('id-ID');
  }

  function updatePrice() {
    const totalPrice = basePrice * quantity;
    quantityValue.textContent = quantity;
    productPrice.textContent = formatRupiah(totalPrice);
  }

  increaseQty.addEventListener('click', () => {
    quantity++;
    updatePrice();
  });

  decreaseQty.addEventListener('click', () => {
    if (quantity > 1) {
      quantity--;
      updatePrice();
    }
  });
</script>

</body>
</html>