<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang - Lokana</title>

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

    .nav-link {
      color: var(--purple);
      font-size: 0.86rem;
      text-decoration: none;
      font-weight: 700;
    }

    main {
      max-width: 1120px;
      margin: 0 auto;
      padding: 72px 48px;
    }

    .page-header {
      margin-bottom: 32px;
    }

    .page-header h1 {
      font-size: 2.5rem;
      letter-spacing: -0.05em;
      margin-bottom: 10px;
    }

    .page-header p {
      color: var(--muted);
      line-height: 1.6;
    }

    .cart-layout {
      display: grid;
      grid-template-columns: 1.4fr 0.6fr;
      gap: 28px;
    }

    .cart-card,
    .summary-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 28px;
    }

    .cart-item {
      display: grid;
      grid-template-columns: 120px 1fr auto;
      gap: 20px;
      align-items: center;
    }

    .cart-item img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 18px;
    }

    .cart-info h3 {
      font-size: 1.05rem;
      margin-bottom: 8px;
    }

    .cart-info p {
      color: var(--muted);
      font-size: 0.86rem;
      line-height: 1.6;
      margin-bottom: 10px;
    }

    .qty {
      display: inline-flex;
      gap: 14px;
      align-items: center;
      border: 1px solid var(--border);
      border-radius: 999px;
      padding: 8px 14px;
    }

    .qty button {
      border: none;
      background: none;
      color: var(--purple);
      font-size: 1rem;
      font-weight: 800;
      cursor: pointer;
    }

    .cart-price {
      font-weight: 800;
      color: var(--purple);
      font-size: 1.1rem;
    }

    .summary-card h2 {
      font-size: 1.25rem;
      margin-bottom: 20px;
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

    .btn-checkout {
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

    .btn-checkout:hover {
      background: var(--purple-dark);
    }

    @media(max-width: 800px) {
      nav { padding: 0 24px; }
      main { padding: 48px 24px; }
      .cart-layout { grid-template-columns: 1fr; }
      .cart-item { grid-template-columns: 90px 1fr; }
      .cart-price { grid-column: 2; }
      .cart-item img { width: 90px; height: 90px; }
    }
  </style>
</head>
<body>

<nav>
  <a href="{{ route('home') }}" class="brand">Lokana</a>
  <a href="{{ route('logout') }}" class="nav-link">Logout</a>
</nav>

<main>
  <div class="page-header">
    <h1>Keranjang</h1>
    <p>Produk yang kamu pilih sudah masuk keranjang. Tinggal cek lagi sebelum lanjut checkout.</p>
  </div>

  <div class="cart-layout">
    <section class="cart-card">
      <div class="cart-item">
        <img src="https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg" alt="Scarf Endek Bali">

        <div class="cart-info">
          <h3>Scarf Endek Bali Handmade</h3>
          <p>Fashion Lokal · Blue Sand</p>

          <div class="qty">
            <button type="button">−</button>
            <span>1</span>
            <button type="button">+</button>
          </div>
        </div>

        <div class="cart-price">Rp 250.000</div>
      </div>
    </section>

    <aside class="summary-card">
      <h2>Ringkasan Belanja</h2>

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

      <a href="{{ route('checkout') }}" class="btn-checkout">Lanjut Checkout</a>
    </aside>
  </div>
</main>

</body>
</html>