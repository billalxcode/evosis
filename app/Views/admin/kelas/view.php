<?= $this->extend("admin/layout/app"); ?>

<?= $this->section("content"); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="card">
                <h4 class="card-header">Semua Aksi</h4>
                <div class="card-body">
                    <div class="row">
                        <?php if (session()->getFlashdata("message")) : ?>
                            <div class="col-lg-12" id="message">
                                <div class="alert alert-<?= session()->getFlashdata('message')['type'] ?>">
                                    <?= session()->getFlashdata('message')['text'] ?>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="col-lg-12">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData"><i class='bx bx-plus'></i> Tambah Data</button>
                            <button class="btn btn-primary" disabled><i class='bx bxs-file-import'></i> Import File</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="card">
                <h4 class="card-header">Kelas</h4>
                <div class="card-body">
                    <table class="table table-responsive text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $idx = 1; foreach ($data as $row): ?>
                                <tr>
                                    <td><?= $idx++ ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);;"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/kelas/save') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama" class="form-label">Nama Kelas</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Kelas: X RPL-1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var error = $("#error")
        if (error.length >= 1) {
            setTimeout(function() {
                error.slideUp(500, function() {
                    error.remove()
                })
            }, 3000)
        }
    })
</script>
<?= $this->endSection(); ?>