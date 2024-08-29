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
                    <!-- button kembali -->
                    <nav class="navbar">
                        <div class="nav-item">
                            <!-- button kembali ke daftar riwayat login -->
                            <a class="btn btn-secondary" href="<?= base_url('user/riwayat-login'); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>
                    </nav>
                    <!-- end button kembali -->
                </div>
                <div class="card-body">

                    <!-- tampilkan peta detail login user -->
                    <?php
                    if(!empty($latitude_login) || !empty($longitude_login))
                    { ?>
                        <div style="width: 100%; height: 400px" id="mapDetailRiwayatLoginUser"></div>
                        <div class="text-center pt-4">
                            <h1 class="card-title"><?= $nama_depan; ?> <?= $nama_belakang; ?> (<?= $nik; ?>)</h1>
                            <h4 class="card-title"><?= $tanggal_login; ?></h4>
                            <p>Latitude : <?= $latitude_login; ?> | Longitude : <?= $longitude_login; ?></p>
                        </div>
                        <?php
                    }
                    else
                    { ?>
                        <div class="text-center">
                            <h3>Tidak bisa melihat detail login</h3>
                            <p>Karena login pada periode ini tidak memiliki data titik latitude dan longitude</p>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>

<?= $this->section('javascript') ?>

    <script>
        //atribut layer
        const mbAttr = "© OpenStreetMap";
        const mbUrl = "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicGFuZ2VyYW5hZmRob2wiLCJhIjoiY2xpcmZyZnBqMXA5NzNkbnZuZ3F1NW84YyJ9.YSb7xzr2ZwFp_nOZltD0tw";
        
        //street layer
        const streets = L.tileLayer(mbUrl, {
            id: "mapbox/streets-v11",
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });

        //sattelite layer
        const sattelite = L.tileLayer(mbUrl, {
            id: "mapbox/satellite-v9",
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });

        //inisiasi map dari element dengan pengaturan titik pusat dan zoom
        var map = new L.map('mapDetailRiwayatLoginUser', {
            center: new L.LatLng(<?= $latitude_login ?>, <?= $longitude_login ?>),
            zoom: 20,
            layers: [streets]
        });

        //pengaturan menu layer
        var baseLayers = {
            Streets: streets,
            Sattelite: sattelite,
        };
        L.control.layers(baseLayers).addTo(map);

        //menampilkan marker
        L.marker([<?= $latitude_login ?>, <?= $longitude_login ?>]).addTo(map)
            .bindPopup('<b><?= $nama_depan; ?> <?= $nama_belakang; ?> (<?= $nik; ?>)</b><br/>(<?= $tanggal_login; ?>)<br/>- Latitude : <?= $latitude_login; ?> | Longitude : <?= $longitude_login; ?>')
            .openPopup();
    </script>

<?= $this->endSection(); ?>