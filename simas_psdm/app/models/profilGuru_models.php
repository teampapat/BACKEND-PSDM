<?php 

class profilGuru_models {
    private $table = 'masterguru';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProfil()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getProfilById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_guru=:kode_guru');
        $this->db->bind('kode_guru', $id);
        return $this->db->single();
    }

    public function tambahDataProfil($data)
    {
        $query = "INSERT INTO master_guru
                    VALUES
                  (null, :kode_guru, :nama_lengkap, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat_lengkap, :pendidikan_terakhir, :jurusan_pendidikan_terakhir, :nomer_hp, :kategori, :mapel_yg_diampu, :kategori_mapel, :nip, :status_sertifikasi, :keahlian_ganda, :status_pernikahan, :link_foto)";

        $this->db->query($query);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('alamat_lengkap', $data['alamat_lengkap']);
        $this->db->bind('pendidikan_terakhir', $data['pendidikan_terakhir']);
        $this->db->bind('jurusan_pendidikan_terakhir', $data['jurusan_pendidikan_terakhir']);
        $this->db->bind('nomer_hp', $data['nomer_hp']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('mapel_yg_diampu', $data['mapel_yg_diampu']);
        $this->db->bind('kategori_mapel', $data['kategori_mapel']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('status_sertifikasi', $data['status_sertifikasi']);
        $this->db->bind('keahlian_ganda', $data['keahlian_ganda']);
        $this->db->bind('status_pernikahan', $data['status_pernikahan']);
        $this->db->bind('link_foto', $data['link_foto']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataProfil($id)
    {
        $query = "DELETE FROM master_guru WHERE kode_guru = :kode_guru";

        $this->db->query($query);
        $this->db->bind('kode_guru', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataProfil($data)
    {
        $query = "UPDATE master_guru SET
                    nama_lengkap = :nama_lengkap,
                    jenis_kelamin = :jenis_kelamin,
                    tempat_lahir = :tempat_lahir,
                    tanggal_lahir = :tanggal_lahir,
                    alamat_lengkap = :alamat_lengkap,
                    pendidikan_terakhir = :pendidikan_terakhir,
                    jurusan_pendidikan_terakhir = :jurusan_pendidikan_terakhir,
                    nomer_hp = :nomer_hp,
                    kategori = :kategori,
                    mapel_yg_diampu = :mapel_yg_diampu,
                    kategori_mapel = :kategori_mapel,
                    nip = :nip,
                    status_sertifikasi = :status_sertifikasi,
                    keahlian_ganda = :keahlian_ganda,
                    status_pernikahan = :status_pernikahan,
                    link_foto = :link_foto
                  WHERE kode_guru = :kode_guru";

        $this->db->query($query);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir ']);
        $this->db->bind('alamat_lengkap', $data['alamat_lengkap']);
        $this->db->bind('pendidikan_terakhir', $data['pendidikan_terakhir']);
        $this->db->bind('jurusan_pendidikan_terakhir', $data['jurusan_pendidikan_terakhir']);
        $this->db->bind('nomer_hp', $data['nomer_hp']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('mapel_yg_diampu', $data['mapel_yg_diampu']);
        $this->db->bind('kategori_mapel', $data['kategori_mapel']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('status_sertifikasi', $data['status_sertifikasi']);
        $this->db->bind('keahlian_ganda', $data['keahlian_ganda']);
        $this->db->bind('status_pernikahan', $data['status_pernikahan']);
        $this->db->bind('link_foto', $data['upload_foto_kegiatan']);

        return $this->db->rowCount();
    }


    public function cariDataProfil()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM master_guru WHERE nama_lengkap LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
