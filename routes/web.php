<?php

use App\Http\Controllers\WeekController;
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

/**
 * Minggu 2
 * - Dasar Routing
 * - Route Parameter
 * - Named Route
 * - Group Route
 */

// Routing adalah cara untuk menghubungkan URL dengan fungsi atau method tertentu routing digunakan untuk menentukan bagaimana permintaan HTTP dari pengguna akan ditangani oleh server.

// Contoh dibawah saya membuat route GET dengan url /week_2 dan akan menampilkan tulisan Hello World
// Route::get('/week_2', function(){ // <== menggunakan fungsi
//     return "Hello World"; // jika kita mengakses /week2, maka akan nge return atau mengembalikan tulisan Hello World
// });

// Menggunakan fungsi manual seperti diatas sangatlah tidak efisien. Kita perlu membuat controller untuk menghandle request dari user.
// Contoh dibawah kita membuat route GET dengan url /week_2 dan akan menampilkan tulisan Hello World menggunakan controller
Route::get('/week_2', [WeekController::class, 'index']); // <== menggunakan controller dan mengakses fungsi index dalam controller Week2Controller

// Route Parameter
// Route parameter digunakan untuk mengambil data dari URL. Contoh dibawah kita membuat route GET dengan url /week_2/{name} dan akan menampilkan tulisan Hello {name} menggunakan controller
//Route::get('/week_2/parameter/{name}', function($name){
//    return "Nama saya adalah ".$name; // <== dikarenakan kita menggunakan route parameter, maka kita bisa mengakses parameter name dengan menggunakan $name
//}); // <== menggunakan controller dan mengakses fungsi index dalam controller Week2Controller

// Named Route
// Named route digunakan untuk memberikan nama pada route. Contoh dibawah kita membuat route GET dengan url /week_2/named_route dan akan menampilkan tulisan Hello World menggunakan controller
// Route::get('/week_2/named-route', [WeekController::class, 'namedRoute'])->name('week2.namedRouted'); // <== menggunakan controller dan mengakses fungsi namedRoute dalam controller Week2Controller

// Route Group
// Route Group digunakan untuk mengelompokkan route. Contoh dibawah kita membuat route group dengan prefix /week_2 dan akan menampilkan tulisan Hello World menggunakan controller
// Contoh dibawah saya ingin membuat route group dengan prefix /week_2 dan akan menampilkan tulisan Hello World menggunakan controller
Route::prefix('/week_2')->group(function () {
    Route::get('/', [WeekController::class, 'index']); // <== menggunakan controller dan mengakses fungsi index dalam controller Week2Controller
    Route::get('/parameter/{name}', function ($name) {
        return "Nama saya adalah " . $name; // <== dikarenakan kita menggunakan route parameter, maka kita bisa mengakses parameter name dengan menggunakan $name
    }); // <== menggunakan controller dan mengakses fungsi index dalam controller Week2Controller
    Route::get('/named-route', [WeekController::class, 'namedRoute'])->name('week2.namedRouted'); // <== menggunakan controller dan mengakses fungsi namedRoute dalam controller Week2Controller
});


