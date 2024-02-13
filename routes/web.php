<?php

use App\Events\NewMessageEvent;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\AsignRoleController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\App;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
    // return redirect(app()->getLocale());
});
Route::get('/index', [LocalizationController::class,'index']);
Route::get('change/lang',[LocalizationController::class,'lang_change'])->name('LangChange');


Auth::routes();
// Route::get('/', function () {
//     broadcast(new NewMessageEvent('check-socket-work'));
// });

// Route::group(['prefix'=>'{locale}'],function(){
//     Route::get('/', function () {
//         return view('welcome');
//     })->middleware('setLocale');

// });


Route::get('/event', function () {
    broadcast(new NewMessageEvent('check-socket-work'));
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/aaa', function(){
    return view('aaa');
});
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('category',CategoryController::class);
    // Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

});
// Route::prefix('{locale}')->where(['locale' => '[a-zA-Z]{2}'])->middleware('setlocale')->group(function (){
//     Route::get('/', function () {
//         return view('welcome');
//     });

// });

Route::resource('main',MainController::class);
Route::get('asign-role/{type}/{id}',[AsignRoleController::class,'asign'])->name('asign-role');

// digital signature
Route::get('/create/pdf', [PDFController::class, 'createPDF'])->name('createPDF');
Route::get('/create/certificate', [CertificateController::class, 'certificateRSA']);
// ahxatec
Route::get('/create/certificateEC', [CertificateController::class, 'certificateEC']);
Route::get('/get-file/', [CertificateController::class, 'getFile']);



