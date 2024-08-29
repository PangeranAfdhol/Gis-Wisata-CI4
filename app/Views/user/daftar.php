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
                                    <h6 class="text-muted m-0">User</h6>
                                </div>
                                <button class="dropdown-item" href="#" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah User</button>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- end button pilih menu -->
            </div>
            <div class="card-body">
                <!-- validasi -->
                <?php
                $inputs = session()->getFlashdata('inputs');
                $errors = session()->getFlashdata('errors');
                $success = session()->getFlashdata('success');
                $warning = session()->getFlashdata('warning');
                $danger = session()->getFlashdata('danger');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger " role="alert">
                        Ada kesalahan data, yaitu:
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php }
                if (!empty($success)) { ?>
                    <div class="alert alert-success ">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php }
                if (!empty($warning)) { ?>
                    <div class="alert alert-warning ">
                        <?php echo session()->getFlashdata('warning'); ?>
                    </div>
                <?php }
                if (!empty($danger)) { ?>
                    <div class="alert alert-danger ">
                        <?php echo session()->getFlashdata('danger'); ?>
                    </div>
                <?php } ?>
                <!-- end validasi -->

                <!-- modal tambah User -->
                <form action="<?= base_url('admin/user/tambah'); ?>" method="post">
                    <div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h3 class="modal-title w-100">Tambah User</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Role<b class="text-danger">*</b></label>
                                        <select class="form-control" id="role" name="role">
                                            <option value="">-- Pilih --</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Username<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Password<b class="text-danger">*</b></label>
                                                <div class="input-group mb-3" id="show_hide_password1">
                                                    <input type="password" class="form-control" name="pwd" id="pwd">
                                                    <div class="input-group-append">
                                                        <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Konfirmasi Password<b class="text-danger">*</b></label>
                                                <div class="input-group mb-3" id="show_hide_password2">
                                                    <input type="password" class="form-control" name="konfirmasi_pwd" id="konfirmasi_pwd">
                                                    <div class="input-group-append">
                                                        <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">NIK<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" name="nik" id="nik">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nama Depan<b class="text-danger">*</b></label>
                                                <input type="text" class="form-control" name="nama_depan" id="nama_depan">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nama Belakang</label>
                                                <input type="text" class="form-control" name="nama_belakang" id="nama_belakang">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input type="text" class="form-control" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Telepon</label>
                                                <input type="text" class="form-control" name="telepon" id="telepon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end modal tambah User -->

                <h2 class="text-center py-2">Map Data</h2>

                <!-- tampilkan peta detail login user -->
                <div style="width: 100%; height: 600px" id="mapRiwayatLoginSeluruhUser"></div>

                <hr class="my-4">

                <h2 class="text-center py-2">List Data</h2>

                <!-- table daftar user -->
                <div class="table-responsive mt-3">
                    <table id="user" class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Tanggal Register</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($daftar_riwayat_user_list as $rwyt_usr_list) : ?>
                                <tr>
                                    <td><?= $rwyt_usr_list->nama_depan; ?> <?= $rwyt_usr_list->nama_belakang; ?></td>
                                    <td><?= $rwyt_usr_list->nik; ?></td>
                                    <td><?= $rwyt_usr_list->tanggal_register; ?></td>
                                    <td>
                                        <?php
                                        if ($rwyt_usr_list->role == 'Admin') { ?>
                                            <a class="btn btn-outline-success btn-sm disabled" aria-disabled="true">Admin</a>
                                        <?php
                                        } elseif ($rwyt_usr_list->role == 'User') { ?>
                                            <a class="btn btn-outline-warning btn-sm disabled" aria-disabled="true">User</a>
                                        <?php
                                        } ?>
                                    </td>
                                    <td class="text-center" style="width: 100px;">
                                        <?php if ($rwyt_usr_list->id_user !== $_SESSION['id_user']) { ?>
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="aksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="aksi">
                                                <div class="dropdown-header noti-title">
                                                    <h6 class="text-muted m-0">User</h6>
                                                </div>
                                                <a class="dropdown-item btn-detail" href="<?= base_url('admin/user/data/' . $rwyt_usr_list->id_user); ?>">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Detail
                                                </a>
                                                <button class="dropdown-item btn-edit" href="#" data-id_user="<?= $rwyt_usr_list->id_user; ?>" data-username="<?= $rwyt_usr_list->username; ?>" data-nik="<?= $rwyt_usr_list->nik; ?>" data-nama_depan="<?= $rwyt_usr_list->nama_depan; ?>" data-nama_belakang="<?= $rwyt_usr_list->nama_belakang; ?>" data-alamat="<?= $rwyt_usr_list->alamat; ?>" data-email="<?= $rwyt_usr_list->email; ?>" data-telepon="<?= $rwyt_usr_list->telepon; ?>">
                                                    <i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit
                                                </button>
                                                <button class="dropdown-item btn-hapus" href="#" data-id_user="<?= $rwyt_usr_list->id_user; ?>" data-nama_depan="<?= $rwyt_usr_list->nama_depan; ?>" data-nama_belakang="<?= $rwyt_usr_list->nama_belakang; ?>">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                                </button>
                                            </div>
                                        <?php
                                        } else { ?>
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="aksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="aksi">
                                                <div class="dropdown-header noti-title">
                                                    <h6 class="text-muted m-0">User</h6>
                                                </div>
                                                <a class="dropdown-item btn-detail" href="<?= base_url('admin/user/data/' . $rwyt_usr_list->id_user); ?>">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Detail
                                                </a>
                                            </div>
                                        <?php
                                        } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- end table daftar user -->

                <!-- modal edit User -->
                <form action="<?= base_url('admin/user/edit'); ?>" method="post">
                    <div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h3 class="modal-title w-100">Edit User</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Username</label>
                                        <input type="text" class="form-control username" name="username" id="username">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">NIK</label>
                                        <input type="text" class="form-control nik" name="nik" id="nik">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nama Depan</label>
                                                <input type="text" class="form-control nama_depan" name="nama_depan" id="nama_depan">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nama Belakang</label>
                                                <input type="text" class="form-control nama_belakang" name="nama_belakang" id="nama_belakang">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Alamat</label>
                                        <input type="text" class="form-control alamat" name="alamat" id="alamat">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="text" class="form-control email" name="email" id="email">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Telepon</label>
                                        <input type="text" class="form-control telepon" name="telepon" id="telepon">
                                    </div>

                                    <hr class="my-4">

                                    <h4 class="text-center py-2">Ubah Password</h4>

                                    <div class="form-group">
                                        <label class="control-label">Password<b class="text-danger">*</b></label>
                                        <div class="input-group" id="show_hide_password1">
                                            <input type="password" class="form-control" name="pwd" id="pwd" aria-describedby="kodehelp">
                                            <div class="input-group-append">
                                                <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <small id="kodehelp" class="form-text text-muted">* Kosongkan, jika tidak ingin merubah password</small>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Konfirmasi Password<b class="text-danger">*</b></label>
                                        <div class="input-group" id="show_hide_password2">
                                            <input type="password" class="form-control" name="konfirmasi_pwd" id="konfirmasi_pwd" aria-describedby="kodehelp">
                                            <div class="input-group-append">
                                                <a href="#" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <small id="kodehelp" class="form-text text-muted">* Kosongkan, jika tidak ingin merubah password</small>
                                    </div>
                                    <input type="hidden" class="id_user" name="id_user">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end edit User -->

                <!-- modal hapus User -->
                <form action="<?= base_url('admin/user/hapus'); ?>" method="post">
                    <div class="modal fade" id="hapus" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h3 class="modal-title w-100">Hapus User</h3>
                                </div>
                                <div class="modal-body">

                                    <div class="text-center">
                                        <p>Anda yakin ingin menghapus User</p>
                                        <b class="nama_depan"></b> <b class="nama_belakang"></b></b><br /><br />
                                        <u>Data tidak akan bisa dikembalikan!</u><br /><br />

                                        <p>Silahkan ketikkan <u>"HAPUS"</u> dibawah ini:</p>
                                        <div class="form-group">
                                            <input type="text" class="form-control text-center" name="konfirmasi_hapus" id="konfirmasi_hapus" aria-describedby="kodehelp">
                                            <small id="kodehelp" class="form-text text-muted">* Tanpa tanda kutip, dan samakan besar kecilnya huruf</small>
                                        </div>
                                    </div>
                                    <input type="hidden" name="hapus_user" value="HAPUS">
                                    <input type="hidden" class="id_user" name="id_user">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end modal hapus User -->

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript') ?>

<script>
    $(document).ready(function() {
        $("#show_hide_password1 a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password1 input').attr("type") == "text") {
                $('#show_hide_password1 input').attr('type', 'password');
                $('#show_hide_password1 i').addClass("fa-eye-slash");
                $('#show_hide_password1 i').removeClass("fa-eye");
            } else if ($('#show_hide_password1 input').attr("type") == "password") {
                $('#show_hide_password1 input').attr('type', 'text');
                $('#show_hide_password1 i').removeClass("fa-eye-slash");
                $('#show_hide_password1 i').addClass("fa-eye");
            }
        });

        $("#show_hide_password2 a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password2 input').attr("type") == "text") {
                $('#show_hide_password2 input').attr('type', 'password');
                $('#show_hide_password2 i').addClass("fa-eye-slash");
                $('#show_hide_password2 i').removeClass("fa-eye");
            } else if ($('#show_hide_password2 input').attr("type") == "password") {
                $('#show_hide_password2 input').attr('type', 'text');
                $('#show_hide_password2 i').removeClass("fa-eye-slash");
                $('#show_hide_password2 i').addClass("fa-eye");
            }
        });

        //datatable
        $('#user').DataTable({
            "language": {
                "url": "<?= base_url(''); ?>/assets/vendor/datatables.net/js/Indonesian.json",
                "sEmptyTable": "Tidads"
            }
        });

        //edit User
        $('.btn-edit').on('click', function() {
            // get data from button edit
            const id_user = $(this).data('id_user');
            const username = $(this).data('username');
            const nik = $(this).data('nik');
            const nama_depan = $(this).data('nama_depan');
            const nama_belakang = $(this).data('nama_belakang');
            const alamat = $(this).data('alamat');
            const email = $(this).data('email');
            const telepon = $(this).data('telepon');

            // Set data to Form Edit
            $('.id_user').val(id_user);
            $('.username').val(username);
            $('.nik').val(nik);
            $('.nama_depan').val(nama_depan);
            $('.nama_belakang').val(nama_belakang);
            $('.alamat').val(alamat);
            $('.email').val(email);
            $('.telepon').val(telepon);

            // Call Modal Edit
            $('#edit').modal('show');
        });

        //hapus User
        $('.btn-hapus').on('click', function() {
            // get data from button Hapus
            const id_user = $(this).data('id_user');
            const nama_depan = $(this).data('nama_depan');
            const nama_belakang = $(this).data('nama_belakang');

            // Set data to Form Hapus
            $('.id_user').val(id_user);
            $('.nama_depan').text(nama_depan);
            $('.nama_belakang').text(nama_belakang);

            // Call Modal Hapus
            $('#hapus').modal('show');
        });
    });

    //data heatmap
    var heatmapData = {
        data: [
            <?php
            foreach ($daftar_riwayat_user as $rwyt_usr) :
                if (!empty($rwyt_usr->latitude_login) || !empty($rwyt_usr->longitude_login)) { ?> {
                        lat: <?= $rwyt_usr->latitude_login; ?>,
                        lng: <?= $rwyt_usr->longitude_login; ?>,
                        count: 1
                    },
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
    var map = new L.map('mapRiwayatLoginSeluruhUser', {
        center: new L.LatLng(0.2880326426744426, 101.65199883403051),
        zoom: 9,
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