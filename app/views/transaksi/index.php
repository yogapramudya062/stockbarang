<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <?php Flasher::Message(); ?>
            </div>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title'] ?></h3>
                <div class="btn-group float-right">
                    <a href="<?= base_url; ?>/transaksi/tambah" class="btn btn-xs btn-primary">Tambah Transaksi</a>
                    <a href="<?= base_url; ?>/transaksi/laporan" class="btn float-right btn-xs btn btn-info" target="_blank">Laporan Transaksi</a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Tanggal Transaksi</th>
                            <th style="width:150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['transaksi'] as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td><?= $row['nama_kategori']; ?></td> <!-- Ganti dari $row['nama_barang'] menjadi $row['nama_kategori'] -->
                                <td><?= $row['jumlah']; ?></td>
                                <td><?= $row['tanggal_transaksi']; ?></td>
                                <td>
                                    <a href="<?= base_url; ?>/transaksi/edit/<?= $row['id_transaksi'] ?>" class="badge badge-info">Edit</a>
                                    <a href="<?= base_url; ?>/transaksi/hapus/<?= $row['id_transaksi'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->