<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
     protected $table = 'users'; // pastikan sesuai dengan nama tabel
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name', 'username', 'password', 'level']; // ← ini WAJIB

    protected $useTimestamps = false;
}
