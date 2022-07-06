<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="navbar-nav-left d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar--dropdown dropdown-shortcuts dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class='bx bx-grid-alt bx-sm'></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-start">
                    <li>
                        <h6 class="dropdown-header text-uppercase fw-semibold">Shortcuts</h6>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= base_url('vote') ?>">
                            <i class='bx bxs-megaphone me-2'></i>
                            <span class="align-middle">Vote</span>
                        </a>
                    </li>
                    <?php if (session()->get("role") == "siswa") : ?>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#verifyLogout">
                                <i class='bx bx-info-circle me-2'></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </li>
                    <?php else : ?>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('auth') ?>">
                                <i class='bx bx-info-circle me-2'></i>
                                <span class="align-middle">Login</span>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </li>
            <!-- <li class="navbar-nav">
                <div class="nav-item d-flex mx-auto">
                    <span class="font-weight-bold text-center">Selamat datang di <span class="text-upper">E-Vosis</span></span>
                </div>
            </li> -->
        </ul>
        <div class="row mx-auto">
            <div class="col-lg-12 font-weight-bold mx-auto">
                <span class="font-weight-bold text-center">Selamat datang di <span class="text-upper">E-Vosis</span></span>
            </div>
        </div>
    </div>
</nav>