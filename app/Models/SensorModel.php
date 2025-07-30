<?php

namespace App\Models;

use CodeIgniter\Model;

class SensorModel extends Model
{
    protected $table            = 'kata_terlarang';
    protected $primaryKey       = 'id';

    protected $allowedFields    = ['kata'];

    public function getSemuaKata()
    {
        return $this->findAll();
    }

    protected $validationRules = [
    'kata' => 'required|min_length[1]',
];

}
