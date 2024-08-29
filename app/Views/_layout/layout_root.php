<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Web GIS - Wisata Riau">
        <meta name="author" content="https://github.com/PangeranAfdhol">
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
        <!-- Datatable -->
        <link rel="stylesheet" href="<?= base_url(''); ?>/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css" type="text/css">
        <!-- HERE Maps -->
        <link rel="stylesheet" href="/assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
        <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
        <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
        <!-- Leaflet Maps -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    </head>
    
    <body class="g-sidenav-show g-sidenav-pinned">
        <?= $this->include('_layout/layout_child'); ?>

        <!-- Scripts -->
        <!-- Core -->
        <script src="<?= base_url(''); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/js-cookie/js.cookie.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Argon JS -->
        <script src="<?= base_url(''); ?>/assets/js/argon.js?v=1.2.0"></script>
        <!-- DataTables -->
        <script src="<?= base_url(''); ?>/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(''); ?>/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- JQuery Mask -->
        <script src="<?= base_url(''); ?>/assets/vendor/jquery/jquery.mask.js"></script>
        <!-- HERE Maps -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
        <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://js.api.here.com/v3/3.1/mapsjs-clustering.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://js.api.here.com/v3/3.1/mapsjs-data.js" type="text/javascript" charset="utf-8"></script>
        
        <!-- Leaflet Maps -->
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <script src="assets/js/leaflet-routing-machine/examples/Control.Geocoder.js"></script>
        
        <!-- Leaflet Plugin Heatmap -->
        <script src="<?= base_url(''); ?>/assets/js/heatmap.js"></script>
        <script src="<?= base_url(''); ?>/assets/js/leaflet-heatmap.js"></script>
        <!-- Leaflet Plugin AJAX -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.js"></script>



        <?= $this->renderSection('javascript'); ?>
        <!-- End Scripts -->
    </body>
</html>