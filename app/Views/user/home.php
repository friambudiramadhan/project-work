<?= $this->extend('templates/main'); ?>

<?= $this->section('main'); ?>

<div class="container-xxl">
    <!-- header -->
    <header class="d-flex my-5 align-items-center">
        <div class="me-5 col-6">
            <h2 class="header green">Apa Itu CoFFEE BEANS?</h2>
            <p class="footer green">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione inventore, maxime aliquam saepe atque cupiditate odio. Labore quibusdam commodi consequuntur aut quisquam dolor exercitationem blanditiis possimus quasi, alias iste facilis ad! Iure nobis aliquid reiciendis nemo excepturi natus possimus maxime. Explicabo tempora optio at magni eos. Maiores modi accusantium nam quisquam temporibus blanditiis, consequatur at dolorum nihil sint voluptas fugit assumenda magnam doloremque? Aut error facere, aperiam modi possimus, ullam, autem totam eveniet officiis placeat sint commodi ipsam voluptate vitae?</p>
        </div>
        <div class="ms-auto">
            <video autoplay muted loop="true" width="500    " autoplay="true" class="rounded-3 shadow">
                <source src="/videos/video.mp4" type="video/mp4">
            </video>
        </div>
    </header>

    <!-- section 1 -->
    <section class="d-flex align-items-center collapse mb-5">
        <img src="/images/poster.jpg" alt="" width="350" class="rounded-3 shadow">
        <div class="ms-5">
            <h2 class="header green">Mengapa Pilih Produk Kami?</h2>
            <p class="footer green">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione inventore, maxime aliquam saepe atque cupiditate odio. Labore quibusdam commodi consequuntur aut quisquam dolor exercitationem blanditiis possimus quasi, alias iste facilis ad! Iure nobis aliquid reiciendis nemo excepturi natus possimus maxime. Explicabo tempora optio at magni eos. Maiores modi accusantium nam quisquam temporibus blanditiis, consequatur at dolorum nihil sint voluptas fugit assumenda magnam doloremque? Aut error facere, aperiam modi possimus, ullam, autem totam eveniet officiis placeat sint commodi ipsam voluptate vitae?</p>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>