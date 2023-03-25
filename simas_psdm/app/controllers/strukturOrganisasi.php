<?php
    class Struktur_organisasi extends Controller{
        public function index(){
            $data['judul'] = 'Struktur Organisasi';
            $data['organisasi'] = $this->model('strukturOrganisasi_models')->getALLOrganisasi();
            $this->view('templates/header', $data);
            $this->view('organisasi/index', $data);
            $this->view('templates/footer');
        }

        public function detail($id){
            $data['judul'] = 'Detail Struktur Guru';
            $data['organisasi'] = $this->model('strukturOrganisasi_models')->getOrganisasiById($id);
            $this->view('templates/header', $data);
            $this->view('organisasi/detail', $data);
            $this->view('templates/footer');
        }

        public function tambah(){
            if ( $this->model('strukturOrganisasi_models')->tambahDataOrganisasi($_POST) > 0){
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/organisasi');
                exit;
            }else{
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/organisasi');
                exit;
            }
        }

        public function hapus($id){
        if( $this->model('strukturOrganisasi_models')->hapusDataOrganisasi($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/organisasi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/organisasi');
            exit;
        }
    }

    public function getubah(){
        echo json_encode($this->model('strukturOrganisasi_models')->getOrganisasiById($_POST['id']));
    }

    public function ubah(){
        if ( $this->model('strukturOrganisasi_models')->ubahDataOrganisasi($_POST) > 0){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/organisasi');
            exit;
        }else{
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/organisasi');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = ' Cari Daftar Struktur Organisasi';
        $data['organisasi'] = $this->model('strukturOrganisasi_models')->cariDataOrganisasi();
        $this->view('templates/header', $data);
        $this->view('organisasi/index', $data);
        $this->view('templates/footer');
    }
    }
