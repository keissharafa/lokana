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

    /* ── Empty state ───────────────────────────────────────── */
    .empty-state {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 72px 40px;
      text-align: center;
    }

    .empty-state .empty-icon {
      font-size: 3rem;
      margin-bottom: 16px;
    }

    .empty-state h2 {
      font-size: 1.25rem;
      margin-bottom: 8px;
    }

    .empty-state p {
      color: var(--muted);
      font-size: 0.9rem;
      margin-bottom: 28px;
    }

    .btn-browse {
      display: inline-flex;
      align-items: center;
      height: 44px;
      padding: 0 24px;
      border-radius: 999px;
      background: var(--purple);
      color: var(--white);
      text-decoration: none;
      font-weight: 700;
      font-size: 0.9rem;
    }

    .btn-browse:hover { background: var(--purple-dark); }

    /* ── Cart layout ───────────────────────────────────────── */
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

    /* ── Cart item ─────────────────────────────────────────── */
    .cart-item {
      display: grid;
      grid-template-columns: 120px 1fr auto;
      gap: 20px;
      align-items: center;
    }

    .cart-item + .cart-item {
      margin-top: 24px;
      padding-top: 24px;
      border-top: 1px solid var(--border);
    }

    .cart-item img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 18px;
      background: var(--light-bg);
    }

    .item-badge {
      display: inline-block;
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      padding: 3px 10px;
      border-radius: 999px;
      margin-bottom: 6px;
    }

    .item-badge.produk {
      background: #f0edfc;
      color: var(--purple);
    }

    .item-badge.tiket {
      background: #fff3e0;
      color: #c05000;
    }

    .cart-info h3 {
      font-size: 1.05rem;
      margin-bottom: 4px;
    }

    .cart-info .item-meta {
      color: var(--muted);
      font-size: 0.84rem;
      margin-bottom: 12px;
    }

    .qty {
      display: inline-flex;
      gap: 14px;
      align-items: center;
      border: 1px solid var(--border);
      border-radius: 999px;
      padding: 7px 14px;
    }

    .qty button {
      border: none;
      background: none;
      color: var(--purple);
      font-size: 1rem;
      font-weight: 800;
      cursor: pointer;
      line-height: 1;
      width: 20px;
    }

    .qty button:hover { opacity: 0.7; }

    .qty-value {
      font-weight: 700;
      min-width: 16px;
      text-align: center;
    }

    .btn-remove {
      margin-top: 10px;
      background: none;
      border: none;
      color: #cc3333;
      font-size: 0.8rem;
      font-weight: 600;
      cursor: pointer;
      padding: 0;
    }

    .btn-remove:hover { opacity: 0.7; }

    .cart-price {
      font-weight: 800;
      color: var(--purple);
      font-size: 1.1rem;
      white-space: nowrap;
    }

    /* ── Summary card ──────────────────────────────────────── */
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

    .ongkir-note {
      font-size: 0.78rem;
      color: var(--muted);
      margin-top: -8px;
      margin-bottom: 14px;
      font-style: italic;
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
      cursor: pointer;
      border: none;
      width: 100%;
      font-size: 0.95rem;
      font-family: inherit;
    }

    .btn-checkout:hover { background: var(--purple-dark); }
    .btn-checkout:disabled {
      background: #ccc;
      box-shadow: none;
      cursor: not-allowed;
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

  {{-- Empty state (hidden saat ada item) --}}
  <div id="empty-state" class="empty-state" style="display:none;">
    <div class="empty-icon">🛒</div>
    <h2>Keranjangmu masih kosong</h2>
    <p>Belum ada produk atau tiket yang kamu tambahkan.</p>
    <a href="{{ route('produk') }}" class="btn-browse">Jelajahi Produk</a>
  </div>

  {{-- Cart layout (hidden saat kosong) --}}
  <div id="cart-layout" class="cart-layout" style="display:none;">
    <section class="cart-card" id="cart-items-container">
      {{-- Diisi oleh JS --}}
    </section>

    <aside class="summary-card">
      <h2>Ringkasan Belanja</h2>

      <div class="summary-row">
        <span>Subtotal</span>
        <span id="summary-subtotal">Rp 0</span>
      </div>

      <div class="summary-row" id="ongkir-row">
        <span>Ongkir</span>
        <span id="summary-ongkir">Rp 20.000</span>
      </div>
      <p class="ongkir-note" id="ongkir-note" style="display:none;">
        Khusus tiket event, tidak ada ongkos kirim.
      </p>

      <div class="summary-row total">
        <span>Total</span>
        <span id="summary-total">Rp 0</span>
      </div>

      <button class="btn-checkout" id="btn-checkout">Lanjut Checkout</button>
    </aside>
  </div>
</main>

{{-- Muat cart.js --}}
<script src="{{ asset('js/cart.js') }}"></script>

<script>
(function () {
  const ONGKIR = 20000;

  // ── Render semua item ke DOM ────────────────────────────────
  function renderCart() {
    const cart = getCart();
    const container = document.getElementById('cart-items-container');
    const emptyState = document.getElementById('empty-state');
    const cartLayout = document.getElementById('cart-layout');

    if (cart.length === 0) {
      emptyState.style.display = 'block';
      cartLayout.style.display = 'none';
      return;
    }

    emptyState.style.display = 'none';
    cartLayout.style.display = 'grid';

    // Bangun HTML untuk tiap item
    container.innerHTML = cart.map((item, index) => {
      const isTicket = item.kategori === 'tiket';
      const badgeClass = isTicket ? 'tiket' : 'produk';
      const badgeLabel = isTicket ? 'Tiket Event' : 'Produk';

      // Meta info: untuk tiket tampilkan tier & tanggal, untuk produk tampilkan varian
      let metaText = item.varian || item.kategori;
      if (isTicket) {
        const parts = [];
        if (item.tier) parts.push(item.tier);
        if (item.tanggalEvent) parts.push(item.tanggalEvent);
        metaText = parts.join(' · ');
      }

      const itemTotal = item.harga * item.qty;

      return `
        <div class="cart-item" data-index="${index}">
          <img
            src="${escHtml(item.gambar)}"
            alt="${escHtml(item.nama)}"
            onerror="this.src='https://via.placeholder.com/120x120?text=Gambar'"
          >

          <div class="cart-info">
            <span class="item-badge ${badgeClass}">${badgeLabel}</span>
            <h3>${escHtml(item.nama)}</h3>
            <p class="item-meta">${escHtml(metaText)}</p>

            <div class="qty">
              <button type="button" onclick="changeQty(${index}, -1)">−</button>
              <span class="qty-value" id="qty-${index}">${item.qty}</span>
              <button type="button" onclick="changeQty(${index}, 1)">+</button>
            </div>

            <button class="btn-remove" type="button" onclick="hapusItem(${index})">
              Hapus
            </button>
          </div>

          <div class="cart-price" id="item-price-${index}">${formatRupiah(itemTotal)}</div>
        </div>
      `;
    }).join('');

    updateSummary(cart);
  }

  // ── Update ringkasan harga ──────────────────────────────────
  function updateSummary(cart) {
    const subtotal = getCartSubtotal();
    const hasPhysical = cartHasPhysicalProduct();
    const ongkir = hasPhysical ? ONGKIR : 0;
    const total = subtotal + ongkir;

    document.getElementById('summary-subtotal').textContent = formatRupiah(subtotal);
    document.getElementById('summary-ongkir').textContent = hasPhysical
      ? formatRupiah(ONGKIR)
      : 'Gratis';
    document.getElementById('summary-total').textContent = formatRupiah(total);

    // Tampilkan catatan ongkir kalau cart hanya tiket
    const ongkirNote = document.getElementById('ongkir-note');
    ongkirNote.style.display = cartIsTicketOnly() ? 'block' : 'none';
  }

  // ── Ubah qty item ───────────────────────────────────────────
  window.changeQty = function (index, delta) {
    const cart = getCart();
    if (!cart[index]) return;

    const newQty = cart[index].qty + delta;
    if (newQty < 1) return; // minimal 1

    updateCartQty(index, newQty);

    // Update DOM item secara parsial (tidak re-render penuh supaya smooth)
    const cart2 = getCart();
    document.getElementById('qty-' + index).textContent = cart2[index].qty;
    document.getElementById('item-price-' + index).textContent =
      formatRupiah(cart2[index].harga * cart2[index].qty);

    updateSummary(cart2);
  };

  // ── Hapus item ──────────────────────────────────────────────
  window.hapusItem = function (index) {
    removeFromCart(index);
    renderCart(); // re-render supaya index tidak geser
  };

  // ── Tombol checkout ─────────────────────────────────────────
  document.getElementById('btn-checkout').addEventListener('click', function () {
    const cart = getCart();
    if (cart.length === 0) return;
    window.location.href = "{{ route('checkout') }}";
  });

  function escHtml(str) {
    if (!str) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  renderCart();
})();
</script>

</body>
</html>