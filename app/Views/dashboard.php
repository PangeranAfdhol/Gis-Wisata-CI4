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

                </div>
                <div class="card-body">
                    <?php foreach($user as $usr):
                        //jika ada session user
                        if($_SESSION['id_user'] == $usr->id_user)
                        { ?>
                            <div class="jumbotron jumbotron-image shadow" style="height: 300px; background-image: url(<?= base_url(''); ?>/assets/img/bg-dashboard5.png);">
                                <div class="container text-center">
                                <b class="display-4 text-white">Assalamualaikum</b></br>
                                    <b class="display-4 text-white">Haloo <?= $usr->nama_depan; ?> <?= $usr->nama_belakang; ?>,</b><br/>
                                    <i class="lead text-white">Anda memiliki hak akses sebagai <b><?= $usr->role; ?></b></i><br/><br/>
                                    <a href="<?= base_url('profil'); ?>" type="button" class="btn btn-outline-white"><i class="ni ni-single-02"></i> Halaman Profil</a>
                                </div>
                            </div>
                            <?php
                        }
                    endforeach; ?>
                    <hr class="my-4">
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>