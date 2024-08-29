<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Web GIS - Wisata Riau">
        <meta name="author" content="https://pangeranafdhol.github.io">
        <title><?= $title; ?></title>
        <!-- Favicon -->
        <link rel="icon" href="<?= base_url(''); ?>/assets/img/brand/favicon.png" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <!-- Icons -->
        <link rel="stylesheet" href="<?= base_url(''); ?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="<?= base_url(''); ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <!-- Argon CSS -->
        <link rel="stylesheet" href="<?= base_url(''); ?>/assets/css/argon.css?v=1.2.0" type="text/css">
        <!-- Lightbox -->
        <link rel="stylesheet" href="<?= base_url(''); ?>/assets/vendor/lightbox/dist/css/lightbox.css" type="text/css">

        <link rel="stylesheet" href="<?= base_url(''); ?>/assets/css/home/style.css" type="text/css">
    </head>

    <body class="g-sidenav-show g-sidenav-pinned">
        
        <?= $this->renderSection("content"); ?>

        <!-- Scripts -->
        <!-- Core -->
        <script src="<?= base_url(''); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/js-cookie/js.cookie.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Argon JS -->
        <script src="<?= base_url(''); ?>/assets/js/argon.js?v=1.2.0"></script>
        <!-- Chart -->
        <script src="<?= base_url(''); ?>/assets/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/chart.js/dist/Chart.extension.js"></script>
        <!-- DataTables -->
        <script src="<?= base_url(''); ?>/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Datepicker -->
        <script src="<?= base_url(''); ?>/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.id.min.js"></script>
        <!-- JQuery Mask -->
        <script src="<?= base_url(''); ?>/assets/vendor/jquery/jquery.mask.js"></script>
        <!-- Lightbox -->
        <script src="<?= base_url(''); ?>/assets/vendor/lightbox/dist/js/lightbox.js"></script>
        
        <?= $this->renderSection('javascript'); ?>
        <!-- End Scripts -->
    </body>
</html>