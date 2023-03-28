<?php
    class strukturOrganisasi extends Controller{
        public function index(){
            $data['judul'] = 'Struktur Organisasi';
            $data['organisasi'] = $this->model('strukturOrganisasi_models')->getALLStruktur();
            $this->view('templates/header', $data);
            $this->view('strukturOrganisasi/index', $data);
            $this->view('templates/footer');
        }

        public function detail($id){
            $data['judul'] = 'Detail Struktur Guru';
            $data['organisasi'] = $this->model('strukturOrganisasi_models')->getStrukturById($id);
            $this->view('templates/header', $data);
            $this->view('strukturOrganisasi/detail', $data);
            $this->view('templates/footer');
        }

        public function tambah(){
            if ( $this->model('strukturOrganisasi_models')->tambahDataStruktur($_POST) > 0){
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
        if( $this->model('strukturOrganisasi_models')->hapusDataStruktur($id) > 0 ) {
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
        echo json_encode($this->model('strukturOrganisasi_models')->getSrukturById($_POST['id']));
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
