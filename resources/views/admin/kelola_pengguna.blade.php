<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - Lokana Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f8;
            color: #1a1a2e;
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
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

        .sidebar-nav {
            padding: 16px 12px;
            flex: 1;
        }

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
            transition: background 0.15s;
        }

        .logout-btn:hover { background: #fff0f0; }

        /* MAIN */
        .main {
            margin-left: 240px;
            flex: 1;
            padding: 32px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-header h1 {
            font-size: 22px;
            font-weight: 800;
            color: #1a1a2e;
        }

        .page-header p {
            font-size: 13px;
            color: #888;
            margin-top: 2px;
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
            transition: background 0.15s;
        }

        .btn-primary:hover { background: #4a2fd4; }

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
            color: #1a1a2e;
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

        /* TABLE CARD */
        .table-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8f8fc;
        }

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

        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #ede9ff;
            color: #5B3DF5;
            font-weight: 700;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .user-name { font-weight: 600; color: #1a1a2e; }
        .user-email { font-size: 12px; color: #999; }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-active { background: #e8f8f0; color: #27ae60; }
        .badge-nonaktif { background: #fdf0f0; color: #e74c3c; }
        .badge-admin { background: #ede9ff; color: #5B3DF5; }
        .badge-user { background: #f0f0f4; color: #666; }

        .action-btns { display: flex; gap: 8px; }

        .btn-icon {
            border: none;
            background: transparent;
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.15s;
        }

        .btn-edit { color: #5B3DF5; }
        .btn-edit:hover { background: #ede9ff; }
        .btn-delete { color: #e74c3c; }
        .btn-delete:hover { background: #fdf0f0; }
        .btn-toggle { color: #e67e22; }
        .btn-toggle:hover { background: #fff5e6; }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #aaa;
        }

        .empty-state .icon { font-size: 40px; margin-bottom: 12px; }
        .empty-state p { font-size: 14px; }

        /* STATS ROW */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #fff;
            border-radius: 14px;
            padding: 20px 24px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        }

        .stat-card .stat-label {
            font-size: 12px;
            color: #999;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-card .stat-value {
            font-size: 28px;
            font-weight: 800;
            color: #1a1a2e;
            margin-top: 6px;
        }

        .stat-card .stat-sub {
            font-size: 12px;
            color: #5B3DF5;
            margin-top: 4px;
            font-weight: 500;
        }

        /* MODAL */
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
            width: 460px;
            max-width: 90vw;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        }

        .modal h2 {
            font-size: 18px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #e5e5ec;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            transition: border 0.15s;
            background: #fff;
        }

        .form-group input:focus,
        .form-group select:focus { border-color: #5B3DF5; }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 24px;
        }

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

        .btn-cancel:hover { background: #f4f4f8; }

        /* TOAST */
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
        <a href="/admin/kelola-pengguna" class="nav-item active">
            <span class="icon">👥</span> Kelola Pengguna
        </a>
        <a href="/admin/kelola-transaksi" class="nav-item">
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
            <h1>Kelola Pengguna</h1>
            <p>Manajemen akun pengguna Lokana</p>
        </div>
        <button class="btn-primary" onclick="openModal()">+ Tambah Pengguna</button>
    </div>

    <!-- STATS -->
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-label">Total Pengguna</div>
            <div class="stat-value" id="statTotal">0</div>
            <div class="stat-sub">Terdaftar</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Pengguna Aktif</div>
            <div class="stat-value" id="statAktif">0</div>
            <div class="stat-sub">Aktif sekarang</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Admin</div>
            <div class="stat-value" id="statAdmin">0</div>
            <div class="stat-sub">Hak akses admin</div>
        </div>
    </div>

    <!-- TOOLBAR -->
    <div class="toolbar">
        <div class="search-box">
            <span>🔍</span>
            <input type="text" id="searchInput" placeholder="Cari nama atau email..." oninput="renderTable()">
        </div>
        <select class="filter-select" id="filterRole" onchange="renderTable()">
            <option value="">Semua Role</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
        <select class="filter-select" id="filterStatus" onchange="renderTable()">
            <option value="">Semua Status</option>
            <option value="Aktif">Aktif</option>
            <option value="Nonaktif">Nonaktif</option>
        </select>
    </div>

    <!-- TABLE -->
    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Pengguna</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Bergabung</th>
                    <th>Transaksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody"></tbody>
        </table>
        <div class="empty-state" id="emptyState" style="display:none;">
            <div class="icon">👤</div>
            <p>Tidak ada pengguna ditemukan.</p>
        </div>
    </div>
</main>

<!-- MODAL TAMBAH/EDIT -->
<div class="modal-overlay" id="modalOverlay">
    <div class="modal">
        <h2 id="modalTitle">Tambah Pengguna</h2>
        <input type="hidden" id="editId">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" id="inputNama" placeholder="Masukkan nama lengkap">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" id="inputEmail" placeholder="email@contoh.com">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" id="inputUsername" placeholder="username">
        </div>
        <div class="form-group">
            <label>Role</label>
            <select id="inputRole">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select id="inputStatus">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>
        </div>
        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeModal()">Batal</button>
            <button class="btn-primary" onclick="saveUser()">Simpan</button>
        </div>
    </div>
</div>

<div class="toast" id="toast"></div>

<script>
    const STORAGE_KEY = 'lokana_pengguna';

    const defaultUsers = [
        { id: 1, nama: 'Admin Lokana', email: 'admin@lokana.id', username: 'admin', role: 'Admin', status: 'Aktif', bergabung: '10 Jan 2025', transaksi: 0 },
        { id: 2, nama: 'Sari Dewi', email: 'sari@gmail.com', username: 'sari_dewi', role: 'User', status: 'Aktif', bergabung: '12 Feb 2025', transaksi: 5 },
        { id: 3, nama: 'Budi Santoso', email: 'budi@gmail.com', username: 'budi_s', role: 'User', status: 'Aktif', bergabung: '3 Mar 2025', transaksi: 3 },
        { id: 4, nama: 'Ni Luh Ayu', email: 'niluh@gmail.com', username: 'niluh_ayu', role: 'User', status: 'Nonaktif', bergabung: '20 Mar 2025', transaksi: 1 },
        { id: 5, nama: 'Made Surya', email: 'made@gmail.com', username: 'made_surya', role: 'User', status: 'Aktif', bergabung: '5 Apr 2025', transaksi: 7 },
        { id: 6, nama: 'Ketut Ari', email: 'ketut@gmail.com', username: 'ketut_ari', role: 'User', status: 'Aktif', bergabung: '18 Apr 2025', transaksi: 2 },
    ];

    function getUsers() {
        const stored = localStorage.getItem(STORAGE_KEY);
        if (!stored) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultUsers));
            return defaultUsers;
        }
        const parsed = JSON.parse(stored);
        if (!Array.isArray(parsed) || parsed.length === 0) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultUsers));
            return defaultUsers;
        }
        return parsed;
    }

    function saveUsers(users) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(users));
    }

    function getInitials(nama) {
        return nama.split(' ').map(w => w[0]).join('').slice(0, 2).toUpperCase();
    }

    function updateStats(users) {
        document.getElementById('statTotal').textContent = users.length;
        document.getElementById('statAktif').textContent = users.filter(u => u.status === 'Aktif').length;
        document.getElementById('statAdmin').textContent = users.filter(u => u.role === 'Admin').length;
    }

    function renderTable() {
        const q = document.getElementById('searchInput').value.toLowerCase();
        const filterRole = document.getElementById('filterRole').value;
        const filterStatus = document.getElementById('filterStatus').value;
        const users = getUsers();

        const filtered = users.filter(u => {
            const matchSearch = u.nama.toLowerCase().includes(q) || u.email.toLowerCase().includes(q);
            const matchRole = !filterRole || u.role === filterRole;
            const matchStatus = !filterStatus || u.status === filterStatus;
            return matchSearch && matchRole && matchStatus;
        });

        updateStats(users);

        const tbody = document.getElementById('tableBody');
        const empty = document.getElementById('emptyState');

        if (filtered.length === 0) {
            tbody.innerHTML = '';
            empty.style.display = 'block';
            return;
        }

        empty.style.display = 'none';
        tbody.innerHTML = filtered.map(u => `
            <tr>
                <td>
                    <div class="user-cell">
                        <div class="avatar">${getInitials(u.nama)}</div>
                        <div>
                            <div class="user-name">${u.nama}</div>
                            <div class="user-email">${u.email}</div>
                        </div>
                    </div>
                </td>
                <td><span class="badge badge-${u.role.toLowerCase()}">${u.role}</span></td>
                <td><span class="badge badge-${u.status.toLowerCase()}">${u.status}</span></td>
                <td>${u.bergabung}</td>
                <td>${u.transaksi} order</td>
                <td>
                    <div class="action-btns">
                        <button class="btn-icon btn-edit" onclick="editUser(${u.id})">✏️ Edit</button>
                        <button class="btn-icon btn-toggle" onclick="toggleStatus(${u.id})">${u.status === 'Aktif' ? '🔒 Nonaktifkan' : '🔓 Aktifkan'}</button>
                        <button class="btn-icon btn-delete" onclick="deleteUser(${u.id})">🗑️ Hapus</button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    function openModal() {
        document.getElementById('modalTitle').textContent = 'Tambah Pengguna';
        document.getElementById('editId').value = '';
        document.getElementById('inputNama').value = '';
        document.getElementById('inputEmail').value = '';
        document.getElementById('inputUsername').value = '';
        document.getElementById('inputRole').value = 'User';
        document.getElementById('inputStatus').value = 'Aktif';
        document.getElementById('modalOverlay').classList.add('open');
    }

    function closeModal() {
        document.getElementById('modalOverlay').classList.remove('open');
    }

    function editUser(id) {
        const users = getUsers();
        const user = users.find(u => u.id === id);
        if (!user) return;
        document.getElementById('modalTitle').textContent = 'Edit Pengguna';
        document.getElementById('editId').value = id;
        document.getElementById('inputNama').value = user.nama;
        document.getElementById('inputEmail').value = user.email;
        document.getElementById('inputUsername').value = user.username;
        document.getElementById('inputRole').value = user.role;
        document.getElementById('inputStatus').value = user.status;
        document.getElementById('modalOverlay').classList.add('open');
    }

    function saveUser() {
        const nama = document.getElementById('inputNama').value.trim();
        const email = document.getElementById('inputEmail').value.trim();
        const username = document.getElementById('inputUsername').value.trim();
        const role = document.getElementById('inputRole').value;
        const status = document.getElementById('inputStatus').value;

        if (!nama || !email || !username) {
            showToast('⚠️ Semua field wajib diisi!');
            return;
        }

        const editId = document.getElementById('editId').value;
        let users = getUsers();

        if (editId) {
            users = users.map(u => u.id == editId ? { ...u, nama, email, username, role, status } : u);
            showToast('✅ Pengguna berhasil diperbarui!');
        } else {
            const newId = users.length > 0 ? Math.max(...users.map(u => u.id)) + 1 : 1;
            const today = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
            users.push({ id: newId, nama, email, username, role, status, bergabung: today, transaksi: 0 });
            showToast('✅ Pengguna berhasil ditambahkan!');
        }

        saveUsers(users);
        closeModal();
        renderTable();
    }

    function toggleStatus(id) {
        let users = getUsers();
        users = users.map(u => {
            if (u.id === id) {
                const newStatus = u.status === 'Aktif' ? 'Nonaktif' : 'Aktif';
                return { ...u, status: newStatus };
            }
            return u;
        });
        saveUsers(users);
        renderTable();
        showToast('✅ Status pengguna diperbarui!');
    }

    function deleteUser(id) {
        if (!confirm('Yakin ingin menghapus pengguna ini?')) return;
        let users = getUsers().filter(u => u.id !== id);
        saveUsers(users);
        renderTable();
        showToast('🗑️ Pengguna berhasil dihapus!');
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