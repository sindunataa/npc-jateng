<?php

use App\Http\Controllers\CaborController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ContingentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EntryNameController;
use App\Http\Controllers\EntryNumberController;
use App\Http\Controllers\FrontNewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeCountdownController;
use App\Http\Controllers\KlasemenController;
use App\Http\Controllers\MatchNumberController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VenueController;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


// Route::get('/', function() {
//     return view('frontend.home');
// });

Route::get('/', [HomeCountdownController::class, 'index'])->name('index');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::middleware('role.admin')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
        Route::prefix('contingents/')->name('contingents.')->group(function () {
            Route::get('/', [ContingentController::class, 'index'])->name('index');
            Route::get('/create', [ContingentController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [ContingentController::class, 'edit'])->name('edit');
            Route::post('/store', [ContingentController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ContingentController::class, 'update'])->name('update');
            Route::delete('/contingents/destroy/{contingent}', [ContingentController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('classifications/')->name('classifications.')->group(function () {
            Route::get('/', [ClassificationController::class, 'index'])->name('index');
            Route::post('/create', [ClassificationController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [ClassificationController::class, 'edit'])->name('edit');
            Route::post('/store', [ClassificationController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ClassificationController::class, 'update'])->name('update');
            Route::delete('/classification/destroy/{classification}', [ClassificationController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('members/')->name('members.')->group(function () {
            Route::get('/', [MemberController::class, 'index'])->name('index');
            Route::get('/create', [MemberController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('edit');
            Route::post('/store', [MemberController::class, 'store'])->name('store');
            Route::post('/update/{id}', [MemberController::class, 'update'])->name('update');
            Route::delete('/members/destroy/{member}', [MemberController::class, 'destroy'])->name('destroy');
        });
        
        Route::prefix('cabors/')->name('cabors.')->group(function () {
            Route::get('/', [CaborController::class, 'index'])->name('index');
            Route::get('/create', [CaborController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [CaborController::class, 'edit'])->name('edit');
            Route::post('/store', [CaborController::class, 'store'])->name('store');
            Route::post('update/{id}', [CaborController::class, 'update'])->name('update');
            Route::delete('/cabors/destroy/{cabor}', [CaborController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('match_numbers/')->name('match_numbers.')->group(function () {
            Route::get('/', [MatchNumberController::class, 'index'])->name('index');
            Route::get('/create', [MatchNumberController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [MatchNumberController::class, 'edit'])->name('edit');
            Route::post('/store', [MatchNumberController::class, 'store'])->name('store');
            Route::post('update/{id}', [MatchNumberController::class, 'update'])->name('update');
            Route::delete('/match_numbers/destroy/{match_number}', [MatchNumberController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('entry_numbers/')->name('entry_numbers.')->group(function () {
            Route::get('/admin', [EntryNumberController::class, 'admin'])->name('admin');
            Route::get('/result', [EntryNumberController::class, 'result'])->name('result');
            Route::get('/see_all', [EntryNumberController::class, 'see_all'])->name('see_all');
        });
        Route::prefix('entry_names/')->name('entry_names.')->group(function () {
            Route::get('/admin', [EntryNameController::class, 'admin'])->name('admin');
            Route::get('/downloadFoto/', [EntryNameController::class, 'downloadFoto'])->name('downloadFoto');
            Route::get('/downloadKtp', [EntryNameController::class, 'downloadKtp'])->name('downloadKtp');
            Route::get('/downloadFilePendukung', [EntryNameController::class, 'downloadFilePendukung'])->name('downloadFilePendukung');
            Route::get('/result', [EntryNameController::class, 'result'])->name('result');
            Route::get('/contingent', [EntryNameController::class, 'contingent'])->name('contingent');
        });
        Route::prefix('news/')->name('news.')->group(function () {
            Route::get('/', [NewsController::class, 'index'])->name('index');
            Route::get('/create', [NewsController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
            Route::post('/store', [NewsController::class, 'store'])->name('store');
            Route::post('update/{id}', [NewsController::class, 'update'])->name('update');
            Route::delete('/news/destroy/{new}', [NewsController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('sliders/')->name('sliders.')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('index');
            Route::get('/create', [SliderController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('edit');
            Route::post('/store', [SliderController::class, 'store'])->name('store');
            Route::post('update/{id}', [SliderController::class, 'update'])->name('update');
            Route::delete('/news/destroy/{slider}', [SliderController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('galleries/')->name('galleries.')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('index');
            Route::get('/create', [GalleryController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit');
            Route::post('/store', [GalleryController::class, 'store'])->name('store');
            Route::post('update/{id}', [GalleryController::class, 'update'])->name('update');
            Route::delete('/galleries/destroy/{gallery}', [GalleryController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('venues/')->name('venues.')->group(function () {
            Route::get('/', [VenueController::class, 'index'])->name('index');
            Route::get('/create', [VenueController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [VenueController::class, 'edit'])->name('edit');
            Route::post('/store', [VenueController::class, 'store'])->name('store');
            Route::post('update/{id}', [VenueController::class, 'update'])->name('update');
            Route::delete('/venues/destroy/{venue}', [VenueController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('competitions/')->name('competitions.')->group(function () {
            Route::get('/', [CompetitionController::class, 'index'])->name('index');
            Route::get('/create', [CompetitionController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [CompetitionController::class, 'edit'])->name('edit');
            Route::post('/store', [CompetitionController::class, 'store'])->name('store');
            Route::post('/update/{id}', [CompetitionController::class, 'update'])->name('update');
            Route::delete('/competitions/destroy/{competition}', [CompetitionController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('schedules/')->name('schedules.')->group(function () {
            Route::get('/', [ScheduleController::class, 'index'])->name('index');
            Route::get('/create', [ScheduleController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [ScheduleController::class, 'edit'])->name('edit');
            Route::post('/store', [ScheduleController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ScheduleController::class, 'update'])->name('update');
            Route::delete('/schedules/destroy/{schedule}', [ScheduleController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('downloads/')->name('downloads.')->group(function () {
            Route::get('/', [DownloadController::class, 'index'])->name('index');
            Route::get('/create', [DownloadController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [DownloadController::class, 'edit'])->name('edit');
            Route::post('/store', [DownloadController::class, 'store'])->name('store');
            Route::post('/update/{id}', [DownloadController::class, 'update'])->name('update');
            Route::delete('/downloads/destroy/{download}', [DownloadController::class, 'destroy'])->name('destroy');
        });
    });
    Route::middleware('role.contingent')->group(function() {
        Route::get('/home', [DashboardController::class, 'kontingen'])->name('home');
        // Route::get('getCourse/{id}', function ($id) {
        //     $course = App\Models\Course::where('category_id',$id)->get();
        //     return response()->json($course);
        // });
        
        Route::prefix('entry_numbers/')->name('entry_numbers.')->group(function () {
            Route::get('/', [EntryNumberController::class, 'index'])->name('index');
            Route::get('/create', [EntryNumberController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [EntryNumberController::class, 'edit'])->name('edit');
            Route::post('/store', [EntryNumberController::class, 'store'])->name('store');
            Route::post('update/{id}', [EntryNumberController::class, 'update'])->name('update');
            Route::delete('/entry_numbers/destroy/{entry_number}', [EntryNumberController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('entry_names/')->name('entry_names.')->group(function () {
            Route::get('/', [EntryNameController::class, 'index'])->name('index');
            Route::get('/create', [EntryNameController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [EntryNameController::class, 'edit'])->name('edit');
            Route::post('/store', [EntryNameController::class, 'store'])->name('store');
            Route::post('update/{id}', [EntryNameController::class, 'update'])->name('update');
            Route::delete('/entry_numbers/destroy/{entry_number}', [EntryNameController::class, 'destroy'])->name('destroy');
        });
        
    });
    Route::get('getJenisKlasifikasi/{id}', [EntryNumberController::class, 'get_jenis_klasifikasi'])->name('get_jenis_klasifikasi');
    Route::post('getClassification', [EntryNumberController::class, 'get_classification'])->name('get_classification');
    Route::post('getGender', [EntryNumberController::class, 'get_gender'])->name('get_gender');
    Route::post('getMatchNumber', [EntryNumberController::class, 'get_match_number'])->name('get_match_number');
    Route::post('get_matchnumber', [CompetitionController::class, 'get_matchnumber'])->name('get_matchnumber');
    Route::post('getMember', [CompetitionController::class, 'get_member'])->name('get_member');
    Route::post('getMemberEdit', [CompetitionController::class, 'get_member_edit'])->name('get_member_edit');

});



Route::prefix('berita/')->name('berita.')->group(function () {
    Route::get('/', [FrontNewsController::class, 'index'])->name('index');
    Route::get('/detail-berita/{slug}', [FrontNewsController::class, 'show'])->name('show');
});

Route::prefix('cabor/')->name('cabor.')->group(function () {
    Route::get('/', [CaborController::class, 'FrontCabor'])->name('FrontCabor');
    Route::get('/detail-cabor/{slug}', [CaborController::class, 'FrontCaborDetail'])->name('FrontCaborDetail');
});

Route::get('/klasemen', [KlasemenController::class, 'index'])->name('klasemen');
Route::get('/generatepdf/{uuid}/{competition_id}', [MemberController::class, 'generatePdf'])->name('generatePdf');
Route::get('/generate-certificate', [MemberController::class, 'viewpdf'])->name('viewpdf');
Route::get('/download-document', [DownloadController::class, 'front'])->name('FrontDownload');
Route::get('/jadwal-pertandingan', [ScheduleController::class, 'front'])->name('FrontSchedule');


// Route::get('/home', [DashboardController::class, 'index'])->name('home');







// Route::prefix('entry_names/')->name('entry_names.')->group(function () {
//     Route::get('/', [EntryNameController::class, 'index'])->name('index');
//     Route::get('/create', [EntryNameController::class, 'create'])->name('create');
//     Route::get('/edit/{id}', [EntryNameController::class, 'edit'])->name('edit');
//     Route::post('/store', [EntryNameController::class, 'store'])->name('store');
//     Route::post('update/{id}', [EntryNameController::class, 'update'])->name('update');
//     Route::delete('/entry_names/destroy/{entry_name}', [EntryNameController::class, 'destroy'])->name('destroy');
// });