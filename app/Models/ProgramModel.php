<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table            = 'program';
    protected $primaryKey       = 'id';

    protected $allowedFields    = ['judul', 'link', 'foto'];

    protected $useTimestamps    = true; 
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
