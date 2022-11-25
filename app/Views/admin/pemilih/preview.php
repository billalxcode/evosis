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
                                <th>NIP</th>
                                <th>Nama Lengkap</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConfirmDelete" aria-labelledby="modalConfirmDeleteLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConfirmDeleteLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><span class="badge bg-warning fw-bold">PERINGATAN: </span> Data akan dihapus secara permanen, anda tidak dapat mengembalikan data yang sudah terhapus. Dengan ini saya sadar ingin menghapus data. Klik 'YA' untuk setuju</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Tutup</button>
                <form action="<?= base_url('admin/pegawai/trash') ?>" method="post" id="form-delete">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="" id='data_id'>
                    <button type="submit" class="btn btn-secondary">YA</button>
                </form>
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
                url: BASE_URL + '/api/pegawai/get_all',
                method: 'POST',
                dataSrc: 'data'
            },
            columns: [{
                    data: 'nip',
                    render: function(data, type, row) {
                        return `<span class='fw-bold'>${data}</span>`
                    }
                },
                {
                    data: 'fullname'
                },
                {
                    data: 'type',
                    render: function(data, type, row) {
                        if (data == "guru") {
                            return "Guru"
                        } else if (data == "wakasek") {
                            return "Kepala Sekolah / Wakil"
                        } else if (data == "pegawai") {
                            return "Kesiswaan / Humas / Kurikulum / Management"
                        } else if (data == "tu") {
                            return "Tata Usaha"
                        } else if (data == "lain") {
                            return "Lain-nya"
                        }
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        let action = ''
                        action += `<button class="btn btn-danger btn-sm" data-id="${data}" id="btn-delete" tooltip="Hapus Data"><i class="fa fa-trash"></i></button>`
                        return action
                    }
                }
            ]
        })
    })
</script>
<?= $this->endSection(); ?>