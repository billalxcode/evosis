<?= $this->extend("layout/auth/app"); ?>

<?= $this->section("content") ?>
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="<?= base_url('/') ?>" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-body fw-bolder text-uppercase">E-VoSis</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Welcome Admin! 👋</h4>

                    <form id="formAuthentication" class="mb-3" action="<?= base_url('admin/auth') ?>" method="POST">
                        <?= csrf_field() ?>
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-danger alert-dismissible animate__bounceIn" role="alert">
                                <?= session()->getFlashdata('message') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        <?php elseif (session()->getFlashdata('logged')) : ?>
                            <div class="alert alert-success alert-dismissible animate__bounceIn" role="alert" id="logged">
                                <?= session()->getFlashdata('logged') ?>
                            </div>
                        <?php endif ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Nama Pengguna" autofocus />
                            <?php if (isset(session()->getFlashdata('errors')['username'])) : ?>
                                <div class="form-text text-danger"><?= session()->getFlashdata('errors')['username'] ?></div>
                            <?php endif ?>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Kata Sandi</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <?php if (isset(session()->getFlashdata('errors')['password'])) : ?>
                                <div class="form-text text-danger"><?= session()->getFlashdata('errors')['password'] ?></div>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success d-grid w-100" type="submit">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Register -->
            <p class="mt-3 text-center">
                Copyright &copy; 2022 Billal Fauzan
            </p>
        </div>
    </div>
</div>

<!-- / Content -->
<?= $this->endSection(); ?>