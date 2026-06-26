<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Produk - Lokana Admin</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --purple: #5B3DF5;
      --purple-dark: #4730D0;
      --purple-soft: #f0edff;
      --purple-mid: #e4deff;
      --text: #1a1a1a;
      --muted: #6b7280;
      --light-bg: #f5f5f7;
      --white: #fff;
      --border: #e5e7eb;
      --green: #059669;
      --green-bg: #ecfdf5;
      --orange: #d97706;
      --orange-bg: #fffbeb;
      --red: #dc2626;
      --red-bg: #fef2f2;
      --blue: #2563eb;
      --blue-bg: #eff6ff;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--light-bg);
      color: var(--text);
      overflow-x: hidden;
    }

    /* ── Layout ── */
    .admin-layout {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 252px 1fr;
    }

    /* ── Sidebar (sama persis dashboard) ── */
    .sidebar {
      position: sticky;
      top: 0;
      height: 100vh;
      background: var(--white);
      border-right: 1px solid var(--border);
      padding: 28px 18px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      overflow-y: auto;
    }

    .brand {
      font-size: 1.2rem;
      font-weight: 800;
      color: var(--purple);
      text-decoration: none;
      letter-spacing: -0.04em;
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 32px;
    }

    .brand-dot {
      width: 8px;
      height: 8px;
      background: var(--purple);
      border-radius: 50%;
      flex-shrink: 0;
    }

    .admin-label {
      font-size: 0.68rem;
      font-weight: 800;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: #bbb;
      margin-bottom: 10px;
      padding-left: 4px;
    }

    .side-nav { display: grid; gap: 4px; }

    .side-nav a {
      text-decoration: none;
      color: var(--muted);
      font-size: 0.875rem;
      font-weight: 600;
      padding: 11px 14px;
      border-radius: 12px;
      transition: all 0.18s;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .side-nav a .nav-icon {
      width: 18px;
      text-align: center;
      opacity: 0.6;
      font-size: 1rem;
    }

    .side-nav a:hover { color: var(--purple); background: var(--purple-soft); }
    .side-nav a:hover .nav-icon { opacity: 1; }
    .side-nav a.active { color: var(--purple); background: var(--purple-soft); font-weight: 700; }
    .side-nav a.active .nav-icon { opacity: 1; }

    .sidebar-footer {
      padding-top: 20px;
      border-top: 1px solid var(--border);
      display: grid;
      gap: 12px;
    }

    .admin-info { display: flex; align-items: center; gap: 10px; }

    .admin-avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: var(--purple-soft);
      color: var(--purple);
      font-weight: 800;
      font-size: 0.8rem;
      display: grid;
      place-items: center;
      flex-shrink: 0;
    }

    .admin-info-text { display: grid; }
    .admin-info-text strong { font-size: 0.84rem; font-weight: 700; color: var(--text); }
    .admin-info-text span { font-size: 0.72rem; color: var(--muted); }

    .logout {
      color: var(--red);
      text-decoration: none;
      font-weight: 700;
      font-size: 0.82rem;
      padding: 9px 14px;
      border-radius: 10px;
      background: var(--red-bg);
      display: block;
      text-align: center;
      transition: opacity 0.15s;
    }

    .logout:hover { opacity: 0.8; }

    /* ── Content ── */
    .content { padding: 36px 44px 72px; min-width: 0; }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 24px;
      margin-bottom: 28px;
    }

    .page-title h1 {
      font-size: clamp(1.75rem, 3.5vw, 2.5rem);
      font-weight: 800;
      letter-spacing: -0.05em;
      margin-bottom: 8px;
      line-height: 1.1;
    }

    .page-title p {
      color: var(--muted);
      font-size: 0.9rem;
      line-height: 1.65;
      max-width: 560px;
    }

    .btn-primary {
      border: none;
      height: 44px;
      padding: 0 22px;
      border-radius: 12px;
      background: var(--purple);
      color: var(--white);
      font-family: inherit;
      font-weight: 700;
      font-size: 0.875rem;
      cursor: pointer;
      white-space: nowrap;
      flex-shrink: 0;
      transition: background 0.18s;
    }

    .btn-primary:hover { background: var(--purple-dark); }

    /* ── Toolbar ── */
    .toolbar {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 14px 18px;
      margin-bottom: 16px;
      display: flex;
      gap: 12px;
      align-items: center;
    }

    .search-wrap {
      position: relative;
      flex: 1;
      max-width: 400px;
    }

    .search-icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: #bbb;
      font-size: 0.9rem;
      pointer-events: none;
    }

    .search-box {
      width: 100%;
      height: 40px;
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0 14px 0 36px;
      font-family: inherit;
      font-size: 0.875rem;
      outline: none;
      background: var(--light-bg);
      transition: border-color 0.18s;
    }

    .search-box:focus { border-color: var(--purple); background: var(--white); }

    .toolbar-right {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .count-badge {
      font-size: 0.78rem;
      color: var(--muted);
      font-weight: 600;
      white-space: nowrap;
    }

    /* ── Table Card ── */
    .table-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 22px;
      padding: 0;
      box-shadow: 0 1px 4px rgba(0,0,0,0.04);
      overflow: hidden;
    }

    .table-scroll { overflow-x: auto; }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 820px;
    }

    thead { background: var(--light-bg); }

    th {
      text-align: left;
      font-size: 0.7rem;
      color: #999;
      font-weight: 700;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 14px 16px;
    }

    td {
      padding: 16px;
      border-top: 1px solid var(--border);
      font-size: 0.86rem;
      color: var(--muted);
      vertical-align: middle;
    }

    tr:hover td { background: #fafafa; }

    /* ── Product Cell ── */
    .product-cell {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .product-thumb {
      width: 56px;
      height: 56px;
      border-radius: 12px;
      object-fit: cover;
      background: var(--light-bg);
      flex-shrink: 0;
      border: 1px solid var(--border);
    }

    .product-info strong {
      display: block;
      color: var(--text);
      font-weight: 700;
      font-size: 0.875rem;
      margin-bottom: 3px;
    }

    .product-info span {
      display: block;
      font-size: 0.78rem;
      color: var(--muted);
      max-width: 280px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    /* ── Badges ── */
    .badge-cat {
      display: inline-flex;
      padding: 5px 10px;
      border-radius: 8px;
      background: var(--purple-soft);
      color: var(--purple);
      font-size: 0.72rem;
      font-weight: 700;
      white-space: nowrap;
    }

    .td-price {
      font-weight: 700;
      color: var(--text);
      white-space: nowrap;
      font-size: 0.875rem;
    }

    .td-stock {
      font-weight: 600;
      color: var(--text);
    }

    .stock-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 5px 10px;
      border-radius: 8px;
      font-size: 0.72rem;
      font-weight: 700;
      white-space: nowrap;
    }

    .stock-badge::before {
      content: '';
      width: 5px;
      height: 5px;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .stock-badge.ready { color: var(--green); background: var(--green-bg); }
    .stock-badge.ready::before { background: var(--green); }
    .stock-badge.low { color: var(--orange); background: var(--orange-bg); }
    .stock-badge.low::before { background: var(--orange); }

    /* ── Action Buttons ── */
    .actions { display: flex; gap: 6px; }

    .btn-edit, .btn-delete {
      border: none;
      height: 32px;
      padding: 0 12px;
      border-radius: 8px;
      font-family: inherit;
      font-size: 0.78rem;
      font-weight: 700;
      cursor: pointer;
      transition: opacity 0.15s;
    }

    .btn-edit { color: var(--purple); background: var(--purple-soft); }
    .btn-delete { color: var(--red); background: var(--red-bg); }
    .btn-edit:hover, .btn-delete:hover { opacity: 0.75; }

    /* ── Empty State ── */
    .empty-state {
      display: none;
      padding: 60px 24px;
      text-align: center;
      color: var(--muted);
    }

    .empty-state p { font-size: 0.9rem; margin-top: 8px; }

    /* ── Modal ── */
    .modal {
      position: fixed;
      inset: 0;
      z-index: 500;
      background: rgba(0,0,0,0.4);
      display: none;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    .modal.show { display: flex; }

    .modal-box {
      width: 100%;
      max-width: 600px;
      max-height: 92vh;
      overflow-y: auto;
      background: var(--white);
      border-radius: 24px;
      padding: 28px;
      box-shadow: 0 24px 80px rgba(0,0,0,0.2);
    }

    .modal-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 24px;
    }

    .modal-header h2 {
      font-size: 1.4rem;
      font-weight: 800;
      letter-spacing: -0.04em;
      margin-bottom: 4px;
    }

    .modal-header p { color: var(--muted); font-size: 0.85rem; }

    .close-btn {
      border: none;
      width: 36px;
      height: 36px;
      border-radius: 10px;
      background: var(--light-bg);
      cursor: pointer;
      font-size: 1.1rem;
      color: var(--muted);
      display: grid;
      place-items: center;
      flex-shrink: 0;
      transition: background 0.15s;
    }

    .close-btn:hover { background: var(--border); }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }

    .form-group.full { grid-column: 1 / -1; }

    label {
      display: block;
      font-size: 0.78rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 6px;
    }

    input, select, textarea {
      width: 100%;
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 10px 12px;
      font-family: inherit;
      font-size: 0.875rem;
      outline: none;
      background: var(--white);
      color: var(--text);
      transition: border-color 0.18s;
    }

    textarea { min-height: 84px; resize: vertical; }

    input:focus, select:focus, textarea:focus { border-color: var(--purple); }

    .modal-actions {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-top: 22px;
      padding-top: 20px;
      border-top: 1px solid var(--border);
    }

    .btn-cancel {
      border: 1px solid var(--border);
      background: var(--white);
      color: var(--muted);
      height: 42px;
      padding: 0 18px;
      border-radius: 10px;
      font-family: inherit;
      font-weight: 700;
      font-size: 0.875rem;
      cursor: pointer;
      transition: background 0.15s;
    }

    .btn-cancel:hover { background: var(--light-bg); }

    .btn-save {
      border: none;
      background: var(--purple);
      color: var(--white);
      height: 42px;
      padding: 0 22px;
      border-radius: 10px;
      font-family: inherit;
      font-weight: 700;
      font-size: 0.875rem;
      cursor: pointer;
      transition: background 0.18s;
    }

    .btn-save:hover { background: var(--purple-dark); }

    /* ── Toast ── */
    .toast {
      position: fixed;
      right: 24px;
      bottom: 24px;
      background: var(--text);
      color: var(--white);
      padding: 13px 18px;
      border-radius: 12px;
      font-size: 0.84rem;
      font-weight: 600;
      opacity: 0;
      transform: translateY(8px);
      pointer-events: none;
      transition: all 0.22s;
      z-index: 600;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .toast.show { opacity: 1; transform: translateY(0); }

    /* ── Responsive ── */
    @media (max-width: 980px) {
      .admin-layout { grid-template-columns: 1fr; }

      .sidebar {
        position: static;
        height: auto;
        padding: 20px;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        gap: 16px;
      }

      .brand { margin-bottom: 0; }
      .side-nav { grid-template-columns: repeat(3, auto); gap: 4px; }
      .sidebar-footer { display: none; }

      .content { padding: 28px 24px 56px; }
    }

    @media (max-width: 640px) {
      .topbar { flex-direction: column; align-items: stretch; }
      .btn-primary { width: 100%; }
      .toolbar { flex-wrap: wrap; }
      .search-wrap { max-width: 100%; width: 100%; }
      .form-grid { grid-template-columns: 1fr; }
      .modal-actions { flex-direction: column-reverse; }
      .btn-cancel, .btn-save { width: 100%; }
    }
  </style>
</head>
<body>

<div class="admin-layout">
  <!-- Sidebar -->
  <aside class="sidebar">
    <div>
      <a href="{{ route('admin.dashboard') }}" class="brand">
        <span class="brand-dot"></span>
        Lokana Admin
      </a>

      <div class="admin-label">Menu</div>
      <nav class="side-nav">
        <a href="{{ route('admin.dashboard') }}">
          <span class="nav-icon">◈</span> Dashboard
        </a>
        <a href="{{ route('admin.produk') }}" class="active">
          <span class="nav-icon">◻</span> Kelola Produk
        </a>
        <a href="{{ route('admin.artikel') }}">
          <span class="nav-icon">◇</span> Kelola Artikel
        </a>
        <a href="{{ route('admin.pengguna') }}">
          <span class="nav-icon">○</span> Kelola Pengguna
        </a>
        <a href="{{ route('admin.transaksi') }}">
          <span class="nav-icon">△</span> Kelola Transaksi
        </a>
      </nav>
    </div>

    <div class="sidebar-footer">
      <div class="admin-info">
        <div class="admin-avatar">A</div>
        <div class="admin-info-text">
          <strong>{{ session('admin_name', 'Admin Lokana') }}</strong>
          <span>Administrator</span>
        </div>
      </div>
      <a href="{{ route('admin.logout') }}" class="logout">Logout</a>
    </div>
  </aside>

  <!-- Content -->
  <main class="content">
    <section class="topbar">
      <div class="page-title">
        <h1>Kelola Produk</h1>
        <p>Data produk marketplace Lokana. CRUD disimpan di localStorage — konsisten dengan katalog user.</p>
      </div>
      <button class="btn-primary" id="openAddModal">+ Tambah Produk</button>
    </section>

    <div class="toolbar">
      <div class="search-wrap">
        <span class="search-icon">⌕</span>
        <input type="text" class="search-box" id="searchInput" placeholder="Cari nama, kategori, atau deskripsi...">
      </div>
      <div class="toolbar-right">
        <span class="count-badge" id="countBadge">6 produk</span>
      </div>
    </div>

    <div class="table-card">
      <div class="table-scroll">
        <table>
          <thead>
            <tr>
              <th>Produk</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="productTableBody"></tbody>
        </table>
      </div>

      <div class="empty-state" id="emptyState">
        <div style="font-size:2rem;margin-bottom:8px;">📦</div>
        <strong>Tidak ada produk ditemukan</strong>
        <p>Coba ubah kata kunci pencarian atau tambah produk baru.</p>
      </div>
    </div>
  </main>
</div>

<!-- Modal -->
<div class="modal" id="productModal">
  <div class="modal-box">
    <div class="modal-header">
      <div>
        <h2 id="modalTitle">Tambah Produk</h2>
        <p>Isi data produk yang akan tampil di katalog Lokana.</p>
      </div>
      <button class="close-btn" id="closeModal" type="button">✕</button>
    </div>

    <div class="form-grid">
      <input type="hidden" id="productId">

      <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" id="productName" placeholder="contoh: Scarf Endek Bali">
      </div>

      <div class="form-group">
        <label>Kategori</label>
        <select id="productCategory">
          <option value="Fashion Lokal">Fashion Lokal</option>
          <option value="Kopi & Minuman">Kopi & Minuman</option>
          <option value="Self-care">Self-care</option>
          <option value="Aksesori Lokal">Aksesori Lokal</option>
          <option value="Home Living">Home Living</option>
          <option value="Kerajinan Handmade">Kerajinan Handmade</option>
        </select>
      </div>

      <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" id="productPrice" min="0" placeholder="250000">
      </div>

      <div class="form-group">
        <label>Stok</label>
        <input type="number" id="productStock" min="0" placeholder="24">
      </div>

      <div class="form-group full">
        <label>URL Gambar Produk</label>
        <input type="url" id="productImage" placeholder="https://...">
      </div>

      <div class="form-group full">
        <label>Deskripsi Singkat</label>
        <textarea id="productDescription" placeholder="Deskripsi singkat yang tampil di tabel..."></textarea>
      </div>
    </div>

    <div class="modal-actions">
      <button type="button" class="btn-cancel" id="cancelModal">Batal</button>
      <button type="button" class="btn-save" id="saveProduct">Simpan Produk</button>
    </div>
  </div>
</div>

<!-- Toast -->
<div class="toast" id="toast">✓ Berhasil disimpan.</div>

<script>
  const STORAGE_KEY = 'lokana_products';

  const defaultProducts = [
    {
      id: 1,
      name: 'Scarf Endek Bali Handmade',
      category: 'Fashion Lokal',
      price: 250000,
      stock: 24,
      image: 'https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg',
      description: 'Dibuat dari kain Endek pilihan dengan motif clean minimalis, cocok melengkapi tampilan kasual maupun semi-formal.'
    },
    {
      id: 2,
      name: 'Kintamani Coffee',
      category: 'Kopi & Minuman',
      price: 65000,
      stock: 40,
      image: 'https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg',
      description: 'Kopi arabika dari dataran tinggi Bali dengan karakter rasa ringan, segar, dan cocok buat seduhan harian.'
    },
    {
      id: 3,
      name: 'Essential Oil Bali',
      category: 'Self-care',
      price: 150000,
      stock: 18,
      image: 'https://i.pinimg.com/736x/a9/84/83/a9848382e0f00383dc3a020ddae17ca0.jpg',
      description: 'Aroma natural dengan karakter tropis yang ringan. Cocok untuk relaksasi, diffuser, atau rutinitas harian.'
    },
    {
      id: 4,
      name: 'Beach Jewelry',
      category: 'Aksesori Lokal',
      price: 115000,
      stock: 30,
      image: 'https://i.pinimg.com/736x/e2/09/38/e20938d213c820fd70d01cc121501ccb.jpg',
      description: 'Aksesori bernuansa pantai dengan detail simpel yang mudah dipakai harian.'
    },
    {
      id: 5,
      name: 'Kayu Bowls',
      category: 'Home Living',
      price: 62000,
      stock: 12,
      image: 'https://i.pinimg.com/736x/50/fd/aa/50fdaa7ad7ae0c1b77979bbaa76b3604.jpg',
      description: 'Mangkuk kayu handmade dengan finishing natural. Cocok untuk plating buah, snack, atau dekor meja.'
    },
    {
      id: 6,
      name: 'Beaded Basket',
      category: 'Kerajinan Handmade',
      price: 50000,
      stock: 8,
      image: 'https://i.pinimg.com/736x/8b/f0/71/8bf07143983397c98a31f74da77f1b53.jpg',
      description: 'Keranjang handmade dengan detail manik yang playful dan rapi.'
    }
  ];

  // ── Helpers ──
  function getProducts() {
    const stored = localStorage.getItem(STORAGE_KEY);
    if (!stored) {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultProducts));
      return defaultProducts;
    }
    const parsed = JSON.parse(stored);
    if (!Array.isArray(parsed) || parsed.length === 0) {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultProducts));
      return defaultProducts;
    }
    return parsed;
  }

  function saveProducts(products) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(products));
  }

  function formatRupiah(n) {
    return 'Rp ' + Number(n).toLocaleString('id-ID');
  }

  function stockBadge(stock) {
  const n = Number(stock);
  if (n === 0) {
    return `<span class="stock-badge" style="color:var(--red);background:var(--red-bg);">Habis</span>`;
  }
  if (n <= 10) {
    return `<span class="stock-badge low">Stok Menipis</span>`;
  }
  return `<span class="stock-badge ready">Tersedia</span>`;
}

  function showToast(msg) {
    const toast = document.getElementById('toast');
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2400);
  }

  // ── Render ──
  function renderProducts() {
    const keyword = document.getElementById('searchInput').value.toLowerCase().trim();
    const products = getProducts();

    const filtered = products.filter(p =>
      p.name.toLowerCase().includes(keyword) ||
      p.category.toLowerCase().includes(keyword) ||
      p.description.toLowerCase().includes(keyword)
    );

    const tbody = document.getElementById('productTableBody');
    const empty = document.getElementById('emptyState');
    const count = document.getElementById('countBadge');

    tbody.innerHTML = '';

    count.textContent = keyword
      ? `${filtered.length} dari ${products.length} produk`
      : `${products.length} produk`;

    if (filtered.length === 0) {
      empty.style.display = 'block';
      return;
    }

    empty.style.display = 'none';

    filtered.forEach(p => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>
          <div class="product-cell">
            <img class="product-thumb" src="${p.image}" alt="${p.name}" onerror="this.src='https://via.placeholder.com/56x56?text=📦'">
            <div class="product-info">
              <strong>${p.name}</strong>
              <span>${p.description}</span>
            </div>
          </div>
        </td>
        <td><span class="badge-cat">${p.category}</span></td>
        <td class="td-price">${formatRupiah(p.price)}</td>
        <td class="td-stock">${p.stock}</td>
        <td>${stockBadge(p.stock)}</td>
        <td>
          <div class="actions">
            <button class="btn-edit" onclick="editProduct(${p.id})">Edit</button>
            <button class="btn-delete" onclick="deleteProduct(${p.id})">Hapus</button>
          </div>
        </td>
      `;
      tbody.appendChild(tr);
    });
  }

  // ── Modal ──
  function openModal(mode = 'add') {
    document.getElementById('productModal').classList.add('show');
    document.body.style.overflow = 'hidden';

    if (mode === 'add') {
      document.getElementById('modalTitle').textContent = 'Tambah Produk';
      document.getElementById('productId').value = '';
      document.getElementById('productName').value = '';
      document.getElementById('productCategory').value = 'Fashion Lokal';
      document.getElementById('productPrice').value = '';
      document.getElementById('productStock').value = '';
      document.getElementById('productImage').value = '';
      document.getElementById('productDescription').value = '';
    }
  }

  function closeModalFn() {
    document.getElementById('productModal').classList.remove('show');
    document.body.style.overflow = '';
  }

  function editProduct(id) {
    const p = getProducts().find(x => x.id === id);
    if (!p) return;

    document.getElementById('modalTitle').textContent = 'Edit Produk';
    document.getElementById('productId').value = p.id;
    document.getElementById('productName').value = p.name;
    document.getElementById('productCategory').value = p.category;
    document.getElementById('productPrice').value = p.price;
    document.getElementById('productStock').value = p.stock;
    document.getElementById('productImage').value = p.image;
    document.getElementById('productDescription').value = p.description;

    openModal('edit');
  }

  function deleteProduct(id) {
    if (!confirm('Yakin mau hapus produk ini?')) return;
    const updated = getProducts().filter(p => p.id !== id);
    saveProducts(updated);
    renderProducts();
    showToast('✓ Produk berhasil dihapus.');
  }

  // ── Save ──
  document.getElementById('saveProduct').addEventListener('click', () => {
    const name = document.getElementById('productName').value.trim();
    const price = document.getElementById('productPrice').value;
    const stock = document.getElementById('productStock').value;
    const image = document.getElementById('productImage').value.trim();
    const desc = document.getElementById('productDescription').value.trim();

    if (!name || !price || !stock || !image || !desc) {
      showToast('⚠ Lengkapi semua field terlebih dahulu.');
      return;
    }

    const currentId = document.getElementById('productId').value;
    const products = getProducts();

    const data = {
      id: currentId ? Number(currentId) : Date.now(),
      name,
      category: document.getElementById('productCategory').value,
      price: Number(price),
      stock: Number(stock),
      image,
      description: desc
    };

    if (currentId) {
      const updated = products.map(p => p.id === Number(currentId) ? data : p);
      saveProducts(updated);
      showToast('✓ Produk berhasil diedit.');
    } else {
      products.push(data);
      saveProducts(products);
      showToast('✓ Produk berhasil ditambahkan.');
    }

    closeModalFn();
    renderProducts();
  });

  // ── Events ──
  document.getElementById('openAddModal').addEventListener('click', () => openModal('add'));
  document.getElementById('closeModal').addEventListener('click', closeModalFn);
  document.getElementById('cancelModal').addEventListener('click', closeModalFn);
  document.getElementById('productModal').addEventListener('click', e => {
    if (e.target === document.getElementById('productModal')) closeModalFn();
  });
  document.getElementById('searchInput').addEventListener('input', renderProducts);

  // ── Init ──
  renderProducts();
</script>

</body>
</html>