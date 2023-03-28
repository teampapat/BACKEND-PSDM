<?php 

class galeriKegiatan_models {
    private $table = 'galeri';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGaleri()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getGaleriById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_galeri=:kode_galeri');
        $this->db->bind('kode_galeri', $id);
        return $this->db->single();
    }

    public function tambahDataGaleri($data)
    {
        $query = "INSERT INTO galeri
                    VALUES
                  (null, :kode_galeri, :foto, :deskripsi)";

        $this->db->query($query);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('deskripsi', $data['deskripsi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataGaleri($id)
    {
        $query = "DELETE FROM galeri WHERE kode_galeri = :kode_galeri";

        $this->db->query($query);
        $this->db->bind('kode_galeri', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataGaleri($data)
    {
        $query = "UPDATE galeri SET
                    foto = :foto,
                    deskripsi = :deskripsi,
                  WHERE kode_galeri = :kode_galeri";

        $this->db->query($query);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('deskripsi', $data['deskripsi']);

        return $this->db->rowCount();
    }


    public function cariDataGaleri()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM galeri WHERE deskripsi LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
