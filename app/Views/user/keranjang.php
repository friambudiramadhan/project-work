<?= $this->extend('templates/main'); ?>

<?= $this->section('main'); ?>
<div class="container-xxl d-flex justify-content-evenly  flex-wrap">
    <?php if ($carts != null) : ?>
        <?php foreach ($carts as $cart) : ?>
            <div class="my-5 bg-white rounded-3 border border-secondary shadow-sm d-block">
                <div class="mx-4 my-3 d-flex text-center align-items-center">
                    <!-- image -->
                    <div>
                        <img src="/images/menu/<?= $cart['image']; ?>" alt="" width="230" class="rounded-3 mb-2">
                        <div>
                            <a href="/keranjang/checkout/<?= $cart['cart_id']; ?>" class="header btn-warning d-inline-block px-3 py-1 rounded-3 text-decoration-none">Checkout</a>
                        </div>
                    </div>
                    <!-- quantity -->
                    <div class="ms-5 me-4">
                        <h4 class="header green"><?= $cart['product_name']; ?></h4>
                        <p class="fw-bolder green footer">1000 Gram</p>
                        <p class="footer green fs-5"><?= $cart['product_grind']; ?></p>
                        <p class="footer green fs-5 mt-4 fw-bold"><?= number_format($cart['product_price'], 2, ",", "."); ?></p>
                        <div class="d-flex">
                            <div class="mx-auto">
                                <form action="/keranjang/update/<?= $cart['cart_id']; ?>/<?= $cart['product_id']; ?>" method="POST" class="d-flex align-items-center mb-2">
                                    <a href="/keranjang/delete/<?= $cart['cart_id']; ?>" class="text-white btn-danger px-2 py-1 rounded-3 me-2" onclick="return confirm('Hapus Dari Keranjang?')"><i class="bi bi-trash"></i></a>
                                    <input type="number" name="quantity" min="1" max="5" value="<?= $cart['quantity']; ?>" required class="rounded-3 border-1 text-center">
                                    <button type="submit" name="update" class="text-white btn-success px-2 py-1 rounded-3 shadow-0 border-0 ms-2"><i class="bi bi-arrow-up"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($carts == null) : ?>
        <div class="green position-absolute top-50 start-50 translate-middle text-center">
            <h1 class="header">Wah Keranjang Kamu Kosong Nih.</h1>
            <i class="bi bi-emoji-frown fs-1"></i>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>