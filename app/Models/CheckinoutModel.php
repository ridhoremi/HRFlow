<?php

namespace App\Models;

use CodeIgniter\Model;


class CheckinoutModel extends Model
{

    protected $table      = 'CHECKINOUT';
    protected $useTimestamps = false;
    protected $allowedFields = ['BadgeNumber', 'CHECKTIME', 'CHECKTYPE', 'VERIFYCODE', 'SENSORID', 'Memoinfo', 'WorkCode', 'sn', 'UserExtFmt'];

    private function queryAbsenHariIni($search = null)
    {
        $builder = $this->db->table('CHECKINOUT');
        $builder->select("CHECKINOUT.Badgenumber,
        KARYAWAN.Nama, DATE(CHECKINOUT.CHECKTIME) AS Tanggal,
        MIN(CHECKINOUT.CHECKTIME) AS scanMasuk,
        TIME(MIN(CHECKINOUT.CHECKTIME)) AS JamMasuk, CASE WHEN TIME(MIN(CHECKINOUT.CHECKTIME)) < '08:00:59' THEN 'Terbaik' WHEN TIME(MIN(CHECKINOUT.CHECKTIME)) <= '08:30:00' THEN 'Tepat' ELSE 'Terlambat' END AS StatusMasuk");

        $builder->join(
            'KARYAWAN',
            'CHECKINOUT.Badgenumber = KARYAWAN.BadgeNumber',
            'INNER'
        );

        $builder->where(
            'DATE(CHECKINOUT.CHECKTIME)',
            date('Y-m-d')
        );


        if ($search) {
            $builder->groupStart();
            $builder->like('CHECKINOUT.Badgenumber', $search);
            $builder->orLike('KARYAWAN.Nama', $search);
            $builder->groupEnd();
        }

        $builder->groupBy("
        CHECKINOUT.Badgenumber,
        KARYAWAN.Nama,
        DATE(CHECKINOUT.CHECKTIME)");
        $builder->orderBy('KARYAWAN.Nama', 'ASC');

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
        return $builder->countAllResults();
    }

    public function getTotalSearch($search = null)
    {
        $builder = $this->queryAbsenHariIni($search);
        return $builder->countAllResults();
    }

    public function getDataSearch($length = null, $start = null, $search = null)
    {
        $builder = $this->queryAbsenHariIni($search);
        $builder->limit($length, $start);
        return $builder->get()->getResultArray();
    }

    public function totalYangHadir()
    {
        $builder = $this->queryAbsenHariIni();
        return $builder->countAllResults();
    }

    public function totalTelat()
    {
        $builder = $this->queryAbsenHariIni();
        $builder->having("TIME(MIN(CHECKINOUT.CHECKTIME)) > '08:30:59'");
        return $builder->countAllResults();
    }

    public function insertLogs($attendance = null)
    {
        $total = 0;

        $batch = [];

        foreach ($attendance as $row) {

            if (!isset($row[1], $row[2], $row[3])) {
                continue;
            }

            $batch[] = [

                'BadgeNumber' => $row[1],

                'CHECKTIME' => date('Y-m-d H:i:s', strtotime($row[3])),

                'CHECKTYPE' => $row[2],

                'VERIFYCODE' => $row[0],

                'SENSORID' => 1,

                'Memoinfo' => '',

                'WorkCode' => 0,

                'UserExtFmt' => 0
            ];

            if (count($batch) >= 500) {

                $this->ignore(true)->insertBatch($batch);

                $total += count($batch);

                $batch = [];
            }
        }

        // sisa data
        if (!empty($batch)) {

            $this->ignore(true)->insertBatch($batch);

            $total += count($batch);
        }

        return $total;
    }
}
