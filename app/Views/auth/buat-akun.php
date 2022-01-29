<?= $this->extend('templates/auth'); ?>

<?= $this->section('form'); ?>

<div class="container-xxl position-absolute top-50 start-50 translate-middle">

    <header class="text-center">
        <h1 class="header text-white mb-5">CoFFEE BEANS</h1>
        <p class="footer text-white mb-4">Lengkapi Form Untuk Buat Akun</p>
    </header>

    <main class="form-signin col-4 mx-auto">
        <form action="/UserBuatAkun/buatAkun" method="POST" autocomplete="off">
            <div class="footer form-floating mb-3">
                <input type="text" name="nama-lengkap" class="form-control" id="floatingInput" placeholder="Nama Lengkap" required value="<?= old('nama-lengkap'); ?>">
                <label for="floatingInput">Nama Lengkap</label>
            </div>
            <div class="footer form-floating mb-3">
                <input type="text" name="nomor-telpon" class="form-control" id="floatingInput" placeholder="Nomor Telpon" required value="<?= old('nomor-telpon'); ?>">
                <label for="floatingInput">Nomor Telpon</label>
            </div>
            <div class="footer form-floating mb-3">
                <input type="email" name="email" class="form-control <?= (!empty($_SESSION['notempty'])) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@example.com" required value="<?= old('email'); ?>">
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback text-white">
                    Email Sudah Terdaftar
                </div>
            </div>
            <div class="footer form-floating mb-5">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <div class="text-center mb-4">
                <button type="submit" name="submit" class="fs-6s w-50 h-25 btn btn-outline-light">Buat Akun</button>
            </div>
            <p class="footer text-center text-white">sudah punya akun? <a href="/" class="text-white">Masuk</a></p>
            <p class="footer mt-5 mb-3 text-muted text-center">&copy; CoFFEE BEANS 2021</p>
        </form>
    </main>
</div>


<?= $this->endSection(); ?>