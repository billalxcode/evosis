<?= $this->extend("layout/app"); ?>

<?= $this->section("content"); ?>
<div class="container my-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Profil Kamu
                    </h5>
                    <div class="row mx-auto">
                        <div class="col-lg-3 col-md-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <p id="nisn">
                                <?= $siswaData['nisn'] ?>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <p id="nama_lengkap">
                                <?= $siswaData['nama_lengkap'] ?>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <p id="kelas">
                                <?php
                                $kelasData = $models['kelasModel']->where('id', $siswaData['kelas'])->first();
                                if ($kelasData) {
                                    echo $kelasData['name'];
                                } else {
                                    echo 'Tidak diketahui';
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <p id="jenis_kelamin">
                                <?= ($siswaData['jenis_kelamin'] == "L" ? "Laki-Laki" : "Perempuan") ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <h4 class="fw-bold mt-4 text-center"><span class="text-muted">Calon Kandidat</h4>
        <?php foreach ($kandidat as $row) : ?>
            <div class="col-lg-6 col-md-3 col-sm-3 mx-auto mb-3">
                <div class="card">
                    <img src="<?= base_url($row['foto']) ?>" alt="" class="card-img-top rounded-circle img-kandidat mx-auto mt-3">

                    <div class="card-body">
                        <h6 class="text-center text-uppercase" style="font-weight: bold;">
                            CALON KANDIDAT
                        </h6>
                        <?= $row['misi'] ?>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('vote/' . $row['id']) ?>">
                            <button class="btn btn-primary btn-md w-100">Lihat Detail</button>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?= $this->endSection(); ?>