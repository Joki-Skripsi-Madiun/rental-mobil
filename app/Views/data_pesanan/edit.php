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
        <div class="col-xl3 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5>Periksa Entrian Form</h5>
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if (user()->status == 2) { ?>
                        <form class="row g-3" action="/data-pesanan/update/<?= $datapesanan['id_pesanan']; ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_pesanan" value="<?= (old('id_pesanan')) ? old('id_pesanan') : $datapesanan['id_pesanan']; ?>">

                            <div class="col-12">
                                <label for="inputState" class="form-label">Mobil</label>
                                <select name="id_mobil" id="mobil" class="form-select">
                                    <option selected value="<?= (old('id_mobil')) ? old('id_mobil') : $joinpesanan->getRow('id_mobil'); ?>"><?= $joinpesanan->getRow('nama_mobil') ?> - <?= $joinpesanan->getRow('warna') ?> ( Rp.<?= number_format($joinpesanan->getRow('harga'), 2, ',', '.') ?> )</option>
                                    <?php
                                    foreach ($mobil as $m) : ?>
                                        <option value="<?= $m['id_mobil'] ?>"><?= $m['nama_mobil'] ?> - <?= $m['warna'] ?> ( Rp.<?= number_format($m['harga'], 2, ',', '.') ?> )</option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <input name="proses" value="<?= (old('proses')) ? old('proses') : $joinpesanan->getRow('proses'); ?>" type="hidden" class="form-control" id="inputAddress" placeholder="Proses">
                            <input name="id_pemesan" value="<?= (old('id_pemesan')) ? old('id_pemesan') : $joinpesanan->getRow('id_pemesan'); ?>" type="hidden" class="form-control" id="inputAddress" placeholder="Jenis Bayar">
                            <input name="id_perjalanan" value="<?= (old('id_perjalanan')) ? old('id_perjalanan') : $joinpesanan->getRow('id_perjalanan'); ?>" type="hidden" class="form-control" id="inputAddress" placeholder="Jenis Bayar">

                            <input name="id_jenisbayar" value="<?= (old('id_jenisbayar')) ? old('id_jenisbayar') : $joinpesanan->getRow('id_jenisbayar'); ?>" type="hidden" class="form-control" id="inputAddress" placeholder="Jenis Bayar">
                            <div class="col-md-12">
                                <label for="merk" class="form-label">Lama Sewa (Hari)</label>
                                <input name="hari" value="<?= (old('hari')) ? old('hari') : $joinpesanan->getRow('hari'); ?>" type="number" class="form-control" id="hari" placeholder="No Polisi">
                            </div>


                            <div class="col-md-6">
                                <label for="merk" class="form-label">Tanggal Pinjam</label>
                                <input name="tgl_pinjam" value="<?= (old('tgl_pinjam')) ? old('tgl_pinjam') : $joinpesanan->getRow('tgl_pinjam'); ?>" type="date" class="form-control" id="inputAddress" placeholder="No Polisi">
                            </div>
                            <div class="col-md-6">
                                <label for="merk" class="form-label">Tanggal Kembali</label>
                                <input name="tgl_kembali" value="<?= (old('tgl_kembali')) ? old('tgl_kembali') : $joinpesanan->getRow('tgl_kembali'); ?>" type="date" class="form-control" id="inputAddress" placeholder="Tahun Beli">
                            </div>
                            <p>Total Price: Rp.<span id="total-price"><?= number_format($joinpesanan->getRow('harga') * $joinpesanan->getRow('hari'), 2, ',', '.') ?></span></p>
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/data-pesanan" class="btn btn-warning  float-right">Kembali</a>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form class="row g-3" action="/data-pesanan/update/<?= $datapesanan['id_pesanan']; ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_pesanan" value="<?= (old('id_pesanan')) ? old('id_pesanan') : $datapesanan['id_pesanan']; ?>">
                            <div class="col-12">
                                <label for="inputState" class="form-label">Status Proses</label>

                                <select name="proses" id="inputState" class="form-select">
                                    <option selected value="<?= (old('proses')) ? old('proses') : $joinpesanan->getRow('proses'); ?>"><?= $joinpesanan->getRow('proses') == 0 ? 'Belum Diverifikasi' : ($joinpesanan->getRow('proses') == 1 ? 'Sudah Diverifikasi' : 'Selesai'); ?></option>

                                    <option value="0">Belum Diverifikasi</option>
                                    <option value="1">Sudah Diverifikasi</option>
                                    <option value="2">Selesai</option>

                                </select>
                            </div>

                            <input name="id_mobilLama" value="<?= $joinpesanan->getRow('id_mobil'); ?>" type="hidden" class="form-control" id="inputAddress" placeholder="Proses">
                            <div class="col-12">
                                <label for="inputState" class="form-label">Nama Pemesan</label>

                                <select name="id_pemesan" id="inputState" class="form-select">
                                    <option selected value="<?= (old('id_pemesan')) ? old('id_pemesan') : $joinpesanan->getRow('id_pemesan'); ?>"><?= (old('fullname')) ? old('fullname') : $joinpesanan->getRow('fullname'); ?></option>
                                    <?php
                                    foreach ($pemesan as $p) : ?>
                                        <option value="<?= $p['id']; ?>"><?= $p['fullname']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputState" class="form-label">Mobil</label>
                                <select name="id_mobil" id="inputState" class="form-select">
                                    <option selected value="<?= (old('id_mobil')) ? old('id_mobil') : $joinpesanan->getRow('id_mobil'); ?>"><?= $joinpesanan->getRow('nama_mobil') ?> - <?= $joinpesanan->getRow('warna') ?> ( Rp.<?= $joinpesanan->getRow('harga') ?> )</option>
                                    <?php
                                    foreach ($mobil as $m) : ?>
                                        <option value="<?= $m['id_mobil'] ?>"><?= $m['nama_mobil'] ?> - <?= $m['warna'] ?> ( Rp.<?= $m['harga'] ?> )</option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputState" class="form-label">Perjalanan</label>
                                <select name="id_perjalanan" id="inputState" class="form-select">
                                    <option selected value="<?= (old('id_perjalanan')) ? old('id_perjalanan') : $joinpesanan->getRow('id_perjalanan'); ?>">
                                        <?= (old('asal')) ? old('asal') : $joinpesanan->getRow('asal'); ?> -
                                        <?= (old('tujuan')) ? old('tujuan') : $joinpesanan->getRow('tujuan'); ?>
                                        (<?= (old('jarak')) ? old('jarak') : $joinpesanan->getRow('jarak'); ?> KM)
                                    </option>
                                    <?php
                                    foreach ($perjalanan as $p) : ?>
                                        <option value="<?= $p['id_perjalanan']; ?>"><?= $p['asal']; ?> - <?= $p['tujuan']; ?> (<?= $p['jarak']; ?> KM)</option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Jenis Bayar</label>
                                <select name="id_jenisbayar" id="inputState" class="form-select">
                                    <option selected value="<?= (old('id_jenisbayar')) ? old('id_jenisbayar') : $joinpesanan->getRow('id_jenisbayar'); ?>"><?= (old('jenis_bayar')) ? old('jenis_bayar') : $joinpesanan->getRow('jenis_bayar'); ?></option>
                                    <?php
                                    foreach ($bayar as $b) : ?>
                                        <option value="<?= $b['id_jenisbayar']; ?>"><?= $b['jenis_bayar']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="merk" class="form-label">Lama Sewa (Hari)</label>
                                <input name="hari" value="<?= (old('hari')) ? old('hari') : $joinpesanan->getRow('hari'); ?>" type="number" class="form-control" id="hari" placeholder="Hari">
                            </div>
                            <div class="col-md-6">
                                <label for="merk" class="form-label">Tanggal Pinjam</label>
                                <input name="tgl_pinjam" value="<?= (old('tgl_pinjam')) ? old('tgl_pinjam') : $joinpesanan->getRow('tgl_pinjam'); ?>" type="date" class="form-control" id="inputAddress" placeholder="No Polisi">
                            </div>
                            <div class="col-md-6">
                                <label for="merk" class="form-label">Tanggal Kembali</label>
                                <input name="tgl_kembali" value="<?= (old('tgl_kembali')) ? old('tgl_kembali') : $joinpesanan->getRow('tgl_kembali'); ?>" type="date" class="form-control" id="inputAddress" placeholder="Tahun Beli">
                            </div>
                            <p>Total Price: Rp.<span id="total-price">0</span></p>
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/data-pesanan" class="btn btn-warning  float-right">Kembali</a>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>