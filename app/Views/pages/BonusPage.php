<?= $this->extend('layout/HomeLayout') ?>
<?= $this->section('content') ?>
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">Data Bonus</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Data Bonus
            </h1>
        </div>
        <!--Header Buttons-->
        <div class="header-buttons">
            <a class="sidebar-toggler" href="#">
                <i class="fa fa-arrows-h"></i>
            </a>
            <a class="refresh" id="refresh-toggler" href="/">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a class="fullscreen" id="fullscreen-toggler" href="#">
                <i class="glyphicon glyphicon-fullscreen"></i>
            </a>
        </div>
        <!--Header Buttons End-->
    </div>
    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-12">
                        <div class="widget">
                            <div class="widget-header  with-footer">
                                <span class="widget-caption">Responsive Flip Scroll Tables</span>
                                <div class="widget-buttons">
                                    <a href="#" data-toggle="maximize">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                    <a href="#" data-toggle="collapse">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                    <a href="#" data-toggle="dispose">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content bordered-palegreen">
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Nama karyawan</th>
                                                <th>NIP</th>
                                                <th>Jabatan</th>
                                                <th>Bulan/Tahun</th>
                                                <th>Telat</th>
                                                <th>Nominal Bonus</th>
                                                <th>Denda</th>
                                                <th>Total Bonus</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($bonus as $data) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['nama_karyawan'] ?></td>
                                                    <td><?= $data['NIP'] ?></td>
                                                    <td><?= $data['jabatan'] ?></td>
                                                    <td><?= $data['bln_bonus'] . '/' . $data['thn_bonus']  ?></td>
                                                    <td><?= $data['jml_h_telat'] ?></td>
                                                    <td><?= 'Rp ' . number_format($data['bonus'], 0, ',', '.') ?></td>
                                                    <td><?= 'Rp ' . number_format($data['denda'], 0, ',', '.') ?></td>
                                                    <td><?= 'Rp ' . number_format($data['total'], 0, ',', '.') ?></td>
                                                    <td>
                                                        <a href="/bonus/print/<?= $data['id_bonus'] ?>" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-print"></i>Print</a>
                                                        <?php if (session('level') == 'admin') : ?>
                                                            <a href="/bonus/form/<?= $data['id_bonus'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>Edit</a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>
<?= $this->endSection() ?>