<?= $this->extend("admin/layout/app"); ?>

<?= $this->section("content"); ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary text-uppercase">Donasi <i class="fa fa-heart fa-bounce text-danger"></i></h5>
                            <p class="mb-4">
                                Ayo dukung perkembangan aplikasi ini dengan donasi.
                            </p>
                            <a href="https://trakteer.id/billalxcode" class="btn btn-sm btn-outline-primary">Trakteer</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="<?= base_url('assets/img/illustrations/support.png') ?>" height="140" alt="Ilustrasi" data-app-dark-img="illustrations/support.png" data-app-light-img="illustrations/support.png" class="animate__slideInRight" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class='avatar-icon bx bx-user-plus'></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="<?= base_url("admin/siswa") ?>">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Siswa</span>
                            <h3 class="card-title mb-2"><?= count($models['siswaModel']->findAll()) ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class='avatar-icon bx bxs-school'></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="<?= base_url('admin/kelas') ?>">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <span>Kelas</span>
                            <h3 class="card-title text-nowrap mb-1"><?= count($models['kelasModel']->findAll()) ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3">Jumlah Suara</h5>
                        <!-- <div id="totalRevenueChart" class="px-2"></div> -->
                        <p class="text-center py-lg-5 fw-bold">Mohon bersabar, widget ini masih dalam pengembangan.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class='avatar-icon bx bx-user-voice'></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="<?= base_url('admin/kandidat') ?>">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block mb-1">Kandidat</span>
                            <h3 class="card-title text-nowrap mb-2"><?= count($models['kandidatModel']->findAll()) ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class='avatar-icon bx bxs-megaphone'></i>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="<?= base_url('admin/suara') ?>">Lihat</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Suara</span>
                            <h3 class="card-title mb-2"><?= count($models['suaraModel']->findAll()) ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                    <div class="card-title">
                                        <h5 class="text-nowrap mb-2">Grafik Suara</h5>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <h3 class="mb-0"><?= count($models['suaraModel']->findAll()) ?></h3>
                                    </div>
                                </div>
                                <div id="profileReportChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Statistik Suara</h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">0</h2>
                            <span>Suara</span>
                        </div>
                        <div id="suaraStatistikChart"></div>
                    </div>
                    <ul class="p-0 m-0" id="scrollbar">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kandidat 1</h6>
                                    <small class="text-muted">Lorem Ipsum</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">85</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kandidat 2</h6>
                                    <small class="text-muted">Lorem Ipsum</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">15</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kandidat 3</h6>
                                    <small class="text-muted">Lorem Ipsum</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">50</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kandidat 4</h6>
                                    <small class="text-muted">Lorem Ipsum</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">50</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Statistik Per Kelas</h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">0</h2>
                            <span>Kelas</span>
                        </div>
                        <div id="kelasStatistikChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kelas 1</h6>
                                    <small class="text-muted">Lorem Ipsum</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">0</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kelas 2</h6>
                                    <small class="text-muted">Lorem Ipsum</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">0</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kelas 3</h6>
                                    <small class="text-muted">Lorem Ipsum</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">0</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-user"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kelas 4</h6>
                                    <small class="text-muted">Lorem Ipsum</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">0</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Terakhir Vote</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <?php foreach ($lastVote as $rowVote) : ?>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <div class="avatar-icon bx bxs-user"></div>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1"><?= $rowVote['siswa'] ?></small>
                                        <h6 class="mb-0">Vote Kandidat <?= $rowVote['norut'] ?></h6>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
    </div>
</div>
<!-- / Content -->

<div class="modal fade" id="donasiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="donasiModalLabel">DUKUNG <i class="fa fa-heart fa-bounce text-danger"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <img src="<?= base_url('assets/img/illustrations/support.png') ?>" height="140" alt="Ilustrasi" class="d-block mx-auto animate__slideInRight" />
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="mb-4">
                            Ayo dukung perkembangan aplikasi E-VoSis. Dengan dukungan dari kamu, aplikasi ini akan terus berkembang.
                        </p>
                        <a href="https://trakteer.id/billalxcode" class="btn btn-sm btn-outline-primary">Trakteer</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Nanti</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#donasiModal").modal("show")
    })
</script>
<?= $this->endSection(); ?>