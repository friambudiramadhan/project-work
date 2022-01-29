<?= $this->extend('templates/auth'); ?>

<?= $this->section('form'); ?>
<div class="container-xxl position-absolute top-50 start-50 translate-middle">

    <header class="text-center">
        <h1 class="header text-white mb-5">CoFFEE BEANS</h1>
        <p class="footer text-white mb-4">Masukkan Recovery Code yang sesuai dengan akun anda</p>
    </header>

    <main class="form-signin col-4 mx-auto">
        <form action="/LupaPassword/lupaPassword" method="POST" autocomplete="off">
            <div class="footer form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required value="<?= old('email'); ?>">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="footer form-floating mb-3">
                <input type="text" name="recovery-code" class="form-control <?= (empty($_SESSION['rc'])) ? '' : 'is-invalid'; ?>" id="floatingInput" placeholder="name@example.com" required value="<?= old('recovery-code'); ?>">
                <label for="floatingInput">Recovery Code</label>
                <div class="invalid-feedback text-white">
                    Recovery Code Tidak Cocok Dengan Email Anda
                </div>
            </div>
            <div class="footer form-floating mb-3">
                <input type="password" name="password-baru" class="form-control <?= (empty($_SESSION['password'])) ? '' : 'is-invalid'; ?>" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password Baru</label>
                <div class="invalid-feedback text-white">
                    Password Tidak Cocok
                </div>
            </div>
            <div class="footer form-floating mb-5">
                <input type="password" name="password-baru-konfirmasi" class="form-control <?= (empty($_SESSION['password'])) ? '' : 'is-invalid'; ?>" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Konfirmasi Password Baru</label>
                <div class="invalid-feedback text-white">
                    Password Tidak Cocok
                </div>
            </div>

            <div class="text-center mb-4">
                <button type="submit" name="submit" class="fs-6s w-50 h-25 btn btn-outline-light">Ganti Password</button>
            </div>
            <p class="footer text-center text-white">sudah punya akun? <a href="/" class="text-white">Masuk</a></p>
            <p class="footer mt-5 mb-3 text-muted text-center">&copy; CoFFEE BEANS 2021</p>
        </form>
    </main>
</div>
<?= $this->endSection(); ?>