<?= $this->extend('templates/main-admin'); ?>

<?= $this->section('main'); ?>
<div class="container-xxl">
    <!-- tambah menu -->
    <div class="text-end my-5">
        <a href="/Admin/daftarMenu/tambah-menu" class="header text-decoration-none text-white bg-blue px-3 py-2 rounded-3 d-inline-block"><i class="bi bi-plus-circle"> Tambah Menu</i></a>
    </div>
    <!-- menu container  -->
    <div>
        <!-- container content -->
        <?php foreach ($products as $product) : ?>
            <div class="my-5 border border-secondary rounded-3 bg-white">
                <div class="m-4 d-flex align-items-center">
                    <!-- menu image -->
                    <div>
                        <img src="/images/menu/<?= $product['image']; ?>" alt="" width="230" class="rounded-3 shadow-sm">
                    </div>
                    <!-- menu description -->
                    <div class="green ms-5 col-6">
                        <h2 class="header"><?= $product['product_name']; ?></h2>
                        <p class="footer fw-bolder">1000gr</p>
                        <p><?= $product['product_description']; ?></p>
                    </div>
                    <!-- option menu -->
                    <div class="ms-auto me-5">
                        <div class="d-flex mb-5">
                            <a href="/Admin/daftarMenu/edit/<?= $product['product_id']; ?>" class="header text-decoration-none text-white btn-success py-1 px-4 rounded shadows-sm border border-secondary me-3">Edit</a>
                            <a href="/Admin/daftarMenu/hapus/<?= $product['product_id']; ?>" class="header text-decoration-none text-white btn-danger py-1 px-3 rounded shadows-sm border border-secondary" onclick="return confirm('Hapus Data?')">Hapus</a>
                        </div>
                        <div class="text-center">
                            <h3 class="header green">Harga</h3>
                            <h4 class="footer green">Rp. <?= number_format($product['product_price'], 2, ",", "."); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>