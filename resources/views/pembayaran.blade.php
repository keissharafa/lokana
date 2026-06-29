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
      transition: border-color 0.15s, background 0.15s;
      user-select: none;
    }

    .payment-option.active {
      border-color: var(--purple);
      background: #f3f0ff;
    }

    .dot {
      width: 18px;
      height: 18px;
      flex-shrink: 0;
      border-radius: 50%;
      border: 5px solid #ddd;
      transition: border-color 0.15s;
    }

    .payment-option.active .dot {
      border-color: var(--purple);
    }

    .payment-option h3 {
      font-size: 0.98rem;
      margin-bottom: 4px;
    }

    .payment-option p {
      font-size: 0.82rem;
      color: var(--muted);
    }

    .divider {
      height: 1px;
      background: var(--border);
      margin: 28px 0;
    }

    .total-breakdown {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-bottom: 20px;
    }

    .total-row {
      display: flex;
      justify-content: space-between;
      font-size: 0.9rem;
      color: var(--muted);
    }

    .total-row.main {
      font-size: 1rem;
      font-weight: 800;
      color: var(--text);
      padding-top: 10px;
      border-top: 1px solid var(--border);
    }

    .total-row.main span:last-child {
      color: var(--purple);
    }

    .btn-finish {
      display: flex;
      width: 100%;
      height: 50px;
      border-radius: 999px;
      align-items: center;
      justify-content: center;
      background: var(--purple);
      color: var(--white);
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 1rem;
      font-weight: 800;
      border: none;
      cursor: pointer;
      box-shadow: 0 12px 30px rgba(91,63,217,0.28);
      transition: background 0.15s;
    }

    .btn-finish:hover {
      background: var(--purple-dark);
    }

    .btn-finish:disabled {
      opacity: 0.6;
      cursor: not-allowed;
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

    <div class="payment-option active" onclick="selectPayment(this)">
      <div class="dot"></div>
      <div>
        <h3>Transfer Bank Virtual Account</h3>
        <p>BCA / Mandiri / BNI / BRI</p>
      </div>
    </div>

    <div class="payment-option" onclick="selectPayment(this)">
      <div class="dot"></div>
      <div>
        <h3>E-Wallet</h3>
        <p>OVO / DANA / GoPay / ShopeePay</p>
      </div>
    </div>

    <div class="payment-option" onclick="selectPayment(this)">
      <div class="dot"></div>
      <div>
        <h3>QRIS</h3>
        <p>Scan QR dari aplikasi pembayaran favoritmu</p>
      </div>
    </div>

    <div class="divider"></div>

    <div class="total-breakdown">
      <div class="total-row">
        <span>Subtotal</span>
        <span id="subtotal-val">-</span>
      </div>
      <div class="total-row" id="ongkir-row">
        <span>Ongkos Kirim</span>
        <span id="ongkir-val">-</span>
      </div>
      <div class="total-row main">
        <span>Total Pembayaran</span>
        <span id="total-val">-</span>
      </div>
    </div>

    <button type="button" class="btn-finish" id="btn-bayar" onclick="handleBayar()">
      Bayar Sekarang
    </button>
  </div>
</main>

<script src="{{ asset('js/cart.js') }}"></script>
<script>
  // Guard: redirect jika cart kosong
  (function() {
    const cart = getCart();
    if (!cart || cart.length === 0) {
      window.location.href = '{{ route("keranjang") }}';
    }
  })();

  // Render total dari localStorage
  function renderTotal() {
    const subtotal = getCartSubtotal();
    const ongkir  = cartHasPhysicalProduct() ? 20000 : 0;
    const total   = subtotal + ongkir;

    document.getElementById('subtotal-val').textContent = formatRupiah(subtotal);
    document.getElementById('ongkir-val').textContent   = ongkir > 0 ? formatRupiah(ongkir) : 'Gratis';
    document.getElementById('total-val').textContent    = formatRupiah(total);

    // Sembunyikan baris ongkir kalau tiket-only
    document.getElementById('ongkir-row').style.display = ongkir === 0 ? 'none' : 'flex';
  }

  // Toggle active payment option
  function selectPayment(el) {
    document.querySelectorAll('.payment-option').forEach(opt => opt.classList.remove('active'));
    el.classList.add('active');
  }

  // Klik bayar → redirect ke payment success
  function handleBayar() {
    const btn = document.getElementById('btn-bayar');
    btn.disabled = true;
    btn.textContent = 'Memproses...';

    // Simulasi proses singkat sebelum redirect
    setTimeout(() => {
      window.location.href = '{{ route("payment.success") }}';
    }, 800);
  }

  renderTotal();
</script>
</body>
</html>