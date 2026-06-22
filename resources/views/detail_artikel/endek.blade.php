<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Endek Bali dalam Gaya Hidup Modern - Lokana</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌿</text></svg>"/>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --purple: #5B3FD9;
      --purple-dark: #4730B3;
      --gold: #C8963C;
      --text: #1a1a1a;
      --muted: #666;
      --light-bg: #f9f7f4;
      --white: #fff;
      --border: #e8e3dc;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: var(--text);
      background: var(--light-bg);
      overflow-x: hidden;
    }

    nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 200;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 48px;
      height: 64px;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(0,0,0,0.06);
    }

    .nav-brand {
      font-size: 1.15rem;
      font-weight: 700;
      color: var(--text);
      text-decoration: none;
      letter-spacing: -0.02em;
      z-index: 201;
    }

    .nav-links {
      display: flex;
      gap: 36px;
      list-style: none;
    }

    .nav-links a {
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }

    .nav-links a:hover,
    .nav-links a.active {
      color: var(--purple);
    }

    .nav-actions {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .nav-actions svg {
      width: 20px;
      height: 20px;
      stroke: var(--text);
      fill: none;
      stroke-width: 1.7;
      cursor: pointer;
      transition: stroke 0.2s;
    }

    .nav-actions svg:hover { stroke: var(--purple); }

    .hamburger {
      display: none;
      flex-direction: column;
      justify-content: center;
      gap: 5px;
      width: 36px;
      height: 36px;
      cursor: pointer;
      background: none;
      border: none;
      padding: 4px;
      z-index: 201;
    }

    .hamburger span {
      display: block;
      height: 2px;
      border-radius: 2px;
      background: var(--text);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      transform-origin: center;
    }

    .hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
    .hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    .mobile-menu {
      display: none;
      position: fixed;
      top: 64px; left: 0; right: 0;
      background: var(--white);
      border-bottom: 1px solid var(--border);
      z-index: 199;
      flex-direction: column;
      padding: 8px 0 24px;
      box-shadow: 0 12px 40px rgba(0,0,0,0.08);
      transform: translateY(-8px);
      opacity: 0;
      pointer-events: none;
      transition: transform 0.25s cubic-bezier(0.4,0,0.2,1), opacity 0.25s;
    }

    .mobile-menu.open {
      transform: translateY(0);
      opacity: 1;
      pointer-events: all;
    }

    .mobile-menu a {
      display: block;
      padding: 14px 28px;
      font-size: 0.95rem;
      font-weight: 500;
      color: var(--text);
      text-decoration: none;
      border-left: 3px solid transparent;
      transition: all 0.15s;
    }

    .mobile-menu a:hover,
    .mobile-menu a.active {
      color: var(--purple);
      border-left-color: var(--purple);
      background: #f5f3ff;
    }

    .mobile-menu-divider {
      height: 1px;
      background: var(--border);
      margin: 8px 28px;
    }

    .detail-page {
      padding: 112px 48px 72px;
      background: var(--light-bg);
      min-height: 100vh;
    }

    .article-detail-wrap {
      max-width: 980px;
      margin: 0 auto;
    }

    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 28px;
      font-size: 0.82rem;
      color: var(--muted);
    }

    .breadcrumb a {
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }

    .breadcrumb a:hover {
      color: var(--purple);
    }

    .detail-card {
      background: var(--white);
      border: 1px solid rgba(232, 227, 220, 0.85);
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 16px 50px rgba(0,0,0,0.045);
    }

    .detail-hero-img {
      width: 100%;
      aspect-ratio: 16 / 8;
      object-fit: cover;
      display: block;
      background: #ddd;
    }

    .detail-content {
      padding: 48px;
    }

    .article-tag {
      display: inline-block;
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 0.12em;
      color: var(--purple);
      text-transform: uppercase;
      margin-bottom: 16px;
    }

    .detail-content h1 {
      max-width: 760px;
      font-size: clamp(2.1rem, 5vw, 3.5rem);
      line-height: 1.12;
      font-weight: 800;
      letter-spacing: -0.05em;
      margin-bottom: 18px;
    }

    .article-subtitle {
      max-width: 720px;
      font-size: 1.02rem;
      line-height: 1.75;
      color: var(--muted);
      margin-bottom: 24px;
    }

    .article-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      align-items: center;
      margin-bottom: 40px;
      font-size: 0.83rem;
      color: var(--muted);
    }

    .article-meta span {
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .article-meta span:not(:last-child)::after {
      content: '';
      width: 4px;
      height: 4px;
      border-radius: 50%;
      background: #c9c2ba;
      margin-left: 2px;
    }

    .article-body-detail {
      max-width: 760px;
    }

    .article-body-detail p {
      font-size: 1rem;
      line-height: 1.9;
      color: #3e3e3e;
      margin-bottom: 22px;
    }

    .article-body-detail h2 {
      font-size: 1.45rem;
      line-height: 1.35;
      font-weight: 800;
      letter-spacing: -0.03em;
      margin: 42px 0 14px;
    }

    .highlight-box {
      max-width: 760px;
      margin: 38px 0;
      padding: 28px;
      border-radius: 20px;
      background: #f3f0ff;
      border: 1px solid rgba(91,63,217,0.12);
    }

    .highlight-box h3 {
      font-size: 1.1rem;
      margin-bottom: 10px;
      color: var(--purple);
    }

    .highlight-box p {
      margin-bottom: 0;
      color: #4e4e4e;
    }

    .related-product {
      max-width: 760px;
      margin-top: 44px;
      padding: 24px;
      border-radius: 22px;
      background: var(--light-bg);
      border: 1px solid var(--border);
      display: grid;
      grid-template-columns: 120px 1fr auto;
      gap: 20px;
      align-items: center;
    }

    .related-product img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 16px;
      background: #ddd;
    }

    .related-product h3 {
      font-size: 1rem;
      margin-bottom: 6px;
    }

    .related-product p {
      margin: 0 0 8px;
      font-size: 0.82rem;
      line-height: 1.55;
      color: var(--muted);
    }

    .related-product .price {
      font-size: 0.95rem;
      font-weight: 800;
      color: var(--purple);
    }

    .btn-secondary {
      display: inline-block;
      padding: 12px 22px;
      border-radius: 50px;
      background: var(--purple);
      color: var(--white);
      text-decoration: none;
      font-size: 0.84rem;
      font-weight: 700;
      transition: background 0.25s, transform 0.2s, box-shadow 0.25s;
      box-shadow: 0 8px 24px rgba(91,63,217,0.22);
      white-space: nowrap;
    }

    .btn-secondary:hover {
      background: var(--purple-dark);
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(91,63,217,0.28);
    }

    .back-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 40px;
      color: var(--purple);
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 700;
    }

    .back-link:hover {
      text-decoration: underline;
    }

    footer {
      padding: 56px 48px 36px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 48px;
      border-top: 1px solid var(--border);
      background: var(--white);
    }

    .footer-brand p {
      font-size: 0.82rem;
      color: var(--muted);
      margin-top: 10px;
      line-height: 1.6;
      max-width: 260px;
    }

    .footer-brand .brand-name {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--purple);
    }

    .footer-links {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 10px;
    }

    .footer-links a {
      font-size: 0.82rem;
      color: var(--muted);
      text-decoration: none;
      transition: color 0.2s;
    }

    .footer-links a:hover { color: var(--purple); }

    .footer-bottom {
      grid-column: 1 / -1;
      border-top: 1px solid var(--border);
      padding-top: 24px;
      font-size: 0.75rem;
      color: #aaa;
      text-align: center;
    }

    @media (max-width: 900px) {
      nav { padding: 0 24px; }

      .nav-links { display: none; }
      .hamburger { display: flex; }
      .mobile-menu { display: flex; }

      .detail-page {
        padding: 96px 24px 56px;
      }

      .detail-content {
        padding: 36px;
      }

      .related-product {
        grid-template-columns: 96px 1fr;
      }

      .related-product img {
        width: 96px;
        height: 96px;
      }

      .related-product .btn-secondary {
        grid-column: 1 / -1;
        text-align: center;
      }

      footer {
        grid-template-columns: 1fr;
        padding-left: 24px;
        padding-right: 24px;
      }

      .footer-links { align-items: flex-start; }
    }

    @media (max-width: 580px) {
      nav { padding: 0 20px; }

      .detail-page {
        padding: 88px 20px 44px;
      }

      .breadcrumb {
        margin-bottom: 18px;
      }

      .detail-card {
        border-radius: 20px;
      }

      .detail-hero-img {
        aspect-ratio: 4 / 3;
      }

      .detail-content {
        padding: 26px 22px;
      }

      .article-subtitle {
        font-size: 0.94rem;
      }

      .article-body-detail p {
        font-size: 0.94rem;
      }

      .highlight-box {
        padding: 22px;
      }

      .related-product {
        grid-template-columns: 1fr;
      }

      .related-product img {
        width: 100%;
        height: auto;
        aspect-ratio: 4 / 3;
      }

      footer { padding: 36px 20px 24px; }
    }
  </style>
</head>

<body>

<!-- NAV -->
<nav>
  <a class="nav-brand" href="{{ route('home') }}">Lokana</a>

  <ul class="nav-links">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('produk') }}">Produk Lokal</a></li>
    <li><a href="{{ route('event') }}">Event &amp; Tiket</a></li>
    <li><a href="{{ route('artikel') }}" class="active">Artikel Lokal</a></li>
  </ul>

  <div class="nav-actions">
    <a href="{{ route('keranjang') }}" aria-label="Keranjang">
      <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
    </a>

    <a href="#" aria-label="Akun">
      <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
    </a>

    <button class="hamburger" id="hamburger" aria-label="Buka menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</nav>

<!-- MOBILE DRAWER -->
<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('home') }}">Home</a>
  <a href="{{ route('produk') }}">Produk Lokal</a>
  <a href="{{ route('event') }}">Event &amp; Tiket</a>
  <a href="{{ route('artikel') }}" class="active">Artikel Lokal</a>

  <div class="mobile-menu-divider"></div>

  <a href="{{ route('keranjang') }}">Keranjang</a>
  <a href="#">Akun Saya</a>
</div>

<!-- DETAIL ARTIKEL -->
<main class="detail-page">
  <div class="article-detail-wrap">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Home</a>
      <span>/</span>
      <a href="{{ route('artikel') }}">Artikel Lokal</a>
      <span>/</span>
      <span>Endek Bali</span>
    </div>

    <article class="detail-card">
      <img 
        class="detail-hero-img"
        src="https://i.pinimg.com/1200x/71/64/04/716404ae798ba8c4f8b98762a31b97ca.jpg"
        alt="Kain Endek Bali"
      >

      <div class="detail-content">
        <div class="article-tag">Budaya</div>

        <h1>Endek Bali dalam Gaya Hidup Modern</h1>

        <p class="article-subtitle">
          Kain Endek bukan hanya produk tekstil tradisional. Di tangan pengrajin dan pelaku kreatif Bali, Endek terus bergerak menjadi bagian dari fashion, dekorasi, dan produk lifestyle yang relevan untuk pasar hari ini.
        </p>

        <div class="article-meta">
          <span>Jurnal Lokana</span>
          <span>5 Juni 2026</span>
          <span>4 menit baca</span>
        </div>

        <div class="article-body-detail">
          <p>
            Ada alasan kenapa Endek Bali tetap bertahan di tengah banyaknya produk tekstil modern. Kain ini punya karakter yang kuat: motifnya khas, warnanya berani, dan proses pembuatannya membawa sentuhan manusia yang sulit digantikan oleh produksi massal.
          </p>

          <p>
            Bagi banyak pengrajin, Endek bukan sekadar kain yang selesai setelah ditenun. Ia adalah cara untuk menjaga identitas lokal tetap terlihat dalam kehidupan sehari-hari. Karena itu, Endek kini mulai hadir dalam bentuk yang lebih dekat dengan kebutuhan pasar: scarf, outer, tas, pouch, hingga elemen dekorasi rumah.
          </p>

          <h2>Produk Lokal yang Tidak Berhenti di Tradisi</h2>

          <p>
            Salah satu hal yang membuat Endek menarik adalah kemampuannya untuk beradaptasi. Motif tradisional tetap dipertahankan, tetapi penggunaannya dibuat lebih fleksibel. Hasilnya, Endek tidak lagi terasa jauh atau hanya dipakai pada momen tertentu, melainkan bisa masuk ke gaya berpakaian dan ruang hidup yang lebih modern.
          </p>

          <p>
            Untuk pembeli, nilai Endek tidak hanya berada pada tampilan visualnya. Ada cerita tentang proses, ketelitian, dan waktu yang dibutuhkan untuk menghasilkan satu produk. Inilah yang membuat produk berbasis Endek terasa lebih personal dibandingkan barang yang diproduksi secara seragam.
          </p>

          <div class="highlight-box">
            <h3>Kenapa Endek Layak Masuk Kurasi Lokana?</h3>
            <p>
              Karena Endek punya kombinasi yang kuat: identitas budaya, nilai craftsmanship, dan potensi produk yang relevan untuk konsumen modern. Ia bisa menjadi oleh-oleh, koleksi pribadi, sekaligus bentuk dukungan terhadap pengrajin lokal.
            </p>
          </div>

          <h2>Dari Pengrajin ke Pembeli yang Lebih Luas</h2>

          <p>
            Tantangan terbesar produk lokal sering kali bukan kualitas, tetapi akses. Banyak pengrajin memiliki produk yang kuat, namun belum selalu mudah ditemukan oleh pembeli di luar daerah. Marketplace seperti Lokana hadir untuk memperpendek jarak itu.
          </p>

          <p>
            Dengan tampilan produk yang lebih rapi, informasi yang jelas, dan cerita yang disampaikan dengan tepat, Endek dapat dikenalkan bukan hanya sebagai kain khas Bali, tetapi sebagai produk lokal bernilai yang layak bersaing di pasar digital.
          </p>

          <div class="related-product">
            <img 
              src="https://i.pinimg.com/736x/a9/21/78/a921780c8edefc5cb5741a3cbbfc46c0.jpg" 
              alt="Scarf Endek Bali Handmade"
            >

            <div>
              <h3>Scarf Endek Bali Handmade</h3>
              <p>Dibuat dari kain Endek pilihan dengan motif yang clean minimalis, cocok melengkapi tampilan kasual maupun semi formal.</p>
              <div class="price">Rp 250.000</div>
            </div>

            <a href="{{ route('produk') }}" class="btn-secondary">Lihat Produk</a>
          </div>

          <a href="{{ route('artikel') }}" class="back-link">← Kembali ke Jurnal</a>
        </div>
      </div>
    </article>
  </div>
</main>

<!-- FOOTER -->
<footer>
  <div class="footer-brand">
    <div class="brand-name">Lokana</div>
    <p>Marketplace produk lokal Bali — dari tangan pengrajin langsung ke tanganmu.</p>
  </div>

  <div class="footer-links">
    <a href="#">Tentang Kami</a>
    <a href="#">Kebijakan Privasi</a>
    <a href="#">Kontak</a>
    <a href="#">Info Pengiriman</a>
  </div>

  <div class="footer-bottom">
    © 2026 Lokana
  </div>
</footer>

<script>
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');

  hamburger.addEventListener('click', () => {
    const isOpen = mobileMenu.classList.toggle('open');
    hamburger.classList.toggle('open', isOpen);
    hamburger.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
    document.body.style.overflow = isOpen ? 'hidden' : '';
  });

  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
      hamburger.classList.remove('open');
      document.body.style.overflow = '';
    });
  });

  document.addEventListener('click', (e) => {
    if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
      mobileMenu.classList.remove('open');
      hamburger.classList.remove('open');
      document.body.style.overflow = '';
    }
  });
</script>

</body>
</html>