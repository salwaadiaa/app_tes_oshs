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
                            <div class="float-left">
                                <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?= base_url('kategori/tambah') ?>">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <input type="text" class="form-control" name="kategori" id="kategori" autocomplete="off" required="required" placeholder="Masukan nama kategori disini">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                                        <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="card shadow">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
                            </div>
                            <div class="card-body">
                                <?php if(checkSession('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= getSession('success', true) ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php elseif(checkSession('error')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= getSession('error', true) ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif ?>

                                <table class="table table-bordered" id="dataTable" width="" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($kategori = $data_kategori->fetch_object()) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $kategori->kategori ?></td>
                                                <td>
                                                    <a href="<?= base_url('kategori/ubah/' . $kategori->id) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
                                                    <a href="#" class="btn btn-sm btn-danger" onclick="confirmDelete('<?= base_url('kategori/hapus/' . $kategori->id) ?>')"><i class="fa fa-trash"></i> Hapus</a>

                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php partial('footer') ?>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus saja!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>

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
