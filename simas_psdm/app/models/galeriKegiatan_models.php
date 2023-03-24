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
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataGaleri($data)
    {
        $query = "INSERT INTO galeri
                    VALUES
                  (null, :id, :foto, :deskripsi)";

        $this->db->query($query);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('deskripsi', $data['deskripsi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataGaleri($id)
    {
        $query = "DELETE FROM galeri WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataGaleri($data)
    {
        $query = "UPDATE galeri SET
                    foto = :foto,
                    deskripsi = :deskripsi,
                  WHERE id = :id";

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