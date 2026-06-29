<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/produk', function () {
    return view('katalog');
})->name('produk');


// DETAIL PRODUK
Route::get('/produk/scarf-endek', function () {
    return view('detail_produk.scarf_endek');
})->name('produk.scarf_endek');

Route::get('/produk/kintamani-coffee', function () {
    return view('detail_produk.kintamani_coffee');
})->name('produk.kintamani_coffee');

Route::get('/produk/essential-oil', function () {
    return view('detail_produk.essential_oil');
})->name('produk.essential_oil');

Route::get('/produk/beach-jewelry', function () {
    return view('detail_produk.beach_jewelry');
})->name('produk.beach_jewelry');

Route::get('/produk/kayu-bowls', function () {
    return view('detail_produk.kayu_bowls');
})->name('produk.kayu_bowls');

Route::get('/produk/beaded-basket', function () {
    return view('detail_produk.beaded_basket');
})->name('produk.beaded_basket');


// LOGIN ROLE-BASED HARDCODE
Route::get('/login', function (Request $request) {
    if (session('admin_logged_in')) {
        return redirect()->route('admin.dashboard');
    }

    if (session('is_logged_in')) {
        return redirect()->route('keranjang');
    }

    return view('login', [
        'redirect' => $request->query('redirect', route('keranjang'))
    ]);
})->name('login');

Route::post('/login', function (Request $request) {
    $username = $request->username;
    $password = $request->password;

    // Login sebagai user/customer
    if ($username === 'user' && $password === '12345') {
        session([
            'is_logged_in' => true,
            'user_name' => 'User Lokana',
            'role' => 'user'
        ]);

        return redirect($request->redirect ?? route('keranjang'));
    }

    // Login sebagai admin
    if ($username === 'admin' && $password === '12345') {
        session([
            'admin_logged_in' => true,
            'admin_name' => 'Admin Lokana',
            'role' => 'admin'
        ]);

        return redirect()->route('admin.dashboard');
    }

    return back()->with('error', 'Username atau password salah.');
})->name('login.process');

Route::get('/logout', function () {
    session()->forget([
        'is_logged_in',
        'user_name',
        'admin_logged_in',
        'admin_name',
        'role'
    ]);

    return redirect()->route('home');
})->name('logout');


// USER FLOW: KERANJANG → CHECKOUT → PEMBAYARAN → SUCCESS → HISTORY
Route::get('/keranjang', function () {
    if (!session('is_logged_in')) {
        return redirect()->route('login', [
            'redirect' => route('keranjang')
        ]);
    }

    return view('keranjang');
})->name('keranjang');

Route::get('/checkout', function () {
    if (!session('is_logged_in')) {
        return redirect()->route('login', [
            'redirect' => route('checkout')
        ]);
    }

    return view('checkout');
})->name('checkout');

Route::get('/pembayaran', function () {
    if (!session('is_logged_in')) {
        return redirect()->route('login', [
            'redirect' => route('pembayaran')
        ]);
    }

    return view('pembayaran');
})->name('pembayaran');

Route::get('/payment-success', function () {
    if (!session('is_logged_in')) {
        return redirect()->route('login', [
            'redirect' => route('payment.success')
        ]);
    }

    return view('payment_success');
})->name('payment.success');

Route::get('/history', function () {
    if (!session('is_logged_in')) {
        return redirect()->route('login', [
            'redirect' => route('history')
        ]);
    }

    return view('history');
})->name('history');


// ARTIKEL
Route::get('/artikel', function () {
    return view('artikel');
})->name('artikel');

Route::get('/artikel/endek-bali', function () {
    return view('detail_artikel.endek');
})->name('artikel.endek');

Route::get('/artikel/anyaman-bali', function () {
    return view('detail_artikel.anyaman');
})->name('artikel.anyaman');

Route::get('/artikel/kuliner-bali', function () {
    return view('detail_artikel.kuliner_bali');
})->name('artikel.kuliner_bali');

Route::get('/artikel/kopi-kintamani', function () {
    return view('detail_artikel.kintamani');
})->name('artikel.kintamani');

Route::get('/artikel/aromaterapi-bali', function () {
    return view('detail_artikel.aromaterapi');
})->name('artikel.aromaterapi');

Route::get('/artikel/umkm-bali', function () {
    return view('detail_artikel.umkm');
})->name('artikel.umkm');


// EVENT
Route::get('/event', function () {
    return view('event_tiket');
})->name('event');

Route::get('/event/pesta-kesenian-bali', function () {
    return view('detail_tiket.tiket_pesta_kesenian_bali');
})->name('event.tiket_pesta_kesenian_bali');

Route::get('/event/tiket-b', function () {
    return view('detail_tiket.tiket_b');
})->name('event.tiket_b');

Route::get('/event/tiket-c', function () {
    return view('detail_tiket.tiket_c');
})->name('event.tiket_c');

Route::get('/event/tiket-d', function () {
    return view('detail_tiket.tiket_d');
})->name('event.tiket_d');

Route::get('/event/tiket-e', function () {
    return view('detail_tiket.tiket_e');
})->name('event.tiket_e');

Route::get('/event/tiket-f', function () {
    return view('detail_tiket.tiket_f');
})->name('event.tiket_f');

// ADMIN LOGIN REDIRECT
Route::get('/admin/login', function () {
    return redirect()->route('login');
})->name('admin.login');

Route::get('/admin/logout', function () {
    session()->forget([
        'is_logged_in',
        'user_name',
        'admin_logged_in',
        'admin_name',
        'role'
    ]);

    return redirect()->route('home');
})->name('admin.logout');


// ADMIN AREA
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('login');
        }

        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/kelola-produk', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('login');
        }

        return view('admin.kelola_produk');
    })->name('produk');

    Route::get('/kelola-artikel', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('login');
        }

        return view('admin.kelola_artikel');
    })->name('artikel');

    Route::get('/kelola-pengguna', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('login');
        }

        return view('admin.kelola_pengguna');
    })->name('pengguna');

    Route::get('/kelola-transaksi', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('login');
        }

        return view('admin.kelola_transaksi');
    })->name('transaksi');
});
