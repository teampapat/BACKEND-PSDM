<?php
    class Profil_guru extends Controller{
        public function index(){
            $data['judul'] = 'Profil Guru';
            $data['profil'] = $this->model('profilGuru_models')->getALLProfil();
            $this->view('templates/header', $data);
            $this->view('profil/index', $data);
            $this->view('templates/footer');
        }

        public function detail($id){
            $data['judul'] = 'Detail Guru';
            $data['profil'] = $this->model('profilGuru_models')->getProfilById($id);
            $this->view('templates/header', $data);
            $this->view('profil/detail', $data);
            $this->view('templates/footer');
        }

        public function tambah(){
            if ( $this->model('profilGuru_models')->tambahDataProfil($_POST) > 0){
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
        if( $this->model('profilGuru_models')->hapusDataProfil($id) > 0 ) {
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
        echo json_encode($this->model('profilGuru_models')->getProfilById($_POST['id']));
    }

    public function ubah(){
        if ( $this->model('profilGuru_models')->ubahDataProfil($_POST) > 0){
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
        $data['judul'] = 'Cari Data Guru';
        $data['profil'] = $this->model('profilGuru_models')->cariDataProfil();
        $this->view('templates/header', $data);
        $this->view('profil/index', $data);
        $this->view('templates/footer');
    }
    }
