<?php

namespace App\Controllers;

class Insentif extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Insentif Karyawan',
            'content' => 'insentif'
        ];
        return view('layout/main', $data);
    }
}
