<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table      = 'berita';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_penyiar', 'judul', 'deskripsi', 'foto', 'ket_foto', 'views', 'kategori_id'];

    protected $useTimestamps = true; 
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
