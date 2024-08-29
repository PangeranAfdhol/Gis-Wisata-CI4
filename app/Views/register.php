<?= $this->extend('_layout/autentikasi/layout_root'); ?>

<?= $this->section('content') ?>

<div class="row justify-content-center pt-4">
    <div class="col-md-6">
        <div class="card pb-3">
            <div class="card-header">
                <h1 class="text-center">Register</h1>
            </div>
            <div class="card-body">
                <!-- validasi -->
                <?php
                $inputs = session()->getFlashdata('inputs');
                $errors = session()->getFlashdata('errors');
                $success = session()->getFlashdata('success');
                $warning = session()->getFlashdata('warning');
                $danger = session()->getFlashdata('danger');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger " role="alert">
                        Ada kesalahan data, yaitu:
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php }
                if (!empty($success)) { ?>
                    <div class="alert alert-success ">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php }
                if (!empty($warning)) { ?>
                    <div class="alert alert-warning ">
                        <?php echo session()->getFlashdata('warning'); ?>
                    </div>
                <?php }
                if (!empty($danger)) { ?>
                    <div class="alert alert-danger ">
                        <?php echo session()->getFlashdata('danger'); ?>
                    </div>
                <?php } ?>
                <!-- end validasi -->

                <!-- form register -->
                <form action="<?= base_url('autentikasi/register/proses-register'); ?>" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3" id="show_hide_password">
                                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
                                    <div class="input-group-append">
                                        <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3" id="show_hide_konfirm_password">
                                    <input type="password" class="form-control" name="konfirmasi_pwd" id="konfirmasi_pwd" placeholder="Konfirmasi Password">
                                    <div class="input-group-append">
                                        <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No Telepon">
                    </div>

                    <input type="hidden" class="form-control" name="role" id="role" value="User">

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                </form>
                <!-- end form register -->
            </div>
            <div class="card-footer text-center">
                <a href="<?= base_url('autentikasi/login'); ?>"><i class="fa fa-sign-in-alt" aria-hidden="true"></i> Login Akun</a>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-12">
                    <div class="copyright text-center  text-lg-center  text-muted">
                        &copy; <?= date('Y'); ?>
                        <a href="https://pangeranafdhol.github.io" class="font-weight-bold ml-1" target="_blank">Pangeran Afdhol</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript') ?>

<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });

        $("#show_hide_konfirm_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_konfirm_password input').attr("type") == "text") {
                $('#show_hide_konfirm_password input').attr('type', 'password');
                $('#show_hide_konfirm_password i').addClass("fa-eye-slash");
                $('#show_hide_konfirm_password i').removeClass("fa-eye");
            } else if ($('#show_hide_konfirm_password input').attr("type") == "password") {
                $('#show_hide_konfirm_password input').attr('type', 'text');
                $('#show_hide_konfirm_password i').removeClass("fa-eye-slash");
                $('#show_hide_konfirm_password i').addClass("fa-eye");
            }
        });
    });
</script>

<?= $this->endSection(); ?>