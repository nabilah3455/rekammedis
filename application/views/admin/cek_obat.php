<style>
    .data td,
    .catatan td {
        padding-bottom: 1rem;
    }

    .menu {
        padding-bottom: 1rem;
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
        <h3><b><?= $title ?></b></h3>
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
                    <div class="col-xs-8">
                        <div class="box">
                            <div class="box-header">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered table-striped" width="100%" id="example1">
                                        <thead>
                                            <tr>
                                                <td width='1px'>No</td>
                                                <th width="36%">Nama Obat</th>
                                                <th width=20%>Total</th>
                                                <th>Jumlah Obat yang Dibituhkan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($obat as $o) { ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $o['nama_obat'] ?></td>
                                                    <td><?= $o['stok'] ?> <?= $o['satuan'] ?></td>
                                                    <td>
                                                        <form action="<?= base_url('obat/update_jml_obat') ?>" method="POST">
                                                            <input type="hidden" name="kode_obat" id="kode_obat" value="<?= $o['kode_obat'] ?>">
                                                            <input type="hidden" name="stok" id="stok" value="<?= $o['stok'] ?>">
                                                            <input type="hidden" name="id" id="id" value="<?= $id ?>">
                                                            <input type="number" name="jml_obat" id="" style="width: 70px;">
                                                            <button class="btn btn-success"><i class="fa fa-refresh"></i> Update Obat</button>
                                                        </form>
                                                    </td>
                                                <?php $no++;
                                            } ?>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="box">
                                <div class="box-header">
                                    <h4><b>Data Pasien</b></h4>
                                    <hr>
                                    <table class="box-body">
                                        <?php foreach ($items as $i) { ?>
                                            <tr>
                                                <th style="padding-right: 2rem;">Tanggal</th>
                                                <td>:</td>
                                                <td><b><?= $i['tanggal'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-right: 2rem;">No.Rekam.Medis</th>
                                                <td>:</td>
                                                <td><b><?= $i['no_medis'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-right: 2rem;">Nama Pasien</th>
                                                <td>:</td>
                                                <td><b><?= $i['nama_pasien'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-right: 2rem;">Umur</th>
                                                <td>:</td>
                                                <td><b><?= $i['umur'] ?> Tahun</b></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-right: 2rem;">Alamat</th>
                                                <td>:</td>
                                                <td><b><?= $i['alamat'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-right: 2rem;">Tensi</th>
                                                <td>:</td>
                                                <td><b><?= $i['tensi'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-right: 2rem;">Diagnosa</th>
                                                <td>:</td>
                                                <td><b><?= $i['diagnosa'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-right: 2rem;">Terapi</th>
                                                <td>:</td>
                                                <td><b><?= $i['terapi'] ?></b></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="menu">
                                <button class="btn btn-warning col-lg-12" data-toggle="modal" data-target="#catatan">Obat Tidak Cukup? Hubungi Dokter</button><br>
                                <a href="<?= base_url('medis/akhiri_sesi') ?>?id=<?= $id ?>" class="btn btn-success col-lg-12">Selesai Ambil Obat</a>
                            </div>
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
        <strong>Copyright &copy; Aplikasi Rekam Medis Klinik Rumah Sehat Eriadio <?= date('Y', $date); ?></br>.</strong>
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

<!-- /.modal -->
<!-- DataTables -->
<script>
    $(document).ready(function() {
        tampil_data();
        $('#example1').dataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'scrollX': true,
            'coloumnDefs': [{
                "width": "90%",
                "targets": 1
            }]
        });

        function tampil_data() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url() ?>obat/tampil_data_obat',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var n = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + n++ + '</td>' +
                            '<td>' + data[i].kode_obat + '</td>' +
                            '<td>' + data[i].nama_obat + '</td>' +
                            '<td>' + data[i].kategori + '</td>' +
                            '<td>' + data[i].stok + '</td>' +
                            '<td>' + data[i].satuan + '</td>' +
                            '<td>' + data[i].tanggal_masuk + '</td>' +
                            '<td>' + "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'></button>" + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
    });

    function hapus(id) {
        if (confirm('Hapus Kategori Obat?')) {
            window.location = 'hapus_obat?id=' + id + 'refresh';
        } else {
            function hapus(id) {
                window.location = 'tampil_obat', 'refresh';
            }
        }
    }

    function edit(id) {
        window.location = 'edit_obat?id=' + id;
    }
</script>