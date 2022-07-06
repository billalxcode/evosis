<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $title ?></title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/boxicons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/datatables/datatables.min.css') ?>">

    <style>
        .img-kandidat {
            height: 120px;
            width: 120px;
        }
    </style>
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/fontawesome/js/all.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/datatables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/helpers.js') ?>"></script>
    <script src="<?= base_url('assets/js/config.js') ?>"></script>
    <script>
        window['BASE_URL'] = '<?= base_url() ?>'
    </script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <div class="layout-page">
                <?= $this->include("layout/navbar"); ?>

                <div class="content-wrapper">
                    <?= $this->renderSection("content"); ?>

                    <div class="modal fade" id="verifyLogout" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Dengan ini anda akan mengakhiri sesi atau keluar dari akun anda. Klik 'YA' untuk konfirmasi
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="<?= base_url('logout') ?>">
                                        <button type="button" class="btn btn-primary">YA</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= $this->include("layout/footer"); ?>
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>

    <script src="<?= base_url() ?>/assets/js/dashboards-analytics.js"></script>
</body>

</html>