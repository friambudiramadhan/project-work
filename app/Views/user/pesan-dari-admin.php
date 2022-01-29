<?= $this->extend('templates/auth'); ?>

<?= $this->section('form'); ?>
<div class="container-xxl position-relative" style="margin-top: 5%;">
    <div class="mb-5 text-center">
        <h1 class="header text-white">CoFFEE BEANS</h1>
        <P class="footer text-white">Halaman Alasan Penolakan Admin</P>
    </div>
    <div class="bg-white py-3 px-5 rounded-3 col-8 mx-auto text-center">
        <h2 class="header green">Pesan Dari Admin</h2>
        <hr>
        <p class="my-5"><?= $order['admin_message']; ?></p>
        <hr>
        <a href="https://api.whatsapp.com/send?phone=6282122651621" class="footer text-decoration-none btn-warning d-block py-1 col-2 mx-auto rounded-3 shadow-sm" target="blank">Contact Us</a>
    </div>

    <!-- container content -->
    <div class="my-5 border border-secondary rounded-3 bg-white">
        <!-- header -->
        <header class="mx-4 mt-3 d-flex align-items-center">
            <?php if ($order['status'] === 'Pesanan Gagal') : ?>
                <p class="footer text-white btn-danger rounded-3 me-3 px-2 align-self-center pt-1"><i class="bi bi-bag-x"></i> | <?= $order['status']; ?></p>
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