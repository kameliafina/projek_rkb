<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori2Model extends Model
{
    protected $table = 'kategori_lifestyle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kategori_l'];
}
