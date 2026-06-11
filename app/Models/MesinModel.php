<?php

namespace App\Models;

use CodeIgniter\Model;

class MesinModel extends Model
{

    protected $table            = 'MESIN';
    protected $primaryKey       = 'idmesin';
    protected $useTimestamps    = false;
    protected $allowedFields    = ['nama_mesin', 'tipe_komunikasi', 'ip', 'status', 'port', 'comPass'];

    public function getData($search = null, $start = null, $length = null)
    {
        $builder = $this->builder();
        if (!empty($search)) {

            $builder->groupStart();

            $builder->like('nama_mesin', $search);
            $builder->orLike('ip', $search);
            $builder->orLike('tipe_komunikasi', $search);
            $builder->orLike('status', $search);

            $builder->groupEnd();
        }

        if ($length != -1) {
            $builder->limit($length, $start);
        }

        return $builder->get()->getResultArray();
    }

    public function getTotal()
    {
        return $this->builder()->countAllResults();
    }

    public function getTotalSearch($search = null)
    {
        $builder = $this->builder();

        if (!empty($search)) {

            $builder->groupStart();

            $builder->like('nama_mesin', $search);
            $builder->orLike('ip', $search);
            $builder->orLike('tipe_komunikasi', $search);
            $builder->orLike('status', $search);

            $builder->groupEnd();
        }

        return $builder->countAllResults();
    }

    public function getMesinById($id = null)
    {
        return $this->where('idmesin', $id)->first();
    }
}
