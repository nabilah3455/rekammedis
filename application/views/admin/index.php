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

<!-- ./col -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <h3><b><?= $title ?></b></h3>
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message');  ?>
            </div>
        </div>
        <!-- box jumlah  -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?= $jml_user; ?></h3>
                    <p>Jumlah User</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="<?= base_url('admin/tampil_user') ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $jml_obat; ?></h3>
                    <p>Jumlah Obat</p>
                </div>
                <div class="icon">
                    <i class="fa fa-ambulance"></i>
                </div>
                <a href="<?= base_url('obat/tampil_obat') ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $jml_dokter; ?></h3>

                    <p>Jumlah Dokter</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-md"></i>
                </div>
                <a href="<?= base_url('dokter') ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $jml_pasien; ?></h3>

                    <p>Jumlah Pasien</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?= base_url('pasien/tampil_pasien') ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- /.col (LEFT) -->
        <div class="col-md-12">
            <!-- LINE CHART -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>GRAFIK PASIEN TAHUN <?= date('Y', $date); ?>.</b></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="bar-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->

</div>

<!-- ./wrapper -->
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
<script type="text/javascript">
    var grafik = <?= $datagrafik; ?>;
</script>
<script type="text/javascript">
    var datajanuari = <?= $datagrafik; ?>;
    var datafebuari = <?= $datagrafik2; ?>;
    var datamaret = <?= $datagrafik3; ?>;
    var dataapril = <?= $datagrafik4; ?>;
    var datamei = <?= $datagrafik5; ?>;
    var datajuni = <?= $datagrafik6; ?>;
    var datajuli = <?= $datagrafik7; ?>;
    var datagustus = <?= $datagrafik8; ?>;
    var dataseptember = <?= $datagrafik9; ?>;
    var dataoktober = <?= $datagrafik10; ?>;
    var datanovember = <?= $datagrafik11; ?>;
    var datadesember = <?= $datagrafik12; ?>;
</script>
<script>
    $(function() {
        var bar_data = {
            data: [
                ['Jan', datajanuari],
                ['Feb', datafebuari],
                ['Mar', datamaret],
                ['Apr', dataapril],
                ['Mei', datamei],
                ['Jun', datajuni],
                ['Jul', datajuli],
                ['Agu', datagustus],
                ['Sep', dataseptember],
                ['Okt', dataoktober],
                ['Nov', datanovember],
                ['Des', datadesember],

            ],
            color: '#3c8dbc'
        }
        $.plot('#bar-chart', [bar_data], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: 'center'
                }
            },
            xaxis: {
                mode: 'categories',
                tickLength: 0
            }
        })
    })
</script>
<div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> Beta
        </div>
        <strong>Copyright &copy; Aplikasi Rekam Medis Klinik Rumah Sehat Eriadio <?= date('Y', $date); ?></a>.</strong>
    </footer>
</div>