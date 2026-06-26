<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Artikel - Lokana Admin</title>

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

    /* ── Sidebar ── */
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

    .filter-select {
      height: 40px;
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0 12px;
      font-family: inherit;
      font-size: 0.82rem;
      color: var(--muted);
      background: var(--light-bg);
      outline: none;
      cursor: pointer;
      transition: border-color 0.18s;
    }

    .filter-select:focus { border-color: var(--purple); }

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

    /* ── Article Cards Grid ── */
    .article-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
    }

    .article-admin-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 18px;
      overflow: hidden;
      transition: box-shadow 0.2s, transform 0.2s;
    }

    .article-admin-card:hover {
      box-shadow: 0 8px 28px rgba(0,0,0,0.07);
      transform: translateY(-2px);
    }

    .article-thumb {
      width: 100%;
      aspect-ratio: 16/9;
      object-fit: cover;
      display: block;
      background: var(--light-bg);
    }

    .article-card-body {
      padding: 16px;
    }

    .article-card-meta {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      margin-bottom: 10px;
    }

    .tag-badge {
      display: inline-flex;
      padding: 4px 10px;
      border-radius: 8px;
      background: var(--purple-soft);
      color: var(--purple);
      font-size: 0.68rem;
      font-weight: 700;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      white-space: nowrap;
    }

    .article-date {
      font-size: 0.72rem;
      color: #bbb;
      font-weight: 500;
      white-space: nowrap;
    }

    .article-card-title {
      font-size: 0.95rem;
      font-weight: 700;
      line-height: 1.35;
      letter-spacing: -0.01em;
      margin-bottom: 8px;
      color: var(--text);
    }

    .article-card-excerpt {
      font-size: 0.78rem;
      color: var(--muted);
      line-height: 1.55;
      margin-bottom: 14px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .article-card-actions {
      display: flex;
      gap: 8px;
      padding-top: 12px;
      border-top: 1px solid var(--border);
    }

    .btn-edit, .btn-delete {
      border: none;
      height: 32px;
      padding: 0 14px;
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
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 18px;
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
      max-width: 620px;
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
      font-size: 1rem;
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

    /* Image preview */
    .img-preview-wrap {
      margin-top: 10px;
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid var(--border);
      display: none;
    }

    .img-preview-wrap.show { display: block; }

    .img-preview {
      width: 100%;
      height: 140px;
      object-fit: cover;
      display: block;
    }

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
    }

    .toast.show { opacity: 1; transform: translateY(0); }

    /* ── Responsive ── */
    @media (max-width: 1100px) {
      .article-grid { grid-template-columns: repeat(2, 1fr); }
    }

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
      .article-grid { grid-template-columns: 1fr; }
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
        <a href="{{ route('admin.produk') }}">
          <span class="nav-icon">◻</span> Kelola Produk
        </a>
        <a href="{{ route('admin.artikel') }}" class="active">
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
        <h1>Kelola Artikel</h1>
        <p>Manajemen konten Jurnal Lokana. Data disimpan di localStorage — konsisten dengan halaman Artikel user.</p>
      </div>
      <button class="btn-primary" id="openAddModal">+ Tambah Artikel</button>
    </section>

    <div class="toolbar">
      <div class="search-wrap">
        <span class="search-icon">⌕</span>
        <input type="text" class="search-box" id="searchInput" placeholder="Cari judul atau deskripsi artikel...">
      </div>

      <select class="filter-select" id="filterTag">
        <option value="">Semua Kategori</option>
        <option value="Budaya">Budaya</option>
        <option value="Pengrajin Lokal">Pengrajin Lokal</option>
        <option value="Kuliner">Kuliner</option>
        <option value="Cerita Produk">Cerita Produk</option>
        <option value="Lifestyle">Lifestyle</option>
        <option value="UMKM">UMKM</option>
      </select>

      <div class="toolbar-right">
        <span class="count-badge" id="countBadge">6 artikel</span>
      </div>
    </div>

    <div class="article-grid" id="articleGrid"></div>
    <div class="empty-state" id="emptyState">
      <div style="font-size:2rem;margin-bottom:8px;">📝</div>
      <strong>Tidak ada artikel ditemukan</strong>
      <p>Coba ubah kata kunci atau filter kategori.</p>
    </div>
  </main>
</div>

<!-- Modal -->
<div class="modal" id="articleModal">
  <div class="modal-box">
    <div class="modal-header">
      <div>
        <h2 id="modalTitle">Tambah Artikel</h2>
        <p>Isi data artikel yang akan tampil di Jurnal Lokana.</p>
      </div>
      <button class="close-btn" id="closeModal" type="button">✕</button>
    </div>

    <div class="form-grid">
      <input type="hidden" id="articleId">

      <div class="form-group full">
        <label>Judul Artikel</label>
        <input type="text" id="articleTitle" placeholder="contoh: Endek Bali dalam Gaya Hidup Modern">
      </div>

      <div class="form-group">
        <label>Kategori</label>
        <select id="articleTag">
          <option value="Budaya">Budaya</option>
          <option value="Pengrajin Lokal">Pengrajin Lokal</option>
          <option value="Kuliner">Kuliner</option>
          <option value="Cerita Produk">Cerita Produk</option>
          <option value="Lifestyle">Lifestyle</option>
          <option value="UMKM">UMKM</option>
        </select>
      </div>

      <div class="form-group">
        <label>Tanggal Terbit</label>
        <input type="date" id="articleDate">
      </div>

      <div class="form-group full">
        <label>URL Gambar</label>
        <input type="url" id="articleImage" placeholder="https://...">
        <div class="img-preview-wrap" id="imgPreviewWrap">
          <img class="img-preview" id="imgPreview" src="" alt="Preview">
        </div>
      </div>

      <div class="form-group full">
        <label>Deskripsi Singkat</label>
        <textarea id="articleExcerpt" placeholder="Ringkasan artikel yang muncul di kartu..."></textarea>
      </div>
    </div>

    <div class="modal-actions">
      <button type="button" class="btn-cancel" id="cancelModal">Batal</button>
      <button type="button" class="btn-save" id="saveArticle">Simpan Artikel</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
  const STORAGE_KEY = 'lokana_articles';

  const defaultArticles = [
    {
      id: 1,
      title: 'Endek Bali dalam Gaya Hidup Modern',
      tag: 'Budaya',
      date: '2026-05-10',
      image: 'https://i.pinimg.com/1200x/71/64/04/716404ae798ba8c4f8b98762a31b97ca.jpg',
      excerpt: 'Kain Endek tidak hanya hadir sebagai warisan budaya, tetapi juga berkembang menjadi bagian dari fashion, desain, dan produk lokal Bali hari ini.'
    },
    {
      id: 2,
      title: 'Di Balik Produk Anyaman Bali',
      tag: 'Pengrajin Lokal',
      date: '2026-05-03',
      image: 'https://i.pinimg.com/1200x/fb/bd/51/fbbd512d4d47f937e8a40f877aff92e4.jpg',
      excerpt: 'Dari pemilihan material hingga proses pengerjaan manual, produk anyaman Bali menunjukkan bagaimana detail kecil bisa membentuk nilai sebuah karya.'
    },
    {
      id: 3,
      title: 'Rasa Lokal Bali dalam Satu Sajian',
      tag: 'Kuliner',
      date: '2026-04-22',
      image: 'https://i.pinimg.com/736x/0b/42/7b/0b427b1e0a03fbf8724ab701497a1729.jpg',
      excerpt: 'Dari sambal matah, sate lilit, sampai lawar khas Bali, setiap sajian membawa rasa yang dekat dengan rumah makan lokal dan dapur keluarga.'
    },
    {
      id: 4,
      title: 'Kopi Kintamani dan Nilai di Balik Asalnya',
      tag: 'Cerita Produk',
      date: '2026-04-15',
      image: 'https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg',
      excerpt: 'Lebih dari sekadar komoditas, kopi Kintamani membawa identitas wilayah, proses tanam, dan karakter rasa yang membuatnya dikenal luas.'
    },
    {
      id: 5,
      title: 'Aromaterapi Bali sebagai Produk Lifestyle',
      tag: 'Lifestyle',
      date: '2026-04-08',
      image: 'https://i.pinimg.com/736x/fe/66/70/fe667071d2d5c77d3c7acca6cbfc0dda.jpg',
      excerpt: 'Produk spa dan aromaterapi Bali berkembang karena menggabungkan bahan natural, pengalaman relaksasi, dan citra tropis yang kuat.'
    },
    {
      id: 6,
      title: 'UMKM Bali dan Peluang Pasar Digital',
      tag: 'UMKM',
      date: '2026-04-01',
      image: 'https://i.pinimg.com/736x/c9/4d/73/c94d73c341a1bf089cbfbba17e3a6067.jpg',
      excerpt: 'Digitalisasi membuka ruang baru bagi produk lokal Bali untuk ditemukan lebih luas, tanpa menghilangkan karakter dan kualitas produksinya.'
    }
  ];

  // ── Helpers ──
  function getArticles() {
    const stored = localStorage.getItem(STORAGE_KEY);
    if (!stored) {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultArticles));
      return defaultArticles;
    }
    const parsed = JSON.parse(stored);
    if (!Array.isArray(parsed) || parsed.length === 0) {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultArticles));
      return defaultArticles;
    }
    return parsed;
  }

  function saveArticles(articles) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(articles));
  }

  function formatDate(dateStr) {
    if (!dateStr) return '—';
    const d = new Date(dateStr);
    const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    return `${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
  }

  function showToast(msg) {
    const toast = document.getElementById('toast');
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2400);
  }

  // ── Render ──
  function renderArticles() {
    const keyword = document.getElementById('searchInput').value.toLowerCase().trim();
    const tagFilter = document.getElementById('filterTag').value;
    const articles = getArticles();

    const filtered = articles.filter(a => {
      const matchKeyword = a.title.toLowerCase().includes(keyword) || a.excerpt.toLowerCase().includes(keyword);
      const matchTag = tagFilter ? a.tag === tagFilter : true;
      return matchKeyword && matchTag;
    });

    const grid = document.getElementById('articleGrid');
    const empty = document.getElementById('emptyState');
    const count = document.getElementById('countBadge');

    grid.innerHTML = '';

    const total = articles.length;
    count.textContent = (keyword || tagFilter)
      ? `${filtered.length} dari ${total} artikel`
      : `${total} artikel`;

    if (filtered.length === 0) {
      grid.style.display = 'none';
      empty.style.display = 'block';
      return;
    }

    grid.style.display = 'grid';
    empty.style.display = 'none';

    filtered.forEach(a => {
      const card = document.createElement('div');
      card.className = 'article-admin-card';
      card.innerHTML = `
        <img class="article-thumb" src="${a.image}" alt="${a.title}" onerror="this.src='https://via.placeholder.com/400x225?text=📝'">
        <div class="article-card-body">
          <div class="article-card-meta">
            <span class="tag-badge">${a.tag}</span>
            <span class="article-date">${formatDate(a.date)}</span>
          </div>
          <div class="article-card-title">${a.title}</div>
          <div class="article-card-excerpt">${a.excerpt}</div>
          <div class="article-card-actions">
            <button class="btn-edit" onclick="editArticle(${a.id})">Edit</button>
            <button class="btn-delete" onclick="deleteArticle(${a.id})">Hapus</button>
          </div>
        </div>
      `;
      grid.appendChild(card);
    });
  }

  // ── Modal ──
  function openModal(mode = 'add') {
    document.getElementById('articleModal').classList.add('show');
    document.body.style.overflow = 'hidden';

    if (mode === 'add') {
      document.getElementById('modalTitle').textContent = 'Tambah Artikel';
      document.getElementById('articleId').value = '';
      document.getElementById('articleTitle').value = '';
      document.getElementById('articleTag').value = 'Budaya';
      document.getElementById('articleDate').value = new Date().toISOString().slice(0, 10);
      document.getElementById('articleImage').value = '';
      document.getElementById('articleExcerpt').value = '';
      document.getElementById('imgPreviewWrap').classList.remove('show');
    }
  }

  function closeModalFn() {
    document.getElementById('articleModal').classList.remove('show');
    document.body.style.overflow = '';
  }

  function editArticle(id) {
    const a = getArticles().find(x => x.id === id);
    if (!a) return;

    document.getElementById('modalTitle').textContent = 'Edit Artikel';
    document.getElementById('articleId').value = a.id;
    document.getElementById('articleTitle').value = a.title;
    document.getElementById('articleTag').value = a.tag;
    document.getElementById('articleDate').value = a.date;
    document.getElementById('articleImage').value = a.image;
    document.getElementById('articleExcerpt').value = a.excerpt;

    const preview = document.getElementById('imgPreview');
    const wrap = document.getElementById('imgPreviewWrap');
    if (a.image) {
      preview.src = a.image;
      wrap.classList.add('show');
    } else {
      wrap.classList.remove('show');
    }

    openModal('edit');
  }

  function deleteArticle(id) {
    if (!confirm('Yakin mau hapus artikel ini?')) return;
    const updated = getArticles().filter(a => a.id !== id);
    saveArticles(updated);
    renderArticles();
    showToast('✓ Artikel berhasil dihapus.');
  }

  // ── Image preview on URL input ──
  document.getElementById('articleImage').addEventListener('input', function () {
    const url = this.value.trim();
    const preview = document.getElementById('imgPreview');
    const wrap = document.getElementById('imgPreviewWrap');
    if (url) {
      preview.src = url;
      wrap.classList.add('show');
    } else {
      wrap.classList.remove('show');
    }
  });

  // ── Save ──
  document.getElementById('saveArticle').addEventListener('click', () => {
    const title   = document.getElementById('articleTitle').value.trim();
    const tag     = document.getElementById('articleTag').value;
    const date    = document.getElementById('articleDate').value;
    const image   = document.getElementById('articleImage').value.trim();
    const excerpt = document.getElementById('articleExcerpt').value.trim();

    if (!title || !date || !image || !excerpt) {
      showToast('⚠ Lengkapi semua field terlebih dahulu.');
      return;
    }

    const currentId = document.getElementById('articleId').value;
    const articles = getArticles();

    const data = {
      id: currentId ? Number(currentId) : Date.now(),
      title,
      tag,
      date,
      image,
      excerpt
    };

    if (currentId) {
      saveArticles(articles.map(a => a.id === Number(currentId) ? data : a));
      showToast('✓ Artikel berhasil diedit.');
    } else {
      articles.unshift(data); // artikel baru masuk paling atas
      saveArticles(articles);
      showToast('✓ Artikel berhasil ditambahkan.');
    }

    closeModalFn();
    renderArticles();
  });

  // ── Events ──
  document.getElementById('openAddModal').addEventListener('click', () => openModal('add'));
  document.getElementById('closeModal').addEventListener('click', closeModalFn);
  document.getElementById('cancelModal').addEventListener('click', closeModalFn);
  document.getElementById('articleModal').addEventListener('click', e => {
    if (e.target === document.getElementById('articleModal')) closeModalFn();
  });
  document.getElementById('searchInput').addEventListener('input', renderArticles);
  document.getElementById('filterTag').addEventListener('change', renderArticles);

  // ── Init ──
  renderArticles();
</script>

</body>
</html>