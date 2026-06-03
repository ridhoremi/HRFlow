<div class="container-fluid p-4">

    <!-- Header -->
    <!-- <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">Data Karyawan</h3>
            <small class="text-muted">Kelola data karyawan perusahaan</small>
        </div>

        <button class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Karyawan
        </button>
    </div> -->

    <!-- Statistik -->
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Total Karyawan</h6>
                    <h2 class="fw-bold">150</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Aktif</h6>
                    <h2 class="fw-bold text-success">142</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Non Aktif</h6>
                    <h2 class="fw-bold text-danger">3</h2>
                </div>
            </div>
        </div>

    </div>


    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                <div class="d-flex gap-2">
                    <input type="text"
                        class="form-control"
                        placeholder="Cari karyawan..."
                        style="width: 250px;">

                    <button class="btn btn-primary">
                        Cari
                    </button>
                </div>

                <button class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    Tambah Karyawan
                </button>

            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>EMP001</td>
                            <td>Budi Santoso</td>
                            <td>Manager</td>
                            <td>HRD</td>
                            <td>081234567890</td>
                            <td>
                                <span class="badge bg-success">
                                    Aktif
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info">
                                    Detail
                                </button>

                                <button class="btn btn-sm btn-warning">
                                    Edit
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>EMP002</td>
                            <td>Siti Aisyah</td>
                            <td>Staff Admin</td>
                            <td>Finance</td>
                            <td>081298765432</td>
                            <td>
                                <span class="badge bg-warning text-dark">
                                    Cuti
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info">
                                    Detail
                                </button>

                                <button class="btn btn-sm btn-warning">
                                    Edit
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>EMP003</td>
                            <td>Andi Wijaya</td>
                            <td>Programmer</td>
                            <td>IT</td>
                            <td>081312345678</td>
                            <td>
                                <span class="badge bg-success">
                                    Aktif
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info">
                                    Detail
                                </button>

                                <button class="btn btn-sm btn-warning">
                                    Edit
                                </button>

                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>