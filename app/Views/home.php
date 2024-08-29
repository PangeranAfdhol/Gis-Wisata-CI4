<?= $this->extend('_layout/home/layout_root'); ?>

<?= $this->section('content') ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-background"><img src="<?= base_url(''); ?>/assets/img/bg-home/04.png" alt="" style="height: 100%; width: 100%;"></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <img class="animate__animated animate__fadeInDown" src="<?= base_url(''); ?>/assets/img/brand/logo3.png" alt="" style="height: 30%; width: 30%;"><br/><br/>
                    <a href="<?= base_url('autentikasi/login'); ?>" class="btn-get-started">Mulai</a>
                </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-background"><img src="<?= base_url(''); ?>/assets/img/bg-home/05.png" alt="" style="height: 100%; width: 100%;"></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <img class="animate__animated animate__fadeInDown" src="<?= base_url(''); ?>/assets/img/brand/logo3.png" alt="" style="height: 30%; width: 30%;"><br/><br/>
                    <a href="<?= base_url('autentikasi/login'); ?>" class="btn-get-started">Mulai</a>
                </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-background"><img src="<?= base_url(''); ?>/assets/img/bg-home/06.png" alt="" style="height: 100%; width: 100%;"></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <img class="animate__animated animate__fadeInDown" src="<?= base_url(''); ?>/assets/img/brand/logo3.png" alt="" style="height: 30%; width: 30%;"><br/><br/>
                    <a href="<?= base_url('autentikasi/login'); ?>" class="btn-get-started">Mulai</a>
                </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="carousel-background"><img src="<?= base_url(''); ?>/assets/img/bg-home/07.png" alt="" style="height: 100%; width: 100%;"></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <img class="animate__animated animate__fadeInDown" src="<?= base_url(''); ?>/assets/img/brand/logo3.png" alt="" style="height: 30%; width: 30%;"><br/><br/>
                    <a href="<?= base_url('autentikasi/login'); ?>" class="btn-get-started">Mulai</a>
                </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="carousel-background"><img src="<?= base_url(''); ?>/assets/img/bg-home/08.png" alt="" style="height: 100%; width: 100%;"></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <img class="animate__animated animate__fadeInDown" src="<?= base_url(''); ?>/assets/img/brand/logo3.png" alt="" style="height: 30%; width: 30%;"><br/><br/>
                    <a href="<?= base_url('autentikasi/login'); ?>" class="btn-get-started">Mulai</a>
                </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="carousel-background"><img src="<?= base_url(''); ?>/assets/img/bg-home/09.png" alt="" style="height: 100%; width: 100%;"></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <img class="animate__animated animate__fadeInDown" src="<?= base_url(''); ?>/assets/img/brand/logo3.png" alt="" style="height: 30%; width: 30%;"><br/><br/>
                    <a href="<?= base_url('autentikasi/login'); ?>" class="btn-get-started">Mulai</a>
                </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="carousel-background"><img src="<?= base_url(''); ?>/assets/img/bg-home/10.png" alt="" style="height: 100%; width: 100%;"></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <img class="animate__animated animate__fadeInDown" src="<?= base_url(''); ?>/assets/img/brand/logo3.png" alt="" style="height: 30%; width: 30%;"><br/><br/>
                    <a href="<?= base_url('autentikasi/login'); ?>" class="btn-get-started">Mulai</a>
                </div>
                </div>
            </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon fas fa-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon fas fa-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
        </div>
    </section><!-- End Hero -->

<?= $this->endSection(); ?>