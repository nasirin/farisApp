<?= $this->extend('layout/absensi/AbsensiLayout') ?>
<?= $this->section('content') ?>
<section class="log-absensi-container">
    <a class="title" href="/absensi">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
        </svg>
        Daftar absensi
    </a>

    <form action="/absensi/log-absensi" method="POST" class="filter">
        <input type="month" name="date" class="filter-input" value="<?= $value ?>">
        <button type="submit" class="filter-btn">Tampilkan hasil</button>
    </form>

    <table class="table">
        <thead>
            <tr class="tbody-tr">
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($absensi_log as $value) : ?>
                <tr class="tbody-tr">
                    <td class="tbody-td"><?= date('d D', strtotime($value['created_at'])) ?></td>
                    <td class="tbody-td"><?= date('H:i', strtotime($value['in'])) ?></td>
                    <td class="tbody-td"><?= date('H:i', strtotime($value['out'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= $this->endSection() ?>