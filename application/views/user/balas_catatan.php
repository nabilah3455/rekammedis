<style>
    .data_pasien td,
    .catatan td {
        padding-bottom: 1rem;
    }

    .balasan {
        padding-left: 5rem;
    }

    .btn_balas {
        float: right;
        padding-top: 1rem;
    }
</style>

<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Medis</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>REKAM </b>MEDIS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="user-image" alt="User Image" src="<?= base_url('assets/dist/img/profile/') . $avatar ?>">
                        <span class="hidden-xs"><?= $name ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img class="img-circle" alt="User Image" src="<?= base_url('assets/dist/img/profile/') . $avatar ?>">
                            <p>
                                <?= $name; ?>
                                <small>Member since <?= date('d F Y', $date); ?></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url('admin/edit_profile'); ?>" class="btn btn-default btn-flat">Edit Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" data-toggle="modal" data-target="#logout" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- =============================================== -->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <!-- <h3><b><?= $title ?></b></h3> -->
        <!-- Main content -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message');  ?>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="box-title" style="padding-bottom: 3rem; font-weight: 600; font-size: 25px;">
                                                Data Pasien
                                            </div>
                                            <table width=100% class="data_pasien">
                                                <?php foreach ($items as $i) { ?>
                                                    <tr>
                                                        <th width="30%">No.Rec.Medis</th>
                                                        <th width="4%">:</th>
                                                        <td><?= $i['no_medis'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Pasien</th>
                                                        <th>:</th>
                                                        <td><?= $i['nama_pasien'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Umur</th>
                                                        <th>:</th>
                                                        <td><?= $i['umur'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tensi</th>
                                                        <th>:</th>
                                                        <td><?= $i['tensi'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Diagnosa</th>
                                                        <th>:</th>
                                                        <td><?= $i['diagnosa'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th valign=center>Terapi</th>
                                                        <th>:</th>
                                                        <td><?= $i['terapi'] ?></td>
                                                    </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="box-title" style="padding-bottom: 3rem; font-weight: 600; font-size: 25px;">
                                                Catatan
                                            </div>
                                            <br><textarea name="catatan" id="catatan" cols="30" rows="3" class="form-control" readonly><?= $i['catatan'] ?></textarea>
                                            <?php if ($i['catatan_1'] != null) { ?>
                                                Balasan : <br>
                                                <br><textarea name="catatan" id="catatan" cols="30" rows="3" class="form-control" readonly><?= $i['catatan_1'] ?></textarea>
                                            <?php } ?>
                                            <form action="<?= base_url('user/tambah_catatan') ?>" method="POST">
                                                <input type="hidden" name="id_rekam" id="id_rekam" value="<?= $i['id_rekam'] ?>">
                                                <input type="hidden" name="id" id="id" value="<?= $i['id'] ?>">
                                                <div class="balasan">
                                                    <br><label for="">Balasan :</label><br>
                                                    <textarea name="catatan" id="catatan" cols="30" rows="3" class="form-control"></textarea>
                                                    <div class="btn_balas">
                                                        <button class="btn btn-primary">Balas</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
            </section>
        </div>
    </section>
</div>

<!-- /.content-wrapper -->
<div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> Beta
        </div>
        <strong>Copyright &copy; Aplikasi Rekam Medis Klinik Rumah Sehat Eriadio <?= date('Y', $date); ?></a>.</strong>
    </footer>
</div>

<!-- /.modal-dialog -->
<!--modal-->
<div class="modal" id="logout" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ready to leave?
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body">
                <p>Select "Logout" below if you are ready to end current session.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!--modal-->
<div class="modal" id="catatan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Catatan
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('obat/catatan') ?>" method="POST">
                    <?php foreach ($items as $i) { ?>
                        <input type="hidden" name="id_rekam" id="id_rekam" value="<?= $i['id_rekam'] ?>">
                        <label for="">Catatan untuk Dokter :</label><br>
                        <textarea name="catatan" id="catatan" cols="30" rows="3" class="form-control"></textarea>
                    <?php } ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" href="">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>