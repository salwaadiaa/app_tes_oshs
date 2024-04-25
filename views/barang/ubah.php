<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= APP_NAME ?> - <?= $judul ?></title>
    <link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php partial('navbar', $aktif) ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php partial('topbar') ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="clearfix">
                                <div class="clearfix text-center">
                                    <h1 class="h3 mb-4 text-gray-800">Ubah Barang</h1>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-6">
                            <div class="card shadow mx-auto">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?= base_url('barang/proses_ubah/' . $barang->id) ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <select name="kategori_id" id="kategori" class="form-control">
                                                <?php while ($kategori = $data_kategori->fetch_object()) : ?>
                                                    <option value="<?= $kategori->id ?>" <?= $barang->kategori_id == $kategori->id ? 'selected' : '' ?>><?= $kategori->kategori ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="merk">Merk</label>
                                            <select name="merk_id" id="merk" class="form-control">
                                                <?php while ($merk = $data_merk->fetch_object()) : ?>
                                                    <option value="<?= $merk->id ?>" <?= $barang->merk_id == $merk->id ? 'selected' : '' ?>><?= $merk->merk ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Barang</label>
                                            <input type="text" value="<?= $barang->nama_brand ?>" name="nama_brand" id="nama_brand" required="required" placeholder="Ketik nama brand" autocomplete="off" class="form-control">
                                        </div>
                                        <!-- Tambah field lainnya sesuai kebutuhan -->
                                        <div class="form-group">
                                            <label for="gambar">Gambar Barang</label>
                                            <input type="file" name="gambar" id="gambar" required="required" class="form-control-file">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-success" name="ubah"><i class="fa fa-pen"></i> Ubah</button>
                                            <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-times"></i> Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php partial('footer') ?>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('sb-admin-2/') ?>/js/demo/datatables-demo.js"></script>
</body>
</html>
