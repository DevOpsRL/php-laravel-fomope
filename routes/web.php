<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\CapturaController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\BuscarController;
use App\Http\Controllers\ConstanciaController;
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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

//plantilla form
Route::get('/p/list', [PlantillaController::class, 'index'])->name('p_list');
Route::post('/p/search', [PlantillaController::class, 'busqueda'])->name('p_search');
/// fomopes - captura
Route::get('/f/list', [CapturaController::class, 'index'])->name('f_index');
Route::post('/f/search', [CapturaController::class, 'busqueda'])->name('f_search');
Route::get('/f/create', [CapturaController::class,'create'])->name('f_create');
Route::post('/f/store', [CapturaController::class, 'store'])->name('f_store');
Route::get('/f/edit/{rfc}/{movimiento}/{quincena}/{anio}', [CapturaController::class, 'edit'])->name('f_edit');
Route::put('/f/update/', [CapturaController::class, 'update'])->name('f_update');
// find capturas dones.
Route::post('/c/search',[CapturaController::class, 'search_to_capturas'])->name('c_search');
// genero
Route::get('/g/list',[GeneroController::class, 'index'])->name('g_list');
Route::get('/g/create', [GeneroController::class, 'create'])->name('g_create');
Route::post('/g/store', [GeneroController::class, 'store'])->name('g_store');

//Reportes

Route::get('/r/list/{anio}/{quincena}',[ReporteController::class, 'index'])->name('r_list');
Route::get('/r/show',[ReporteController::class, 'show'])->name('r_show');
Route::get('/r/search',[ReporteController::class, 'search'])->name('r_search');

///
Route::get('/autocomplete',[BuscarController::class, 'search'])->name('autocomplete');
///
// CONSTANCIA GLOBAL
Route::get('n/constancia', [ConstanciaController::class,'index'])->name('n_list');
Route::post('n/export', [ConstanciaController::class,'export'])->name('n_export');