<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran Berhasil - Lokana</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>">
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
      --text: #1a1a1a;
      --muted: #666;
      --light-bg: #f9f7f4;
      --white: #fff;
      --border: #e8e3dc;
      --green: #1f9d5a;
      --green-bg: #eaf8f0;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      min-height: 100vh;
      background: var(--light-bg);
      color: var(--text);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    .success-card {
      width: 100%;
      max-width: 560px;
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 30px;
      padding: 42px;
      text-align: center;
      box-shadow: 0 20px 70px rgba(0,0,0,0.08);
    }

    .success-icon {
      width: 84px;
      height: 84px;
      margin: 0 auto 24px;
      border-radius: 50%;
      background: var(--green-bg);
      color: var(--green);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.4rem;
      font-weight: 800;
    }

    .success-label {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 8px 14px;
      margin-bottom: 18px;
      border-radius: 999px;
      background: #f3f0ff;
      color: var(--purple);
      font-size: 0.76rem;
      font-weight: 800;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }

    h1 {
      font-size: clamp(2rem, 5vw, 2.5rem);
      line-height: 1.12;
      letter-spacing: -0.05em;
      margin-bottom: 12px;
    }

    .subtitle {
      color: var(--muted);
      line-height: 1.7;
      font-size: 0.94rem;
      margin-bottom: 30px;
    }

    .order-box {
      background: var(--light-bg);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 20px;
      margin-bottom: 30px;
      text-align: left;
    }

    .order-row {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      font-size: 0.88rem;
      color: var(--muted);
      padding: 10px 0;
      border-bottom: 1px solid rgba(232, 227, 220, 0.8);
    }

    .order-row:first-child {
      padding-top: 0;
    }

    .order-row:last-child {
      padding-bottom: 0;
      border-bottom: none;
      color: var(--text);
      font-weight: 800;
    }

    .order-row span:last-child {
      text-align: right;
    }

    .success-actions {
      display: grid;
      gap: 12px;
    }

    .btn-primary,
    .btn-secondary {
      display: flex;
      height: 48px;
      border-radius: 999px;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 800;
      transition: background 0.25s, transform 0.2s, box-shadow 0.25s;
    }

    .btn-primary {
      background: var(--purple);
      color: var(--white);
      box-shadow: 0 12px 30px rgba(91,63,217,0.28);
    }

    .btn-primary:hover {
      background: var(--purple-dark);
      transform: translateY(-2px);
      box-shadow: 0 16px 38px rgba(91,63,217,0.34);
    }

    .btn-secondary {
      background: #f3f0ff;
      color: var(--purple);
      border: 1px solid rgba(91,63,217,0.16);
    }

    .btn-secondary:hover {
      background: #ece7ff;
      transform: translateY(-2px);
    }

    .small-note {
      margin-top: 22px;
      font-size: 0.78rem;
      color: #999;
      line-height: 1.6;
    }

    @media (max-width: 580px) {
      .success-card {
        padding: 30px 22px;
        border-radius: 24px;
      }

      .success-icon {
        width: 72px;
        height: 72px;
        font-size: 2rem;
      }

      .order-row {
        font-size: 0.82rem;
      }
    }
  </style>
</head>

<body>

  <main class="success-card">
    <div class="success-icon">✓</div>

    <div class="success-label">Payment Success</div>

    <h1>Pembayaran Berhasil</h1>

    <p class="subtitle">
      Pesananmu sudah masuk ke sistem Lokana. Kami akan memproses pesanan dan mengirimkan update pengiriman melalui halaman riwayat transaksi.
    </p>

    <div class="order-box">
      <div class="order-row">
        <span>No. Pesanan</span>
        <span>LKN-2026-001</span>
      </div>

      <div class="order-row">
        <span>Produk</span>
        <span>Scarf Endek Bali Handmade</span>
      </div>

      <div class="order-row">
        <span>Metode Pembayaran</span>
        <span>Virtual Account</span>
      </div>

      <div class="order-row">
        <span>Status</span>
        <span>Pembayaran Berhasil</span>
      </div>

      <div class="order-row">
        <span>Total Pembayaran</span>
        <span>Rp 270.000</span>
      </div>
    </div>

    <div class="success-actions">
      <a href="{{ route('history') }}" class="btn-primary">Lihat Riwayat Transaksi</a>
      <a href="{{ route('home') }}" class="btn-secondary">Kembali ke Home</a>
    </div>

    <p class="small-note">
      Simulasi transaksi ini dibuat untuk kebutuhan prototype frontend Lokana.
    </p>
  </main>

</body>
</html>