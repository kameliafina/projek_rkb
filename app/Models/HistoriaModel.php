<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriaModel extends Model
{
    protected $table            = 'historia';
    protected $primaryKey       = 'id';

    protected $allowedFields    = ['nama_penyiar', 'judul', 'deskripsi', 'foto', 'ket_foto', 'audio'];

    protected $useTimestamps    = true; 
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
