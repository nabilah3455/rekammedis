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
                    <div class="col-lg-12">
                        <a href="<?= base_url('admin/tambah_user') ?>" class="btn btn-primary">Tambah Data User</a>
                        <div class="box">
                            <div class="box-header">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped" width='100%'>
                                        <thead>
                                            <tr>
                                                <td width=1px>No</td>
                                                <td width=150px>Nama</td>
                                                <td width=150px>Email</td>
                                                <!-- <td width=5px>Password</td> -->
                                                <td width=10px>Status</td>
                                                <td width=100px>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody id='show_data'>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </section>
        </div>
    </section>
</div>
<!-- /.box -->
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
                url: '<?= base_url() ?>admin/tampil_data_user',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var n = 1;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + n++ + '</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td>' + data[i].email + '</td>' +
                            // '<td>' + data[i].password + '</td>' +
                            '<td>' + data[i].status + '</td>' +
                            '<td>' + "<button class='glyphicon glyphicon-edit btn btn-primary'  onclick='return edit(" + data[i].id + ")'></button> <button class='glyphicon glyphicon-trash btn btn-danger' onclick='return hapus(" + data[i].id + ")'></button>" + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
    });

    function hapus(id) {
        if (confirm('Hapus User?')) {
            window.location = 'hapus_user?id=' + id + 'refresh';
        } else {
            function hapus(id) {
                window.location = 'tampil_user', 'refresh';
            }
        }
    }

    function edit(id) {
        window.location = 'edit_user?id=' + id;
    }
</script>