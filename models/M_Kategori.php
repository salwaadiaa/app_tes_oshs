<?php 

class M_Kategori extends Model {
    public function tambah($data) {
        $query = $this->insert('tbl_kategori', ['kategori' => $data]);
        $query = $this->execute();
        return $query;
    }

    public function lihat() {
        $query = $this->get('tbl_kategori');
        $query = $this->execute();
        return $query;
    }

    public function lihat_id($id) {
        $query = $this->get_where('tbl_kategori', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function ubah($kategori, $id) {
        $query = $this->update('tbl_kategori', ['kategori' => $kategori], ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function cek($id) {
        $query = $this->get_where('tbl_kategori', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }

    public function hapus($id) {
        $query = $this->delete('tbl_kategori', ['id' => $id]);
        $query = $this->execute();
        return $query;
    }
}
