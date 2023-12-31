<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pesanan</h1>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Form -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-4">Nama Pemesan </div>
                        <div class="col">: <?= $joinpesanan->getRow('fullname'); ?></div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">Nama Mobil</div>
                        <div class="col">: <?= $joinpesanan->getRow('nama_mobil'); ?> - Rp.<?= number_format($joinpesanan->getRow('harga'), 2, ',', '.'); ?>/Hari</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">Perjalanan</div>
                        <div class="col">:
                            <?= $joinpesanan->getRow('asal'); ?> -
                            <?= $joinpesanan->getRow('tujuan'); ?>
                            (<?= $joinpesanan->getRow('jarak'); ?> KM)
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">Jenis Bayar</div>
                        <div class="col">: <?= $joinpesanan->getRow('jenis_bayar'); ?></div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">Lama Sewa (Hari)</div>
                        <div class="col">: <?= $joinpesanan->getRow('hari'); ?> Hari</div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">Harga</div>
                        <div class="col">: Rp.<?= number_format($joinpesanan->getRow('harga') * $joinpesanan->getRow('hari'), 2, ',', '.'); ?></div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">Tanggal Pinjam</div>
                        <div class="col">: <?= date('d-m-Y', strtotime($joinpesanan->getRow('tgl_pinjam'))) ?></div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">Tanggal Kembali</div>
                        <div class="col">: <?= date('d-m-Y', strtotime($joinpesanan->getRow('tgl_kembali'))) ?></div>
                    </div>
                    <div class="row my-3">
                        <div class="col-4">Status</div>
                        <div class="col">:
                            <?php if ($joinpesanan->getRow('proses') == 0) { ?>
                                <span class="badge rounded-pill bg-secondary">belum diverifikasi</span>
                            <?php } elseif ($joinpesanan->getRow('proses') == 1) { ?>
                                <span class="badge rounded-pill bg-primary">sudah diverifikasi</span>
                            <?php } else { ?>
                                <span class="badge rounded-pill bg-danger">selesai</span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <a href="/data-pesanan" class="btn btn-warning  float-right">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-5">
            <?php if ($joinpesanan->getRow('proses') == 0) { ?>
                <div class="alert alert-primary" role="alert">
                    Proses Booking berhasil dilakukan. Silahkan datang ke kantor untuk proses lebih lanjut !
                </div>
            <?php } elseif ($joinpesanan->getRow('proses') == 1) { ?>
                <div class="alert alert-primary" role="alert">
                    Proses Rental sedang berlangsung silahkan menikmati layanan kami !
                </div>
            <?php } else { ?>
                <div class="alert alert-primary" role="alert">
                    Proses Rental telah selesai terimakasih sudah menggunakan layanan kami !
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>