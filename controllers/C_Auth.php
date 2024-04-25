<?php 

if(!defined('BASEPATH')) echo "Tidak bisa langsung mengakses halaman ini!";

class C_Auth extends Controller{
    public function __construct(){
        $this->addFunction('url');
        if(isset($_SESSION['login'])) {
            header('Location: ' . base_url('dashboard'));
        }

        $this->addFunction('web');
        $this->addFunction('session');
        $this->req = $this->library('Request');
        $this->akun = $this->model('M_Akun');
    }
    
    public function index(){
        $this->view('login');
    }

    public function login(){
        if(!isset($_POST['login'])) redirect();
        else {
            $email = $this->req->post('email');
            $password = $this->req->post('password');

            $akun = $this->akun->cek_login($email);
            
            if($akun->num_rows > 0){
                $akun = $akun->fetch_object();
                if(password_verify($password, $akun->password)){
                    setSession('login', [
                        'auth' => true,
                        'nama' => $akun->nama,
                        'email' => $akun->email,
                        'foto' => $akun->foto,
                        'waktu' => date('d M Y H:i:s')
                    ]);
                    redirect('dashboard');
                } else {
                    setSession('error', 'Password salah!');
                    redirect();
                }
            } else {
                setSession('error', 'email tidak ditemukan!');
                redirect();
            }
        }
    }

    public function register_form(){
        $this->view('register');
    }

    public function register(){
        if(!isset($_POST['register'])) {
            redirect();
        } else {
            $email = $this->req->post('email');
            $password = $this->req->post('password');
            $nama = $this->req->post('nama');
            $existing_akun = $this->akun->cek_login($email);
            if($existing_akun->num_rows > 0){
                setSession('error', 'Email sudah digunakan!');
                redirect('register');
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $result = $this->akun->register($email, $hashed_password, $nama);
                if($result){
                    setSession('success', 'Registrasi berhasil! Silakan login.');
                    redirect();
                } else {
                    setSession('error', 'Registrasi gagal! Silakan coba lagi.');
                    redirect('login');
                }
            }
        }
    }

    public function logout(){
        unset($_SESSION['login']);
        redirect();
    }
}
