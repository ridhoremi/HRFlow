<div class="container-fluid py-4">


    <div class="card card-custom mb-4">
        <div class="card-body">

            <div class="row g-3 align-items-end">

                <div class="col-md-3">
                    <label class="form-label">Dari Tanggal</label>
                    <input type="date" class="form-control" id="dari_tanggal">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Sampai Tanggal</label>
                    <input type="date" class="form-control" id="sampai_tanggal">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100 btn-search" onclick="loadLaporanGaji()">
                        Cari
                    </button>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-success w-100 btn-print">
                        Cetak
                    </button>
                </div>

            </div>

        </div>
    </div>

    <div class="card card-custom">
        <div class="card-body">

            <div class="table-responsive">

                <table id="tabel_laporan_gaji" class="table table-bordered table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="40">
                                <input type="checkbox">
                            </th>
                            <th>ID</th>
                            <th>Nama Karyawan</th>
                            <th>Dari Tanggal</th>
                            <th>Sampai Tanggal</th>
                            <th>Gaji HK</th>
                            <th>HK</th>
                            <th>Total Gaji HK</th>
                            <th>Lembur</th>
                            <th>Gaji Perjam</th>
                            <th>Total Gaji Lembur</th>
                            <th>Insentif (+)</th>
                            <th>Pinjaman (-)</th>
                            <th>Total Gaji Karyawan</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

<script>
    function formatDate(date) {
        return date.toISOString().split('T')[0];
    }

    const today = new Date();

    // Ambil hari sekarang
    // Minggu = 0
    // Senin = 1
    // Sabtu = 6
    let day = today.getDay();

    // Kalau Minggu, anggap 7
    if (day === 0) {
        day = 7;
    }

    // Cari hari Senin
    const monday = new Date(today);
    monday.setDate(today.getDate() - (day - 1));

    // Cari hari Sabtu
    const saturday = new Date(monday);
    saturday.setDate(monday.getDate() + 5);

    // Set value input
    document.getElementById('dari_tanggal').value = formatDate(monday);
    document.getElementById('sampai_tanggal').value = formatDate(saturday);
</script>