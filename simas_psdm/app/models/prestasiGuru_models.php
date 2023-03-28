<?php 

class PrestasiGuru_models {
    private $table = 'prestasi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPrestasi()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPrestasiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_prestasi=:kode_prestasi');
        $this->db->bind('kode_prestasi', $id);
        return $this->db->single();
    }

    public function tambahDataPrestasi($data)
    {
        $query = "INSERT INTO prestasi
                    VALUES
                  (null, :kode_prestasi, :nama_prestasi, :skala, :juara, :tahun)";

        $this->db->query($query);
        $this->db->bind('nama_prestasi', $data['nama_prestasi']);
        $this->db->bind('skala', $data['skala']);
        $this->db->bind('juara', $data['juara']);
        $this->db->bind('tahun', $data['tahun']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPrestasi($id)
    {
        $query = "DELETE FROM prestasi WHERE kode_prestasi = :kode_prestasi";

        $this->db->query($query);
        $this->db->bind('kode_prestasi', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataPrestasi($data)
    {
        $query = "UPDATE prestasi SET
                    nama_prestasi = :nama_prestasi,
                    skala = :skala,
                    juara = :juara,
                    tahun = :tahun,
                  WHERE kode_prestasi = :kode_prestasi";

        $this->db->query($query);
        $this->db->bind('nama_prestasi', $data['nama_prestasi']);
        $this->db->bind('skala', $data['skala']);
        $this->db->bind('juara', $data['juara']);
        $this->db->bind('tahun', $data['tahun ']);

        return $this->db->rowCount();
    }


    public function cariDataPrestasi()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM prestasi WHERE nama_prestasi LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
