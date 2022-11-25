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
                    <h5 class="mb-0">TPS Data</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/tps/save') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="kd_tps">Kode TPS</label>
                            <div class="col-sm-10">
                                <input type="text" name="kd_tps" id="kd_tps" class="form-control" placeholder="Masukan Kode TPS" value="<?= old('kd_tps') ?>">
                                <?php if (isset($errors['kd_tps'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['kd_tps'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tps_name">Nama TPS</label>
                            <div class="col-sm-10">
                                <input type="text" name="tps_name" id="tps_name" class="form-control" placeholder="Masukan Nama TPS" value="<?= old('tps_name') ?>">
                                <?php if (isset($errors['tps_name'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['tps_name'] ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tps_loc">Lokasi TPS</label>
                            <div class="col-sm-10">
                                <input type="text" name="tps_loc" id="tps_loc" class="form-control" placeholder="Masukan Lokasi TPS" value="<?= old('tps_loc') ?>">
                                <?php if (isset($errors['tps_loc'])) : ?>
                                    <div class="form-text text-danger">
                                        <?= $errors['tps_loc'] ?>
                                    </div>
                                <?php endif ?>
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