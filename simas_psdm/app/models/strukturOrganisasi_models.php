<?php 

class strukturOrganisasi_models {
    private $table = 'struktur';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStruktur()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getStrukturById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama=:nama');
        $this->db->bind('nama', $id);
        return $this->db->single();
    }

    public function tambahDatatruktur($data)
    {
        $query = "INSERT INTO struktur
                    VALUES
                  (null, :nama, :jabatan, :nip)";

        $this->db->query($query);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('nip', $data['nip']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDatatruktur($id)
    {
        $query = "DELETE FROM struktur WHERE nama = :nama";

        $this->db->query($query);
        $this->db->bind('nama', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDatatruktur($data)
    {
        $query = "UPDATE struktur SET
                    jabatan = :jabatan,
                    nip = :nip,
                  WHERE nama = :nama";

        $this->db->query($query);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('nip', $data['nip']);

        return $this->db->rowCount();
    }


    public function cariDatatruktur()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM struktur WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}