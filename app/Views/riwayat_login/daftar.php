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
                    <div class="text-center">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#map_data" role="tab" data-toggle="tab">Map Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#list_data" role="tab" data-toggle="tab">List Data</a>
                        </li>
                    </ul>
                    </div>

                    <!-- isi tab -->
                    <div class="tab-content">

                        <!-- tab maps -->
                        <div role="tabpanel" class="tab-pane in active" id="map_data">
                            <!-- tampilkan peta detail login user -->
                            <div style="width: 100%; height: 600px" id="mapRiwayatLoginUser"></div>
                        </div>

                        <!-- tab list -->
                        <div role="tabpanel" class="tab-pane fade" id="list_data">
                            <!-- table riwayat login -->
                            <div class="table-responsive mt-3">
                                <table id="riwayat-login" class="table align-items-center table-flush table-hover">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th>Tanggal Login</th>
                                            <th>Latitude Login</th>
                                            <th>Longitude Login</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($daftar_riwayat as $rwyt): ?>
                                        <tr>
                                            <td><?= $rwyt->tanggal_login; ?></td>
                                            <td><?= $rwyt->latitude_login; ?></td>
                                            <td><?= $rwyt->longitude_login; ?></td>
                                            <td class="text-center" style="width: 100px;">
                                                <a class="btn btn-primary btn-sm" href="<?= base_url('user/riwayat-login/'.$rwyt->id_login); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table riwayat login -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>



<?= $this->section('javascript') ?>

    <script>
        $(document).ready(function()
        {
            //datatable
            $('#detail-user').DataTable({
                "language" : {
                    "url" : "<?= base_url(''); ?>/assets/vendor/datatables.net/js/Indonesian.json",
                    "sEmptyTable" : "Tidads"
                }
            });
        });

        //data heatmap
        var heatmapData = {
            data: [
                <?php 
                foreach($daftar_riwayat as $dftr_rwyt):
                    if(!empty($dftr_rwyt->latitude_login) || !empty($dftr_rwyt->longitude_login))
                    { ?>
                        {lat: <?= $dftr_rwyt->latitude_login; ?>, lng: <?= $dftr_rwyt->longitude_login; ?>, count: 1},
                        <?php
                    }
                endforeach; ?>
            ]
        };

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

        //konfigurasi heatmap
        var cfg = {
            //radius harus kecil jika 'scaleRadius' diset 'true' (atau radius disengaja kecil)
            //jika 'scaleRadius' diset ke 'false', maka penentuan radius bernilai integer dalam satuan pixel
            "radius": 0.02,
            "maxOpacity": 0.8,
            //tentukan skala radius di maps
            "scaleRadius": true,
            //jika diset ke 'false' maka heatmap akan menggunakan global maksimum untuk pewarnaan
            //jika 'activated', gunakan data maksimum dengan batasan map terakhir
            //(disini akan selalu spot merah jika 'useLocalExtrema' bernilai 'true)
            "useLocalExtrema": true,
            //tentukan nama field data yang merepresentasikan latitude
            latField: 'lat',
            //tentukan nama field data yang merepresentasikan longitude
            lngField: 'lng',
            //tentukan nama field data yang merepresentasikan jumlah data
            valueField: 'count'
        };

        //heatmap layer
        var heatmapLayer = new HeatmapOverlay(cfg);

        //inisiasi map dari element dengan pengaturan titik pusat dan zoom
        var map = new L.map('mapRiwayatLoginUser', {
            center: new L.LatLng(0.2880326426744426, 101.65199883403051),
            zoom: 8,
            layers: [streets, heatmapLayer]
        });

        //pengaturan menu layer
        var baseLayers = {
            Streets: streets,
            Sattelite: sattelite,
        };
        L.control.layers(baseLayers).addTo(map);

        //set data untuk heatmap layer
        heatmapLayer.setData(heatmapData);
    </script>

<?= $this->endSection(); ?>