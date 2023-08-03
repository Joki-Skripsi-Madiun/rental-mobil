<tr>
    <td><?= $no ?></td>
    <td><?= $merk[0]['nama_merk']; ?></td>
    <td><?= $row['nama_mobil']; ?></td>
    <td><?= $jumlah; ?> Digunakan</td>
    <td style="text-align: right;">Rp. <?= number_format($total * $waktu, 2, ',', '.'); ?></td>
</tr>