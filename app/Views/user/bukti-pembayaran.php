<?= $this->extend('/templates/auth'); ?>

<?= $this->section('form'); ?>
<div class="container-xxl position-absolute top-50 start-50 translate-middle">
    <div class="text-center text-white mb-5">
        <h1 class="header">CoFFEE BEANS</h1>
        <h5 class="footer">Halaman Bukti Pembayaran</h5>
    </div>
    <div>
        <img src="/images/BuktiPembayaran/<?= $order['image_payment']; ?>" alt="Bukti Pembayaran" width="300" class="d-block mx-auto shadow-lg border border-3 rounded-3 mb-3">
        <p class="footer text-white text-center">Gambar diatas merupakan gambar yang telah anda upload sebagai bukti transfer</p>
    </div>

    <!-- container content -->
    <div class="my-5 border border-secondary rounded-3 bg-white">
        <!-- header -->
        <header class="mx-4 mt-3 d-flex align-items-center">
            <?php if ($order['status'] === 'Menunggu Pembayaran') : ?>
                <p class="footer text-white bg-yellow rounded-3 me-3 px-2 align-self-center pt-1"><i class="bi bi-wallet2"></i> | <?= $order['status']; ?></p>
            <?php elseif ($order['status'] === 'Menunggu Verifikasi Admin') : ?>
                <p class="footer text-white bg-turquoise rounded-3 me-3 px-2 align-self-center pt-1"><i class="bi bi-arrow-repeat"></i> | <?= $order['status']; ?></p>
            <?php elseif ($order['status'] === 'Sedang Dikirim') : ?>
                <p class="footer text-white bg-dark-turquoise rounded-3 me-3 px-2 align-self-center pt-1"><i class="bi bi-truck"></i> | <?= $order['status']; ?></p>
            <?php elseif ($order['status'] === 'Pesanan Gagal') : ?>
                <p class="footer text-white btn-danger rounded-3 me-3 px-2 align-self-center pt-1"><i class="bi bi-bag-x"></i> | <?= $order['status']; ?></p>
            <?php elseif ($order['status'] === 'Selesai') : ?>
                <p class="footer text-white btn-success rounded-3 me-3 px-2 align-self-center pt-1"><i class="bi bi-bag-check"></i> | <?= $order['status']; ?></p>
            <?php endif; ?>
            <p class="footer green mt-1 fw-bold me-3">PID : <?= $order['order_id']; ?></p>
            <p class="footer green me-3 mt-1"><?= $order['date']; ?></p>
            <p class="header green"><?= $order['user_email']; ?></p>
        </header>
        <div class="m-4 d-flex">
            <!-- menu image -->
            <div>
                <img src="/images/menu/<?= $order['image']; ?>" alt="" width="150" class="rounded-3 shadow-sm">
            </div>
            <!-- menu description -->
            <div class="green ms-5 col-2">
                <h4 class="header">Detail Produk</h4>
                <p class="footer"><?= $order['product_name']; ?> x <?= $order['quantity']; ?><br><?= $order['product_grind']; ?></p>

                <p class="footer"><?= $order['quantity']; ?>000 Gram</p>

                <p class="footer">Resi : <?= $order['tracking_number']; ?></p>
            </div>
            <!-- recepient -->
            <div class="green ms-2 col-2">
                <h4 class="header">Detail Penerima</h4>
                <p class="footer">Nama : <?= $order['recepient_name']; ?></p>
                <p class="footer">Telpon : <?= $order['recepient_phone']; ?></p>
            </div>
            <!-- address -->
            <div class="green ms-5 col-3">
                <h4 class="header">Alamat Pengiriman</h4>
                <p class="footer"><?= $order['address']; ?>, <?= $order['city']; ?>, <?= $order['zip_code']; ?></p>
            </div>
            <!-- option menu -->
            <div class="ms-auto text-center">
                <p class="footer green">Total Belanja</p>
                <h4 class="Footer green fw-bold mb-4">Rp <?= number_format($order['total_price'], 2, ",", "."); ?></h4>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>