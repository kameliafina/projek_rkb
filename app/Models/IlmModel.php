<?php

namespace App\Models;

use CodeIgniter\Model;

class IlmModel extends Model
{
    protected $table = 'ilm';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'keterangan', 'audio', 'gambar'];
}
