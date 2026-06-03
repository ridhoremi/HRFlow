 <div class="container-fluid p-4"> <!-- CARD -->
     <div class="row g-4">
         <div class="col-md-6 col-xl-3">
             <div class="card card-dashboard p-3">
                 <div class="d-flex justify-content-between align-items-center">
                     <div> <small class="text-muted"> Total Karyawan </small>
                         <h3 id="totalKaryawan_dashboard" class="fw-bold mt-2"> <?= $totalKaryawan ?> </h3>
                     </div>
                     <div class="icon-box bg-soft-primary"> <i class="bi bi-people"></i> </div>
                 </div>
             </div>
         </div>
         <div class="col-md-6 col-xl-3">
             <div class="card card-dashboard p-3">
                 <div class="d-flex justify-content-between align-items-center">
                     <div> <small class="text-muted"> Hadir Hari Ini </small>
                         <h3 class="fw-bold mt-2"> <?= $totalHadirHariIni ?> </h3>
                     </div>
                     <div class="icon-box bg-soft-success"> <i class="bi bi-check-circle"></i> </div>
                 </div>
             </div>
         </div>
         <div class="col-md-6 col-xl-3">
             <div class="card card-dashboard p-3">
                 <div class="d-flex justify-content-between align-items-center">
                     <div> <small class="text-muted"> Izin / Cuti </small>
                         <h3 class="fw-bold mt-2"> 0 </h3>
                     </div>
                     <div class="icon-box bg-soft-warning"> <i class="bi bi-calendar2-x"></i> </div>
                 </div>
             </div>
         </div>
         <div class="col-md-6 col-xl-3">
             <div class="card card-dashboard p-3">
                 <div class="d-flex justify-content-between align-items-center">
                     <div> <small class="text-muted"> Terlambat </small>
                         <h3 class="fw-bold mt-2"> <?= $totalTelatHariIni ?></h3>
                     </div>
                     <div class="icon-box bg-soft-danger"> <i class="bi bi-clock-history"></i> </div>
                 </div>
             </div>
         </div>
     </div> <!-- TABLE -->
     <div class="card table-card mt-4">
         <div class="card-header bg-white border-0 pt-4">
             <h5 class="fw-bold mb-0"> Absensi Hari Ini </h5>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table id="checkin_dashboard" class="table align-middle">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama Karyawan</th>
                             <th>Scan Masuk</th>
                             <th>Keterangan</th>
                         </tr>
                     </thead>
                     <tbody>

                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>