<?php

namespace App\Controllers;

use App\Models\LaporanGajiModel;

class LaporanGaji extends BaseController
{
    protected LaporanGajiModel $model;

    public function __construct()
    {
        $this->model = new LaporanGajiModel();
    }
    public function index()
    {

        $data = [
            'title'   => 'Laporan Gaji',
            'content' => 'laporan_gaji'

        ];

        return view('layout/main', $data);
    }

    public function list()
    {
        $request = service('request');

        $dari   = $request->getPost('dari');
        $sampai = $request->getPost('sampai');


        if (empty($dari) || empty($sampai)) {

            $today = date('Y-m-d');

            $day = date('N', strtotime($today));

            // SENIN
            $monday = date(
                'Y-m-d',
                strtotime('-' . ($day - 1) . ' days')
            );

            // SABTU
            $saturday = date(
                'Y-m-d',
                strtotime($monday . ' +5 days')
            );

            $dari   = $monday;
            $sampai = $saturday;
        }

        $result = $this->model->getLaporanGaji(
            $dari,
            $sampai
        );

        $data = [];

        $no = 1;

        foreach ($result as $row) {

            $data[] = [
                '
                <input type="checkbox"
                    class="check-item"
                    value="' . $row['Badgenumber'] . '">
                ',

                $row['Badgenumber'],

                $row['Nama'],

                $dari,

                $sampai,

                number_format(
                    $row['GajiHK'],
                    0,
                    ',',
                    '.'
                ),

                $row['HK'],

                number_format(
                    $row['TotalGajiHK'],
                    0,
                    ',',
                    '.'
                ),

                $row['Lembur'],

                number_format(
                    $row['GajiPerjam'],
                    0,
                    ',',
                    '.'
                ),

                number_format(
                    $row['TotalGajiLembur'],
                    0,
                    ',',
                    '.'
                ),

                number_format(
                    $row['Insentif'],
                    0,
                    ',',
                    '.'
                ),

                number_format(
                    $row['Pinjaman'],
                    0,
                    ',',
                    '.'
                ),

                '<b>' .
                    number_format(
                        $row['TotalGaji'],
                        0,
                        ',',
                        '.'
                    ) .
                    '</b>'
            ];
        }

        return $this->response->setJSON([
            'data' => $data
        ]);
    }
}
