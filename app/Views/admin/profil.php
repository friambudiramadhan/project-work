<?= $this->extend('templates/main-admin'); ?>

<?= $this->section('main'); ?>
<div class="container-xxl">
    <header class="my-5 d-flex align-items-center">
        <h2 class="header green">Halo, <?= $admin['name']; ?>!</h2>
        <div class="d-flex ms-auto">
            <a href="/Admin/profil/<?= $admin['id']; ?>" class="header text-white text-decoration-none rounded-3 border-1 border-secondary shadow-sm btn-success py-2 px-3 me-3">Edit Profil</a>
        </div>
    </header>

    <section>
        <table class="green table table-borderless">
            <tr>
                <th>
                    <h4 class="header">Nama</h4>
                </th>
                <th>
                    <h4 class="header">:</h4>
                </th>
                <td>
                    <p class="footer"><?= $admin['name']; ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <h4 class="header">Email</h4>
                </th>
                <th>
                    <h4 class="header">:</h4>
                </th>
                <td>
                    <p class="footer"><?= $admin['email']; ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <h4 class="header">Nomor Telpon</h4>
                </th>
                <th>
                    <h4 class="header">:</h4>
                </th>
                <td>
                    <p class="footer"><?= $admin['phone']; ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <h4 class="header">Recovery Code</h4>
                </th>
                <th>
                    <h4 class="header">:</h4>
                </th>
                <td>
                    <p class="footer"><?= $admin['recovery_code']; ?></p>
                </td>
            </tr>
        </table>
    </section>
</div>
<?= $this->endSection(); ?>