<?php

function convertAngka2Terbilang($angka)
{
    $terbilang = [
        'Satu', 'Dua', 'Tiga', "Empat", 'Lima',
        'Enam', 'Tujuh', ' Delapan', 'Sembilan',
        'Sepuluh', 'Sebelas'
    ];
    if (intval($angka) <= count($terbilang)) {
        return $terbilang[intval($angka) - 1];
    } else {
        return $angka;
    }
}
?>
<?= $this->extend("layout/app"); ?>

<?= $this->section("content"); ?>
<div class="container my-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php if (session()->getFlashdata("error")) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata("error") ?>
                </div>
            <?php elseif (session()->getFlashdata("success")) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata("success") ?>
                </div>
            <?php elseif (session()->getFlashdata("warning") == true) : ?>
                <div class="alert alert-warning">
                    Maaf pemilihan hanya diizinkan satu kali saja. Anda sudah memilih.
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <?php foreach ($kandidat as $row) : ?>
            <div class="col-lg-6 col-md-6 col-sm-3 mx-auto my-3">
                <div class="card">
                    <img src="<?= base_url($row['foto']) ?>" alt="" class="card-img-top rounded-circle img-kandidat mx-auto mt-3">
                    <div class="card-header">
                        <h6 class="text-center text-uppercase" style="font-weight: bold;">
                            CALON KANDIDAT
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="accordion">
                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailKetuaAccordion-<?= $row['id'] ?>" aria-controls="detailKetuaAccordion">
                                        Detail calon ketua
                                    </button>
                                </h2>

                                <div id="detailKetuaAccordion-<?= $row['id'] ?>" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <?php
                                            $ketuaData = $models['siswaModel']->select('nisn,nama_lengkap,kelas')->where('id', $row['ketuaid'])->first();
                                            $kelasData = $models['kelasModel']->select('name')->where('id', $ketuaData['kelas'])->first();
                                            ?>
                                            <div class="col-lg-4">
                                                <label for="nisn" class="form-label">Nomor Induk</label>
                                                <p id="nisn"><?= $ketuaData['nisn'] ?></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <p id="nama_lengkap"><?= $ketuaData['nama_lengkap'] ?></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="kelas" class="form-label">Kelas</label>
                                                <p id="kelas"><?= $kelasData['name'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailWakilAccordion-<?= $row['id'] ?>" aria-controls="detailWakilAccordion">
                                        Detail wakil ketua
                                    </button>
                                </h2>

                                <div id="detailWakilAccordion-<?= $row['id'] ?>" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">

                                            <?php
                                            $wakilData = $models['siswaModel']->select('nisn,nama_lengkap,kelas')->where('id', $row['wakilid'])->first();
                                            $kelasData = $models['kelasModel']->select('name')->where('id', $wakilData['kelas'])->first();
                                            ?>
                                            <div class="col-lg-4">
                                                <label for="nisn" class="form-label">Nomor Induk</label>
                                                <p id="nisn"><?= $wakilData['nisn'] ?></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <p id="nama_lengkap"><?= $wakilData['nama_lengkap'] ?></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="kelas" class="form-label">Kelas</label>
                                                <p id="kelas"><?= $kelasData['name'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailLainAccordion-<?= $row['id'] ?>" aria-controls="detailLainAccordion">
                                        Detail lain-nya
                                    </button>
                                </h2>

                                <div id="detailLainAccordion-<?= $row['id'] ?>" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="organisasi" class="form-label">Organisasi</label>
                                                <p id="organisasi" class="text-uppercase"><?= $row['organisasi'] ?></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="norut" class="form-label">Nomor Urut</label>
                                                <p id="norut"><?= convertAngka2Terbilang($row['norut']) ?></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="gambar" class="form-label">Gambar</label>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar me-2">
                                                            <img src="<?= base_url($row['foto']) ?>" alt="Avatar Calon" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailVisiAccordion-<?= $row['id'] ?>" aria-controls="detailVisiAccordion">
                                        Visi
                                    </button>
                                </h2>

                                <div id="detailVisiAccordion-<?= $row['id'] ?>" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="visi" class="form-label">Visi</label>
                                                <p id="visi">
                                                    <?= $row['visi'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailMisiAccordion-<?= $row['id'] ?>" aria-controls="detailMisiAccordion">
                                        Misi
                                    </button>
                                </h2>

                                <div id="detailMisiAccordion-<?= $row['id'] ?>" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="misi" class="form-label">Misi</label>
                                                <p id="misi">
                                                    <?= $row['misi'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-md w-100" id="btn-vote" data-id="<?= $row['id'] ?>" data-norut="<?= convertAngka2Terbilang($row['norut']) ?>">Pilih Calon</button>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>


<div class="modal fade" id="voteconfirm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Dengan ini anda setuju untuk memilih calon ketua osis nomor urut <span id="norut"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Ragu</button>
                <form action="<?= base_url('vote/save') ?>" method="post" id="formConfirm">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="" id="id">
                    <button type="submit" class="btn btn-primary">YA</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", "#btn-vote", function() {
        var voteid = $(this).data("id")
        var norut = $(this).data("norut")
        var voteConfirmModal = $(".modal#voteconfirm")
        voteConfirmModal.modal("show")
        voteConfirmModal.find("span#norut").text(norut)
        voteConfirmModal.find("form#formConfirm>input#id").val(voteid)
    })

    function removeAlert(element, timeout = 3000) {
        setTimeout(function() {
            $(element).slideUp(500, function() {
                $(element).remove()
            })
        }, timeout)
    }
    $(document).ready(function() {
        var alert_danger = $(".alert.alert-danger")
        if (alert_danger.length >= 1) {
            removeAlert(alert_danger)
        }

        var alert_success = $(".alert.alert-success")
        if (alert_success.length >= 1) {
            removeAlert(alert_success)
            $("button.btn.btn-primary#btn-vote").text("Sudah memilih")
            $("button.btn.btn-primary#btn-vote").prop("disabled", true)
        }

        var alert_warning = $(".alert.alert-warning")
        if (alert_warning.length >= 1) {
            $("button.btn.btn-primary#btn-vote").text("Sudah memilih")
            $("button.btn.btn-primary#btn-vote").prop("disabled", true)
        }
    })
</script>
<?= $this->endSection(); ?>