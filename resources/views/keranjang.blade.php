<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja - Lokana</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>"/>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      /* Palet Warna Asli Lokana */
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
      background: var(--light-bg);
      color: var(--text);
      overflow-x: hidden;
    }

    /* ── NAV & MOBILE MENU (SINKRON DENGAN HALAMAN DETAIL) ── */
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

    .nav-brand-wrapper {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      z-index: 201;
    }

    .nav-brand-logo {
      width: 28px;
      height: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .nav-brand-logo svg {
      width: 100%;
      height: 100%;
    }

    .nav-brand {
      font-size: 1.15rem;
      font-weight: 700;
      color: var(--text);
      text-decoration: none;
      letter-spacing: -0.02em;
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
    .nav-links a.active { color: var(--purple); }

    .nav-actions {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .nav-actions a svg {
      width: 20px;
      height: 20px;
      stroke: var(--text);
      fill: none;
      stroke-width: 1.7;
      cursor: pointer;
      transition: stroke 0.2s;
    }

    .nav-actions a svg:hover { stroke: var(--purple); }

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
      background: #f3f0ff;
    }

    /* ── STRUCTURED CLASSIC CART LAYOUT ── */
    .cart-page {
      padding: 140px 48px 72px;
      max-width: 1240px;
      margin: 0 auto;
      min-height: 100vh;
    }

    .cart-header-title {
      text-align: center;
      margin-bottom: 48px;
    }

    .cart-header-title h1 {
      font-size: 2.4rem;
      font-weight: 700;
      color: var(--text);
      letter-spacing: -0.02em;
      margin-bottom: 12px;
    }

    .breadcrumb {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-size: 0.9rem;
      color: var(--muted);
      font-weight: 500;
    }

    .breadcrumb a {
      color: var(--text);
      text-decoration: none;
      transition: color 0.2s;
    }

    .breadcrumb a:hover { color: var(--purple); }

    .cart-container {
      display: grid;
      grid-template-columns: 1.8fr 1fr;
      gap: 40px;
      align-items: start;
    }

    /* ── LEFT COLUMN (TABLE) ── */
    .cart-table-wrapper {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 4px; /* Boxy / Sharp Edges */
      overflow: hidden;
    }

    .cart-table-header {
      display: grid;
      grid-template-columns: 40px 3fr 1fr 120px 1fr;
      background: var(--gold); /* Warm Earthy Accent */
      color: var(--white);
      padding: 16px 24px;
      font-weight: 700;
      font-size: 0.95rem;
      letter-spacing: 0.02em;
    }

    .cart-item-row {
      display: grid;
      grid-template-columns: 40px 3fr 1fr 120px 1fr;
      align-items: center;
      padding: 24px;
      border-bottom: 1px solid var(--border);
      background: var(--white);
    }

    .cart-item-row:last-child {
      border-bottom: none;
    }

    .btn-remove {
      background: none;
      border: none;
      font-size: 1.2rem;
      cursor: pointer;
      color: var(--muted);
      display: flex;
      align-items: center;
      justify-content: flex-start;
      transition: color 0.2s;
    }

    .btn-remove:hover { color: #d32f2f; }

    .cart-product-info {
      display: flex;
      gap: 16px;
      align-items: center;
      padding-right: 16px;
    }

    .cart-product-info img {
      width: 72px;
      height: 72px;
      object-fit: cover;
      border-radius: 4px; /* Boxy */
      border: 1px solid var(--border);
      background: #f5f5f5;
    }

    .cart-product-info h3 {
      font-size: 0.95rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 6px;
      line-height: 1.3;
    }

    .cart-product-info p {
      font-size: 0.8rem;
      color: var(--muted);
    }

    .cart-price {
      font-weight: 600;
      color: var(--text);
      font-size: 0.95rem;
    }

    /* Linear Quantity Selector */
    .cart-qty-box {
      display: flex;
      border: 1px solid var(--border);
      width: 100px;
      height: 38px;
      border-radius: 4px;
      background: var(--white);
    }

    .cart-qty-box button {
      width: 32px;
      background: none;
      border: none;
      cursor: pointer;
      font-weight: 600;
      font-size: 1.1rem;
      color: var(--text);
      transition: background 0.2s;
    }

    .cart-qty-box button:hover { background: #f5f5f5; }

    .cart-qty-box span {
      flex: 1;
      text-align: center;
      line-height: 36px;
      font-weight: 600;
      border-left: 1px solid var(--border);
      border-right: 1px solid var(--border);
      font-size: 0.9rem;
    }

    .cart-subtotal {
      font-weight: 700;
      color: var(--text);
      font-size: 0.95rem;
    }

    /* Coupon & Actions */
    .cart-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 24px;
    }

    .coupon-box {
      display: flex;
    }

    .coupon-box input {
      padding: 0 16px;
      border: 1px solid var(--border);
      border-right: none;
      height: 44px;
      outline: none;
      border-radius: 4px 0 0 4px;
      width: 220px;
      font-family: inherit;
      font-size: 0.9rem;
    }

    .coupon-box button {
      background: var(--purple-dark); /* Deep Contrast */
      color: var(--white);
      border: none;
      height: 44px;
      padding: 0 24px;
      font-weight: 600;
      cursor: pointer;
      border-radius: 0 4px 4px 0;
      transition: background 0.2s;
      font-family: inherit;
    }

    .coupon-box button:hover { background: #322180; }

    .clear-cart {
      color: var(--text);
      text-decoration: underline;
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      background: none;
      border: none;
      font-family: inherit;
    }
    .clear-cart:hover { color: var(--purple); }

    /* ── RIGHT COLUMN (SUMMARY) ── */
    .summary-box {
      border: 1px solid var(--border);
      padding: 32px;
      border-radius: 4px; /* Boxy */
      background: var(--white);
    }

    .summary-box h3 {
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 24px;
      padding-bottom: 16px;
      border-bottom: 1px solid var(--border);
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 16px;
      font-size: 0.9rem;
      color: var(--muted);
    }

    .summary-row span:last-child {
      font-weight: 600;
      color: var(--text);
    }

    .summary-row.total {
      border-top: 1px solid var(--border);
      padding-top: 20px;
      margin-top: 20px;
      font-weight: 800;
      font-size: 1.1rem;
      color: var(--text);
    }

    .summary-row.total span:last-child {
      color: var(--purple-dark);
      font-size: 1.2rem;
    }

    .btn-checkout {
      background: var(--purple-dark); /* Deep Contrast */
      color: var(--white);
      width: 100%;
      height: 52px;
      font-weight: 700;
      font-size: 1rem;
      border: none;
      border-radius: 4px; /* Boxy */
      cursor: pointer;
      margin-top: 24px;
      transition: background 0.2s;
      font-family: inherit;
    }

    .btn-checkout:hover { background: #322180; }
    .btn-checkout:disabled { background: #ccc; cursor: not-allowed; }

    .ongkir-note {
      font-size: 0.75rem;
      color: var(--muted);
      margin-top: -10px;
      margin-bottom: 16px;
      font-style: italic;
    }

    /* ── BENEFITS STRIP ── */
    .benefits-strip {
      display: flex;
      justify-content: space-between;
      border-top: 1px solid var(--border);
      margin-top: 72px;
      padding-top: 56px;
      padding-bottom: 24px;
    }

    .benefit-item {
      display: flex;
      align-items: center;
      gap: 16px;
      flex: 1;
    }

    .benefit-item svg {
      width: 48px;
      height: 48px;
      stroke: var(--gold);
      fill: none;
      stroke-width: 1.5;
    }

    .benefit-text h4 {
      font-size: 1.05rem;
      font-weight: 700;
      margin-bottom: 4px;
      color: var(--text);
    }

    .benefit-text p {
      font-size: 0.85rem;
      color: var(--muted);
      line-height: 1.4;
    }

    /* ── EMPTY STATE ── */
    .empty-state {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: 72px 40px;
      text-align: center;
    }
    .empty-state .empty-icon { font-size: 3.5rem; margin-bottom: 16px; }
    .empty-state h2 { font-size: 1.3rem; margin-bottom: 8px; font-weight: 700;}
    .empty-state p { color: var(--muted); font-size: 0.9rem; margin-bottom: 32px; }
    .btn-browse {
      display: inline-flex;
      align-items: center;
      height: 48px;
      padding: 0 32px;
      border-radius: 4px;
      background: var(--purple-dark);
      color: var(--white);
      text-decoration: none;
      font-weight: 700;
      font-size: 0.95rem;
      transition: background 0.2s;
    }
    .btn-browse:hover { background: #322180; }

    /* ── NEWSLETTER & FOOTER ── */
    .newsletter-section {
      max-width: 1140px;
      margin: 0 auto 48px;
      background: var(--purple);
      border-radius: 24px;
      padding: 48px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 48px;
      align-items: center;
      color: var(--white);
    }
    .newsletter-info h3 { font-size: 1.8rem; font-weight: 700; margin-bottom: 12px; }
    .newsletter-info p { font-size: 0.95rem; line-height: 1.6; color: rgba(255,255,255,0.9); }
    .newsletter-form-group { display: flex; flex-direction: column; gap: 12px; }
    .newsletter-form-group label { font-size: 0.85rem; font-weight: 600; }
    .newsletter-input-row { display: flex; gap: 12px; }
    .newsletter-input-row input {
      flex: 1; padding: 14px 20px; border-radius: 999px; border: none;
      background: rgba(255,255,255,0.15); color: var(--white); font-family: inherit;
      font-size: 0.9rem; outline: none;
    }
    .newsletter-input-row input::placeholder { color: rgba(255,255,255,0.6); }
    .newsletter-input-row button {
      padding: 0 28px; border-radius: 999px; border: none; background: var(--gold);
      color: var(--white); font-weight: 700; font-family: inherit; cursor: pointer;
      transition: transform 0.2s;
    }
    .newsletter-input-row button:hover { transform: translateY(-2px); }
    .newsletter-disclaimer { font-size: 0.75rem; color: rgba(255,255,255,0.7); }
    .newsletter-disclaimer a { color: var(--white); text-decoration: underline; }

    footer {
      padding: 0 48px 36px;
      background: var(--light-bg);
      max-width: 1240px;
      margin: 0 auto;
    }
    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 48px;
      padding-bottom: 48px;
      border-bottom: 1px solid var(--border);
    }
    .footer-brand .brand-name {
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--purple);
      margin-bottom: 16px;
      display: block;
    }
    .footer-brand p { font-size: 0.9rem; color: var(--muted); line-height: 1.6; max-width: 280px; }
    .footer-col h4 { font-size: 1rem; font-weight: 700; color: var(--text); margin-bottom: 20px; }
    .footer-col-links { display: flex; flex-direction: column; gap: 12px; }
    .footer-col-links a { font-size: 0.85rem; color: var(--muted); text-decoration: none; transition: color 0.2s; }
    .footer-col-links a:hover { color: var(--purple); }
    .footer-bottom { padding-top: 24px; font-size: 0.8rem; color: var(--muted); text-align: center; }

    /* ── RESPONSIVE ── */
    @media (max-width: 1024px) {
      .benefits-strip { flex-direction: column; gap: 32px; }
    }

    @media (max-width: 900px) {
      nav { padding: 0 24px; }
      .nav-links { display: none; }
      .hamburger { display: flex; }
      .mobile-menu { display: flex; }
      .cart-page { padding: 112px 24px 56px; }
      .cart-container { grid-template-columns: 1fr; }
      .newsletter-section { grid-template-columns: 1fr; gap: 32px; padding: 32px; border-radius: 16px; margin: 0 24px 48px; }
      .footer-grid { grid-template-columns: 1fr 1fr; padding: 0 24px 32px; }
    }

    @media (max-width: 768px) {
      .cart-table-header { display: none; }
      .cart-item-row { 
        grid-template-columns: 1fr; 
        gap: 16px; 
        position: relative; 
        padding: 24px 16px;
      }
      .btn-remove { position: absolute; top: 24px; right: 16px; font-size: 1.5rem;}
      .cart-product-info { margin-bottom: 8px; padding-right: 32px; }
      .cart-price::before { content: 'Harga: '; font-weight: normal; color: var(--muted); }
      .cart-subtotal::before { content: 'Subtotal: '; font-weight: normal; color: var(--muted); }
      .cart-price, .cart-subtotal, .cart-qty-box { justify-self: start; }
      
      .cart-actions { flex-direction: column; gap: 24px; align-items: stretch; }
      .coupon-box { flex-direction: column; width: 100%; }
      .coupon-box input { border-radius: 4px; border-right: 1px solid var(--border); width: 100%; margin-bottom: 8px;}
      .coupon-box button { border-radius: 4px; width: 100%; }
    }

    @media (max-width: 580px) {
      nav { padding: 0 20px; }
      .cart-page { padding: 96px 20px 44px; }
      .cart-header-title h1 { font-size: 2rem; }
      .newsletter-input-row { flex-direction: column; }
      .newsletter-input-row button { padding: 14px 28px; }
      .footer-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<nav>
  <a href="{{ route('home') }}" class="nav-brand-wrapper">
    <div class="nav-brand-logo">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <path fill="#5B3FD9" d="M43.5 32.8c-.8-2.5-2.2-4.8-4.2-6.5-.6-.5-.5-1.4.2-1.7 2.4-1.1 5.2-1.3 7.7-.6.6.2.9.9.6 1.5l-2.8 6.3c-.3.7-1.1 1-1.5.1z"/>
        <path fill="#5B3FD9" d="M51.8 31.2l.4-6.9c0-.7.7-1.2 1.4-1 2.6.6 5 2.1 6.7 4.1.4.5.3 1.3-.3 1.6l-6.2 3.1c-.6.3-1.4-.2-1.4-.9z"/>
        <path fill="#5B3FD9" d="M37.8 36.5c-1.7-1.9-2.9-4.3-3.6-6.8-.2-.7.4-1.3 1.1-1.2 2.6.2 5.1 1.2 7.1 2.9.5.4.5 1.2.1 1.7l-3.5 4.1c-.2.4-1 .4-1.2-.7z"/>
        <path fill="#5B3FD9" d="M56.8 33.1l4.4-5.3c.5-.6 1.3-.5 1.7.1 1.6 2.1 2.5 4.6 2.5 7.2 0 .7-.7 1.1-1.3.8l-6.4-2.2c-.6-.2-.9-1-.5-1.6z"/>
        <path fill="#5B3FD9" d="M34.6 42.4c-2.4-.8-4.5-2.2-6.2-4.1-.5-.5-.3-1.4.4-1.5 2.5-.4 5.1.2 7.2 1.6.5.4.6 1.1.2 1.6l-3.3 3c-.4.4-1.1.2-1.3-.6z"/>
        <path fill="none" stroke="#5B3FD9" stroke-width="4.8" stroke-linecap="round" stroke-linejoin="round" d="M12 45.5c12-3.5 20 7 32 7s20-11.5 32-11.5"/>
        <path fill="none" stroke="#5B3FD9" stroke-width="4.2" stroke-linecap="round" stroke-linejoin="round" d="M24 53.5c9-2.5 15 4.5 25 4.5s15-8 25-8"/>
      </svg>
    </div>
    <span class="nav-brand">Lokana</span>
  </a>
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
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('home') }}">Home</a>
  <a href="{{ route('produk') }}" class="active">Produk Lokal</a>
  <a href="{{ route('event') }}">Event &amp; Tiket</a>
  <a href="{{ route('artikel') }}">Artikel Lokal</a>
  <a href="{{ route('history') }}">History</a>
  <div class="mobile-menu-divider"></div>
  <a href="{{ route('keranjang') }}">Keranjang</a>
  <a href="#">Akun Saya</a>
</div>

<main class="cart-page">
  <div class="cart-header-title">
    <h1>Keranjang Belanja</h1>
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Home</a> / 
      <span>Keranjang Belanja</span>
    </div>
  </div>

  {{-- Empty state (hidden saat ada item) --}}
  <div id="empty-state" class="empty-state" style="display:none;">
    <div class="empty-icon">🛒</div>
    <h2>Keranjangmu masih kosong</h2>
    <p>Belum ada produk atau tiket yang kamu tambahkan.</p>
    <a href="{{ route('produk') }}" class="btn-browse">Jelajahi Produk</a>
  </div>

  {{-- Cart layout (hidden saat kosong) --}}
  <div id="cart-layout" class="cart-container" style="display:none;">
    
    <div class="cart-table-wrapper">
      <div class="cart-table-header">
        <div></div> <div>Product</div>
        <div>Price</div>
        <div>Quantity</div>
        <div>Subtotal</div>
      </div>
      
      <div id="cart-items-container">
        {{-- Diisi oleh JS --}}
      </div>

      <div style="padding: 24px;">
        <div class="cart-actions">
          <div class="coupon-box">
            <input type="text" placeholder="Coupon Code">
            <button type="button">Apply Coupon</button>
          </div>
          <button class="clear-cart" type="button" onclick="clearAllCart()">Clear Shopping Cart</button>
        </div>
      </div>
    </div>

    <aside class="summary-box">
      <h3>Order Summary</h3>

      <div class="summary-row">
        <span>Items</span>
        <span id="summary-items-count">0</span>
      </div>

      <div class="summary-row">
        <span>Sub Total</span>
        <span id="summary-subtotal">Rp 0</span>
      </div>

      <div class="summary-row" id="ongkir-row">
        <span>Shipping</span>
        <span id="summary-ongkir">Rp 20.000</span>
      </div>
      <p class="ongkir-note" id="ongkir-note" style="display:none;">
        Khusus tiket event, tidak ada ongkos kirim.
      </p>

      <div class="summary-row">
        <span>Taxes</span>
        <span>Rp 0</span>
      </div>

      <div class="summary-row total">
        <span>Total</span>
        <span id="summary-total">Rp 0</span>
      </div>

      <button class="btn-checkout" id="btn-checkout">Proceed to Checkout</button>
    </aside>
  </div>

  <div class="benefits-strip">
    <div class="benefit-item">
      <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
      <div class="benefit-text">
        <h4>Free Shipping</h4>
        <p>Gratis ongkir untuk pesanan di atas Rp 500.000</p>
      </div>
    </div>
    <div class="benefit-item">
      <svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
      <div class="benefit-text">
        <h4>Flexible Payment</h4>
        <p>Berbagai pilihan metode pembayaran yang aman</p>
      </div>
    </div>
    <div class="benefit-item">
      <svg viewBox="0 0 24 24"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
      <div class="benefit-text">
        <h4>24x7 Support</h4>
        <p>Dukungan layanan pelanggan selalu siap sedia</p>
      </div>
    </div>
  </div>

</main>

<section class="newsletter-section">
  <div class="newsletter-info">
    <h3>Berlangganan Newsletter Kami</h3>
    <p>Jadi yang pertama tahu produk baru, cerita pengrajin, dan promo spesial dari Lokana.</p>
  </div>
  <div class="newsletter-form-group">
    <label>Tetap Update</label>
    <div class="newsletter-input-row">
      <input type="email" placeholder="Masukkan email kamu">
      <button type="button">Berlangganan</button>
    </div>
    <div class="newsletter-disclaimer">
      Dengan berlangganan, kamu menyetujui <a href="#">Kebijakan Privasi</a> kami.
    </div>
  </div>
</section>

<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <span class="brand-name">Lokana</span>
      <p>Marketplace produk lokal Bali — dari tangan pengrajin langsung ke tanganmu.</p>
    </div>
    <div class="footer-col">
      <h4>Belanja</h4>
      <div class="footer-col-links">
        <a href="#">Produk Lokal</a>
        <a href="#">Event & Tiket</a>
        <a href="#">Kategori</a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Bantuan</h4>
      <div class="footer-col-links">
        <a href="#">Kontak</a>
        <a href="#">Info Pengiriman</a>
        <a href="#">FAQ</a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Legal</h4>
      <div class="footer-col-links">
        <a href="#">Tentang Kami</a>
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat & Ketentuan</a>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    © 2026 Lokana
  </div>
</footer>

{{-- Muat cart.js --}}
<script src="{{ asset('js/cart.js') }}"></script>

<script>
(function () {
  const ONGKIR = 20000;

  /* ── hamburger ─────────────────────────────────────────── */
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');

  if (hamburger && mobileMenu) {
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
  }

  // ── Render semua item ke DOM (Menggunakan Layout Baru) ────────
  function renderCart() {
    const cart = getCart();
    const container = document.getElementById('cart-items-container');
    const emptyState = document.getElementById('empty-state');
    const cartLayout = document.getElementById('cart-layout');

    if (cart.length === 0) {
      emptyState.style.display = 'block';
      cartLayout.style.display = 'none';
      return;
    }

    emptyState.style.display = 'none';
    cartLayout.style.display = 'grid';

    // Bangun HTML untuk tiap item
    container.innerHTML = cart.map((item, index) => {
      const isTicket = item.kategori === 'tiket';

      // Meta info: untuk tiket tampilkan tier & tanggal, untuk produk tampilkan varian
      let metaText = item.varian || 'Produk Lokal';
      if (isTicket) {
        const parts = [];
        if (item.tier) parts.push(item.tier);
        if (item.tanggalEvent) parts.push(item.tanggalEvent);
        metaText = parts.join(' | ');
      }

      const itemTotal = item.harga * item.qty;

      return `
        <div class="cart-item-row" data-index="${index}">
          <button class="btn-remove" type="button" onclick="hapusItem(${index})" title="Hapus Item">✕</button>
          
          <div class="cart-product-info">
            <img
              src="${escHtml(item.gambar)}"
              alt="${escHtml(item.nama)}"
              onerror="this.src='https://via.placeholder.com/80x80?text=Gambar'"
            >
            <div>
              <h3>${escHtml(item.nama)}</h3>
              <p>${escHtml(metaText)}</p>
            </div>
          </div>

          <div class="cart-price">${formatRupiah(item.harga)}</div>
          
          <div class="cart-qty-box">
            <button type="button" onclick="changeQty(${index}, -1)">−</button>
            <span id="qty-${index}">${item.qty}</span>
            <button type="button" onclick="changeQty(${index}, 1)">+</button>
          </div>

          <div class="cart-subtotal" id="item-price-${index}">${formatRupiah(itemTotal)}</div>
        </div>
      `;
    }).join('');

    updateSummary(cart);
  }

  // ── Update ringkasan harga ──────────────────────────────────
  function updateSummary(cart) {
    const subtotal = getCartSubtotal();
    const hasPhysical = cartHasPhysicalProduct();
    const ongkir = hasPhysical ? ONGKIR : 0;
    const total = subtotal + ongkir;

    // Hitung total item qty
    const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);

    document.getElementById('summary-items-count').textContent = totalItems;
    document.getElementById('summary-subtotal').textContent = formatRupiah(subtotal);
    document.getElementById('summary-ongkir').textContent = hasPhysical ? formatRupiah(ONGKIR) : 'Gratis';
    document.getElementById('summary-total').textContent = formatRupiah(total);

    // Tampilkan catatan ongkir kalau cart hanya tiket
    const ongkirNote = document.getElementById('ongkir-note');
    ongkirNote.style.display = cartIsTicketOnly() ? 'block' : 'none';
  }

  // ── Ubah qty item ───────────────────────────────────────────
  window.changeQty = function (index, delta) {
    const cart = getCart();
    if (!cart[index]) return;

    const newQty = cart[index].qty + delta;
    if (newQty < 1) return; // minimal 1

    updateCartQty(index, newQty);

    // Update DOM item secara parsial (tidak re-render penuh supaya smooth)
    const cart2 = getCart();
    document.getElementById('qty-' + index).textContent = cart2[index].qty;
    document.getElementById('item-price-' + index).textContent = formatRupiah(cart2[index].harga * cart2[index].qty);

    updateSummary(cart2);
  };

  // ── Hapus item ──────────────────────────────────────────────
  window.hapusItem = function (index) {
    removeFromCart(index);
    renderCart(); // re-render supaya index tidak geser
  };

  // ── Clear cart ──────────────────────────────────────────────
  window.clearAllCart = function () {
    if(confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
      let cart = getCart();
      while(cart.length > 0) {
        removeFromCart(0);
        cart = getCart();
      }
      renderCart();
    }
  };

  // ── Tombol checkout ─────────────────────────────────────────
  document.getElementById('btn-checkout').addEventListener('click', function () {
    const cart = getCart();
    if (cart.length === 0) return;
    window.location.href = "{{ route('checkout') }}";
  });

  function escHtml(str) {
    if (!str) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  renderCart();
})();
</script>

</body>
</html>