<?php

namespace App\Models;

use CodeIgniter\Model;

class IklanModel extends Model
{
    protected $table = 'iklan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['foto', 'deskripsi', 'created_at', 'updated_at'];
}
