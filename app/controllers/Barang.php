<?php

class Barang extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    // Fungsi untuk mendapatkan URL dasar
    private function base_url($path = '')
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        return "{$protocol}://{$host}/{$path}";
    }

    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Barang';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barang/create', $data);
        $this->view('templates/footer');
    }

    public function simpanBarang()
    {
        if ($this->model('BarangModel')->tambahBarang($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/barang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/barang');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Barang';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['barang'] = $this->model('BarangModel')->getBarangById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barang/edit', $data);
        $this->view('templates/footer');
    }

    public function updateBarang()
    {
        if ($this->model('BarangModel')->updateDataBarang($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/barang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/barang');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('BarangModel')->deleteBarang($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/barang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/barang');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Barang';
        $data['barang'] = $this->model('BarangModel')->cariBarang();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }
}
