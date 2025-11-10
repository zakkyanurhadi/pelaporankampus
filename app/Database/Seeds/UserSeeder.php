<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Data pengguna yang akan dimasukkan
        $data = [
            [
                'npm'      => '87654322',
                'nama'     => 'Agus Setiawan',
                'email'    => null,
                // Hash password '87654321'
                'password' => password_hash('87654321', PASSWORD_DEFAULT),
                'img'      => 'default.jpg',
            ],
        ];

        // Menggunakan Query Builder untuk memasukkan data
        $this->db->table('users')->insertBatch($data);
    }
}
