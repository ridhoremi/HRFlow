<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanGajiModel extends Model
{
    protected $DBGroup = 'default';

    public function getLaporanGaji($dari = null, $sampai = null)
    {
        $sql = "
    SELECT
        k.Badgenumber,
        k.Nama,
        k.GajiHK,
        k.GajiPerjam,
        IFNULL(hk.HK, 0) as HK,
        (k.GajiHK * IFNULL(hk.HK, 0)) as TotalGajiHK,
        IFNULL(lb.TotalLembur, 0) as Lembur,
        (IFNULL(lb.TotalLembur, 0) * k.GajiPerjam) as TotalGajiLembur,
        IFNULL(ins.TotalInsentif, 0) as Insentif,
        IFNULL(pj.TotalPinjaman, 0) as Pinjaman,
        ((k.GajiHK * IFNULL(hk.HK, 0)) + (IFNULL(lb.TotalLembur, 0) * k.GajiPerjam) + IFNULL(ins.TotalInsentif, 0) - IFNULL(pj.TotalPinjaman, 0)) as TotalGaji
    FROM KARYAWAN k LEFT JOIN
    (
        SELECT
            x.Badgenumber,

            SUM(
                CASE
                    WHEN x.JamKerja <= 6
                    THEN 0.5
                    ELSE 1
                END
            ) as HK

        FROM (SELECT a.Badgenumber,DATE(a.CHECKTIME) as Tanggal,TIMESTAMPDIFF(HOUR, MIN(a.CHECKTIME),
                    MAX(a.CHECKTIME)
                ) as JamKerja

            FROM CHECKINOUT a

            WHERE DATE(a.CHECKTIME)
            BETWEEN :dari: AND :sampai:

            GROUP BY
                a.Badgenumber,
                DATE(a.CHECKTIME)

        ) x

        GROUP BY x.Badgenumber

    ) hk ON hk.Badgenumber = k.Badgenumber

    LEFT JOIN
    (
        SELECT
            Badgenumber,
            SUM(Jumlah) as TotalLembur

        FROM LEMBUR

        WHERE DATE(TglLembur)
        BETWEEN :dari: AND :sampai:

        GROUP BY Badgenumber

    ) lb ON lb.Badgenumber = k.Badgenumber

    LEFT JOIN
    (
        SELECT
            a.Badgenumber,
            SUM(b.Harga) as TotalInsentif

        FROM INSENTIF_KARYAWAN a

        INNER JOIN INSENTIF b
        ON a.IdInsentif = b.IdInsentif

        WHERE DATE(a.Tanggal)
        BETWEEN :dari: AND :sampai:

        GROUP BY a.Badgenumber

    ) ins ON ins.Badgenumber = k.Badgenumber

    LEFT JOIN
    (
        SELECT
            b.Badgenumber,
            SUM(a.JumlahBayar) as TotalPinjaman

        FROM PINJAMAN_DETAIL a

        INNER JOIN PINJAMAN b
        ON a.IdPinjaman = b.IdPinjaman

        WHERE DATE(a.TglBayar)
        BETWEEN :dari: AND :sampai:

        GROUP BY b.Badgenumber

    ) pj ON pj.Badgenumber = k.Badgenumber

    WHERE k.Status = 'BHL'
    
    ORDER BY k.Nama ASC
    ";

        return $this->db->query($sql, [
            'dari'   => $dari,
            'sampai' => $sampai
        ])->getResultArray();
    }
}
