<?php 

class M_Akun extends Model {
	public function lihat(){
		$query = $this->get('tbl_akun', ['nama', 'email', 'id']);
		$query = $this->execute();
		return $query;
	}

	public function tambah($data){
		$query = $this->insert('tbl_akun', $data);
		$query = $this->execute();
		return $query;
	}

	public function lihat_id($id){
		$query = $this->get_where('tbl_akun', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek($id){
		$query = $this->get_where('tbl_akun', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function cek_login($email){
		$query = $this->get_where('tbl_akun', ['email' => $email]);
		$query = $this->execute();
		return $query;
	}

	public function detail($id){
		$query = $this->get_where('tbl_akun', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function hapus($id){
		$query = $this->delete('tbl_akun', ['id' => $id]);
		$query = $this->execute();
		return $query;
	}

	public function register($email, $password, $nama){
        $data = [
            'email' => $email,
            'password' => $password,
            'nama' => $nama
        ];

        $query = $this->insert('tbl_akun', $data);
        $query = $this->execute();
        return $query;
    }
}