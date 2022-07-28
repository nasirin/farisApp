<?= $this->extend('layout/HomeLayout') ?>
<?= $this->section('content') ?>
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="/">Home</a>
            </li>
            <li class="active">Form Karyawan</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Form Karyawan
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
                    <div class="col-12 ">
                        <?php if (session('success')) : ?>
                            <div class="alert alert-success fade in">
                                <button class="close" data-dismiss="alert">
                                    ×
                                </button>
                                <i class="fa-fw fa fa-check"></i>
                                <strong>Success</strong> <?= session('success') ?>
                            </div>
                        <?php endif; ?>

                        <div class="widget">
                            <div class="widget-header bordered-top bordered-palegreen">
                                <span class="widget-caption">Form Karyawan</span>
                            </div>
                            <div class="widget-body">
                                <div class="collapse in">
                                    <form role="form" action="/karyawan/form" method="post">
                                        <div class="form-group">
                                            <label for="xsinput">Nama karyawan</label>
                                            <input type="text" class="form-control input-sm" name="nama" required id="xsinput" placeholder="Nama karyawan">
                                        </div>
                                        <div class="form-group">
                                            <label for="sminput">Nomor induk pegawai</label>
                                            <input type="text" class="form-control input-sm" id="sminput" placeholder="nomor" name="nik" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sminput">Telepon</label>
                                            <input type="text" class="form-control input-sm" id="sminput" placeholder="nomor" name="notelp" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="definpu">Jabatan</label>
                                            <select name="level" class="form-control input-sm" required>
                                                <option value="karyawan">karyawan</option>
                                                <option value="admin">admin</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-blue">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>