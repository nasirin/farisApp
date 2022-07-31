<?= $this->extend('layout/absensi/AbsensiLayout') ?>
<?= $this->section('content') ?>
<section class="log-absensi-container">

    <a class="title" href="<?= session('level') == 'karyawan' ? '/absensi' : '#' ?>">
        <?php if (session('level') == 'karyawan') : ?>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
            </svg>
        <?php endif ?>
        Daftar absensi
    </a>

    <form action="/absensi/log-absensi" method="POST" class="filter">
        <input type="month" name="date" class="filter-input" value="<?= $value ?>">
        <?php if (session('level') == 'admin') : ?>
            <select name="karyawan" class="filter-input">
                <option value='semua'> Semua</option>
                <?php foreach ($karyawan as $value) : ?>
                    <option value="<?= $value['id_user'] ?>" <?= $selected == $value['id_user'] ? 'selected' : '' ?>> <?= $value['nama_user'] ?></option>
                <?php endforeach; ?>
            </select>
        <?php endif ?>
        <button type="submit" name="btn" value="hasil" class="filter-btn">Tampilkan hasil</button>
        <?php if (session('level') == 'admin') : ?>
            <button type="submit" name="btn" value="download" class="filter-btn">Download</button>
        <?php endif ?>
    </form>

    <table class="table">
        <thead>
            <tr class="tbody-tr">
                <?php if (session('level') == 'admin') : ?>
                    <th>Nama</th>
                <?php endif ?>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($absensi_log as $value) : ?>
                <tr class="tbody-tr">
                    <?php if (session('level') == 'admin') : ?>
                        <td><?= $value['nama_user'] ?></td>
                    <?php endif ?>
                    <td class="tbody-td"><?= date('d D', strtotime($value['created_at'])) ?></td>
                    <td class="tbody-td"><?= date('H:i', strtotime($value['in'])) ?></td>
                    <td class="tbody-td"><?= $value['out'] ? date('H:i', strtotime($value['out'])) : '-' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?= $this->endSection() ?>