<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriaDetailModel extends Model
{
    protected $table = 'historia_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['historia_id', 'foto', 'deskripsi'];
}
