<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\WhatsappController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PerhitunganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//notif whatsapp
Route::resource('wa', WhatsappController::class);


// Route AuthController
Route::get('/login', [AuthController::class, 'login']);
Route::get('/registrasi', [AuthController::class, 'register']);
Route::post('masuk', [AuthController::class, 'authLogin']);
Route::post('register', [AuthController::class, 'authRegister']);
Route::get('keluar', [AuthController::class, 'logout']);
Route::get('/lupa-password', [AuthController::class, 'forgetPassword']);
Route::post('lupa-password', [AuthController::class, 'postForgetPassword']);
Route::get('/reset/{token}', [AuthController::class, 'resetPassword']);
Route::post('reset/{token}', [AuthController::class, 'postReset']);



Route::post('/upload-payment', [PembayaranController::class, 'updateProofPayment'])->name('upload-payment');
Route::get('/paid-payment/{id_pembayaran}', [PembayaranController::class, 'verifikasiPayment']);
Route::get('/unpaid-payment/{id_pembayaran}', [PembayaranController::class, 'notPayment']);
Route::get('/invalid-payment/{id_pembayaran}', [PembayaranController::class, 'invalidPayment']);


// Route Page PPDB
Route::get('/', function () {
    return view('welcome',[
        'title' => 'home'
    ]);
});

Route::get('/home', function () {
    return view('welcome',[
        'title' => 'home'
    ]);
});

Route::get('/jadwal-pendaftaran', function () {
    return view('pendaftaran.jadwalPendaftaran',[
        'title' => 'jadwal'
    ]);
});
Route::get('/alur-pendaftaran', function () {
    return view('pendaftaran.alurPendaftaran',[
        'title' => 'alur'
    ]);
});




// Route Middleware
Route::group(['middleware' => 'admin'], function () {

    // Route Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    // Route List Admin
    Route::get('admin/admin/list-admin', [AdminController::class, 'list']);

    // Route List Siswa
    Route::get('admin/siswa/list-siswa', [SiswaController::class, 'list']);

    // Route List Kriteria
    Route::get('admin/kriteria/list-kriteria', [KriteriaController::class, 'list']);

    // Route List Alternatif
    Route::get('admin/alternatif/list-alternatif', [AlternatifController::class, 'list']);

    // Route List Penilaian
    Route::get('admin/penilaian/list-penilaian', [PenilaianController::class, 'list']);

    // Route List Perhitungan
    Route::get('admin/perhitungan/list-perhitungan', [PerhitunganController::class, 'list']);

    // Route List Pendaftaran
    Route::get('/admin/data-pendaftaran', [FormController::class, 'list']);

    // Route List Pembayaran
    Route::get('/admin/data-pembayaran', [PembayaranController::class, 'list'])->name('data-pembayaran');

    // Route Akun Admin
    Route::get('admin/admin/tambah-admin', [AdminController::class, 'addAdmin']);
    Route::post('admin/admin/insertAdmin', [AdminController::class, 'insertAdmin']);
    Route::get('admin/admin/edit-admin/{id}', [AdminController::class, 'editAdmin']);
    Route::post('admin/admin/edit-admin/{id}', [AdminController::class, 'updateAdmin']);
    Route::get('admin/admin/delete-admin/{id}', [AdminController::class, 'deleteAdmin']);

    // Route Pendaftaran 
    // Route::get('admin/form-registration', [PendaftaranController::class, 'inputpendaftaran']);
    // Route::post('/save-registration', [PendaftaranController::class, 'simpanpendaftaran']);
    Route::get('admin/edit-pendaftaran/{id_pendaftaran}', [FormController::class, 'editRegistration']);
    Route::post('admin/update-pendaftaran/{id_pendaftaran}', [FormController::class, 'updateRegistration']);
    Route::get('admin/hapus-pendaftaran/{id_pendaftaran}', [FormController::class, 'deleteRegistration']);
    Route::get('admin/detail-pendaftaran/{id_pendaftaran}', [FormController::class, 'detailRegistration']);
    Route::get('admin/kartu-pendaftaran/{id_pendaftaran}', [FormController::class, 'cardRegistration']);

    Route::get('admin/data-pendaftaran/verified-registration/{id_pendaftaran}', [FormController::class, 'verifikasiStatusRegistration']);
    Route::get('admin/data-pendaftaran/notverified-registration/{id_pendaftaran}', [FormController::class, 'notVerifikasiStatusRegistration']);
    Route::get('admin/data-pendaftaran/invalid-registration/{id_pendaftaran}', [FormController::class, 'invalidStatusRegistration']);
    Route::get('admin/data-pendaftaran/finish-registration/{id_pendaftaran}', [FormController::class, 'finishStatusRegistration']);

    // Route Pembayaran
    Route::post('/save-payment', [PembayaranController::class, 'simpanpembayaran']);
    Route::post('/update-payment/{id_pembayaran}', [PembayaranController::class, 'updatepembayaran']);
    Route::get('/delete-payment/{id_pembayaran}', [PembayaranController::class, 'hapuspembayaran']);

    // Route::post('/upload-payment', [PembayaranController::class, 'updateProofPayment'])->name('upload-payment');
    Route::get('/admin/data-pembayaran/paid-payment/{id_pembayaran}', [PembayaranController::class, 'verifikasiPayment']);
    Route::get('/admin/data-pembayaran/unpaid-payment/{id_pembayaran}', [PembayaranController::class, 'notPayment']);
    Route::get('/admin/data-pembayaran/invalid-payment/{id_pembayaran}', [PembayaranController::class, 'invalidPayment']);

    // Route Kriteria
    // Route::get('admin/kriteria/tambah-kriteria', [KriteriaController::class, 'addKriteria']);
    Route::post('admin/kriteria/insertKriteria', [KriteriaController::class, 'insertKriteria']);
    Route::get('admin/kriteria/edit-kriteria/{id}', [KriteriaController::class, 'editKriteria']);
    Route::post('admin/kriteria/edit-kriteria/{id}', [KriteriaController::class, 'updateKriteria']);
    Route::get('admin/kriteria/delete-kriteria/{id}', [KriteriaController::class, 'deleteKriteria']);

    // Route Crips
    Route::get('admin/kriteria/show-crips/{id}', [KriteriaController::class, 'showCrips']);
    Route::post('admin/kriteria/insertCrips', [CripsController::class, 'insertCrips'])->name('insertCrips');
    Route::get('admin/kriteria/edit-crips/{id}', [CripsController::class, 'editCrips']);;
    Route::post('admin/kriteria/edit-crips/{id}', [CripsController::class, 'updateCrips']);;
    Route::get('admin/kriteria/delete-crips/{id}', [CripsController::class, 'deleteCrips']);;


    // Route Alternatif
    // Route::get('admin/alternatif/tambah-alternatif', [AlternatifController::class, 'addAlternatif']);
    Route::post('admin/alternatif/insertAlternatif', [AlternatifController::class, 'insertAlternatif']);
    Route::get('admin/alternatif/edit-alternatif/{id}', [AlternatifController::class, 'editAlternatif']);
    Route::post('admin/alternatif/edit-alternatif/{id}', [AlternatifController::class, 'updateAlternatif']);
    Route::get('admin/alternatif/delete-alternatif/{id}', [AlternatifController::class, 'deleteAlternatif']);

    // Route Penilaian
    // Route::get('admin/penilaian/tambah-kriteria', [PenilaianController::class, 'addPenilaian']);
    Route::post('admin/penilaian/insertPenilaian', [PenilaianController::class, 'insertPenilaian'])->name('insertPenilaian');
    // Route::get('admin/penilaian/edit-penilaian/{id}', [PenilaianController::class, 'editPenilaian']);
    // Route::post('admin/penilaian/edit-penilaian/{id}', [PenilaianController::class, 'updatePenilaian']);
    // Route::get('admin/penilaian/delete-penilaian/{id}', [PenilaianController::class, 'deletePenilaian']);

    // Route Perhitungan


    // Route Pengumuman

});

Route::group(['middleware' => 'student'], function () {

    // Route Profile
    Route::get('/siswa/profile', [ProfileController::class, 'getProfile'])->name("profile");

    // Route Update Profile
    Route::post('/update-user/{user_id}', [UserController::class, 'updateUser'])->name('update-user');

    // Route Pendaftaran
    Route::get('/siswa/data-pendaftaran', [FormController::class, 'list']);

    // Route Formulir
    Route::get('siswa/formulir-pendaftaran', [FormController::class, 'getForm'])->name('form-registration');
    Route::post('/save-registration', [FormController::class, 'insertRegistration'])->name('save-registration');
    Route::get('siswa/edit-pendaftaran/{id_pendaftaran}', [FormController::class, 'editRegistration']);
    Route::post('siswa/edit-pendaftaran/{id_pendaftaran}', [FormController::class, 'updateRegistration']);
    Route::get('siswa/delete-pendaftaran/{id_pendaftaran}', [FormController::class, 'deleteRegistration']);
    Route::get('siswa/detail-pendaftaran/{id_pendaftaran}', [FormController::class, 'detailRegistration']);
    Route::get('siswa/kartu-pendaftaran/{id_pendaftaran}', [FormController::class, 'cardRegistration']);















    // Route

    // Route::post('/edit-pw', [ProfileController::class, 'editakun']);

    // Route User
    // Route::get('/siswa/data-user', [UserController::class, 'datauser'])->name('data-user');
    // Route::post('/siswa/save-user', [UserController::class, 'simpanuser']);
    // Route::get('/siswa/profile/edit-user/{user_id}', [UserController::class, 'edituser'])->name('edit-user');
    // Route::post('/siswa/profile/edit-user/{user_id}', [UserController::class, 'updateUser'])->name('update-user');
    // Route::get('/delete-user/{user_id}', [UserController::class, 'hapususer'])->name('delete-user');

});
