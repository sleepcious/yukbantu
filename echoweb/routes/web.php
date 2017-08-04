<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PublicController@index')->name('beranda');

Auth::routes();

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
Route::get('/redirect/google', 'SocialAuthController@redirectGoogle');
Route::get('/callback/google', 'SocialAuthController@callbackGoogle');

Route::get('/password/reset', 'TamuController@resetForm');
Route::post('/daftar', 'TamuController@register');
Route::get('/thankyou', 'TamuController@thanks');

Route::get('/tinymce_example', function () {
    return view('mceImageUpload::example');
});

//=======================admin start
Route::get('/pengelola', 'HomeController@index')->name('home');
//campaign
Route::get('pengelola/campaign', ['uses'=>'AdminCampaignController@index']);
Route::get('pengelola/campaign/get', ['as'=>'campaign.get','uses'=>'AdminCampaignController@data']);
Route::get('pengelola/campaign/{id}/{stat}', 'AdminCampaignController@ubahStatus');
//donasi
Route::get('pengelola/donasi', ['uses'=>'AdminDonasiController@index']);
Route::get('pengelola/donasi/get', ['as'=>'donasi.get','uses'=>'AdminDonasiController@data']);
Route::get('pengelola/donasi/needver', ['uses'=>'AdminDonasiController@indexPending']);
Route::get('pengelola/donasi/needver/get', ['as'=>'donasipending.get','uses'=>'AdminDonasiController@dataPending']);
Route::get('pengelola/donasi/{id}/{stat}', 'AdminDonasiController@ubahStatus');
//laporan
Route::get('pengelola/laporan', ['uses'=>'AdminLaporanController@index']);
Route::get('pengelola/laporan/get', ['as'=>'laporan.get','uses'=>'AdminLaporanController@data']);
Route::get('pengelola/laporan/{id}', 'AdminLaporanController@detail');
//User
Route::get('pengelola/pengguna', ['uses'=>'AdminUserController@index']);
Route::get('pengelola/pengguna/get', ['as'=>'users.get','uses'=>'AdminUserController@data']);
Route::get('pengelola/pengguna/edit/{id}', 'AdminUserController@ubah');
Route::post('pengelola/pengguna/edit/{id}', 'AdminUserController@update');
//Sakubantu
Route::get('pengelola/wallet/all', ['uses'=>'AdminSakuController@index']);
Route::get('pengelola/wallet/all/get', ['as'=>'saku.get','uses'=>'AdminSakuController@data']);
//deposit/topup
Route::get('pengelola/wallet/topup', ['uses'=>'AdminDepositController@index']);
Route::get('pengelola/wallet/topup/get', ['as'=>'deposit.get','uses'=>'AdminDepositController@data']);
Route::get('pengelola/wallet/topup/needver', ['uses'=>'AdminDepositController@indexPending']);
Route::get('pengelola/wallet/topup/needver/get', ['as'=>'depositpending.get','uses'=>'AdminDepositController@dataPending']);
Route::get('pengelola/wallet/topup/{id}/{stat}', 'AdminDepositController@ubahStatus');
//redeem
Route::get('pengelola/wallet/redeem', ['uses'=>'AdminRedeemController@index']);
Route::get('pengelola/wallet/redeem/get', ['as'=>'redeem.get','uses'=>'AdminRedeemController@data']);
Route::get('pengelola/wallet/redeem/needver', ['uses'=>'AdminRedeemController@indexPending']);
Route::get('pengelola/wallet/redeem/needver/get', ['as'=>'redeempending.get','uses'=>'AdminRedeemController@dataPending']);
Route::get('pengelola/wallet/redeem/{id}/{stat}', 'AdminRedeemController@ubahStatus');
//slideshow
Route::get('pengelola/setting/slideshow', 'AdminSettingsController@sliderIndex')->name('Slideshow');
Route::get('pengelola/setting/slideshow/add', 'AdminSettingsController@sliderAdd');
Route::post('pengelola/setting/slideshow/add', 'AdminSettingsController@sliderInsert');
Route::get('pengelola/setting/slideshow/del/{id}', 'AdminSettingsController@sliderDel');
Route::get('pengelola/setting/slideshow/edit/{id}', 'AdminSettingsController@sliderEdit');
Route::post('pengelola/setting/slideshow/edit/{id}', 'AdminSettingsController@sliderUpdate');
//email
// Route::get('pengelola/setting/email', 'AdminEmailController@index');
// Route::post('pengelola/setting/email', 'AdminEmailController@diatur');
//partner
Route::get('pengelola/partner', ['uses'=>'AdminPartnerController@index']);
Route::get('pengelola/partner/get', ['as'=>'partner.get','uses'=>'AdminPartnerController@data']);
Route::get('pengelola/partner/add', 'AdminPartnerController@baru');
Route::post('pengelola/partner/add', 'AdminPartnerController@insert');
Route::get('pengelola/partner/edit/{id}', 'AdminPartnerController@ubah');
Route::post('pengelola/partner/edit/{id}', 'AdminPartnerController@edit');
Route::get('pengelola/partner/del/{id}', 'AdminPartnerController@hapus');
//team
Route::get('pengelola/team', ['uses'=>'AdminTeamController@index']);
Route::get('pengelola/team/get', ['as'=>'team.get','uses'=>'AdminTeamController@data']);
Route::get('pengelola/team/add', 'AdminTeamController@baru');
Route::post('pengelola/team/add', 'AdminTeamController@insert');
Route::get('pengelola/team/edit/{id}', 'AdminTeamController@ubah');
Route::post('pengelola/team/edit/{id}', 'AdminTeamController@edit');
Route::get('pengelola/team/del/{id}', 'AdminTeamController@hapus');
//kategori
Route::get('pengelola/setting/kategori', ['uses'=>'AdminCategoryController@index']);
Route::get('pengelola/setting/kategori/get', ['as'=>'kategori.get','uses'=>'AdminCategoryController@data']);
Route::post('pengelola/setting/kategori/add', 'AdminCategoryController@tambah');
Route::post('pengelola/setting/kategori/edit/{id}', 'AdminCategoryController@ubah');
Route::get('pengelola/setting/kategori/del/{id}', 'AdminCategoryController@hapus');
//halaman
Route::get('pengelola/setting/halaman', ['uses'=>'AdminPageController@index']);
Route::get('pengelola/setting/halaman/get', ['as'=>'halaman.get','uses'=>'AdminPageController@data']);
Route::get('pengelola/setting/halaman/add', 'AdminPageController@baru');
Route::post('pengelola/setting/halaman/add', 'AdminPageController@tambah');
Route::get('pengelola/setting/halaman/edit/{id}', 'AdminPageController@ubah');
Route::post('pengelola/setting/halaman/edit/{id}', 'AdminPageController@edit');
Route::get('pengelola/setting/halaman/del/{id}', 'AdminPageController@hapus');
//halaman
Route::get('pengelola/setting/rekening', ['uses'=>'AdminRekController@index']);
Route::get('pengelola/setting/rekening/get', ['as'=>'rekening.get','uses'=>'AdminRekController@data']);
Route::get('pengelola/setting/rekening/add', 'AdminRekController@baru');
Route::post('pengelola/setting/rekening/add', 'AdminRekController@tambah');
Route::get('pengelola/setting/rekening/edit/{id}', 'AdminRekController@ubah');
Route::post('pengelola/setting/rekening/edit/{id}', 'AdminRekController@edit');
Route::get('pengelola/setting/rekening/del/{id}', 'AdminRekController@hapus');
//verifikasi
Route::get('pengelola/verifikasi', ['uses'=>'AdminVerifikasiController@index']);
Route::get('pengelola/verifikasi/get', ['as'=>'verifikasi.get','uses'=>'AdminVerifikasiController@data']);
Route::get('pengelola/verifikasi/needver', ['uses'=>'AdminVerifikasiController@indexPending']);
Route::get('pengelola/verifikasi/needver/get', ['as'=>'verifikasipending.get','uses'=>'AdminVerifikasiController@dataPending']);
Route::get('pengelola/verifikasi/detail/{id}', 'AdminVerifikasiController@detail');
Route::get('pengelola/verifikasi/ubah/{id}/{stat}', 'AdminVerifikasiController@ubah');
//=======================admin end

//================umum
Route::get('/jelajah', 'PublicController@campaign');
Route::get('/jelajah/{slug}', 'PublicController@campaignCat');
Route::get('/jelajah/lainnya', 'PublicController@otherCampaign');
Route::get('/our-team', 'PublicController@tim');
Route::get('/our-partner', 'PublicController@rekanan');
Route::get('/{slug}', 'PublicController@campaignDet');
