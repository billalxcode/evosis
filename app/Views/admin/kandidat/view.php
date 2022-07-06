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
                            <a href="<?= base_url('admin/kandidat/create') ?>">
                                <button class="btn btn-primary"><i class='bx bx-plus'></i> Tambah Data</button>
                            </a>
                            <button class="btn btn-primary" disabled><i class='bx bxs-file-import'></i> Import File</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
            <div class="card">
                <h4 class="card-header">Kandidat</h4>
                <div class="card-body">
                    <table class="table table-responsive text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Ketua</th>
                                <th>Wakil</th>
                                <th>Organisasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $idx = 1;
                            foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $idx++ ?></td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <img src="<?= base_url($row['foto']) ?>" alt="Avatar Calon" class="rounded-circle">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $siswaData = $models['siswaModel']->where('id', $row['ketuaid'])->first();
                                        if ($siswaData) {
                                            echo strtoupper($siswaData['nama_lengkap']);
                                        } else {
                                            echo 'Tidak diketahui';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $siswaData = $models['siswaModel']->where('id', $row['wakilid'])->first();
                                        if ($siswaData) {
                                            echo strtoupper($siswaData['nama_lengkap']);
                                        } else {
                                            echo 'Tidak diketahui';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?= strtoupper($row['organisasi']) ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);;" id="btn-detail" data-id="<?= $row['id'] ?>"><i class="bx bx-detail me-1"></i> Detail</a>
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


<div class="modal fade" id="detailKandidat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailKandidatLabel">Detail Kandidat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="alert alert-warning" id="loading">
                        <i class="fa fa-spinner fa-spin"></i> Tunggu sebentar sedang mengambil data...
                    </div>
                </div>
                <div class="row" id="content">
                    <div class="col-lg-12">
                        <div class="accordion" id="accordion">
                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailKetuaAccordion" aria-controls="detailKetuaAccordion">
                                        Detail calon ketua
                                    </button>
                                </h2>

                                <div id="detailKetuaAccordion" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="nisn" class="form-label">Nomor Induk</label>
                                                <p id="nisn">Tidak Diketahui</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <p id="nama_lengkap">Tidak Diketahui</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="kelas" class="form-label">Kelas</label>
                                                <p id="kelas">Tidak Diketahui</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailWakilAccordion" aria-controls="detailWakilAccordion">
                                        Detail wakil ketua
                                    </button>
                                </h2>

                                <div id="detailWakilAccordion" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="nisn" class="form-label">Nomor Induk</label>
                                                <p id="nisn">Tidak Diketahui</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <p id="nama_lengkap">Tidak Diketahui</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="kelas" class="form-label">Kelas</label>
                                                <p id="kelas">Tidak Diketahui</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailLainAccordion" aria-controls="detailLainAccordion">
                                        Detail lain-nya
                                    </button>
                                </h2>

                                <div id="detailLainAccordion" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="organisasi" class="form-label">Organisasi</label>
                                                <p id="organisasi">Tidak Diketahui</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="norut" class="form-label">Nomor Urut</label>
                                                <p id="norut">Tidak Diketahui</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="gambar" class="form-label">Gambar</label>
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar me-2">
                                                            <img src="<?= base_url('upload/image/1656755140_8274a1ea194c23b3c700.jpg') ?>" alt="Avatar Calon" class="rounded-circle">
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
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailVisiAccordion" aria-controls="detailVisiAccordion">
                                        Visi
                                    </button>
                                </h2>

                                <div id="detailVisiAccordion" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="visi" class="form-label">Visi</label>
                                                <p id="visi">
                                                    Tidak Diketahui
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#detailMisiAccordion" aria-controls="detailMisiAccordion">
                                        Misi
                                    </button>
                                </h2>

                                <div id="detailMisiAccordion" class="accordion-collapse collapse">
                                    <hr class="me-2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="misi" class="form-label">Misi</label>
                                                <p id="misi">
                                                    Tidak Diketahui
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var terbilang = [
        'Satu', 'Dua', 'Tiga', "Empat", 'Lima',
        'Enam', 'Tujuh', ' Delapan', 'Sembilan',
        'Sepuluh', 'Sebelas'
    ]

    function convertAngka2Terbilang(angka) {
        if (parseInt(angka) <= terbilang.length) {
            return terbilang[parseInt(angka) - 1]
        } else {
            return angka
        }
    }

    function getKelasData(kelasid, callback) {
        $.ajax({
            async: false,
            url: window["BASE_URL"] + '/api/kelas/search',
            method: "POST",
            data: {
                'kelasid': kelasid,
                'filter': 'first'
            },
            success: callback
        })
    }

    function getSiswaData(siswaid, callback) {
        $.ajax({
            async: false,
            url: window["BASE_URL"] + '/api/siswa/search',
            method: 'POST',
            data: {
                'id': siswaid,
                'filter': 'first'
            },
            success: function(response) {
                var result = response['data']
                getKelasData(response['data']['kelas'], function(kelasResult) {
                    result['kelasData'] = kelasResult
                    callback(result)
                })
            }
        })
    }

    $(document).on("click", "#btn-detail", function() {
        var detailModal = $("#detailKandidat")
        detailModal.find("#loading").show()
        detailModal.modal("show")

        var kandidatid = $(this).data("id")
        $.ajax({
            async: true,
            cache: false,
            url: window['BASE_URL'] + '/api/kandidat/search',
            method: "POST",
            data: {
                'id': kandidatid,
                'filter': 'first'
            },
            success: function(response) {
                if (response['data']) {
                    var dataResponse = response['data']
                    getSiswaData(dataResponse['ketuaid'], function(data) {
                        var detailKetuaAccordion = detailModal.find("#detailKetuaAccordion")
                        detailKetuaAccordion.find("p#nisn").text(data['nisn'])
                        detailKetuaAccordion.find("p#nama_lengkap").text(data['nama_lengkap'])
                        if (data['kelasData']['data'] != null) {
                            detailKetuaAccordion.find("p#kelas").text(data["kelasData"]['data']['name'])
                        } else {
                            detailKetuaAccordion.find("p#kelas").text('Tidak diketahui')
                        }
                    })
                    getSiswaData(dataResponse['wakilid'], function(data) {
                        var detailWakilAccordion = detailModal.find("#detailWakilAccordion")
                        detailWakilAccordion.find("p#nisn").text(data['nisn'])
                        detailWakilAccordion.find("p#nama_lengkap").text(data['nama_lengkap'])
                        if (data['kelasData']['data'] != null) {
                            detailWakilAccordion.find("p#kelas").text(data["kelasData"]['data']['name'])
                        } else {
                            detailWakilAccordion.find("p#kelas").text('Tidak diketahui')
                        }
                    })

                    var detailLainAccordion = detailModal.find("#detailLainAccordion")
                    detailLainAccordion.find("p#organisasi").text(dataResponse['organisasi'])
                    detailLainAccordion.find("p#norut").text(convertAngka2Terbilang(dataResponse['norut']))
                    var detailVisiAccordion = detailModal.find("#detailVisiAccordion")
                    detailVisiAccordion.find("p#visi").text(dataResponse['visi'])
                    var detailMisiAccordion = detailModal.find("#detailMisiAccordion")
                    detailMisiAccordion.find("p#misi").text(dataResponse['misi'])

                    detailModal.find("#loading").slideUp(500, function() {
                        detailModal.find("#loading").hide()
                    })
                } else {
                    console.log(response)
                }
            },
            error: function() {
                detailModal.find("#content").hide()
                var loading = detailModal.find("#loading")
                loading.removeClass("alert-warning").addClass("alert-danger")
                loading.text("Mohon maaf, saat ini terjadi kesalahan saat mengambil data. Jika ini bug mohon laporkan ke pengembang")
            }
        })
    })

    $(document).ready(function() {
        var error = $("#message").find(".alert.alert-danger")
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