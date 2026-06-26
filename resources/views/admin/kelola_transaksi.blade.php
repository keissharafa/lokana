<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Transaksi - Lokana Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f8;
            color: #1a1a2e;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #fff;
            border-right: 1px solid #ebebf0;
            display: flex;
            flex-direction: column;
            padding: 24px 0;
            position: fixed;
            top: 0; left: 0;
            height: 100vh;
        }

        .sidebar-logo {
            padding: 0 24px 24px;
            border-bottom: 1px solid #ebebf0;
        }

        .sidebar-logo span {
            font-size: 22px;
            font-weight: 800;
            color: #5B3DF5;
            letter-spacing: -0.5px;
        }

        .sidebar-logo small {
            display: block;
            font-size: 11px;
            color: #999;
            margin-top: 2px;
        }

        .sidebar-nav { padding: 16px 12px; flex: 1; }

        .nav-label {
            font-size: 10px;
            font-weight: 700;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 8px 12px 4px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #555;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 2px;
            transition: all 0.15s;
        }

        .nav-item:hover { background: #f0edff; color: #5B3DF5; }
        .nav-item.active { background: #5B3DF5; color: #fff; }
        .nav-item .icon { font-size: 17px; }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid #ebebf0;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #e74c3c;
            font-size: 14px;
            font-weight: 500;
        }

        .logout-btn:hover { background: #fff0f0; }

        .main { margin-left: 240px; flex: 1; padding: 32px; }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-header h1 { font-size: 22px; font-weight: 800; color: #1a1a2e; }
        .page-header p { font-size: 13px; color: #888; margin-top: 2px; }

        /* STATS */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #fff;
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        }

        .stat-label {
            font-size: 12px;
            color: #999;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 800;
            color: #1a1a2e;
            margin-top: 6px;
        }

        .stat-sub { font-size: 12px; color: #5B3DF5; margin-top: 4px; font-weight: 500; }

        /* TOOLBAR */
        .toolbar {
            background: #fff;
            border-radius: 14px;
            padding: 16px 20px;
            margin-bottom: 20px;
            display: flex;
            gap: 12px;
            align-items: center;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        }

        .search-box {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f4f4f8;
            border-radius: 10px;
            padding: 8px 14px;
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            font-size: 14px;
            width: 100%;
        }

        .filter-select {
            padding: 8px 14px;
            border: 1px solid #ebebf0;
            border-radius: 10px;
            font-size: 14px;
            color: #555;
            background: #fff;
            outline: none;
            cursor: pointer;
        }

        /* TABLE */
        .table-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

        thead { background: #f8f8fc; }

        th {
            padding: 13px 20px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 14px 20px;
            font-size: 14px;
            color: #333;
            border-top: 1px solid #f0f0f4;
        }

        tr:hover td { background: #fafafa; }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-selesai { background: #e8f8f0; color: #27ae60; }
        .badge-diproses { background: #fffbe6; color: #e6a817; }
        .badge-dikirim { background: #e8f0ff; color: #2d6ef5; }
        .badge-dibatalkan { background: #fdf0f0; color: #e74c3c; }

        .tx-id { font-family: monospace; font-size: 13px; color: #5B3DF5; font-weight: 700; }

        .product-list { font-size: 13px; color: #555; }

        .total-amount { font-weight: 700; color: #1a1a2e; }

        .action-btns { display: flex; gap: 6px; }

        .btn-icon {
            border: none;
            background: transparent;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.15s;
        }

        .btn-detail { color: #5B3DF5; }
        .btn-detail:hover { background: #ede9ff; }
        .btn-ubah { color: #e67e22; }
        .btn-ubah:hover { background: #fff5e6; }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #aaa;
        }

        /* MODAL DETAIL */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 999;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.open { display: flex; }

        .modal {
            background: #fff;
            border-radius: 20px;
            padding: 32px;
            width: 520px;
            max-width: 90vw;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            max-height: 85vh;
            overflow-y: auto;
        }

        .modal h2 {
            font-size: 18px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 20px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f4;
            font-size: 14px;
        }

        .detail-row:last-child { border-bottom: none; }
        .detail-label { color: #888; }
        .detail-value { font-weight: 600; color: #1a1a2e; text-align: right; }

        .modal-status-section {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #f0f0f4;
        }

        .modal-status-section label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }

        .status-options {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .status-btn {
            padding: 7px 16px;
            border-radius: 20px;
            border: 2px solid #e5e5ec;
            background: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s;
            color: #555;
        }

        .status-btn:hover { border-color: #5B3DF5; color: #5B3DF5; }
        .status-btn.selected { background: #5B3DF5; border-color: #5B3DF5; color: #fff; }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 24px;
        }

        .btn-primary {
            background: #5B3DF5;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-primary:hover { background: #4a2fd4; }

        .btn-cancel {
            padding: 10px 20px;
            border-radius: 10px;
            border: 1.5px solid #e5e5ec;
            background: #fff;
            font-size: 14px;
            font-weight: 600;
            color: #555;
            cursor: pointer;
        }

        .toast {
            position: fixed;
            bottom: 28px;
            right: 28px;
            background: #1a1a2e;
            color: #fff;
            padding: 13px 22px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            box-shadow: 0 4px 16px rgba(0,0,0,0.2);
            opacity: 0;
            transform: translateY(12px);
            transition: all 0.3s;
            z-index: 9999;
        }

        .toast.show { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <span>Lokana</span>
        <small>Admin Panel</small>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-label">Menu</div>
        <a href="/admin/dashboard" class="nav-item">
            <span class="icon">📊</span> Dashboard
        </a>
        <a href="/admin/kelola-produk" class="nav-item">
            <span class="icon">🛍️</span> Kelola Produk
        </a>
        <a href="/admin/kelola-artikel" class="nav-item">
            <span class="icon">📝</span> Kelola Artikel
        </a>
        <a href="/admin/kelola-pengguna" class="nav-item">
            <span class="icon">👥</span> Kelola Pengguna
        </a>
        <a href="/admin/kelola-transaksi" class="nav-item active">
            <span class="icon">🧾</span> Kelola Transaksi
        </a>
    </nav>
    <div class="sidebar-footer">
        <a href="/admin/logout" class="logout-btn">
            <span class="icon">🚪</span> Logout
        </a>
    </div>
</aside>

<!-- MAIN -->
<main class="main">
    <div class="page-header">
        <div>
            <h1>Kelola Transaksi</h1>
            <p>Monitor dan kelola seluruh transaksi Lokana</p>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-label">Total Transaksi</div>
            <div class="stat-value" id="statTotal">0</div>
            <div class="stat-sub">Semua waktu</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Diproses</div>
            <div class="stat-value" id="statDiproses">0</div>
            <div class="stat-sub">Perlu perhatian</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Dikirim</div>
            <div class="stat-value" id="statDikirim">0</div>
            <div class="stat-sub">Dalam pengiriman</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Pendapatan</div>
            <div class="stat-value" id="statPendapatan">Rp0</div>
            <div class="stat-sub">Transaksi selesai</div>
        </div>
    </div>

    <!-- TOOLBAR -->
    <div class="toolbar">
        <div class="search-box">
            <span>🔍</span>
            <input type="text" id="searchInput" placeholder="Cari no. transaksi atau pembeli..." oninput="renderTable()">
        </div>
        <select class="filter-select" id="filterStatus" onchange="renderTable()">
            <option value="">Semua Status</option>
            <option value="Diproses">Diproses</option>
            <option value="Dikirim">Dikirim</option>
            <option value="Selesai">Selesai</option>
            <option value="Dibatalkan">Dibatalkan</option>
        </select>
    </div>

    <!-- TABLE -->
    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No. Transaksi</th>
                    <th>Pembeli</th>
                    <th>Produk</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody"></tbody>
        </table>
        <div class="empty-state" id="emptyState" style="display:none;">
            <div style="font-size:36px;margin-bottom:12px;">🧾</div>
            <p>Tidak ada transaksi ditemukan.</p>
        </div>
    </div>
</main>

<!-- MODAL DETAIL & UBAH STATUS -->
<div class="modal-overlay" id="modalOverlay">
    <div class="modal">
        <h2>Detail Transaksi</h2>
        <input type="hidden" id="detailId">

        <div class="detail-row">
            <span class="detail-label">No. Transaksi</span>
            <span class="detail-value tx-id" id="dTxId"></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Pembeli</span>
            <span class="detail-value" id="dPembeli"></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Produk</span>
            <span class="detail-value" id="dProduk"></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Metode Pembayaran</span>
            <span class="detail-value" id="dMetode"></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Alamat Pengiriman</span>
            <span class="detail-value" id="dAlamat"></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Subtotal</span>
            <span class="detail-value" id="dSubtotal"></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Ongkos Kirim</span>
            <span class="detail-value" id="dOngkir"></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Total</span>
            <span class="detail-value" id="dTotal"></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Tanggal</span>
            <span class="detail-value" id="dTanggal"></span>
        </div>

        <div class="modal-status-section">
            <label>Ubah Status Transaksi</label>
            <div class="status-options">
                <button class="status-btn" onclick="selectStatus('Diproses')" id="sDiproses">Diproses</button>
                <button class="status-btn" onclick="selectStatus('Dikirim')" id="sDikirim">Dikirim</button>
                <button class="status-btn" onclick="selectStatus('Selesai')" id="sSelesai">Selesai</button>
                <button class="status-btn" onclick="selectStatus('Dibatalkan')" id="sDibatalkan">Dibatalkan</button>
            </div>
        </div>

        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeModal()">Tutup</button>
            <button class="btn-primary" onclick="saveStatus()">Simpan Status</button>
        </div>
    </div>
</div>

<div class="toast" id="toast"></div>

<script>
    const STORAGE_KEY = 'lokana_transaksi';

    const defaultTransaksi = [
        {
            id: 'TRX-2025-001',
            pembeli: 'Sari Dewi',
            produk: 'Scarf Endek Bali Handmade x2',
            metode: 'QRIS',
            alamat: 'Jl. Kuta Raya No. 12, Badung, Bali',
            subtotal: 380000,
            ongkir: 15000,
            total: 395000,
            tanggal: '15 Apr 2025',
            status: 'Selesai'
        },
        {
            id: 'TRX-2025-002',
            pembeli: 'Budi Santoso',
            produk: 'Kintamani Coffee x1, Essential Oil Bali x1',
            metode: 'Transfer Bank',
            alamat: 'Jl. Bypass Ngurah Rai No. 55, Denpasar',
            subtotal: 245000,
            ongkir: 20000,
            total: 265000,
            tanggal: '18 Apr 2025',
            status: 'Selesai'
        },
        {
            id: 'TRX-2025-003',
            pembeli: 'Made Surya',
            produk: 'Beach Jewelry x3',
            metode: 'E-Wallet',
            alamat: 'Jl. Seminyak No. 8, Badung, Bali',
            subtotal: 450000,
            ongkir: 15000,
            total: 465000,
            tanggal: '2 Mei 2025',
            status: 'Dikirim'
        },
        {
            id: 'TRX-2025-004',
            pembeli: 'Ni Luh Ayu',
            produk: 'Kayu Bowls x1',
            metode: 'QRIS',
            alamat: 'Jl. Ubud Raya No. 3, Gianyar, Bali',
            subtotal: 185000,
            ongkir: 15000,
            total: 200000,
            tanggal: '5 Mei 2025',
            status: 'Diproses'
        },
        {
            id: 'TRX-2025-005',
            pembeli: 'Ketut Ari',
            produk: 'Beaded Basket x2',
            metode: 'Transfer Bank',
            alamat: 'Jl. Sanur No. 21, Denpasar Selatan',
            subtotal: 560000,
            ongkir: 20000,
            total: 580000,
            tanggal: '10 Mei 2025',
            status: 'Diproses'
        },
        {
            id: 'TRX-2025-006',
            pembeli: 'Sari Dewi',
            produk: 'Essential Oil Bali x2',
            metode: 'E-Wallet',
            alamat: 'Jl. Kuta Raya No. 12, Badung, Bali',
            subtotal: 300000,
            ongkir: 15000,
            total: 315000,
            tanggal: '12 Mei 2025',
            status: 'Dikirim'
        },
    ];

    function getTransaksi() {
        const stored = localStorage.getItem(STORAGE_KEY);
        if (!stored) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultTransaksi));
            return defaultTransaksi;
        }
        const parsed = JSON.parse(stored);
        if (!Array.isArray(parsed) || parsed.length === 0) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultTransaksi));
            return defaultTransaksi;
        }
        return parsed;
    }

    function saveTransaksi(data) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
    }

    function formatRupiah(n) {
        return 'Rp' + n.toLocaleString('id-ID');
    }

    function updateStats(data) {
        document.getElementById('statTotal').textContent = data.length;
        document.getElementById('statDiproses').textContent = data.filter(t => t.status === 'Diproses').length;
        document.getElementById('statDikirim').textContent = data.filter(t => t.status === 'Dikirim').length;
        const pendapatan = data.filter(t => t.status === 'Selesai').reduce((s, t) => s + t.total, 0);
        document.getElementById('statPendapatan').textContent = formatRupiah(pendapatan);
    }

    function badgeClass(status) {
        const map = { 'Selesai': 'selesai', 'Diproses': 'diproses', 'Dikirim': 'dikirim', 'Dibatalkan': 'dibatalkan' };
        return map[status] || 'diproses';
    }

    function renderTable() {
        const q = document.getElementById('searchInput').value.toLowerCase();
        const filterStatus = document.getElementById('filterStatus').value;
        const data = getTransaksi();

        const filtered = data.filter(t => {
            const matchSearch = t.id.toLowerCase().includes(q) || t.pembeli.toLowerCase().includes(q);
            const matchStatus = !filterStatus || t.status === filterStatus;
            return matchSearch && matchStatus;
        });

        updateStats(data);

        const tbody = document.getElementById('tableBody');
        const empty = document.getElementById('emptyState');

        if (filtered.length === 0) {
            tbody.innerHTML = '';
            empty.style.display = 'block';
            return;
        }

        empty.style.display = 'none';
        tbody.innerHTML = filtered.map(t => `
            <tr>
                <td><span class="tx-id">${t.id}</span></td>
                <td>${t.pembeli}</td>
                <td><div class="product-list">${t.produk}</div></td>
                <td><span class="total-amount">${formatRupiah(t.total)}</span></td>
                <td>${t.tanggal}</td>
                <td><span class="badge badge-${badgeClass(t.status)}">${t.status}</span></td>
                <td>
                    <div class="action-btns">
                        <button class="btn-icon btn-detail" onclick="openDetail('${t.id}')">🔍 Detail</button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    let selectedStatus = '';

    function openDetail(id) {
        const data = getTransaksi();
        const t = data.find(x => x.id === id);
        if (!t) return;

        document.getElementById('detailId').value = id;
        document.getElementById('dTxId').textContent = t.id;
        document.getElementById('dPembeli').textContent = t.pembeli;
        document.getElementById('dProduk').textContent = t.produk;
        document.getElementById('dMetode').textContent = t.metode;
        document.getElementById('dAlamat').textContent = t.alamat;
        document.getElementById('dSubtotal').textContent = formatRupiah(t.subtotal);
        document.getElementById('dOngkir').textContent = formatRupiah(t.ongkir);
        document.getElementById('dTotal').textContent = formatRupiah(t.total);
        document.getElementById('dTanggal').textContent = t.tanggal;

        selectedStatus = t.status;
        ['Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'].forEach(s => {
            const btn = document.getElementById('s' + s.replace('Dibatalkan', 'Dibatalkan'));
            const el = document.querySelector(`.status-btn[onclick="selectStatus('${s}')"]`);
            if (el) el.classList.toggle('selected', s === selectedStatus);
        });

        document.getElementById('modalOverlay').classList.add('open');
    }

    function selectStatus(status) {
        selectedStatus = status;
        document.querySelectorAll('.status-btn').forEach(btn => {
            btn.classList.toggle('selected', btn.textContent === status);
        });
    }

    function saveStatus() {
        const id = document.getElementById('detailId').value;
        let data = getTransaksi();
        data = data.map(t => t.id === id ? { ...t, status: selectedStatus } : t);
        saveTransaksi(data);
        closeModal();
        renderTable();
        showToast('✅ Status transaksi diperbarui!');
    }

    function closeModal() {
        document.getElementById('modalOverlay').classList.remove('open');
    }

    function showToast(msg) {
        const toast = document.getElementById('toast');
        toast.textContent = msg;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2800);
    }

    document.getElementById('modalOverlay').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });

    renderTable();
</script>
</body>
</html>