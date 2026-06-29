<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Lokana</title>

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
      text-decoration: none;
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

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .live-time {
      font-size: 0.74rem;
      color: var(--subtle);
      font-weight: 500;
      white-space: nowrap;
    }

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

    .content { padding: 32px 36px 64px; }

    .page-heading { margin-bottom: 24px; }

    .page-heading h1 {
      font-size: clamp(1.6rem, 3vw, 2.2rem);
      font-weight: 800;
      letter-spacing: -0.05em;
      margin-bottom: 6px;
    }

    .page-heading p {
      color: var(--muted);
      font-size: 0.88rem;
      line-height: 1.65;
    }

    /* ── Quick Actions ── */
    .quick-actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-bottom: 24px;
    }

    .qa-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 8px 14px;
      border-radius: 8px;
      background: var(--white);
      border: 1px solid var(--border);
      color: var(--text);
      font-size: 0.8rem;
      font-weight: 600;
      text-decoration: none;
      font-family: inherit;
      cursor: pointer;
      transition: all 0.15s;
    }

    .qa-btn svg {
      width: 14px;
      height: 14px;
      stroke: currentColor;
      fill: none;
      stroke-width: 1.5;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .qa-btn:hover {
      border-color: var(--purple);
      color: var(--purple);
      background: var(--purple-soft);
    }

    /* ── Stat Grid ── */
    .stat-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
      margin-bottom: 20px;
    }

    .stat-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 20px;
      transition: box-shadow 0.18s;
    }

    .stat-card:hover { box-shadow: 0 4px 18px rgba(0,0,0,0.07); }

    .stat-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 16px;
    }

    .stat-icon {
      width: 36px;
      height: 36px;
      border-radius: 9px;
      display: grid;
      place-items: center;
    }

    .stat-icon svg {
      width: 18px;
      height: 18px;
      fill: none;
      stroke-width: 1.5;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .stat-icon.purple { background: var(--purple-soft); }
    .stat-icon.purple svg { stroke: var(--purple); }
    .stat-icon.green  { background: var(--green-bg); }
    .stat-icon.green svg  { stroke: var(--green); }
    .stat-icon.orange { background: var(--orange-bg); }
    .stat-icon.orange svg { stroke: var(--orange); }
    .stat-icon.blue   { background: var(--blue-bg); }
    .stat-icon.blue svg   { stroke: var(--blue); }

    .stat-trend {
      font-size: 0.68rem;
      font-weight: 700;
      padding: 3px 8px;
      border-radius: 999px;
      color: var(--green);
      background: var(--green-bg);
    }

    .stat-label {
      font-size: 0.72rem;
      color: var(--subtle);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 5px;
    }

    .stat-number {
      font-size: 2.1rem;
      font-weight: 800;
      letter-spacing: -0.05em;
      line-height: 1;
      color: var(--text);
    }

    .stat-sub {
      font-size: 0.71rem;
      color: var(--subtle);
      margin-top: 5px;
    }

    /* ── Dashboard Grid ── */
    .dashboard-grid {
      display: grid;
      grid-template-columns: 1.35fr 0.65fr;
      gap: 16px;
    }

    .panel {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 22px 24px;
    }

    .panel-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 18px;
    }

    .panel-header h2 {
      font-size: 0.92rem;
      font-weight: 700;
      letter-spacing: -0.02em;
    }

    .panel-header a {
      color: var(--purple);
      text-decoration: none;
      font-size: 0.75rem;
      font-weight: 700;
      padding: 5px 11px;
      border-radius: 7px;
      background: var(--purple-soft);
      transition: background 0.15s;
    }

    .panel-header a:hover { background: var(--purple-mid); }

    /* ── Table ── */
    table { width: 100%; border-collapse: collapse; }

    thead th {
      text-align: left;
      font-size: 0.66rem;
      color: var(--subtle);
      font-weight: 700;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding-bottom: 11px;
      border-bottom: 1px solid var(--border);
    }

    tbody td {
      padding: 12px 0;
      font-size: 0.82rem;
      color: var(--muted);
      vertical-align: middle;
      border-bottom: 1px solid var(--border-sub);
    }

    tbody tr:last-child td { border-bottom: none; }
    th:not(:last-child), td:not(:last-child) { padding-right: 16px; }

    .td-order strong {
      display: block;
      color: var(--text);
      font-weight: 700;
      font-size: 0.82rem;
      margin-bottom: 2px;
    }

    .td-order span { font-size: 0.71rem; color: #c0c4cc; }
    .td-product { color: var(--text); font-weight: 500; }
    .td-amount { font-weight: 700; color: var(--text); white-space: nowrap; }

    .status {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 4px 9px;
      border-radius: 999px;
      font-size: 0.68rem;
      font-weight: 700;
      white-space: nowrap;
    }

    .status::before {
      content: '';
      width: 5px;
      height: 5px;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .status.success { color: var(--green);  background: var(--green-bg); }
    .status.success::before { background: var(--green); }
    .status.process { color: var(--orange); background: var(--orange-bg); }
    .status.process::before { background: var(--orange); }
    .status.shipped { color: var(--blue);   background: var(--blue-bg); }
    .status.shipped::before { background: var(--blue); }

    /* ── Activity ── */
    .activity-list { display: grid; }

    .activity {
      display: grid;
      grid-template-columns: 34px 1fr;
      gap: 11px;
      padding: 13px 0;
      border-bottom: 1px solid var(--border-sub);
    }

    .activity:first-child { padding-top: 0; }
    .activity:last-child  { border-bottom: none; padding-bottom: 0; }

    .activity-icon {
      width: 34px;
      height: 34px;
      border-radius: 9px;
      background: var(--purple-soft);
      color: var(--purple);
      display: grid;
      place-items: center;
    }

    .activity-icon.green  { background: var(--green-bg);  color: var(--green); }
    .activity-icon.orange { background: var(--orange-bg); color: var(--orange); }

    .activity-icon svg {
      width: 15px;
      height: 15px;
      stroke: currentColor;
      fill: none;
      stroke-width: 1.5;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .activity strong {
      display: block;
      font-size: 0.82rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 2px;
    }

    .activity p { color: var(--muted); font-size: 0.76rem; line-height: 1.5; }

    .activity-time {
      font-size: 0.68rem;
      color: #c0c4cc;
      margin-top: 4px;
      font-weight: 500;
    }

    /* ── Responsive ── */
    @media (max-width: 1100px) {
      .stat-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 960px) {
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
      .dashboard-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 640px) {
      .stat-grid { grid-template-columns: 1fr 1fr; }
      .topbar-right { gap: 10px; }
      .live-time { display: none; }
      .panel { overflow-x: auto; }
      table { min-width: 460px; }
    }
  </style>
</head>
<body>

<div class="admin-layout">

  <aside class="sidebar">
    <div class="sidebar-top">
      <a href="{{ route('admin.dashboard') }}" class="brand">
        <div class="brand-icon">
          <!-- Heroicons: squares-2x2 (brand mark) -->
          <svg viewBox="0 0 24 24" fill="none"><path stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
        </div>
        Lokana Admin
      </a>
    </div>

    <div class="sidebar-nav">
      <div class="nav-section-label">Menu Utama</div>
      <nav class="side-nav">
        <a href="{{ route('admin.dashboard') }}" class="active">
          <!-- Heroicons: home -->
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
          Dashboard
        </a>
        <a href="{{ route('admin.produk') }}">
          <!-- Heroicons: cube -->
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
          Kelola Produk
        </a>
        <a href="{{ route('admin.artikel') }}">
          <!-- Heroicons: document-text -->
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
          Kelola Artikel
        </a>
        <a href="{{ route('admin.pengguna') }}">
          <!-- Heroicons: users -->
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
          Kelola Pengguna
        </a>
        <a href="{{ route('admin.transaksi') }}">
          <!-- Heroicons: credit-card -->
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
        <!-- Heroicons: arrow-right-on-rectangle -->
        <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/></svg>
        Logout
      </a>
    </div>
  </aside>

  <div class="content-wrap">

    <header class="topbar">
      <div class="breadcrumb">
        Pages
        <!-- Heroicons: chevron-right -->
        <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
        <span>Dashboard</span>
      </div>
      <div class="topbar-right">
        <span class="live-time" id="liveTime">—</span>
        <div class="admin-badge">{{ session('admin_name', 'Admin Lokana') }}</div>
      </div>
    </header>

    <main class="content">

      <div class="page-heading">
        <h1>Dashboard</h1>
        <p>Ringkasan aktivitas marketplace Lokana — produk, artikel, pengguna, dan transaksi.</p>
      </div>

      <div class="quick-actions">
        <a href="{{ route('admin.produk') }}" class="qa-btn">
          <!-- Heroicons: plus -->
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
          Tambah Produk
        </a>
        <a href="{{ route('admin.artikel') }}" class="qa-btn">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
          Tambah Artikel
        </a>
        <a href="{{ route('admin.transaksi') }}" class="qa-btn">
          <!-- Heroicons: arrow-top-right-on-square -->
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
          Lihat Transaksi
        </a>
        <a href="{{ route('admin.pengguna') }}" class="qa-btn">
          <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
          Lihat Pengguna
        </a>
      </div>

      <section class="stat-grid">
        <div class="stat-card">
          <div class="stat-top">
            <div class="stat-icon purple">
              <!-- Heroicons: cube -->
              <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/></svg>
            </div>
            <span class="stat-trend">+0</span>
          </div>
          <div class="stat-label">Total Produk</div>
          <div class="stat-number">6</div>
          <div class="stat-sub">Produk lokal Bali aktif</div>
        </div>

        <div class="stat-card">
          <div class="stat-top">
            <div class="stat-icon green">
              <!-- Heroicons: document-text -->
              <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
            </div>
            <span class="stat-trend">+1</span>
          </div>
          <div class="stat-label">Total Artikel</div>
          <div class="stat-number">6</div>
          <div class="stat-sub">Artikel budaya & produk</div>
        </div>

        <div class="stat-card">
          <div class="stat-top">
            <div class="stat-icon orange">
              <!-- Heroicons: users -->
              <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
            </div>
            <span class="stat-trend">+0</span>
          </div>
          <div class="stat-label">Total Pengguna</div>
          <div class="stat-number">3</div>
          <div class="stat-sub">Pengguna terdaftar</div>
        </div>

        <div class="stat-card">
          <div class="stat-top">
            <div class="stat-icon blue">
              <!-- Heroicons: credit-card -->
              <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/></svg>
            </div>
            <span class="stat-trend">+1</span>
          </div>
          <div class="stat-label">Transaksi</div>
          <div class="stat-number">3</div>
          <div class="stat-sub">Total transaksi masuk</div>
        </div>
      </section>

      <section class="dashboard-grid">

        <div class="panel">
          <div class="panel-header">
            <h2>Transaksi Terbaru</h2>
            <a href="{{ route('admin.transaksi') }}">Lihat Semua</a>
          </div>
          <table>
            <thead>
              <tr>
                <th>No Pesanan</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="td-order"><strong>LKN-2026-001</strong><span>10 Juni 2026</span></td>
                <td class="td-product">Scarf Endek Bali Handmade</td>
                <td class="td-amount">Rp 270.000</td>
                <td><span class="status success">Selesai</span></td>
              </tr>
              <tr>
                <td class="td-order"><strong>LKN-2026-002</strong><span>8 Juni 2026</span></td>
                <td class="td-product">Kintamani Coffee</td>
                <td class="td-amount">Rp 150.000</td>
                <td><span class="status shipped">Dikirim</span></td>
              </tr>
              <tr>
                <td class="td-order"><strong>LKN-2026-003</strong><span>5 Juni 2026</span></td>
                <td class="td-product">Essential Oil Bali</td>
                <td class="td-amount">Rp 170.000</td>
                <td><span class="status process">Diproses</span></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="panel">
          <div class="panel-header">
            <h2>Aktivitas Sistem</h2>
          </div>
          <div class="activity-list">
            <div class="activity">
              <div class="activity-icon">
                <!-- Heroicons: plus-circle -->
                <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
              </div>
              <div>
                <strong>Produk baru ditambahkan</strong>
                <p>Beaded Basket masuk ke kategori Kerajinan Handmade.</p>
                <div class="activity-time">10 Jun 2026 · 14.32</div>
              </div>
            </div>
            <div class="activity">
              <div class="activity-icon green">
                <!-- Heroicons: check-circle -->
                <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
              </div>
              <div>
                <strong>Pembayaran berhasil</strong>
                <p>Pesanan LKN-2026-001 sudah masuk ke history transaksi.</p>
                <div class="activity-time">10 Jun 2026 · 11.05</div>
              </div>
            </div>
            <div class="activity">
              <div class="activity-icon orange">
                <!-- Heroicons: pencil-square -->
                <svg viewBox="0 0 24 24" fill="none"><path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487 18.55 2.8a1.875 1.875 0 1 1 2.651 2.651L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/></svg>
              </div>
              <div>
                <strong>Artikel diperbarui</strong>
                <p>Konten Endek Bali disesuaikan dengan landing page Lokana.</p>
                <div class="activity-time">8 Jun 2026 · 09.18</div>
              </div>
            </div>
          </div>
        </div>

      </section>
    </main>
  </div>
</div>

<script>
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
</script>

</body>
</html>