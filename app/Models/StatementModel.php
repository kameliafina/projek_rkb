<?php

namespace App\Models;

use CodeIgniter\Model;

class StatementModel extends Model
{
    protected $table = 'statement';
    protected $primaryKey = 'id';
    protected $allowedFields = ['foto'];
}
