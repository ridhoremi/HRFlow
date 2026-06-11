<div class="container-fluid p-4">

    <div class="card mb-4">

        <div class="card-header">
            <h5>Input Insentif Karyawan</h5>
        </div>

        <div class="card-body">

            <form action="/insentif/simpan" method="post">

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label>Karyawan</label>

                        <select name="Badgenumber"
                            class="form-control"
                            required>

                            <option value="">-- Pilih Karyawan --</option>


                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Jenis Insentif</label>

                        <select name="IdInsentif"
                            class="form-control"
                            required>

                            <option value="">-- Pilih Insentif --</option>



                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Tanggal</label>

                        <input type="date"
                            name="Tanggal"
                            class="form-control"
                            required>
                    </div>

                </div>

                <button type="submit"
                    class="btn btn-primary">

                    Simpan
                </button>

            </form>

        </div>

    </div>



    <div class="card">

        <div class="card-header">
            <h5>Data Insentif Karyawan</h5>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Karyawan</th>
                        <th>Insentif</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>



                </tbody>

            </table>

        </div>

    </div>
</div>