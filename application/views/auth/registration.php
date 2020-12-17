<div class="register-box">
    <div class="register-logo">
        <a><b>Rekam </b>Medis</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="<?= base_url('auth/registration') ?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" id="name" name="name" placeholder="Full name" value="<?= set_value('name') ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <?= form_error('name', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->