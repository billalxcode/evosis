<?= $this->extend("admin/layout/app"); ?>

<?= $this->section("content"); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Kandidat</h5>
                    <?= (session()->getFlashdata('errors') ? var_dump(session()->getFlashdata('errors')) : '') ?>
                </div>
                <form action="<?= base_url('admin/kandidat/save') ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="<?= base_url('assets/img/avatars/1.png') ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" name="avatar" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nisn_ketua">NISN calon Ketua</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="nisn_ketua-icon" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="nisn_ketua" id="nisn_ketua" placeholder="Masukan NISN Ketua Osis" aria-label="NISN Ketua Osis" aria-describedby="name-icon" />
                                    <button type="button" class="btn btn-primary" id="btn-select" data-bs-toggle="modal" data-bs-target="#selectSiswa">Pilih siswa</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nisn_wakil">NISN wakil Ketua</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="nisn_wakil-icon" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="nisn_wakil" id="nisn_wakil" placeholder="Masukan NISN Wakil Osis" aria-label="NISN Wakil Osis" aria-describedby="name-icon" />
                                    <button type="button" class="btn btn-primary" id="btn-select" data-bs-toggle="modal" data-bs-target="#selectSiswa">Pilih siswa</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="organisasi">Organisasi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="organisasi2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="text" name="organisasi" id="organisasi" class="form-control" placeholder="Masukan Organisasi" aria-label="Organisasi" aria-describedby="name-icon">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="visi">Visi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="visi2" class="input-group-text"><i class="bx bx-rocket"></i></span>
                                    <input type="text" name="visi" id="visi" class="form-control" placeholder="Masukan Visi" aria-label="visi" aria-describedby="name-icon">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="misi">Misi</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="misi2" class="input-group-text"><i class="bx bx-rocket"></i></span>
                                    <input type="text" name="misi" id="misi" class="form-control" placeholder="Masukan Misi" aria-label="misi" aria-describedby="name-icon">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary float-end mx-1"><i class='fa fa-save'></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="selectSiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectSiswaLabel">Pilih Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="error">
                </div>
                <div class="row">
                    <div class="col-12 mb-0">
                        <table class="table table-responsive" id="siswaTable" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" disabled>Selesai</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.Helpers.setAutoUpdate(true);
    window['tables'] = null
    window['prevButton'] = null

    $("#upload").on("change", function(event) {
        var [files] = event.target.files
        var reader = new FileReader()
        reader.onload = function() {
            $("#uploadedAvatar").attr("src", reader.result)
        }
        reader.readAsDataURL(files)
    })

    $(document).on("click", "#btn-select", function() {
        window['prevButton'] = this
    })

    $("#selectSiswa").on("show.bs.modal", function(event) {
        $(document).on("click", ".modal-footer>.btn.btn-primary", function() {
            $("#selectSiswa").modal("hide")
        })

        $(document).on("click", "#btn-save", function(event) {
            var nisn = $(this).data("nisn")
            if (window['prevButton'] != null) {
                var prevInput = $(window['prevButton']).prev()
                prevInput.val(nisn)
                $(".modal-footer").find("button.btn.btn-primary").prop("disabled", false)
            }
        })

        if (!$.fn.DataTable.isDataTable("#siswaTable")) {
            window['tables'] = $(this).find("#siswaTable").DataTable({
                processing: true,
                ajax: {
                    'url': window['BASE_URL'] + '/api/siswa/getall',
                    'method': 'POST'
                },
                columns: [{
                        'data': 'nisn',
                    },
                    {
                        'data': 'nama_lengkap',
                    },
                    {
                        'data': 'jenis_kelamin',
                    },
                    {
                        'data': 'kelas',
                    },
                    {
                        'data': 'nisn'
                    }
                ],
                columnDefs: [{
                        targets: 3,
                        render: function(data, type, row) {
                            window['result'] = 'Tidak diketahui'
                            $.ajax({
                                async: false,
                                url: window['BASE_URL'] + '/api/kelas/search',
                                method: 'POST',
                                data: {
                                    'kelasid': data,
                                    'filter': 'first'
                                },
                                success: function(response) {
                                    if (response['error'] != true) {
                                        window['result'] = response['data']['name']
                                    }
                                }
                            })
                            return window['result']
                        }
                    },
                    {
                        targets: 4,
                        render: function(data, type, row) {
                            return '<button class="btn btn-outline-primary btn-sm" id="btn-save" data-nisn="' + data + '"><i class="bx bx-check"></i></button>'
                        }
                    }
                ]
            })
        }
    })

    $(document).ready(function() {

    })
</script>
<?= $this->endSection(); ?>