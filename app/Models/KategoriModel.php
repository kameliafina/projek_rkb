<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori_berita';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kategori_b'];
}
