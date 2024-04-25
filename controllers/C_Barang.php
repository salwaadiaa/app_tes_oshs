<?php

class C_Barang extends Controller{
    public function __construct(){
        $this->addFunction('url');
        if(!isset($_SESSION['login'])) {
            $_SESSION['error'] = 'Anda harus masuk dulu!';
            header('Location: ' . base_url());
        }
        
        $this->addFunction('web');
        $this->addFunction('session');
        $this->req = $this->library('Request');
        $this->kategori = $this->model('M_Kategori');
        $this->merk = $this->model('M_Merk');
        $this->barang = $this->model('M_Barang');
    }

    public function index(){
        $data = [
            'aktif' => 'barang',
            'judul' => 'Data Barang',
            'data_kategori' => $this->kategori->lihat(),
            'data_merk' => $this->merk->lihat(),
            'data_barang' => $this->barang->lihat(),
            'no' => 1
        ];
        $this->view('barang/index', $data);
    }

    public function tambah(){
        if(!isset($_POST['tambah'])) redirect('barang');

        $upload_dir = BASEPATH . DS . 'uploads' . DS;
        $asal = $_FILES['gambar']['tmp_name'];
        $ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $error = $_FILES['gambar']['error'];
    
        $img_name = $this->req->post('nama_brand');
        $img_name = strtolower($img_name);
        $img_name = str_replace(' ', '-', $img_name);
        $img_name = $img_name . '-' . time();
    
        if($error == 0){
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
    
            if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
                $data = [
                    'kategori_id' => $this->req->post('kategori_id'),
                    'merk_id' => $this->req->post('merk_id'),
                    'nama_brand' => $this->req->post('nama_brand'),
                    'gambar' => $img_name . '.' . $ekstensi,
                ];
    
                if($this->barang->tambah($data)){
                    setSession('success', 'Data berhasil ditambahkan!');
                    redirect('barang');
                } else {
                    setSession('error', 'Data gagal ditambahkan!');
                    redirect('barang');
                }
            } else {
                setSession('error', 'Gagal mengunggah gambar!');
                redirect('barang');
            }
        } else {
            setSession('error', 'Terjadi kesalahan saat mengunggah gambar!');
            redirect('barang');
        }
    }    

    public function detail($id) {
		if (!isset($id) || $this->barang->cek($id)->num_rows == 0) {
			redirect('barang');
		}
	
		$barang = $this->barang->lihat_id($id)->fetch_object();
	
		$data = [
			'aktif' => 'barang',
			'judul' => 'Detail Barang',
			'barang' => $barang
		];
	
		$this->view('barang/detail', $data);
	}
	

    public function ubah($id){
        if(!isset($id) || $this->barang->cek($id)->num_rows == 0) redirect('barang');

        $data = [
            'aktif' => 'barang',
            'judul' => 'Ubah Barang',
            'barang' => $this->barang->lihat_id($id)->fetch_object(),
            'data_kategori' => $this->kategori->lihat(),
            'data_merk' => $this->merk->lihat(),
        ];
        $this->view('barang/ubah', $data);
    }

    public function proses_ubah($id){
        if(!isset($id) || $this->barang->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('barang');

        $upload_dir = BASEPATH . DS . 'uploads' . DS;
        $asal = $_FILES['gambar']['tmp_name'];
        $ekstensi = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $error = $_FILES['gambar']['error'];

        $img_name = $this->req->post('nama_brand');
        $img_name = strtolower($img_name);
        $img_name = str_replace(' ', '-', $img_name);
        $img_name = $img_name . '-' . time();

        $data = [
            'kategori_id' => $this->req->post('kategori_id'),
            'merk_id' => $this->req->post('merk_id'),
            'nama_brand' => $this->req->post('nama_brand'),
            'gambar' => $img_name . '.' . $ekstensi,
        ];

        $gambar_sebelumnya = $this->barang->detail($id)->fetch_object()->gambar;

        if($this->barang->ubah($data, $id)){
            unlink($upload_dir . $gambar_sebelumnya) or die('gagal hapus gambar lama');
            if($error == 0){
                if(file_exists($upload_dir . $img_name . '.' . $ekstensi)) unlink($upload_dir . $img_name . '.' . $ekstensi);
            
                if(move_uploaded_file($asal, $upload_dir . $img_name . '.' . $ekstensi)){
                    setSession('success', 'Data berhasil diubah!');
                    redirect('barang');
                } else die('gagal upload gambar');
            } else die('gambar error');
        } else {
            setSession('error', 'Data gagal diubah!');
            redirect('barang');
        }
    }

    public function hapus($id = null){
        if(!isset($id) || $this->barang->cek($id)->num_rows == 0) redirect('barang');

        $gambar    = $this->barang->detail($id)->fetch_object()->gambar;
        unlink(BASEPATH . DS . 'uploads' . DS . $gambar) or die('gagal hapus gambar!');
        if($this->barang->hapus($id)){
            setSession('success', 'Data berhasil dihapus!');
            redirect('barang');
        } else {
            setSession('error', 'Data gagal dihapus!');
            redirect('barang');
        }
    }
}
