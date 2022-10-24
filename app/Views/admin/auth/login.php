<?= $this->extend("layout/auth"); ?>

<?= $this->section('content'); ?>
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <div class="app-brand justify-content-center">
                        <a href="<?= base_url() ?>" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-body fw-bolder">EVOSIS</span>
                        </a>
                    </div>
                    <p class="mb-4">Silahkan login ke akun admin</p>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <form class="mb-3" action="<?= base_url('admin/auth/verify') ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email Akun" value="<?= old('email') ?>" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>