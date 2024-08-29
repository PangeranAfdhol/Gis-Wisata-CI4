<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Logo GIS -->
        <div class="sidenav-header align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="<?= base_url(''); ?>/assets/img/brand/logo3.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <!-- Nav items -->
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Dashboard</span>
                </h6>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                        //ambil url saat ini / current url
                        $uri = current_url(true);
                        //jika segment url sama, maka aktif
                        if ($uri->getSegment(2) == 'dashboard') { ?>
                            <a class="nav-link active" href="<?= base_url('dashboard'); ?>">
                                <i class="ni ni-tv-2"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        <?php
                        }
                        //jika segment url tidak sama, maka tidak aktif
                        else { ?>
                            <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        <?php
                        } ?>

                    </li>
                </ul>

                <?php if ($_SESSION['role'] == 'Admin') { ?>
                    <!-- Nav items -->
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal"><b>Menu Admin</b></span>
                    </h6>

                    <?php
                    //jika segment url sama, maka aktif
                    if ($uri->getSegment(3) == 'data-wisata') { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('user/data-wisata'); ?>">
                                    <i class="fas fa-map"></i>
                                    <span class="nav-link-text">Data Wisata</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } else { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('user/data-wisata'); ?>">
                                    <i class="fas fa-map text-primary"></i>
                                    <span class="nav-link-text">Data Wisata</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } ?>

                    <?php
                    //jika segment url sama, maka aktif
                    if ($uri->getSegment(3) == 'wisata-terdekat') { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('user/wisata-terdekat'); ?>">
                                    <i class="fas fa-heart"></i>
                                    <span class="nav-link-text">Wisata Terdekat</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } else { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('user/wisata-terdekat'); ?>">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="nav-link-text">Wisata Terdekat</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } ?>

                    <?php
                    //jika segment url sama, maka aktif
                    if ($uri->getSegment(3) == 'User') { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('admin/user'); ?>">
                                    <i class="ni ni-books"></i>
                                    <span class="nav-link-text">User</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } else { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/user'); ?>">
                                    <i class="ni ni-books text-primary"></i>
                                    <span class="nav-link-text">User</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } ?>

                    <?php
                    //jika segment url sama, maka aktif
                    if ($uri->getSegment(3) == 'riwayat-login') { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('user/riwayat-login'); ?>">
                                    <i class="fas fa-history"></i>
                                    <span class="nav-link-text">Riwayat Login</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } else { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('user/riwayat-login'); ?>">
                                    <i class="fas fa-history text-primary"></i>
                                    <span class="nav-link-text">Riwayat Login</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } ?>

                <?php
                } elseif ($_SESSION['role'] == 'User') { ?>
                    <!-- Nav items -->
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal"><b>Menu User</b></span>
                    </h6>

                    <?php
                    //jika segment url sama, maka aktif
                    if ($uri->getSegment(3) == 'data-wisata') { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('user/data-wisata'); ?>">
                                    <i class="fas fa-heart"></i>
                                    <span class="nav-link-text">Data Wisata</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } else { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('user/data-wisata'); ?>">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="nav-link-text">Data Wisata</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } ?>

                    <?php
                    //jika segment url sama, maka aktif
                    if ($uri->getSegment(3) == 'wisata-terdekat') { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('user/wisata-terdekat'); ?>">
                                    <i class="fas fa-heart"></i>
                                    <span class="nav-link-text">Wisata Terdekat</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } else { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('user/wisata-terdekat'); ?>">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="nav-link-text">Wisata Terdekat</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } ?>

                    <?php
                    //jika segment url sama, maka aktif
                    if ($uri->getSegment(3) == 'riwayat-login') { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('user/riwayat-login'); ?>">
                                    <i class="fas fa-history"></i>
                                    <span class="nav-link-text">Riwayat Login</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } else { ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('user/riwayat-login'); ?>">
                                    <i class="fas fa-history text-primary"></i>
                                    <span class="nav-link-text">Riwayat Login</span>
                                </a>
                            </li>
                        </ul>
                    <?php
                    } ?>
                <?php
                } ?>

            </div>
        </div>
    </div>
</nav>
<!-- End Sidenav -->

<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-birutua border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                </ul>

                <!-- profil menu -->
                <ul class="navbar-nav align-items-center  ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['role'] ?></span>
                            </div>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-muted m-0">Selamat Datang!</h6>
                            </div>
                            <a href="<?= base_url('profil'); ?>" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Profil</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" href="#" data-toggle="modal" data-target="#konfirmasi_logout">
                                <i class="ni ni-curved-next"></i>
                                <span>Logout</span>
                            </button>
                        </div>
                    </li>
                </ul>
                <!-- end profil menu -->

                <!-- modal konfirmasi logout -->
                <form action="<?= base_url('autentikasi/logout'); ?>" method="post">
                    <div class="modal fade" id="konfirmasi_logout" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h3 class="modal-title w-100">Konfirmasi Logout</h3>
                                </div>
                                <div class="modal-body">

                                    <div class="text-center">
                                        <p>Anda yakin ingin logout?</p>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end modal konfirmasi logout -->

            </div>
        </div>
    </nav>
    <!-- End Topnav -->

    <?= $this->renderSection('header'); ?>

    <div class="container-fluid mt--6">
        <?= $this->renderSection('content'); ?>

        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-12">
                    <div class="copyright text-center  text-lg-center  text-muted">
                        &copy; <?= date('Y'); ?>
                        <a href="https://github.com/PangeranAfdhol" class="font-weight-bold ml-1" target="_blank">Pangeran Afdhol</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
</div>