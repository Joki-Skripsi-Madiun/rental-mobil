<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Harga Mobil</h1>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Content Row -->

    <div class="row">



        <!-- Area Data -->
        <?php $no = 1;
        foreach ($joinmobil->getResult() as $m) : ?>
            <div class="col-xl-4 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $m->nama_mobil; ?></h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row my-3">
                            <div class="col-4">Nama Merk</div>
                            <div class="col">: <?= $m->nama_merk; ?></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">Nama Mobil</div>
                            <div class="col">: <?= $m->nama_mobil; ?></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">Harga Sewa</div>
                            <div class="col">: Rp. <?= number_format($m->harga, 2, ',', '.');  ?></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">Warna Mobil</div>
                            <div class="col">: <?= $m->warna;  ?></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">Jumlah Kursi</div>
                            <div class="col">: <?= $m->jumlah_kursi;  ?></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">No Polisi</div>
                            <div class="col">: <?= $m->no_polisi;  ?></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">Tahun Beli</div>
                            <div class="col">: <?= $m->tahun_beli;  ?></div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">Gambar Mobil</div>
                            <div class="col"><img class="px-3 px-sm-4 mt-3 mb-4 img-thumbnail" width="200px" height="200px" src="/img/<?= $m->gambar; ?>" alt="<?= $m->gambar;  ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>


<?= $this->endSection(); ?>