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
                    <!-- <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                        <div class="col-xs-10">
                            <select name="pasien" class="form-control">
                                <option>Nabilah</option>
                            </select>
                        </div>
                        <div class="col-xs-2">
                            <input type="submit" name="submit" class="btn btn-primary">
                        </div>
                        </div>
                    </div>
                </div> -->
                    <div class="col-xs-8">
                        <div class="box">
                            <div class="box-header">
                                <?php
                                foreach ($items as $i) {
                                ?>
                                    <a href="<?= base_url('medis/cetak') ?>?no_medis=<?= $i['no_medis'] ?>" class="btn btn-danger glyphicon glyphicon-print">Cetak</a>
                                <?php } ?>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table>
                                        <?php
                                        foreach ($items as $i) {
                                        ?>
                                            <tr>
                                                <td>No.Med.Rec</td>
                                                <td style="padding-left: 5px;">:</td>
                                                <td style="padding-right: 35rem;"><?= $i['no_medis'] ?></td>
                                                <!-- <td>No Peserta Akses</td>
                                                <td>:</td> -->
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td>Nama Pasien</td>
                                                <td>:</td>
                                                <td><?= $i['nama_pasien'] ?></td>
                                                <!-- <td><u>(<?= $i['nama_pasien'] ?>)</u></td> -->
                                            </tr>
                                            <tr>
                                                <td>Umur</td>
                                                <td>:</td>
                                                <td><?= $i['umur'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?= $i['alamat'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                    <br>
                                    <table id="example1" class="table table-bordered table-striped" width='100%'>
                                        <thead>
                                            <tr>
                                                <td width='1px'>No</td>
                                                <td width=60px>Tanggal</td>
                                                <td width=5px>Tensi</td>
                                                <td width=150px>Anamnese/ Diagnosa</td>
                                                <td width=20px>Terapi</td>
                                                <!-- <td width=5px>Action</td> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($medis as $m) { ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $m['tanggal'] ?></td>
                                                    <td><?= $m['tensi'] ?></td>
                                                    <td><?= $m['diagnosa'] ?></td>
                                                    <td>
                                                        <p style="height:100px; width:250px"><?= $m['terapi'] ?></p>
                                                    </td>
                                                    <!-- <td>
                                                        <a href="<?= base_url('medis/hapus_medis') ?>?id=<?= $m['id']; ?>&&no_medis=<?= $m['no_medis']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                                        </a>
                                                    </td> -->
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
                                    <form action="<?= base_url('user/update_rekam_medis') ?>" method="post">
                                        <input type="hidden" name="dokter" class="form-control" id="dokter" value="<?= $name ?>">
                                        <?php
                                        foreach ($get_id as $m) {
                                        ?>
                                            <input type="hidden" name="id" class="form-control" id="id" value="<?= $m['id'] ?>">
                                            <input type="hidden" name="no_medis" class="form-control" id="no_medis" value="<?= $m['no_medis'] ?>">
                                            <div>

                                                <label class="control-label">Tensi</label>
                                                <input type="text" class="form-control" name="tensi" id="tensi" value="<?= $m['tensi'] ?>" placeholder="Place some text here" required>
                                            </div>
                                            <div>
                                                <br>
                                                <label class="control-label">Anamnesi/ Diagnosa</label>
                                                <textarea class="textarea" name="diagnosa" id="diagnosa" placeholder="Place some text here" style="width: 100%; height: 50px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $m['diagnosa'] ?></textarea>
                                            </div>
                                            <div>
                                                <br>
                                                <label class="control-label">Terapi</label>
                                                <textarea class="textarea" name="terapi" id="terapi" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $m['terapi'] ?></textarea>
                                            </div><br>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                    <a href="" data-toggle="modal" data-target="#rujukan" class="btn btn-primary">Buat Rujukan</a>
                                                    <a href="<?= base_url('user/update_sesi') ?>?id=<?= $m['id'] ?>" class="btn btn-warning">Akhiri Sesi</a>
                                                <?php } ?>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- /.col-->
</div>
<!-- /.content-wrapper -->



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
<div class="modal" id="rujukan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Surat Rujukan
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('user/input_rujukan') ?>">
                    <?php foreach ($get_id as $m) { ?>
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= $m['id'] ?>">
                        <input type="hidden" name="no_medis" class="form-control" id="no_medis" value="<?= $m['no_medis'] ?>">
                    <?php } ?>
                    <input type="hidden" name="dokter" class="form-control" id="dokter" value="<?= $name ?>">
                    <label for="">Nama Rumah Sakit</label>
                    <!-- <input type="text" name="nama_rumah_sakit" id="nama_rumah_sakit" class="form-control" required> -->
                    <select name="nama_rumah_sakit" id="" class="form-control" required>
                        <option value="">-- Pilih Rumah Sakit --</option>
                        <option value="RSUD Ciawi">RSUD Ciawi</option>
                        <option value="RS PMI Bogor">RS PMI Bogor</option>
                        <option value="Rumah Sakit Salak">Rumah Sakit Salak</option>
                        <option value="RS Bhayangkara Bogor">RS Bhayangkara Bogor</option>
                        <option value="Rumah Sakit Bogor Medical center">Rumah Sakit Bogor Medical center</option>
                        <option value="Rumah Sakit Bogor Medika Dramaga">Rumah Sakit Bogor Medika Dramaga</option>
                    </select>

                    <label for="">Nama Poli</label>
                    <select name="nama_poli" id="" class="form-control" required>
                        <option value="">-- Pilih Poli --</option>
                        <option value="Umum">Umum</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Buat Rujukan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- /.modal -->
<!-- /.CKEDITOR -->
<!--<script>
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>-->
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
                url: '<?= base_url() ?>medis/data_rekam_medis',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var n = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + n++ + '</td>' +
                            '<td>' + data[i].tanggal_masuk + '</td>' +
                            '<td>' + data[i].diagnosa + '</td>' +
                            '<td>' + data[i].terapi + '</td>' +
                            '<td>' + "<button class='glyphicon glyphicon-edit btn btn-primary'  onclick='return edit(" + data[i].id + ")'></button> <button class='glyphicon glyphicon-trash btn btn-danger' onclick='return hapus(" + data[i].id + ")'></button>" + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
    });

    function hapus(id) {
        if (confirm('Hapus Obat?')) {
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