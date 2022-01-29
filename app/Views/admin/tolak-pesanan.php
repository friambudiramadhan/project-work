<?= $this->extend('/templates/auth'); ?>

<?= $this->section('form'); ?>

<div class="container-xxl position-absolute top-50 start-50 translate-middle">
    <header class="text-white text-center mb-5">
        <h1 class="header mb-5">CoFFEE BEANS</h1>
        <p class="footer">Masukkan Alasan Penolakan Secara Detil</p>
    </header>

    <section class="col-4 mx-auto">
        <form action="/tolak/<?= $order['order_id']; ?>" method="POST">
            <textarea name="alasan" id="floatinInput" class="form-control mb-3" rows="1" placeholder="Masukkan Alasan Penolakan" required></textarea>
            <button type="submit" name="submit" class="btn-danger px-4 py-1 border-0 rounded-3 shadow-sm d-block mx-auto" onclick="return confirm('Tolak Pesanan?')">Tolak Pesanan</button>
        </form>
    </section>

    <!-- {{-- approval container --}} -->
    <div class="my-5 border border-secondary rounded-3 bg-white">
        <!-- header -->
        <header class="mx-4 mt-3 d-flex align-items-center">
            <?php if ($order['status'] === 'Menunggu Verifikasi Admin') : ?>
                <p class="footer text-white bg-turquoise rounded-3 me-3 px-2 align-self-center pt-1"><i class="bi bi-arrow-repeat"></i> | <?= $order['status']; ?></p>
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