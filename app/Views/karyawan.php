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

                    <button class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i>
                        Tambah Karyawan
                    </button>
                    <!-- <input type="text"
                        class="form-control"
                        placeholder="Cari karyawan..."
                        style="width: 250px;">

                    <button class="btn btn-primary">
                        Cari
                    </button> -->
                </div>



            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table id="karyawan_dataKaryawan" class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Jabatan</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>


                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- Modal Edit Karyawan -->
<div class="modal fade" id="modalEditKaryawan" tabindex="-1" aria-labelledby="modalEditKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditKaryawanLabel">
                    Edit Karyawan
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- FORM -->
            <form id="formEditKaryawan">
                <div class="modal-body">
                    <input type="hidden" name="ID" id="ID">

                    <div class="row">


                        <div class="col-md-6 mb-3">
                            <label class="form-label">Badge Number</label>
                            <input type="text" class="form-control" name="BadgeNumber" id="BadgeNumber">
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" name="NIK" id="NIK">
                        </div>


                        <div class="col-md-12 mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="NAMA" id="NAMA">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="TglLahir" id="TglLahir">
                        </div>

                        <!-- Gender -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gender</label>

                            <select class="form-select" name="Gender" id="Gender">
                                <option value="">Pilih Gender</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>

                        </div>

                        <!-- Agama -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Agama</label>

                            <select class="form-select" name="Agama" id="Agama">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" class="form-control" name="NoKontak" id="NoKontak">
                        </div>


                        <div class="col-md-12 mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3" name="Alamat" id="Alamat"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control" name="Jabatan" id="Jabatan">
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label">Departemen</label>

                            <select class="form-select" name="idDepart" id="idDepart">
                                <option value="">Pilih Departemen</option>
                            </select>

                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="Status" id="Status">
                                <option value="">Pilih Status</option>
                                <option value="PBL">PBL</option>
                                <option value="BHL">BHL</option>

                            </select>
                        </div>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">

                    <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Batal
                    </button>

                    <button type="submit"
                        class="btn btn-primary">

                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
```