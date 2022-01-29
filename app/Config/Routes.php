<?php

namespace Config;


// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// -------------Halaman Auth---------------
$routes->get('/', 'Halaman::index');
// buat akun  user
$routes->get('/buatAkun', 'UserBuatAkun::index');
// lupa password
$routes->get('/lupaPassword', 'LupaPassword::index');

// -------------Halaman User---------------
// home
$routes->get('/home', 'UserHome::index');

// menu user
$routes->get('/menu', 'UserMenu::index');
$routes->post('/menu/tambah', 'UserMenu::tambah');

// pesananku user
$routes->get('/pesananku', 'UserPesananKu::index');
// mecari pesanan
$routes->post('/pesananku', 'UserPesananKu::index');

$routes->get('/order/pembayaran/(:num)', 'UserPesananku::uploadBuktiPembayaran/$1');
$routes->post('/order/uploadPembayaran/(:num)', 'UserPesananku::upload/$1');
$routes->get('/order/buktiPembayaran/(:num)', 'UserPesananku::buktiPembayaran/$1');
$routes->get('/order/selesai/(:num)', 'UserPesananku::selesai/$1');
$routes->get('/order/pesanDariAdmin/(:num)', 'UserPesananku::pesanDariAdmin/$1');

// profil user
$routes->get('/profil', 'UserProfile::index');
$routes->get('/profil/edit', 'UserProfile::edit');
$routes->post('/profil/edit/editProfil', 'UserProfile::editProfil');

// keranjang user
$routes->get('/keranjang', 'Keranjang::index');
$routes->get('/keranjang/hapus/(:num)', 'Keranjang::hapus/$1');
$routes->post('/keranjang/update/(:num)/(:num)', 'Keranjang::update/$1/$2');

// checkout user
$routes->get('/keranjang/checkout/(:num)', 'UserCheckout::index/$1');
$routes->post('/checkout/(:segment)', 'Usercheckout::checkout/$1');

// -------------Halaman Admin--------------
// home
$routes->get('/Admin/home', 'AdminHome::home');

// data user
$routes->get('/Admin/dataUser', 'AdminDataUser::index');
$routes->post('/Admin/dataUser', 'AdminDataUser::index');
$routes->get('/AdminDataUser/hapusUser/(:num)', 'AdminDataUser::hapusUser/$1');
$routes->get('/AdminDataUser/editUser/(:num)', 'AdminDataUser::halamanEditUser/$1');
$routes->post('/AdminDataUser/update/(:num)', 'AdminDataUser::editUser/$1');

// approval
$routes->get('/Admin/approval', 'AdminApproval::index');
$routes->post('/Admin/approval', 'AdminApproval::index');
$routes->get('/admin/order/buktiPembayaran/(:num)', 'AdminApproval::buktiPembayaran/$1');
$routes->get('/approval/terima/(:num)', 'AdminApproval::halamanApprove/$1');
$routes->get('/approval/tolak/(:num)', 'AdminApproval::halamanTolak/$1');
$routes->post('/approve/(:num)', 'AdminApproval::approve/$1');
$routes->post('/tolak/(:num)', 'AdminApproval::tolak/$1');

// daftar menu
$routes->get('/Admin/daftarMenu', 'AdminMenu::index');
$routes->get('/Admin/daftarMenu/edit/(:num)', 'AdminMenu::editMenu/$1');
$routes->get('/Admin/daftarMenu/hapus/(:num)', 'AdminMenu::hapusMenu/$1');
// upload menu
$routes->get('/Admin/daftarMenu/tambah-menu', 'AdminTambahMenu::index');
$routes->post('/Admin/uploadMenu', 'AdminTambahMenu::tambahMenu');
// edit menu
$routes->post('/Admin/editMenu/(:num)', 'AdminMenu::postEditMenu/$1');

// riwayat pesanan
$routes->get('/Admin/riwayatPesanan', 'AdminRiwayatPesanan::index');
$routes->post('/Admin/riwayatPesanan', 'AdminRiwayatPesanan::index');

// buat akun admin
$routes->get('/Admin/buatAkunAdmin', 'AdminBuatAkunAdmin::index');
$routes->post('/Admin/buatAkunAdmin/buat', 'AdminBuatAkunAdmin::buatAkunAdmin');

// profil admin
$routes->get('/Admin/profil', 'AdminProfil::index');
$routes->get('/Admin/profil/(:num)', 'AdminEditProfil::index');
$routes->post('/AdminEditProfil/editAdmin/(:num)', 'AdminEditProfil::editAdmin/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
