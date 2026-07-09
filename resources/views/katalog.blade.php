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
      max-width: 1200px;
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

    /* ── CATALOG BODY: SIDEBAR + GRID ── */
    .catalog-body {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 220px 1fr;
      gap: 36px;
      align-items: start;
    }

    /* SIDEBAR */
    .catalog-sidebar {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 22px;
      position: sticky;
      top: 88px;
    }

    .sidebar-heading {
      font-size: 0.72rem;
      font-weight: 800;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: #9a9a9a;
      margin-bottom: 14px;
    }

    .sidebar-all {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 12px;
      border-radius: 12px;
      background: #f3f0ff;
      color: var(--purple);
      text-decoration: none;
      font-size: 0.86rem;
      font-weight: 700;
      margin-bottom: 14px;
    }

    .sidebar-count {
      background: var(--purple);
      color: #fff;
      font-size: 0.68rem;
      font-weight: 700;
      padding: 2px 9px;
      border-radius: 999px;
    }

    .sidebar-sublist {
      display: flex;
      flex-direction: column;
      gap: 2px;
      margin-bottom: 18px;
    }

    .sidebar-sublist a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 9px 10px;
      border-radius: 10px;
      font-size: 0.83rem;
      font-weight: 500;
      color: var(--muted);
      text-decoration: none;
      transition: background 0.2s, color 0.2s;
    }

    .sidebar-sublist a svg {
      width: 15px;
      height: 15px;
      stroke: currentColor;
      fill: none;
      stroke-width: 1.7;
      flex-shrink: 0;
    }

    .sidebar-sublist a:hover {
      background: var(--light-bg);
      color: var(--purple);
    }

    .sidebar-divider {
      height: 1px;
      background: var(--border);
      margin: 4px 0 14px;
    }

    .sidebar-filter-group + .sidebar-filter-group {
      margin-top: 4px;
    }

    .sidebar-filter-toggle {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: none;
      border: none;
      padding: 10px 2px;
      font-family: inherit;
      font-size: 0.83rem;
      font-weight: 600;
      color: var(--text);
      cursor: pointer;
    }

    .sidebar-filter-toggle svg {
      width: 14px;
      height: 14px;
      stroke: var(--muted);
      fill: none;
      stroke-width: 2;
      transition: transform 0.2s;
    }

    .sidebar-filter-group.open .sidebar-filter-toggle svg {
      transform: rotate(180deg);
    }

    .sidebar-filter-options {
      display: none;
      flex-direction: column;
      gap: 2px;
      padding: 2px 0 8px 2px;
    }

    .sidebar-filter-group.open .sidebar-filter-options {
      display: flex;
    }

    .sidebar-filter-options a {
      font-size: 0.8rem;
      color: var(--muted);
      text-decoration: none;
      padding: 6px 10px;
      border-radius: 8px;
      transition: background 0.2s, color 0.2s;
    }

    .sidebar-filter-options a:hover {
      background: var(--light-bg);
      color: var(--purple);
    }

    /* MAIN COLUMN */
    .catalog-main { min-width: 0; }

    .catalog-toolbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 20px;
    }

    .catalog-toolbar h2 {
      font-size: 1.25rem;
      font-weight: 800;
      letter-spacing: -0.02em;
    }

    .result-count {
      font-size: 0.8rem;
      color: var(--muted);
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 22px;
    }

    .product-card {
      border: 1px solid rgba(232, 227, 220, 0.85);
      border-radius: 22px;
      overflow: hidden;
      background: var(--white);
      transition: box-shadow 0.25s, transform 0.25s;
      cursor: pointer;
    }

    .product-card:hover {
      box-shadow: 0 12px 40px rgba(0,0,0,0.09);
      transform: translateY(-4px);
    }

    .product-img-wrap {
      position: relative;
    }

    .product-img {
      width: 100%;
      aspect-ratio: 4/3;
      object-fit: cover;
      display: block;
      background: #eee;
    }

    .product-badge {
      position: absolute;
      top: 12px;
      right: 12px;
      z-index: 2;
      font-size: 0.66rem;
      font-weight: 700;
      letter-spacing: 0.02em;
      color: var(--purple);
      background: rgba(255,255,255,0.92);
      backdrop-filter: blur(4px);
      padding: 5px 12px;
      border-radius: 999px;
    }

    .product-info {
      padding: 18px 20px 20px;
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
      margin-bottom: 14px;
    }

    .product-meta-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 16px;
    }

    .product-rating {
      font-size: 0.76rem;
      color: #8a8a8a;
    }

    .price {
      font-size: 1rem;
      font-weight: 800;
      color: var(--purple);
    }

    /* ── DUAL BUTTON PATTERN ── */
    .product-actions {
      display: flex;
      gap: 8px;
    }

    .btn-add,
    .btn-buy {
      flex: 1;
      font-family: inherit;
      font-size: 0.78rem;
      font-weight: 700;
      padding: 10px 12px;
      border-radius: 999px;
      cursor: pointer;
      text-align: center;
      white-space: nowrap;
      transition: background 0.2s, color 0.2s, transform 0.2s, box-shadow 0.2s;
    }

    .btn-add {
      background: var(--white);
      color: var(--text);
      border: 1.5px solid var(--border);
    }

    .btn-add:hover {
      border-color: var(--purple);
      color: var(--purple);
      background: #f8f6ff;
    }

    .btn-buy {
      background: var(--purple);
      color: #fff;
      border: none;
      box-shadow: 0 8px 20px rgba(91,63,217,0.28);
    }

    .btn-buy:hover {
      background: var(--purple-dark);
      transform: translateY(-1px);
      box-shadow: 0 10px 24px rgba(91,63,217,0.36);
    }

    /* PAGINATION */
    .pagination {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 36px;
      padding-top: 24px;
      border-top: 1px solid var(--border);
    }

    .pagination-nav {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 0.82rem;
      font-weight: 600;
      color: var(--text);
      text-decoration: none;
      cursor: pointer;
    }

    .pagination-nav svg {
      width: 16px;
      height: 16px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
    }

    .pagination-pages {
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .pagination-pages span,
    .pagination-pages a {
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 999px;
      font-size: 0.82rem;
      font-weight: 600;
      color: var(--muted);
      text-decoration: none;
    }

    .pagination-pages a.active {
      background: var(--purple);
      color: #fff;
    }

    .pagination-pages a:hover:not(.active) {
      background: var(--light-bg);
      color: var(--purple);
    }

    .feature-banner {
      max-width: 1200px;
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

    /* ── FOOTER (matched to home page) ── */
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
      padding: 56px 0 32px;
      display: grid;
      grid-template-columns: 1.4fr 1fr 1fr 1fr;
      gap: 32px;
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

    @media (max-width: 1024px) {
      .catalog-body {
        grid-template-columns: 190px 1fr;
        gap: 24px;
      }
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

      .catalog-body {
        grid-template-columns: 1fr;
      }

      .catalog-sidebar {
        position: static;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
        padding: 16px;
      }

      .sidebar-heading { display: none; }
      .sidebar-all { margin-bottom: 0; }
      .sidebar-sublist {
        flex-direction: row;
        flex-wrap: wrap;
        margin-bottom: 0;
        gap: 8px;
      }
      .sidebar-sublist a {
        border: 1px solid var(--border);
        border-radius: 999px;
        padding: 7px 14px;
      }
      .sidebar-divider,
      .sidebar-filter-group {
        display: none;
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

      .footer-wrap { padding: 0 24px 32px; }
      .newsletter-card { grid-template-columns: 1fr; padding: 36px 32px; gap: 28px; }
      footer { grid-template-columns: 1fr 1fr; }
    }

    @media (max-width: 580px) {
      nav { padding: 0 20px; }

      .catalog-page {
        padding: 96px 20px 44px;
      }

      .catalog-header {
        margin-bottom: 20px;
      }

      .catalog-title h1 {
        font-size: 2rem;
      }

      .catalog-sidebar {
        overflow-x: auto;
        flex-wrap: nowrap;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
      }
      .catalog-sidebar::-webkit-scrollbar { display: none; }
      .sidebar-all,
      .sidebar-sublist a { flex-shrink: 0; }

      .catalog-toolbar {
        align-items: flex-start;
        flex-direction: column;
        gap: 6px;
      }

      .product-grid {
        grid-template-columns: 1fr;
        gap: 14px;
      }

      .product-card {
        display: flex;
        flex-direction: row;
      }

      .product-img-wrap {
        width: 120px;
        min-width: 120px;
      }

      .product-img {
        width: 120px;
        min-width: 120px;
        aspect-ratio: 1/1;
      }

      .product-badge {
        top: 8px;
        right: 8px;
        font-size: 0.58rem;
        padding: 4px 9px;
      }

      .product-info {
        padding: 12px 14px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      .product-info p {
        display: none;
      }

      .product-meta-row {
        margin-bottom: 10px;
      }

      .product-actions {
        flex-direction: column;
        gap: 6px;
      }

      .pagination {
        flex-wrap: wrap;
        gap: 12px;
      }

      .feature-banner-content {
        padding: 28px;
      }

      .feature-banner img {
        min-height: 220px;
      }

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

<!-- NAV -->
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
      <h1>Sentuhan Bali untuk Ruang dan Dirimu</h1>
      <p>
Membawa esensi Bali ke dalam keseharian kini lebih dekat. Temukan ragam produk terkurasi—dari helai benang wastra penuh makna hingga aroma self-care yang menenangkan—semuanya lahir dari dedikasi terbaik brand lokal dan UMKM pilihan    </div>

    <div class="search-box">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      <input type="text" placeholder="Cari produk lokal..." />
    </div>
  </section>

  <div class="catalog-body">

    <!-- SIDEBAR -->
    <aside class="catalog-sidebar">
      <div class="sidebar-heading">Kategori</div>

      <a href="#" class="sidebar-all">
        <span>Semua Produk</span>
        <span class="sidebar-count">24</span>
      </a>

      <div class="sidebar-sublist">
        <a href="#">
          <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7"/><path d="M9 22V12h6v10"/></svg>
          Fashion Lokal
        </a>
        <a href="#">
          <svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
          Kopi & Minuman
        </a>
        <a href="#">
          <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
          Self-care
        </a>
        <a href="#">
          <svg viewBox="0 0 24 24"><path d="M20 12v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7"/><path d="M22 7H2v5h20V7z"/><path d="M12 22V7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
          Oleh-Oleh
        </a>
        <a href="#">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg>
          Kerajinan Handmade
        </a>
      </div>

      <div class="sidebar-divider"></div>

      <div class="sidebar-filter-group open">
        <button class="sidebar-filter-toggle" type="button" onclick="this.parentElement.classList.toggle('open')">
          Urutkan
          <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="sidebar-filter-options">
          <a href="#">Terbaru</a>
          <a href="#">Harga Terendah</a>
          <a href="#">Harga Tertinggi</a>
          <a href="#">Paling Banyak Dicari</a>
        </div>
      </div>

      <div class="sidebar-filter-group">
        <button class="sidebar-filter-toggle" type="button" onclick="this.parentElement.classList.toggle('open')">
          Status
          <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="sidebar-filter-options">
          <a href="#">Baru</a>
          <a href="#">Terlaris</a>
          <a href="#">Diskon</a>
        </div>
      </div>
    </aside>

    <!-- MAIN GRID -->
    <div class="catalog-main">
      <div class="catalog-toolbar">
        <h2>Semua Produk</h2>
        <span class="result-count">24 produk ditemukan</span>
      </div>

      <section class="product-grid">

        <div class="product-card" onclick="window.location.href='{{ route('produk.scarf_endek') }}'">
          <div class="product-img-wrap">
            <span class="product-badge">Fashion Lokal</span>
            <img class="product-img" src="https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg" alt="Scarf Endek Bali Handmade"/>
          </div>
          <div class="product-info">
            <h3>Scarf Endek Bali Handmade</h3>
            <p>Dibuat dari kain Endek pilihan dengan motif clean minimalis, cocok melengkapi tampilan kasual maupun semi-formal.</p>
            <div class="product-meta-row">
              <span class="product-rating">★ 4.8 · 120 terjual</span>
              <span class="price">Rp 250.000</span>
            </div>
            <div class="product-actions">
              <button class="btn-add" type="button" onclick="event.stopPropagation()">+ Keranjang</button>
              <button class="btn-buy" type="button" onclick="event.stopPropagation()">Beli Sekarang</button>
            </div>
          </div>
        </div>

        <div class="product-card" onclick="window.location.href='{{ route('produk.kintamani_coffee') }}'">
          <div class="product-img-wrap">
            <span class="product-badge">Kopi & Minuman</span>
            <img class="product-img" src="https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg" alt="Kintamani Coffee"/>
          </div>
          <div class="product-info">
            <h3>Kintamani Coffee</h3>
            <p>Kopi arabika dari dataran tinggi Bali dengan karakter rasa yang ringan, segar, dan cocok buat seduhan harian.</p>
            <div class="product-meta-row">
              <span class="product-rating">★ 4.9 · 85 terjual</span>
              <span class="price">Rp 65.000</span>
            </div>
            <div class="product-actions">
              <button class="btn-add" type="button" onclick="event.stopPropagation()">+ Keranjang</button>
              <button class="btn-buy" type="button" onclick="event.stopPropagation()">Beli Sekarang</button>
            </div>
          </div>
        </div>

        <div class="product-card">
          <div class="product-img-wrap">
            <span class="product-badge">Self-care</span>
            <img class="product-img" src="https://i.pinimg.com/736x/a9/84/83/a9848382e0f00383dc3a020ddae17ca0.jpg" alt="Essential Oil Bali"/>
          </div>
          <div class="product-info">
            <h3>Essential Oil Bali</h3>
            <p>Aroma natural dengan karakter tropis yang ringan. Cocok untuk relaksasi, diffuser, atau pelengkap rutinitas harian.</p>
            <div class="product-meta-row">
              <span class="product-rating">★ 4.7 · 73 terjual</span>
              <span class="price">Rp 150.000</span>
            </div>
            <div class="product-actions">
              <button class="btn-add" type="button">+ Keranjang</button>
              <button class="btn-buy" type="button">Beli Sekarang</button>
            </div>
          </div>
        </div>

        <div class="product-card">
          <div class="product-img-wrap">
            <span class="product-badge">Fashion Lokal</span>
            <img class="product-img" src="https://i.pinimg.com/736x/e2/09/38/e20938d213c820fd70d01cc121501ccb.jpg" alt="Beach Jewelry"/>
          </div>
          <div class="product-info">
            <h3>Beach Jewelry</h3>
            <p>Aksesori bernuansa pantai dengan detail simpel yang mudah dipakai harian. Ringan, manis, dan cocok buat nambah sentuhan summer look.</p>
            <div class="product-meta-row">
              <span class="product-rating">★ 4.8 · 210 terjual</span>
              <span class="price">Rp 115.000</span>
            </div>
            <div class="product-actions">
              <button class="btn-add" type="button">+ Keranjang</button>
              <button class="btn-buy" type="button">Beli Sekarang</button>
            </div>
          </div>
        </div>

        <div class="product-card">
          <div class="product-img-wrap">
            <span class="product-badge">Oleh-Oleh</span>
            <img class="product-img" src="https://i.pinimg.com/736x/50/fd/aa/50fdaa7ad7ae0c1b77979bbaa76b3604.jpg" alt="Kayu Bowls"/>
          </div>
          <div class="product-info">
            <h3>Kayu Bowls</h3>
            <p>Mangkuk kayu handmade dengan finishing natural. Cocok untuk plating buah, snack, atau dekor meja dengan tone lebih warm.</p>
            <div class="product-meta-row">
              <span class="product-rating">★ 4.7 · 160 terjual</span>
              <span class="price">Rp 62.000</span>
            </div>
            <div class="product-actions">
              <button class="btn-add" type="button">+ Keranjang</button>
              <button class="btn-buy" type="button">Beli Sekarang</button>
            </div>
          </div>
        </div>

        <div class="product-card">
          <div class="product-img-wrap">
            <span class="product-badge">Kerajinan Handmade</span>
            <img class="product-img" src="https://i.pinimg.com/736x/8b/f0/71/8bf07143983397c98a31f74da77f1b53.jpg" alt="Beaded Basket"/>
          </div>
          <div class="product-info">
            <h3>Beaded Basket</h3>
            <p>Keranjang handmade dengan detail manik yang playful dan rapi. Bisa jadi statement piece buat outfit santai atau liburan.</p>
            <div class="product-meta-row">
              <span class="product-rating">★ 4.9 · 92 terjual</span>
              <span class="price">Rp 50.000</span>
            </div>
            <div class="product-actions">
              <button class="btn-add" type="button">+ Keranjang</button>
              <button class="btn-buy" type="button">Beli Sekarang</button>
            </div>
          </div>
        </div>

      </section>

      <div class="pagination">
        <a href="#" class="pagination-nav">
          <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
          Previous
        </a>
        <div class="pagination-pages">
          <a href="#" class="active">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <span>...</span>
          <a href="#">8</a>
        </div>
        <a href="#" class="pagination-nav">
          Next
          <svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </div>
    </div>
  </div>

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