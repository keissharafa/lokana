<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pesta Kesenian Bali - Lokana</title>

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
      gap: 12px;
      text-decoration: none;
      z-index: 201;
    }

    .nav-brand-logo {
      width: 42px;
      height: 42px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .nav-brand-logo svg {
      width: 100%;
      height: 100%;
    }

    .nav-brand {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 1.25rem;
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

    .mobile-menu-divider {
      height: 1px;
      background: var(--border);
      margin: 8px 28px;
    }

    /* ── PAGE LAYOUT ── */
    .product-detail-page {
      padding: 112px 48px 72px;
      min-height: 100vh;
      background: var(--light-bg);
    }

    .detail-wrap { max-width: 1120px; margin: 0 auto; }

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

    .breadcrumb a:hover { color: var(--purple); }

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
      gap: 14px;
      align-items: center;
      color: var(--muted);
      font-size: 0.86rem;
      margin-bottom: 24px;
    }

    .rating-row span {
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .rating-row svg {
      width: 15px;
      height: 15px;
      stroke: var(--muted);
      fill: none;
      stroke-width: 1.8;
    }

    .rating { color: var(--gold); font-weight: 800; }

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
      font-family: inherit;
      transition: all 0.15s;
    }

    .option-pill.active {
      color: var(--purple);
      border-color: var(--purple);
      background: #f3f0ff;
    }

    .date-input {
      width: fit-content;
      padding: 10px 16px;
      border: 1px solid var(--border);
      border-radius: 999px;
      background: var(--white);
      color: var(--text);
      font-family: inherit;
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      outline: none;
      transition: border-color 0.2s;
    }

    .date-input:focus,
    .date-input:hover { border-color: var(--purple); }

    .date-input.invalid { border-color: #e0554f; }

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
      font-family: inherit;
      text-decoration: none;
      cursor: pointer;
      border: none;
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

    /* Toast */
    .toast {
      position: fixed;
      bottom: 28px;
      left: 50%;
      transform: translateX(-50%) translateY(12px);
      background: #1a1a1a;
      color: #fff;
      padding: 12px 22px;
      border-radius: 999px;
      font-size: 0.86rem;
      font-weight: 600;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.25s, transform 0.25s;
      z-index: 999;
      white-space: nowrap;
    }

    .toast.show {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
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

    .info-item strong { color: var(--text); font-weight: 700; }

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

    /* ── FOOTER BARU ── */
    .footer-wrap {
      background: var(--light-bg);
      padding: 56px 48px 48px;
    }

    .newsletter-card {
      background: var(--purple-dark);
      border-radius: 24px;
      padding: 48px 56px;
      display: grid;
      grid-template-columns: 1.2fr 1fr;
      gap: 40px;
      align-items: center;
      position: relative;
      overflow: hidden;
      max-width: 1120px;
      margin: 0 auto;
    }

    .newsletter-card::before {
      content: '';
      position: absolute;
      top: -60px;
      right: -60px;
      width: 220px;
      height: 220px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(255,255,255,0.08), transparent 70%);
      pointer-events: none;
    }

    .newsletter-copy h2 {
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--white);
      line-height: 1.25;
      margin-bottom: 10px;
    }

    .newsletter-copy p {
      font-size: 0.86rem;
      color: rgba(255,255,255,0.72);
      line-height: 1.6;
      max-width: 380px;
    }

    .newsletter-form-wrap .newsletter-label {
      font-size: 0.78rem;
      font-weight: 600;
      color: rgba(255,255,255,0.8);
      letter-spacing: 0.02em;
      margin-bottom: 10px;
    }

    .newsletter-form {
      display: flex;
      gap: 10px;
    }

    .newsletter-form input {
      flex: 1;
      min-width: 0;
      padding: 13px 18px;
      border-radius: 50px;
      border: none;
      background: rgba(255,255,255,0.1);
      color: var(--white);
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 0.85rem;
      outline: none;
      transition: background 0.2s;
    }

    .newsletter-form input::placeholder { color: rgba(255,255,255,0.5); }
    .newsletter-form input:focus { background: rgba(255,255,255,0.16); }

    .newsletter-form button {
      background: var(--gold);
      color: #3a2a05;
      border: none;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-weight: 700;
      font-size: 0.85rem;
      padding: 13px 24px;
      border-radius: 50px;
      cursor: pointer;
      white-space: nowrap;
      transition: background 0.2s, transform 0.2s;
    }

    .newsletter-form button:hover {
      background: #dba94a;
      transform: translateY(-1px);
    }

    .newsletter-fineprint {
      font-size: 0.72rem;
      color: rgba(255,255,255,0.5);
      margin-top: 10px;
    }

    .newsletter-fineprint a {
      color: rgba(255,255,255,0.75);
      text-decoration: underline;
    }

    footer {
      max-width: 1120px;
      margin: 0 auto;
      padding: 56px 0 32px;
      display: grid;
      grid-template-columns: 1.4fr 1fr 1fr 1fr;
      gap: 32px;
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

    .footer-col h4 {
      font-size: 0.78rem;
      font-weight: 700;
      color: var(--text);
      letter-spacing: 0.03em;
      margin-bottom: 14px;
    }

    .footer-links {
      display: flex;
      flex-direction: column;
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
      .product-detail-page { padding: 96px 24px 56px; }
      .product-detail-card { grid-template-columns: 1fr; padding: 24px; }
      .story-section { grid-template-columns: 1fr; }
      
      /* Responsif Footer Baru */
      .footer-wrap { padding: 0 24px 32px; }
      .newsletter-card { grid-template-columns: 1fr; padding: 36px 32px; gap: 28px; }
      footer { grid-template-columns: 1fr 1fr; }
    }

    @media (max-width: 580px) {
      nav { padding: 0 20px; }
      .product-detail-page { padding: 88px 20px 44px; }
      .product-detail-card { padding: 18px; border-radius: 20px; }
      .main-product-img { aspect-ratio: 1 / 1; }
      .product-detail-info h1 { font-size: 2rem; }
      .action-row { flex-direction: column; }
      .btn-primary, .btn-outline { width: 100%; }
      .story-card, .shipping-card { padding: 24px; }
      
      /* Responsif Footer Baru */
      .footer-wrap { padding: 0 16px 28px; }
      .newsletter-card { padding: 28px 22px; border-radius: 20px; }
      .newsletter-copy h2 { font-size: 1.3rem; }
      .newsletter-form { flex-direction: column; }
      .newsletter-form button { width: 100%; }
      footer { grid-template-columns: 1fr 1fr; padding: 36px 0 20px; gap: 24px; }
      .footer-brand { grid-column: 1 / -1; }
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
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('home') }}">Home</a>
  <a href="{{ route('produk') }}">Produk Lokal</a>
  <a href="{{ route('event') }}" class="active">Event &amp; Tiket</a>
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
      <a href="{{ route('event') }}">Event &amp; Tiket</a>
      <span>/</span>
      <span>Pesta Kesenian Bali</span>
    </div>

    <section class="product-detail-card">
      <div class="product-gallery">
        <img
          class="main-product-img"
          src="https://i.pinimg.com/736x/fb/6b/54/fb6b54371c86c497c1d363cb4c9b495d.jpg"
          alt="Pesta Kesenian Bali"
        >
        <div class="thumbnail-row">
          <img src="https://i.pinimg.com/1200x/6d/72/45/6d7245db6b5cd339df2501b55cd99b18.jpg" alt="Pertunjukan tari Pesta Kesenian Bali">
          <img src="https://i.pinimg.com/1200x/7c/a0/45/7ca04566d0b2befff16179633c86b732.jpg" alt="Gamelan Bali">
          <img src="https://i.pinimg.com/1200x/75/1a/88/751a8877f53a95786c877e44076041b9.jpg" alt="Kerajinan budaya Bali">
        </div>
      </div>

      <div class="product-detail-info">
        <span class="product-category">Seni &amp; Budaya</span>

        <h1>Pesta Kesenian Bali</h1>

        <p class="product-subtitle">
          Festival seni dan budaya terbesar di Bali yang berlangsung sebulan penuh di Taman Werdhi Budaya Art Centre, Denpasar. Menampilkan tari tradisional, gamelan, pawai budaya, dan kerajinan dari seluruh penjuru pulau.
        </p>

        <div class="rating-row">
          <span>
            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
            13 Jun – 11 Jul 2026
          </span>
          <span>
            <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            Taman Werdhi Budaya, Denpasar
          </span>
          <span class="rating">★ 4.9</span>
        </div>

        <div class="price" id="ticketPrice">Rp 75.000</div>

        <div class="product-options">
          <div class="option-group">
            <label>Jenis Tiket</label>
            <div class="option-pills" id="tierPills">
              <button class="option-pill active" type="button"
                data-tier="Reguler" data-harga="75000">Reguler — Rp 75.000</button>
              <button class="option-pill" type="button"
                data-tier="VIP" data-harga="200000">VIP — Rp 200.000</button>
            </div>
          </div>

          <div class="option-group">
            <label>Tanggal Kunjungan</label>
            <input
              type="date"
              id="visitDate"
              class="date-input"
              min="2026-06-13"
              max="2026-07-11"
            >
          </div>

          <div class="option-group">
            <label>Jumlah Tiket</label>
            <div class="quantity-box">
              <button type="button" id="decreaseQty">−</button>
              <span id="quantityValue">1</span>
              <button type="button" id="increaseQty">+</button>
            </div>
          </div>
        </div>

        <div class="action-row">
          <button type="button" id="addToCartBtn" class="btn-outline">Tambah ke Keranjang</button>
          <button type="button" id="buyNowBtn" class="btn-primary">Beli Sekarang</button>
        </div>

        <div class="info-list">
          <div class="info-item"><strong>Kategori</strong><span>Seni &amp; Budaya</span></div>
          <div class="info-item"><strong>Tanggal</strong><span>13 Jun – 11 Jul 2026</span></div>
          <div class="info-item"><strong>Lokasi</strong><span>Taman Werdhi Budaya, Denpasar</span></div>
          <div class="info-item"><strong>Tiket Berlaku</strong><span>1x masuk per tanggal pilihan</span></div>
        </div>
      </div>
    </section>

    <section class="story-section">
      <div class="story-card">
        <span>Tentang Event</span>
        <h2>Perayaan budaya Bali dalam satu rangkaian acara</h2>
        <p>Pesta Kesenian Bali menghadirkan ratusan pertunjukan tari, musik gamelan, pawai budaya, dan pameran kerajinan dari seluruh kabupaten di Bali. Cocok untuk yang ingin merasakan langsung kekayaan seni dan tradisi pulau ini.</p>
      </div>
      <div class="shipping-card">
        <span>Catatan Tiket</span>
        <h2>Informasi penting sebelum datang</h2>
        <p>Tiket berlaku untuk satu kali masuk pada tanggal yang dipilih saat checkout. Tiket VIP mendapat akses ke area duduk terbaik di area pertunjukan utama. Datang lebih awal disarankan karena beberapa pertunjukan populer cepat penuh.</p>
      </div>
    </section>
  </div>
</main>

<div class="toast" id="toast"></div>

<!-- FOOTER BARU -->
<div class="footer-wrap">
  <div class="newsletter-card">
    <div class="newsletter-copy">
      <h2>Berlangganan Newsletter Kami</h2>
      <p>Jadi yang pertama tahu produk baru, cerita pengrajin, dan promo spesial dari Lokana.</p>
    </div>
    <div class="newsletter-form-wrap">
      <div class="newsletter-label">Tetap Update</div>
      <div class="newsletter-form">
        <input type="email" placeholder="Masukkan email kamu" aria-label="Email"/>
        <button type="submit">Berlangganan</button>
      </div>
      <div class="newsletter-fineprint">Dengan berlangganan, kamu menyetujui <a href="#">Kebijakan Privasi</a> kami.</div>
    </div>
  </div>

  <footer>
    <div class="footer-brand">
      <div class="brand-name">Lokana</div>
      <p>Marketplace produk lokal Bali — dari tangan pengrajin langsung ke tanganmu.</p>
    </div>
    <div class="footer-col">
      <h4>Belanja</h4>
      <div class="footer-links">
        <a href="#">Produk Lokal</a>
        <a href="#">Event &amp; Tiket</a>
        <a href="#">Kategori</a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Bantuan</h4>
      <div class="footer-links">
        <a href="#">Kontak</a>
        <a href="#">Info Pengiriman</a>
        <a href="#">FAQ</a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Legal</h4>
      <div class="footer-links">
        <a href="#">Tentang Kami</a>
        <a href="#">Kebijakan Privasi</a>
        <a href="#">Syarat &amp; Ketentuan</a>
      </div>
    </div>
    <div class="footer-bottom">© 2026 Lokana</div>
  </footer>
</div>

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

  /* ── state tiket ───────────────────────────────────────── */
  let selectedTier = 'Reguler';
  let selectedHarga = 75000;
  let quantity = 1;

  const ticketPriceEl = document.getElementById('ticketPrice');
  const quantityValueEl = document.getElementById('quantityValue');
  const visitDateEl = document.getElementById('visitDate');

  function updatePriceDisplay() {
    ticketPriceEl.textContent = formatRupiah(selectedHarga * quantity);
    quantityValueEl.textContent = quantity;
  }

  /* tier pills */
  document.querySelectorAll('#tierPills .option-pill').forEach(pill => {
    pill.addEventListener('click', () => {
      document.querySelectorAll('#tierPills .option-pill').forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
      selectedTier = pill.dataset.tier;
      selectedHarga = parseInt(pill.dataset.harga);
      updatePriceDisplay();
    });
  });

  /* qty */
  document.getElementById('increaseQty').addEventListener('click', () => {
    quantity++;
    updatePriceDisplay();
  });

  document.getElementById('decreaseQty').addEventListener('click', () => {
    if (quantity > 1) { quantity--; updatePriceDisplay(); }
  });

  /* tanggal: hapus invalid saat diisi */
  visitDateEl.addEventListener('change', () => {
    visitDateEl.classList.remove('invalid');
  });

  /* ── validasi tanggal ──────────────────────────────────── */
  function validateDate() {
    if (!visitDateEl.value) {
      visitDateEl.classList.add('invalid');
      visitDateEl.focus();
      showToast('Pilih tanggal kunjungan dulu, ya.');
      return false;
    }
    return true;
  }

  /* ── toast helper ──────────────────────────────────────── */
  const toastEl = document.getElementById('toast');
  let toastTimer;

  function showToast(msg) {
    toastEl.textContent = msg;
    toastEl.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => toastEl.classList.remove('show'), 2200);
  }

  /* ── format tanggal untuk display ─────────────────────── */
  function formatTanggal(isoDate) {
    if (!isoDate) return '';
    const [y, m, d] = isoDate.split('-');
    const bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'];
    return `${parseInt(d)} ${bulan[parseInt(m) - 1]} ${y}`;
  }

  /* ── build item tiket ──────────────────────────────────── */
  function buildItem() {
    return {
      id: 'tiket-pesta-kesenian-bali',
      nama: 'Pesta Kesenian Bali',
      kategori: 'tiket',
      harga: selectedHarga,
      qty: quantity,
      gambar: 'https://i.pinimg.com/736x/fb/6b/54/fb6b54371c86c497c1d363cb4c9b495d.jpg',
      varian: null,
      tier: selectedTier,
      tanggalEvent: formatTanggal(visitDateEl.value),
    };
  }

  // tiket (& produk sama persis, ganti nama produknya)
document.getElementById('addToCartBtn').addEventListener('click', () => {
  if (!validateDate()) return;   // khusus tiket, produk tidak perlu ini

  addToCart(buildItem());

  // Feedback visual — cegah double-add
  const btn = document.getElementById('addToCartBtn');
  btn.textContent = '✓ Ditambahkan';
  btn.disabled = true;
  btn.style.opacity = '0.6';
  btn.style.cursor = 'default';

  showToast('✓ Ditambahkan ke keranjang');

  // Reset setelah 2 detik kalau user mau ganti opsi dan tambah lagi
  setTimeout(() => {
    btn.textContent = 'Tambah ke Keranjang';
    btn.disabled = false;
    btn.style.opacity = '';
    btn.style.cursor = '';
  }, 2000);
});

  /* ── tombol beli sekarang ──────────────────────────────── */
  document.getElementById('buyNowBtn').addEventListener('click', () => {
    if (!validateDate()) return;
    addToCart(buildItem());
    window.location.href = "{{ route('keranjang') }}";
  });
})();
</script>

</body>
</html>