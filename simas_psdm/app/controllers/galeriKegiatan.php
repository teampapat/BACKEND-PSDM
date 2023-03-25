<?php
    class Galeri_kegiatan extends Controller{
        public function index(){
            $data['judul'] = 'Galeri Kegiatan';
            $data['kegiatan'] = $this->model('galeriKegiatan_models')->getALLKegiatan();
            $this->view('templates/header', $data);
            $this->view('kegiatan/index', $data);
            $this->view('templates/footer');
        }

        public function detail($id){
            $data['judul'] = 'Detail Kegiatan';
            $data['kegiatan'] = $this->model('galeriKegiatan_models')->getKegiatanById($id);
            $this->view('templates/header', $data);
            $this->view('kegiatan/detail', $data);
            $this->view('templates/footer');
        }

        public function tambah(){
            if ( $this->model('galeriKegiatan_models')->tambahDataKegiatan($_POST) > 0){
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/kegiatan');
                exit;
            }else{
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/kegiatan');
                exit;
            }
        }

        public function hapus($id){
        if( $this->model('galeriKegiatan_models')->hapusDataKegiatan($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/kegiatan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/kegiatan');
            exit;
        }
    }

    public function getubah(){
        echo json_encode($this->model('galeriKegiatan_models')->getKegiatanById($_POST['id']));
    }

    public function ubah(){
        if ( $this->model('galeriKegiatan_models')->ubahDataKegiatan($_POST) > 0){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/kegiatan');
            exit;
        }else{
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/kegiatan');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'Cari Daftar Galeri Kegiatan';
        $data['kegiatan'] = $this->model('galeriKegiatan_models')->cariDataKegiatan();
        $this->view('templates/header', $data);
        $this->view('kegiatan/index', $data);
        $this->view('templates/footer');
    }
    }
