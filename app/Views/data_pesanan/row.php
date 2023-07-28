<div class="row">
    <div class="col-2">
        <?= $row['nama_mobil']; ?> (<?= $merk[0]['nama_merk']; ?>)
    </div>
    <div class="col">
        : <?= $jumlah; ?> Digunakan (Rp. <?= number_format($total * $waktu, 2, ',', '.'); ?>)
    </div>
</div>