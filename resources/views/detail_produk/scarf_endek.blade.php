<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Scarf Endek Bali Handmade - Lokana</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>"/>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>

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
      --stock-bg: #e8f5e9;
      --stock-text: #1b5e20;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: var(--text);
      background: var(--light-bg);
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
      background: #f5f3ff;
    }

    /* ── PAGE LAYOUT ── */
    .product-detail-page {
      padding: 112px 48px 72px;
      min-height: 100vh;
      background: var(--light-bg);
    }

    .detail-wrap { max-width: 1080px; margin: 0 auto; }

    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 32px;
      font-size: 0.85rem;
      color: var(--muted);
      justify-content: center;
    }

    .breadcrumb a {
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }

    .breadcrumb a:hover { color: var(--purple); }

    .product-detail-card {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 48px;
      background: var(--light-bg);
      padding-bottom: 56px;
      border-bottom: 1px solid var(--border);
      margin-bottom: 56px;
    }

    /* ── GALLERY ── */
    .product-gallery {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .main-product-img {
      width: 100%;
      aspect-ratio: 1 / 1;
      object-fit: cover;
      border-radius: 20px;
      display: block;
      background: #eee;
      border: 1px solid var(--border);
    }

    .thumbnail-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 12px;
    }

    .thumbnail-row img {
      width: 100%;
      aspect-ratio: 1 / 1;
      object-fit: cover;
      border-radius: 14px;
      border: 1px solid var(--border);
      cursor: pointer;
      transition: border-color 0.2s;
    }

    .thumbnail-row img:hover {
      border-color: var(--purple);
    }

    /* ── PRODUCT INFO ── */
    .product-detail-info {
      padding: 12px 0;
      display: flex;
      flex-direction: column;
    }

    .meta-header {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 12px;
    }

    .product-category {
      font-size: 0.8rem;
      font-weight: 700;
      color: var(--purple);
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .stock-tag {
      font-size: 0.7rem;
      font-weight: 600;
      padding: 4px 10px;
      border-radius: 999px;
      background: var(--stock-bg);
      color: var(--stock-text);
    }

    .product-detail-info h1 {
      font-size: clamp(1.8rem, 3vw, 2.2rem);
      line-height: 1.2;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 12px;
      letter-spacing: -0.02em;
    }

    .rating-row {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.85rem;
      color: var(--muted);
      margin-bottom: 20px;
    }

    .stars { color: var(--gold); font-size: 0.9rem; letter-spacing: 2px;}
    .rating-score { font-weight: 700; color: var(--text); }

    .price {
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--purple);
      margin-bottom: 24px;
    }

    .product-subtitle {
      color: var(--muted);
      line-height: 1.6;
      font-size: 0.95rem;
      margin-bottom: 28px;
    }

    /* ── OPTIONS & ACTIONS ── */
    .option-group { margin-bottom: 28px; }
    .option-group label {
      display: block;
      font-size: 0.85rem;
      font-weight: 700;
      margin-bottom: 12px;
      color: var(--text);
    }

    .option-pills {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .option-pill {
      padding: 8px 20px;
      border: 1px solid var(--border);
      border-radius: 999px;
      background: var(--white);
      color: var(--muted);
      font-size: 0.85rem;
      font-weight: 600;
      cursor: pointer;
      font-family: inherit;
      transition: all 0.2s;
    }

    .option-pill.active, .option-pill:hover {
      color: var(--purple);
      border-color: var(--purple);
      background: #f3f0ff;
    }

    .action-row {
      display: flex;
      gap: 16px;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 32px;
    }

    .quantity-box {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 110px;
      height: 48px;
      padding: 0 16px;
      border: 1px solid var(--border);
      border-radius: 999px;
      background: var(--white);
    }

    .quantity-box button {
      border: none;
      background: transparent;
      font-size: 1.2rem;
      font-weight: 800;
      color: var(--purple);
      cursor: pointer;
    }

    .quantity-box span { font-weight: 700; font-size: 0.95rem; color: var(--text); }

    .btn-outline,
    .btn-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      height: 48px;
      padding: 0 28px;
      border-radius: 999px;
      font-size: 0.9rem;
      font-weight: 700;
      cursor: pointer;
      font-family: inherit;
      transition: all 0.25s;
      flex: 1;
      min-width: 140px;
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

    .product-meta-list {
      font-size: 0.85rem;
      color: var(--muted);
      line-height: 1.8;
    }
    .product-meta-list strong { color: var(--text); font-weight: 700; margin-right: 8px;}

    /* ── TABS SECTION ── */
    .tabs-container {
      max-width: 800px;
      margin: 0 auto;
    }

    .tabs-header {
      display: flex;
      justify-content: center;
      gap: 40px;
      border-bottom: 1px solid var(--border);
      margin-bottom: 40px;
    }

    .tab-link {
      background: none;
      border: none;
      padding: 12px 0;
      font-size: 1.05rem;
      font-weight: 700;
      color: var(--muted);
      cursor: pointer;
      border-bottom: 2px solid transparent;
      transition: all 0.2s;
      font-family: inherit;
    }

    .tab-link.active {
      color: var(--purple);
      border-bottom-color: var(--purple);
    }

    .tab-content {
      display: none;
      animation: fadeIn 0.4s ease;
      color: var(--muted);
      line-height: 1.7;
      font-size: 0.95rem;
    }

    .tab-content.active { display: block; }
    
    .tab-content h3 { color: var(--text); font-weight: 700; margin-bottom: 16px; font-size: 1.2rem; }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(5px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ── REVIEW SECTION ── */
    .review-summary {
      display: grid;
      grid-template-columns: auto 1fr;
      gap: 64px;
      align-items: center;
      margin-bottom: 48px;
    }

    .review-score { text-align: center; }
    .review-score h2 { font-size: 3.5rem; font-weight: 700; color: var(--text); line-height: 1; margin-bottom: 8px;}
    .review-score span { font-size: 0.9rem; color: var(--muted); }
    .review-score .stars { font-size: 1.2rem; margin: 8px 0;}

    .review-bars { display: flex; flex-direction: column; gap: 10px; }
    .bar-row { display: flex; align-items: center; gap: 16px; font-size: 0.85rem; font-weight: 600; color: var(--text); }
    .bar-bg { flex: 1; height: 6px; background: var(--border); border-radius: 999px; overflow: hidden;}
    .bar-fill { height: 100%; background: var(--gold); border-radius: 999px;}

    .review-list-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
      font-size: 0.9rem;
      color: var(--text);
    }

    .review-item {
      padding: 24px 0;
      border-bottom: 1px solid var(--border);
    }

    .review-user { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; justify-content: space-between; }
    .user-info { display: flex; align-items: center; gap: 12px; }
    .user-info img { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; background: #eee; }
    .user-name { font-weight: 700; color: var(--text); font-size: 0.95rem; }
    .user-badge { font-size: 0.75rem; color: var(--purple); font-weight: 600; }
    .review-date { font-size: 0.85rem; color: var(--muted); }

    .review-title { font-weight: 700; color: var(--text); margin-bottom: 8px; }
    .review-text { font-size: 0.9rem; margin-bottom: 16px; }
    
    .review-images { display: flex; gap: 12px; }
    .review-images img { width: 80px; height: 80px; object-fit: cover; border-radius: 12px; border: 1px solid var(--border); }

    /* ── TOAST ── */
    .toast {
      position: fixed; bottom: 28px; left: 50%; transform: translateX(-50%) translateY(12px);
      background: #1a1a1a; color: #fff; padding: 12px 24px; border-radius: 999px;
      font-size: 0.86rem; font-weight: 600; opacity: 0; pointer-events: none;
      transition: opacity 0.25s, transform 0.25s; z-index: 999; white-space: nowrap;
    }
    .toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }

    /* ── NEWSLETTER & NEW FOOTER ── */
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
    .newsletter-info h3 {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 12px;
    }
    .newsletter-info p {
      font-size: 0.95rem;
      line-height: 1.6;
      color: rgba(255,255,255,0.9);
    }
    .newsletter-form-group {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .newsletter-form-group label {
      font-size: 0.85rem;
      font-weight: 600;
    }
    .newsletter-input-row {
      display: flex;
      gap: 12px;
    }
    .newsletter-input-row input {
      flex: 1;
      padding: 14px 20px;
      border-radius: 999px;
      border: none;
      background: rgba(255,255,255,0.15);
      color: var(--white);
      font-family: inherit;
      font-size: 0.9rem;
      outline: none;
    }
    .newsletter-input-row input::placeholder {
      color: rgba(255,255,255,0.6);
    }
    .newsletter-input-row button {
      padding: 0 28px;
      border-radius: 999px;
      border: none;
      background: var(--gold);
      color: var(--white);
      font-weight: 700;
      font-family: inherit;
      cursor: pointer;
      transition: transform 0.2s;
    }
    .newsletter-input-row button:hover {
      transform: translateY(-2px);
    }
    .newsletter-disclaimer {
      font-size: 0.75rem;
      color: rgba(255,255,255,0.7);
    }
    .newsletter-disclaimer a {
      color: var(--white);
      text-decoration: underline;
    }

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
    .footer-brand p {
      font-size: 0.9rem;
      color: var(--muted);
      line-height: 1.6;
      max-width: 280px;
    }
    .footer-col h4 {
      font-size: 1rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 20px;
    }
    .footer-col-links {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .footer-col-links a {
      font-size: 0.85rem;
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }
    .footer-col-links a:hover {
      color: var(--purple);
    }
    .footer-bottom {
      padding-top: 24px;
      font-size: 0.8rem;
      color: var(--muted);
      text-align: center;
    }

    @media (max-width: 900px) {
      nav { padding: 0 24px; }
      .nav-links { display: none; }
      .hamburger { display: flex; }
      .mobile-menu { display: flex; }
      .product-detail-page { padding: 96px 24px 56px; }
      .product-detail-card { grid-template-columns: 1fr; gap: 32px; border: none; padding-bottom: 32px;}
      .review-summary { grid-template-columns: 1fr; gap: 32px; text-align: left; }
      .review-score { text-align: left; }
      .newsletter-section { grid-template-columns: 1fr; gap: 32px; padding: 32px; border-radius: 16px; margin: 0 24px 48px; }
      .footer-grid { grid-template-columns: 1fr 1fr; padding: 0 24px 32px; }
    }

    @media (max-width: 580px) {
      nav { padding: 0 20px; }
      .product-detail-page { padding: 88px 20px 44px; }
      .action-row { flex-direction: column; align-items: stretch; }
      .quantity-box { width: 100%; justify-content: center; gap: 32px; }
      .tabs-header { gap: 20px; overflow-x: auto; white-space: nowrap; justify-content: flex-start; padding-bottom: 8px;}
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

<main class="product-detail-page">
  <div class="breadcrumb">
    <a href="{{ route('home') }}">Home</a> / 
    <a href="{{ route('produk') }}">Produk Lokal</a> / 
    <span>Scarf Endek Bali</span>
  </div>

  <div class="detail-wrap">
    
    <!-- Bagian Atas: Gambar & Info Pembelian -->
    <section class="product-detail-card">
      <div class="product-gallery">
        <img class="main-product-img" src="https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg" alt="Scarf Endek Bali Handmade">
        <div class="thumbnail-row">
          <img src="https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg" alt="Thumb 1">
          <img src="https://i.pinimg.com/1200x/71/64/04/716404ae798ba8c4f8b98762a31b97ca.jpg" alt="Thumb 2">
          <img src="https://i.pinimg.com/736x/bf/2b/05/bf2b05a0e35df8221f168152b442ce2f.jpg" alt="Thumb 3">
          <img src="https://i.pinimg.com/736x/a9/84/83/a9848382e0f00383dc3a020ddae17ca0.jpg" alt="Thumb 4">
        </div>
      </div>

      <div class="product-detail-info">
        <div class="meta-header">
          <span class="product-category">Fashion Lokal</span>
          <span class="stock-tag">Stok Tersedia</span>
        </div>

        <h1>Scarf Endek Bali Handmade</h1>

        <div class="rating-row">
          <span class="stars">★★★★★</span>
          <span class="rating-score">4.8</span>
          <span>(245 Review)</span>
        </div>

        <div class="price" id="productPrice" data-price="250000">Rp 250.000</div>

        <p class="product-subtitle">
          Scarf berbasis kain Endek dengan motif clean dan warna organik yang mudah dipadukan. Cocok buat kamu yang suka sentuhan lokal, tapi tetap ingin look yang natural dan elegan.
        </p>

        <div class="option-group">
          <label>Pilihan Warna</label>
          <div class="option-pills" id="colorPills">
            <button class="option-pill active" type="button" data-warna="Blue Sand">Blue Sand</button>
            <button class="option-pill" type="button" data-warna="Rose Clay">Rose Clay</button>
            <button class="option-pill" type="button" data-warna="Natural Cream">Natural Cream</button>
          </div>
        </div>

        <div class="action-row">
          <div class="quantity-box">
            <button type="button" id="decreaseQty">−</button>
            <span id="quantityValue">1</span>
            <button type="button" id="increaseQty">+</button>
          </div>
          <button type="button" id="addToCartBtn" class="btn-outline">Tambah ke Keranjang</button>
          <button type="button" id="buyNowBtn" class="btn-primary">Beli Sekarang</button>
        </div>

        <div class="product-meta-list">
          <div><strong>SKU :</strong> LKN-EDK-85648</div>
          <div><strong>Tags :</strong> Wastra, Endek, Scarf, Bali</div>
        </div>
      </div>
    </section>

    <!-- Bagian Tengah: Tabs Konten -->
    <section class="tabs-container">
      <div class="tabs-header">
        <button class="tab-link active" data-target="desc-tab">Deskripsi</button>
        <button class="tab-link" data-target="info-tab">Informasi Tambahan</button>
        <button class="tab-link" data-target="review-tab">Ulasan</button>
      </div>

      <!-- Tab Deskripsi -->
      <div class="tab-content active" id="desc-tab">
        <h3>Detail lokal yang tetap mudah dipakai</h3>
        <p>Scarf ini dipilih karena punya karakter visual yang kuat tanpa terasa berlebihan. Motif Endek memberi sentuhan lokal, sementara warna dan ukurannya tetap fleksibel untuk dipakai harian. Produk ini pas untuk pengguna yang mencari oleh-oleh Bali dengan fungsi jelas. Bukan hanya pajangan, tapi bisa langsung dipakai untuk styling kasual, semi-formal, atau sebagai aksesori perjalanan.</p>
      </div>

      <!-- Tab Info Tambahan -->
      <div class="tab-content" id="info-tab">
        <h3>Spesifikasi Teknis</h3>
        <ul>
          <li><strong>Material:</strong> 100% Katun Premium Endek Bali</li>
          <li><strong>Dimensi:</strong> 180cm x 60cm</li>
          <li><strong>Perawatan:</strong> Cuci dengan tangan menggunakan deterjen lembut, hindari sinar matahari langsung saat menjemur.</li>
          <li><strong>Pengiriman:</strong> 2-4 Hari Kerja (Reguler)</li>
        </ul>
      </div>

      <!-- Tab Review -->
      <div class="tab-content" id="review-tab">
        <div class="review-summary">
          <div class="review-score">
            <h2>4.8</h2>
            <span>dari 5</span>
            <div class="stars">★★★★★</div>
            <p>(245 Ulasan)</p>
          </div>
          <div class="review-bars">
            <div class="bar-row">5 Bintang <div class="bar-bg"><div class="bar-fill" style="width: 85%;"></div></div></div>
            <div class="bar-row">4 Bintang <div class="bar-bg"><div class="bar-fill" style="width: 10%;"></div></div></div>
            <div class="bar-row">3 Bintang <div class="bar-bg"><div class="bar-fill" style="width: 5%;"></div></div></div>
            <div class="bar-row">2 Bintang <div class="bar-bg"><div class="bar-fill" style="width: 0%;"></div></div></div>
            <div class="bar-row">1 Bintang <div class="bar-bg"><div class="bar-fill" style="width: 0%;"></div></div></div>
          </div>
        </div>

        <div class="review-list-header">
          <span><strong>Daftar Ulasan</strong></span>
          <span>Urutkan : <strong>Terbaru</strong></span>
        </div>

        <!-- Review Item 1 -->
        <div class="review-item">
          <div class="review-user">
            <div class="user-info">
              <img src="https://i.pravatar.cc/100?img=5" alt="User">
              <div>
                <div class="user-name">Kristin Watson</div>
                <div class="user-badge">(Pembeli Terverifikasi)</div>
              </div>
            </div>
            <div class="review-date">1 bulan yang lalu</div>
          </div>
          <div class="review-title">Sangat memuaskan!</div>
          <p class="review-text">Warnanya benar-benar senatural yang ada di foto. Kainnya lembut dan gampang banget di-styling. Sangat merepresentasikan kualitas pengrajin lokal Bali!</p>
          <div class="stars">★★★★★</div>
          <div class="review-images" style="margin-top: 12px;">
            <img src="https://i.pinimg.com/736x/bf/2b/05/bf2b05a0e35df8221f168152b442ce2f.jpg" alt="Review Image">
          </div>
        </div>

        <!-- Review Item 2 -->
        <div class="review-item">
          <div class="review-user">
            <div class="user-info">
              <img src="https://i.pravatar.cc/100?img=9" alt="User">
              <div>
                <div class="user-name">Jenny Wilson</div>
                <div class="user-badge">(Pembeli Terverifikasi)</div>
              </div>
            </div>
            <div class="review-date">2 bulan yang lalu</div>
          </div>
          <div class="review-title">Cocok untuk dipakai sehari-hari</div>
          <p class="review-text">Scarf ini jadi andalan saya buat ngantor atau sekadar jalan sore. Motif endeknya tidak norak dan terlihat sangat premium.</p>
          <div class="stars">★★★★★</div>
        </div>
      </div>
    </section>

  </div>
</main>

<div class="toast" id="toast"></div>

<!-- NEWSLETTER SECTION -->
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

<!-- FOOTER BARU -->
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

{{-- cart.js harus dimuat sebelum script ini --}}
<script src="{{ asset('js/cart.js') }}"></script>

<script>
(function () {
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

  /* ── state produk ──────────────────────────────────────── */
  const BASE_PRICE = 250000;
  let quantity = 1;
  let selectedWarna = 'Blue Sand';

  const productPriceEl = document.getElementById('productPrice');
  const quantityValueEl = document.getElementById('quantityValue');

  function updatePriceDisplay() {
    productPriceEl.textContent = 'Rp ' + (BASE_PRICE * quantity).toLocaleString('id-ID');
    quantityValueEl.textContent = quantity;
  }

  /* qty */
  document.getElementById('increaseQty').addEventListener('click', () => {
    quantity++;
    updatePriceDisplay();
  });

  document.getElementById('decreaseQty').addEventListener('click', () => {
    if (quantity > 1) { quantity--; updatePriceDisplay(); }
  });

  /* warna */
  document.querySelectorAll('#colorPills .option-pill').forEach(pill => {
    pill.addEventListener('click', () => {
      document.querySelectorAll('#colorPills .option-pill').forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
      selectedWarna = pill.dataset.warna;
    });
  });

  /* ── Tab Logic ─────────────────────────────────────────── */
  const tabLinks = document.querySelectorAll('.tab-link');
  const tabContents = document.querySelectorAll('.tab-content');

  tabLinks.forEach(link => {
    link.addEventListener('click', () => {
      // Hapus active dari semua
      tabLinks.forEach(l => l.classList.remove('active'));
      tabContents.forEach(c => c.classList.remove('active'));
      
      // Tambah active ke target
      link.classList.add('active');
      document.getElementById(link.dataset.target).classList.add('active');
    });
  });

  /* ── toast helper ──────────────────────────────────────── */
  const toastEl = document.getElementById('toast');
  let toastTimer;

  function showToast(msg) {
    toastEl.textContent = msg;
    toastEl.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => toastEl.classList.remove('show'), 2200);
  }

  /* ── tambah ke keranjang ───────────────────────────────── */
  function buildItem() {
    return {
      id: 'scarf-endek-bali',
      nama: 'Scarf Endek Bali Handmade',
      kategori: 'produk',
      harga: BASE_PRICE,
      qty: quantity,
      gambar: 'https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg',
      varian: selectedWarna,
      tier: null,
      tanggalEvent: null,
    };
  }

  document.getElementById('addToCartBtn').addEventListener('click', () => {
    addToCart(buildItem());

    const btn = document.getElementById('addToCartBtn');
    btn.textContent = '✓ Ditambahkan';
    btn.disabled = true;
    btn.style.opacity = '0.6';
    btn.style.cursor = 'default';

    showToast('✓ Scarf Endek ditambahkan ke keranjang');

    setTimeout(() => {
      btn.textContent = 'Tambah ke Keranjang';
      btn.disabled = false;
      btn.style.opacity = '';
      btn.style.cursor = '';
    }, 2000);
  });

  document.getElementById('buyNowBtn').addEventListener('click', () => {
    addToCart(buildItem());
    window.location.href = "{{ route('keranjang') }}";
  });
})();
</script>

</body>
</html>