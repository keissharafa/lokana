<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Transaksi - Lokana Admin</title>

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
      --blue:        #2563eb;
      --blue-bg:     #eff6ff;
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
      position: sticky; top: 0; height: 100vh;
      background: var(--white);
      border-right: 1px solid var(--border);
      display: flex; flex-direction: column;
      overflow-y: auto;
    }

    .sidebar-top { padding: 22px 16px 18px; border-bottom: 1px solid var(--border); }

    .brand {
      font-size: 1.05rem; font-weight: 800;
      color: var(--text); text-decoration: none;
      letter-spacing: -0.03em;
      display: flex; align-items: center; gap: 9px;
    }

    .brand-icon {
      width: 30px; height: 30px;
      background: var(--purple); border-radius: 8px;
      display: grid; place-items: center; flex-shrink: 0;
    }

    .brand-icon svg {
      width: 16px; height: 16px;
      stroke: #fff; fill: none;
      stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round;
    }

    .sidebar-nav { flex: 1; padding: 14px 10px; }

    .nav-section-label {
      font-size: 0.65rem; font-weight: 700;
      letter-spacing: 0.12em; text-transform: uppercase;
      color: #c0c4cc; padding: 0 8px; margin: 10px 0 6px;
    }

    .side-nav { display: grid; gap: 2px; }

    .side-nav a {
      text-decoration: none; color: var(--muted);
      font-size: 0.84rem; font-weight: 600;
      padding: 9px 10px; border-radius: 9px;
      transition: all 0.15s;
      display: flex; align-items: center; gap: 9px;
    }

    .side-nav a svg {
      width: 16px; height: 16px;
      stroke: currentColor; fill: none;
      stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round;
      flex-shrink: 0; opacity: 0.7;
    }

    .side-nav a:hover { color: var(--purple); background: var(--purple-soft); }
    .side-nav a:hover svg { opacity: 1; }
    .side-nav a.active { color: var(--purple); background: var(--purple-soft); font-weight: 700; }
    .side-nav a.active svg { opacity: 1; }

    .sidebar-footer { padding: 14px 16px; border-top: 1px solid var(--border); }

    .admin-info { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }

    .admin-avatar {
      width: 32px; height: 32px; border-radius: 50%;
      background: var(--purple-soft); color: var(--purple);
      font-weight: 800; font-size: 0.78rem;
      display: grid; place-items: center; flex-shrink: 0;
    }

    .admin-info-text strong { display: block; font-size: 0.82rem; font-weight: 700; color: var(--text); }
    .admin-info-text span { font-size: 0.7rem; color: var(--subtle); }

    .logout {
      color: var(--red); font-weight: 700; font-size: 0.8rem;
      padding: 8px 12px; border-radius: 8px; background: var(--red-bg);
      display: flex; align-items: center; gap: 7px;
      transition: opacity 0.15s; width: 100%; border: none;
      cursor: pointer; font-family: inherit; text-decoration: none;
    }

    .logout svg {
      width: 15px; height: 15px; stroke: var(--red); fill: none;
      stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round;
    }

    .logout:hover { opacity: 0.75; }

    /* ── Content Wrap ── */
    .content-wrap { display: flex; flex-direction: column; min-width: 0; }

    .topbar {
      position: sticky; top: 0; z-index: 100;
      background: rgba(255,255,255,0.92);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border);
      height: 58px; padding: 0 36px;
      display: flex; align-items: center;
      justify-content: space-between; gap: 24px;
    }

    .breadcrumb {
      font-size: 0.82rem; color: var(--subtle);
      display: flex; align-items: center; gap: 6px;
    }

    .breadcrumb span { font-weight: 600; color: var(--text); }

    .breadcrumb svg {
      width: 12px; height: 12px; stroke: var(--subtle); fill: none;
      stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round;
    }

    .topbar-right { display: flex; align-items: center; gap: 14px; }

    .live-time { font-size: 0.74rem; color: var(--subtle); font-weight: 500; white-space: nowrap; }

    .admin-badge {
      background: var(--purple-soft); border-radius: 999px;
      padding: 6px 13px; font-size: 0.76rem; color: var(--purple);
      font-weight: 700; white-space: nowrap;
      display: flex; align-items: center; gap: 6px;
    }

    .admin-badge::before {
      content: ''; width: 6px; height: 6px;
      background: var(--purple); border-radius: 50%;
    }

    /* ── Content ── */
    .content { padding: 32px 36px 64px; }

    .page-heading { margin-bottom: 24px; }

    .page-heading h1 {
      font-size: clamp(1.6rem, 3vw, 2.2rem);
      font-weight: 800; letter-spacing: -0.05em; margin-bottom: 6px;
    }

    .page-heading p { color: var(--muted); font-size: 0.88rem; line-height: 1.65; }

    /* ── Stats ── */
    .stats-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px; margin-bottom: 20px;
    }

    .stat-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 16px; padding: 20px;
      transition: box-shadow 0.18s;
    }

    .stat-card:hover { box-shadow: 0 4px 18px rgba(0,0,0,0.07); }

    .stat-label {
      font-size: 0.72rem; color: var(--subtle); font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 8px;
    }

    .stat-value {
      font-size: 2.1rem; font-weight: 800;
      letter-spacing: -0.05em; line-height: 1; color: var(--text);
    }

    .stat-sub { font-size: 0.71rem; color: var(--subtle); margin-top: 5px; }

    /* ── Toolbar ── */
    .toolbar {
      background: var(--white); border: 1px solid var(--border);
      border-radius: 14px; padding: 14px 18px;
      margin-bottom: 16px; display: flex; gap: 10px; align-items: center;
    }

    .search-box {
      flex: 1; display: flex; align-items: center; gap: 8px;
      background: var(--light-bg); border: 1px solid var(--border);
      border-radius: 9px; padding: 8px 12px;
    }

    .search-box svg {
      width: 15px; height: 15px; stroke: var(--subtle); fill: none;
      stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round; flex-shrink: 0;
    }

    .search-box input {
      border: none; background: transparent; outline: none;
      font-size: 0.84rem; width: 100%; color: var(--text); font-family: inherit;
    }

    .search-box input::placeholder { color: var(--subtle); }

    .filter-select {
      padding: 8px 12px; border: 1px solid var(--border);
      border-radius: 9px; font-size: 0.82rem; color: var(--muted);
      background: var(--white); outline: none; cursor: pointer; font-family: inherit;
    }

    .filter-select:focus { border-color: var(--purple); }

    /* ── Table Panel ── */
    .panel {
      background: var(--white); border: 1px solid var(--border);
      border-radius: 18px; overflow: hidden;
    }

    table { width: 100%; border-collapse: collapse; }

    thead th {
      text-align: left; font-size: 0.66rem; color: var(--subtle);
      font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;
      padding: 13px 20px; border-bottom: 1px solid var(--border);
      background: var(--light-bg);
    }

    tbody td {
      padding: 13px 20px; font-size: 0.84rem; color: var(--muted);
      border-bottom: 1px solid var(--border-sub); vertical-align: middle;
    }

    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: #fafbff; }

    .tx-id {
      font-family: 'Plus Jakarta Sans', monospace;
      font-size: 0.8rem; color: var(--purple); font-weight: 700;
    }

    .product-list { font-size: 0.82rem; color: var(--muted); }

    .total-amount { font-weight: 700; color: var(--text); white-space: nowrap; }

    /* ── Badges ── */
    .badge {
      display: inline-flex; align-items: center; gap: 4px;
      padding: 3px 9px; border-radius: 999px;
      font-size: 0.68rem; font-weight: 700;
    }

    .badge::before {
      content: ''; width: 5px; height: 5px;
      border-radius: 50%; flex-shrink: 0;
    }

    .badge-selesai    { color: var(--green);  background: var(--green-bg); }
    .badge-selesai::before    { background: var(--green); }
    .badge-diproses   { color: var(--orange); background: var(--orange-bg); }
    .badge-diproses::before   { background: var(--orange); }
    .badge-dikirim    { color: var(--blue);   background: var(--blue-bg); }
    .badge-dikirim::before    { background: var(--blue); }
    .badge-dibatalkan { color: var(--red);    background: var(--red-bg); }
    .badge-dibatalkan::before { background: var(--red); }

    /* ── Action Buttons ── */
    .btn-icon {
      border: none; background: transparent; cursor: pointer;
      padding: 6px 10px; border-radius: 7px;
      font-size: 0.76rem; font-weight: 700;
      transition: background 0.15s;
      display: inline-flex; align-items: center; gap: 5px;
      font-family: inherit;
    }

    .btn-icon svg {
      width: 13px; height: 13px; stroke: currentColor; fill: none;
      stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round;
    }

    .btn-detail { color: var(--purple); }
    .btn-detail:hover { background: var(--purple-soft); }

    /* ── Empty State ── */
    .empty-state { text-align: center; padding: 64px 24px; color: var(--subtle); }

    .empty-state svg {
      width: 40px; height: 40px; stroke: var(--border); fill: none;
      stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round; margin-bottom: 12px;
    }

    .empty-state p { font-size: 0.88rem; }

    /* ── Modal ── */
    .modal-overlay {
      display: none; position: fixed; inset: 0;
      background: rgba(0,0,0,0.35); z-index: 999;
      align-items: center; justify-content: center; padding: 24px;
    }

    .modal-overlay.open { display: flex; }

    .modal {
      background: var(--white); border-radius: 20px; padding: 32px;
      width: 100%; max-width: 520px;
      box-shadow: 0 16px 60px rgba(0,0,0,0.14);
      max-height: 85vh; overflow-y: auto;
    }

    .modal-header {
      display: flex; justify-content: space-between;
      align-items: center; margin-bottom: 22px;
    }

    .modal-header h2 {
      font-size: 1.1rem; font-weight: 800; letter-spacing: -0.03em;
    }

    .modal-close {
      width: 30px; height: 30px; border-radius: 50%;
      border: 1px solid var(--border); background: var(--white);
      cursor: pointer; display: grid; place-items: center;
      color: var(--muted); font-size: 0.9rem; font-family: inherit;
    }

    .modal-close:hover { background: var(--light-bg); }

    .detail-row {
      display: flex; justify-content: space-between;
      gap: 20px; padding: 10px 0;
      border-bottom: 1px solid var(--border-sub);
      font-size: 0.84rem;
    }

    .detail-row:last-of-type { border-bottom: none; }

    .detail-label { color: var(--subtle); font-size: 0.8rem; }

    .detail-value {
      font-weight: 600; color: var(--text); text-align: right;
      font-size: 0.84rem;
    }

    .detail-value.tx-id { color: var(--purple); }

    /* ── Status Section ── */
    .modal-status-section {
      margin-top: 20px; padding-top: 20px;
      border-top: 1px solid var(--border);
    }

    .modal-status-label {
      font-size: 0.72rem; font-weight: 700; color: var(--subtle);
      text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;
    }

    .status-options { display: flex; gap: 8px; flex-wrap: wrap; }

    .status-btn {
      padding: 6px 14px; border-radius: 999px;
      border: 1.5px solid var(--border);
      background: var(--white); font-size: 0.76rem; font-weight: 700;
      cursor: pointer; transition: all 0.15s; color: var(--muted);
      font-family: inherit;
    }

    .status-btn:hover { border-color: var(--purple); color: var(--purple); }
    .status-btn.selected { background: var(--purple); border-color: var(--purple); color: var(--white); }

    .modal-actions {
      display: flex; gap: 10px;
      justify-content: flex-end; margin-top: 24px;
    }

    .btn-cancel {
      padding: 9px 18px; border-radius: 9px;
      border: 1.5px solid var(--border); background: var(--white);
      font-size: 0.82rem; font-weight: 700; color: var(--muted);
      cursor: pointer; font-family: inherit; transition: background 0.15s;
    }

    .btn-cancel:hover { background: var(--light-bg); }

    .btn-primary {
      display: inline-flex; align-items: center; gap: 7px;
      background: var(--purple); color: var(--white);
      border: none; padding: 9px 18px; border-radius: 9px;
      font-size: 0.82rem; font-weight: 700;
      cursor: pointer; font-family: inherit; transition: background 0.15s;
    }

    .btn-primary:hover { background: var(--purple-dark); }

    /* ── Toast ── */
    .toast {
      position: fixed; bottom: 28px; right: 28px;
      background: var(--text); color: var(--white);
      padding: 12px 20px; border-radius: 10px;
      font-size: 0.82rem; font-weight: 600;
      box-shadow: 0 4px 20px rgba(0,0,0,0.18);
      opacity: 0; transform: translateY(10px);
      transition: all 0.25s; z-index: 9999;
    }

    .toast.show { opacity: 1; transform: translateY(0); }

    /* ── Responsive ── */
    @media (max-width: 1100px) {
      .stats-row { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 960px) {
      .admin-layout { grid-template-columns: 1fr; }
      .sidebar {
        position: static; height: auto;
        flex-direction: row; flex-wrap: wrap;
        align-items: center; gap: 16px; padding: 14px 20px;
      }
      .sidebar-top { padding: 0; border: none; }
      .sidebar-nav { padding: 0; flex: none; }
      .side-nav { grid-auto-flow: column; gap: 4px; }
      .sidebar-footer { display: none; }
      .topbar { padding: 0 20px; }
      .content { padding: 24px 20px 48px; }
    }

    @media (max-width: 640px) {
      .stats-row { grid-template-columns: 1fr 1fr; }
      .toolbar { flex-wrap: wrap; }
      .live-time { display: none; }
      .panel { overflow-x: auto; }
      table { min-width: 620px; }
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
          <svg viewBox="0 0 24 24"><path stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
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
        <a href="{{ route('admin.artikel') }}">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
          Kelola Artikel
        </a>
        <a href="{{ route('admin.pengguna') }}">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
          Kelola Pengguna
        </a>
        <a href="{{ route('admin.transaksi') }}" class="active">
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
        <span>Kelola Transaksi</span>
      </div>
      <div class="topbar-right">
        <span class="live-time" id="liveTime">—</span>
        <div class="admin-badge">{{ session('admin_name', 'Admin Lokana') }}</div>
      </div>
    </header>

    <main class="content">

      <div class="page-heading">
        <h1>Kelola Transaksi</h1>
        <p>Monitor dan kelola seluruh transaksi Lokana</p>
      </div>

      <!-- Stats -->
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-label">Total Transaksi</div>
          <div class="stat-value" id="statTotal">0</div>
          <div class="stat-sub">Semua waktu</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Diproses</div>
          <div class="stat-value" id="statDiproses">0</div>
          <div class="stat-sub">Perlu perhatian</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Dikirim</div>
          <div class="stat-value" id="statDikirim">0</div>
          <div class="stat-sub">Dalam pengiriman</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Pendapatan</div>
          <div class="stat-value" id="statPendapatan" style="font-size:1.4rem;">Rp0</div>
          <div class="stat-sub">Transaksi selesai</div>
        </div>
      </div>

      <!-- Toolbar -->
      <div class="toolbar">
        <div class="search-box">
          <svg viewBox="0 0 24 24"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
          <input type="text" id="searchInput" placeholder="Cari no. transaksi atau pembeli..." oninput="renderTable()">
        </div>
        <select class="filter-select" id="filterStatus" onchange="renderTable()">
          <option value="">Semua Status</option>
          <option value="Diproses">Diproses</option>
          <option value="Dikirim">Dikirim</option>
          <option value="Selesai">Selesai</option>
          <option value="Dibatalkan">Dibatalkan</option>
        </select>
      </div>

      <!-- Table -->
      <div class="panel">
        <table>
          <thead>
            <tr>
              <th>No. Transaksi</th>
              <th>Pembeli</th>
              <th>Produk</th>
              <th>Total</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="tableBody"></tbody>
        </table>
        <div class="empty-state" id="emptyState" style="display:none;">
          <svg viewBox="0 0 24 24"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/></svg>
          <p>Tidak ada transaksi ditemukan.</p>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- ── Modal Detail ── -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal">
    <div class="modal-header">
      <h2>Detail Transaksi</h2>
      <button type="button" class="modal-close" onclick="closeModal()">✕</button>
    </div>
    <input type="hidden" id="detailId">

    <div class="detail-row">
      <span class="detail-label">No. Transaksi</span>
      <span class="detail-value tx-id" id="dTxId"></span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Pembeli</span>
      <span class="detail-value" id="dPembeli"></span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Produk</span>
      <span class="detail-value" id="dProduk"></span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Metode Pembayaran</span>
      <span class="detail-value" id="dMetode"></span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Alamat Pengiriman</span>
      <span class="detail-value" id="dAlamat"></span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Subtotal</span>
      <span class="detail-value" id="dSubtotal"></span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Ongkos Kirim</span>
      <span class="detail-value" id="dOngkir"></span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Total</span>
      <span class="detail-value" id="dTotal"></span>
    </div>
    <div class="detail-row">
      <span class="detail-label">Tanggal</span>
      <span class="detail-value" id="dTanggal"></span>
    </div>

    <div class="modal-status-section">
      <div class="modal-status-label">Ubah Status Transaksi</div>
      <div class="status-options">
        <button type="button" class="status-btn" onclick="selectStatus('Diproses')">Diproses</button>
        <button type="button" class="status-btn" onclick="selectStatus('Dikirim')">Dikirim</button>
        <button type="button" class="status-btn" onclick="selectStatus('Selesai')">Selesai</button>
        <button type="button" class="status-btn" onclick="selectStatus('Dibatalkan')">Dibatalkan</button>
      </div>
    </div>

    <div class="modal-actions">
      <button type="button" class="btn-cancel" onclick="closeModal()">Tutup</button>
      <button type="button" class="btn-primary" onclick="saveStatus()">Simpan Status</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
  const STORAGE_KEY = 'lokana_transaksi';

  const defaultTransaksi = [
    { id:'TRX-2025-001', pembeli:'Sari Dewi',    produk:'Scarf Endek Bali Handmade x2',           metode:'QRIS',          alamat:'Jl. Kuta Raya No. 12, Badung, Bali',         subtotal:380000, ongkir:15000, total:395000, tanggal:'15 Apr 2025', status:'Selesai' },
    { id:'TRX-2025-002', pembeli:'Budi Santoso', produk:'Kintamani Coffee x1, Essential Oil Bali x1', metode:'Transfer Bank', alamat:'Jl. Bypass Ngurah Rai No. 55, Denpasar',    subtotal:245000, ongkir:20000, total:265000, tanggal:'18 Apr 2025', status:'Selesai' },
    { id:'TRX-2025-003', pembeli:'Made Surya',   produk:'Beach Jewelry x3',                        metode:'E-Wallet',      alamat:'Jl. Seminyak No. 8, Badung, Bali',           subtotal:450000, ongkir:15000, total:465000, tanggal:'2 Mei 2025',  status:'Dikirim' },
    { id:'TRX-2025-004', pembeli:'Ni Luh Ayu',   produk:'Kayu Bowls x1',                           metode:'QRIS',          alamat:'Jl. Ubud Raya No. 3, Gianyar, Bali',         subtotal:185000, ongkir:15000, total:200000, tanggal:'5 Mei 2025',  status:'Diproses' },
    { id:'TRX-2025-005', pembeli:'Ketut Ari',    produk:'Beaded Basket x2',                        metode:'Transfer Bank', alamat:'Jl. Sanur No. 21, Denpasar Selatan',          subtotal:560000, ongkir:20000, total:580000, tanggal:'10 Mei 2025', status:'Diproses' },
    { id:'TRX-2025-006', pembeli:'Sari Dewi',    produk:'Essential Oil Bali x2',                   metode:'E-Wallet',      alamat:'Jl. Kuta Raya No. 12, Badung, Bali',         subtotal:300000, ongkir:15000, total:315000, tanggal:'12 Mei 2025', status:'Dikirim' },
  ];

  function getTransaksi() {
    const stored = localStorage.getItem(STORAGE_KEY);
    if (!stored) { localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultTransaksi)); return defaultTransaksi; }
    const parsed = JSON.parse(stored);
    if (!Array.isArray(parsed) || parsed.length === 0) { localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultTransaksi)); return defaultTransaksi; }
    return parsed;
  }

  function saveTransaksi(data) { localStorage.setItem(STORAGE_KEY, JSON.stringify(data)); }

  function formatRupiah(n) { return 'Rp ' + n.toLocaleString('id-ID'); }

  function updateStats(data) {
    document.getElementById('statTotal').textContent     = data.length;
    document.getElementById('statDiproses').textContent  = data.filter(t => t.status === 'Diproses').length;
    document.getElementById('statDikirim').textContent   = data.filter(t => t.status === 'Dikirim').length;
    const pendapatan = data.filter(t => t.status === 'Selesai').reduce((s, t) => s + t.total, 0);
    document.getElementById('statPendapatan').textContent = formatRupiah(pendapatan);
  }

  function badgeClass(status) {
    return { Selesai:'selesai', Diproses:'diproses', Dikirim:'dikirim', Dibatalkan:'dibatalkan' }[status] || 'diproses';
  }

  function renderTable() {
    const q            = document.getElementById('searchInput').value.toLowerCase();
    const filterStatus = document.getElementById('filterStatus').value;
    const data         = getTransaksi();

    const filtered = data.filter(t => {
      const matchSearch = t.id.toLowerCase().includes(q) || t.pembeli.toLowerCase().includes(q);
      const matchStatus = !filterStatus || t.status === filterStatus;
      return matchSearch && matchStatus;
    });

    updateStats(data);

    const tbody = document.getElementById('tableBody');
    const empty = document.getElementById('emptyState');

    if (filtered.length === 0) {
      tbody.innerHTML = '';
      empty.style.display = 'block';
      return;
    }

    empty.style.display = 'none';
    tbody.innerHTML = filtered.map(t => `
      <tr>
        <td><span class="tx-id">${t.id}</span></td>
        <td style="color:var(--text);font-weight:600;">${t.pembeli}</td>
        <td><div class="product-list">${t.produk}</div></td>
        <td><span class="total-amount">${formatRupiah(t.total)}</span></td>
        <td>${t.tanggal}</td>
        <td><span class="badge badge-${badgeClass(t.status)}">${t.status}</span></td>
        <td>
          <button type="button" class="btn-icon btn-detail" onclick="openDetail('${t.id}')">
            <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
            Detail
          </button>
        </td>
      </tr>
    `).join('');
  }

  let selectedStatus = '';

  function openDetail(id) {
    const t = getTransaksi().find(x => x.id === id);
    if (!t) return;

    document.getElementById('detailId').value    = id;
    document.getElementById('dTxId').textContent    = t.id;
    document.getElementById('dPembeli').textContent = t.pembeli;
    document.getElementById('dProduk').textContent  = t.produk;
    document.getElementById('dMetode').textContent  = t.metode;
    document.getElementById('dAlamat').textContent  = t.alamat;
    document.getElementById('dSubtotal').textContent = formatRupiah(t.subtotal);
    document.getElementById('dOngkir').textContent  = formatRupiah(t.ongkir);
    document.getElementById('dTotal').textContent   = formatRupiah(t.total);
    document.getElementById('dTanggal').textContent = t.tanggal;

    selectedStatus = t.status;
    document.querySelectorAll('.status-btn').forEach(btn => {
      btn.classList.toggle('selected', btn.textContent === selectedStatus);
    });

    document.getElementById('modalOverlay').classList.add('open');
  }

  function selectStatus(status) {
    selectedStatus = status;
    document.querySelectorAll('.status-btn').forEach(btn => {
      btn.classList.toggle('selected', btn.textContent === status);
    });
  }

  function saveStatus() {
    const id = document.getElementById('detailId').value;
    const data = getTransaksi().map(t => t.id === id ? { ...t, status: selectedStatus } : t);
    saveTransaksi(data);
    closeModal();
    renderTable();
    showToast('Status transaksi diperbarui');
  }

  function closeModal() { document.getElementById('modalOverlay').classList.remove('open'); }

  function showToast(msg) {
    const toast = document.getElementById('toast');
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2800);
  }

  document.getElementById('modalOverlay').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
  });

  function updateTime() {
    const el = document.getElementById('liveTime');
    if (!el) return;
    const now = new Date();
    const days   = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const hh = String(now.getHours()).padStart(2,'0');
    const mm = String(now.getMinutes()).padStart(2,'0');
    el.textContent = `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()} · ${hh}:${mm}`;
  }
  updateTime();
  setInterval(updateTime, 1000);

  renderTable();
</script>

</body>
</html>