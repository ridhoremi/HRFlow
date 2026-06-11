<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\CheckinoutModel;

class Home extends BaseController
{
    protected KaryawanModel $modelKaryawan;
    protected CheckinoutModel $modelCheckinout;

    public function __construct()
    {
        $this->modelKaryawan = new KaryawanModel();
        $this->modelCheckinout = new CheckinoutModel();
    }


    public function index()
    {
        $data = [
            'title'          => 'Dashboard',
            'content'        => 'dashboard',
            'totalKaryawan'  => $this->modelKaryawan->getTotal(),
            'totalHadirHariIni' => $this->modelCheckinout->totalYangHadir(),
            'totalTelatHariIni' => $this->modelCheckinout->totalTelat()
        ];
        return view('layout/main', $data);
    }


    public function getAbsenHariIni()
    {
        $request = service('request');

        $draw   = $request->getGet('draw');
        $start  = $request->getGet('start');
        $length = $request->getGet('length');

        $search = $request->getGet('search')['value'] ?? '';

        if ($search != '') {
            $list = $this->modelCheckinout->getDataSearch($length, $start, $search);
            $totalFilter = $this->modelCheckinout->getTotalSearch($search);
        } else {
            $list = $this->modelCheckinout->getData($length, $start);
            $totalFilter = $this->modelCheckinout->getTotal();
        }

        $total = $this->modelCheckinout->getTotal();

        $data = [];
        $no = $start + 1;

        foreach ($list as $temp) {
            $row = [];
            $row[] = $no;
            $row[] = $temp['Nama'];
            $row[] = $temp['JamMasuk'];
            if ($temp['StatusMasuk'] == 'Tepat') {
                $status = '<span class="badge bg-success">
                        Tepat Waktu
                   </span>';
            } elseif ($temp['StatusMasuk'] == 'Terbaik') {
                $status = '<span class="badge bg-primary">
                        Terbaik
                   </span>';
            } else {
                $status = '<span class="badge bg-danger">
                        Terlambat
                   </span>';
            }

            $row[] = $status;
            $data[] = $row;
            $no++;
        }
        $output = [
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFilter,
            "data" => $data
        ];
        echo json_encode($output);
        exit();
    }
}
