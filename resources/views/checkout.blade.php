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

    /* State khusus saat cart cuma isi tiket (tanpa produk fisik) */
    .ticket-only-note {
      display: none;
      align-items: flex-start;
      gap: 14px;
      padding: 20px;
      border-radius: 18px;
      background: #f3f0ff;
      border: 1px solid rgba(91,63,217,0.18);
    }

    .ticket-only-note svg {
      width: 22px;
      height: 22px;
      stroke: var(--purple);
      fill: none;
      stroke-width: 1.8;
      flex-shrink: 0;
      margin-top: 2px;
    }

    .ticket-only-note h3 {
      font-size: 0.95rem;
      margin-bottom: 6px;
      color: var(--text);
    }

    .ticket-only-note p {
      font-size: 0.84rem;
      color: var(--muted);
      line-height: 1.6;
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
      flex-shrink: 0;
      background: #eee;
    }

    .summary-item h3 {
      font-size: 0.95rem;
      margin-bottom: 6px;
    }

    .summary-item p {
      font-size: 0.82rem;
      color: var(--muted);
    }

    .item-badge {
      display: inline-block;
      font-size: 0.66rem;
      font-weight: 800;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      color: var(--purple);
      background: #f3f0ff;
      padding: 3px 9px;
      border-radius: 999px;
      margin-bottom: 6px;
    }

    .empty-cart-note {
      text-align: center;
      padding: 24px 0;
      color: var(--muted);
      font-size: 0.88rem;
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
      border: none;
      width: 100%;
      cursor: pointer;
      font-family: inherit;
      font-size: 0.95rem;
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
  <p class="subtitle" id="checkoutSubtitle">Lengkapi data pengiriman sebelum lanjut ke pembayaran.</p>

  <div class="checkout-layout">
    <section class="form-card" id="shippingFormCard">
      <h2>Alamat Pengiriman</h2>

      <div class="form-group">
        <label>Nama Penerima</label>
        <input type="text" id="namaPenerima" value="User Lokana">
      </div>

      <div class="form-group">
        <label>No. HP</label>
        <input type="text" id="noHp" placeholder="08xxxxxxxxxx">
      </div>

      <div class="form-group">
        <label>Alamat Lengkap</label>
        <textarea id="alamatLengkap" placeholder="Masukkan alamat lengkap"></textarea>
      </div>

      <div class="form-group">
        <label>Metode Pengiriman</label>
        <select id="metodePengiriman">
          <option value="20000">Reguler - Rp 20.000</option>
          <option value="35000">Express - Rp 35.000</option>
        </select>
      </div>
    </section>

    <!-- Ditampilkan sebagai pengganti form alamat jika cart hanya berisi tiket event -->
    <section class="form-card" id="ticketOnlyCard" style="display:none;">
      <h2>Tiket Event</h2>

      <div class="ticket-only-note" style="display:flex;">
        <svg viewBox="0 0 24 24"><path d="M21 8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8z"/><path d="M2 10h20"/></svg>
        <div>
          <h3>Tidak perlu pengiriman barang</h3>
          <p>Pesananmu berisi tiket event. E-tiket akan tersedia langsung di halaman History setelah pembayaran berhasil — tidak ada proses kirim barang maupun ongkos kirim.</p>
        </div>
      </div>
    </section>

    <aside class="summary-card">
      <h2>Ringkasan Pesanan</h2>

      <div id="summaryItemsContainer">
        <!-- Item cart dirender di sini oleh JS -->
      </div>

      <div class="summary-row">
        <span>Subtotal</span>
        <span id="subtotalValue">Rp 0</span>
      </div>

      <div class="summary-row" id="ongkirRow">
        <span>Ongkir</span>
        <span id="ongkirValue">Rp 0</span>
      </div>

      <div class="summary-row total">
        <span>Total</span>
        <span id="totalValue">Rp 0</span>
      </div>

      <button type="button" class="btn-pay" id="lanjutPembayaranBtn">Lanjut Pembayaran</button>
    </aside>
  </div>
</main>

<script src="{{ asset('js/cart.js') }}"></script>
<script>
  const cart = getCart();
  const summaryItemsContainer = document.getElementById('summaryItemsContainer');
  const shippingFormCard = document.getElementById('shippingFormCard');
  const ticketOnlyCard = document.getElementById('ticketOnlyCard');
  const ongkirRow = document.getElementById('ongkirRow');
  const metodePengiriman = document.getElementById('metodePengiriman');
  const checkoutSubtitle = document.getElementById('checkoutSubtitle');

  const isTicketOnly = cartIsTicketOnly();

  // Tampilan form alamat ATAU info tiket
  if (isTicketOnly) {
    shippingFormCard.style.display = 'none';
    ticketOnlyCard.style.display = 'block';
    ongkirRow.style.display = 'none';
    checkoutSubtitle.textContent = 'Cek kembali tiket event yang kamu pesan sebelum lanjut ke pembayaran.';
  } else {
    shippingFormCard.style.display = 'block';
    ticketOnlyCard.style.display = 'none';
    ongkirRow.style.display = 'flex';
  }

  function renderSummaryItems() {
    if (cart.length === 0) {
      summaryItemsContainer.innerHTML = '<p class="empty-cart-note">Keranjangmu masih kosong.</p>';
      return;
    }

    summaryItemsContainer.innerHTML = cart.map(item => {
      const badgeLabel = item.kategori === 'tiket' ? 'Tiket Event' : 'Produk';

      let detailLine = '';
      if (item.kategori === 'tiket') {
        const tanggalFormatted = item.tanggalEvent
          ? new Date(item.tanggalEvent).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })
          : '-';
        detailLine = `${item.tier || 'Reguler'} · ${tanggalFormatted} · ${item.qty} tiket`;
      } else {
        detailLine = `${item.varian ? item.varian + ' · ' : ''}${item.qty} barang`;
      }

      return `
        <div class="summary-item">
          <img src="${item.gambar}" alt="${item.nama}">
          <div>
            <span class="item-badge">${badgeLabel}</span>
            <h3>${item.nama}</h3>
            <p>${detailLine}</p>
          </div>
        </div>
      `;
    }).join('');
  }

  function calculateTotals() {
    const subtotal = getCartSubtotal();
    const ongkir = isTicketOnly ? 0 : parseInt(metodePengiriman.value);
    const total = subtotal + ongkir;

    document.getElementById('subtotalValue').textContent = formatRupiah(subtotal);
    document.getElementById('ongkirValue').textContent = formatRupiah(ongkir);
    document.getElementById('totalValue').textContent = formatRupiah(total);
  }

  renderSummaryItems();
  calculateTotals();

  if (!isTicketOnly) {
    metodePengiriman.addEventListener('change', calculateTotals);
  }

  document.getElementById('lanjutPembayaranBtn').addEventListener('click', () => {
    if (cart.length === 0) {
      alert('Keranjangmu masih kosong. Tambahkan produk atau tiket terlebih dahulu.');
      window.location.href = "{{ route('produk') }}";
      return;
    }

    // Simpan data pengiriman sementara untuk dipakai di halaman pembayaran/history
    const checkoutData = {
      namaPenerima: document.getElementById('namaPenerima') ? document.getElementById('namaPenerima').value : '',
      noHp: document.getElementById('noHp') ? document.getElementById('noHp').value : '',
      alamatLengkap: document.getElementById('alamatLengkap') ? document.getElementById('alamatLengkap').value : '',
      ongkir: isTicketOnly ? 0 : parseInt(metodePengiriman.value),
      isTicketOnly: isTicketOnly
    };

    localStorage.setItem('lokana_checkout_data', JSON.stringify(checkoutData));

    window.location.href = "{{ route('pembayaran') }}";
  });
</script>

</body>
</html>