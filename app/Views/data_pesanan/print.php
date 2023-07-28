<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/style.css">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">



    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Cetak Pesanan</title>
</head>

<body>
    <div class="container text-dark">
        <h1 style="background-color: cyan;" class="mt-5 text-center">Struk Pesanan Rental Mobil</h1>
        <div class="container p-5">
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
        </div>
        <h1 style="background-color: cyan;" class="text-center mt-5">Terimakasih</h1>

    </div>
    <script>
        window.print();
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/assets/vendor/chart.js/Chart.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>/assets/js/demo/chart-pie-demo.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>