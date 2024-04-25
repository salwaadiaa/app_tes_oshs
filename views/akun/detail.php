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
				<div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="card shadow mx-auto">
							<div class="card-header">
								<h6 class="m-0 font-weight-bold text-primary"><?= $judul ?> - <?= $akun->nama ?></h6>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-4">
										<img src="<?= base_url('uploads/' . $akun->foto) ?>" alt="<?= $akun->nama ?>" class="img-thumbnail mb-4">
									</div>
									<div class="col-md-8">
										<table class="table table-borderless">
											<tr>
												<td>Nama</td>
												<td>:</td>
												<td><b><?= $akun->nama ?></b></td>
											</tr>
											<tr>
												<td>email</td>
												<td>:</td>
												<td><b><?= $akun->email ?></b></td>
											</tr>
										</table>	
									</div>				
								</div>
								<div class="row">
									<div class="col">
									<a href="#" class="btn btn-sm btn-danger" onclick="confirmDelete('<?= base_url('akun/hapus/' . $akun->id) ?>')"><i class="fa fa-trash"></i> Hapus</a>
										<a href="<?= base_url('akun') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
									</div>
								</div>
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
