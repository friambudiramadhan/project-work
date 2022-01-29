<?= $this->extend('templates/auth'); ?>

<?= $this->section('form'); ?>

<div class="container-xxl position-absolute top-50 start-50 translate-middle">
    <form action="/Admin/editMenu/<?= $product['product_id']; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
        <header class="text-center mb-5">
            <h1 class="header text-white mb-5">CoFFEE BEANS</h1>
            <p class="footer text-white mb-4">Lengkapi Form Untuk Edit Menu</p>
        </header>

        <div class="d-flex justify-content-evenly align-items-center">
            <main class="form-signin col-4 me-5">
                <div class="footer form-floating mb-3">
                    <input type="text" name="nama-menu" class="form-control" id="floatingInput" placeholder="Nama Menu" value="<?= $product['product_name']; ?>" required>
                    <label for="floatingInput">Nama Menu</label>
                </div>
                <div class="footer form-floating mb-3">
                    <input type="number" name="harga" class="form-control" id="floatingInput" placeholder="Harga" required value="<?= $product['product_price']; ?>" min="100000" max="250000">
                    <label for="floatingInput">Harga</label>
                </div>
                <div class="form-floating">
                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Produk" id="floatingTextarea2" style="height: 200px" required><?= $product['product_description']; ?></textarea>
                    <label for="floatingTextarea2">Deskripsi</label>
                </div>

                <p class="footer mt-3 mb-3 text-muted text-center">&copy; CoFFEE BEANS 2021</p>
            </main>

            <section class="text-center">
                <img src="/images/menu/<?= $product['image']; ?>" alt="" width="250" class="rounded-3 shadow-sm mb-3">
                <div class="mb-3 mx-auto">
                    <label for="formFile" class="form-label footer text-white">Upload Foto Menu</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>
                <div class="text-center mb-4">
                    <button type="submit" name="submit" class="fs-6s w-50 h-25 btn btn-outline-light">Edit Menu</button>
                </div>
            </section>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>