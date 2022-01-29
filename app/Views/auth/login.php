<?= $this->extend('templates/auth'); ?>

<?= $this->section('form'); ?>
<div class="container-xxl position-absolute top-50 start-50 translate-middle">

    <header class="text-center">
        <h1 class="header text-white mb-5">CoFFEE BEANS</h1>
        <p class="footer text-white mb-4">Selamat Datang!</p>
    </header>

    <main class="form-signin col-4 mx-auto">
        <form action="/LoginController/login" method="POST" autocomplete="off">
            <div class="footer form-floating mb-3">
                <input type="email" name="email" class="form-control <?= (!empty($_SESSION['pass']) || !empty($_SESSION['empty'])) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@example.com" value="<?= old('email'); ?>">
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback text-white"></div>
            </div>
            <div class="footer form-floating mb-3">
                <input type="password" name="password" class="form-control <?= (!empty($_SESSION['pass']) || !empty($_SESSION['empty'])) ? 'is-invalid' : ''; ?>" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback text-white">
                    <?= (!empty($_SESSION['empty'])) ? 'Akun Tidak Terdaftar' : ''; ?>
                    <?= (!empty($_SESSION['pass'])) ? 'Email atau Password Salah!' : ''; ?>
                </div>
            </div>
            <div class="text-end mb-5">
                <a href="/lupaPassword" class="footer text-white">
                    <p>Lupa Password?</p>
                </a>
            </div>

            <div class="text-center mb-4">
                <button type="submit" name="submit" class="fs-6s w-50 h-25 btn btn-outline-light">Masuk</button>
            </div>
            <p class="footer text-center text-white">Belum punya akun? <a href="/buatAkun" class="text-white">Buat Akun</a></p>
            <p class="footer mt-5 mb-3 text-muted text-center">&copy; CoFFEE BEANS 2021</p>
        </form>
    </main>
</div>
<?= $this->endSection(); ?>