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
                <span class="fw-bold">PERINGATAN: </span> Data akan tersimpan jika sudah melewati halaman preview.
            </div>
        </div>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Pemilih Data</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/pemilih/save') ?>" method="POST">
                        <?= csrf_field() ?>
                        <!-- <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="kd_tps">Pilih Kode TPS</label>
                                <div class="col-sm-10">
                                    <select name="kd_tps" id="kd_tps" class="form-select">
                                        <?php foreach ($tps_data as $row) : ?>
                                            <option value="<?= $row['kd_tps'] ?>"><?= $row['kd_tps'] ?> - <?= $row['tps_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($errors['kd_tps'])) : ?>
                                        <div class="form-text text-danger">
                                            <?= $errors['kd_tps'] ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div> -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tipe">Tipe Proses</label>
                            <div class="col-sm-10">
                                <select name="tipe" id="tipe" class="form-select">
                                    <option value="acak">Acak</option>
                                    <option value="lanjut">Berlanjutan</option>
                                    <option value="otomatis" selected>Otomatis</option>
                                </select>
                                <?php if (isset($errors['tipe'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['tipe'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="sort">Urut Berdasarkan</label>
                            <div class="col-sm-10">
                                <select name="sort" id="sort" class="form-select">
                                    <option value="fullname">Nama Lengkap</option>
                                    <option value="id">ID</option>
                                    <option value="nis" selected>NIS</option>
                                    <option value="null">Tidak Diurutkan</option>
                                </select>
                                <?php if (isset($errors['sort'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['sort'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="pembagian">Pembagian Pemilih</label>
                                <div class="col-sm-10">
                                    <input type="number" name="pembagian" id="pembagian" class="form-control" placeholder="Masukan jumlah pemilih per tps" value="300">
                                    <div class="form-text">
                                        <span class="badge bg-warning fw-bold">PERINGATAN</span> Pembagian Pemilih ini dilakukan agar semua pemilih dapat disebar ke tps.
                                    </div>
                                    <?php if (isset($errors['pembagian'])) : ?>
                                        <div class="form-text text-danger">
                                            <?= $errors['pembagian'] ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div> -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-right-from-bracket"></i> Lanjut</button>
                            </div>
                        </div>
                    </form>
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