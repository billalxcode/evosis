<?= $this->extend('layout/admin/app') ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/libs/datatables/datatables.min.css">
<?= $this->endSection(); ?>

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
                    <h5 class="mb-0">Kelola Data</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table hover" id="table">
                            <thead>
                                <th>NIS</th>
                                <th>Nama Lengkap</th>
                                <th>Kode TPS</th>
                                <th>Nama TPS</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="<?= base_url('admin/pemilih/save-all') ?>" method="post">
                    <?= csrf_field() ?>
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan Semua</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script src="<?= base_url() ?>/assets/vendor/libs/datatables/datatables.min.js"></script>
<script>
    $(document).on('click', "#btn-delete", function(e) {
        let data_id = $(this).data('id')
        let modal = $("#modalConfirmDelete")
        let modal_form = modal.find("#form-delete>input[type='hidden']#data_id")
        modal_form.val(data_id)
        modal.modal('show')

        return true
    })

    $(document).ready(function() {
        $("#table").DataTable({
            ajax: {
                url: BASE_URL + '/api/pemilih/get_preview',
                method: 'POST',
                dataSrc: 'data'
            },
            columns: [{
                    data: 'siswa.nis',
                    render: function(data, type, row) {
                        return `<span class='fw-bold'>${data}</span>`
                    }
                },
                {
                    data: 'siswa.fullname'
                },
                {
                    data: 'tps.kd_tps'
                },
                {
                    data: 'tps.tps_name'
                }
            ]
        })
    })
</script>
<?= $this->endSection(); ?>