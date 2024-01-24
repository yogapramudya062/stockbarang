<?php

class TransaksiModel
{
    private $table = 'transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // TransaksiModel.php

    // TransaksiModel.php

    public function getAllTransaksi()
    {
        $query = "SELECT transaksi.*, master_barang.nama_barang, kategori_barang.nama_kategori
                FROM transaksi
                JOIN master_barang ON transaksi.id_barang = master_barang.id_barang
                JOIN kategori_barang ON master_barang.id_kategori = kategori_barang.id_kategori";

        $this->db->query($query);
        return $this->db->resultSet();
    }




    public function getTransaksiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_transaksi=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahTransaksi($data)
    {
        $query = "INSERT INTO transaksi (id_barang, jumlah, tanggal_transaksi) VALUES (:id_barang, :jumlah, :tanggal_transaksi)";
        $this->db->query($query);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('tanggal_transaksi', $data['tanggal_transaksi']);
        $this->db->execute();

        // Kurangi stok di master_barang
        $this->kurangiStok($data['id_barang'], $data['jumlah']);
    }

    private function kurangiStok($id_barang, $jumlah)
    {
        $query = "UPDATE master_barang SET stok = stok - :jumlah WHERE id_barang = :id_barang";
        $this->db->query($query);
        $this->db->bind('id_barang', $id_barang);
        $this->db->bind('jumlah', $jumlah);
        $this->db->execute();
    }


    public function updateDataTransaksi($data)
    {
        $query = "UPDATE $this->table SET 
        id_barang=:id_barang, jumlah=:jumlah, tanggal_transaksi=:tanggal_transaksi WHERE id_transaksi=:id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('tanggal_transaksi', $data['tanggal_transaksi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteTransaksi($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_transaksi=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
