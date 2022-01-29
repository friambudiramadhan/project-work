<?= $this->extend('templates/main-admin'); ?>

<?= $this->section('main'); ?>

<div class="container-xxl my-5">

    <header class="d-flex justify-content-between mb-3">
        <h2 class="header green">Daftar Pesanan User</h2>
        <form action="" method="POST" class="d-flex align-self-center" autocomplete="off">
            <input type="text" name="search" size="30" class="ms-auto me-3" placeholder="Cari Pesanan Disini" value="<?= ($input) ? $input : ''; ?>">
            <button type="submit" class="btn-success border-1 rounded-3" name="submit"><i class="bi bi-search"></i></button>
        </form>
    </header>
    <div class="text-end">
        <?php if ($input != null) : ?>
            <a href="" class="header text-decoration-none"><i class="bi bi-arrow-counterclockwise"></i> Reset Filter</a>
        <?php endif; ?>
    </div>

    <div>
        <?php foreach ($orders as $order) : ?>
            <?php if ($order['status'] == 'Menunggu Verifikasi Admin') : ?>
                <!-- container content -->
                <div class="my-5 border border-secondary rounded-3 bg-white">
                    <!-- header -->
                    <header class="mx-4 mt-3 d-flex">
                        <p class="footer green mt-1 fw-bold me-3">PID : <?= $order['order_id']; ?></p>
                        <p class="footer green me-3 mt-1"><?= $order['date']; ?></p>
                        <p class="header green me-3 mt-1"><?= $order['user_email']; ?></p>
                    </header>
                    <div class="m-4 d-flex">
                        <!-- menu image -->
                        <div>
                            <img src="/images/menu/<?= $order['image']; ?>" alt="" width="150" class="rounded-3 shadow-sm">
                        </div>
                        <!-- menu description -->
                        <div class="green ms-5 col-2">
                            <h4 class="header"><?= $order['product_name']; ?></h4>
                            <p class="footer"><?= $order['quantity']; ?> Barang</p>
                            <p class="footer"><?= $order['quantity'] * 1000; ?> Gram</p>
                            <p class="footer"><u><?= $order['product_grind']; ?></u></p>
                        </div>
                        <!-- recepient -->
                        <div class="green ms-3 col-2">
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
                            <a href="/admin/order/buktiPembayaran/<?= $order['order_id']; ?>" class="header btn-primary text-decoration-none p-2 rounded-3 shadow-sm">Lihat Bukti Pembayaran</a>
                        </div>
                    </div>
                    <div class="d-flex m-4">
                        <a href="/approval/terima/<?= $order['order_id']; ?>" class="header btn-success text-decoration-none p-2 rounded-3 shadow-sm border border-secondary me-3">Terima Pesanan</a>
                        <a href="/approval/tolak/<?= $order['order_id']; ?>" class="header btn-danger text-decoration-none p-2 rounded-3 shadow-sm border border-secondary">Tolak Pesanan</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection(); ?>