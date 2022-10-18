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

// Dashboard
Route::get('/', [PageController::class, 'index'])->name('dashboard')->middleware('user_is_login');
Route::get('activity_log_by_user', [PageController::class, 'activityLogByUser'])->name('activity_log_by_user')->middleware('user_is_login');
Route::get('activity_log', [PageController::class, 'activityLogByUser'])->name('activity_log')->middleware(['user_is_login', 'role_is_1']);
Route::get('analysis_result', [PageController::class, 'analysisResult'])->name('analysis_result')->middleware(['user_is_login', 'role_is_5']);
Route::get('station_result/{station_id}', [PageController::class, 'stationResult'])->name('station_result')->middleware(['user_is_login', 'role_is_5']);
Route::get('sample_result/{material_id}', [PageController::class, 'sampleResult'])->name('sample_result')->middleware(['user_is_login', 'role_is_5']);

// Authentication
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('login-process', [LoginController::class, 'login'])->name('login-process');
Route::post('register-process', [LoginController::class, 'registerProcess'])->name('register-process');

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

// Corection
Route::get('saccharomats_correction', [SaccharomatController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('coloromats_correction', [ColoromatController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('moistures_correction', [MoistureController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('umums_correction', [UmumController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('boilers_correction', [BoilerController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('baggases_correction', [BaggaseController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('sugars_correction', [SugarController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);
Route::get('specials_correction', [SpecialController::class, 'showCorrection'])->middleware(['user_is_login', 'role_is_3']);

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


