<?= $this->extend('_layout/layout_root'); ?>

<?= $this->section('header') ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <!-- judul halaman -->
            <div class="header-body">
                <div class="row py-4">
                    <div class="col-lg-12 col-12 text-center">
                        <h6 class="h2 text-white d-inline-block mb-0">
                            <?= $title; ?>
                        </h6>
                    </div>
                </div>
            </div>
            <!-- end judul halaman -->
        </div>
    </div>
    <!-- End Header -->
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="min-height: 430px;">
                <div class="card-header">
                    <!-- button pilih menu -->
                    <nav class="navbar d-flex justify-content-end">
                        <div class="nav-item">
                            <!-- dropdown pilih menu -->
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Menu
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menu">
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-muted m-0">Profil</h6>
                                    </div>
                                    <button class="dropdown-item" href="#" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit Profil</button>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- end button kembali dan pilih menu -->

                </div>

                <div class="card-body">
                    <!-- validasi -->
                    <?php 
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
                    $success = session()->getFlashdata('success');
                    $warning = session()->getFlashdata('warning');
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
                    if(!empty($warning)){ ?>
                    <div class="alert alert-warning ">
                        <?php echo session()->getFlashdata('warning');?>
                    </div>   
                    <?php }
                    if(!empty($success)){ ?>
                    <div class="alert alert-success ">
                        <?php echo session()->getFlashdata('success');?>
                    </div>   
                    <?php } ?>
                    <!-- end validasi -->

                    <!-- modal edit Profil -->
                    <?php foreach($profil as $pfr): ?>
                    <form action="<?= base_url('profil/edit'); ?>" method="post">
                        <div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="dialog">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h3 class="modal-title w-100">Edit Profil</h3>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Username</label>
                                                    <input type="text" class="form-control" name="username" id="username" value="<?= $pfr->username ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">NIK</label>
                                                    <input type="text" class="form-control" name="nik" id="nik" value="<?= $pfr->nik ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Depan</label>
                                                    <input type="text" class="form-control" name="nama_depan" id="nama_depan" value="<?= $pfr->nama_depan ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Belakang</label>
                                                    <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" value="<?= $pfr->nama_belakang ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?= $pfr->email ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Telepon</label>
                                                    <input type="text" class="form-control" name="telepon" id="telepon" value="<?= $pfr->telepon ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat"><?= $pfr->alamat ?></textarea>
                                        </div>

                                        <hr class="my-4">

                                        <h4 class="text-center py-2">Ubah Password</h4>

                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <div class="input-group" id="show_hide_password1">
                                                <input type="password" class="form-control" name="pwd" id="pwd" aria-describedby="kodehelp">
                                                <div class="input-group-append">
                                                    <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <small id="kodehelp" class="form-text text-muted">* Kosongkan, jika tidak ingin merubah password</small>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Konfirmasi Password</label>
                                            <div class="input-group" id="show_hide_password2">
                                                <input type="password" class="form-control" name="konfirmasi_pwd" id="konfirmasi_pwd" aria-describedby="kodehelp">
                                                <div class="input-group-append">
                                                    <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <small id="kodehelp" class="form-text text-muted">* Kosongkan, jika tidak ingin merubah password</small>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id_user" class="id_user" value="<?= $pfr->id_user ?>">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; ?>
                    <!-- end modal edit Profil -->
                    
                    <!-- tampil data Profil -->
                    <?php foreach($profil as $pfr): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="<?= $pfr->username ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Depan</label>
                                    <input type="text" class="form-control" name="nama_depan" id="nama_depan" value="<?= $pfr->nama_depan ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $pfr->email ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">NIK</label>
                                    <input type="text" class="form-control" name="nik" id="nik" value="<?= $pfr->nik ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Belakang</label>
                                    <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" value="<?= $pfr->nama_belakang ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Telepon</label>
                                    <input type="text" class="form-control" name="telepon" id="telepon" value="<?= $pfr->telepon ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" readonly><?= $pfr->alamat ?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- end tampil data Profil -->
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>

<?= $this->section('javascript') ?>

    <script>
        $(document).ready(function()
        {
            $("#show_hide_password1 a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password1 input').attr("type") == "text"){
                    $('#show_hide_password1 input').attr('type', 'password');
                    $('#show_hide_password1 i').addClass( "fa-eye-slash" );
                    $('#show_hide_password1 i').removeClass( "fa-eye" );
                }
                else if($('#show_hide_password1 input').attr("type") == "password"){
                    $('#show_hide_password1 input').attr('type', 'text');
                    $('#show_hide_password1 i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password1 i').addClass( "fa-eye" );
                }
            });

            $("#show_hide_password2 a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password2 input').attr("type") == "text"){
                    $('#show_hide_password2 input').attr('type', 'password');
                    $('#show_hide_password2 i').addClass( "fa-eye-slash" );
                    $('#show_hide_password2 i').removeClass( "fa-eye" );
                }
                else if($('#show_hide_password2 input').attr("type") == "password"){
                    $('#show_hide_password2 input').attr('type', 'text');
                    $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password2 i').addClass( "fa-eye" );
                }
            });
        });
    </script>

<?= $this->endSection(); ?>