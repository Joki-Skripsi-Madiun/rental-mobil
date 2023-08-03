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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
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
                    <?php if (user()->status == 1) { ?>
                        <form class="row g-3" action="/data-pesanan/save" method="post" enctype="multipart/form-data">
                            <input name="proses" value="0" type="hidden" class="form-control" id="inputAddress" placeholder="Proses">
                            <div class="col-12">
                                <label for="inputState" class="form-label">Nama Pemesan</label>
                                <select name="id_pemesan" id="inputState" class="form-select">
                                    <option selected>Pilih...</option>
                                    <?php
                                    foreach ($pemesan as $p) : ?>
                                        <option value="<?= $p['id']; ?>"><?= $p['fullname']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputState" class="form-label">Mobil</label>
                                <select name="id_mobil" id="mobil" class="form-select">
                                    <option selected>Pilih...</option>
                                    <?php
                                    foreach ($mobil as $m) : ?>
                                        <option value="<?= $m['id_mobil'] ?>"><?= $m['nama_mobil'] ?> - <?= $m['warna'] ?> ( Rp.<?= number_format($m['harga'], 2, ',', '.'); ?> )</option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputState" class="form-label">Perjalanan</label>
                                <select name="id_perjalanan" id="inputState" class="form-select">
                                    <option selected>Pilih...</option>
                                    <?php
                                    foreach ($perjalanan as $p) : ?>
                                        <option value="<?= $p['id_perjalanan']; ?>"><?= $p['asal']; ?> - <?= $p['tujuan']; ?> (<?= $p['jarak']; ?> KM)</option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Jenis Bayar</label>
                                <select name="id_jenisbayar" id="inputState" class="form-select">
                                    <option selected>Pilih...</option>
                                    <?php
                                    foreach ($bayar as $b) : ?>
                                        <option value="<?= $b['id_jenisbayar']; ?>"><?= $b['jenis_bayar']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="merk" class="form-label">Lama Sewa (Hari)</label>
                                <input name="hari" type="text" class="form-control" id="hari" placeholder="Hari">
                            </div>
                            <div class="col-md-6">
                                <label for="merk" class="form-label">Tanggal Pinjam</label>
                                <input name="tgl_pinjam" type="date" class="form-control" id="inputAddress" placeholder="No Polisi">
                            </div>
                            <div class="col-md-6">
                                <label for="merk" class="form-label">Tanggal Kembali</label>
                                <input name="tgl_kembali" type="date" class="form-control" id="inputAddress" placeholder="Tahun Beli">
                            </div>
                            <p>Total Price: Rp.<span id="total-price">0</span></p>
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</button>
                                <input class="btn btn-danger" type="reset" value="X Batal">
                            </div>
                        </form>
                    <?php }
                    if (user()->status == 2) { ?>
                        <form class="row g-3" action="/data-pesanan/save" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="inputState" class="form-label">Mobil</label>
                                <select name="id_mobil" id="mobil" class="form-select">
                                    <option selected>Pilih...</option>
                                    <?php
                                    foreach ($mobil as $m) : ?>
                                        <option value="<?= $m['id_mobil'] ?>"><?= $m['nama_mobil'] ?> - <?= $m['warna'] ?> ( Rp.<?= $m['harga'] ?> )</option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <input name="proses" value="0" type="hidden" class="form-control" id="inputAddress" placeholder="Proses">
                            <input name="id_pemesan" value="<?= user()->id ?>" type="hidden" class="form-control" id="inputAddress" placeholder="Jenis Bayar">
                            <input name="id_perjalanan" value="0" type="hidden" class="form-control" id="inputAddress" placeholder="Jenis Bayar">

                            <input name="id_jenisbayar" value="0" type="hidden" class="form-control" id="inputAddress" placeholder="Jenis Bayar">
                            <div class="col-md-12">
                                <label for="merk" class="form-label">Lama Sewa (Hari)</label>
                                <input name="hari" type="text" class="form-control" id="hari" placeholder="Hari">
                            </div>
                            <div class="col-md-6">
                                <label for="merk" class="form-label">Tanggal Pinjam</label>
                                <input name="tgl_pinjam" type="date" class="form-control" id="inputAddress" placeholder="No Polisi">
                            </div>
                            <div class="col-md-6">
                                <label for="merk" class="form-label">Tanggal Kembali</label>
                                <input name="tgl_kembali" type="date" class="form-control" id="inputAddress" placeholder="Tahun Beli">
                            </div>
                            <p>Total Price: Rp.<span id="total-price">0</span></p>
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</button>
                                <input class="btn btn-danger" type="reset" value="X Batal">
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Area Data -->
        <div class="col-xl-8 col-lg-9">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pemesanan</th>
                                <th>Mobil</th>
                                <th>Proses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($joinpesanan->getResult() as $p) : ?>

                                <tr>

                                    <td><?= $no++ ?></td>
                                    <td><?= $p->fullname; ?></td>
                                    <td><?= $p->nama_mobil; ?></td>
                                    <td><?php if ($p->proses == 0) { ?>
                                            <span class="badge rounded-pill bg-secondary">belum diverifikasi</span>
                                        <?php } elseif ($p->proses == 1) { ?>
                                            <span class="badge rounded-pill bg-primary">sudah diverifikasi</span>
                                        <?php } else { ?>
                                            <span class="badge rounded-pill bg-danger">selesai</span>
                                        <?php } ?>
                                    </td>

                                    <td>
                                        <?php if (user()->status == 1) { ?>
                                            <a href="/data-pesanan/edit/<?= $p->id_pesanan; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>
                                        <?php } elseif (user()->status == 2 &&  $p->proses == 1) { ?>
                                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>
                                        <?php } else { ?>
                                            <a href="/data-pesanan/edit/<?= $p->id_pesanan; ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>
                                        <?php } ?>

                                        <a href="/data-pesanan/detail/<?= $p->id_pesanan; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Detail</a>
                                        <a href="/data-pesanan/print/<?= $p->id_pesanan; ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                        <?php if (user()->status == 1) { ?>
                                            <form action="/data-pesanan/<?= $p->id_pesanan; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="id_mobil" value="<?= $p->id_mobil; ?>">
                                                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fas fa-trash fa-sm text-white-50"></i> Hapus</a> </button>
                                            </form>
                                        <?php } elseif (user()->status == 2 &&  $p->proses == 1) { ?>
                                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> Hapus</a>
                                        <?php } else { ?>
                                            <form action="/data-pesanan/<?= $p->id_pesanan; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="id_mobil" value="<?= $p->id_mobil; ?>">
                                                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fas fa-trash fa-sm text-white-50"></i> Hapus</a> </button>
                                            </form>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Pemesanan</th>
                                <th>Mobil</th>
                                <th>Proses</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<?= $this->endSection(); ?>