<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History Transaksi - Lokana</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>"/>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

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
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--light-bg);
      color: var(--text);
      overflow-x: hidden;
    }

    nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 200;
      height: 64px;
      padding: 0 48px;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(0,0,0,0.06);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .nav-brand {
      font-size: 1.15rem;
      font-weight: 800;
      color: var(--text);
      text-decoration: none;
      letter-spacing: -0.02em;
    }

    .nav-links {
      display: flex;
      gap: 32px;
      list-style: none;
    }

    .nav-links a {
      color: var(--muted);
      text-decoration: none;
      font-size: 0.86rem;
      font-weight: 600;
      transition: color 0.2s;
    }

    .nav-links a:hover,
    .nav-links a.active {
      color: var(--purple);
    }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .nav-actions a {
      color: var(--muted);
      text-decoration: none;
      font-size: 0.84rem;
      font-weight: 700;
    }

    .history-page {
      min-height: 100vh;
      padding: 128px 48px 72px;
    }

    .history-wrap {
      max-width: 1120px;
      margin: 0 auto;
    }

    .history-header {
      display: flex;
      justify-content: space-between;
      gap: 32px;
      align-items: flex-end;
      margin-bottom: 34px;
    }

    .history-title h1 {
      font-size: clamp(2rem, 4vw, 3.2rem);
      font-weight: 800;
      letter-spacing: -0.05em;
      margin-bottom: 12px;
    }

    .history-title p {
      max-width: 560px;
      color: var(--muted);
      font-size: 0.95rem;
      line-height: 1.7;
    }

    .history-filter {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      justify-content: flex-end;
    }

    .pill {
      padding: 9px 18px;
      border: 1px solid var(--border);
      border-radius: 999px;
      background: var(--white);
      color: var(--muted);
      text-decoration: none;
      font-size: 0.82rem;
      font-weight: 600;
      transition: all 0.2s;
    }

    .pill.active,
    .pill:hover {
      color: var(--purple);
      border-color: var(--purple);
      background: #f3f0ff;
    }

    .transaction-list {
      display: grid;
      gap: 18px;
    }

    .transaction-card {
      background: var(--white);
      border: 1px solid rgba(232, 227, 220, 0.85);
      border-radius: 24px;
      padding: 24px;
      box-shadow: 0 12px 40px rgba(0,0,0,0.045);
    }

    .transaction-top {
      display: flex;
      justify-content: space-between;
      gap: 24px;
      align-items: flex-start;
      padding-bottom: 18px;
      border-bottom: 1px solid var(--border);
      margin-bottom: 18px;
    }

    .transaction-code {
      font-size: 0.78rem;
      color: var(--muted);
      margin-bottom: 6px;
    }

    .transaction-code strong {
      color: var(--text);
    }

    .transaction-date {
      font-size: 0.82rem;
      color: var(--muted);
    }

    .status {
      padding: 8px 14px;
      border-radius: 999px;
      font-size: 0.76rem;
      font-weight: 800;
      white-space: nowrap;
    }

    .status.success {
      color: var(--green);
      background: var(--green-bg);
    }

    .status.process {
      color: var(--orange);
      background: var(--orange-bg);
    }

    .transaction-body {
      display: grid;
      grid-template-columns: 86px 1fr auto;
      gap: 18px;
      align-items: center;
    }

    .transaction-body img {
      width: 86px;
      height: 86px;
      object-fit: cover;
      border-radius: 16px;
      background: #eee;
    }

    .product-info h3 {
      font-size: 1rem;
      margin-bottom: 7px;
      letter-spacing: -0.01em;
    }

    .product-info p {
      color: var(--muted);
      font-size: 0.84rem;
      line-height: 1.55;
    }

    .transaction-price {
      text-align: right;
    }

    .transaction-price span {
      display: block;
      color: var(--muted);
      font-size: 0.78rem;
      margin-bottom: 4px;
    }

    .transaction-price strong {
      color: var(--purple);
      font-size: 1.05rem;
    }

    .transaction-actions {
      margin-top: 20px;
      display: flex;
      gap: 12px;
      justify-content: flex-end;
    }

    .btn-outline,
    .btn-primary {
      min-height: 42px;
      padding: 0 18px;
      border-radius: 999px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      font-size: 0.82rem;
      font-weight: 800;
    }

    .btn-outline {
      color: var(--purple);
      border: 1px solid rgba(91,63,217,0.35);
      background: var(--white);
    }

    .btn-primary {
      color: var(--white);
      border: 1px solid var(--purple);
      background: var(--purple);
      box-shadow: 0 10px 24px rgba(91,63,217,0.22);
    }

    .summary-strip {
      margin-bottom: 28px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }

    .summary-box {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 20px;
    }

    .summary-box span {
      display: block;
      color: var(--muted);
      font-size: 0.8rem;
      margin-bottom: 8px;
    }

    .summary-box strong {
      font-size: 1.35rem;
      color: var(--text);
    }

    @media (max-width: 900px) {
      nav {
        padding: 0 24px;
      }

      .nav-links {
        display: none;
      }

      .history-page {
        padding: 104px 24px 56px;
      }

      .history-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .history-filter {
        justify-content: flex-start;
      }

      .summary-strip {
        grid-template-columns: 1fr;
      }

      .transaction-body {
        grid-template-columns: 76px 1fr;
      }

      .transaction-price {
        grid-column: 2;
        text-align: left;
      }

      .transaction-actions {
        justify-content: flex-start;
      }
    }

    @media (max-width: 580px) {
      nav {
        padding: 0 20px;
      }

      .history-page {
        padding: 92px 20px 44px;
      }

      .transaction-card {
        padding: 18px;
        border-radius: 20px;
      }

      .transaction-top {
        flex-direction: column;
        gap: 12px;
      }

      .transaction-actions {
        flex-direction: column;
      }

      .btn-outline,
      .btn-primary {
        width: 100%;
      }
    }
  </style>
</head>

<body>

<nav>
  <a href="{{ route('home') }}" class="nav-brand">Lokana</a>

  <ul class="nav-links">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('produk') }}">Produk Lokal</a></li>
    <li><a href="{{ route('event') }}">Event &amp; Tiket</a></li>
    <li><a href="{{ route('artikel') }}">Artikel Lokal</a></li>
    <li><a href="{{ route('history') }}" class="active">History</a></li>
  </ul>

  <div class="nav-actions">
    <a href="{{ route('logout') }}">Logout</a>
  </div>
</nav>

<main class="history-page">
  <div class="history-wrap">
    <section class="history-header">
      <div class="history-title">
        <h1>History Transaksi</h1>
        <p>
          Riwayat pesanan yang pernah kamu buat di Lokana. Kamu bisa melihat status pembayaran, detail produk, dan total transaksi dari halaman ini.
        </p>
      </div>

      <div class="history-filter">
        <a href="#" class="pill active">Semua</a>
        <a href="#" class="pill">Berhasil</a>
        <a href="#" class="pill">Diproses</a>
        <a href="#" class="pill">Dibatalkan</a>
      </div>
    </section>

    <section class="summary-strip">
      <div class="summary-box">
        <span>Total Pesanan</span>
        <strong>3</strong>
      </div>

      <div class="summary-box">
        <span>Transaksi Berhasil</span>
        <strong>2</strong>
      </div>

      <div class="summary-box">
        <span>Sedang Diproses</span>
        <strong>1</strong>
      </div>
    </section>

    <section class="transaction-list">

      <article class="transaction-card">
        <div class="transaction-top">
          <div>
            <div class="transaction-code">No. Pesanan: <strong>LKN-2026-001</strong></div>
            <div class="transaction-date">10 Juni 2026 · 14:32 WIB</div>
          </div>

          <div class="status success">Pembayaran Berhasil</div>
        </div>

        <div class="transaction-body">
          <img src="https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg" alt="Scarf Endek Bali">

          <div class="product-info">
            <h3>Scarf Endek Bali Handmade</h3>
            <p>Fashion Lokal · Blue Sand · 1 barang</p>
          </div>

          <div class="transaction-price">
            <span>Total Bayar</span>
            <strong>Rp 270.000</strong>
          </div>
        </div>

        <div class="transaction-actions">
          <a href="{{ route('produk.scarf_endek') }}" class="btn-outline">Beli Lagi</a>
          <a href="#" class="btn-primary">Lihat Detail</a>
        </div>
      </article>

      <article class="transaction-card">
        <div class="transaction-top">
          <div>
            <div class="transaction-code">No. Pesanan: <strong>LKN-2026-002</strong></div>
            <div class="transaction-date">8 Juni 2026 · 09:18 WIB</div>
          </div>

          <div class="status success">Pembayaran Berhasil</div>
        </div>

        <div class="transaction-body">
          <img src="https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg" alt="Kintamani Coffee">

          <div class="product-info">
            <h3>Kintamani Coffee</h3>
            <p>Kopi & Minuman · Beans · 2 barang</p>
          </div>

          <div class="transaction-price">
            <span>Total Bayar</span>
            <strong>Rp 150.000</strong>
          </div>
        </div>

        <div class="transaction-actions">
          <a href="{{ route('produk.kintamani_coffee') }}" class="btn-outline">Beli Lagi</a>
          <a href="#" class="btn-primary">Lihat Detail</a>
        </div>
      </article>

      <article class="transaction-card">
        <div class="transaction-top">
          <div>
            <div class="transaction-code">No. Pesanan: <strong>LKN-2026-003</strong></div>
            <div class="transaction-date">5 Juni 2026 · 19:45 WIB</div>
          </div>

          <div class="status process">Sedang Diproses</div>
        </div>

        <div class="transaction-body">
          <img src="https://i.pinimg.com/736x/a9/84/83/a9848382e0f00383dc3a020ddae17ca0.jpg" alt="Essential Oil Bali">

          <div class="product-info">
            <h3>Essential Oil Bali</h3>
            <p>Self-care · Tropical Calm · 1 barang</p>
          </div>

          <div class="transaction-price">
            <span>Total Bayar</span>
            <strong>Rp 170.000</strong>
          </div>
        </div>

        <div class="transaction-actions">
          <a href="{{ route('produk.essential_oil') }}" class="btn-outline">Beli Lagi</a>
          <a href="#" class="btn-primary">Lihat Detail</a>
        </div>
      </article>

    </section>
  </div>
</main>

</body>
</html>