<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Default Title'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <div class="wrapper">
        <?= view('layout/sidebar'); ?>
        <div class="main-content" id="content">
            <?= view('layout/topbar'); ?>
            <?= view($content); ?>

        </div>
    </div> <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.min.js"></script>



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

        document.querySelectorAll('.has-sub > .sidebar-link').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();

                let submenu = this.parentElement.querySelector('.submenu');

                if (submenu.style.display === 'block') {
                    submenu.style.display = 'none';
                } else {
                    submenu.style.display = 'block';
                }
            });
        });
    </script>

    <script>
        const BASE_URL = "<?= base_url(); ?>";
    </script>

    <script src="<?= base_url('js/dashboard.js'); ?>"></script>
    <script src="<?= base_url('js/karyawan.js'); ?>"></script>
    <script src="<?= base_url('js/laporan_gaji.js'); ?>"></script>
    <script src="<?= base_url('js/mesin.js'); ?>"></script>
</body>

</html>