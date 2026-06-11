<?php

namespace App\Controllers;

use App\Libraries\ZKLibrary;
use App\Models\MesinModel;

use App\Models\CheckinoutModel;

class Mesin extends BaseController
{
    protected MesinModel $model;
    protected CheckinoutModel $modelcheckinout;

    public function __construct()
    {
        $this->model = new MesinModel();
        $this->modelcheckinout = new CheckinoutModel();
    }

    public function index()
    {

        $data = [
            'title'   => 'Mesin Absensi',
            'content' => 'mesin_absensi'

        ];

        return view('layout/main', $data);
    }


    public function list()
    {
        $request = service('request');

        $draw   = $request->getVar('draw') ?? 0;
        $length = $request->getVar('length') ?? 10;
        $start  = $request->getVar('start') ?? 0;
        $search = $request->getVar('search')['value'] ?? '';
        $total  = $this->model->getTotal();

        if ($search != "") {
            $list = $this->model->getData($search, $start, $length);
            $totalFiltered = $this->model->getTotalSearch($search);
        } else {
            $list = $this->model->getData($start, $length);
            $totalFiltered = $total;
        }

        $data = [];
        $no = $start + 1;

        foreach ($list as $temp) {
            $aksi = '<a href="javascript:void(0)" id="btn-download-' . $temp['idmesin'] . '" class="btn btn-success btn-sm" onclick="downloadAbsensi(' . $temp['idmesin'] . ')"><i class="bi bi-download"></i></a>
                     <a href="javascript:void(0)" class="btn btn-warning btn-sm" onclick="editDataKaryawan(' . $temp['idmesin'] . ')"><i class="bi bi-pencil"></i></a></a>
                     <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="hapusData(' . $temp['idmesin'] . ')"><i class="bi bi-trash"></i></a>';

            $row   = [];
            $row[] = $no;
            $row[] = $temp['nama_mesin'];
            $row[] = $temp['tipe_komunikasi'];
            $row[] = $temp['ip'];
            $row[] = $temp['port'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output = [
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFiltered,
            "data" => $data
        ];

        echo json_encode($output);
        exit();
    }

    // public function downloadlog()
    // {
    //     set_time_limit(0);
    //     $ip = '192.168.1.35';
    //     $logs = [];
    //     $zk = new ZKLibrary($ip, 4370);

    //     if ($zk->connect()) {
    //         $serialNumber = trim($zk->getSerialNumber());
    //         $attendance = $zk->getAttendance();

    //         foreach ($attendance as $row) {
    //             $logs[] = [
    //                 'pin'           => $row[1],
    //                 'datetime'      => $row[3],
    //                 'verified'      => $row[0],
    //                 'status'        => $row[2],
    //                 'serial_number' => $serialNumber,
    //             ];
    //         }

    //         $zk->disconnect();

    //         echo "<pre>";
    //         print_r($logs);
    //     } else {

    //         echo "Koneksi gagal";
    //     }
    // }

    public function downloadlogs($idmesin = null)
    {

        ini_set('memory_limit', '1024M');
        set_time_limit(0);

        $mesin = $this->model->getMesinById($idmesin);

        if (!$mesin) {

            return $this->response->setJSON([
                'status' => false,
                'message' => 'Mesin tidak ditemukan'
            ]);
        }

        $ip   = $mesin['ip'];
        $port = $mesin['port'];

        $zk = new ZKLibrary($ip, $port);

        if ($zk->connect()) {

            $attendance = $zk->getAttendance();

            $total = $this->modelcheckinout->insertLogs($attendance);

            // if ($total > 0) {
            //     $zk->clearAttendance();
            // }

            $zk->disconnect();

            return $this->response->setJSON([
                'status' => true,
                'message' => 'Download logs selesai',
                'total' => $total
            ]);
        } else {

            return $this->response->setJSON([
                'status' => false,
                'message' => 'Koneksi gagal'
            ]);
        }
    }

    //     public function downloadlogs($idmesin = null)
    //     {
    //         set_time_limit(0);

    //         $mesin = $this->model->getMesinById($idmesin);

    //         if (!$mesin) {
    //             return $this->response->setJSON([
    //                 'status' => false,
    //                 'message' => 'Mesin tidak ditemukan'
    //             ]);
    //         }

    //         $ip = $mesin['ip'];
    //         $port = $mesin['port'];


    //         $logs = [];

    //         $zk = new ZKLibrary($ip, $port);

    //         if ($zk->connect()) {

    //             // $serialNumber = trim($zk->getSerialNumber());
    //             $attendance = $zk->getAttendance();

    //             foreach ($attendance as $row) {

    //                 $logs[] = [
    //                     'pin'           => $row[1],
    //                     'datetime'      => $row[3],
    //                     'verified'      => $row[0],
    //                     'status'        => $row[2],
    //                 ];
    //             }

    //             $zk->disconnect();

    //             return $this->response->setJSON([
    //                 'status' => true,
    //                 'message' => 'Download berhasil',
    //                 'total' => count($logs),
    //                 'data' => $logs
    //             ]);
    //         } else {

    //             return $this->response->setJSON([
    //                 'status' => false,
    //                 'message' => 'Koneksi ke mesin gagal'
    //             ]);
    //         }
    //     }
}
