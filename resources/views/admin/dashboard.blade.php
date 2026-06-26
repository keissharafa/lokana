<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Lokana</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --purple: #5B3DF5;
      --purple-dark: #4730D0;
      --purple-soft: #f0edff;
      --purple-mid: #e4deff;
      --text: #1a1a1a;
      --muted: #6b7280;
      --light-bg: #f5f5f7;
      --white: #fff;
      --border: #e5e7eb;
      --green: #059669;
      --green-bg: #ecfdf5;
      --orange: #d97706;
      --orange-bg: #fffbeb;
      --red: #dc2626;
      --red-bg: #fef2f2;
      --blue: #2563eb;
      --blue-bg: #eff6ff;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--light-bg);
      color: var(--text);
      overflow-x: hidden;
    }

    /* ── Layout ── */
    .admin-layout {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 252px 1fr;
    }

    /* ── Sidebar ── */
    .sidebar {
      position: sticky;
      top: 0;
      height: 100vh;
      background: var(--white);
      border-right: 1px solid var(--border);
      padding: 28px 18px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      overflow-y: auto;
    }

    .brand {
      font-size: 1.2rem;
      font-weight: 800;
      color: var(--purple);
      text-decoration: none;
      letter-spacing: -0.04em;
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 32px;
    }

    .brand-dot {
      width: 8px;
      height: 8px;
      background: var(--purple);
      border-radius: 50%;
      flex-shrink: 0;
    }

    .admin-label {
      font-size: 0.68rem;
      font-weight: 800;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: #bbb;
      margin-bottom: 10px;
      padding-left: 4px;
    }

    .side-nav {
      display: grid;
      gap: 4px;
    }

    .side-nav a {
      text-decoration: none;
      color: var(--muted);
      font-size: 0.875rem;
      font-weight: 600;
      padding: 11px 14px;
      border-radius: 12px;
      transition: all 0.18s;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .side-nav a .nav-icon {
      width: 18px;
      text-align: center;
      opacity: 0.6;
      font-size: 1rem;
    }

    .side-nav a:hover {
      color: var(--purple);
      background: var(--purple-soft);
    }

    .side-nav a:hover .nav-icon { opacity: 1; }

    .side-nav a.active {
      color: var(--purple);
      background: var(--purple-soft);
      font-weight: 700;
    }

    .side-nav a.active .nav-icon { opacity: 1; }

    .sidebar-footer {
      padding-top: 20px;
      border-top: 1px solid var(--border);
      display: grid;
      gap: 12px;
    }

    .admin-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .admin-avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: var(--purple-soft);
      color: var(--purple);
      font-weight: 800;
      font-size: 0.8rem;
      display: grid;
      place-items: center;
      flex-shrink: 0;
    }

    .admin-info-text {
      display: grid;
    }

    .admin-info-text strong {
      font-size: 0.84rem;
      font-weight: 700;
      color: var(--text);
    }

    .admin-info-text span {
      font-size: 0.72rem;
      color: var(--muted);
    }

    .logout {
      color: var(--red);
      text-decoration: none;
      font-weight: 700;
      font-size: 0.82rem;
      padding: 9px 14px;
      border-radius: 10px;
      background: var(--red-bg);
      display: block;
      text-align: center;
      transition: opacity 0.15s;
    }

    .logout:hover { opacity: 0.8; }

    /* ── Content ── */
    .content {
      padding: 36px 44px 72px;
      min-width: 0;
    }

    /* ── Topbar ── */
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 24px;
      margin-bottom: 32px;
    }

    .page-title h1 {
      font-size: clamp(1.75rem, 3.5vw, 2.5rem);
      font-weight: 800;
      letter-spacing: -0.05em;
      margin-bottom: 8px;
      line-height: 1.1;
    }

    .page-title p {
      color: var(--muted);
      font-size: 0.9rem;
      line-height: 1.65;
      max-width: 560px;
    }

    .topbar-right {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 10px;
      flex-shrink: 0;
    }

    .admin-badge {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 999px;
      padding: 9px 16px;
      font-size: 0.8rem;
      color: var(--muted);
      white-space: nowrap;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .admin-badge .role-dot {
      width: 7px;
      height: 7px;
      background: var(--purple);
      border-radius: 50%;
    }

    .admin-badge strong {
      color: var(--purple);
    }

    .live-time {
      font-size: 0.75rem;
      color: var(--muted);
      font-weight: 500;
      letter-spacing: 0.02em;
    }

    /* ── Quick Actions ── */
    .quick-actions {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 28px;
    }

    .qa-btn {
      display: flex;
      align-items: center;
      gap: 7px;
      padding: 9px 16px;
      border-radius: 12px;
      background: var(--white);
      border: 1px solid var(--border);
      color: var(--text);
      font-size: 0.82rem;
      font-weight: 600;
      text-decoration: none;
      font-family: 'Plus Jakarta Sans', sans-serif;
      cursor: pointer;
      transition: all 0.18s;
    }

    .qa-btn:hover {
      border-color: var(--purple);
      color: var(--purple);
      background: var(--purple-soft);
    }

    .qa-btn .qa-icon {
      font-size: 0.9rem;
    }

    /* ── Stat Grid ── */
    .stat-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
      margin-bottom: 24px;
    }

    .stat-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 22px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.04);
      position: relative;
      overflow: hidden;
      transition: transform 0.18s, box-shadow 0.18s;
    }

    .stat-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(0,0,0,0.07);
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 3px;
      border-radius: 20px 20px 0 0;
    }

    .stat-card.purple::before { background: var(--purple); }
    .stat-card.green::before  { background: var(--green); }
    .stat-card.orange::before { background: var(--orange); }
    .stat-card.blue::before   { background: var(--blue); }

    .stat-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 14px;
    }

    .stat-icon {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      display: grid;
      place-items: center;
      font-size: 1.05rem;
    }

    .stat-card.purple .stat-icon { background: var(--purple-soft); }
    .stat-card.green .stat-icon  { background: var(--green-bg); }
    .stat-card.orange .stat-icon { background: var(--orange-bg); }
    .stat-card.blue .stat-icon   { background: var(--blue-bg); }

    .stat-trend {
      font-size: 0.72rem;
      font-weight: 700;
      padding: 4px 8px;
      border-radius: 999px;
    }

    .trend-up {
      color: var(--green);
      background: var(--green-bg);
    }

    .stat-label {
      font-size: 0.76rem;
      color: var(--muted);
      font-weight: 600;
      margin-bottom: 6px;
    }

    .stat-number {
      font-size: 2rem;
      font-weight: 800;
      letter-spacing: -0.05em;
      line-height: 1;
    }

    .stat-sub {
      font-size: 0.72rem;
      color: var(--muted);
      margin-top: 4px;
    }

    /* ── Dashboard Grid ── */
    .dashboard-grid {
      display: grid;
      grid-template-columns: 1.3fr 0.7fr;
      gap: 20px;
    }

    .panel {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 22px;
      padding: 24px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.04);
    }

    .panel-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      margin-bottom: 20px;
    }

    .panel-header h2 {
      font-size: 1rem;
      font-weight: 700;
      letter-spacing: -0.02em;
    }

    .panel-header a {
      color: var(--purple);
      text-decoration: none;
      font-size: 0.78rem;
      font-weight: 700;
      padding: 6px 12px;
      border-radius: 8px;
      background: var(--purple-soft);
      transition: background 0.15s;
    }

    .panel-header a:hover { background: var(--purple-mid); }

    /* ── Table ── */
    table { width: 100%; border-collapse: collapse; }

    th {
      text-align: left;
      font-size: 0.7rem;
      color: #aaa;
      font-weight: 700;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 0 12px 12px 0;
    }

    th:last-child { padding-right: 0; }

    td {
      padding: 14px 12px 14px 0;
      border-top: 1px solid var(--border);
      font-size: 0.84rem;
      color: var(--muted);
      vertical-align: middle;
    }

    td:last-child { padding-right: 0; }

    .td-order strong {
      display: block;
      color: var(--text);
      font-weight: 700;
      font-size: 0.84rem;
      margin-bottom: 3px;
    }

    .td-order span {
      font-size: 0.74rem;
      color: #bbb;
    }

    .td-product {
      color: var(--text);
      font-weight: 500;
    }

    .td-amount {
      font-weight: 700;
      color: var(--text);
      white-space: nowrap;
    }

    .status {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 5px 10px;
      border-radius: 999px;
      font-size: 0.7rem;
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

    .status.success {
      color: var(--green);
      background: var(--green-bg);
    }

    .status.success::before { background: var(--green); }

    .status.process {
      color: var(--orange);
      background: var(--orange-bg);
    }

    .status.process::before { background: var(--orange); }

    .status.shipped {
      color: var(--blue);
      background: var(--blue-bg);
    }

    .status.shipped::before { background: var(--blue); }

    /* ── Activity ── */
    .activity-list { display: grid; gap: 0; }

    .activity {
      display: grid;
      grid-template-columns: 36px 1fr;
      gap: 12px;
      align-items: flex-start;
      padding: 14px 0;
      border-bottom: 1px solid var(--border);
    }

    .activity:first-child { padding-top: 0; }
    .activity:last-child { border-bottom: none; padding-bottom: 0; }

    .activity-icon {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      background: var(--purple-soft);
      color: var(--purple);
      display: grid;
      place-items: center;
      font-size: 0.85rem;
      flex-shrink: 0;
    }

    .activity-icon.green {
      background: var(--green-bg);
      color: var(--green);
    }

    .activity-icon.orange {
      background: var(--orange-bg);
      color: var(--orange);
    }

    .activity strong {
      display: block;
      font-size: 0.84rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 3px;
    }

    .activity p {
      color: var(--muted);
      font-size: 0.78rem;
      line-height: 1.5;
    }

    .activity-time {
      font-size: 0.7rem;
      color: #bbb;
      margin-top: 4px;
      font-weight: 500;
    }

    /* ── Responsive ── */
    @media (max-width: 1100px) {
      .stat-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 980px) {
      .admin-layout { grid-template-columns: 1fr; }

      .sidebar {
        position: static;
        height: auto;
        padding: 20px 20px;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        gap: 16px;
      }

      .brand { margin-bottom: 0; }

      .side-nav {
        grid-template-columns: repeat(3, auto);
        gap: 4px;
      }

      .sidebar-footer { display: none; }

      .content { padding: 28px 24px 56px; }

      .dashboard-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 640px) {
      .topbar { flex-direction: column; }
      .topbar-right { align-items: flex-start; }

      .stat-grid { grid-template-columns: 1fr 1fr; }

      .quick-actions { gap: 8px; }

      .panel { overflow-x: auto; }

      table { min-width: 480px; }

      .side-nav { grid-template-columns: repeat(2, 1fr); }
    }
  </style>
</head>
<body>

<div class="admin-layout">
  <!-- Sidebar -->
  <aside class="sidebar">
    <div>
      <a href="{{ route('admin.dashboard') }}" class="brand">
        <span class="brand-dot"></span>
        Lokana Admin
      </a>

      <div class="admin-label">Menu</div>
      <nav class="side-nav">
        <a href="{{ route('admin.dashboard') }}" class="active">
          <span class="nav-icon">◈</span> Dashboard
        </a>
        <a href="{{ route('admin.produk') }}">
          <span class="nav-icon">◻</span> Kelola Produk
        </a>
        <a href="{{ route('admin.artikel') }}">
          <span class="nav-icon">◇</span> Kelola Artikel
        </a>
        <a href="{{ route('admin.pengguna') }}">
          <span class="nav-icon">○</span> Kelola Pengguna
        </a>
        <a href="{{ route('admin.transaksi') }}">
          <span class="nav-icon">△</span> Kelola Transaksi
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
      <a href="{{ route('admin.logout') }}" class="logout">Logout</a>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="content">

    <!-- Topbar -->
    <section class="topbar">
      <div class="page-title">
        <h1>Dashboard</h1>
        <p>Ringkasan aktivitas marketplace Lokana — produk, artikel, pengguna, dan transaksi.</p>
      </div>

      <div class="topbar-right">
        <div class="admin-badge">
          <span class="role-dot"></span>
          Login sebagai <strong>{{ session('admin_name', 'Admin Lokana') }}</strong>
        </div>
        <span class="live-time" id="liveTime">—</span>
      </div>
    </section>

    <!-- Quick Actions -->
    <div class="quick-actions">
      <a href="{{ route('admin.produk') }}" class="qa-btn">
        <span class="qa-icon">＋</span> Tambah Produk
      </a>
      <a href="{{ route('admin.artikel') }}" class="qa-btn">
        <span class="qa-icon">＋</span> Tambah Artikel
      </a>
      <a href="{{ route('admin.transaksi') }}" class="qa-btn">
        <span class="qa-icon">↗</span> Lihat Transaksi
      </a>
      <a href="{{ route('admin.pengguna') }}" class="qa-btn">
        <span class="qa-icon">↗</span> Lihat Pengguna
      </a>
    </div>

    <!-- Stat Cards -->
    <section class="stat-grid">
      <div class="stat-card purple">
        <div class="stat-top">
          <div class="stat-icon">📦</div>
          <span class="stat-trend trend-up">+0</span>
        </div>
        <div class="stat-label">Total Produk</div>
        <div class="stat-number">6</div>
        <div class="stat-sub">Produk lokal Bali aktif</div>
      </div>

      <div class="stat-card green">
        <div class="stat-top">
          <div class="stat-icon">📝</div>
          <span class="stat-trend trend-up">+1</span>
        </div>
        <div class="stat-label">Total Artikel</div>
        <div class="stat-number">6</div>
        <div class="stat-sub">Artikel budaya & produk</div>
      </div>

      <div class="stat-card orange">
        <div class="stat-top">
          <div class="stat-icon">👤</div>
          <span class="stat-trend trend-up">+0</span>
        </div>
        <div class="stat-label">Total Pengguna</div>
        <div class="stat-number">3</div>
        <div class="stat-sub">Pengguna terdaftar</div>
      </div>

      <div class="stat-card blue">
        <div class="stat-top">
          <div class="stat-icon">💳</div>
          <span class="stat-trend trend-up">+1</span>
        </div>
        <div class="stat-label">Transaksi</div>
        <div class="stat-number">3</div>
        <div class="stat-sub">Total transaksi masuk</div>
      </div>
    </section>

    <!-- Dashboard Grid -->
    <section class="dashboard-grid">

      <!-- Transaksi Terbaru -->
      <div class="panel">
        <div class="panel-header">
          <h2>Transaksi Terbaru</h2>
          <a href="{{ route('admin.transaksi') }}">Lihat Semua →</a>
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
              <td class="td-order">
                <strong>LKN-2026-001</strong>
                <span>10 Juni 2026</span>
              </td>
              <td class="td-product">Scarf Endek Bali Handmade</td>
              <td class="td-amount">Rp 270.000</td>
              <td><span class="status success">Selesai</span></td>
            </tr>
            <tr>
              <td class="td-order">
                <strong>LKN-2026-002</strong>
                <span>8 Juni 2026</span>
              </td>
              <td class="td-product">Kintamani Coffee</td>
              <td class="td-amount">Rp 150.000</td>
              <td><span class="status shipped">Dikirim</span></td>
            </tr>
            <tr>
              <td class="td-order">
                <strong>LKN-2026-003</strong>
                <span>5 Juni 2026</span>
              </td>
              <td class="td-product">Essential Oil Bali</td>
              <td class="td-amount">Rp 170.000</td>
              <td><span class="status process">Diproses</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Aktivitas Sistem -->
      <div class="panel">
        <div class="panel-header">
          <h2>Aktivitas Sistem</h2>
        </div>

        <div class="activity-list">
          <div class="activity">
            <div class="activity-icon">＋</div>
            <div>
              <strong>Produk baru ditambahkan</strong>
              <p>Beaded Basket masuk ke kategori Kerajinan Handmade.</p>
              <div class="activity-time">10 Jun 2026 · 14.32</div>
            </div>
          </div>

          <div class="activity">
            <div class="activity-icon green">✓</div>
            <div>
              <strong>Pembayaran berhasil</strong>
              <p>Pesanan LKN-2026-001 sudah masuk ke history transaksi.</p>
              <div class="activity-time">10 Jun 2026 · 11.05</div>
            </div>
          </div>

          <div class="activity">
            <div class="activity-icon orange">✎</div>
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

<script>
  // Live clock
  function updateTime() {
    const el = document.getElementById('liveTime');
    if (!el) return;
    const now = new Date();
    const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    const d = days[now.getDay()];
    const date = now.getDate();
    const month = months[now.getMonth()];
    const year = now.getFullYear();
    const hh = String(now.getHours()).padStart(2,'0');
    const mm = String(now.getMinutes()).padStart(2,'0');
    el.textContent = `${d}, ${date} ${month} ${year} · ${hh}:${mm}`;
  }
  updateTime();
  setInterval(updateTime, 1000);
</script>

</body>
</html>