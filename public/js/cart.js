/**
 * cart.js — Lokana Cart System
 * Mengelola keranjang belanja (produk fisik & tiket event) menggunakan localStorage.
 */

const CART_KEY = 'lokana_cart';
const HISTORY_KEY = 'lokana_history';

/**
 * Ambil seluruh isi cart dari localStorage.
 * @returns {Array} array item cart, atau [] jika kosong/belum ada.
 */
function getCart() {
  const stored = localStorage.getItem(CART_KEY);

  if (!stored) {
    return [];
  }

  try {
    const parsed = JSON.parse(stored);
    return Array.isArray(parsed) ? parsed : [];
  } catch (e) {
    return [];
  }
}

/**
 * Simpan array cart ke localStorage.
 * @param {Array} cart
 */
function saveCart(cart) {
  localStorage.setItem(CART_KEY, JSON.stringify(cart));
}

/**
 * Tambah item ke cart. Jika item dengan id & tier & tanggal yang sama sudah ada,
 * qty-nya akan ditambah alih-alih membuat baris baru.
 *
 * @param {Object} item - { id, nama, kategori ('produk'|'tiket'), harga, qty, gambar, varian, tier, tanggalEvent }
 */
function addToCart(item) {
  const cart = getCart();

  const existingIndex = cart.findIndex(c =>
    c.id === item.id &&
    c.tier === item.tier &&
    c.tanggalEvent === item.tanggalEvent
  );

  if (existingIndex > -1) {
    cart[existingIndex].qty += item.qty;
  } else {
    cart.push(item);
  }

  saveCart(cart);
}

/**
 * Hapus satu item dari cart berdasarkan index posisinya di array.
 * @param {number} index
 */
function removeFromCart(index) {
  const cart = getCart();
  cart.splice(index, 1);
  saveCart(cart);
}

/**
 * Ubah qty item tertentu. Qty minimal 1.
 * @param {number} index
 * @param {number} newQty
 */
function updateCartQty(index, newQty) {
  const cart = getCart();

  if (!cart[index]) return;

  cart[index].qty = Math.max(1, newQty);
  saveCart(cart);
}

/**
 * Cek apakah cart berisi minimal satu produk fisik (bukan tiket).
 * Dipakai untuk menentukan apakah form alamat pengiriman & ongkir perlu ditampilkan.
 * @returns {boolean}
 */
function cartHasPhysicalProduct() {
  return getCart().some(item => item.kategori === 'produk');
}

/**
 * Cek apakah cart hanya berisi tiket (tidak ada produk fisik sama sekali).
 * @returns {boolean}
 */
function cartIsTicketOnly() {
  const cart = getCart();
  return cart.length > 0 && cart.every(item => item.kategori === 'tiket');
}

/**
 * Hitung subtotal seluruh item di cart (harga x qty).
 * @returns {number}
 */
function getCartSubtotal() {
  return getCart().reduce((sum, item) => sum + (item.harga * item.qty), 0);
}

/**
 * Hitung total qty seluruh item (untuk badge jumlah di nav, dll).
 * @returns {number}
 */
function getCartItemCount() {
  return getCart().reduce((sum, item) => sum + item.qty, 0);
}

/**
 * Kosongkan cart. Dipanggil setelah pembayaran berhasil.
 */
function clearCart() {
  localStorage.removeItem(CART_KEY);
}

/**
 * Format angka ke format Rupiah, mis. 250000 -> "Rp 250.000".
 * @param {number} number
 * @returns {string}
 */
function formatRupiah(number) {
  return 'Rp ' + Math.round(number).toLocaleString('id-ID');
}

/**
 * Generate nomor pesanan acak dengan format LKN-2026-XXX.
 * @returns {string}
 */
function generateOrderNumber() {
  const random = Math.floor(100 + Math.random() * 900);
  return 'LKN-2026-' + random;
}

/**
 * Ambil seluruh riwayat transaksi dari localStorage.
 * @returns {Array}
 */
function getHistory() {
  const stored = localStorage.getItem(HISTORY_KEY);

  if (!stored) {
    return [];
  }

  try {
    const parsed = JSON.parse(stored);
    return Array.isArray(parsed) ? parsed : [];
  } catch (e) {
    return [];
  }
}

/**
 * Simpan satu transaksi baru ke riwayat (ditambahkan di posisi paling atas).
 * @param {Object} order - { orderNumber, items, subtotal, ongkir, total, metodePembayaran, tanggal, status }
 */
function saveToHistory(order) {
  const history = getHistory();
  history.unshift(order);
  localStorage.setItem(HISTORY_KEY, JSON.stringify(history));
}

/**
 * Ambil transaksi terakhir yang baru dibuat (dipakai di halaman payment_success).
 * @returns {Object|null}
 */
function getLatestOrder() {
  const history = getHistory();
  return history.length > 0 ? history[0] : null;
}