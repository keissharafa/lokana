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
      --purple: #5B3FD9;
      --purple-dark: #4730B3;
      --gold: #C8963C;
      --text: #1a1a1a;
      --muted: #666;
      --light-bg: #f9f7f4;
      --white: #fff;
      --border: #e8e3dc;
      --green: #1f9d5a;
      --green-bg: #eaf8f0;
      --orange: #c9851b;
      --orange-bg: #fff4df;
      --red: #c0392b;
      --red-bg: #ffecec;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--light-bg);
      color: var(--text);
      overflow-x: hidden;
    }

    .admin-layout {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 260px 1fr;
    }

    .sidebar {
      position: sticky;
      top: 0;
      height: 100vh;
      background: var(--white);
      border-right: 1px solid var(--border);
      padding: 28px 22px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .brand {
      font-size: 1.25rem;
      font-weight: 800;
      color: var(--purple);
      text-decoration: none;
      letter-spacing: -0.03em;
      display: inline-block;
      margin-bottom: 34px;
    }

    .admin-label {
      font-size: 0.72rem;
      font-weight: 800;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #aaa;
      margin-bottom: 14px;
    }

    .side-nav {
      display: grid;
      gap: 8px;
    }

    .side-nav a {
      text-decoration: none;
      color: var(--muted);
      font-size: 0.9rem;
      font-weight: 700;
      padding: 12px 14px;
      border-radius: 14px;
      transition: all 0.2s;
    }

    .side-nav a:hover,
    .side-nav a.active {
      color: var(--purple);
      background: #f3f0ff;
    }

    .sidebar-footer {
      display: grid;
      gap: 10px;
      font-size: 0.84rem;
      color: var(--muted);
    }

    .logout {
      color: var(--red);
      text-decoration: none;
      font-weight: 800;
    }

    .content {
      padding: 34px 42px 60px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 24px;
      margin-bottom: 34px;
    }

    .page-title h1 {
      font-size: clamp(2rem, 4vw, 3rem);
      font-weight: 800;
      letter-spacing: -0.05em;
      margin-bottom: 10px;
    }

    .page-title p {
      color: var(--muted);
      font-size: 0.94rem;
      line-height: 1.7;
      max-width: 620px;
    }

    .admin-badge {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 999px;
      padding: 11px 16px;
      font-size: 0.84rem;
      color: var(--muted);
      white-space: nowrap;
    }

    .admin-badge strong {
      color: var(--purple);
    }

    .stat-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
      margin-bottom: 28px;
    }

    .stat-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 22px;
      padding: 22px;
      box-shadow: 0 12px 36px rgba(0,0,0,0.04);
    }

    .stat-card span {
      display: block;
      color: var(--muted);
      font-size: 0.8rem;
      margin-bottom: 10px;
    }

    .stat-card strong {
      font-size: 1.75rem;
      letter-spacing: -0.04em;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: 1.2fr 0.8fr;
      gap: 22px;
    }

    .panel {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 24px;
      box-shadow: 0 12px 36px rgba(0,0,0,0.04);
    }

    .panel-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      margin-bottom: 20px;
    }

    .panel-header h2 {
      font-size: 1.15rem;
      letter-spacing: -0.03em;
    }

    .panel-header a {
      color: var(--purple);
      text-decoration: none;
      font-size: 0.82rem;
      font-weight: 800;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th {
      text-align: left;
      font-size: 0.74rem;
      color: #999;
      font-weight: 800;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 0 0 14px;
    }

    td {
      padding: 16px 0;
      border-top: 1px solid var(--border);
      font-size: 0.86rem;
      color: var(--muted);
      vertical-align: middle;
    }

    td strong {
      display: block;
      color: var(--text);
      margin-bottom: 4px;
    }

    .status {
      display: inline-flex;
      padding: 7px 11px;
      border-radius: 999px;
      font-size: 0.72rem;
      font-weight: 800;
    }

    .status.success {
      color: var(--green);
      background: var(--green-bg);
    }

    .status.process {
      color: var(--orange);
      background: var(--orange-bg);
    }

    .activity-list {
      display: grid;
      gap: 14px;
    }

    .activity {
      display: grid;
      grid-template-columns: 38px 1fr;
      gap: 12px;
      align-items: flex-start;
      padding-bottom: 14px;
      border-bottom: 1px solid var(--border);
    }

    .activity:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .activity-icon {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: #f3f0ff;
      color: var(--purple);
      display: grid;
      place-items: center;
      font-weight: 800;
    }

    .activity strong {
      display: block;
      font-size: 0.9rem;
      margin-bottom: 4px;
    }

    .activity p {
      color: var(--muted);
      font-size: 0.82rem;
      line-height: 1.55;
    }

    @media (max-width: 980px) {
      .admin-layout {
        grid-template-columns: 1fr;
      }

      .sidebar {
        position: static;
        height: auto;
        padding: 20px 24px;
      }

      .side-nav {
        grid-template-columns: repeat(2, 1fr);
      }

      .content {
        padding: 28px 24px 48px;
      }

      .stat-grid,
      .dashboard-grid {
        grid-template-columns: 1fr 1fr;
      }

      .dashboard-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 640px) {
      .side-nav {
        grid-template-columns: 1fr;
      }

      .topbar {
        flex-direction: column;
      }

      .stat-grid {
        grid-template-columns: 1fr;
      }

      .panel {
        overflow-x: auto;
      }

      table {
        min-width: 560px;
      }
    }
  </style>
</head>
<body>

<div class="admin-layout">
  <aside class="sidebar">
    <div>
      <a href="{{ route('admin.dashboard') }}" class="brand">Lokana Admin</a>

      <div class="admin-label">Menu Admin</div>
      <nav class="side-nav">
        <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
        <a href="{{ route('admin.produk') }}">Kelola Produk</a>
        <a href="{{ route('admin.artikel') }}">Kelola Artikel</a>
        <a href="{{ route('admin.pengguna') }}">Kelola Pengguna</a>
        <a href="{{ route('admin.transaksi') }}">Kelola Transaksi</a>
      </nav>
    </div>

    <div class="sidebar-footer">
      <span>Login sebagai <strong>{{ session('admin_name', 'Admin Lokana') }}</strong></span>
      <a href="{{ route('admin.logout') }}" class="logout">Logout</a>
    </div>
  </aside>

  <main class="content">
    <section class="topbar">
      <div class="page-title">
        <h1>Dashboard Admin</h1>
        <p>Ringkasan aktivitas marketplace Lokana, mulai dari produk lokal, artikel, pengguna, sampai transaksi terbaru.</p>
      </div>

      <div class="admin-badge">
        Role: <strong>Admin</strong>
      </div>
    </section>

    <section class="stat-grid">
      <div class="stat-card">
        <span>Total Produk</span>
        <strong>6</strong>
      </div>

      <div class="stat-card">
        <span>Total Artikel</span>
        <strong>6</strong>
      </div>

      <div class="stat-card">
        <span>Total Pengguna</span>
        <strong>3</strong>
      </div>

      <div class="stat-card">
        <span>Transaksi</span>
        <strong>3</strong>
      </div>
    </section>

    <section class="dashboard-grid">
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
              <td><strong>LKN-2026-001</strong>10 Juni 2026</td>
              <td>Scarf Endek Bali Handmade</td>
              <td>Rp 270.000</td>
              <td><span class="status success">Berhasil</span></td>
            </tr>

            <tr>
              <td><strong>LKN-2026-002</strong>8 Juni 2026</td>
              <td>Kintamani Coffee</td>
              <td>Rp 150.000</td>
              <td><span class="status success">Berhasil</span></td>
            </tr>

            <tr>
              <td><strong>LKN-2026-003</strong>5 Juni 2026</td>
              <td>Essential Oil Bali</td>
              <td>Rp 170.000</td>
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
            <div class="activity-icon">+</div>
            <div>
              <strong>Produk baru ditambahkan</strong>
              <p>Beaded Basket masuk ke kategori Kerajinan Handmade.</p>
            </div>
          </div>

          <div class="activity">
            <div class="activity-icon">✓</div>
            <div>
              <strong>Pembayaran berhasil</strong>
              <p>Pesanan LKN-2026-001 sudah masuk ke history transaksi user.</p>
            </div>
          </div>

          <div class="activity">
            <div class="activity-icon">✎</div>
            <div>
              <strong>Artikel diperbarui</strong>
              <p>Konten Endek Bali disesuaikan dengan landing page Lokana.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</div>

</body>
</html>