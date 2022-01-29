<?= $this->extend('templates/main-admin'); ?>

<?= $this->section('main'); ?>
<div class="container-xxl my-5">

    <header class="d-flex justify-content-between mb-3">
        <h2 class="header green">Daftar Data User</h2>
        <form action="" method="POST" class="d-flex align-self-center" autocomplete="off">
            <input type="text" name="search" size="30" class="ms-auto me-3" placeholder="Cari User Disini" value="<?= ($input) ? $input : ''; ?>">
            <button type="submit" class="btn-success border-1 rounded-3" name="submit"><i class="bi bi-search"></i></button>
        </form>
    </header>
    <div class="text-end">
        <?php if ($input != null) : ?>
            <a href="" class="header text-decoration-none"><i class="bi bi-arrow-counterclockwise"></i> Reset Filter</a>
        <?php endif; ?>
    </div>
    <section class="my-5 d-flex flex-wrap justify-content-evenly">
        <?php foreach ($users as $user) : ?>
            <?php if ($user['level'] == 'user') : ?>
                <div class="bg-white rounded-3 border border-secondary shadow-sm d-inline-block mt-5">
                    <!-- isi container user -->
                    <div class="m-3">
                        <header class="d-flex justify-content-between mb-3">
                            <p class="footer green fw-bold">ID : <?= $user['id']; ?></p>
                            <p class="footer green"><i class="bi bi-telephone-fill"></i> : <?= $user['phone']; ?></p>
                        </header>
                        <section>
                            <p class="header green">Nama : <?= $user['name']; ?></p>
                            <p class="header green d-inline-block">Email : <?= $user['email']; ?></p>
                        </section>
                        <section class="d-flex align-items-center">
                            <p class="footer green me-5 mt-3">RC : <?= $user['recovery_code']; ?></p>
                            <a href="/AdminDataUser/editUser/<?= $user['id']; ?>" class="footer text-decoration-none btn-success px-3 rounded-3 me-3 shadow-sm border border-secondary">Edit</a>
                            <a href="/AdminDataUser/hapusUser/<?= $user['id']; ?>" class="footer text-decoration-none btn-danger px-3 rounded-3 shadow-sm border border-secondary" onclick="return confirm('Hapus Data?')">Hapus</a>
                        </section>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </section>
</div>
<?= $this->endSection(); ?>`