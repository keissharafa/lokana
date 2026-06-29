<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Artikel - Lokana Admin</title>

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --purple:      #5B3DF5;
      --purple-dark: #4730D0;
      --purple-soft: #f0edff;
      --purple-mid:  #e4deff;
      --text:        #111827;
      --muted:       #6b7280;
      --subtle:      #9ca3af;
      --light-bg:    #f3f4f8;
      --white:       #ffffff;
      --border:      #e5e7eb;
      --border-sub:  #f1f1f4;
      --green:       #059669;
      --green-bg:    #ecfdf5;
      --orange:      #d97706;
      --orange-bg:   #fffbeb;
      --red:         #dc2626;
      --red-bg:      #fef2f2;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--light-bg);
      color: var(--text);
      overflow-x: hidden;
    }

    /* ── Layout ── */
    .admin-layout {
      display: grid;
      grid-template-columns: 220px 1fr;
      min-height: 100vh;
    }

    /* ── Sidebar ── */
    .sidebar {
      position: sticky;
      top: 0;
      height: 100vh;
      background: var(--white);
      border-right: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      overflow-y: auto;
    }

    .sidebar-top {
      padding: 22px 16px 18px;
      border-bottom: 1px solid var(--border);
    }

    .brand {
      font-size: 1.05rem;
      font-weight: 800;
      color: var(--text);
      text-decoration: none;
      letter-spacing: -0.03em;
      display: flex;
      align-items: center;
      gap: 9px;
    }

    .brand-icon {
      width: 30px;
      height: 30px;
      background: var(--purple);
      border-radius: 8px;
      display: grid;
      place-items: center;
      flex-shrink: 0;
    }

    .brand-icon svg {
      width: 16px;
      height: 16px;
      stroke: #fff;
      fill: none;
      stroke-width: 1.5;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .sidebar-nav {
      flex: 1;
      padding: 14px 10px;
    }

    .nav-section-label {
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #c0c4cc;
      padding: 0 8px;
      margin: 10px 0 6px;
    }

    .nav-section-label:first-child { margin-top: 0; }

    .side-nav { display: grid; gap: 2px; }

    .side-nav a {
      text-decoration: none;
      color: var(--muted);
      font-size: 0.84rem;
      font-weight: 600;
      padding: 9px 10px;
      border-radius: 9px;
      transition: all 0.15s;
      display: flex;
      align-items: center;
      gap: 9px;
    }

    .side-nav a svg {
      width: 16px;
      height: 16px;
      stroke: currentColor;
      fill: none;
      stroke-width: 1.5;
      stroke-linecap: round;
      stroke-linejoin: round;
      flex-shrink: 0;
      opacity: 0.7;
    }

    .side-nav a:hover { color: var(--purple); background: var(--purple-soft); }
    .side-nav a:hover svg { opacity: 1; }
    .side-nav a.active { color: var(--purple); background: var(--purple-soft); font-weight: 700; }
    .side-nav a.active svg { opacity: 1; }

    .sidebar-footer {
      padding: 14px 16px;
      border-top: 1px solid var(--border);
    }

    .admin-info {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
    }

    .admin-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: var(--purple-soft);
      color: var(--purple);
      font-weight: 800;
      font-size: 0.78rem;
      display: grid;
      place-items: center;
      flex-shrink: 0;
    }

    .admin-info-text strong {
      display: block;
      font-size: 0.82rem;
      font-weight: 700;
      color: var(--text);
    }

    .admin-info-text span {
      font-size: 0.7rem;
      color: var(--subtle);
    }

    .logout {
      color: var(--red);
      font-weight: 700;
      font-size: 0.8rem;
      padding: 8px 12px;
      border-radius: 8px;
      background: var(--red-bg);
      display: flex;
      align-items: center;
      gap: 7px;
      transition: opacity 0.15s;
      width: 100%;
      border: none;
      cursor: pointer;
      font-family: inherit;
      text-decoration: none;
    }

    .logout svg {
      width: 15px;
      height: 15px;
      stroke: var(--red);
      fill: none;
      stroke-width: 1.5;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .logout:hover { opacity: 0.75; }

    /* ── Content Wrap ── */
    .content-wrap {
      display: flex;
      flex-direction: column;
      min-width: 0;
    }

    /* ── Topbar ── */
    .topbar {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(255,255,255,0.92);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border);
      height: 58px;
      padding: 0 36px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
    }

    .breadcrumb {
      font-size: 0.82rem;
      color: var(--subtle);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .breadcrumb span { font-weight: 600; color: var(--text); }

    .breadcrumb svg {
      width: 12px;
      height: 12px;
      stroke: var(--subtle);
      fill: none;
      stroke-width: 1.5;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .topbar-right { display: flex; align-items: center; gap: 14px; }

    .admin-badge {
      background: var(--purple-soft);
      border-radius: 999px;
      padding: 6px 13px;
      font-size: 0.76rem;
      color: var(--purple);
      font-weight: 700;
      white-space: nowrap;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .admin-badge::before {
      content: '';
      width: 6px;
      height: 6px;
      background: var(--purple);
      border-radius: 50%;
    }

    /* ── Content ── */
    .content { padding: 32px 36px 64px; }

    /* ── Page Heading ── */
    .page-heading {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 24px;
      margin-bottom: 24px;
    }

    .page-heading-text h1 {
      font-size: clamp(1.6rem, 3vw, 2.2rem);
      font-weight: 800;
      letter-spacing: -0.05em;
      margin-bottom: 6px;
    }

    .page-heading-text p {
      color: var(--muted);
      font-size: 0.88rem;
      line-height: 1.65;
    }

    /* ── Buttons ── */
    .btn-primary {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      height: 40px;
      padding: 0 18px;
      border-radius: 9px;
      background: var(--purple);
      color: var(--white);
      font-family: inherit;
      font-weight: 700;
      font-size: 0.82rem;
      border: none;
      cursor: pointer;
      white-space: nowrap;
      flex-shrink: 0;
      transition: background 0.18s;
    }

    .btn-primary svg {
      width: 14px;
      height: 14px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .btn-primary:hover { background: var(--purple-dark); }

    /* ── Toolbar ── */
    .toolbar {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 12px 16px;
      margin-bottom: 14px;
      display: flex;
      gap: 12px;
      align-items: center;
    }

    .search-wrap { flex: 1; max-width: 360px; }

    .search-box {
      width: 100%;
      height: 36px;
      border: 1px solid var(--border);
      border-radius: 8px;
      padding: 0 12px 0 34px;
      font-family: inherit;
      font-size: 0.82rem;
      outline: none;
      color: var(--text);
      transition: border-color 0.18s, background-color 0.18s;
      background-color: var(--light-bg);
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='none' viewBox='0 0 24 24'%3E%3Cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: 10px center;
    }

    .search-box:focus { border-color: var(--purple); background-color: var(--white); }
    .search-box::placeholder { color: var(--subtle); }

    .filter-select {
      height: 36px;
      border: 1px solid var(--border);
      border-radius: 8px;
      padding: 0 10px;
      font-family: inherit;
      font-size: 0.8rem;
      color: var(--muted);
      background-color: var(--light-bg);
      outline: none;
      cursor: pointer;
      transition: border-color 0.18s;
    }

    .filter-select:focus { border-color: var(--purple); }

    .count-badge {
      margin-left: auto;
      font-size: 0.75rem;
      color: var(--subtle);
      font-weight: 600;
      white-space: nowrap;
    }

    /* ── Article Grid ── */
    .article-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }

    /* ── Article Card ── */
    .article-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 16px;
      overflow: hidden;
      transition: box-shadow 0.18s, transform 0.18s;
    }

    .article-card:hover {
      box-shadow: 0 6px 24px rgba(0,0,0,0.07);
      transform: translateY(-2px);
    }

    .article-thumb {
      width: 100%;
      aspect-ratio: 16/9;
      object-fit: cover;
      display: block;
      background: var(--light-bg);
    }

    .article-body { padding: 14px 16px 16px; }

    .article-meta {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      margin-bottom: 9px;
    }

    /* tag badge — sama sistem dengan badge-cat di kelola produk */
    .tag-badge {
      display: inline-flex;
      padding: 4px 9px;
      border-radius: 7px;
      background: var(--purple-soft);
      color: var(--purple);
      font-size: 0.68rem;
      font-weight: 700;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      white-space: nowrap;
    }

    .article-date {
      font-size: 0.7rem;
      color: var(--subtle);
      font-weight: 500;
      white-space: nowrap;
    }

    .article-title {
      font-size: 0.9rem;
      font-weight: 700;
      line-height: 1.35;
      letter-spacing: -0.01em;
      color: var(--text);
      margin-bottom: 7px;
    }

    .article-excerpt {
      font-size: 0.76rem;
      color: var(--muted);
      line-height: 1.55;
      margin-bottom: 13px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .article-actions {
      display: flex;
      gap: 6px;
      padding-top: 11px;
      border-top: 1px solid var(--border-sub);
    }

    .btn-edit, .btn-delete {
      border: none;
      height: 30px;
      padding: 0 11px;
      border-radius: 7px;
      font-family: inherit;
      font-size: 0.75rem;
      font-weight: 700;
      cursor: pointer;
      transition: opacity 0.15s;
    }

    .btn-edit   { color: var(--purple); background: var(--purple-soft); }
    .btn-delete { color: var(--red);    background: var(--red-bg); }
    .btn-edit:hover, .btn-delete:hover { opacity: 0.7; }

    /* ── Empty State ── */
    .empty-state {
      display: none;
      padding: 56px 24px;
      text-align: center;
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 18px;
    }

    .empty-state .empty-icon { font-size: 2rem; margin-bottom: 10px; }
    .empty-state strong { display: block; font-size: 0.9rem; color: var(--text); margin-bottom: 5px; }
    .empty-state p { font-size: 0.82rem; color: var(--subtle); }

    /* ── Modal ── */
    .modal {
      position: fixed;
      inset: 0;
      z-index: 500;
      background: rgba(17,24,39,0.45);
      display: none;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    .modal.show { display: flex; }

    .modal-box {
      width: 100%;
      max-width: 580px;
      max-height: 92vh;
      overflow-y: auto;
      background: var(--white);
      border-radius: 20px;
      padding: 28px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.18);
    }

    .modal-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 22px;
    }

    .modal-header h2 {
      font-size: 1.3rem;
      font-weight: 800;
      letter-spacing: -0.04em;
      margin-bottom: 4px;
    }

    .modal-header p { color: var(--muted); font-size: 0.82rem; }

    .close-btn {
      border: none;
      width: 34px;
      height: 34px;
      border-radius: 9px;
      background: var(--light-bg);
      cursor: pointer;
      color: var(--muted);
      display: grid;
      place-items: center;
      flex-shrink: 0;
      transition: background 0.15s;
      font-size: 1rem;
    }

    .close-btn:hover { background: var(--border); }

    /* ── Form ── */
    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }

    .form-group.full { grid-column: 1 / -1; }

    label {
      display: block;
      font-size: 0.75rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 6px;
    }

    input[type="text"],
    input[type="date"],
    input[type="url"],
    select,
    textarea {
      width: 100%;
      border: 1px solid var(--border);
      border-radius: 9px;
      padding: 10px 12px;
      font-family: inherit;
      font-size: 0.84rem;
      outline: none;
      background: var(--white);
      color: var(--text);
      transition: border-color 0.18s;
    }

    textarea { min-height: 80px; resize: vertical; }
    input:focus, select:focus, textarea:focus { border-color: var(--purple); }

    /* image preview */
    .img-preview-wrap {
      margin-top: 10px;
      border-radius: 9px;
      overflow: hidden;
      border: 1px solid var(--border);
      display: none;
    }

    .img-preview-wrap.show { display: block; }

    .img-preview {
      width: 100%;
      height: 130px;
      object-fit: cover;
      display: block;
    }

    .modal-actions {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-top: 22px;
      padding-top: 18px;
      border-top: 1px solid var(--border);
    }

    .btn-cancel {
      border: 1px solid var(--border);
      background: var(--white);
      color: var(--muted);
      height: 40px;
      padding: 0 16px;
      border-radius: 9px;
      font-family: inherit;
      font-weight: 700;
      font-size: 0.82rem;
      cursor: pointer;
      transition: background 0.15s;
    }

    .btn-cancel:hover { background: var(--light-bg); }

    .btn-save {
      border: none;
      background: var(--purple);
      color: var(--white);
      height: 40px;
      padding: 0 20px;
      border-radius: 9px;
      font-family: inherit;
      font-weight: 700;
      font-size: 0.82rem;
      cursor: pointer;
      transition: background 0.18s;
    }

    .btn-save:hover { background: var(--purple-dark); }

    /* ── Toast ── */
    .toast {
      position: fixed;
      right: 24px;
      bottom: 24px;
      background: var(--text);
      color: var(--white);
      padding: 12px 16px;
      border-radius: 11px;
      font-size: 0.82rem;
      font-weight: 600;
      opacity: 0;
      transform: translateY(8px);
      pointer-events: none;
      transition: all 0.22s;
      z-index: 600;
    }

    .toast.show { opacity: 1; transform: translateY(0); }

    /* ── Responsive ── */
    @media (max-width: 1200px) {
      .article-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 1100px) {
      .admin-layout { grid-template-columns: 1fr; }
      .sidebar {
        position: static;
        height: auto;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        gap: 16px;
        padding: 14px 20px;
      }
      .sidebar-top { padding: 0; border: none; }
      .sidebar-nav { padding: 0; flex: none; }
      .side-nav { grid-auto-flow: column; gap: 4px; }
      .sidebar-footer { display: none; }
      .topbar { padding: 0 20px; }
      .content { padding: 24px 20px 48px; }
    }

    @media (max-width: 640px) {
      .article-grid { grid-template-columns: 1fr; }
      .page-heading { flex-direction: column; align-items: stretch; }
      .btn-primary { width: 100%; justify-content: center; }
      .toolbar { flex-wrap: wrap; }
      .search-wrap { max-width: 100%; width: 100%; }
      .form-grid { grid-template-columns: 1fr; }
      .modal-actions { flex-direction: column-reverse; }
      .btn-cancel, .btn-save { width: 100%; }
    }
  </style>
</head>
<body>

<div class="admin-layout">

  <!-- ── Sidebar ── -->
  <aside class="sidebar">
    <div class="sidebar-top">
      <a href="{{ route('admin.dashboard') }}" class="brand">
        <div class="brand-icon">
          <svg viewBox="0 0 24 24" fill="none"><path stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
        </div>
        Lokana Admin
      </a>
    </div>

    <div class="sidebar-nav">
      <div class="nav-section-label">Menu Utama</div>
      <nav class="side-nav">
        <a href="{{ route('admin.dashboard') }}">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
          Dashboard
        </a>
        <a href="{{ route('admin.produk') }}">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
          Kelola Produk
        </a>
        <a href="{{ route('admin.artikel') }}" class="active">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
          Kelola Artikel
        </a>
        <a href="{{ route('admin.pengguna') }}">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
          Kelola Pengguna
        </a>
        <a href="{{ route('admin.transaksi') }}">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/></svg>
          Kelola Transaksi
        </a>
      </nav>
    </div>

    <div class="sidebar-footer">
      <div class="admin-info">
        <div class="admin-avatar">A</div>
        <div class="admin-info-text">
          <strong>{{ session('admin_name', 'Admin Lokana') }}</strong>
          <span>Administrator</span>
        </div>
      </div>
      <a href="{{ route('admin.logout') }}" class="logout">
        <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/></svg>
        Logout
      </a>
    </div>
  </aside>

  <!-- ── Content Wrap ── -->
  <div class="content-wrap">

    <header class="topbar">
      <div class="breadcrumb">
        Pages
        <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
        <span>Kelola Artikel</span>
      </div>
      <div class="topbar-right">
        <div class="admin-badge">{{ session('admin_name', 'Admin Lokana') }}</div>
      </div>
    </header>

    <main class="content">

      <div class="page-heading">
        <div class="page-heading-text">
          <h1>Kelola Artikel</h1>
          <p>Manajemen konten Jurnal Lokana — tambah, edit, dan hapus artikel yang tampil di halaman user.</p>
        </div>
        <button class="btn-primary" id="openAddModal">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
          Tambah Artikel
        </button>
      </div>

      <!-- Toolbar -->
      <div class="toolbar">
        <div class="search-wrap">
          <input type="text" class="search-box" id="searchInput" placeholder="Cari judul atau deskripsi…">
        </div>
        <select class="filter-select" id="filterTag">
          <option value="">Semua Kategori</option>
          <option value="Budaya">Budaya</option>
          <option value="Pengrajin Lokal">Pengrajin Lokal</option>
          <option value="Kuliner">Kuliner</option>
          <option value="Cerita Produk">Cerita Produk</option>
          <option value="Lifestyle">Lifestyle</option>
          <option value="UMKM">UMKM</option>
        </select>
        <span class="count-badge" id="countBadge">6 artikel</span>
      </div>

      <!-- Article Grid -->
      <div class="article-grid" id="articleGrid"></div>

      <div class="empty-state" id="emptyState">
        <div class="empty-icon">📝</div>
        <strong>Tidak ada artikel ditemukan</strong>
        <p>Coba ubah kata kunci atau filter kategori.</p>
      </div>

    </main>
  </div>
</div>

<!-- ── Modal ── -->
<div class="modal" id="articleModal">
  <div class="modal-box">
    <div class="modal-header">
      <div>
        <h2 id="modalTitle">Tambah Artikel</h2>
        <p>Isi data artikel yang akan tampil di Jurnal Lokana.</p>
      </div>
      <button class="close-btn" id="closeModal" type="button">✕</button>
    </div>

    <div class="form-grid">
      <input type="hidden" id="articleId">

      <div class="form-group full">
        <label>Judul Artikel</label>
        <input type="text" id="articleTitle" placeholder="contoh: Endek Bali dalam Gaya Hidup Modern">
      </div>

      <div class="form-group">
        <label>Kategori</label>
        <select id="articleTag">
          <option value="Budaya">Budaya</option>
          <option value="Pengrajin Lokal">Pengrajin Lokal</option>
          <option value="Kuliner">Kuliner</option>
          <option value="Cerita Produk">Cerita Produk</option>
          <option value="Lifestyle">Lifestyle</option>
          <option value="UMKM">UMKM</option>
        </select>
      </div>

      <div class="form-group">
        <label>Tanggal Terbit</label>
        <input type="date" id="articleDate">
      </div>

      <div class="form-group full">
        <label>URL Gambar</label>
        <input type="url" id="articleImage" placeholder="https://…">
        <div class="img-preview-wrap" id="imgPreviewWrap">
          <img class="img-preview" id="imgPreview" src="" alt="Preview">
        </div>
      </div>

      <div class="form-group full">
        <label>Deskripsi Singkat</label>
        <textarea id="articleExcerpt" placeholder="Ringkasan artikel yang muncul di kartu…"></textarea>
      </div>
    </div>

    <div class="modal-actions">
      <button type="button" class="btn-cancel" id="cancelModal">Batal</button>
      <button type="button" class="btn-save"   id="saveArticle">Simpan Artikel</button>
    </div>
  </div>
</div>

<!-- ── Toast ── -->
<div class="toast" id="toast"></div>

<script>
  const STORAGE_KEY = 'lokana_articles';

  const defaultArticles = [
    { id: 1, title: 'Endek Bali dalam Gaya Hidup Modern', tag: 'Budaya', date: '2026-05-10',
      image: 'https://i.pinimg.com/1200x/71/64/04/716404ae798ba8c4f8b98762a31b97ca.jpg',
      excerpt: 'Kain Endek tidak hanya hadir sebagai warisan budaya, tetapi juga berkembang menjadi bagian dari fashion, desain, dan produk lokal Bali hari ini.' },
    { id: 2, title: 'Di Balik Produk Anyaman Bali', tag: 'Pengrajin Lokal', date: '2026-05-03',
      image: 'https://i.pinimg.com/1200x/fb/bd/51/fbbd512d4d47f937e8a40f877aff92e4.jpg',
      excerpt: 'Dari pemilihan material hingga proses pengerjaan manual, produk anyaman Bali menunjukkan bagaimana detail kecil bisa membentuk nilai sebuah karya.' },
    { id: 3, title: 'Rasa Lokal Bali dalam Satu Sajian', tag: 'Kuliner', date: '2026-04-22',
      image: 'https://i.pinimg.com/736x/0b/42/7b/0b427b1e0a03fbf8724ab701497a1729.jpg',
      excerpt: 'Dari sambal matah, sate lilit, sampai lawar khas Bali, setiap sajian membawa rasa yang dekat dengan rumah makan lokal dan dapur keluarga.' },
    { id: 4, title: 'Kopi Kintamani dan Nilai di Balik Asalnya', tag: 'Cerita Produk', date: '2026-04-15',
      image: 'https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg',
      excerpt: 'Lebih dari sekadar komoditas, kopi Kintamani membawa identitas wilayah, proses tanam, dan karakter rasa yang membuatnya dikenal luas.' },
    { id: 5, title: 'Aromaterapi Bali sebagai Produk Lifestyle', tag: 'Lifestyle', date: '2026-04-08',
      image: 'https://i.pinimg.com/736x/fe/66/70/fe667071d2d5c77d3c7acca6cbfc0dda.jpg',
      excerpt: 'Produk spa dan aromaterapi Bali berkembang karena menggabungkan bahan natural, pengalaman relaksasi, dan citra tropis yang kuat.' },
    { id: 6, title: 'UMKM Bali dan Peluang Pasar Digital', tag: 'UMKM', date: '2026-04-01',
      image: 'https://i.pinimg.com/736x/c9/4d/73/c94d73c341a1bf089cbfbba17e3a6067.jpg',
      excerpt: 'Digitalisasi membuka ruang baru bagi produk lokal Bali untuk ditemukan lebih luas, tanpa menghilangkan karakter dan kualitas produksinya.' }
  ];

  function getArticles() {
    const stored = localStorage.getItem(STORAGE_KEY);
    if (!stored) { localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultArticles)); return defaultArticles; }
    const parsed = JSON.parse(stored);
    if (!Array.isArray(parsed) || parsed.length === 0) {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultArticles)); return defaultArticles;
    }
    return parsed;
  }

  function saveArticles(a) { localStorage.setItem(STORAGE_KEY, JSON.stringify(a)); }

  function formatDate(s) {
    if (!s) return '—';
    const d = new Date(s);
    const m = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    return `${d.getDate()} ${m[d.getMonth()]} ${d.getFullYear()}`;
  }

  function showToast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 2400);
  }

  // ── Render ──
  function renderArticles() {
    const keyword   = document.getElementById('searchInput').value.toLowerCase().trim();
    const tagFilter = document.getElementById('filterTag').value;
    const articles  = getArticles();

    const filtered = articles.filter(a => {
      const kw = a.title.toLowerCase().includes(keyword) || a.excerpt.toLowerCase().includes(keyword);
      const tg = tagFilter ? a.tag === tagFilter : true;
      return kw && tg;
    });

    const grid  = document.getElementById('articleGrid');
    const empty = document.getElementById('emptyState');
    const count = document.getElementById('countBadge');

    grid.innerHTML = '';
    count.textContent = (keyword || tagFilter)
      ? `${filtered.length} dari ${articles.length} artikel`
      : `${articles.length} artikel`;

    if (filtered.length === 0) {
      grid.style.display = 'none';
      empty.style.display = 'block';
      return;
    }

    grid.style.display = 'grid';
    empty.style.display = 'none';

    filtered.forEach(a => {
      const card = document.createElement('div');
      card.className = 'article-card';
      card.innerHTML = `
        <img class="article-thumb" src="${a.image}" alt="${a.title}" onerror="this.src='https://via.placeholder.com/400x225?text=%F0%9F%93%9D'">
        <div class="article-body">
          <div class="article-meta">
            <span class="tag-badge">${a.tag}</span>
            <span class="article-date">${formatDate(a.date)}</span>
          </div>
          <div class="article-title">${a.title}</div>
          <div class="article-excerpt">${a.excerpt}</div>
          <div class="article-actions">
            <button class="btn-edit"   onclick="editArticle(${a.id})">Edit</button>
            <button class="btn-delete" onclick="deleteArticle(${a.id})">Hapus</button>
          </div>
        </div>
      `;
      grid.appendChild(card);
    });
  }

  // ── Modal ──
  function openModal(mode = 'add') {
    document.getElementById('articleModal').classList.add('show');
    document.body.style.overflow = 'hidden';
    if (mode === 'add') {
      document.getElementById('modalTitle').textContent = 'Tambah Artikel';
      ['articleId','articleTitle','articleImage','articleExcerpt'].forEach(id => document.getElementById(id).value = '');
      document.getElementById('articleTag').value  = 'Budaya';
      document.getElementById('articleDate').value = new Date().toISOString().slice(0,10);
      document.getElementById('imgPreviewWrap').classList.remove('show');
    }
  }

  function closeModalFn() {
    document.getElementById('articleModal').classList.remove('show');
    document.body.style.overflow = '';
  }

  function editArticle(id) {
    const a = getArticles().find(x => x.id === id);
    if (!a) return;
    document.getElementById('modalTitle').textContent    = 'Edit Artikel';
    document.getElementById('articleId').value           = a.id;
    document.getElementById('articleTitle').value        = a.title;
    document.getElementById('articleTag').value          = a.tag;
    document.getElementById('articleDate').value         = a.date;
    document.getElementById('articleImage').value        = a.image;
    document.getElementById('articleExcerpt').value      = a.excerpt;
    const wrap = document.getElementById('imgPreviewWrap');
    if (a.image) {
      document.getElementById('imgPreview').src = a.image;
      wrap.classList.add('show');
    } else {
      wrap.classList.remove('show');
    }
    openModal('edit');
  }

  function deleteArticle(id) {
    if (!confirm('Yakin mau hapus artikel ini?')) return;
    saveArticles(getArticles().filter(a => a.id !== id));
    renderArticles();
    showToast('✓ Artikel berhasil dihapus.');
  }

  document.getElementById('articleImage').addEventListener('input', function () {
    const url  = this.value.trim();
    const wrap = document.getElementById('imgPreviewWrap');
    if (url) { document.getElementById('imgPreview').src = url; wrap.classList.add('show'); }
    else { wrap.classList.remove('show'); }
  });

  document.getElementById('saveArticle').addEventListener('click', () => {
    const title   = document.getElementById('articleTitle').value.trim();
    const tag     = document.getElementById('articleTag').value;
    const date    = document.getElementById('articleDate').value;
    const image   = document.getElementById('articleImage').value.trim();
    const excerpt = document.getElementById('articleExcerpt').value.trim();

    if (!title || !date || !image || !excerpt) { showToast('⚠ Lengkapi semua field terlebih dahulu.'); return; }

    const currentId = document.getElementById('articleId').value;
    const articles  = getArticles();
    const data      = { id: currentId ? Number(currentId) : Date.now(), title, tag, date, image, excerpt };

    if (currentId) {
      saveArticles(articles.map(a => a.id === Number(currentId) ? data : a));
      showToast('✓ Artikel berhasil diedit.');
    } else {
      articles.unshift(data);
      saveArticles(articles);
      showToast('✓ Artikel berhasil ditambahkan.');
    }

    closeModalFn();
    renderArticles();
  });

  document.getElementById('openAddModal').addEventListener('click', () => openModal('add'));
  document.getElementById('closeModal').addEventListener('click', closeModalFn);
  document.getElementById('cancelModal').addEventListener('click', closeModalFn);
  document.getElementById('articleModal').addEventListener('click', e => {
    if (e.target === document.getElementById('articleModal')) closeModalFn();
  });
  document.getElementById('searchInput').addEventListener('input', renderArticles);
  document.getElementById('filterTag').addEventListener('change', renderArticles);

  renderArticles();
</script>

</body>
</html>