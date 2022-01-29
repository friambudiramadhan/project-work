<?= $this->extend('templates/main-admin'); ?>

<?= $this->section('main'); ?>
<!-- header -->
<div class="container-xxl d-flex align-items-center justify-content-between col-8 my-5">
    <div>
        <h2 class="header green">Selamat Datang Admin!</h2>
        <p class="footer green">Selamat datang di Halaman Administrasi<br>Kelola data dengan bijak!</p>
    </div>
    <div class="text-center">
        <img src="/images/sack.png" alt="sack.png" width="160">
        <h3 class="footer green euphoria mt-2">Serve Well</h3>
    </div>
</div>

<!-- main -->
<div class="container-xxl col-8">
    <div class="d-flex justify-content-evenly mt-5">
        <!-- data user -->
        <div class="text-center bg-white py-5 col-3 rounded-3 shadow border border-secondary">
            <h3 class="header purple mb-4">Data User</h3>
            <p class="footer mb-4">Daftar lengkap informasi user<br>beserta fungsi kelola user</p>
            <a href="/Admin/dataUser" class="header text-white text-decoration-none px-3 py-2 rounded-3 bg-purple">Daftar Data User</a>
        </div>

        <!-- approval -->
        <div class="text-center bg-white py-5 col-3 rounded-3 shadow border border-secondary">
            <h3 class="header brown mb-4">Approval</h3>
            <p class="footer mb-4">Berisi data pesanan user yang<br>belum dikonfirmasi oleh admin</p>
            <a href="/Admin/approval" class="header text-white text-decoration-none px-3 py-2 rounded-3 bg-brown">Approval</a>
        </div>

        <!-- daftar menu -->
        <div class="text-center bg-white py-5 col-3 rounded-3 shadow border border-secondary">
            <h3 class="header leaf mb-4">Daftar Menu</h3>
            <p class="footer mb-4">Berisi daftar menu beserta<br>fungsi edit dan tambah menu</p>
            <a href="/Admin/daftarMenu" class="header text-white text-decoration-none px-3 py-2 rounded-3 bg-leaf">Daftar Menu</a>
        </div>
    </div>

    <div class="d-flex justify-content-evenly mb-5 mt-5">
        <!-- riwayat pesanan -->
        <div class="text-center bg-white py-5 col-3 rounded-3 shadow border border-secondary">
            <h3 class="header dark-turquoise mb-4">Riwayat Pesanan</h3>
            <p class="footer mb-4">Daftar riwayat transaksi pesanan<br>user dengan informasi lengkap</p>
            <a href="/Admin/riwayatPesanan" class="header text-white text-decoration-none px-3 py-2 rounded-3 bg-dark-turquoise">Riwayat Pesanan</a>
        </div>

        <!-- buat akun admin -->
        <?php if (!empty($_SESSION['logedinsadmin'])) : ?>
            <div class="text-center bg-white py-5 col-3 rounded-3 shadow border border-secondary">
                <h3 class="header blue mb-4">Buat Akun Admin</h3>
                <p class="footer mb-4">Berisi form untuk pendaftaran<br>akun baru level admin</p>
                <a href="/Admin/buatAkunAdmin" class="header text-white text-decoration-none px-3 py-2 rounded-3 bg-blue">Buat Akun Admin</a>
            </div>
        <?php endif; ?>

        <!-- profil -->
        <div class="text-center bg-white py-5 col-3 rounded-3 shadow border border-secondary">
            <h3 class="header turquoise mb-4">Profil</h3>
            <p class="footer mb-4">Berisi informasi lengkap <br>data akun anda</p>
            <a href="/Admin/profil" class="header text-white text-decoration-none px-3 py-2 rounded-3 bg-turquoise">Profil</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>