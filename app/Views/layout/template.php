<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRFlow Dashboard</title> <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: #f1f5f9;
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
        }

        /* ========================= SIDEBAR ========================== */
        .sidebar {
            width: 260px;
            flex-shrink: 0;
            min-height: 100vh;
            background: #1e293b;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            display: flex;
            align-items: center;
            height: 50px;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 12px;
            transition: 0.2s;
            margin-bottom: 5px;
            white-space: nowrap;
        }

        .sidebar a:hover {
            background: #334155;
            color: white;
        }

        .sidebar .menu-title {
            color: #94a3b8;
            font-size: 12px;
            text-transform: uppercase;
            margin-top: 25px;
            margin-bottom: 10px;
            padding-left: 16px;
        }

        /* ========================= COLLAPSE ========================== */
        .sidebar.collapsed .menu-text,
        .sidebar.collapsed .menu-title,
        .sidebar.collapsed .logo-text {
            display: none;
        }

        .sidebar.collapsed a {
            justify-content: center;
            padding: 12px 0;
        }

        .sidebar.collapsed a i {
            font-size: 22px;
        }

        .sidebar.collapsed .logo {
            justify-content: center;
        }

        /* ========================= MAIN CONTENT ========================== */
        .main-content {
            width: 100%;
        }

        /* ========================= TOPBAR ========================== */
        .topbar {
            background: white;
            padding: 15px 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        /* ========================= CARDS ========================== */
        .card-dashboard {
            border: none;
            border-radius: 18px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .icon-box {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .bg-soft-primary {
            background: #dbeafe;
            color: #2563eb;
        }

        .bg-soft-success {
            background: #dcfce7;
            color: #16a34a;
        }

        .bg-soft-warning {
            background: #fef3c7;
            color: #d97706;
        }

        .bg-soft-danger {
            background: #fee2e2;
            color: #dc2626;
        }

        .table-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* ========================= MOBILE ========================== */
        @media(max-width:991px) {
            .sidebar {
                position: fixed;
                left: -260px;
                top: 0;
                z-index: 999;
            }

            .sidebar.show {
                left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper"> <!-- SIDEBAR -->
        <aside class="sidebar p-3"> <!-- LOGO -->
            <div class="logo mb-4"> <span class="logo-text">HRFlow</span> </div> <!-- MENU --> <a href="#"> <i class="bi bi-grid"></i> <span class="menu-text">Dashboard</span> </a>
            <div class="menu-title"> Master Data </div> <a href="#"> <i class="bi bi-people"></i> <span class="menu-text">Karyawan</span> </a> <a href="#"> <i class="bi bi-diagram-3"></i> <span class="menu-text">Departemen</span> </a> <a href="#"> <i class="bi bi-person-badge"></i> <span class="menu-text">Jabatan</span> </a>
            <div class="menu-title"> Absensi </div> <a href="#"> <i class="bi bi-fingerprint"></i> <span class="menu-text">Data Absensi</span> </a> <a href="#"> <i class="bi bi-calendar-week"></i> <span class="menu-text">Shift Kerja</span> </a>
            <div class="menu-title"> Payroll </div> <a href="#"> <i class="bi bi-cash-stack"></i> <span class="menu-text">Penggajian</span> </a> <a href="#"> <i class="bi bi-receipt"></i> <span class="menu-text">Laporan Gaji</span> </a>
            <div class="menu-title"> Settings </div> <a href="#"> <i class="bi bi-gear"></i> <span class="menu-text">Pengaturan</span> </a>
        </aside> <!-- MAIN CONTENT -->
        <div class="main-content"> <!-- TOPBAR -->
            <div class="topbar d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3"> <!-- TOGGLE BUTTON --> <button class="btn btn-light" id="toggleSidebar"> <i class="bi bi-list fs-4"></i> </button>
                    <div>
                        <h4 class="mb-0 fw-bold"> Dashboard </h4> <small class="text-muted"> Welcome back, Admin </small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3"> <button class="btn btn-light position-relative"> <i class="bi bi-bell"></i> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> 3 </span> </button>
                    <div class="dropdown"> <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"> <i class="bi bi-person-circle"></i> Administrator </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li> <a class="dropdown-item" href="#"> Profile </a> </li>
                            <li> <a class="dropdown-item" href="#"> Logout </a> </li>
                        </ul>
                    </div>
                </div>
            </div> <!-- CONTENT -->
            <div class="container-fluid p-4"> <!-- CARD -->
                <div class="row g-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="card card-dashboard p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div> <small class="text-muted"> Total Karyawan </small>
                                    <h3 class="fw-bold mt-2"> 128 </h3>
                                </div>
                                <div class="icon-box bg-soft-primary"> <i class="bi bi-people"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card card-dashboard p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div> <small class="text-muted"> Hadir Hari Ini </small>
                                    <h3 class="fw-bold mt-2"> 115 </h3>
                                </div>
                                <div class="icon-box bg-soft-success"> <i class="bi bi-check-circle"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card card-dashboard p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div> <small class="text-muted"> Izin / Cuti </small>
                                    <h3 class="fw-bold mt-2"> 8 </h3>
                                </div>
                                <div class="icon-box bg-soft-warning"> <i class="bi bi-calendar2-x"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card card-dashboard p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div> <small class="text-muted"> Terlambat </small>
                                    <h3 class="fw-bold mt-2"> 5 </h3>
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
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <th>Jam Masuk</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ridho</td>
                                        <td>IT</td>
                                        <td>08:01</td>
                                        <td> <span class="badge bg-success"> Hadir </span> </td>
                                    </tr>
                                    <tr>
                                        <td>Budi</td>
                                        <td>HRD</td>
                                        <td>08:17</td>
                                        <td> <span class="badge bg-warning text-dark"> Terlambat </span> </td>
                                    </tr>
                                    <tr>
                                        <td>Siti</td>
                                        <td>Finance</td>
                                        <td>-</td>
                                        <td> <span class="badge bg-danger"> Tidak Hadir </span> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');

        toggleBtn.addEventListener('click', function(e) {

            e.stopPropagation();

            // MOBILE
            if (window.innerWidth < 992) {
                sidebar.classList.toggle('show');
            }

            // DESKTOP
            else {
                sidebar.classList.toggle('collapsed');
            }

        });

        // KLIK HALAMAN = SIDEBAR TUTUP (MOBILE)
        mainContent.addEventListener('click', function() {

            if (window.innerWidth < 992) {
                sidebar.classList.remove('show');
            }

        });
    </script>
</body>

</html>