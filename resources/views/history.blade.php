<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History Transaksi - Lokana</title>

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

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
      top: 0; left: 0; right: 0;
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
    .nav-links a.active { color: var(--purple); }

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
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
      border: 1px solid var(--border);
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

    .transaction-card[data-hidden="true"] { display: none; }

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

    .transaction-code strong { color: var(--text); }

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

    .status.success { color: var(--green); background: var(--green-bg); }
    .status.process { color: var(--orange); background: var(--orange-bg); }
    .status.cancelled { color: #b91c1c; background: #fef2f2; }

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

    .transaction-price { text-align: right; }

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
      font-family: 'Plus Jakarta Sans', sans-serif;
      cursor: pointer;
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

    /* Detail modal */
    .modal-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.4);
      z-index: 500;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    .modal-overlay.open { display: flex; }

    .modal-box {
      background: var(--white);
      border-radius: 24px;
      padding: 32px;
      width: 100%;
      max-width: 520px;
      max-height: 80vh;
      overflow-y: auto;
      box-shadow: 0 24px 80px rgba(0,0,0,0.15);
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .modal-header h2 {
      font-size: 1.2rem;
      letter-spacing: -0.03em;
    }

    .modal-close {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      border: 1px solid var(--border);
      background: var(--white);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--muted);
      font-size: 1rem;
    }

    .modal-item-row {
      display: flex;
      gap: 14px;
      padding: 14px 0;
      border-bottom: 1px solid var(--border);
      align-items: center;
    }

    .modal-item-row:last-of-type { border-bottom: none; }

    .modal-item-row img {
      width: 56px;
      height: 56px;
      border-radius: 10px;
      object-fit: cover;
      background: #eee;
      flex-shrink: 0;
    }

    .modal-item-info { flex: 1; }

    .modal-item-info h4 {
      font-size: 0.9rem;
      margin-bottom: 4px;
    }

    .modal-item-info p {
      font-size: 0.8rem;
      color: var(--muted);
    }

    .modal-item-price {
      font-size: 0.88rem;
      font-weight: 700;
      color: var(--purple);
      white-space: nowrap;
    }

    .modal-totals {
      margin-top: 16px;
      padding-top: 16px;
      border-top: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .modal-total-row {
      display: flex;
      justify-content: space-between;
      font-size: 0.86rem;
      color: var(--muted);
    }

    .modal-total-row.grand {
      font-size: 0.95rem;
      font-weight: 800;
      color: var(--text);
      padding-top: 8px;
      border-top: 1px solid var(--border);
      margin-top: 4px;
    }

    .modal-total-row.grand span:last-child { color: var(--purple); }

    .empty-state {
      text-align: center;
      padding: 72px 24px;
      color: var(--muted);
    }

    .empty-state p {
      font-size: 0.95rem;
      margin-bottom: 20px;
    }

    @media (max-width: 900px) {
      nav { padding: 0 24px; }
      .nav-links { display: none; }
      .history-page { padding: 104px 24px 56px; }
      .history-header { flex-direction: column; align-items: flex-start; }
      .history-filter { justify-content: flex-start; }
      .summary-strip { grid-template-columns: 1fr; }
      .transaction-body { grid-template-columns: 76px 1fr; }
      .transaction-price { grid-column: 2; text-align: left; }
      .transaction-actions { justify-content: flex-start; }
    }

    @media (max-width: 580px) {
      nav { padding: 0 20px; }
      .history-page { padding: 92px 20px 44px; }
      .transaction-card { padding: 18px; border-radius: 20px; }
      .transaction-top { flex-direction: column; gap: 12px; }
      .transaction-actions { flex-direction: column; }
      .btn-outline, .btn-primary { width: 100%; }
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
        <p>Riwayat pesanan yang pernah kamu buat di Lokana. Kamu bisa melihat status pembayaran, detail produk, dan total transaksi dari halaman ini.</p>
      </div>
      <div class="history-filter" id="filter-pills">
        <button type="button" class="pill active" data-filter="semua">Semua</button>
        <button type="button" class="pill" data-filter="berhasil">Berhasil</button>
        <button type="button" class="pill" data-filter="diproses">Diproses</button>
        <button type="button" class="pill" data-filter="dibatalkan">Dibatalkan</button>
      </div>
    </section>

    <section class="summary-strip">
      <div class="summary-box">
        <span>Total Pesanan</span>
        <strong id="sum-total">0</strong>
      </div>
      <div class="summary-box">
        <span>Transaksi Berhasil</span>
        <strong id="sum-success">0</strong>
      </div>
      <div class="summary-box">
        <span>Sedang Diproses</span>
        <strong id="sum-process">0</strong>
      </div>
    </section>

    <section class="transaction-list" id="transaction-list">
      {{-- diisi JS --}}
    </section>

  </div>
</main>

<!-- Modal detail -->
<div class="modal-overlay" id="detail-modal" onclick="closeModal(event)">
  <div class="modal-box">
    <div class="modal-header">
      <h2>Detail Pesanan</h2>
      <button type="button" class="modal-close" onclick="document.getElementById('detail-modal').classList.remove('open')">✕</button>
    </div>
    <div id="modal-body"></div>
  </div>
</div>

<script src="{{ asset('js/cart.js') }}"></script>
<script>
  // ── Dummy fallback data ──────────────────────────────────────────────────────
  const DUMMY_ORDERS = [
    {
      id: 'LKN-2026-001',
      tanggal: '2026-06-10T14:32:00',
      status: 'Pembayaran Berhasil',
      total: 270000,
      subtotal: 250000,
      ongkir: 20000,
      items: [{
        id: 'scarf-endek-bali',
        nama: 'Scarf Endek Bali Handmade',
        kategori: 'produk',
        harga: 250000,
        qty: 1,
        gambar: 'https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg',
        varian: 'Blue Sand',
        tier: null,
        tanggalEvent: null,
      }],
    },
    {
      id: 'LKN-2026-002',
      tanggal: '2026-06-08T09:18:00',
      status: 'Pembayaran Berhasil',
      total: 150000,
      subtotal: 130000,
      ongkir: 20000,
      items: [{
        id: 'kintamani-coffee',
        nama: 'Kintamani Coffee',
        kategori: 'produk',
        harga: 65000,
        qty: 2,
        gambar: 'https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg',
        varian: 'Beans',
        tier: null,
        tanggalEvent: null,
      }],
    },
    {
      id: 'LKN-2026-003',
      tanggal: '2026-06-05T19:45:00',
      status: 'Sedang Diproses',
      total: 170000,
      subtotal: 150000,
      ongkir: 20000,
      items: [{
        id: 'essential-oil-bali',
        nama: 'Essential Oil Bali',
        kategori: 'produk',
        harga: 150000,
        qty: 1,
        gambar: 'https://i.pinimg.com/736x/a9/84/83/a9848382e0f00383dc3a020ddae17ca0.jpg',
        varian: 'Tropical Calm',
        tier: null,
        tanggalEvent: null,
      }],
    },
  ];

  // ── Helpers ──────────────────────────────────────────────────────────────────
  function escHtml(str) {
    return String(str ?? '')
      .replace(/&/g,'&amp;').replace(/</g,'&lt;')
      .replace(/>/g,'&gt;').replace(/"/g,'&quot;');
  }

  function formatTanggal(iso) {
    const d = new Date(iso);
    return d.toLocaleDateString('id-ID', {
      day: '2-digit', month: 'long', year: 'numeric'
    }) + ' · ' + d.toLocaleTimeString('id-ID', {
      hour: '2-digit', minute: '2-digit'
    }) + ' WIB';
  }

  function statusClass(status) {
    const s = (status || '').toLowerCase();
    if (s.includes('berhasil')) return 'success';
    if (s.includes('proses'))   return 'process';
    if (s.includes('batal'))    return 'cancelled';
    return 'process';
  }

  function filterKey(status) {
    const s = (status || '').toLowerCase();
    if (s.includes('berhasil')) return 'berhasil';
    if (s.includes('proses'))   return 'diproses';
    if (s.includes('batal'))    return 'dibatalkan';
    return 'diproses';
  }

  // Thumbnail: tiket pakai placeholder event kalau tidak ada gambar
  function thumbSrc(item) {
    if (item.gambar) return escHtml(item.gambar);
    if (item.kategori === 'tiket') return 'https://i.pinimg.com/736x/8b/3e/2e/8b3e2e1c0e0c9e0f1c2e3e4e5e6e7e8e.jpg';
    return '';
  }

  // Subtitle baris info produk/tiket
  function itemSubtitle(item) {
    if (item.kategori === 'tiket') {
      const parts = [];
      if (item.tier) parts.push(item.tier);
      if (item.tanggalEvent) parts.push(item.tanggalEvent);
      parts.push(item.qty + ' tiket');
      return escHtml(parts.join(' · '));
    }
    const parts = [];
    if (item.varian) parts.push(item.varian);
    parts.push(item.qty + ' barang');
    return escHtml(parts.join(' · '));
  }

  // Preview baris produk untuk card (ambil item pertama + sisa)
  function cardPreview(order) {
    const first = order.items[0];
    const totalItems = order.items.reduce((a, i) => a + i.qty, 0);
    const extraCount = order.items.length - 1;

    let infoText = '';
    if (first.kategori === 'tiket') {
      const parts = [];
      if (first.tier) parts.push(first.tier);
      if (first.tanggalEvent) parts.push(first.tanggalEvent);
      parts.push(totalItems + (totalItems > 1 ? ' tiket' : ' tiket'));
      if (extraCount > 0) parts.push('+ ' + extraCount + ' item lainnya');
      infoText = escHtml(parts.join(' · '));
    } else {
      const parts = ['Produk Lokal'];
      if (first.varian) parts.push(first.varian);
      parts.push(totalItems + ' barang');
      if (extraCount > 0) parts.push('+ ' + extraCount + ' item lainnya');
      infoText = escHtml(parts.join(' · '));
    }

    return { nama: escHtml(first.nama), gambar: thumbSrc(first), info: infoText };
  }

  // ── Render ───────────────────────────────────────────────────────────────────
  function renderOrders(orders) {
    const list = document.getElementById('transaction-list');

    if (!orders.length) {
      list.innerHTML = `
        <div class="empty-state">
          <p>Belum ada transaksi yang tercatat.</p>
          <a href="{{ route('home') }}" class="btn-primary" style="display:inline-flex;">Mulai Belanja</a>
        </div>`;
      return;
    }

    list.innerHTML = orders.map((order, idx) => {
      const preview   = cardPreview(order);
      const sClass    = statusClass(order.status);
      const fKey      = filterKey(order.status);

      return `
      <article class="transaction-card" data-filter="${escHtml(fKey)}" data-idx="${idx}">
        <div class="transaction-top">
          <div>
            <div class="transaction-code">No. Pesanan: <strong>${escHtml(order.id)}</strong></div>
            <div class="transaction-date">${formatTanggal(order.tanggal)}</div>
          </div>
          <div class="status ${sClass}">${escHtml(order.status)}</div>
        </div>

        <div class="transaction-body">
          <img src="${preview.gambar}" alt="${preview.nama}" onerror="this.style.background='#e8e3dc'">
          <div class="product-info">
            <h3>${preview.nama}</h3>
            <p>${preview.info}</p>
          </div>
          <div class="transaction-price">
            <span>Total Bayar</span>
            <strong>${formatRupiah(order.total)}</strong>
          </div>
        </div>

        <div class="transaction-actions">
          <button type="button" class="btn-outline" onclick="openDetail(${idx})">Lihat Detail</button>
        </div>
      </article>`;
    }).join('');
  }

  function updateSummary(orders) {
    document.getElementById('sum-total').textContent   = orders.length;
    document.getElementById('sum-success').textContent = orders.filter(o => filterKey(o.status) === 'berhasil').length;
    document.getElementById('sum-process').textContent = orders.filter(o => filterKey(o.status) === 'diproses').length;
  }

  // ── Filter ───────────────────────────────────────────────────────────────────
  document.getElementById('filter-pills').addEventListener('click', function(e) {
    const btn = e.target.closest('.pill');
    if (!btn) return;

    document.querySelectorAll('.pill').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');

    const filter = btn.dataset.filter;
    document.querySelectorAll('.transaction-card').forEach(card => {
      const show = filter === 'semua' || card.dataset.filter === filter;
      card.setAttribute('data-hidden', show ? 'false' : 'true');
    });
  });

  // ── Detail Modal ─────────────────────────────────────────────────────────────
  let _allOrders = [];

  function openDetail(idx) {
    const order = _allOrders[idx];
    if (!order) return;

    const itemsHtml = order.items.map(item => `
      <div class="modal-item-row">
        <img src="${thumbSrc(item)}" alt="${escHtml(item.nama)}" onerror="this.style.background='#e8e3dc'">
        <div class="modal-item-info">
          <h4>${escHtml(item.nama)}</h4>
          <p>${itemSubtitle(item)}</p>
        </div>
        <div class="modal-item-price">${formatRupiah(item.harga * item.qty)}</div>
      </div>`).join('');

    const ongkirRow = order.ongkir > 0
      ? `<div class="modal-total-row"><span>Ongkos Kirim</span><span>${formatRupiah(order.ongkir)}</span></div>`
      : `<div class="modal-total-row"><span>Ongkos Kirim</span><span>Gratis</span></div>`;

    document.getElementById('modal-body').innerHTML = `
      ${itemsHtml}
      <div class="modal-totals">
        <div class="modal-total-row"><span>Subtotal</span><span>${formatRupiah(order.subtotal)}</span></div>
        ${ongkirRow}
        <div class="modal-total-row grand"><span>Total Pembayaran</span><span>${formatRupiah(order.total)}</span></div>
      </div>`;

    document.getElementById('detail-modal').classList.add('open');
  }

  function closeModal(e) {
    if (e.target === document.getElementById('detail-modal')) {
      document.getElementById('detail-modal').classList.remove('open');
    }
  }

  // ── Init ─────────────────────────────────────────────────────────────────────
  (function () {
    // Gabung: localStorage history (terbaru di depan) + dummy fallback
    const lsHistory = getHistory() || [];
    const allOrders = [...lsHistory, ...DUMMY_ORDERS];
    _allOrders = allOrders;

    renderOrders(allOrders);
    updateSummary(allOrders);
  })();
</script>

</body>
</html>