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
      --red: #c0392b;
      --red-bg: #ffecec;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--light-bg);
      color: var(--text);
      overflow-x: hidden;
    }

    .admin-layout {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 260px 1fr;
    }

    .sidebar {
      position: sticky;
      top: 0;
      height: 100vh;
      background: var(--white);
      border-right: 1px solid var(--border);
      padding: 28px 22px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .brand {
      font-size: 1.25rem;
      font-weight: 800;
      color: var(--purple);
      text-decoration: none;
      letter-spacing: -0.03em;
      display: inline-block;
      margin-bottom: 34px;
    }

    .admin-label {
      font-size: 0.72rem;
      font-weight: 800;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #aaa;
      margin-bottom: 14px;
    }

    .side-nav {
      display: grid;
      gap: 8px;
    }

    .side-nav a {
      text-decoration: none;
      color: var(--muted);
      font-size: 0.9rem;
      font-weight: 700;
      padding: 12px 14px;
      border-radius: 14px;
      transition: all 0.2s;
    }

    .side-nav a:hover,
    .side-nav a.active {
      color: var(--purple);
      background: #f3f0ff;
    }

    .sidebar-footer {
      display: grid;
      gap: 10px;
      font-size: 0.84rem;
      color: var(--muted);
    }

    .logout {
      color: var(--red);
      text-decoration: none;
      font-weight: 800;
    }

    .content {
      padding: 34px 42px 60px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 24px;
      margin-bottom: 28px;
    }

    .page-title h1 {
      font-size: clamp(2rem, 4vw, 3rem);
      font-weight: 800;
      letter-spacing: -0.05em;
      margin-bottom: 10px;
    }

    .page-title p {
      color: var(--muted);
      font-size: 0.94rem;
      line-height: 1.7;
      max-width: 650px;
    }

    .btn-primary {
      border: none;
      min-height: 46px;
      padding: 0 20px;
      border-radius: 999px;
      background: var(--purple);
      color: var(--white);
      font-family: inherit;
      font-weight: 800;
      cursor: pointer;
      box-shadow: 0 12px 30px rgba(91,63,217,0.25);
      white-space: nowrap;
    }

    .btn-primary:hover {
      background: var(--purple-dark);
    }

    .toolbar {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 22px;
      padding: 18px;
      margin-bottom: 18px;
      display: flex;
      gap: 14px;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 12px 36px rgba(0,0,0,0.035);
    }

    .search-box {
      flex: 1;
      max-width: 420px;
      height: 44px;
      border: 1px solid var(--border);
      border-radius: 999px;
      padding: 0 16px;
      font-family: inherit;
      outline: none;
    }

    .search-box:focus {
      border-color: var(--purple);
    }

    .table-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 22px;
      box-shadow: 0 12px 36px rgba(0,0,0,0.04);
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 850px;
    }

    th {
      text-align: left;
      font-size: 0.74rem;
      color: #999;
      font-weight: 800;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 0 12px 14px;
    }

    td {
      padding: 16px 12px;
      border-top: 1px solid var(--border);
      font-size: 0.86rem;
      color: var(--muted);
      vertical-align: middle;
    }

    .product-cell {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .product-cell img {
      width: 62px;
      height: 62px;
      border-radius: 14px;
      object-fit: cover;
      background: #eee;
    }

    .product-cell strong {
      display: block;
      color: var(--text);
      margin-bottom: 5px;
    }

    .product-cell span {
      display: block;
      max-width: 340px;
      line-height: 1.45;
    }

    .badge {
      display: inline-flex;
      padding: 7px 11px;
      border-radius: 999px;
      background: #f3f0ff;
      color: var(--purple);
      font-size: 0.72rem;
      font-weight: 800;
      white-space: nowrap;
    }

    .stock {
      display: inline-flex;
      padding: 7px 11px;
      border-radius: 999px;
      font-size: 0.72rem;
      font-weight: 800;
      white-space: nowrap;
    }

    .stock.ready {
      color: var(--green);
      background: var(--green-bg);
    }

    .stock.low {
      color: var(--orange);
      background: var(--orange-bg);
    }

    .actions {
      display: flex;
      gap: 8px;
    }

    .btn-edit,
    .btn-delete {
      border: none;
      height: 34px;
      padding: 0 12px;
      border-radius: 999px;
      font-family: inherit;
      font-size: 0.78rem;
      font-weight: 800;
      cursor: pointer;
    }

    .btn-edit {
      color: var(--purple);
      background: #f3f0ff;
    }

    .btn-delete {
      color: var(--red);
      background: var(--red-bg);
    }

    .empty-state {
      display: none;
      padding: 28px;
      text-align: center;
      color: var(--muted);
    }

    .modal {
      position: fixed;
      inset: 0;
      z-index: 500;
      background: rgba(0,0,0,0.35);
      display: none;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    .modal.show {
      display: flex;
    }

    .modal-box {
      width: 100%;
      max-width: 620px;
      max-height: 92vh;
      overflow-y: auto;
      background: var(--white);
      border-radius: 28px;
      padding: 30px;
      box-shadow: 0 24px 80px rgba(0,0,0,0.18);
    }

    .modal-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 22px;
    }

    .modal-header h2 {
      font-size: 1.55rem;
      letter-spacing: -0.04em;
      margin-bottom: 8px;
    }

    .modal-header p {
      color: var(--muted);
      font-size: 0.88rem;
      line-height: 1.6;
    }

    .close-btn {
      border: none;
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: var(--light-bg);
      cursor: pointer;
      font-size: 1.2rem;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    .form-group.full {
      grid-column: 1 / -1;
    }

    label {
      display: block;
      font-size: 0.8rem;
      font-weight: 800;
      margin-bottom: 8px;
    }

    input, select, textarea {
      width: 100%;
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 12px 14px;
      font-family: inherit;
      outline: none;
      background: var(--white);
    }

    textarea {
      min-height: 90px;
      resize: vertical;
    }

    input:focus, select:focus, textarea:focus {
      border-color: var(--purple);
    }

    .modal-actions {
      display: flex;
      justify-content: flex-end;
      gap: 12px;
      margin-top: 22px;
    }

    .btn-cancel {
      border: 1px solid var(--border);
      background: var(--white);
      color: var(--muted);
      height: 44px;
      padding: 0 18px;
      border-radius: 999px;
      font-family: inherit;
      font-weight: 800;
      cursor: pointer;
    }

    .btn-save {
      border: none;
      background: var(--purple);
      color: var(--white);
      height: 44px;
      padding: 0 22px;
      border-radius: 999px;
      font-family: inherit;
      font-weight: 800;
      cursor: pointer;
    }

    .btn-save:hover {
      background: var(--purple-dark);
    }

    .toast {
      position: fixed;
      right: 28px;
      bottom: 28px;
      background: var(--text);
      color: var(--white);
      padding: 14px 18px;
      border-radius: 14px;
      font-size: 0.86rem;
      font-weight: 700;
      opacity: 0;
      transform: translateY(12px);
      pointer-events: none;
      transition: all 0.25s;
      z-index: 600;
    }

    .toast.show {
      opacity: 1;
      transform: translateY(0);
    }

    @media (max-width: 980px) {
      .admin-layout {
        grid-template-columns: 1fr;
      }

      .sidebar {
        position: static;
        height: auto;
        padding: 20px 24px;
      }

      .side-nav {
        grid-template-columns: repeat(2, 1fr);
      }

      .content {
        padding: 28px 24px 48px;
      }
    }

    @media (max-width: 640px) {
      .side-nav {
        grid-template-columns: 1fr;
      }

      .topbar,
      .toolbar {
        flex-direction: column;
        align-items: stretch;
      }

      .form-grid {
        grid-template-columns: 1fr;
      }

      .modal-actions {
        flex-direction: column;
      }

      .btn-cancel,
      .btn-save,
      .btn-primary {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<div class="admin-layout">
  <aside class="sidebar">
    <div>
      <a href="{{ route('admin.dashboard') }}" class="brand">Lokana Admin</a>

      <div class="admin-label">Menu Admin</div>
      <nav class="side-nav">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.produk') }}" class="active">Kelola Produk</a>
        <a href="{{ route('admin.artikel') }}">Kelola Artikel</a>
        <a href="{{ route('admin.pengguna') }}">Kelola Pengguna</a>
        <a href="{{ route('admin.transaksi') }}">Kelola Transaksi</a>
      </nav>
    </div>

    <div class="sidebar-footer">
      <span>Login sebagai <strong>{{ session('admin_name', 'Admin Lokana') }}</strong></span>
      <a href="{{ route('admin.logout') }}" class="logout">Logout</a>
    </div>
  </aside>

  <main class="content">
    <section class="topbar">
      <div class="page-title">
        <h1>Kelola Produk</h1>
        <p>Atur data produk yang tampil di halaman user Lokana. CRUD ini dibuat hardcode dengan localStorage untuk kebutuhan prototype frontend.</p>
      </div>

      <button class="btn-primary" id="openAddModal">+ Tambah Produk</button>
    </section>

    <section class="toolbar">
  <input type="text" class="search-box" id="searchInput" placeholder="Cari produk, kategori, atau deskripsi...">
</section>

    <section class="table-card">
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

      <div class="empty-state" id="emptyState">
        Tidak ada produk yang cocok dengan pencarian.
      </div>
    </section>
  </main>
</div>

<div class="modal" id="productModal">
  <div class="modal-box">
    <div class="modal-header">
      <div>
        <h2 id="modalTitle">Tambah Produk</h2>
        <p>Isi data produk sesuai konten yang tampil di marketplace Lokana.</p>
      </div>
      <button class="close-btn" id="closeModal" type="button">×</button>
    </div>

    <form id="productForm">
      <input type="hidden" id="productId">

      <div class="form-grid">
        <div class="form-group">
          <label>Nama Produk</label>
          <input type="text" id="productName" required>
        </div>

        <div class="form-group">
          <label>Kategori</label>
          <select id="productCategory" required>
            <option value="Fashion Lokal">Fashion Lokal</option>
            <option value="Kopi & Minuman">Kopi & Minuman</option>
            <option value="Self-care">Self-care</option>
            <option value="Aksesori Lokal">Aksesori Lokal</option>
            <option value="Home Living">Home Living</option>
            <option value="Kerajinan Handmade">Kerajinan Handmade</option>
          </select>
        </div>

        <div class="form-group">
          <label>Harga</label>
          <input type="number" id="productPrice" min="0" required>
        </div>

        <div class="form-group">
          <label>Stok</label>
          <input type="number" id="productStock" min="0" required>
        </div>

        <div class="form-group full">
          <label>URL Gambar Produk</label>
          <input type="url" id="productImage" required>
        </div>

        <div class="form-group full">
          <label>Deskripsi</label>
          <textarea id="productDescription" required></textarea>
        </div>
      </div>

      <div class="modal-actions">
        <button type="button" class="btn-cancel" id="cancelModal">Batal</button>
        <button type="submit" class="btn-save">Simpan Produk</button>
      </div>
    </form>
  </div>
</div>

<div class="toast" id="toast">Data produk berhasil diperbarui.</div>

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
      description: 'Kopi arabika dari dataran tinggi Bali dengan karakter rasa yang ringan, segar, dan cocok buat seduhan harian.'
    },
    {
      id: 3,
      name: 'Essential Oil Bali',
      category: 'Self-care',
      price: 150000,
      stock: 18,
      image: 'https://i.pinimg.com/736x/a9/84/83/a9848382e0f00383dc3a020ddae17ca0.jpg',
      description: 'Aroma natural dengan karakter tropis yang ringan. Cocok untuk relaksasi, diffuser, atau pelengkap rutinitas harian.'
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

  const productTableBody = document.getElementById('productTableBody');
  const emptyState = document.getElementById('emptyState');
  const searchInput = document.getElementById('searchInput');
  const productModal = document.getElementById('productModal');
  const openAddModal = document.getElementById('openAddModal');
  const closeModal = document.getElementById('closeModal');
  const cancelModal = document.getElementById('cancelModal');
  const productForm = document.getElementById('productForm');
  const modalTitle = document.getElementById('modalTitle');
  const resetData = document.getElementById('resetData');
  const toast = document.getElementById('toast');

  const productId = document.getElementById('productId');
  const productName = document.getElementById('productName');
  const productCategory = document.getElementById('productCategory');
  const productPrice = document.getElementById('productPrice');
  const productStock = document.getElementById('productStock');
  const productImage = document.getElementById('productImage');
  const productDescription = document.getElementById('productDescription');

  function getProducts() {
    const storedProducts = localStorage.getItem(STORAGE_KEY);

    if (!storedProducts) {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultProducts));
      return defaultProducts;
    }

    return JSON.parse(storedProducts);
  }

  function saveProducts(products) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(products));
  }

  function formatRupiah(number) {
    return 'Rp ' + Number(number).toLocaleString('id-ID');
  }

  function getStockStatus(stock) {
    if (stock <= 10) {
      return '<span class="stock low">Stok Menipis</span>';
    }

    return '<span class="stock ready">Tersedia</span>';
  }

  function renderProducts() {
    const keyword = searchInput.value.toLowerCase();
    const products = getProducts();

    const filteredProducts = products.filter(product => {
      return product.name.toLowerCase().includes(keyword) ||
             product.category.toLowerCase().includes(keyword) ||
             product.description.toLowerCase().includes(keyword);
    });

    productTableBody.innerHTML = '';

    if (filteredProducts.length === 0) {
      emptyState.style.display = 'block';
      return;
    }

    emptyState.style.display = 'none';

    filteredProducts.forEach(product => {
      const row = document.createElement('tr');

      row.innerHTML = `
        <td>
          <div class="product-cell">
            <img src="${product.image}" alt="${product.name}">
            <div>
              <strong>${product.name}</strong>
              <span>${product.description}</span>
            </div>
          </div>
        </td>
        <td><span class="badge">${product.category}</span></td>
        <td>${formatRupiah(product.price)}</td>
        <td>${product.stock}</td>
        <td>${getStockStatus(product.stock)}</td>
        <td>
          <div class="actions">
            <button class="btn-edit" type="button" onclick="editProduct(${product.id})">Edit</button>
            <button class="btn-delete" type="button" onclick="deleteProduct(${product.id})">Hapus</button>
          </div>
        </td>
      `;

      productTableBody.appendChild(row);
    });
  }

  function openModal(mode = 'add') {
    productModal.classList.add('show');
    document.body.style.overflow = 'hidden';

    if (mode === 'add') {
      modalTitle.textContent = 'Tambah Produk';
      productForm.reset();
      productId.value = '';
    }
  }

  function closeProductModal() {
    productModal.classList.remove('show');
    document.body.style.overflow = '';
  }

  function editProduct(id) {
    const products = getProducts();
    const product = products.find(item => item.id === id);

    if (!product) return;

    modalTitle.textContent = 'Edit Produk';
    productId.value = product.id;
    productName.value = product.name;
    productCategory.value = product.category;
    productPrice.value = product.price;
    productStock.value = product.stock;
    productImage.value = product.image;
    productDescription.value = product.description;

    openModal('edit');
  }

  function deleteProduct(id) {
    const isConfirmed = confirm('Yakin mau hapus produk ini?');

    if (!isConfirmed) return;

    const products = getProducts().filter(product => product.id !== id);
    saveProducts(products);
    renderProducts();
    showToast('Produk berhasil dihapus.');
  }

  function showToast(message) {
    toast.textContent = message;
    toast.classList.add('show');

    setTimeout(() => {
      toast.classList.remove('show');
    }, 2200);
  }

  productForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const products = getProducts();
    const currentId = productId.value;

    const productData = {
      id: currentId ? Number(currentId) : Date.now(),
      name: productName.value,
      category: productCategory.value,
      price: Number(productPrice.value),
      stock: Number(productStock.value),
      image: productImage.value,
      description: productDescription.value
    };

    if (currentId) {
      const updatedProducts = products.map(product => {
        return product.id === Number(currentId) ? productData : product;
      });

      saveProducts(updatedProducts);
      showToast('Produk berhasil diedit.');
    } else {
      products.push(productData);
      saveProducts(products);
      showToast('Produk berhasil ditambahkan.');
    }

    closeProductModal();
    renderProducts();
  });

  openAddModal.addEventListener('click', () => openModal('add'));
  closeModal.addEventListener('click', closeProductModal);
  cancelModal.addEventListener('click', closeProductModal);

  productModal.addEventListener('click', (e) => {
    if (e.target === productModal) {
      closeProductModal();
    }
  });

  searchInput.addEventListener('input', renderProducts);

  resetData.addEventListener('click', () => {
    const isConfirmed = confirm('Reset data produk ke data demo awal?');

    if (!isConfirmed) return;

    localStorage.setItem(STORAGE_KEY, JSON.stringify(defaultProducts));
    renderProducts();
    showToast('Data demo berhasil direset.');
  });

  renderProducts();
</script>

</body>
</html>