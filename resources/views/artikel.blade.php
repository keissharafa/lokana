<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Jurnal Lokana</title>

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

    .jurnal {
      padding: 128px 48px 72px;
      background: var(--light-bg);
      min-height: 100vh;
    }

    .jurnal-header {
      text-align: center;
      margin-bottom: 34px;
    }

    .jurnal-header h2 {
      font-size: clamp(2rem, 4vw, 3.2rem);
      font-weight: 800;
      margin-bottom: 14px;
      letter-spacing: -0.04em;
    }

    .jurnal-header p {
      font-size: 0.95rem;
      color: var(--muted);
      max-width: 560px;
      margin: 0 auto;
      line-height: 1.7;
    }

    .categories {
      max-width: 1100px;
      margin: 0 auto 44px;
      display: flex;
      justify-content: center;
      gap: 12px;
      flex-wrap: wrap;
    }

    .pill {
      display: inline-block;
      padding: 9px 20px;
      border: 1px solid var(--border);
      border-radius: 50px;
      font-size: 0.82rem;
      font-weight: 500;
      color: var(--muted);
      cursor: pointer;
      text-decoration: none;
      transition: all 0.2s;
      background: var(--white);
    }

    .pill:hover,
    .pill.active {
      border-color: var(--purple);
      color: var(--purple);
      background: #f3f0ff;
    }

    .article-grid {
      max-width: 1120px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 28px;
    }

    .article-card {
      background: var(--white);
      border-radius: 18px;
      overflow: hidden;
      transition: box-shadow 0.25s, transform 0.25s;
      cursor: pointer;
      border: 1px solid rgba(232, 227, 220, 0.75);
    }

    .article-card:hover {
      box-shadow: 0 12px 40px rgba(0,0,0,0.09);
      transform: translateY(-4px);
    }

    .article-img {
      width: 100%;
      aspect-ratio: 4/3;
      object-fit: cover;
      display: block;
      background: #ddd;
    }

    .article-body {
      padding: 20px;
    }

    .article-tag {
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.12em;
      color: var(--purple);
      text-transform: uppercase;
      margin-bottom: 10px;
    }

    .article-body h3 {
      font-size: 1.05rem;
      font-weight: 700;
      margin-bottom: 9px;
      line-height: 1.35;
      letter-spacing: -0.01em;
    }

    .article-body p {
      font-size: 0.82rem;
      color: var(--muted);
      line-height: 1.6;
      margin-bottom: 18px;
    }

    .read-more {
      font-size: 0.78rem;
      font-weight: 700;
      color: var(--text);
      text-decoration: none;
      letter-spacing: 0.04em;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .read-more::after {
      content: '→';
      transition: transform 0.2s;
    }

    .read-more:hover::after { transform: translateX(4px); }

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

      .jurnal { padding: 112px 24px 56px; }
      .article-grid { grid-template-columns: repeat(2, 1fr); }
      footer {
        grid-template-columns: 1fr;
        padding-left: 24px;
        padding-right: 24px;
      }
      .footer-links { align-items: flex-start; }
    }

    @media (max-width: 580px) {
      nav { padding: 0 20px; }

      .jurnal { padding: 96px 20px 44px; }

      .jurnal-header {
        text-align: left;
        margin-bottom: 28px;
      }

      .jurnal-header h2 {
        font-size: 2rem;
      }

      .jurnal-header p {
        margin: 0;
      }

      .categories {
        justify-content: flex-start;
        flex-wrap: nowrap;
        overflow-x: auto;
        margin-bottom: 28px;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
      }

      .categories::-webkit-scrollbar { display: none; }

      .pill { flex-shrink: 0; }

      .article-grid {
        grid-template-columns: 1fr;
        gap: 14px;
      }

      .article-card {
        display: flex;
        flex-direction: row;
      }

      .article-img {
        width: 110px;
        min-width: 110px;
        aspect-ratio: 1/1;
      }

      .article-body {
        padding: 12px 14px;
      }

      .article-body p {
        display: none;
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

<!-- ARTIKEL PAGE -->
<section class="jurnal">
  <div class="jurnal-header">
    <h2>Jurnal Lokana</h2>
    <p>
      Insight, cerita produk, dan sudut pandang lokal tentang UMKM, budaya, dan gaya hidup Bali masa kini.
    </p>
  </div>

  <div class="categories">
    <a href="#" class="pill active">Semua Artikel</a>
    <a href="#" class="pill">Budaya</a>
    <a href="#" class="pill">Kuliner</a>
    <a href="#" class="pill">UMKM</a>
    <a href="#" class="pill">Lifestyle</a>
    <a href="#" class="pill">Cerita Produk</a>
  </div>

  <div class="article-grid">

    <div class="article-card">
      <img 
        class="article-img" 
        src="https://i.pinimg.com/1200x/71/64/04/716404ae798ba8c4f8b98762a31b97ca.jpg" 
        alt="Kain Endek Bali"
      />

      <div class="article-body">
        <div class="article-tag">Budaya</div>
        <h3>Endek Bali dalam Gaya Hidup Modern</h3>
        <p>
          Kain Endek tidak hanya hadir sebagai warisan budaya, tetapi juga berkembang menjadi bagian dari fashion, desain, dan produk lokal Bali hari ini.
        </p>
        <a href="{{ route('artikel.endek') }}" class="read-more">Baca Selengkapnya</a>
      </div>
    </div>

    <div class="article-card">
      <img 
        class="article-img" 
        src="https://i.pinimg.com/1200x/fb/bd/51/fbbd512d4d47f937e8a40f877aff92e4.jpg" 
        alt="Pengrajin Anyaman Bali"
      />

      <div class="article-body">
        <div class="article-tag">Pengrajin Lokal</div>
        <h3>Di Balik Produk Anyaman Bali</h3>
        <p>
          Dari pemilihan material hingga proses pengerjaan manual, produk anyaman Bali menunjukkan bagaimana detail kecil bisa membentuk nilai sebuah karya.
        </p>
        <a href="{{ route('artikel.anyaman') }}" class="read-more">Baca Selengkapnya</a>
      </div>
    </div>

    <div class="article-card">
      <img 
        class="article-img" 
        src="https://i.pinimg.com/736x/0b/42/7b/0b427b1e0a03fbf8724ab701497a1729.jpg" 
        alt="Kuliner Bali"
      />

      <div class="article-body">
        <div class="article-tag">Kuliner</div>
        <h3>Rasa Lokal Bali dalam Satu Sajian</h3>
        <p>
          Dari sambal matah, sate lilit, sampai lawar khas Bali, setiap sajian membawa rasa yang dekat dengan rumah makan lokal dan dapur keluarga.
        </p>
        <a href="{{ route('artikel.kuliner_bali') }}" class="read-more">Baca Selengkapnya</a>
      </div>
    </div>

    <div class="article-card">
      <img 
        class="article-img" 
        src="https://i.pinimg.com/736x/a9/cc/f6/a9ccf60c566a1bda2588b344ad5cd680.jpg" 
        alt="Kopi Kintamani"
      />

      <div class="article-body">
        <div class="article-tag">Cerita Produk</div>
        <h3>Kopi Kintamani dan Nilai di Balik Asalnya</h3>
        <p>
          Lebih dari sekadar komoditas, kopi Kintamani membawa identitas wilayah, proses tanam, dan karakter rasa yang membuatnya dikenal luas.
        </p>
        <a href="{{ route('artikel.kintamani') }}" class="read-more">Baca Selengkapnya</a>
      </div>
    </div>

    <div class="article-card">
      <img 
        class="article-img" 
        src="https://i.pinimg.com/736x/fe/66/70/fe667071d2d5c77d3c7acca6cbfc0dda.jpg" 
        alt="Produk Spa Bali"
      />

      <div class="article-body">
        <div class="article-tag">Lifestyle</div>
        <h3>Aromaterapi Bali sebagai Produk Lifestyle</h3>
        <p>
          Produk spa dan aromaterapi Bali berkembang karena menggabungkan bahan natural, pengalaman relaksasi, dan citra tropis yang kuat.
        </p>
        <a href="{{ route('artikel.aromaterapi') }}" class="read-more">Baca Selengkapnya</a>
      </div>
    </div>

    <div class="article-card">
      <img 
        class="article-img" 
        src="https://i.pinimg.com/736x/c9/4d/73/c94d73c341a1bf089cbfbba17e3a6067.jpg" 
        alt="UMKM Bali"
      />

      <div class="article-body">
        <div class="article-tag">UMKM</div>
        <h3>UMKM Bali dan Peluang Pasar Digital</h3>
        <p>
          Digitalisasi membuka ruang baru bagi produk lokal Bali untuk ditemukan lebih luas, tanpa menghilangkan karakter dan kualitas produksinya.
        </p>
        <a href="{{ route('artikel.umkm') }}" class="read-more">Baca Selengkapnya</a>
      </div>
    </div>

  </div>
</section>

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