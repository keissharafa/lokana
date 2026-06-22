<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Lokana</title>

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
      color: var(--text);
    }

    nav {
      height: 64px;
      padding: 0 48px;
      background: rgba(255,255,255,0.95);
      border-bottom: 1px solid rgba(0,0,0,0.06);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .brand {
      color: var(--text);
      font-weight: 800;
      text-decoration: none;
    }

    main {
      max-width: 1120px;
      margin: 0 auto;
      padding: 72px 48px;
    }

    h1 {
      font-size: 2.5rem;
      letter-spacing: -0.05em;
      margin-bottom: 10px;
    }

    .subtitle {
      color: var(--muted);
      margin-bottom: 32px;
    }

    .checkout-layout {
      display: grid;
      grid-template-columns: 1.2fr 0.8fr;
      gap: 28px;
    }

    .form-card,
    .summary-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 28px;
    }

    .form-card h2,
    .summary-card h2 {
      font-size: 1.25rem;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 16px;
    }

    label {
      display: block;
      font-size: 0.82rem;
      font-weight: 700;
      margin-bottom: 8px;
    }

    input,
    textarea,
    select {
      width: 100%;
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 13px 14px;
      font-family: inherit;
      outline: none;
      background: var(--white);
    }

    textarea {
      min-height: 100px;
      resize: vertical;
    }

    input:focus,
    textarea:focus,
    select:focus {
      border-color: var(--purple);
    }

    .summary-item {
      display: flex;
      gap: 14px;
      margin-bottom: 20px;
    }

    .summary-item img {
      width: 76px;
      height: 76px;
      object-fit: cover;
      border-radius: 14px;
    }

    .summary-item h3 {
      font-size: 0.95rem;
      margin-bottom: 6px;
    }

    .summary-item p {
      font-size: 0.82rem;
      color: var(--muted);
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 14px;
      color: var(--muted);
      font-size: 0.9rem;
    }

    .summary-row.total {
      border-top: 1px solid var(--border);
      padding-top: 18px;
      margin-top: 18px;
      color: var(--text);
      font-weight: 800;
      font-size: 1rem;
    }

    .btn-pay {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 48px;
      margin-top: 24px;
      border-radius: 999px;
      background: var(--purple);
      color: var(--white);
      text-decoration: none;
      font-weight: 800;
      box-shadow: 0 12px 30px rgba(91,63,217,0.28);
    }

    .btn-pay:hover {
      background: var(--purple-dark);
    }

    @media(max-width: 800px) {
      nav { padding: 0 24px; }
      main { padding: 48px 24px; }
      .checkout-layout { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<nav>
  <a href="{{ route('home') }}" class="brand">Lokana</a>
</nav>

<main>
  <h1>Checkout</h1>
  <p class="subtitle">Lengkapi data pengiriman sebelum lanjut ke pembayaran.</p>

  <div class="checkout-layout">
    <section class="form-card">
      <h2>Alamat Pengiriman</h2>

      <div class="form-group">
        <label>Nama Penerima</label>
        <input type="text" value="User Lokana">
      </div>

      <div class="form-group">
        <label>No. HP</label>
        <input type="text" placeholder="08xxxxxxxxxx">
      </div>

      <div class="form-group">
        <label>Alamat Lengkap</label>
        <textarea placeholder="Masukkan alamat lengkap"></textarea>
      </div>

      <div class="form-group">
        <label>Metode Pengiriman</label>
        <select>
          <option>Reguler - Rp 20.000</option>
          <option>Express - Rp 35.000</option>
        </select>
      </div>
    </section>

    <aside class="summary-card">
      <h2>Ringkasan Pesanan</h2>

      <div class="summary-item">
        <img src="https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg" alt="Scarf Endek">
        <div>
          <h3>Scarf Endek Bali Handmade</h3>
          <p>1 barang · Blue Sand</p>
        </div>
      </div>

      <div class="summary-row">
        <span>Subtotal</span>
        <span>Rp 250.000</span>
      </div>

      <div class="summary-row">
        <span>Ongkir</span>
        <span>Rp 20.000</span>
      </div>

      <div class="summary-row total">
        <span>Total</span>
        <span>Rp 270.000</span>
      </div>

      <a href="{{ route('pembayaran') }}" class="btn-pay">Lanjut Pembayaran</a>
    </aside>
  </div>
</main>

</body>
</html>