<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LaporanModel;

class AdminController extends BaseController
{
    protected $userModel;
    protected $laporanModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->laporanModel = new LaporanModel();
    }

    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'user' => [
                'nama' => session('nama'),
                'npm'  => session('npm'),
                'role' => session('role')
            ],
            'stats' => $this->laporanModel->getStatistik(),
            'totalUsers' => count($this->userModel->findAll()),
            'totalReports' => count($this->laporanModel->findAll()),
        ];

        return view('admin/dashboard', $data);
    }

    /**
     * Manajemen Pengguna
     */
    public function pengguna()
    {
        $data = [
            'title' => 'Manajemen Pengguna',
            'users' => $this->userModel->findAll(),
            'user' => [
                'nama' => session('nama'),
                'role' => session('role')
            ]
        ];

        return view('admin/pengguna/index', $data);
    }

    /**
     * Form Tambah Pengguna
     */
    public function penggunaCreate()
    {
        $data = [
            'title' => 'Tambah Pengguna Baru',
            'user' => [
                'nama' => session('nama'),
                'role' => session('role')
            ]
        ];

        return view('admin/pengguna/create', $data);
    }

    /**
     * Store Pengguna Baru
     */
    public function penggunaStore()
    {
        $rules = [
            'npm' => 'required|is_unique[users.npm]',
            'nama' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role' => 'required|in_list[user,admin]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'npm' => $this->request->getPost('npm'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
            'img' => 'default.png'
        ];

        $this->userModel->save($data);

        return redirect()->to('/admin/pengguna')->with('success', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Manajemen Laporan
     */
    public function laporan()
    {
        $data = [
            'title' => 'Manajemen Laporan',
            'laporan' => $this->laporanModel->findAll(),
            'user' => [
                'nama' => session('nama'),
                'role' => session('role')
            ]
        ];

        return view('admin/laporan/index', $data);
    }

    /**
     * Form Tambah Laporan
     */
    public function laporanCreate()
    {
        $data = [
            'title' => 'Buat Laporan Baru',
            'user' => [
                'nama' => session('nama'),
                'role' => session('role')
            ]
        ];

        return view('admin/laporan/create', $data);
    }

    /**
     * Store Laporan Baru
     */
    public function laporanStore()
    {
        // Implementasi penyimpanan laporan
        return redirect()->to('/admin/laporan')->with('success', 'Laporan berhasil dibuat');
    }

    /**
     * Statistik
     */
    public function statistik()
    {
        $data = [
            'title' => 'Statistik',
            'stats' => $this->laporanModel->getStatistik(),
            'user' => [
                'nama' => session('nama'),
                'role' => session('role')
            ]
        ];

        return view('admin/statistik', $data);
    }

    /**
     * Laporan Kategori
     */
    public function laporanKategori()
    {
        $data = [
            'title' => 'Laporan per Kategori',
            'user' => [
                'nama' => session('nama'),
                'role' => session('role')
            ]
        ];

        return view('admin/laporan/kategori', $data);
    }

    /**
     * Pengaturan
     */
    public function pengaturan()
    {
        $data = [
            'title' => 'Pengaturan',
            'user' => [
                'nama' => session('nama'),
                'role' => session('role')
            ]
        ];

        return view('admin/pengaturan', $data);
    }

    /**
     * Aktivitas Log
     */
    public function aktivitas()
    {
        $data = [
            'title' => 'Log Aktivitas',
            'user' => [
                'nama' => session('nama'),
                'role' => session('role')
            ]
        ];

        return view('admin/aktivitas', $data);
    }
}