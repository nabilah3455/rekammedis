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
                                <a href="<?= base_url('pasien/cetak') ?>" class="btn btn-danger glyphicon glyphicon-print">Cetak</a>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped" width='150%'>
                                        <thead>
                                            <tr>
                                                <td width='1px'>No</td>
                                                <td width=1px>No.Med.Rec</td>
                                                <td width=120px>Nama Pasien</td>
                                                <td width=1px>Umur</td>
                                                <td width=90px>Alamat</td>
                                                <td width=10px>Kelurahan</td>
                                                <td width=10px>Kecamatan</td>
                                                <td width=1px>Provisi</td>
                                                <td width=1px>Kode Pos</td>
                                                <!-- <td width=10px>Kartu Pasien</td> -->
                                                <td width=10px>Tanggal Masuk</td>
                                                <td width=70px>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($items as $i) { ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $i['no_medis'] ?></td>
                                                    <td><?= $i['nama_pasien'] ?></td>
                                                    <td><?= $i['umur'] ?></td>
                                                    <td><?= $i['alamat'] ?></td>
                                                    <td><?= $i['kelurahan'] ?></td>
                                                    <td><?= $i['kecamatan'] ?></td>
                                                    <td><?= $i['provinsi'] ?></td>
                                                    <td><?= $i['kode_pos'] ?></td>
                                                    <!-- <td>
                                                        <a href="<?= base_url('pasien/kartu_pasien') ?>?no_medis=<?= $i['no_medis'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-file"></i></a>
                                                    </td> -->
                                                    <td><?= $i['tanggal_masuk'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('pasien/edit_pasien') ?>?id=<?= $i['id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                                        <button class='glyphicon glyphicon-trash btn btn-danger' onclick='return hapus(<?= $i['id'] ?>)'></button></a>
                                                    </td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
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
                                    <form action="<?= base_url('pasien/tambah_pasien') ?>" method="post">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">No Rekam Medis</label>
                                            <input type="text" class="form-control" id="no_rekam_medis" name="no_rekam_medis" placeholder="No rekam medis" value="<?= $no_medis ?>" minlength="9" maxlength="9" readonly>
                                            <?= form_error('no_rekam_medis', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label class="control-label">Nama Pasien</label>
                                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" value="<?= set_value('nama_pasien') ?>">
                                            <?= form_error('nama_pasien', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label class="control-label">Umur</label>
                                            <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur" value="<?= set_value('umur') ?>">
                                            <?= form_error('umur', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label class="control-label">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>">
                                            <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group has-feedback col-lg-6">
                                            <label class="control-label">Kelurahan</label>
                                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="kelurahan" value="<?= set_value('kelurahan') ?>">
                                            <span style='color:red'>optional</span>
                                        </div>
                                        <div class="form-group has-feedback col-lg-6">
                                            <label class="control-label">Kecamatan</label>
                                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="kecamatan" value="<?= set_value('kecamatan') ?>">
                                            <span style='color:red'>optional</span>
                                        </div>
                                        <div class="form-group has-feedback col-lg-6">
                                            <label class="control-label">Provinsi</label>
                                            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="provinsi" value="<?= set_value('provinsi') ?>">
                                            <span style='color:red'>optional</span>
                                        </div>
                                        <div class="form-group has-feedback col-lg-6">
                                            <label class="control-label">Kode Pos</label>
                                            <input type="text" class="form-control" id="kode Pos" name="kode_pos" placeholder="kode pos" value="<?= set_value('kode_pos') ?>" maxlength="5" minlength="5">
                                            <span style='color:red'>optional</span>
                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                url: '<?= base_url() ?>pasien/tampil_data_pasien',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var n = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + n++ + '</td>' +
                            '<td>' + data[i].no_medis + '</td>' +
                            '<td>' + data[i].nama_pasien + '</td>' +
                            '<td>' + data[i].umur + '</td>' +
                            '<td>' + data[i].alamat + '</td>' +
                            '<td>' + data[i].kelurahan + '</td>' +
                            '<td>' + data[i].kecamatan + '</td>' +
                            '<td>' + data[i].provinsi + '</td>' +
                            '<td>' + data[i].kode_pos + '</td>' +
                            '<td>' + "<button class='glyphicon glyphicon-file btn btn-primary'  onclick='return kartu(" + data[i].no_medis + ")'></button>" + '</td>' +
                            '<td width="100px">' + data[i].tanggal_masuk + '</td>' +
                            '<td>' + "<button class='glyphicon glyphicon-edit btn btn-primary'  onclick='return edit(" + data[i].id + ")'></button> <button class='glyphicon glyphicon-trash btn btn-danger' onclick='return hapus(" + data[i].id + ")'></button>" + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
    });

    function hapus(id) {
        if (confirm('Hapus pasien?')) {
            window.location = 'hapus_pasien?id=' + id + 'refresh';
        } else {
            function hapus(id) {
                window.location = 'tampil_pasien', 'refresh';
            }
        }
    }

    function edit(id) {
        window.location = 'edit_pasien?id=' + id;
    }

    function kartu(no_medis) {
        window.location = 'kartu_pasien?id=' + no_medis;
    }
</script>