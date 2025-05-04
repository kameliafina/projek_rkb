<?php

namespace App\Models;

use CodeIgniter\Model;

class LifestyleModel extends Model
{
    protected $table      = 'lifestyle';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_penyiar', 'judul', 'deskripsi', 'foto', 'ket_foto', 'kategori_id'];

    protected $useTimestamps = true; 
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
