<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran - Lokana</title>

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --purple: #5B3FD9;
      --purple-dark: #4730B3;
      --text: #1a1a1a;
      --muted: #666;
      --light-bg: #f9f7f4;
      --white: #fff;
      --border: #e8e3dc;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--light-bg);
      min-height: 100vh;
      color: var(--text);
    }

    nav {
      height: 64px;
      padding: 0 48px;
      background: rgba(255,255,255,0.95);
      border-bottom: 1px solid rgba(0,0,0,0.06);
      display: flex;
      align-items: center;
    }

    .brand {
      color: var(--text);
      font-weight: 800;
      text-decoration: none;
    }

    main {
      max-width: 720px;
      margin: 0 auto;
      padding: 72px 24px;
    }

    .payment-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 28px;
      padding: 36px;
      box-shadow: 0 20px 70px rgba(0,0,0,0.08);
    }

    h1 {
      font-size: 2.2rem;
      letter-spacing: -0.05em;
      margin-bottom: 10px;
    }

    .subtitle {
      color: var(--muted);
      line-height: 1.6;
      margin-bottom: 30px;
    }

    .payment-option {
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 18px;
      margin-bottom: 14px;
      display: flex;
      align-items: center;
      gap: 14px;
      cursor: pointer;
    }

    .payment-option.active {
      border-color: var(--purple);
      background: #f3f0ff;
    }

    .dot {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      border: 5px solid var(--purple);
    }

    .payment-option h3 {
      font-size: 0.98rem;
      margin-bottom: 4px;
    }

    .payment-option p {
      font-size: 0.82rem;
      color: var(--muted);
    }

    .total-box {
      margin: 28px 0;
      padding: 20px;
      border-radius: 18px;
      background: var(--light-bg);
      display: flex;
      justify-content: space-between;
      font-weight: 800;
    }

    .total-box span:last-child {
      color: var(--purple);
    }

    .btn-finish {
      display: flex;
      height: 50px;
      border-radius: 999px;
      align-items: center;
      justify-content: center;
      background: var(--purple);
      color: var(--white);
      text-decoration: none;
      font-weight: 800;
      box-shadow: 0 12px 30px rgba(91,63,217,0.28);
    }

    .btn-finish:hover {
      background: var(--purple-dark);
    }
  </style>
</head>
<body>

<nav>
  <a href="{{ route('home') }}" class="brand">Lokana</a>
</nav>

<main>
  <div class="payment-card">
    <h1>Pembayaran</h1>
    <p class="subtitle">Pilih metode pembayaran untuk menyelesaikan pesananmu.</p>

    <div class="payment-option active">
      <div class="dot"></div>
      <div>
        <h3>Transfer Bank Virtual Account</h3>
        <p>BCA / Mandiri / BNI / BRI</p>
      </div>
    </div>

    <div class="payment-option">
      <div class="dot" style="border-color:#ddd;"></div>
      <div>
        <h3>E-Wallet</h3>
        <p>OVO / DANA / GoPay / ShopeePay</p>
      </div>
    </div>

    <div class="payment-option">
      <div class="dot" style="border-color:#ddd;"></div>
      <div>
        <h3>QRIS</h3>
        <p>Scan QR dari aplikasi pembayaran favoritmu</p>
      </div>
    </div>

    <div class="total-box">
      <span>Total Pembayaran</span>
      <span>Rp 270.000</span>
    </div>

    <a href="{{ route('payment.success') }}" class="btn-finish">Bayar Sekarang</a>
  </div>
</main>

</body>
</html>