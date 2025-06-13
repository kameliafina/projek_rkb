<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'komentar';
    protected $allowedFields = [ 'nama', 'komentar', 'target_id', 'target_type', 'create_at' ];
}
