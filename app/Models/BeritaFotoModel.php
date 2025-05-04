<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaFotoModel extends Model
{
    protected $table      = 'berita_foto';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_penyiar', 'judul', 'deskripsi', 'foto', 'ket_foto'];

    protected $useTimestamps = true; 
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
