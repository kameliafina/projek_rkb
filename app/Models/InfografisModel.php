<?php

namespace App\Models;

use CodeIgniter\Model;

class InfografisModel extends Model
{
    protected $table = 'infografis';
    protected $primaryKey = 'id';
    protected $allowedFields = ['foto'];
}
