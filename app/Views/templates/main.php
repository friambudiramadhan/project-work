<?php

use App\Models\AccountsModel;

$user = new AccountsModel;
$name = $user->getUser($_SESSION['user'])['name'];

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CoFFEE BEANS | <?= $title; ?></title>

    <!-- favicon -->
    <link rel="icon" href="/images/icon.png">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- internal css -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&family=Scheherazade+New&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@300&display=swap" rel="stylesheet">

    <style>

    </style>
</head>

<body class="d-flex flex-column h-100 bg-secondary bg-opacity-10">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bggreen py-4">
            <div class="container-xxl">
                <a class="header fs-1 navbar-brand" href="/home">CoFFEE BEANS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="footer collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item me-5">
                            <a class="nav-link <?= ($title === 'Menu') ? 'active' : ''; ?>" aria-current="page" href="/menu">Menu</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link <?= ($title === 'PesananKu') ? 'active' : ''; ?>" aria-current="page" href="/pesananku">PesananKu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($title === 'Profil') ? 'active' : ''; ?>" aria-current="page" href="/profil"><?= $name; ?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link <?= ($title === 'Keranjang') ? 'active' : ''; ?>" aria-current="page" href="/keranjang"><i class="bi bi-cart3 fs-4"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?= $this->renderSection('main'); ?>

    <!-- footer -->
    <footer class="footer mt-auto py-3 bggreen pb-5">
        <div class="container-xxl">
            <h1 class="header text-center text-white mb-5">About Us</h1>
            <div class="d-flex justify-content-between">
                <div class="d-flex text-white">
                    <a href="" class="text-decoration-none text-white">
                        <p class="me-5">Contact Us</p>
                    </a>
                    <a href="" class="text-decoration-none text-white">
                        <p class="me-5">Creator</p>
                    </a>
                    <p class="text-muted">&copy; CoFFEE BEANS 2021</p>
                </div>
                <div>
                    <!-- instagram -->
                    <a href="" class="text-white"><i class="bi bi-instagram me-5 fs-3"></i></a>
                    <!-- youtube -->
                    <a href="" class="text-white"><i class="bi bi-youtube me-5 fs-3"></i></a>
                    <!-- facebook -->
                    <a href="" class="text-white"><i class="bi bi-facebook me-5 fs-3"></i></a>
                    <!-- twitter -->
                    <a href="" class="text-white"><i class="bi bi-twitter fs-3"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>