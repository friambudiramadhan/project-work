<?= $this->extend('templates/main'); ?>

<?= $this->section('main'); ?>
<div class="container-xxl">
    <form action="/checkout/<?= $product['product_id']; ?>-<?= $product['user_id']; ?>-<?= $product['image']; ?>-<?= $product['product_name']; ?>-<?= $product['product_grind']; ?>-<?= $product['product_price'] + 9000; ?>-<?= $product['quantity']; ?>-<?= $date; ?>-<?= $product['cart_id']; ?>" method="POST" autocomplete="off">
        <!-- product details -->
        <div class="container-xxl position-relative">
            <div class="position-absolute bg-white end-0 p-5 rounded-3 border border-secondary text-center shadow-sm mt-5">
                <h2 class="header green mb-4">Ringkasan Belanja</h2>
                <p class="footer green">Total Harga (<?= $product['quantity']; ?> Pieces)</p>
                <hr>
                <p class="footer green">Ongkos Kirim</p>
                <hr>
                <h4 class="footer green fw-bolder mb-3">Rp <?= number_format(($product['product_price'] + 9000), 2, ",", "."); ?></h4>
                <button type="submit" name="submit" class="header btn-success px-5 py-1 border-0 rounded-3">Beli</button>
            </div>
        </div>

        <!-- form -->
        <div class="col-6 mt-5">
            <h3 class="header green mb-3">Checkout</h3>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Nama Penerima" required>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                <input type="text" name="phone" class="form-control" placeholder="Nomor Telpon Penerima" required>
            </div>


            <p class="footer">Masukkan Alamat Secara Lengkap</p>
            <div class="input-group mb-4">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-building"></i></span>
                <input type="text" name="city" class="form-control me-3" placeholder="Kota" required>
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-mailbox"></i></span>
                <input type="text" name="post-code" class="form-control" placeholder="5 Digit Kode Pos" required>
            </div>

            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-house"></i></span>
                <textarea class="form-control" name="address" aria-label="With textarea" rows="3" placeholder="Tulis nama jalan, nomor rumah, nomor kompleks, rt rw, kelurahan, kecamatan, dan keterangan lainnya"></textarea>
            </div>
        </div>

        <!-- products -->
        <div class="my-5 bg-white rounded-3 border border-secondary shadow-sm d-inline-block">
            <div class="m-3 d-flex text-center align-items-center">
                <!-- image -->
                <div class="me-5">
                    <img src="/images/menu/<?= $product['image']; ?>" alt="" width="230" class="rounded-3">
                </div>
                <!-- quantity -->
                <div class="me-4">
                    <h3 class="header green"><?= $product['product_name']; ?></h3>
                    <p class="fw-bolder green footer"><?= $product['quantity'] * 1000; ?> Gram</p>
                    <p class="footer green fs-5 mb-4"><?= $product['product_grind']; ?></p>
                    <p class="footer green"><?= $product['quantity']; ?> pieces</p>
                    <p class="footer green fs-5 fw-bold">Rp <?= number_format($product['product_price'], 2, ",", "."); ?></p>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>