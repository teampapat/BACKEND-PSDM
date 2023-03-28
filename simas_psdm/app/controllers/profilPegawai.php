<?php
class profilPegawai extends Controller{
    public function index(){
        $data['judul'] = 'Profil Pegawai';
        $data['profil'] = $this->model('profilPegawai_models')->getALLProfil();
        $this->view('templates/header', $data);
        $this->view('profilPegawai/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id){
        $data['judul'] = 'Detail Pegawai';
        $data['profil'] = $this->model('profilPegawai_models')->getProfilById($id);
        $this->view('templates/header', $data);
        $this->view('profil/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if ( $this->model('profilPegawai_models')->tambahDataProfil($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/profil');
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/profil');
            exit;
        }
    }

    public function hapus($id){
    if( $this->model('profilPegawai_models')->hapusDataProfil($id) > 0 ) {
        Flasher::setFlash('berhasil', 'dihapus', 'success');
        header('Location: ' . BASEURL . '/profil');
        exit;
    } else {
        Flasher::setFlash('gagal', 'dihapus', 'danger');
        header('Location: ' . BASEURL . '/profil');
        exit;
    }
}

public function getubah(){
    echo json_encode($this->model('profilPegawai_models')->getProfilById($_POST['id']));
}

public function ubah(){
    if ( $this->model('profilPegawai_models')->ubahDataProfil($_POST) > 0){
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/profil');
        exit;
    }else{
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/profil');
        exit;
    }
}

public function cari(){
    $data['judul'] = 'Cari Data Pegawai';
    $data['profil'] = $this->model('profilPegawai_models')->cariDataProfil();
    $this->view('templates/header', $data);
    $this->view('profil/index', $data);
    $this->view('templates/footer');
}
}

?>
