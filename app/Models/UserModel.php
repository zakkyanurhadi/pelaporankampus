<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['npm', 'nama', 'email', 'password', 'img', 'role'];
    protected $useTimestamps    = false;

    // Method to check if user is admin
    public function isAdmin($userId)
    {
        $user = $this->find($userId);
        return $user && $user['role'] === 'admin';
    }

    // Method to get admin users
    public function getAdmins()
    {
        return $this->where('role', 'admin')->findAll();
    }
}
