<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute Publik
$routes->get('/', 'Home::index');

// Rute Autentikasi (Untuk Login, Logout, dll.)
$routes->get('/login', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout'); // <-- Baris ini sudah diperbaiki
$routes->post('/forgot-password', 'AuthController::forgotPassword');

// Rute yang Dilindungi (Membutuhkan Login)
// Filter 'auth' akan berjalan sebelum mengakses controller ini.
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/lapor', 'LaporController::index', ['filter' => 'auth']);
$routes->post('/lapor/store', 'LaporController::store', ['filter' => 'auth']);
$routes->get('/laporan/status', 'LaporController::status', ['filter' => 'auth']); //
$routes->get('/laporan/riwayat', 'LaporController::riwayat', ['filter' => 'auth']); // <-- TAMBAHKAN INI
$routes->get('/laporan/detail/(:num)', 'LaporController::detail/$1', ['filter' => 'auth']); // <-- TAMBAHKAN INI

// --- TAMBAHKAN RUTE PROFIL DI SINI ---
$routes->get('/profile', 'ProfileController::index', ['filter' => 'auth']);
$routes->post('/profile/update', 'ProfileController::update', ['filter' => 'auth']);
// ------------------------------------

// Rute Admin Login
$routes->get('/admin/login', 'AuthController::adminLogin');

// Rute Admin (Membutuhkan Login dan Role Admin)
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('pengguna', 'AdminController::pengguna');
    $routes->get('pengguna/create', 'AdminController::penggunaCreate');
    $routes->post('pengguna/store', 'AdminController::penggunaStore');
    $routes->get('laporan', 'AdminController::laporan');
    $routes->get('laporan/create', 'AdminController::laporanCreate');
    $routes->post('laporan/store', 'AdminController::laporanStore');
    $routes->get('statistik', 'AdminController::statistik');
    $routes->get('laporan/kategori', 'AdminController::laporanKategori');
    $routes->get('pengaturan', 'AdminController::pengaturan');
    $routes->get('aktivitas', 'AdminController::aktivitas');
});