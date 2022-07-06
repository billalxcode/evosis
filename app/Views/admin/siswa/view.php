<?= $this->extend("admin/layout/app"); ?>

<?= $this->section("content"); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-1">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="card">
                <h4 class="card-header">Semua Aksi</h4>
                <div class="card-body">
                    <a href="<?= base_url('admin/siswa/create') ?>">
                        <button class="btn btn-primary"><i class='bx bx-user-plus'></i> Tambah Data</button>
                    </a>
                    <a href="<?= base_url('admin/siswa/import') ?>">
                        <button class="btn btn-primary"><i class='bx bxs-file-import'></i> Import File</button>
                    </a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#trashModal"><i class="fa fa-trash"></i> Reset</button>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="card">
                <h4 class="card-header">Siswa</h4>
                <div class="card-body">
                    <table class="table table-responsive text-nowrap">
                        <thead>
                            <tr>
                                <th>NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Aktif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($siswa as $row) : ?>
                                <?php
                                $kelasData = $models['kelasModel']->where('id', $row['id'])->first();
                                if ($kelasData) {
                                    $kelas = $kelasData['name'];
                                } else {
                                    $kelas = 'Tidak diketahui';
                                }
                                ?>
                                <tr>
                                    <td><?= $row['nisn'] ?></td>
                                    <td><?= $row['nama_lengkap'] ?></td>
                                    <td><?= $kelas ?></td>
                                    <td><?= ($row['jenis_kelamin'] == "L" ? "Laki-Laki" : "Perempuan") ?></td>
                                    <td>
                                        <?php if ($row['aktif']) : ?>
                                            <span class="badge bg-success">YA</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">TIDAK</span>
                                        <?php endif ?>
                                    </td>
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

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Name</label>
                        <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailBasic" class="form-label">Email</label>
                        <input type="text" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx">
                    </div>
                    <div class="col mb-0">
                        <label for="dobBasic" class="form-label">DOB</label>
                        <input type="text" id="dobBasic" class="form-control" placeholder="DD / MM / YY">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="trashModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/siswa/trash') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="trashModalLabel">Reset Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-warning">
                                <span class="text-uppercase fw-bold">PERHATIAN: </span> Dengan ini anda setuju untuk menghapus data secara permanen. Apakah anda yakin?
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">RAGU</button>
                    <button type="submit" class="btn btn-primary">YA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

    })
</script>
<?= $this->endSection(); ?>