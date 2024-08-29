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
                <?php if ($lat_terakhir !== null || $long_terakhir !== null) { ?>
                    <!-- tab maps -->
                    <div role="tabpanel" class="tab-pane in active" id="map_data">
                        <!-- tampilkan peta detail login user -->
                        <div style="width: 100%; height: 600px" id="mapWisataTerdekat"></div>
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
        </div>
    </div>
</div>

<?= $this->endSection(); ?>


<?= $this->section('javascript') ?>

<script>
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

    //atribut onEachFeature
    function onEachFeature(feature, layer) {
        if (feature.properties.WISATA) {
            var loc = new L.LatLng(feature.geometry.coordinates[0][1], feature.geometry.coordinates[0][0]);

            layer.bindPopup('<h4>' + String(haversineFormula(loc, userLocation)) + ' meter (' + String(haversineFormula(loc, userLocation) / 1000) + 'km) dari posisi Anda</h4>' +
                '<h5>' + toTitleCase(feature.properties.WISATA) + '</h5>' +
                'Kabupaten <b>' + toTitleCase(feature.properties.KABUPATEN) + '</b>' + '<br>');
        } else {
            layer.bindPopup('<h4>Kabupaten ' + toTitleCase(feature.properties.KABUPATEN) + '</h4>');
        }
    }

    //geoJSON Kabupaten
    var kabupatenLayer = new L.GeoJSON.AJAX('<?= base_url('assets/geojson/batas_admin_ro1kan-hulu.geojson') ?>', {
        onEachFeature: onEachFeature,
        style: {
            color: 'orange'
        }
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
    var map = new L.map('mapWisataTerdekat', {
        center: userLocation,
        zoom: 10,
        layers: [streets, wisataLayer, userLayer]
    });

    //pengaturan menu layer data maps
    var baseLayers = {
        Streets: streets,
        Sattelite: sattelite
    };

    //pengaturan menu layer data GeoJSON
    var overlayMaps = {
        Wisata: wisataLayer,
        "Posisi User": userLayer
    };

    L.control.layers(baseLayers, overlayMaps).addTo(map);

    //fungsi Haversine Formula
    function haversineFormula(loc1, loc2) {
        var latlongs = [loc1, loc2];

        //hitung Haversine Formula
        return (loc1.distanceTo(loc2)).toFixed(0);
    }
    var control = L.Routing.control({
    waypoints: [
        L.latLng(userLocation),
        L.latLng(userLocation)
    ],
    routeWhileDragging: true
})
control.addTo(map);
</script>

<?= $this->endSection(); ?>