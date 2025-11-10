<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table            = 'laporan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'npm',
        'lokasi_kerusakan',
        'lokasi_spesifik',
        'kategori_kerusakan',
        'tingkat_prioritas',
        'deskripsi_kerusakan',
        'foto_kerusakan',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Mengambil data statistik laporan dari database.
     * Dibuat lebih efisien dengan satu query.
     */
    public function getStatistik()
    {
        $query = $this->select("
                COUNT(id) as total,
                SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) as pending,
                SUM(CASE WHEN status = 'Diproses' THEN 1 ELSE 0 END) as diproses,
                SUM(CASE WHEN status = 'Selesai' THEN 1 ELSE 0 END) as selesai
            ")
            ->get()
            ->getRowArray();

        // Mengatasi jika tabel kosong (hasilnya NULL)
        return [
            'total'     => $query['total'] ?? 0,
            'pending'   => $query['pending'] ?? 0,
            'diproses'  => $query['diproses'] ?? 0,
            'selesai'   => $query['selesai'] ?? 0,
        ];
    }
}
