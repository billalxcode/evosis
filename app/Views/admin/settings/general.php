<?= $this->extend("admin/layout/app"); ?>

<?= $this->section("content"); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-1">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#nav-home-panel" aria-controls="nav-home-panel" aria-selected="true"><i class="tf-icons bx bx-home"></i> Umum</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#nav-profile-panel" aria-controls="nav-profile-panel" aria-selected="false"><i class="tf-icons bx bx-user"></i> Profil</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#nav-calendar-panel" aria-controls="nav-calendar-panel" aria-selected="false"><i class="tf-icons bx bx-calendar"></i> Jadwal</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-home-panel" role="tabpanel">
                        <form action="<?= base_url('admin/settings/save') ?>" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="type" value="general">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="penyelenggara">Penyelenggara</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Masukan Penyelenggara" aria-label="Penyelenggara" value="<?= $values['penyelenggara'] ?>" />
                                        </div>
                                        <?php if (isset(session()->getFlashdata('errors')['penyelenggara'])) : ?>
                                            <small class="form-text text-danger"><?= session()->getFlashdata('errors')['penyelenggara'] ?></small>
                                        <?php endif ?>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="provinsi">Provinsi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Masukan provinsi" aria-label="provinsi" value="<?= $values['provinsi'] ?>" />
                                        </div>
                                        <?php if (isset(session()->getFlashdata('errors')['provinsi'])) : ?>
                                            <small class="form-text text-danger"><?= session()->getFlashdata('errors')['provinsi'] ?></small>
                                        <?php endif ?>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="kota">Kota</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukan kota" aria-label="kota" value="<?= $values['kota'] ?>" />
                                        </div>
                                        <?php if (isset(session()->getFlashdata('errors')['kota'])) : ?>
                                            <small class="form-text text-danger"><?= session()->getFlashdata('errors')['kota'] ?></small>
                                        <?php endif ?>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="kecamatan">kecamatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukan kecamatan" aria-label="kecamatan" value="<?= $values['kecamatan'] ?>" />
                                        </div>
                                        <?php if (isset(session()->getFlashdata('errors')['kecamatan'])) : ?>
                                            <small class="form-text text-danger"><?= session()->getFlashdata('errors')['kecamatan'] ?></small>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile-panel" role="tabpanel">
                        <p>
                            Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies
                            halvah
                            tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.
                        </p>
                        <p class="mb-0">
                            Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy
                            liquorice caramels.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-calendar-panel" role="tabpanel">
                        <p>
                            Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
                            bears
                            cake chocolate.
                        </p>
                        <p class="mb-0">
                            Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing
                            sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
                            jelly.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>