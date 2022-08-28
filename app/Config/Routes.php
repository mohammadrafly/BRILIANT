<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LandingController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LandingController::index');
$routes->get('login', 'AuthController::Login');
$routes->get('register', 'AuthController::Register');
$routes->post('login/proced', 'AuthController::LoginProced');
$routes->post('register/proced', 'AuthController::RegisterProced');
$routes->get('logout', 'AuthController::Logout');

$routes->get('dashboard', 'DashboardController::index');
$routes->get('dashboard/lengkapi-data-diri/(:any)', 'ProfileController::FillUrData/$1');
$routes->post('dashboard/lengkapi-data-diri/proced', 'ProfileController::SendData');
$routes->get('dashboard/profile/(:any)', 'ProfileController::index/$1');
$routes->post('dashboard/profile/update', 'ProfileController::update');
$routes->post('dashboard/profile/update/tutor', 'ProfileController::updateTutor');

$routes->get('dashboard/user/unverified', 'UserController::indexUnverified');
$routes->get('dashboard/user/unverified/(:any)', 'UserController::Unverified/$1');
$routes->post('dashboard/user/unverified/proced', 'UserController::Verifying');

$routes->get('dashboard/user/list', 'UserController::index');
$routes->get('dashboard/user/list/admin', 'UserController::indexAdmin');
$routes->get('dashboard/user/list/tutor', 'UserController::indexTutor');
$routes->get('dashboard/user/preview/(:any)', 'UserController::PreviewIjazah/$1');
$routes->get('dashboard/user/list/siswa', 'UserController::indexSiswa');
$routes->get('dashboard/user/add', 'UserController::add');
$routes->post('dashboard/user/save', 'UserController::save');
$routes->get('dashboard/user/edit/(:any)', 'UserController::editUser/$1');
$routes->post('dashboard/user/update', 'UserController::updateUser');
$routes->get('dashboard/user/remove/(:any)', 'UserController::removeUser/$1');

$routes->get('dashboard/faq/list', 'FaqController::index');
$routes->get('dashboard/faq/add', 'FaqController::add');
$routes->get('dashboard/faq/edit/(:num)', 'FaqController::edit/$1');
$routes->post('dashboard/faq/update', 'FaqController::update');
$routes->post('dashboard/faq/add/proced', 'FaqController::save');
$routes->get('dashboard/faq/delete/(:num)', 'FaqController::delete/$1');

$routes->get('dashboard/transaksi/list', 'TransaksiController::index');
$routes->get('dashboard/transaksi/verifying/(:any)', 'TransaksiController::Verifying/$1');
$routes->post('dashboard/transaksi/verifying/proced', 'TransaksiController::VerifyingProced');
$routes->get('dashboard/transaksi/list/bimbel/(:any)', 'TransaksiController::ListBimbel/$1');

$routes->get('dashboard/master/mapel', 'CourseController::indexMapel');
$routes->get('dashboard/master/mapel/add', 'CourseController::addMapel');
$routes->post('dashboard/master/mapel/add/proced', 'CourseController::saveMapel');
$routes->get('dashboard/master/mapel/edit/(:num)', 'CourseController::editMapel/$1');
$routes->post('dashboard/master/mapel/update', 'CourseController::updateMapel');
$routes->get('dashboard/master/mapel/delete/(:num)', 'CourseController::deleteMapel/$1');

$routes->get('dashboard/master/tutor-examp/list', 'ExampController::index');
$routes->get('dashboard/master/tutor-examp/add', 'ExampController::add');
$routes->post('dashboard/master/tutor-examp/save', 'ExampController::save');
$routes->get('dashboard/master/tutor-examp/edit/(:num)', 'ExampController::edit/$1');
$routes->post('dashboard/master/tutor-examp/update', 'ExampController::update');
$routes->get('dashboard/master/tutor-examp/delete/(:num)', 'ExampController::delete/$1');

$routes->get('dashboard/siswa/profile/(:any)', 'SiswaController::profile/$1');
$routes->post('dashboard/siswa/profile/save', 'SiswaController::saveProfile');
$routes->get('dashboard/siswa/bimbel', 'SiswaController::bimbel');
$routes->get('dashboard/siswa/bimbel/(:any)', 'SiswaController::beliBimbel/$1');
$routes->post('dashboard/siswa/bimble/transaksi/(:any)', 'SiswaController::prosesBeliBimbel/$1');
$routes->get('dashboard/siswa/tagihan/(:any)', 'SiswaController::listKeranjangSaya/$1');
$routes->post('dashboard/siswa/tagihan/proses', 'SiswaController::prosesSatuBimbel');
$routes->post('dashboard/bimbel/transaksi/(:any)', 'SiswaController::prosesBeliBimbel/$1');
$routes->get('dashboard/siswa/jadwal/saya/(:any)', 'SiswaController::jadwalSaya/$1');
$routes->get('dashboard/siswa/jadwal/saya', 'SiswaController::jadwalSayaNull');
$routes->post('dashboard/tagihan/bayar/(:num)', 'SiswaController::bayarTagihan/$1');

$routes->get('dashboard/tutor/examp/(:any)', 'ExampController::TutorExamps/$1');
$routes->get('dashboard/tutor/(:any)', 'ExampController::TutorExampsJoin/$1');
$routes->post('dashboard/tutor/examp/on-progres/(:num)/(:num)', 'ExampController::ExampsOnProgres/$1/$2');
$routes->post('dashboard/tutor/examp/sumbit', 'ExampController::SubmitExamp');
$routes->get('dashboard/tutor/examp/result/(:num)', 'ExampController::ResultExamp');

$routes->get('dashboard/list/jadwal/(:any)', 'JadwalController::index/$1');
$routes->get('dashboard/jadwal/add/(:any)', 'JadwalController::addJadwal/$1');
$routes->post('dashboard/jadwal/add/proced', 'JadwalController::save');
$routes->get('dashboard/jadwal/edit/(:num)', 'JadwalController::edit/$1');
$routes->post('dashboard/jadwal/update', 'JadwalController::update');
$routes->get('dashboard/jadwal/delete/(:num)', 'JadwalController::delete/$1');

$routes->get('dashboard/jadwal/list/siswa/(:any)', 'JadwalController::listSiswa/$1');
$routes->get('dashboard/jadwal/list/tambah/(:any)', 'JadwalController::tambahSiswa/$1');
$routes->post('dashboard/jadwal/list/add/proced/(:any)', 'JadwalController::tambahSiswaProced/$1');
$routes->get('dashboard/jadwal/list/remove/(:num)/(:any)/(:any)', 'JadwalController::removeSiswa/$1/$2/$3');

$routes->get('dashboard/master/soal', 'SoalController::index');
$routes->get('dashboard/master/soal/mapel/(:num)', 'SoalController::indexMapel/$1');
$routes->get('dashboard/master/soal/mapel/add/(:num)', 'SoalController::add/$1');
$routes->post('dashboard/master/soal/mapel/add/proced', 'SoalController::save');
$routes->get('dashboard/master/soal/mapel/edit/(:num)/(:num)', 'SoalController::edit/$1/$2');
$routes->post('dashboard/master/soal/mapel/update/(:num)', 'SoalController::update/$1');
$routes->get('dashboard/master/soal/mapel/delete/(:num)/(:num)', 'SoalController::delete/$1/$2');

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
