<?php

namespace App\Models;

use CodeIgniter\Model;

class PengunjungModel extends Model
{
    protected $table = 'pengunjung';
    protected $allowedFields = ['ip_address', 'user_agent', 'last_activity', 'tanggal'];
    protected $useTimestamps = false;
}
