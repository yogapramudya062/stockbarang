<?php

class Transaksi extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Transaksi';
        $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Transaksi';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('transaksi/create', $data);
        $this->view('templates/footer');
    }

    public function simpanTransaksi()
    {
        if ($this->model('TransaksiModel')->tambahTransaksi($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/transaksi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/transaksi');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Transaksi';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
        $data['transaksi'] = $this->model('TransaksiModel')->getTransaksiById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('transaksi/edit', $data);
        $this->view('templates/footer');
    }

    public function updateTransaksi()
    {
        if ($this->model('TransaksiModel')->updateDataTransaksi($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/transaksi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/transaksi');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('TransaksiModel')->deleteTransaksi($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/transaksi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/transaksi');
            exit;
        }
    }
    // Controller.php

    public function laporan()
    {
        $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi(); // Ganti dengan model dan metode yang sesuai
        $pdf = new FPDF('p', 'mm', 'A4');

        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 14);
        // mencetak string
        $pdf->Cell(190, 7, 'LAPORAN TRANSAKSI', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 6, 'ID Transaksi', 1);
        $pdf->Cell(30, 6, 'Nama Kategori', 1);
        $pdf->Cell(30, 6, 'Nama Barang', 1);
        $pdf->Cell(40, 6, 'Jumlah', 1);
        $pdf->Cell(40, 6, 'Tanggal Transaksi', 1);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 10);

        foreach ($data['transaksi'] as $row) {
            $pdf->Cell(30, 6, $row['id_transaksi'], 1);
            $pdf->Cell(30, 6, $row['nama_kategori'], 1);
            $pdf->Cell(30, 6, $row['nama_barang'], 1);
            $pdf->Cell(40, 6, $row['jumlah'], 1);
            $pdf->Cell(40, 6, $row['tanggal_transaksi'], 1);
            $pdf->Ln();
        }

        $pdf->Output('I', 'Laporan Transaksi.pdf', true);
    }
}
