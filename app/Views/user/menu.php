<?= $this->extend('templates/main'); ?>

<?= $this->section('main'); ?>
<div class="container-xxl">
    
    <div>
        <!-- container content -->
        <?php if (!empty($_SESSION['productnotnull'])) : ?>
            <div class="alert alert-danger footer" role="alert">
                <?= $_SESSION['productnotnull']; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($_SESSION['productsuccess'])) : ?>
            <div class="alert alert-info footer" role="alert">
                <?= $_SESSION['productsuccess']; ?>
            </div>
        <?php endif; ?>
        <?php foreach ($products as $product) : ?>
            <div class="my-5 border border-secondary rounded-3 bg-white">
                <div class="m-4 d-flex align-items-center">
                    <!-- menu image -->
                    <div>
                        <img src="/images/Menu/<?= $product['image']; ?>" alt="" width="230" class="rounded-3 shadow-sm">
                    </div>
                    <!-- menu description -->
                    <div class="green ms-5 col-6">
                        <h2 class="header"><?= $product['product_name']; ?></h2>
                        <p class="footer fw-bolder">1000 Gram</p>
                        <p><?= $product['product_description']; ?></p>
                    </div>
                    <!-- option menu -->
                    <div class="ms-auto text-center">
                        <h5 class="footer green fw-bold mb-3">Pilih Grind</h5>
                        <form action="/menu/tambah" method="POST">
                            <div class="d-flex">
                                <input type="radio" name="input" id="<?= $product['product_id']; ?>wholebean" class="grind" value="<?= $product['product_id']; ?>-<?= $_SESSION['user']; ?>-wholebean-<?= $product['product_name']; ?>-<?= $product['image']; ?>-<?= $product['product_price']; ?>" checked>
                                <label for="<?= $product['product_id']; ?>wholebean" class="footer grind-label me-5 mb-4">
                                    <p class="mt-1">wholebean</p>
                                </label>
                                <input type="radio" name="input" id="<?= $product['product_id']; ?>coarse" class="grind" value="<?= $product['product_id']; ?>-<?= $_SESSION['user']; ?>-coarse-<?= $product['product_name']; ?>-<?= $product['image']; ?>-<?= $product['product_price']; ?>">
                                <label for="<?= $product['product_id']; ?>coarse" class="footer grind-label text-center">
                                    <p class="mt-1">Coarse</p>
                                </label>
                            </div>
                            <div class="d-flex">
                                <input type="radio" name="input" id="<?= $product['product_id']; ?>medium" class="grind" value="<?= $product['product_id']; ?>-<?= $_SESSION['user']; ?>-medium-<?= $product['product_name']; ?>-<?= $product['image']; ?>-<?= $product['product_price']; ?>">
                                <label for="<?= $product['product_id']; ?>medium" class="footer grind-label text-center me-5 mb-4">
                                    <p class="mt-1">Medium</p>
                                </label>
                                <input type="radio" name="input" id="<?= $product['product_id']; ?>fine" class="grind" value="<?= $product['product_id']; ?>-<?= $_SESSION['user']; ?>-fine-<?= $product['product_name']; ?>-<?= $product['image']; ?>-<?= $product['product_price']; ?>">
                                <label for="<?= $product['product_id']; ?>fine" class="footer grind-label">
                                    <p class="mt-1">Fine</p>
                                </label>
                            </div>
                            <h5 class="footer green fw-bold">Rp <?= number_format($product['product_price'], 2, ",", "."); ?></h5>
                            <button type="submit" class="header btn btn-success px-4 border border-secondary shadow-sm">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<?= $this->endSection(); ?>