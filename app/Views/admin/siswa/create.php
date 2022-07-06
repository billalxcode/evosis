<?= $this->extend("admin/layout/app"); ?>

<?= $this->section("content"); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl" id="alert">
            <?php if (session()->getFlashdata("success")) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <span id="message"><?= session()->getFlashdata('success') ?></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
        </div>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Siswa</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/siswa/save') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nisn">Nomor Induk Siswa</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="nisn-icon" class="input-group-text"><i class="bx bxs-id-card"></i></span>
                                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukan NISN Siswa" aria-label="NISN" aria-describedby="name-icon" />
                                </div>
                                <?php if (isset(session()->getFlashdata('errors')['nisn'])) : ?>
                                    <small class="form-text text-danger"><?= session()->getFlashdata('errors')['nisn'] ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="name-icon" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="name" name="nama" placeholder="Masukan Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="name-icon" />
                                </div>
                                <?php if (isset(session()->getFlashdata('errors')['nama'])) : ?>
                                    <small class="form-text text-danger"><?= session()->getFlashdata('errors')['nama'] ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="kelas">Kelas</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="kelas2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <select class="form-select" id="kelas" name="kelas" aria-label="Pilih kelas">
                                        <option selected>Silahkan Pilih Kelas</option>
                                    </select>
                                </div>
                                <?php if (isset(session()->getFlashdata('errors')['kelas'])) : ?>
                                    <small class="form-text text-danger"><?= session()->getFlashdata('errors')['kelas'] ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="kelamin">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class='bx bx-male-sign'></i></span>
                                    <select class="form-select" name="kelamin" id="kelamin" aria-label="Pilih Kelamin">
                                        <option selected>Silahkan Pilih Kelamin</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-Laki</option>
                                    </select>
                                </div>
                                <?php if (isset(session()->getFlashdata('errors')['kelamin'])) : ?>
                                    <small class="form-text text-danger"><?= session()->getFlashdata('errors')['kelamin'] ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3 form-password-toggle">
                            <label class="col-sm-2 form-label" for="password">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    <input type="password" id="password" name="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                </div>

                                <?php if (isset(session()->getFlashdata('errors')['password'])) : ?>
                                    <small class="form-text text-danger"><?= session()->getFlashdata('errors')['password'] ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary float-end mx-1"><i class='fa fa-save'></i> Simpan</button>
                                <button type="button" class="btn btn-primary float-end mx-1" data-bs-toggle="modal" data-bs-target="#passwordGeneratorModal"><i class="fa fa-key"></i> Buat Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="passwordGeneratorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordGeneratorLabel">Buat Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="error">
                </div>
                <div class="row">
                    <div class="col mb-0">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-clipboard"></i></span>
                            <input type="text" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <button class="btn btn-primary" id="randomPassword">Generate</button>
                        </div>
                    </div>
                </div>
                <div class="row g-2 mt-3">
                    <div class="col mb-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="isLowercase" alphabet="abcdefghijklmnopqrstuvwxyz" />
                            <label class="form-check-label" for="isLowercase">
                                Gunakan huruf kecil (a-z)
                            </label>
                        </div>
                    </div>

                    <div class="col mb-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="isUppercase" alphabet="ABDEFGHIJKMNOPQRSTUVWXYZ" />
                            <label class="form-check-label" for="isUppercase">
                                Gunakan huruf besar (A-Z)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row g-2 mt-1">
                    <div class="col mb-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="isLowercase" alphabet="123456789" />
                            <label class="form-check-label" for="isNumber">
                                Gunakan angka (1-9)
                            </label>
                        </div>
                    </div>

                    <div class="col mb-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="isUppercase" alphabet="!@#$&*_-" />
                            <label class="form-check-label" for="isSymbol">
                                Gunakan simbol (!@#$&*_-)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row g-2 mt-3">
                    <div class="col mb-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="isCopy" />
                            <label class="form-check-label" for="isCopy">
                                Saya telah salin password
                            </label>
                        </div>
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
    window["alphabet_lowercase"] = "abcdefghijklmnopqrstuvwxyz"
    window['alphabet_uppercase'] = String(window['alphabet_lowercase']).toUpperCase()
    window['alphabet_number'] = '123456789'
    window['alphabet_symbol'] = "!@#$&*_-"
    window['characters'] = ''

    window['password'] = ''

    $(".cursor-pointer").on("click", function() {
        var formPasswordToggle = $(".form-password-toggle")
        var formPasswordInput = formPasswordToggle.find("input")
        var formPasswordIcon = formPasswordToggle.find("i")

        if (formPasswordInput.attr("type") == "password") {
            formPasswordInput.attr("type", "text")
            formPasswordIcon.removeClass("bx-show").addClass("bx-hide")
        } else {
            formPasswordInput.attr("type", "password")
            formPasswordIcon.removeClass("bx-hide").addClass("bx-show")
        }
    })

    $("#passwordGeneratorModal").on("show.bs.modal", function(event) {
        function showModalError(message) {
            var alert = document.createElement("div")
            alert.className = "alert alert-danger"
            alert.innerText = message
            var element = $("#passwordGeneratorModal").find(".row#error")
            element.append(alert)
            var error = $(element).find(".alert.alert-danger")
            error.slideDown(500, function() {
                setTimeout(function() {
                    error.slideUp(500, function() {
                        error.remove()
                    })
                }, 2000)
            })
        }

        $("#isCopy").on("change", function(event) {
            if ($("#isCopy").is(":checked")) {
                $(".modal-footer button.btn-primary").prop("disabled", false)
            } else {
                $(".modal-footer button.btn-primary").prop("disabled", true)
            }
        })

        $(".modal-footer button.btn-primary").on("click", function() {
            if (window['password'].length >= 1) {
                $(".form-password-toggle").find("input#password").val(window['password'])
                $("#passwordGeneratorModal").modal("hide")
            }
        })

        $("#randomPassword").on("click", function() {
            if (window['characters'].length >= 1) {
                var result = ""
                var length = Math.floor(Math.random() * (Math.floor(6), Math.ceil(6) + 1)) + Math.floor(6)
                for (var i = 0; i < length; i++) {
                    result += window['characters'].charAt(Math.floor(Math.random() * window['characters'].length))
                }
                window['password'] = result
                $("#passwordGeneratorModal").find("input#password").val(result)
            } else {
                showModalError("Mohon centang opsi dibawah!")
            }
        })

        var inputCheckbox = $("input[type='checkbox']")
        inputCheckbox.each((idx, element) => {
            if (element.id != "isCopy") {
                element.addEventListener("change", (event) => {
                    var alphabet = element.getAttribute("alphabet")
                    if (element.checked) {
                        window['characters'] += alphabet
                    } else {
                        window['characters'] = String(window['characters']).replace(alphabet, '')
                    }
                })
            }
        })
    })

    $(document).ready(function() {
        $.ajax({
            async: true,
            cache: false,
            url: window['BASE_URL'] + '/api/kelas/getall',
            method: 'POST',
            success: function(response) {
                if (response['data'].length >= 1) {
                    response['data'].forEach(async function(data) {
                        var option = document.createElement("option")
                        option.value = data.id
                        option.text = data.name
                        $("#kelas").append(option)
                    })
                }
            }
        })

        var alerts = $("#alert .alert")
        if (alerts.length >= 1) {
            setTimeout(function() {
                alerts.slideUp(500, function() {
                    alerts.remove()
                })
            }, 2000)
        }
    })
</script>
<?= $this->endSection(); ?>