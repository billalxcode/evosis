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
            <?php elseif (session()->getFlashdata("error")) : ?>
                <div class="alert alert-danger" role="alert">
                    <span id="message"><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif ?>
        </div>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Import Siswa</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/siswa/process') ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="filetype">Tipe File</label>
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
                            <label class="col-sm-2 col-form-label" for="userfile">File Siswa</label>
                            <div class="col-sm-10">
                                <input type="file" name="userfile" id="userfile" class="form-control">
                                <?php if (isset(session()->getFlashdata('errors')['userfile'])) : ?>
                                    <small class="form-text text-danger"><?= session()->getFlashdata('errors')['userfile'] ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary float-end mx-1"><i class='fa fa-save'></i> Simpan</button>
                                <button type="button" class="btn btn-success float-end mx-1" data-bs-toggle="modal" data-bs-target="#templateModal"><i class='fa fa-download'></i> Template</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class=" modal fade" id="templateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="templateModalLabel">Template List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mx-auto">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <p class="float-start">Excel Workbook (*.xlsx)</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <a href="<?= base_url('template/template-siswa.xlsx') ?>" class="btn btn-primary float-end">
                            <i class="fa fa-download"></i> Download
                        </a>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <p class="float-start">Excel 97-2003 (*.xls)</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                        <a href="<?= base_url('template/template-siswa.xls') ?>" class="btn btn-primary float-end">
                            <i class="fa fa-download"></i> Download
                        </a>
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
    $(document).on("submit", "form", function (event) {
        var button = $(this).find("button[type=submit]")
        if (button.length >= 1) {
            button.prop("disabled", true)
            button.html(
                "<i class='fa fa-spinner fa-spin'></i> Proses"
            )
        }
    })

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
            $("#alert>.alert.alert-warning").slideUp(500, function() {
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