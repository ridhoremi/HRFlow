<?php

namespace App\Models;

use CodeIgniter\Model;
use Override;

class KaryawanModel extends Model
{

    protected $table            = 'KARYAWAN';
    protected $useTimestamps    = false;
    protected $allowedFields    = ['BadgeNumber', 'NIK', 'NAMA', 'TglLahir', 'Gender', 'Agama', 'Alamat', 'NoKontak', 'Jabatan', 'idDepart', 'Status', 'Foto', 'cuti', 'cutiterpakai', 'sisacuti'];

    private function query($search = null)
    {
        $builder = $this->db->table('KARYAWAN K');
        $builder->select("K.ID,K.NIK, K.NAMA, K.Gender, K.Jabatan, K.NoKontak, K.Status");
        if ($search) {
            $builder->like('K.NIK', $search);
            $builder->orlike('K.NAMA', $search);
        }
        $builder->orderBy('K.NAMA', 'ASC');
        return $builder;
    }

    public function getData($start = null, $length = null, $search = null)
    {
        $result = $this->query($search);
        $result->limit($length, $start);
        return  $result->get()->getResultArray();
    }
    public function getDataSearch($search = null, $start = null, $length = null)
    {
        $builder = $this->query($search);
        $builder->limit($length, $start);
        return $builder->get()->getResultArray();
    }

    public function getTotal()
    {
        $builder = $this->query();
        return $builder->countAllResults();
    }

    public function getTotalSearch($search = null)
    {
        $builder = $this->query($search);
        return $builder->countAllResults();
    }

    public function getAllKaryawan()
    {
        $builder = $this->query();
        return $builder->get()->getResultArray();
    }

    public function getKaryawanById($id = null)
    {
        return $this->where('ID', $id)
            ->first();
    }


    // public function rulesValidasi($method = null)
    // {
    //     $rulesValidation = [
    //         'machine_id' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'No Mesin harus diisi.'
    //             ]
    //         ],
    //         'user_id' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'User ID harus diisi.'
    //             ]
    //         ],
    //         'nama' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Nama harus diisi.'
    //             ]
    //         ],
    //     ];

    //     return $rulesValidation;
    // }

    // public function simpan($data = null)
    // {
    //     $cek = $this->where('machine_id', $data['machine_id'])
    //         ->where('user_id', $data['user_id'])
    //         ->first();

    //     if ($cek) {
    //         return [
    //             'status' => false,
    //             'inputerror' => ['machine_id', 'user_id'],
    //             'error_string' => [
    //                 'Kombinasi Machine ID dan User ID sudah ada',
    //                 'Kombinasi Machine ID dan User ID sudah ada'
    //             ]
    //         ];
    //     }
    //     $insert = $this->insert($data);

    //     if (!$insert) {
    //         return [
    //             'status' => false,
    //             'message' => 'Gagal insert data',
    //             'error' => $this->errors()
    //         ];
    //     }
    //     return [
    //         'status' => true,
    //         'insert_id' => $insert
    //     ];
    // }

    // public function ubah($id = null, $data = null)
    // {
    //     $cek = $this->where('machine_id', $data['machine_id'])
    //         ->where('user_id', $data['user_id'])
    //         ->where('id !=', $id)
    //         ->first();

    //     if ($cek) {
    //         return [
    //             'status' => false,
    //             'inputerror' => ['machine_id', 'user_id'],
    //             'error_string' => [
    //                 'Kombinasi Machine ID dan User ID sudah ada',
    //                 'Kombinasi Machine ID dan User ID sudah ada'
    //             ]
    //         ];
    //     }
    //     $result = $this->update($id, $data);
    //     if (!$result) {
    //         return [
    //             'status' => false,
    //             'message' => 'Gagal Update data',
    //             'error' => $this->errors()
    //         ];
    //     }

    //     return [
    //         'status' => true
    //     ];
    // }

    // public function hapus($id = null)
    // {
    //     $result = $this->delete($id);
    //     if (!$result) {
    //         return [
    //             'status' => false,
    //             'message' => 'Gagal menghapus data'
    //         ];
    //     }
    //     return [
    //         'status' => true
    //     ];
    // }



    // public function getMesinKaryawan($machine_id = null)
    // {
    //     return $this->where('machine_id', $machine_id)
    //         ->orderBy('nama', 'ASC')
    //         ->findAll();
    // }
}
