<?= $this->extend('layout/admin/app') ?>

<?= $this->section('content') ?>
<?php
$errors = session()->getFlashdata('errors');
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <?= $this->include('layout/admin/partials/alerts'); ?>
            <div class="alert alert-warning">
                <span class="badge bg-warning fw-bo">PERINGATAN: </span> Jika anda mengubah algoritma enkripsi, maka fitur login tidak akan berfungsi. Solusinya anda dapat mereset semua data dan mengembalikan nya ke semula.
            </div>
        </div>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Keamanan Data</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/security/save') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="encrypt_algo">Algoritma Password Enkripsi</label>
                            <div class="col-sm-10">
                                <select name="password_algorithm" id="password_algorithm" class="form-select">
                                    <?php foreach ($password_encrypt as $encrypt) : ?>
                                        <?php if ($encrypt['select'] == true) : ?>
                                            <option value="<?= $encrypt['value'] ?>" selected><?= $encrypt['text'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $encrypt['value'] ?>"><?= $encrypt['text'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?php if (isset($errors['password_algorithm'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['password_algorithm'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="active_live">Aktifkan Fitur Enkripsi</label>
                            <div class="col-sm-10">
                                <select name="active_live" id="active_live" class="form-select">
                                    <option value="true">YA</option>
                                    <option value="false">TIDAK</option>
                                </select>
                                <?php if (isset($errors['active_live'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['active_live'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="network_ecrypt">Aktifkan Enkripsi Jaringan</label>
                            <div class="col-sm-10">
                                <select name="network_ecrypt" id="network_ecrypt" class="form-select">
                                    <option value="true">YA</option>
                                    <option value="false">TIDAK</option>
                                </select>
                                <?php if (isset($errors['network_ecrypt'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['network_ecrypt'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="network_password_algorithm">Password Jaringan</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="network_password_algorithm" placeholder="Password Jaringan" name="network_password_algorithm" />
                                <?php if (isset($errors['network_password_algorithm'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['network_password_algorithm'] ?>
                                    </div>
                                <?php endif ?>
                                <div class="form-text">
                                    Password Jaringan berfungsi untuk meindungi data jaringan yang dikirim dan diterima agar tetap aman.
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $(document).on("submit", "form", function(e) {
        let button = $(this).find('button')
        button.html('<i class="fa fa-spin fa-spinner"></i> Loading...')
        button.prop("disabled", true)
        return true
    })
</script>
<?= $this->endSection(); ?>