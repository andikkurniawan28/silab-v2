<?php

use App\Http\Controllers\TestApi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirtController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RainController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkmtController;
use App\Http\Controllers\UmumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SugarController;
use App\Http\Controllers\AroundController;
use App\Http\Controllers\BoilerController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\RejectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RonselController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\BaggaseController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\MollaseController;
use App\Http\Controllers\OutpostController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\WaitingController;
use App\Http\Controllers\ChemicalController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MejaTebuController;
use App\Http\Controllers\MoistureController;
use App\Http\Controllers\TaxationController;
use App\Http\Controllers\ColoromatController;
use App\Http\Controllers\RafactionController;
use App\Http\Controllers\TestYajraController;
use App\Http\Controllers\CoreSampleController;
use App\Http\Controllers\ImbibitionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\SaccharomatController;
use App\Http\Controllers\TestJoinStationResult;
use App\Http\Controllers\TimbanganRsController;
use App\Http\Controllers\SampleResultController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RainMonitoringController;
use App\Http\Controllers\TimbanganRsOutController;
use App\Http\Controllers\TimbanganTetesController;
use App\Http\Controllers\UploadUserImageController;
use App\Http\Controllers\RafactionMonitoringController;
use App\Http\Controllers\CoreSampleMonitoringController;
use App\Http\Controllers\RafactionScoreIsNullController;

// Page
Route::get('/', [PageController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('activity_log_by_user', [PageController::class, 'activityLogByUser'])->name('activity_log_by_user')->middleware('auth');
Route::get('activity_log', [PageController::class, 'activityLogByUser'])->name('activity_log')->middleware(['auth', 'role_is_1']);
Route::get('analysis_result', [PageController::class, 'analysisResult'])->name('analysis_result')->middleware(['auth', 'role_is_5']);
Route::get('station_result/{station_id}', [PageController::class, 'stationResult'])->name('station_result')->middleware(['auth', 'role_is_5']);
Route::get('sample_result/{material_id}', [PageController::class, 'sampleResult'])->name('sample_result')->middleware(['auth', 'role_is_5']);
//  Route::get('sample_result/{material_id}', SampleResultController::class)->name('sample_result')->middleware(['auth', 'role_is_5']);
Route::get('reports', [PageController::class, 'report'])->name('reports')->middleware(['auth', 'role_is_3']);
Route::get('certificates', [PageController::class, 'certificate'])->name('certificates')->middleware(['auth', 'role_is_3']);
Route::get('barcode_samples', [PageController::class, 'barcodeSample'])->name('barcode_samples')->middleware(['auth', 'role_is_3']);

Route::get('timbangan_tetes', [TimbanganTetesController::class, 'index'])->name('timbangan_tetes')->middleware(['auth']);
Route::get('timbangan_rs_in', [TimbanganRsController::class, 'index'])->name('timbangan_rs_in')->middleware(['auth']);
Route::get('timbangan_rs_out', [TimbanganRsOutController::class, 'index'])->name('timbangan_rs_out')->middleware(['auth']);
Route::post('adjust_timbangan_tetes', [WeightController::class, 'adjustTetes'])->name('adjust_timbangan_tetes')->middleware(['auth', 'role_is_1']);
Route::post('adjust_timbangan_rs_out', [WeightController::class, 'adjustRawSugarOut'])->name('adjust_timbangan_rs_out')->middleware(['auth', 'role_is_1']);
Route::post('adjust_timbangan_rs_in', [WeightController::class, 'adjustRawSugarIn'])->name('adjust_timbangan_rs_in')->middleware(['auth', 'role_is_1']);

// Barcode
Route::post('barcode_samples', [BarcodeController::class, 'showBarcode'])->name('barcode_samples')->middleware(['auth', 'role_is_3']);
Route::post('ronsel_masakan', [RonselController::class, 'showBarcode'])->name('ronsel_masakan')->middleware(['auth', 'role_is_4']);

// Report
Route::post('lab_report', [ReportController::class, 'labReport'])->name('lab_report')->middleware(['auth', 'role_is_3']);
Route::post('core_sample_report', [ReportController::class, 'coreSampleReport'])->name('core_sample_report')->middleware(['auth', 'role_is_3']);

// Certificate
Route::post('mollases_certificate', [CertificateController::class, 'mollasesCertificate'])->name('mollases_certificate')->middleware(['auth', 'role_is_3']);
Route::post('kapur_certificate', [CertificateController::class, 'kapurCertificate'])->name('kapur_certificate')->middleware(['auth', 'role_is_3']);

// Authentication
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login-process', [LoginController::class, 'login'])->name('login-process');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register-process', [LoginController::class, 'registerProcess'])->name('register-process');
// Route::get('login_hmi', [LoginController::class, 'loginHmi'])->name('login_hmi');
// Route::post('login_hmi-process', [LoginController::class, 'loginHmiProccess'])->name('login_hmi-process');
// Route::get('logout_hmi', [LoginController::class, 'logoutHmi'])->name('logout_hmi');

// User
Route::resource('users', UserController::class)->middleware(['auth', 'role_is_1']);
Route::resource('roles', RoleController::class)->middleware(['auth', 'role_is_1']);

// Goods
Route::resource('stations', StationController::class)->middleware(['auth', 'role_is_1']);
Route::resource('methods', MethodController::class)->middleware(['auth', 'role_is_1']);
Route::resource('factors', FactorController::class)->middleware(['auth', 'role_is_1']);
Route::resource('dirts', DirtController::class)->middleware(['auth', 'role_is_1']);
Route::resource('materials', MaterialController::class)->middleware(['auth', 'role_is_3']);
Route::resource('samples', SampleController::class)->middleware(['auth', 'role_is_3']);

// Plant Business
Route::resource('cooperatives', CooperativeController::class)->middleware(['auth', 'role_is_1']);
Route::resource('outposts', OutpostController::class)->middleware(['auth', 'role_is_1']);
Route::resource('programs', ProgramController::class)->middleware(['auth', 'role_is_1']);

// Input
Route::resource('saccharomats', SaccharomatController::class)->middleware(['auth', 'role_is_3']);
Route::resource('coloromats', ColoromatController::class)->middleware(['auth', 'role_is_3']);
Route::resource('moistures', MoistureController::class)->middleware(['auth', 'role_is_3']);
Route::resource('umums', UmumController::class)->middleware(['auth', 'role_is_3']);
Route::resource('boilers', BoilerController::class)->middleware(['auth', 'role_is_3']);
Route::resource('baggases', BaggaseController::class)->middleware(['auth', 'role_is_3']);
Route::resource('sugars', SugarController::class)->middleware(['auth', 'role_is_3']);
Route::resource('specials', SpecialController::class)->middleware(['auth', 'role_is_3']);
Route::resource('core_samples', CoreSampleController::class)->middleware(['auth', 'role_is_3']);
Route::resource('rejects', RejectController::class)->middleware(['auth', 'role_is_3']);
Route::resource('rafactions', RafactionController::class)->middleware(['auth', 'role_is_3']);
Route::post('rafactions/assign', [RafactionController::class, 'assignScore'])->middleware(['auth', 'role_is_3'])->name('rafactions.assign');
Route::resource('skmts', SkmtController::class)->middleware(['auth', 'role_is_3']);

// Pabrikasi can Involved
Route::resource('balances', BalanceController::class)->middleware(['auth', 'role_is_5']);
Route::resource('chemicals', ChemicalController::class)->middleware(['auth', 'role_is_5']);
Route::resource('imbibitions', ImbibitionController::class)->middleware(['auth', 'role_is_5']);
Route::resource('arounds', AroundController::class)->middleware(['auth', 'role_is_5']);
Route::resource('taxations', TaxationController::class)->middleware(['auth', 'role_is_5']);
Route::resource('mollases', MollaseController::class)->middleware(['auth', 'role_is_5']);
Route::get('ronsel_masakan', [PageController::class, 'ronselMasakan'])->name('ronsel_masakan')->middleware(['auth', 'role_is_5']);

// Corection
Route::get('saccharomats_correction', [SaccharomatController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);
Route::get('coloromats_correction', [ColoromatController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);
Route::get('moistures_correction', [MoistureController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);
Route::get('umums_correction', [UmumController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);
Route::get('boilers_correction', [BoilerController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);
Route::get('baggases_correction', [BaggaseController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);
Route::get('sugars_correction', [SugarController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);
Route::get('specials_correction', [SpecialController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);
Route::get('core_samples_correction', [CoreSampleController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);
Route::get('rejects_correction', [RejectController::class, 'showCorrection'])->middleware(['auth', 'role_is_3']);

// Verification
Route::get('saccharomats_verification', [SaccharomatController::class, 'showVerification'])->middleware(['auth', 'role_is_2']);
Route::get('coloromats_verification', [ColoromatController::class, 'showVerification'])->middleware(['auth', 'role_is_2']);
Route::get('moistures_verification', [MoistureController::class, 'showVerification'])->middleware(['auth', 'role_is_2']);
Route::get('umums_verification', [UmumController::class, 'showVerification'])->middleware(['auth', 'role_is_2']);
Route::get('boilers_verification', [BoilerController::class, 'showVerification'])->middleware(['auth', 'role_is_2']);
Route::get('baggases_verification', [BaggaseController::class, 'showVerification'])->middleware(['auth', 'role_is_2']);
Route::get('sugars_verification', [SugarController::class, 'showVerification'])->middleware(['auth', 'role_is_2']);
Route::get('specials_verification', [SpecialController::class, 'showVerification'])->middleware(['auth', 'role_is_2']);

// Process Verification
Route::post('saccharomats_verification', [SaccharomatController::class, 'processVerification'])->middleware(['auth', 'role_is_2'])->name('saccharomats.verify');
Route::post('coloromats_verification', [ColoromatController::class, 'processVerification'])->middleware(['auth', 'role_is_2'])->name('coloromats.verify');
Route::post('moistures_verification', [MoistureController::class, 'processVerification'])->middleware(['auth', 'role_is_2'])->name('moistures.verify');
Route::post('umums_verification', [UmumController::class, 'processVerification'])->middleware(['auth', 'role_is_2'])->name('umums.verify');
Route::post('boilers_verification', [BoilerController::class, 'processVerification'])->middleware(['auth', 'role_is_2'])->name('boilers.verify');
Route::post('baggases_verification', [BaggaseController::class, 'processVerification'])->middleware(['auth', 'role_is_2'])->name('baggases.verify');
Route::post('sugars_verification', [SugarController::class, 'processVerification'])->middleware(['auth', 'role_is_2'])->name('sugars.verify');
Route::post('specials_verification', [SpecialController::class, 'processVerification'])->middleware(['auth', 'role_is_2'])->name('specials.verify');
Route::post('taxation_export', [TaxationController::class, 'export'])->middleware(['auth', 'role_is_2'])->name('taxation_export');

// Meja Tebu
Route::get('meja_tebu/{nomor_meja}', MejaTebuController::class)->name('meja_tebu')->middleware(['auth', 'role_is_3']);
Route::get('waiting/{nomor_meja}/{rafaction_id}', WaitingController::class)->name('waiting');
Route::get('rafaction_checking/{rafaction_id}', RafactionScoreIsNullController::class)->name('rafaction_checking');

// Agro Klimat
Route::get('agroklimat/{kud}/{humidity}/{cahaya}/{curah_hujan}', RainController::class)->name('agroklimat');
Route::get('agroklimat/', RainMonitoringController::class)->name('agroklimat_view')->middleware('auth');

// TestApi
// Route::get('test/{nomor_bor}', TestApi::class)->name('test');
// Route::get('taxation_export/{id}', [TaxationController::class, 'export'])->name('taxation_export')->middleware(['auth', 'role_is_5']);

// View
Route::get('core_samples_view', CoreSampleMonitoringController::class)->name('core_samples_view');
Route::get('rafactions_view', RafactionMonitoringController::class)->name('rafactions_view');

// Change Password
Route::post('change_password', ChangePasswordController::class)->name('change_password');

// Upload Image
Route::post('upload_image', UploadUserImageController::class)->name('upload_image');

// Test
// Route::get('test/{method_id}', SampleResultController::class);

