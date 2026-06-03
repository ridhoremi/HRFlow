<?php

namespace App\Models;

use CodeIgniter\Model;
use Override;

class CheckinoutModel extends Model
{

    protected $table      = 'CHECKINOUT';
    protected $useTimestamps = false;
    protected $allowedFields = ['BadgeNumber', 'CHECKTIME', 'CHECKTYPE', 'VERIFYCODE', 'SENSORDID', 'Memoinfo', 'WorkCode', 'sn', 'UserExtFmt'];

    private function queryAbsenHariIni($search = null)
    {
        $builder = $this->db->table('CHECKINOUT');

        $builder->select("CHECKINOUT.Badgenumber,
        KARYAWAN.NAMA, DATE(CHECKINOUT.CHECKTIME) AS Tanggal,
        MIN(CHECKINOUT.CHECKTIME) AS scanMasuk,
        TIME(MIN(CHECKINOUT.CHECKTIME)) AS JamMasuk, CASE WHEN TIME(MIN(CHECKINOUT.CHECKTIME)) > '08:30:00' THEN 'Terlambat' ELSE 'Tepat' END AS StatusMasuk");

        $builder->join(
            'KARYAWAN',
            'CHECKINOUT.Badgenumber = KARYAWAN.ID',
            'INNER'
        );

        $builder->where(
            'DATE(CHECKINOUT.CHECKTIME)',
            date('Y-m-d')
        );


        if ($search) {
            $builder->groupStart();
            $builder->like('CHECKINOUT.Badgenumber', $search);
            $builder->orLike('KARYAWAN.NAMA', $search);
            $builder->groupEnd();
        }

        $builder->groupBy("
        CHECKINOUT.Badgenumber,
        KARYAWAN.NAMA,
        DATE(CHECKINOUT.CHECKTIME)");
        $builder->orderBy('KARYAWAN.NAMA', 'ASC');

        return $builder;
    }


    public function getData($length = null, $start = null, $search = null)
    {
        $builder = $this->queryAbsenHariIni($search);

        $builder->limit($length, $start);

        return $builder->get()->getResultArray();
    }

    public function getTotal()
    {
        $builder = $this->queryAbsenHariIni();

        return count($builder->get()->getResultArray());
    }

    public function getTotalSearch($search = null)
    {
        $builder = $this->queryAbsenHariIni($search);

        return count($builder->get()->getResultArray());
    }

    public function getDataSearch($length = null, $start = null, $search = null)
    {
        $builder = $this->queryAbsenHariIni($search);

        $builder->limit($length, $start);

        return $builder->get()->getResultArray();
    }


    public function totalYangHadir()
    {
        return count(
            $this->queryAbsenHariIni()->get()->getResultArray()
        );
    }

    public function totalTelat()
    {
        $builder = $this->queryAbsenHariIni();

        $builder->having("TIME(MIN(CHECKINOUT.CHECKTIME)) > '08:30:59'");

        return count(
            $builder->get()->getResultArray()
        );
    }
}
