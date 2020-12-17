<style>
    .subjudul {
        color: black;
        font-family: 'Times New Roman', Times, serif;
    }
</style>

<div class="login-box">
    <div class="login-logo">
        <a><b>Rekam </b>Medis</a>
    </div>
    <!-- /.login-logo -->
    <div>
        <div class="login-box-body">
            <p class="login-box-msg"><b>Login Page</b></p>
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div><br><br>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>

                    <!-- /.col -->
                </div>
                <!-- <hr> -->
                <!-- /.social-auth-links -->
                <!-- <center> -->
                <!-- <a href="#">I forgot my password</a><br> -->
                <!-- <a href="<?= base_url('auth/registration') ?>" class="text-center">Register a new account!</a>
                </center> -->
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
</div>
<div>
    <center>
        <div class="subjudul">
            <h1>
                <i><b>KLINIK RUMAH SEHAT ERIADIO</b></i>
            </h1>
        </div>
    </center>
</div>
<!-- /.login-box -->