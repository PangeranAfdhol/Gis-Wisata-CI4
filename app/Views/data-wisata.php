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
                <!-- tab maps -->
                <div class="card-body">
                <?php if ($lat_terakhir !== null || $long_terakhir !== null) { ?>
                    <!-- tab maps -->
                    <div role="tabpanel" class="tab-pane in active" id="map_data">
                        <!-- tampilkan peta detail login user -->
                        <div style="width: 100%; height: 700px" id="mapWisata"></div>
                    </div>
                <?php
                } else { ?>
                    <div class="text-center">
                        <h3>Tidak bisa menentukan lokasi Puskesmas terdekat</h3>
                        <p>Karena device Anda tidak ada fitur GPS atau Anda belum mengizinkan GPS pada web ini</p>
                    </div>
                <?php
                } ?>
            </div>
                    <hr class="my-4">

                    <h2 class="text-center py-2">List Data Objek Wisata</h2>

                    <!-- table klasifikasi puskesmas -->
                    <div class="table-responsive mt-3">
                        <table id="wisata" class="table align-items-center table-flush table-hover">
                            <thead class='thead-light'>
                                <tr class='text-center'>
                                    <th>Kabupaten</th>
                                    <th>Wisata</th>
                                </tr>
                            </thead>
                        </table>
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
            $('#wisata').DataTable({
                "language" : {
                    "url" : "<?= base_url(''); ?>/assets/vendor/datatables.net/js/Indonesian.json",
                    "sEmptyTable" : "Tidads"
                },
                "ajax":{
                    "url":"<?= base_url(''); ?>/assets/geojson/wisata.geojson",
                    "dataSrc": "features"
                },
                "columns": [
                    { data: 'properties.KABUPATEN' },
                    { data: 'properties.WISATA' },
                ]
            });
        });

        //konversi teks menjadi kapital diawal kata
        function toTitleCase(str) {
            return str.replace(
                /\w\S*/g,
                function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                }
            );
        }

        //atribut layer
        const mbAttr = "© OpenStreetMap";
        const mbUrl = "http://{s}.tile.osm.org/{z}/{x}/{y}.png";
        
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

        //atribut onEachFeature
        function onEachFeature(feature, layer) {
            if(feature.properties.WISATA)
            {
                layer.bindPopup('<h4>'+'-Wisata : <b>'+'"'+toTitleCase(feature.properties.WISATA)+'"'+'</b></h4>'
                +'<h4>'+'-Kabupaten : <b>'+'"'+toTitleCase(feature.properties.KABUPATEN)+'"'+'</b></h4>'+'<h4>'+'-Keterangan : <b>'+'"'+toTitleCase(feature.properties.Keterangan)+'"'+'<br>');
            }
            else
            {
                layer.bindPopup('<h4>Kabupaten '+toTitleCase(feature.properties.KABUPATEN)+'</h4>');
            }
        }

        //geoJSON Kabupaten
        var kabupatenLayer = new L.GeoJSON.AJAX('<?= base_url('assets/geojson/batas_2admin_rokan-hulu.geojson') ?>', {
            onEachFeature: onEachFeature,
            style: {color: 'orange'}
        });

        //geoJSON Wisata
        var wisataLayer = new L.GeoJSON.AJAX('<?= base_url('assets/geojson/wisata.geojson') ?>', {
            onEachFeature: onEachFeature
        });

        //marker warna merah
    var redIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

        //posisi GPS terakhir user untuk maps
    var userLayer = new L.marker([<?= $lat_terakhir ?>, <?= $long_terakhir ?>], {
            icon: redIcon
        })
        .bindPopup('<h4>Posisi Anda Disini!</h4>');

    //data posisi GPS terahir user
    var userLocation = new L.LatLng(<?= $lat_terakhir ?>, <?= $long_terakhir ?>);

        //inisiasi map dari element dengan pengaturan titik pusat dan zoom
        var map = new L.map('mapWisata', {
            center: new L.LatLng(0.2880326426744426, 101.65199883403051),
            zoom: 8,
            layers: [streets, kabupatenLayer, wisataLayer, userLayer]
        });
        
        //pengaturan menu layer data maps
        var baseLayers = {
            Streets: streets,
            Sattelite: sattelite
        };

        //pengaturan menu layer data GeoJSON
        var overlayMaps = {
            Kabupaten: kabupatenLayer,
            Wisata: wisataLayer,
            "Posisi User": userLayer
        };
        
        L.control.layers(baseLayers, overlayMaps).addTo(map);
        
    </script>

<?= $this->endSection(); ?>