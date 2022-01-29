<?= $this->extend('templates/auth'); ?>

<?= $this->section('form'); ?>
<div class="container-xxl position-absolute top-50 start-50 translate-middle">
    <header class="text-center">
        <h1 class="header text-white mb-5">CoFFEE BEANS</h1>
        <p class="footer text-white mb-4">Lengkapi Form Untuk Perbarui Profil</p>
    </header>

    <main class="form-signin col-4 mx-auto">
        <form action="/AdminEditProfil/editAdmin/<?= $admin['id']; ?>" method="POST" autocomplete="off">
            <div class="footer form-floating mb-3">
                <input type="text" name="nama-lengkap" class="form-control" id="floatingInput" placeholder="Nama Lengkap" required value="<?= $admin['name']; ?>">
                <label for="floatingInput">Nama Lengkap</label>
            </div>
            <div class="footer form-floating mb-3">
                <input type="email" name="email" class="form-control <?= (!empty($_SESSION['editadminnotnull'])) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="name@example.com" required value="<?= (!empty($_SESSION['editadminnotnull'])) ? old('email') : $admin['email']; ?>">
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback text-white">
                    Email Sudah Terdaftar
                </div>
            </div>
            <div class="footer form-floating mb-3">
                <input type="text" name="nomor-telpon" class="form-control" id="floatingInput" placeholder="Nomor Telpon" required value="<?= $admin['phone']; ?>">
                <label for="floatingInput">Nomor Telpon</label>
            </div>

            <div class="text-center mb-4">
                <button type="submit" name="submit" class="fs-6s w-50 h-25 btn btn-outline-light">Update Profil</button>
            </div>
            <p class="footer mt-5 mb-3 text-muted text-center">&copy; CoFFEE BEANS 2021</p>
        </form>
    </main>
</div>
<?= $this->endSection(); ?>