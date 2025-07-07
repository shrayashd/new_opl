<?php

use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/{slug}', [FrontendController::class, 'pagesingle'])->name('pagesingle');

Route::get('/departments/{slug}', [FrontendController::class, 'departmentsingle'])->name('departmentsingle');

Route::get('/blogs/{slug}', [FrontendController::class, 'blogsingle'])->name('blogsingle');
Route::get('/ohm-ebooks/{slug}', [FrontendController::class, 'ebooksingle'])->name('ebooksingle');
Route::get('/ohm-bytes/{slug}', [FrontendController::class, 'bytesingle'])->name('bytesingle');
Route::get('/ohm-sikauchha/{slug}', [FrontendController::class, 'sikauchhasingle'])->name('sikauchhasingle');
Route::get('/categories/{slug}', [FrontendController::class, 'categorysingle'])->name('categorysingle');

Route::get('/products/{slug}', [FrontendController::class, 'productssingle'])->name('productssingle');
Route::get('/brands/{slug}', [FrontendController::class, 'brandsingle'])->name('brandsingle');
Route::get('/product-category/{slug}', [FrontendController::class, 'productcategorysingle'])->name('productcategorysingle');
Route::get('/division/{slug}', [FrontendController::class, 'divisionsingle'])->name('divisionsingle');

Route::get('/services/{slug}', [FrontendController::class, 'servicesingle'])->name('servicesingle');

Route::post('/inquiry', [ContactsController::class, 'inquiry'])->name('inquiry');
Route::get('/search/autocomplete', [FrontendController::class, 'autocompleteSearch'])->name('autocompleteSearch');


