<?php 

class C_Dashboard extends Controller {
	public function __construct(){
		$this->addFunction('url');
		if(!isset($_SESSION['login'])) {
			$_SESSION['error'] = 'Anda harus masuk dulu!';
			header('Location: ' . base_url());
		}

		$this->addFunction('web');
		$this->kategori = $this->model('M_Kategori');
		$this->merk = $this->model('M_Merk');
		$this->barang = $this->model('M_Barang');
		$this->akun = $this->model('M_Akun');
	}
	public function index(){
		$data = [
			'aktif' => 'dashboard',
			'judul' => 'Dashboard',
			'kategori' => $this->kategori->lihat(),
			'merk' => $this->merk->lihat(),
			'barang' => $this->barang->lihat(),
			'akun' => $this->akun->lihat(),
		];
		$this->view('dashboard', $data);
	}
}