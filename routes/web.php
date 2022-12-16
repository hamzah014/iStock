<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScreenerController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FavoriteCompanyController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/test', function () {
    return view('testpage');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');

Auth::routes();

Route::group(['middleware' => 'auth', 'role:trader','role:admin'], function() {
    
    Route::get('/home', [HomeController::class, 'dashboard'])->name('dashboard');

    //trader
    Route::get('/profile', [HomeController::class, 'profile'])->name('trader.profile');
    Route::post('/profile/{id}/update', [HomeController::class, 'updateprofile'])->name('profile.update');
    Route::post('/profile/{id}/reset/password', [HomeController::class, 'resetPassword'])->name('trader.password.reset');

    //screener
    Route::get('/list/screener', [ScreenerController::class, 'list'])->name('screener.list');
    
    //sector
    Route::get('/list/sector', [SectorController::class, 'list'])->name('sector.list');

    //company
    Route::get('/company/register', [CompanyController::class, 'create'])->name('company.register');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::post('/company/storeMultiple', [CompanyController::class, 'storeMultiple'])->name('company.storeMultiple');
    Route::delete('/company/{id}/delete', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::get('/company/list', [CompanyController::class, 'index'])->name('company.list');
    Route::get('/company/{id}/details/', [CompanyController::class, 'details'])->name('company.details');
    Route::get('/company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/company/{id}/update', [CompanyController::class, 'update'])->name('company.update');
    Route::get('/sector/{sector}/list', [CompanyController::class, 'listbySector'])->name('sector.company.list');
    Route::get('/company/compare', [CompanyController::class, 'viewCompare'])->name('company.compare');
    Route::get('/company/compare/predict', [CompanyController::class, 'viewComparePredict'])->name('company.comparePredict');

    //favorite company
    Route::get('/favorite/{id}/store', [FavoriteCompanyController::class, 'saveFavorite'])->name('favorite.store');


});
