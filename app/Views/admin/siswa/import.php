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
                    <h5 class="mb-0">Import Siswa</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/siswa/process') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="file">Tipe File</label>
                            <div class="col-sm-10">
                                <select name="filetype" id="filetype" class="form-select">
                                    <option value="xlsx">Excel Workbook (*.xlsx)</option>
                                    <option value="xls">Excel 97- Excel 2003 Workbook (*.xls)</option>
                                    <option value="ods">OpenDocument Spreadsheet (*.ods)</option>
                                    <option value="csv">CSV (comma delimited) (*.csv)</option>
                                </select>
                                <?php if (isset(session()->getFlashdata('errors')['filetype'])) : ?>
                                    <small class="form-text text-danger"><?= session()->getFlashdata('errors')['filetype'] ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="file">File Siswa</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="file" name="file" placeholder="Masukan file Siswa" aria-label="file" aria-describedby="name-icon" />
                                <?php if (isset(session()->getFlashdata('errors')['file'])) : ?>
                                    <small class="form-text text-danger"><?= session()->getFlashdata('errors')['file'] ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary float-end mx-1"><i class='fa fa-save'></i> Simpan</button>
                                <button type="button" class="btn btn-success float-end mx-1"><i class='fa fa-download'></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("change", "#filetype", function() {
        var IGNROE = ['csv', 'xls', 'ods']
        var selected = $(this).val()
        if (IGNROE.includes(selected)) {
            $("form").find("button.btn.btn-primary").prop("disabled", true)
            var alert = document.createElement("div")
            alert.className = "alert alert-warning"
            alert.innerText = "Mohon maaf fitur ini dalam pengembangan. Silahkan tunggu pembaharuan selanjutnya."
            if ($("#alert>.alert.alert-warning").length == 0) {
                $("#alert").append(alert)
            }
        } else {
            $("form").find("button.btn.btn-primary").prop("disabled", false)
            $("#alert>.alert.alert-warning").slideUp(500, function () {
                $(this).remove()
            })
        }
    })

    $(document).ready(function() {
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