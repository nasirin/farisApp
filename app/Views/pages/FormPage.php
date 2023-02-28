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
            <li class="active">Form Bonus</li>
        </ul>
    </div>
    
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Form Bonus
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
                                <span class="widget-caption">Form Bonus</span>
                            </div>
                            <div class="widget-body">
                                <div class="collapse in">
                                    <form role="form" action="/bonus/simpan" method="post">
                                        <div class="form-group">
                                            <label for="xsinput">Nama karyawan</label>
                                            
                                            <select name="nama" class="form-control input-sm" required>
                                                <option value="">-- Pilih karyawan --</option>
                                                <?php foreach ($employee as $value) :?>
                                                    <option value="<?=$value['id_user']?>"><?= $value['nama_user']?></option>
                                                    
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="definpu">Jabatan</label>
                                            <select name="jabatan" class="form-control input-sm" required>
                                                <option value="">-- Pilih --</option>
                                                <option value="kurir">Kurir</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sminput">Jumlah Hari Telat</label>
                                            <input type="number" min="0" class="form-control input-sm" id="sminput" placeholder="nomor" name="telat" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="lginput">Bulan Bonus</label>
                                                    <input type="text" name="bulan" class="form-control input-sm month-own" id="lginput" placeholder="Bulan Bonus" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="lginput">Tahun</label>
                                                    <input type="text" name="tahun" class="form-control input-sm date-own" id="lginput" placeholder="Tahun Bonus" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="xlginput">Pembawaan (Kg)</label>
                                            <input type="number" min="0" step="any" name="bawaan" class="form-control input-sm" id="xlginput" placeholder="Pembawaan" required>
                                            <span> <small>gunakan titik (.) sebagai koma</small></span>
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