<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Lokana</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>"/>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      /* Palet Warna Asli Lokana */
      --purple: #5B3FD9;
      --purple-dark: #4730B3;
      --purple-light: #F3F0FF;
      --gold: #C8963C;
      --text: #1a1a1a;
      --muted: #666;
      --muted-light: #9a9a9a;
      --light-bg: #f9f7f4;
      --white: #fff;
      --border: #e8e3dc;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--light-bg);
      color: var(--text);
      position: relative;
      overflow-x: hidden;
    }

    /* ── NAV ── */
    nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 200;
      height: 64px;
      padding: 0 48px;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(6px);
      border-bottom: 1px solid rgba(0,0,0,0.06);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .nav-brand-wrapper {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      z-index: 201;
    }

    .nav-brand-logo { width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; }
    .nav-brand-logo svg { width: 100%; height: 100%; }

    .nav-brand {
      font-size: 1.15rem;
      font-weight: 700;
      color: var(--text);
      text-decoration: none;
      letter-spacing: -0.02em;
    }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 36px;
      list-style: none;
    }

    .nav-link {
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--muted);
      text-decoration: none;
      transition: color 0.15s ease;
    }

    .nav-link:hover, .nav-link.active { color: var(--purple); font-weight: 700; }

    .nav-actions { display: flex; align-items: center; gap: 20px; }
    .nav-icon-btn { display: flex; align-items: center; justify-content: center; color: var(--text); text-decoration: none; }
    .nav-icon-btn svg { width: 20px; height: 20px; stroke: currentColor; fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }

    /* ── MAIN CONTENT ── */
    main {
      position: relative;
      z-index: 1;
      max-width: 1120px;
      margin: 0 auto;
      padding: 128px 48px 96px;
    }

    .page-heading { display: flex; align-items: center; gap: 14px; margin-bottom: 6px; }
    .back-arrow { width: 38px; height: 38px; border-radius: 12px; border: 1px solid var(--border); background: var(--white); display: flex; align-items: center; justify-content: center; color: var(--text); text-decoration: none; }
    h1 { font-size: 2.25rem; letter-spacing: -0.04em; font-weight: 800; }
    .subtitle { color: var(--muted); margin: 10px 0 36px; font-size: 0.95rem; }

    .checkout-layout { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 28px; align-items: start; }
    .form-card, .summary-card { background: var(--white); border: 1px solid var(--border); border-radius: 24px; padding: 28px; }

    .section-label { display: flex; align-items: center; gap: 8px; font-size: 0.95rem; font-weight: 700; margin-bottom: 22px; }
    .step-num { width: 22px; height: 22px; border-radius: 999px; background: var(--purple-light); color: var(--purple); font-size: 0.72rem; font-weight: 800; display: flex; align-items: center; justify-content: center; }

    .form-group { margin-bottom: 18px; }
    label { display: block; font-size: 0.72rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; color: var(--muted-light); margin-bottom: 8px; }
    input, textarea, select { width: 100%; border: 1px solid var(--border); border-radius: 14px; padding: 13px 14px; font-family: inherit; font-size: 0.92rem; color: var(--text); background: var(--white); outline: none; }
    textarea { min-height: 100px; }
    input:focus, textarea:focus, select:focus { border-color: var(--purple); box-shadow: 0 0 0 4px rgba(91,63,217,0.15); }

    .ticket-only-note { display: none; align-items: flex-start; gap: 14px; padding: 20px; border-radius: 18px; background: var(--purple-light); border: 1px solid rgba(91,63,217,0.18); }
    .ticket-only-note svg { width: 22px; height: 22px; stroke: var(--purple); flex-shrink: 0; }

    .summary-card h2 { font-size: 1.05rem; font-weight: 800; margin-bottom: 22px; }
    .summary-item { display: flex; gap: 14px; margin-bottom: 20px; }
    .summary-item img { width: 76px; height: 76px; object-fit: cover; border-radius: 14px; background: #eee; }
    .summary-item h3 { font-size: 0.92rem; font-weight: 700; margin-bottom: 6px; }
    .summary-row { display: flex; justify-content: space-between; margin-bottom: 14px; color: var(--muted); font-size: 0.88rem; }
    .summary-row.total { border-top: 1px solid var(--border); padding-top: 18px; margin-top: 18px; color: var(--text); font-weight: 800; font-size: 1.05rem; }
    .btn-pay { display: flex; justify-content: center; align-items: center; gap: 8px; height: 50px; margin-top: 24px; border-radius: 999px; background: var(--purple); color: var(--white); font-weight: 800; border: none; width: 100%; cursor: pointer; font-family: inherit; transition: background 0.15s ease; }
    .btn-pay:hover { background: var(--purple-dark); }

    /* ── NEWSLETTER & FOOTER ── */
    .newsletter-section { max-width: 1140px; margin: 0 auto 48px; background: var(--purple); border-radius: 24px; padding: 48px; display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; color: var(--white); }
    .newsletter-info h3 { font-size: 1.8rem; font-weight: 700; margin-bottom: 12px; }
    .newsletter-form-group { display: flex; flex-direction: column; gap: 12px; }
    .newsletter-input-row { display: flex; gap: 12px; }
    .newsletter-input-row input { flex: 1; padding: 14px 20px; border-radius: 999px; border: none; background: rgba(255,255,255,0.15); color: var(--white); font-family: inherit; }
    .newsletter-input-row button { padding: 0 28px; border-radius: 999px; border: none; background: var(--gold); color: var(--white); font-weight: 700; cursor: pointer; }
    
    footer { padding: 0 48px 36px; background: var(--light-bg); max-width: 1240px; margin: 0 auto; }
    .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 48px; padding-bottom: 48px; border-bottom: 1px solid var(--border); }
    .footer-brand .brand-name { font-size: 1.4rem; font-weight: 700; color: var(--purple); margin-bottom: 16px; display: block; }
    .footer-brand p { font-size: 0.9rem; color: var(--muted); line-height: 1.6; }
    .footer-col h4 { font-size: 1rem; font-weight: 700; margin-bottom: 20px; }
    .footer-col-links { display: flex; flex-direction: column; gap: 12px; }
    .footer-col-links a { font-size: 0.85rem; color: var(--muted); text-decoration: none; }
    .footer-bottom { padding-top: 24px; font-size: 0.8rem; color: var(--muted); text-align: center; }

    @media(max-width: 900px) {
      nav { padding: 0 24px; }
      .nav-links { display: none; }
      main { padding: 40px 24px 72px; }
      .checkout-layout { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
  </style>
</head>
<body>

<nav>
  <a href="{{ route('home') }}" class="nav-brand-wrapper">
    <div class="nav-brand-logo">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <path fill="#5B3FD9" d="M43.5 32.8c-.8-2.5-2.2-4.8-4.2-6.5-.6-.5-.5-1.4.2-1.7 2.4-1.1 5.2-1.3 7.7-.6.6.2.9.9.6 1.5l-2.8 6.3c-.3.7-1.1 1-1.5.1z"/>
        <path fill="#5B3FD9" d="M51.8 31.2l.4-6.9c0-.7.7-1.2 1.4-1 2.6.6 5 2.1 6.7 4.1.4.5.3 1.3-.3 1.6l-6.2 3.1c-.6.3-1.4-.2-1.4-.9z"/>
        <path fill="#5B3FD9" d="M37.8 36.5c-1.7-1.9-2.9-4.3-3.6-6.8-.2-.7.4-1.3 1.1-1.2 2.6.2 5.1 1.2 7.1 2.9.5.4.5 1.2.1 1.7l-3.5 4.1c-.2.4-1 .4-1.2-.7z"/>
        <path fill="#5B3FD9" d="M56.8 33.1l4.4-5.3c.5-.6 1.3-.5 1.7.1 1.6 2.1 2.5 4.6 2.5 7.2 0 .7-.7 1.1-1.3.8l-6.4-2.2c-.6-.2-.9-1-.5-1.6z"/>
        <path fill="#5B3FD9" d="M34.6 42.4c-2.4-.8-4.5-2.2-6.2-4.1-.5-.5-.3-1.4.4-1.5 2.5-.4 5.1.2 7.2 1.6.5.4.6 1.1.2 1.6l-3.3 3c-.4.4-1.1.2-1.3-.6z"/>
        <path fill="none" stroke="#5B3FD9" stroke-width="4.8" stroke-linecap="round" stroke-linejoin="round" d="M12 45.5c12-3.5 20 7 32 7s20-11.5 32-11.5"/>
        <path fill="none" stroke="#5B3FD9" stroke-width="4.2" stroke-linecap="round" stroke-linejoin="round" d="M24 53.5c9-2.5 15 4.5 25 4.5s15-8 25-8"/>
      </svg>
    </div>
    <span class="nav-brand">Lokana</span>
  </a>
  <ul class="nav-links">
    <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
    <li><a href="{{ route('produk') }}" class="nav-link">Produk Lokal</a></li>
    <li><a href="#" class="nav-link">Event & Tiket</a></li>
    <li><a href="#" class="nav-link">Artikel Lokal</a></li>
    <li><a href="{{ route('history') }}" class="nav-link">History</a></li>
  </ul>
  <div class="nav-actions">
    <a href="#" class="nav-icon-btn"><svg viewBox="0 0 24 24"><path d="M6 6h15l-1.5 9h-12z"/><path d="M6 6L4.5 3H2"/><circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/></svg></a>
    <a href="#" class="nav-icon-btn"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c1.5-4 5-6 8-6s6.5 2 8 6"/></svg></a>
  </div>
</nav>

<main>
  <div class="page-heading">
    <a href="{{ route('home') }}" class="back-arrow"><svg viewBox="0 0 24 24"><path d="M19 12H5"/><path d="M12 19l-7-7 7-7"/></svg></a>
    <h1>Checkout</h1>
  </div>
  <p class="subtitle" id="checkoutSubtitle">Lengkapi data pengiriman sebelum lanjut ke pembayaran.</p>

  <div class="checkout-layout">
    <section class="form-card" id="shippingFormCard">
      <div class="section-label"><span class="step-num">1</span> Alamat Pengiriman</div>
      <div class="form-group"><label>Nama Penerima</label><input type="text" id="namaPenerima" value="User Lokana"></div>
      <div class="form-group"><label>No. HP</label><input type="text" id="noHp" placeholder="08xxxxxxxxxx"></div>
      <div class="form-group"><label>Alamat Lengkap</label><textarea id="alamatLengkap" placeholder="Masukkan alamat lengkap"></textarea></div>
      <div class="form-group"><label>Metode Pengiriman</label><select id="metodePengiriman"><option value="20000">Reguler - Rp 20.000</option><option value="35000">Express - Rp 35.000</option></select></div>
    </section>

    <section class="form-card" id="ticketOnlyCard" style="display:none;">
      <div class="section-label"><span class="step-num">1</span> Tiket Event</div>
      <div class="ticket-only-note" style="display:flex;">
        <svg viewBox="0 0 24 24"><path d="M21 8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8z"/><path d="M2 10h20"/></svg>
        <div><h3>Tidak perlu pengiriman</h3><p>Pesananmu berisi tiket event. E-tiket tersedia langsung di halaman History.</p></div>
      </div>
    </section>

    <aside class="summary-card">
      <h2>Ringkasan Pesanan</h2>
      <div id="summaryItemsContainer"></div>
      <div class="summary-row"><span>Subtotal</span><span id="subtotalValue">Rp 0</span></div>
      <div class="summary-row" id="ongkirRow"><span>Ongkir</span><span id="ongkirValue">Rp 0</span></div>
      <div class="summary-row total"><span>Total</span><span id="totalValue">Rp 0</span></div>
      <button type="button" class="btn-pay" id="lanjutPembayaranBtn">Lanjut Pembayaran</button>
    </aside>
  </div>
</main>

<section class="newsletter-section">
  <div class="newsletter-info">
    <h3>Berlangganan Newsletter Kami</h3>
    <p>Jadi yang pertama tahu produk baru, cerita pengrajin, dan promo spesial dari Lokana.</p>
  </div>
  <div class="newsletter-form-group">
    <label>Tetap Update</label>
    <div class="newsletter-input-row">
      <input type="email" placeholder="Masukkan email kamu">
      <button type="button">Berlangganan</button>
    </div>
    <div class="newsletter-disclaimer">Dengan berlangganan, kamu menyetujui <a href="#">Kebijakan Privasi</a> kami.</div>
  </div>
</section>

<footer>
  <div class="footer-grid">
    <div class="footer-brand"><span class="brand-name">Lokana</span><p>Marketplace produk lokal Bali — dari tangan pengrajin langsung ke tanganmu.</p></div>
    <div class="footer-col"><h4>Belanja</h4><div class="footer-col-links"><a href="#">Produk Lokal</a><a href="#">Event & Tiket</a><a href="#">Kategori</a></div></div>
    <div class="footer-col"><h4>Bantuan</h4><div class="footer-col-links"><a href="#">Kontak</a><a href="#">Info Pengiriman</a><a href="#">FAQ</a></div></div>
    <div class="footer-col"><h4>Legal</h4><div class="footer-col-links"><a href="#">Tentang Kami</a><a href="#">Kebijakan Privasi</a><a href="#">Syarat & Ketentuan</a></div></div>
  </div>
  <div class="footer-bottom">© 2026 Lokana</div>
</footer>

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
    summaryItemsContainer.innerHTML = cart.map(item => `
      <div class="summary-item">
        <img src="${item.gambar}" alt="${item.nama}">
        <div><h3>${item.nama}</h3><p>${item.qty} barang</p></div>
      </div>
    `).join('');
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
  if (!isTicketOnly) metodePengiriman.addEventListener('change', calculateTotals);

  document.getElementById('lanjutPembayaranBtn').addEventListener('click', () => {
    window.location.href = "{{ route('pembayaran') }}";
  });
</script>
</body>
</html>