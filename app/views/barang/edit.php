<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Barang</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/barang/updateBarang" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['barang']['id_barang']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama barang..." name="nama_barang" value="<?= $data['barang']['nama_barang']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" placeholder="Masukkan stok barang..." name="stok" value="<?= $data['barang']['stok']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="id_kategori">
                            <option value="">Pilih</option>
                            <?php foreach ($data['kategori'] as $row) : ?>
                                <option value="<?= $row['id_kategori']; ?>" <?php if ($data['barang']['id_kategori'] == $row['id_kategori']) {
                                                                                echo "selected";
                                                                            } ?>><?= $row['nama_kategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->