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
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $title; ?></h3>
                    </div>
                    <div class="box-body">
                        <form role="form" method="POST" action="<?= base_url('medis/update_medis') ?>">
                            <?php
                            foreach ($items as $i) {
                            ?>
                                <div class="col-lg-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Nomor Rekam Medis</label>
                                        <input type="hidden" name="id" id="id" value="<?= $i['id'] ?>">
                                        <input type="text" class="form-control" id="no_medis" name="no_medis" value="<?= $i['no_medis'] ?>" readonly>
                                        <?= form_error('no_medis', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Tanggal</label>
                                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $i['tanggal'] ?>" readonly>
                                        <?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div>
                                    <label class="control-label">Anamnesi/ Diagnosa</label>
                                    <textarea name="diagnosa" id="diagnosa" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $i['diagnosa'] ?></textarea>
                                </div>
                                <div>
                                    <br>
                                    <label class="control-label">Terapi</label>
                                    <textarea name="terapi" id="terapi" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $i['terapi'] ?></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-success">Edit</button>
                                            <a class="btn btn-warning" onclick="window.history.back();">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
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
<!-- /.content -->

</div>
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