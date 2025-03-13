    <?php

    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\SuratController;
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

    /*Route::get('/', function () {
        return view('welcome');
    });
    */

    Route::get('/', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::middleware('auth')->group(function () {
        // Rute untuk halaman dashboard admin
        Route::get('/dashboardAdmin', [HomeController::class, 'dashboardAdmin'])->name('dashboard.admin');
        // Rute untuk mengupload surat
        Route::get('/buatSurat', [SuratController::class, 'buatSurat'])->name('buatSurat');
        Route::post('/prosesUpload', [SuratController::class, 'store'])->name('prosesUpload');
        // Rute untuk menampilkan semua data surat yang terupload oleh user
        Route::get('/viewSurat', [SuratController::class, 'viewSurat'])->name('viewSurat');
        Route::get('/pratinjauSurat', [SuratController::class, 'pratinjauSurat'])->name('pratinjauSurat');
        Route::delete('/hapusSurat/{suratId}', [SuratController::class, 'destroy'])->name('hapusSurat');
        Route::post('/kirimSurat/{suratId}', [SuratController::class, 'kirimSurat'])->name('kirimSurat');
        Route::post('/kirim-surat-notifikasi/{suratId}', [SuratController::class, 'kirimSuratNotifikasi'])->name('kirim-surat-notifikasi');
        //rute untuk halaman riwayat
        Route::get('/riwayat',[SuratController::class,'riwayat'])->name('riwayat');
        //rute utuk surat masuk
        Route::get('/suratMasuk' , [SuratController::class , 'suratMasuk'])->name('suratMasuk');
        //hasil surat
        Route::get('/lihat-hasil-surat/{suratId}/{status}', [SuratController::class,'lihatHasilSurat'])->name('lihatHasilSurat');

        //rute untuk halaman dashboard manager
        Route::get('/dashboardManager', [HomeController::class, 'dashboardManager'])->name('dashboard.manager');
        //rute untuk halaman tinjau
        Route::get('/tinjauSurat', [SuratController::class, 'tinjauSurat'])->name('tinjauSurat');
        //rute prose tinjau manajer
        Route::get('/proses-tinjau/{id}', [SuratController::class, 'prosesTinjau'])->name('prosesTinjau');
        //rute proses mensetujui surat
        Route::post('/setujui-surat/{id}', [SuratController::class,'setujuiSurat'])->name('setujuiSurat');
        //rute untuk menolak surat
        Route::post('/tolakSurat/{suratId}', [SuratController::class, 'tolakSurat'])->name('tolakSurat');
        //rute melihat surat manajer
        Route::get('/Surat/{id}', [SuratController::class, 'lihatSurat'])->name('lihatSurat');
        //rute untuk halaman riwayat pengiriman manajer
        Route::get('/history', [SuratController::class, 'history'])->name('history');
        
    });
