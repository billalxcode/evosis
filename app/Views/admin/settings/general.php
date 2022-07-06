<?= $this->extend("admin/layout/app"); ?>

<?= $this->section("content"); ?>
<div class="container-xxl flex-grow-1 container-p-y">
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
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <form action="<?= base_url('admin/settings/save') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="type" value="general">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="penyelenggara">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Masukan Penyelenggara" aria-label="Penyelenggara" />
                                        </div>
                                        <?php if (isset(session()->getFlashdata('errors')['nama'])) : ?>
                                            <small class="form-text text-danger"><?= session()->getFlashdata('errors')['nama'] ?></small>
                                        <?php endif ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
<?= $this->endSection(); ?>