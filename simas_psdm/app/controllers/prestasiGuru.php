<?php
    class Prestasi_guru extends Controller{
        public function index(){
            $data['judul'] = 'Prestasi Guru';
            $data['prestasi'] = $this->model('prestasiGuru_models')->getAllPrestasi();
            $this->view('templates/header', $data);
            $this->view('prestasi/index', $data);
            $this->view('templates/footer');
        }

        public function detail($id){
            $data['judul'] = 'Detail Prestasi Guru';
            $data['prestasi'] = $this->model('prestasiGuru_models')->getPrestasiById($id);
            $this->view('templates/header', $data);
            $this->view('prestasi/detail', $data);
            $this->view('templates/footer');
        }

        public function tambah(){
            if ( $this->model('prestasiGuru_models')->tambahDataPrestasi($_POST) > 0){
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/prestasi');
                exit;
            }else{
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/prestasi');
                exit;
            }
        }

        public function hapus($id){
        if( $this->model('prestasiGuru_models')->hapusDataPrestasi($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/prestasi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/prestasi');
            exit;
        }
    }

    public function getubah(){
        echo json_encode($this->model('prestasiGuru_models')->getPrestasiById($_POST['id']));
    }

    public function ubah(){
        if ( $this->model('prestasiGuru_models')->ubahDataPrestasi($_POST) > 0){
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/prestasi');
            exit;
        }else{
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/prestasi');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'Cari Daftar Prestasi Guru';
        $data['prestasi'] = $this->model('prestasiGuru_models')->cariDataPrestasi();
        $this->view('templates/header', $data);
        $this->view('prestasi/index', $data);
        $this->view('templates/footer');
    }
    }
?>