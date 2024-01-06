<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\Backend\DataaController;
use App\Http\Controllers\Backend\SpotController;
use App\Http\Controllers\Backend\CentrePointController;
use App\Http\Controllers\OnThisDayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware'=>'auth'], function (){
    Route::resource('admin', AdminController::class);
});



Route::get('/detail/{slug}', [DashboardController::class, 'detail'])->name('detail');
Route::get('/detailUser/{slug}', [DashboardController::class, 'detailUser'])->name('detailUser');
Route::get('/signin', [LoginController::class, 'index'])->name('signin');
Route::post('/signin-proses', [LoginController::class, 'signin_proses'])->name('signin-proses');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/signup', [LoginController::class, 'signup'])->name('signup');
Route::post('/signup-proses', [LoginController::class, 'signup_proses'])->name('signup-proses');
Route::get('/homeUser', [LoginController::class, 'index2'])->name('homeUser');
Route::get('/detail/{slug}', [LoginController::class, 'detail'])->name('detail');
Route::get('/detailUser/{slug}', [LoginController::class, 'detailUser'])->name('detailUser');

##User
Route::group(['middleware'=>'auth'], function (){
    Route::resource('kontribusi', UserController::class);

});
Route::get('/kategoriUser',[LoginController::class, 'kategoriUser']);
Route::get('/PetaHistoriUser',[LoginController::class,'spots']);
Route::get('/detailspot/{slug}',[LoginController::class,'detailSpot'])->name('detailspot');

Route::get('/kategori',[DashboardController::class,'kategori']);
Route::post('/upload', [AdminController::class,'upload'])->name('ckeditor.upload');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

##GIS MAP
Route::get('/PetaHistori',[HomeController::class,'spots']);
Route::get('/detail-spot/{slug}',[HomeController::class,'detailSpot'])->name('detail-spot');
Route::get('/Peta', [HomeController::class, 'gis_map']);
## Route Datatable
Route::get('/centre-point/data',[\App\Http\Controllers\Backend\DataaController::class,'centrepoint'])->name('centre-point.data');
Route::get('/spot/data',[\App\Http\Controllers\Backend\DataaController::class,'spot'])->name('spot.data');
Route::resource('centre-point',(\App\Http\Controllers\Backend\CentrePointController::class));
Route::resource('spot',(\App\Http\Controllers\Backend\SpotController::class));

##CK Editor
Route::post('ckeditor/upload', [AdminController::class, 'upload'])->name('ckeditor.upload');

 route::get('/show',[AdminController::class,'show']);

require __DIR__.'/auth.php';
