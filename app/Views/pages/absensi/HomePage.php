<?= $this->extend('layout/absensi/AbsensiLayout') ?>
<?= $this->section('content') ?>

<?php if (session('success')) : ?>
    <?= $this->include('components/alert_success') ?>
<?php elseif (session('error')) : ?>
    <?= $this->include('components/alert_error') ?>
<?php endif; ?>

<section class="content">
    <div class="content-left">
        <div class="content-1">
            <p>Selamat datang <span><?= session('nama') ?></span></p>
            <div><?= date("d M Y") ?></div>
            <div>08:00 - 17:00</div>

        </div>
        <div class="content-2">
            <a href="/absensi/masuk" class="masuk">Masuk</a>
            <div class="timer">
                <span id="jam"></span><span>:</span>
                <span id="menit"></span><span>:</span>
                <span id="detik"></span>
            </div>
            <a href="/absensi/keluar/<?= $absensi_masuk['id_absensi'] ?? 0 ?>" class="keluar">Keluar</a>
        </div>
    </div>
    <div class="content-right">
        <!-- title -->
        <div class="content-right-title">
            <h6>Absensi</h6>
            <a href="/absensi/log-absensi">Lihat log</a>
        </div>
        <!-- show data -->
        <?php if ($absensi_masuk) : ?>
            <div class="content-right-data">
                <p><?= $absensi_masuk['in'] ?></p>
                <p>Masuk</p>
            </div>
        <?php endif; ?>
        <?php if ($absensi_keluar) : ?>
            <div class="content-right-data">
                <p><?= $absensi_keluar['out'] ?></p>
                <p>Keluar</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
</script>
<?= $this->endSection() ?>