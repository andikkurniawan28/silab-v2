<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\OutpostController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SaccharomatController;
use App\Http\Controllers\ColoromatController;
use App\Http\Controllers\MoistureController;
use App\Http\Controllers\UmumController;
use App\Http\Controllers\BoilerController;
use App\Http\Controllers\BaggaseController;
use App\Http\Controllers\SugarController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ChemicalController;
use App\Http\Controllers\ImbibitionController;
use App\Http\Controllers\AroundController;
use App\Http\Controllers\TaxationController;
use App\Http\Controllers\MollaseController;
use App\Http\Controllers\CoreSampleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\RonselController;
use App\Http\Controllers\RejectController;

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

// Page
Route::get('/', [PageController::class, 'index'])->name('dashboard')->middleware('user_is_login');
Route::get('activity_log_by_user', [PageController::class, 'activityLogByUser'])->name('activity_log_by_user')->middleware('user_is_login');
Route::get('activity_log', [PageController::class, 'activityLogByUser'])->name('activity_log')->middleware(['user_is_login', 'role_is_1']);
Route::get('analysis_result', [PageController::class, 'analysisResult'])->name('analysis_result')->middleware(['user_is_login', 'role_is_5']);
Route::get('station_result/{station_id}', [PageController::class, 'stationResult'])->name('station_result')->middleware(['user_is_login', 'role_is_5']);
Route::get('sample_result/{material_id}', [PageController::class, 'sampleResult'])->name('sample_result')->middleware(['user_is_login', 'role_is_5']);
Route::get('reports', [PageController::class, 'report'])->name('reports')->middleware(['user_is_login', 'role_is_3']);
Route::get('certificates', [PageController::class, 'certificate'])->name('certificates')->middleware(['user_is_login', 'role_is_3']);
Route::get('barcode_samples', [PageController::class, 'barcodeSample'])->name('barcode_samples')->middleware(['hmi_is_login', 'role_is_3']);
Route::get('timbangan_in_proses', [PageController::class, 'timbanganInProses'])->name('timbangan_in_proses')->middleware(['hmi_is_login', 'role_is_5']);

// Barcode
Route::post('barcode_samples', [BarcodeController::class, 'showBarcode'])->name('barcode_samples')->middleware(['hmi_is_login', 'role_is_3']);
Route::post('ronsel_masakan', [RonselController::class, 'showBarcode'])->name('ronsel_masakan')->middleware(['user_is_login', 'role_is_4']);

// Report
Route::post('lab_report', [ReportController::class, 'labReport'])->name('lab_report')->middleware(['user_is_login', 'role_is_3']);
Route::post('core_sample_report', [ReportController::class, 'coreSampleReport'])->name('core_sample_report')->middleware(['user_is_login', 'role_is_3']);

// Certificate
Route::post('mollases_certificate', [CertificateController::class, 'mollasesCertificate'])->name('mollases_certificate')->middleware(['user_is_login', 'role_is_3']);
Route::post('kapur_certificate', [CertificateController::class, 'kapurCertificate'])->name('kapur_certificate')->middleware(['user_is_login', 'role_is_3']);


// Authentication
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('login-process', [LoginController::class, 'login'])->name('login-process');
Route::post('register-process', [LoginController::class, 'registerProcess'])->name('register-process');
Route::get('login_hmi', [LoginController::class, 'loginHmi'])->name('login_hmi');
Route::post('login_hmi-process', [LoginController::class, 'loginHmiProccess'])->name('login_hmi-process');
Route::get('logout_hmi', [LoginController::class, 'logoutHmi'])->name('logout_hmi');

// User
Route::resource('users', UserController::class)->middleware(['user_is_login', 'role_is_1']);
Route::resource('roles', RoleController::class)->middleware(['user_is_login', 'role_is_1']);

// Goods
Route::resource('stations', StationController::class)->middleware(['user_is_login', 'role_is_1']);
Route::resource('methods', MethodController::class)->middleware(['user_is_login', 'role_is_1']);
Route::resource('factors', FactorController::class)->middleware(['user_is_login', 'role_is_1']);
Route::resource('materials', MaterialController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('samples', SampleController::class)->middleware(['user_is_login', 'role_is_3']);

// Plant Business
Route::resource('cooperatives', CooperativeController::class)->middleware(['user_is_login', 'role_is_1']);
Route::resource('outposts', OutpostController::class)->middleware(['user_is_login', 'role_is_1']);
Route::resource('programs', ProgramController::class)->middleware(['user_is_login', 'role_is_1']);

// Input
Route::resource('saccharomats', SaccharomatController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('coloromats', ColoromatController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('moistures', MoistureController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('umums', UmumController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('boilers', BoilerController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('baggases', BaggaseController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('sugars', SugarController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('specials', SpecialController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('core_samples', CoreSampleController::class)->middleware(['user_is_login', 'role_is_3']);
Route::resource('rejects', RejectController::class)->middleware(['user_is_login', 'role_is_3']);

// Pabrikasi can Involved
Route::resource('balances', BalanceController::class)->middleware(['user_is_login', 'role_is_5']);
Route::resource('chemicals', ChemicalController::class)->middleware(['user_is_login', 'role_is_5']);
Route::resource('imbibitions', ImbibitionController::class)->middleware(['user_is_login', 'role_is_5']);
Route::resource('arounds', AroundController::class)->middleware(['user_is_login', 'role_is_5']);
Route::resource('taxations', TaxationController::class)->middleware(['user_is_login', 'role_is_5']);
Route::resource('mollases', MollaseController::class)->middleware(['user_is_login', 'role_is_5']);
Route::get('ronsel_masakan', [PageController::class, 'ronselMasakan'])->name('ronsel_masakan')->middleware(['user_is_login', 'role_is_5']);

// Corection
Route::get('saccharomats_correction', [SaccharomatController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('coloromats_correction', [ColoromatController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('moistures_correction', [MoistureController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('umums_correction', [UmumController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('boilers_correction', [BoilerController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('baggases_correction', [BaggaseController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('sugars_correction', [SugarController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('specials_correction', [SpecialController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('core_samples_correction', [CoreSampleController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('rejects_correction', [RejectController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);

// Verification
Route::get('saccharomats_verification', [SaccharomatController::class, 'showVerification'])->middleware(['user_is_login', 'role_is_2']);
Route::get('coloromats_verification', [ColoromatController::class, 'showVerification'])->middleware(['user_is_login', 'role_is_2']);
Route::get('moistures_verification', [MoistureController::class, 'showVerification'])->middleware(['user_is_login', 'role_is_2']);
Route::get('umums_verification', [UmumController::class, 'showVerification'])->middleware(['user_is_login', 'role_is_2']);
Route::get('boilers_verification', [BoilerController::class, 'showVerification'])->middleware(['user_is_login', 'role_is_2']);
Route::get('baggases_verification', [BaggaseController::class, 'showVerification'])->middleware(['user_is_login', 'role_is_2']);
Route::get('sugars_verification', [SugarController::class, 'showVerification'])->middleware(['user_is_login', 'role_is_2']);
Route::get('specials_verification', [SpecialController::class, 'showVerification'])->middleware(['user_is_login', 'role_is_2']);

// Process Verification
Route::post('saccharomats_verification', [SaccharomatController::class, 'processVerification'])->middleware(['user_is_login', 'role_is_2'])->name('saccharomats.verify');
Route::post('coloromats_verification', [ColoromatController::class, 'processVerification'])->middleware(['user_is_login', 'role_is_2'])->name('coloromats.verify');
Route::post('moistures_verification', [MoistureController::class, 'processVerification'])->middleware(['user_is_login', 'role_is_2'])->name('moistures.verify');
Route::post('umums_verification', [UmumController::class, 'processVerification'])->middleware(['user_is_login', 'role_is_2'])->name('umums.verify');
Route::post('boilers_verification', [BoilerController::class, 'processVerification'])->middleware(['user_is_login', 'role_is_2'])->name('boilers.verify');
Route::post('baggases_verification', [BaggaseController::class, 'processVerification'])->middleware(['user_is_login', 'role_is_2'])->name('baggases.verify');
Route::post('sugars_verification', [SugarController::class, 'processVerification'])->middleware(['user_is_login', 'role_is_2'])->name('sugars.verify');
Route::post('specials_verification', [SpecialController::class, 'processVerification'])->middleware(['user_is_login', 'role_is_2'])->name('specials.verify');
Route::post('taxation_export', [TaxationController::class, 'export'])->middleware(['user_is_login', 'role_is_2'])->name('taxation_export');


