<?php

use App\Http\Controllers\Week3\ManagementUserController;
use App\Http\Controllers\Week3Controller;
use App\Http\Controllers\Week4Controller;
use App\Http\Controllers\Week6Controller;
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


/**
 * Minggu 3
 * 
 * MVC
 * Model View Controller
 * 
 * Konsep MVC adalah konsep yang memisahkan antara logic dengan tampilan sehingga memudahkan dalam pengembangan aplikasi.
 * Pada file ini adalah controller, dimana controller ini berfungsi untuk menghubungkan antara model dengan view.
 * 
 * Model dibuat jika kita ingin mengakses database, sedangkan view dibuat jika kita ingin menampilkan data ke user.
 */

Route::group([
    'prefix' => 'week_3', // <== prefix ini dibuat untuk mengelompokkan route yang ada didalamnya
    'as' => 'week_3' // <== as ini dibuat untuk memberikan nama pada route group
], function () {
    //Route::get('/', [Week3Controller::class, 'index']); // <== menggunakan controller dan mengakses fungsi index dalam controller Week3Controller

    // Route Resources
    // Route Resources adalah cara yang disediakan oleh framework Laravel untuk secara otomatis menghasilkan rute untuk tindakan CRUD umum dalam controller. Dengan menggunakan route resources, kita dapat mengatur rute untuk aksi seperti menampilkan semua data, menampilkan form tambah data, menyimpan data baru, menampilkan data per id, mengubah data, dan menghapus data.

    Route::resource('/', ManagementUserController::class);
});


/**
 * 
 * Minggu 4
 * Templating Blade
 * Templating Blade adalah fitur yang disediakan oleh framework Laravel untuk memudahkan dalam membuat tampilan website.
 * 
 * Contoh dibawah ini akan menampilkan landing page menggunakan template dari bootstrap yakni Butterfly Template
 * 
 */
Route::get('/login', function () {
    return redirect()->route('week_4.auth.login.create');
});
Route::group(['prefix' => 'week_4', 'as' => 'week_4.'], function () {
    Route::get('/', [Week4Controller::class, 'index'])->name('index');
    // Route Grouping untuk login dan register

    // Pada group dibawah ini, akan dibuat route grouping untuk login dan register
    // Route::group(['prefix' => 'auth', 'as' => 'auth.'], function(){
    //     Route::get('/login', [Week4Controller::class, 'loginCreate'])->name('login.create');
    //     Route::post('/login', [Week4Controller::class, 'loginStore'])->name('login.store');
    //     Route::get('/register', [Week4Controller::class, 'register'])->name('register');
    // });

    // End Route Grouping Login and Register
    Route::get('/dashboard', [Week4Controller::class, 'dashboard'])->name('dashboard');
});

/**
 * 
 * Minggu 6
 * Membuat fitur authentication login dan register
 * 
 * Contoh dibawah ini akan membuat route grouping untuk authentication
 */

Route::group(['prefix' => 'week_6', 'as' => 'week_6.', 'middleware' => 'guest'], function () {
    Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('/login', [Week6Controller::class, 'loginCreate'])->name('login-create');
        Route::post('/login', [Week6Controller::class, 'loginStore'])->name('login-store');
        Route::get('/register', [Week6Controller::class, 'registerCreate'])->name('register-create');
        Route::post('/register', [Week6Controller::class, 'registerStore'])->name('register-store');
    });
});

/**
 * Minggu 7
 * Membuat fitur CRUD
 * 
 * Contoh dibawah ini akan membuat route grouping untuk CRUD
 */

// penerapan middleware auth. jadi jika user belum login, maka tidak bisa mengakses route dibawah ini
/**
 * 
 * 
 * Middleware
 * Middleware adalah sebuah fitur yang disediakan oleh framework Laravel untuk memudahkan dalam mengatur akses user.
 */
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'week_7', 'as' => 'week_7.'], function () {
        Route::get('/', function () {
            return redirect()->route('week_7.dashboard');
        });
        Route::get('/dashboard', function () {
            return view('week7.dashboard');
        })->name('dashboard');
        Route::resource('users', UserController::class)->names( // <== route resource untuk CRUD user
            [
                'index' => 'users.index',
                'create' => 'users.create',
                'store' => 'users.store',
                'show' => 'users.show',
                'edit' => 'users.edit',
                'update' => 'users.update',
                'destroy' => 'users.destroy',
            ]
        );
    });
});
