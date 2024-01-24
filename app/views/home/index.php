<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-primary"><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <div class="card-body">
                <p class="lead">Selamat datang di Aplikasi Stock Barang!</p>
                <p>Anda dapat mulai mengelola stok barang Anda dari sini.</p>
                <!-- Tambahkan konten sesuai kebutuhan aplikasi Anda -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-light">
                <p class="text-muted">Aplikasi Stock Barang - &copy; <?= date('Y'); ?></p>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Tambahkan CSS di bawah ini atau sesuaikan dengan file eksternal -->
<style>
    .lead {
        font-size: 1.25rem;
        font-weight: 700;
        color: #333;
    }

    .text-primary {
        color: #007bff;
    }

    .bg-light {
        background-color: #f8f9fa;
    }

    .text-muted {
        color: #6c757d;
    }
</style>