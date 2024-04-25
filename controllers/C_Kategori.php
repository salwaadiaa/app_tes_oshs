<?php 

class C_Kategori extends Controller {
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
    }

    public function index(){
        $data = [
            'aktif' => 'kategori',
            'judul' => 'Data Kategori',
            'data_kategori' => $this->kategori->lihat(),
            'no' => 1
        ];
        $this->view('kategori/index', $data);
    }

    public function tambah(){
        if(!isset($_POST['tambah'])) redirect('kategori');

        $kategori = $this->req->post('kategori');
        if($this->kategori->tambah($kategori)){
            setSession('success', 'Data berhasil ditambahkan!');
            redirect('kategori');
        } else {
            setSession('error', 'Data gagal ditambahkan!');
            redirect('kategori');
        }
    }

    public function ubah($id){
        if(!isset($id) || $this->kategori->cek($id)->num_rows == 0) redirect('kategori');

        $data = [
            'aktif' => 'kategori',
            'judul' => 'Ubah Kategori',
            'kategori' => $this->kategori->lihat_id($id)->fetch_object(),
        ];
        $this->view('kategori/ubah', $data);
    }

    public function proses_ubah($id){
        if(!isset($id) || $this->kategori->cek($id)->num_rows == 0 || !isset($_POST['ubah'])) redirect('kategori');

        $kategori = $this->req->post('kategori');
        if($this->kategori->ubah($kategori, $id)){
            setSession('success', 'Data berhasil diubah!');
            redirect('kategori');
        } else {
            setSession('error', 'Data gagal diubah!');
            redirect('kategori');
        }
    }

    public function hapus($id = null){
        if(!isset($id) || $this->kategori->cek($id)->num_rows == 0) redirect('kategori');

        if($this->kategori->hapus($id)){
            setSession('success', 'Data berhasil dihapus!');
            redirect('kategori');
        } else {
            setSession('error', 'Data gagal dihapus!');
            redirect('kategori');
        }
    }
}
