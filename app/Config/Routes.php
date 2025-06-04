<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin', 'CtrlAdmin::index');
$routes->get('/petinggi2', 'CtrlAdmin::petinggi');

$routes->get('/berita2', 'CtrlBerita::index');
$routes->get('/berita/search', 'CtrlBerita::search');
$routes->get('/databerita', 'CtrlBerita::databerita');
$routes->get('/tambahberita', 'CtrlBerita::tambah_berita');
$routes->post('ctrlberita/simpan', 'CtrlBerita::simpan');
$routes->get('/ctrlberita/edit/(:num)', 'CtrlBerita::edit/$1');
$routes->post('/ctrlberita/update/(:num)', 'CtrlBerita::update/$1');
$routes->get('/ctrlberita/delete/(:num)', 'CtrlBerita::delete/$1');


$routes->get('/berita_foto', 'CtrlBeritaFoto::index');
$routes->get('/databerita2', 'CtrlBeritaFoto::databerita2');
$routes->get('/tambahberita_foto', 'CtrlBeritaFoto::tambah');
$routes->post('ctrlberitafoto/simpan', 'CtrlBeritaFoto::simpan');
$routes->get('/ctrlberitafoto/edit/(:num)', 'CtrlBeritaFoto::edit/$1');
$routes->post('/ctrlberitafoto/update/(:num)', 'CtrlBeritaFoto::update/$1');
$routes->get('/ctrlberitafoto/delete/(:num)', 'CtrlBeritaFoto::delete/$1');

$routes->get('/lifestyle', 'CtrlLifestyle::index');
$routes->get('/lifestyle2', 'CtrlLifestyle::lifestyle2');
$routes->get('/lifestyle2/(:num)', 'CtrlLifestyle::detail/$1');
$routes->get('/lifestyle/kategori/(:segment)', 'CtrlLifestyle::kategori/$1');
$routes->get('/detaillf/(:num)', 'CtrlLifestyle::detail/$1');
$routes->get('/datalifestyle', 'CtrlLifestyle::datalifestyle');
$routes->get('/tambahlifestyle', 'CtrlLifestyle::tambah');
$routes->post('ctrllifestyle/simpan', 'CtrlLifestyle::simpan');
$routes->get('/ctrllifestyle/edit/(:num)', 'CtrlLifestyle::edit/$1');
$routes->post('/ctrllifestyle/update/(:num)', 'CtrlLifestyle::update/$1');
$routes->get('/ctrllifestyle/delete/(:num)', 'CtrlLifestyle::delete/$1');


$routes->get('/infografis', 'CtrlInfografis::index');
$routes->get('/datainfografis', 'CtrlInfografis::datainfografis');
$routes->get('/tambahinfografis', 'CtrlInfografis::tambah');
$routes->post('ctrlinfografis/simpan', 'CtrlInfografis::simpan');
$routes->get('/ctrlinfografis/edit/(:num)', 'CtrlInfografis::edit/$1');
$routes->post('/ctrlinfografis/update/(:num)', 'CtrlInfografis::update/$1');
$routes->get('/ctrlinfografis/delete/(:num)', 'CtrlInfografis::delete/$1');

$routes->get('/statement', 'CtrlStatement::index');
$routes->get('/datast', 'CtrlStatement::datast');
$routes->get('/tambahst', 'CtrlStatement::tambah');
$routes->post('ctrlstatement/simpan', 'CtrlStatement::simpan');
$routes->get('/ctrlstatement/edit/(:num)', 'CtrlStatement::edit/$1');
$routes->post('/ctrlstatement/update/(:num)', 'CtrlStatement::update/$1');
$routes->get('/ctrlstatement/delete/(:num)', 'CtrlStatement::delete/$1');

$routes->get('/iklan', 'CtrlIklan::index');
$routes->get('/dataiklan', 'CtrlIklan::dataiklan');
$routes->get('/tambahiklan', 'CtrlIklan::tambah');
$routes->post('ctrliklan/simpan', 'CtrlIklan::simpan');
$routes->get('/ctrliklan/edit/(:num)', 'CtrlIklan::edit/$1');
$routes->post('/ctrliklan/update/(:num)', 'CtrlIklan::update/$1');
$routes->get('/ctrliklan/delete/(:num)', 'CtrlIklan::delete/$1');

$routes->get('/jadwal', 'CtrlJadwal::index');
$routes->get('/tambahjadwal', 'CtrlJadwal::tambah');
$routes->get('/datajadwal', 'CtrlJadwal::datajadwal');
$routes->post('ctrljadwal/simpan', 'CtrlJadwal::simpan');
$routes->get('/ctrljadwal/edit/(:num)', 'CtrlJadwal::edit/$1');
$routes->post('/ctrljadwal/update/(:num)', 'CtrlJadwal::update/$1');
$routes->get('/ctrljadwal/delete/(:num)', 'CtrlJadwal::delete/$1');

$routes->get('/historia2', 'CtrlHistoria::index');
$routes->get('/datahistoria', 'CtrlHistoria::datahistoria');
$routes->get('/tambahhistoria', 'CtrlHistoria::tambah');
$routes->post('ctrlhistoria/simpan', 'CtrlHistoria::simpan');
$routes->get('/ctrlhistoria/edit/(:num)', 'CtrlHistoria::edit/$1');
$routes->post('/ctrlhistoria/update/(:num)', 'CtrlHistoria::update/$1');
$routes->get('/ctrlhistoria/delete/(:num)', 'CtrlHistoria::delete/$1');

$routes->get('/program2', 'CtrlProgram::index');
$routes->get('/dataprogram', 'CtrlProgram::dataprogram');
$routes->get('/tambahprogram', 'CtrlProgram::tambah');
$routes->post('ctrlprogram/simpan', 'CtrlProgram::simpan');
$routes->get('/ctrlProgram/edit/(:num)', 'CtrlProgram::edit/$1');
$routes->post('/ctrlprogram/update/(:num)', 'CtrlProgram::update/$1');
$routes->get('/ctrlprogram/delete/(:num)', 'CtrlProgram::delete/$1');

$routes->get('/profil2', 'CtrlProfil::index');
$routes->get('/dataprofil', 'CtrlProfil::dataprofil');
$routes->get('/tambahprofil', 'CtrlProfil::tambah');
$routes->post('ctrlprofil/simpan', 'CtrlProfil::simpan');
$routes->get('/ctrlprofil/edit/(:num)', 'CtrlProfil::edit/$1');
$routes->post('/ctrlprofil/update/(:num)', 'CtrlProfil::update/$1');
$routes->get('/ctrlprofil/delete/(:num)', 'CtrlProfil::delete/$1');

$routes->get('/ilm', 'CtrlIlm::index');
$routes->get('/tambahilm', 'CtrlIlm::tambah');
$routes->post('/ctrlilm/simpan', 'CtrlIlm::simpan');

$routes->get('/petinggi', 'CtrlPetinggi::index');

$routes->get('/login', 'CtrlLogin::index');
$routes->post('/login/action', 'CtrlLogin::LoginAction');
$routes->get('/login/logout', 'CtrlLogin::logout');
$routes->get('/hash', 'CtrlLogin::hash');

$routes->get('/halamanindex', 'CtrlHalamanDepan::index');
$routes->get('/berita', 'CtrlHalamanDepan::berita');
$routes->get('/program', 'CtrlHalamanDepan::program');
$routes->get('/historia', 'CtrlHalamanDepan::historia');
$routes->get('/profil', 'CtrlHalamanDepan::profil');
$routes->get('/ilm2', 'CtrlHalamanDepan::ilm');
$routes->get('/detail/(:num)', 'CtrlHalamanDepan::detail/$1');
$routes->get('/detail_his/(:num)', 'CtrlHalamanDepan::detail_his/$1');
$routes->get('/detail_l/(:num)', 'CtrlHalamanDepan::detail_l/$1');
$routes->get('/berita_pkl', 'CtrlHalamanDepan::berita_pkl');
$routes->get('/berita_jateng', 'CtrlHalamanDepan::berita_jateng');
$routes->get('/berita_internasional', 'CtrlHalamanDepan::berita_internasional');
$routes->get('/berita_nasional', 'CtrlHalamanDepan::berita_nasional');
$routes->get('/berita_olahraga', 'CtrlHalamanDepan::berita_olahraga');
$routes->get('/wisata', 'CtrlHalamanDepan::wisata');
$routes->get('/hiburan', 'CtrlHalamanDepan::hiburan');
$routes->get('/kesehatan', 'CtrlHalamanDepan::kesehatan');
$routes->get('/tips', 'CtrlHalamanDepan::tips');