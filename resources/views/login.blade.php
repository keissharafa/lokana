<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Lokana</title>

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --purple: #5B3FD9;
      --purple-dark: #4730B3;
      --text: #1a1a1a;
      --muted: #666;
      --light-bg: #f9f7f4;
      --white: #fff;
      --border: #e8e3dc;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      min-height: 100vh;
      background: var(--light-bg);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
      color: var(--text);
    }

    .login-card {
      width: 100%;
      max-width: 430px;
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 28px;
      padding: 36px;
      box-shadow: 0 20px 70px rgba(0,0,0,0.08);
    }

    .brand {
      font-size: 1.3rem;
      font-weight: 800;
      color: var(--purple);
      margin-bottom: 28px;
    }

    h1 {
      font-size: 2rem;
      letter-spacing: -0.04em;
      margin-bottom: 10px;
    }

    p {
      color: var(--muted);
      font-size: 0.92rem;
      line-height: 1.6;
      margin-bottom: 28px;
    }

    .form-group {
      margin-bottom: 16px;
    }

    label {
      display: block;
      font-size: 0.82rem;
      font-weight: 700;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      height: 46px;
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 0 14px;
      font-family: inherit;
      outline: none;
    }

    input:focus {
      border-color: var(--purple);
    }

    .btn-login {
      width: 100%;
      height: 48px;
      margin-top: 10px;
      border: none;
      border-radius: 999px;
      background: var(--purple);
      color: var(--white);
      font-weight: 800;
      font-family: inherit;
      cursor: pointer;
      box-shadow: 0 12px 30px rgba(91,63,217,0.28);
    }

    .btn-login:hover {
      background: var(--purple-dark);
    }

    .hint {
      margin-top: 20px;
      padding: 14px;
      border-radius: 14px;
      background: #f3f0ff;
      font-size: 0.82rem;
      color: var(--muted);
      line-height: 1.6;
    }

    .error {
      background: #ffecec;
      color: #c0392b;
      padding: 12px;
      border-radius: 12px;
      font-size: 0.85rem;
      margin-bottom: 16px;
    }

    .back-link {
      display: inline-block;
      margin-top: 18px;
      color: var(--purple);
      text-decoration: none;
      font-size: 0.86rem;
      font-weight: 700;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="brand">Lokana</div>

    <h1>Masuk ke Akun</h1>
    <p>Login dulu untuk lanjut membuka keranjang dan menyelesaikan pesananmu.</p>

    @if(session('error'))
      <div class="error">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
      @csrf

      <input type="hidden" name="redirect" value="{{ $redirect }}">

      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" placeholder="Masukkan username" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>
      </div>

      <button type="submit" class="btn-login">Login</button>
    </form>

    <a href="{{ route('home') }}" class="back-link">← Kembali ke Home</a>
  </div>

</body>
</html>