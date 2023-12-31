<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index', ['filter' => 'role:administrator, user']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'role:administrator, user']);

// Data Merk
$routes->get('/data-merk', 'DataMerk::index', ['filter' => 'auth']);
$routes->get('/data-merk/edit/(:num)', 'DataMerk::edit/$1', ['filter' => 'auth']);
$routes->post('/data-merk/save', 'DataMerk::save', ['filter' => 'auth']);
$routes->post('/data-merk/update', 'DataMerk::update', ['filter' => 'auth']);
$routes->post('/data-merk/update/(:num)', 'DataMerk::update/$1', ['filter' => 'auth']);
$routes->delete('/data-merk/(:num)', 'DataMerk::delete/$1', ['filter' => 'auth']);

// Data Mobil
$routes->get('/data-mobil', 'DataMobil::index', ['filter' => 'auth']);
$routes->get('/data-katalog', 'DataMobil::katalog', ['filter' => 'auth']);
$routes->post('/data-mobil/save', 'DataMobil::save', ['filter' => 'auth']);
$routes->delete('/data-mobil/(:num)', 'DataMobil::delete/$1', ['filter' => 'auth']);
$routes->get('/data-mobil/edit/(:num)', 'DataMobil::edit/$1', ['filter' => 'auth']);
$routes->post('/data-mobil/update/(:num)', 'DataMobil::update/$1', ['filter' => 'auth']);
$routes->get('/data-mobil/detail/(:num)', 'DataMobil::detail/$1', ['filter' => 'auth']);

// Data Pemesan 
$routes->get('/data-pemesan', 'DataPemesan::index', ['filter' => 'auth']);
$routes->post('/data-pemesan/save', 'DataPemesan::save', ['filter' => 'auth']);
$routes->delete('/data-pemesan/(:num)', 'DataPemesan::delete/$1', ['filter' => 'auth']);
$routes->get('/data-pemesan/edit/(:num)', 'DataPemesan::edit/$1', ['filter' => 'auth']);
$routes->post('/data-pemesan/update/(:num)', 'DataPemesan::update/$1', ['filter' => 'auth']);
$routes->get('/data-pemesan/setting/(:num)', 'DataPemesan::setting/$1', ['filter' => 'auth']);
$routes->post('/data-pemesan/upset/(:num)', 'DataPemesan::upset/$1', ['filter' => 'auth']);
$routes->get('/data-pemesan/detail/(:num)', 'DataPemesan::detail/$1', ['filter' => 'auth']);
$routes->post('/data-pemesan/activate', 'DataPemesan::activate', ['filter' => 'auth']);
$routes->post('/data-pemesan/changeGroup', 'DataPemesan::changeGroup', ['filter' => 'auth']);

// Jenis Bayar 
$routes->get('/data-bayar', 'DataBayar::index', ['filter' => 'auth']);
$routes->post('/data-bayar/save', 'DataBayar::save', ['filter' => 'auth']);
$routes->delete('/data-bayar/(:num)', 'DataBayar::delete/$1', ['filter' => 'auth']);
$routes->get('/data-bayar/edit/(:num)', 'DataBayar::edit/$1', ['filter' => 'auth']);
$routes->post('/data-bayar/update/(:num)', 'DataBayar::update/$1', ['filter' => 'auth']);
$routes->get('/data-bayar/detail/(:num)', 'DataBayar::detail/$1', ['filter' => 'auth']);

// Pengeluaran 
$routes->get('/data-pengeluaran', 'DataPengeluaran::index', ['filter' => 'auth']);
$routes->post('/data-pengeluaran/save', 'DataPengeluaran::save', ['filter' => 'auth']);
$routes->delete('/data-pengeluaran/(:num)', 'DataPengeluaran::delete/$1', ['filter' => 'auth']);
$routes->get('/data-pengeluaran/edit/(:num)', 'DataPengeluaran::edit/$1', ['filter' => 'auth']);
$routes->post('/data-pengeluaran/update/(:num)', 'DataPengeluaran::update/$1', ['filter' => 'auth']);
$routes->get('/data-pengeluaran/detail/(:num)', 'DataPengeluaran::detail/$1', ['filter' => 'auth']);
$routes->get('/laporan-pengeluaran', 'DataPengeluaran::laporan', ['filter' => 'auth']);
$routes->add('/laporan-pengeluaran/bulan', 'DataPengeluaran::laporanBulan', ['filter' => 'auth']);
$routes->add('/laporan-pengeluaran/tahun', 'DataPengeluaran::laporanTahun', ['filter' => 'auth']);

// Data Perjalanan 
$routes->get('/data-perjalanan', 'DataPerjalanan::index', ['filter' => 'auth']);
$routes->post('/data-perjalanan/save', 'DataPerjalanan::save', ['filter' => 'auth']);
$routes->delete('/data-perjalanan/(:num)', 'DataPerjalanan::delete/$1', ['filter' => 'auth']);
$routes->get('/data-perjalanan/edit/(:num)', 'DataPerjalanan::edit/$1', ['filter' => 'auth']);
$routes->post('/data-perjalanan/update/(:num)', 'DataPerjalanan::update/$1', ['filter' => 'auth']);
$routes->get('/data-perjalanan/detail/(:num)', 'DataPerjalanan::detail/$1', ['filter' => 'auth']);

// Data Pesanan 
$routes->get('/data-pesanan', 'DataPesanan::index', ['filter' => 'auth']);
$routes->post('/data-pesanan/save', 'DataPesanan::save', ['filter' => 'auth']);
$routes->delete('/data-pesanan/(:num)', 'DataPesanan::delete/$1', ['filter' => 'auth']);
$routes->get('/data-pesanan/edit/(:num)', 'DataPesanan::edit/$1', ['filter' => 'auth']);
$routes->post('/data-pesanan/update/(:num)', 'DataPesanan::update/$1', ['filter' => 'auth']);
$routes->get('/data-pesanan/detail/(:num)', 'DataPesanan::detail/$1', ['filter' => 'auth']);
$routes->get('/data-pesanan/print/(:num)', 'DataPesanan::print/$1', ['filter' => 'auth']);
$routes->get('/laporan-pesanan', 'DataPesanan::laporan', ['filter' => 'auth']);
$routes->post('/laporan-pesanan', 'DataPesanan::laporanPrint', ['filter' => 'auth']);
$routes->post('/laporan-print', 'DataPesanan::laporanPrint', ['filter' => 'auth']);
$routes->get('/laporan-print', 'DataPesanan::laporanPrint', ['filter' => 'auth']);
$routes->add('/laporan-tahun', 'DataPesanan::laporanTahun', ['filter' => 'auth']);
$routes->add('/laporan-unit/tahun', 'DataPesanan::laporanUnitTahun', ['filter' => 'auth']);
$routes->add('/laporan-unit/bulan', 'DataPesanan::laporanUnitBulan', ['filter' => 'auth']);
$routes->get('/laporan-unit', 'DataPesanan::laporanUnit', ['filter' => 'auth']);
$routes->post('getBayar', 'DataPesanan::getBayar', ['filter' => 'auth']);


//Keuntungan
$routes->add('/laporan-keuntungan/tahun', 'DataPesanan::laporanKeuntunganTahun', ['filter' => 'auth']);
$routes->add('/laporan-keuntungan/bulan', 'DataPesanan::laporanKeuntunganBulan', ['filter' => 'auth']);
$routes->get('/laporan-keuntungan', 'DataPesanan::laporanKeuntungan', ['filter' => 'auth']);

// Data Akun 
$routes->get('/data-akun', 'DataAkun::index', ['filter' => 'auth']);
$routes->post('/data-akun/save', 'DataAkun::save', ['filter' => 'auth']);
$routes->delete('/data-akun/(:num)', 'DataAkun::delete/$1', ['filter' => 'auth']);
$routes->get('/data-akun/edit/(:num)', 'DataAkun::edit/$1', ['filter' => 'auth']);
$routes->post('/data-akun/update/(:num)', 'DataAkun::update/$1', ['filter' => 'auth']);
$routes->get('/data-akun/detail/(:num)', 'DataAkun::detail/$1', ['filter' => 'auth']);
$routes->post('/data-akun/activate', 'DataAkun::activate', ['filter' => 'auth']);
$routes->post('/data-akun/changeGroup', 'DataAkun::changeGroup', ['filter' => 'auth']);

// $routes->get('/', 'Login::index');
// $routes->get('/logout', 'Login::logout');
// $routes->get('/register', 'Register::index');
// $routes->post('/register/save', 'Register::save');
// $routes->post('/login/auth', 'Login::auth');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
