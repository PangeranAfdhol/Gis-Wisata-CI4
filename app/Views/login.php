<?= $this->extend('_layout/autentikasi/layout_root'); ?>

<?= $this->section('content') ?>

    <div class="row justify-content-center pt-9">
        <div class="col-md-4">
            <div class="card pb-3">
                <div class="card-header">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <!-- validasi -->
                    <?php 
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
                    $success = session()->getFlashdata('success');
                    $warning = session()->getFlashdata('warning');
                    $danger = session()->getFlashdata('danger');
                    if(!empty($errors)){ ?>
                    <div class="alert alert-danger " role="alert">
                        Ada kesalahan data, yaitu:
                        <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                    <?php }
                    if(!empty($success)){ ?>
                    <div class="alert alert-success ">
                        <?php echo session()->getFlashdata('success');?>
                    </div>
                    <?php }
                    if(!empty($warning)){ ?>
                        <div class="alert alert-warning ">
                            <?php echo session()->getFlashdata('warning');?>
                        </div>
                    <?php }
                    if(!empty($danger)){ ?>
                        <div class="alert alert-danger ">
                            <?php echo session()->getFlashdata('danger');?>
                        </div>
                    <?php } ?>
                    <!-- end validasi -->

                    <!-- form login -->
                    <form action="<?= base_url('autentikasi/login/proses-login'); ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
                                <div class="input-group-append">
                                    <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" class="form-control" name="lat" id="lat">
                        <input type="hidden" class="form-control" name="lng" id="lng">
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        <small class="form-text text-muted text-center">* Dengan menekan tombol login, lokasi Anda akan direkam</small>
                    </form>
                    <!-- end form login -->
                </div>
                <div class="card-footer text-center">
                    <a href="<?= base_url('autentikasi/register'); ?>"><i class="fa fa-sign-in-alt" aria-hidden="true"></i> Register Akun</a>
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
        $(document).ready(function()
        {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }
                else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>

    <script>
        //jika geolocation support
        if(navigator.geolocation)
        {
            //ambil lokasi saat ini
            navigator.geolocation.getCurrentPosition(position => {
                localCoord = position.coords;
                //simpan lokasi saat ini ke objek
                objLocalCoord = {
                    lat: localCoord.latitude,
                    lng: localCoord.longitude
                }

                //masukkan lokasi saat ini ke data lokasi login
                $('#lat').val(objLocalCoord.lat);
                $('#lng').val(objLocalCoord.lng);
            })
        }
        //jika geolocation tidak support
        else
        {
            console.error("Geolocation tidak support pada browser ini!");
        }
    </script>

<?= $this->endSection(); ?>