<?php 

class M_Barang extends Model {
    public function lihat(){
        $query = $this->setQuery('SELECT b.id, b.nama_brand, k.kategori, m.merk 
                                  FROM tbl_barang b 
                                  INNER JOIN tbl_kategori k ON b.kategori_id = k.id 
                                  INNER JOIN tbl_merk m ON b.merk_id = m.id');
        $query = $this->execute();
        return $query;
    }

    public function tambah($data){
        $query = $this->insert('tbl_barang', $data);
        $query = $this->execute();
        return $query;
    }

    public function lihat_id($id){
        $query = $this->setQuery("SELECT b.*, k.kategori, m.merk 
                                  FROM tbl_barang b 
                                  INNER JOIN tbl_kategori k ON b.kategori_id = k.id 
                                  INNER JOIN tbl_merk m ON b.merk_id = m.id 
                                  WHERE b.id = $id");
        $query = $this->execute();
        return $query;
    }

    public function ubah($data, $id){
        $query = $this->update('tbl_barang', $data, ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function cek($id){
        $query = $this->get_where('tbl_barang', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

	public function detail($id) {
        $query = $this->get_where('tbl_barang', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function hapus($id){
        $query = $this->delete('tbl_barang', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }
}
