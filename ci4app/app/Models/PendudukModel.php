<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table = 'penduduk';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat'];

    public function search($keyword)
    {
        $builder = $this->table('penduduk');
        $builder->like('nama', $keyword);

        return $builder;
    }
}
