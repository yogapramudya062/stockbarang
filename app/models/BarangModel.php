<?php

class BarangModel
{
    private $table = 'master_barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT master_barang.*, kategori_barang.nama_kategori FROM ' . $this->table . ' JOIN kategori_barang ON kategori_barang.id_kategori = master_barang.id_kategori');

        return $this->db->resultSet();
    }

    public function getBarangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_barang=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahBarang($data)
    {
        $query = "INSERT INTO $this->table (id_kategori, nama_barang, stok) VALUES (:id_kategori, :nama_barang, :stok)";
        $this->db->query($query);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('stok', $data['stok']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBarang($data)
    {
        $query = "UPDATE $this->table SET 
        id_kategori=:id_kategori, nama_barang=:nama_barang, stok=:stok WHERE id_barang=:id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('stok', $data['stok']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteBarang($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_barang=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariBarang()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM $this->table WHERE nama_barang LIKE :key");
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
