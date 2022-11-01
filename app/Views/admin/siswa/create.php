<?= $this->extend('layout/admin/app') ?>

<?= $this->section('content') ?>
<?php
$errors = session()->getFlashdata('errors');
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <?= $this->include('layout/admin/partials/alerts'); ?>
        </div>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Data</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/siswa/save') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nis">Nomor Induk Siswa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nis" placeholder="Nomor Induk Siswa Nasional" name="nis" autofocus />
                                <?php if (isset($errors['nis'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['nis'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="fullname">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fullname" placeholder="Nama Lengkap" name="fullname" />
                                <?php if (isset($errors['fullname'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['fullname'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="classid">Kelas</label>
                            <div class="col-sm-10">
                                <select name="class_id" id="classid" class="form-select">
                                    <option value="0">X RPL 1</option>
                                </select>
                                <?php if (isset($errors['class_id'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['class_id'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="password">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" placeholder="********" name="password" />
                                <?php if (isset($errors['password'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['password'] ?>
                                    </div>
                                <?php endif ?>
                                <div class="form-text">
                                    <span class="text-warning fw-bold text-uppercase">PERINGATAN: </span> Jika password kosong, maka akan terisi secara otomatis: <span class="fw-bold">abcd12345</span>
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