<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/orders', function () {
    return view('orders');
})->name('orders');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {       
//     return view('auth.register');
// })->name('register');

Route::get('/login', function () {
    return view('auths.login');
})->name('login');

Route::get('/datalogin', function () {
    return view('auths.datalogin');
})->name('datalogin');

Route::get('/verif', function () {
    return view('auths.verif');
})->name('verif');

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Users CRUD Routes
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users.index');

    Route::get('/users/create', function () {
        return view('admin.users.create');
    })->name('users.create');

    Route::put('/users/{id}', function ($id) {
        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui');
    })->name('users.update');

    Route::get('/users/{id}/edit', function ($id) {
        $user = (object)[
            'id' => $id,
            'name' => 'User ' . $id,
            'email' => 'user@example.com',
            'phone' => '0812345678',
            'gender' => 'male',
            'status' => 'active',
            'photo' => null
        ];
        return view('admin.users.edit', compact('user', 'id'));
    })->name('users.edit');

    Route::get('/users/{id}/show', function ($id) {
        return view('admin.users.show', ['id' => $id]);
    })->name('users.show');

    Route::delete('/users/{id}', function ($id) {
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    })->name('users.destroy');

    // siswa CRUD routes
    Route::get('/siswa', function () {
        return view('admin.siswa.index');
    })->name('siswa.index');

    Route::get('/siswa/create', function () {
        return view('admin.siswa.create');
    })->name('siswa.create');

    Route::get('/siswa/{id}/edit', function ($id) {
        $user = (object)[
            'id' => $id,
            'nama' => 'Ahmad Budiman', 
            'nis' => '222310101',
            'kelas' => '10',
            'jurusan' => 'RPL',
            'gender' => 'L' 
        ];
        return view('admin.siswa.edit', compact('user', 'id'));
    })->name('siswa.edit');

    Route::put('/siswa/{id}', function ($id) {
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    })->name('siswa.update');

    Route::get('/siswa/{id}/show', function ($id) {
        return view('admin.siswa.show', ['id' => $id]);
    })->name('siswa.show');

    Route::delete('/siswa/{id}', function ($id) {
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus');
    })->name('siswa.destroy');
    
    // Products CRUD Routes
    Route::get('/products', function () {
        return view('admin.products.index');
    })->name('products.index');
    
    Route::get('/products/create', function () {
        return view('admin.products.create');
    })->name('products.create');
    
    Route::get('/products/{id}/edit', function ($id) {
        return view('admin.products.edit', ['id' => $id]);
    })->name('products.edit');
    
    Route::get('/products/{id}', function ($id) {
        return view('admin.products.show', ['id' => $id]);
    })->name('products.show');
    
    // Orders Management
    Route::get('/orders', function () {
        return view('admin.orders.index');
    })->name('orders.index');
    
    // Reports
    Route::get('/reports', function () {
        return view('admin.reports.index');
    })->name('reports.index');
    
    // Settings & Profile
    Route::get('/settings', function () {
        return view('admin.settings.index');
    })->name('settings.index');
    
    Route::get('/settings/profile', function () {
        return view('admin.settings.profile');
    })->name('settings.profile');
    
    Route::get('/settings/account', function () {
        return view('admin.settings.account');
    })->name('settings.account');
    
    Route::get('/settings/security', function () {
        return view('admin.settings.security');
    })->name('settings.security');
    
    Route::get('/settings/notifications', function () {
        return view('admin.settings.notifications');
    })->name('settings.notifications');
    
    Route::get('/settings/restaurant', function () {
        return view('admin.settings.restaurant');
    })->name('settings.restaurant');
    
    // Example delete routes (for demo)
    Route::get('/users/{id}/delete', function ($id) {
        return redirect('/admin/users')->with('success', 'User berhasil dihapus');
    })->name('users.delete');
    
    Route::get('/products/{id}/delete', function ($id) {
        return redirect('/admin/products')->with('success', 'Produk berhasil dihapus');
    })->name('products.delete');
});

// ==================== PEMBELI ROUTES ====================
Route::prefix('pembeli')->name('pembeli.')->group(function () {
    Route::get('/profile', function () {
        return view('pembeli.profile.index');
    })->name('profile');
    
    Route::get('/profile/edit', function () {
        return view('pembeli.profile.edit');
    })->name('profile.edit');
    
    // Tambahkan route untuk settings
    Route::get('/settings', function () {
        return view('pembeli.settings.index');
    })->name('settings.index');
    
    Route::get('/settings/profile', function () {
        return view('pembeli.settings.profile');
    })->name('settings.profile');
    
    Route::get('/settings/account', function () {
        return view('pembeli.settings.account');
    })->name('settings.account');
    
    Route::get('/settings/security', function () {
        return view('pembeli.settings.security');
    })->name('settings.security');
    
    Route::get('/settings/notifications', function () {
        return view('pembeli.settings.notifications');
    })->name('settings.notifications');
    
    Route::get('/landing', function () {
        return view('pembeli.landing');
    })->name('landing');
});

// ==================== PUBLIC ROUTES ====================
Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/payment', function () {
    return view('payment.index');
})->name('payment');

Route::post('/donepay', function () {
    return view('payment.donepay');
})->name('donepay');

Route::get('/order-history', function () {
    return view('orders');
})->name('orders');

Route::get('/products', function () {
    return view('products');
})->name('products.public');

Route::get('/settings', function () {
    return view('pembeli.settings.index');
})->name('settings');

// ==================== KASIR ====================
Route::get('/table', function () {
    return view('kasir.table');
})->name('table');

Route::get('/tansaksi', function () {
    return view('kasir.transaksi');
})->name('transaksi');

Route::get('/detail', function () {
    return view('kasir.detail');
})->name('detail');

Route::get('/form', function () {
    return view('kasir.form');
})->name('form');

// ==================== LAYOUT DEMO ====================
Route::get('/dashboard', function () {
    return view('layouts.app');
})->name('layout.demo');

// ==================== FALLBACK ROUTE ====================
Route::fallback(function () {
    return redirect('/');
});