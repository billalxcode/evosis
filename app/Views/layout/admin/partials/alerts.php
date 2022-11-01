<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-delay">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php elseif (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-delay">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif ?>

<?= $this->section('alert-script'); ?>
    <script>
        $(document).ready(function() {
            let alert = $(".alert-delay")
            if (alert) {
                setInterval(function() {
                    alert.slideDown(500, function() {
                        alert.remove()
                    })
                }, 3000)
            }
        })
    </script>
<?= $this->endSection(); ?>