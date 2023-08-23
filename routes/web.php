<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\SuperAdmin;
use App\Models\Group\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Route::prefix('/')->group(function () {
//     Route::get('/', [App\Http\Controllers\Pages\ComingSoon::class, 'getComingSoon']);
//     Route::post('/', [App\Http\Controllers\Pages\ComingSoon::class, 'postEmail'])->name('postEmail');
//     Route::post('/validate', [App\Http\Controllers\Pages\ComingSoon::class, 'validateDuplicate']);
// });

// Route::prefix('/test')->group(function() {
//     Route::get('/login', function () {
//         return view('login');
//     });
//     Route::get('/forgotpassword', function () {
//         return view('forgotpassword');
//     });
//     Route::get('/register', function () {
//         return view('register');
//     });
//     Route::get('/admin', [AdminController::class,'viewUser'])->name('viewUser');
//     Route::get('/user',[UserController::class, 'index'])->name('dashboard');
//     // Route::get('/user/profile',[UserController::class, 'profile'])->name('profile');
//     Route::get('/superadmin',[SuperAdminController::class, 'viewUserData'])->name('viewSuperUser');
//     Route::get('/resetpassword', function () {
//         return view('resetpassword');
//     });
//     Route::get('/', function () {
//         return view('mainpage');
//     });
// });

Route::prefix('/register')->group(function() {
    Route::prefix('/validate')->group(function() {
        Route::post('/email', [App\Http\Controllers\Auth\RegisteredUserController::class, 'personalEmailIsUnique']);
        Route::post('/nim', [App\Http\Controllers\Auth\RegisteredUserController::class, 'nimIsUnique']);
        Route::post('/line', [App\Http\Controllers\Auth\RegisteredUserController::class, 'lineIdIsUnique']);
        Route::post('/whatsapp', [App\Http\Controllers\Auth\RegisteredUserController::class, 'whatsappIsUnique']);
        Route::post('/instagram', [App\Http\Controllers\Auth\RegisteredUserController::class, 'instagramIsUnique']);
    });
});

// Kalo mau di launch ubah ke '/' aja
//Route::get('/', [MainPageController::class, 'getView'])->name('main');
Route::get('/', [MainPageController::class, 'getView'])->middleware('source_cookie')->name('main');

Route::middleware(["auth"])->group(function(){
    // User
    Route::get('/user',[UserController::class, 'index'])->name('dashboard');
    Route::get('/user/profile',[UserController::class, 'profile'])->name('profile');
    Route::patch('/user',[UserController::class, 'changeSchedule'])->name('scheduleChange');
    Route::post('/user/survey', [UserController::class, 'registrationSourceSurvey'])->name('registrationSource');
    Route::post('/user/instagram', [UserController::class, 'storeInstagram'])->name('storeInstagram');
    Route::post('/user/agama', [UserController::class, 'storeReligion'])->name('storeReligion');
    Route::patch('/user/reregister/schedule',[UserController::class, 'changeReregisterSchedule'])->name('reregisterScheduleChange');


    // Payment
    Route::get('/user/payment',[UserController::class, 'paymentPage'])->name('userPayment');
    // Route::post('/user/payment',[UserController::class, 'submitPayment'])->name('submitPayment');

    Route::prefix('/user/group')->group(function() {
        Route::get('/generate-code', [GroupController::class, 'exitGroup'])->name('exitGroup');
        Route::get('/exit-group', [GroupController::class, 'createGroup'])->name('generateGroup');
        Route::post('/submit-payment', [PaymentController::class, 'submitPayment'])->name('submitPayment');
        Route::post('/verify-group', [GroupController::class, 'groupExist'])->name('groupExist');
        Route::post('/verify-group-capacity', [GroupController::class, 'groupCapacities'])->name('groupCapacities');
    });


    // Register
    Route::get('/user/join/{zoom}', [UserController::class, 'joinLaunching'])->name('joinLaunching');
    Route::get('/user/register',[MemberController::class, 'registUserPage'])->name('userRegist');
    Route::post('/user/register',[MemberController::class, 'createMember'])->name('addMember');
    Route::get('/user/register/surat',[MemberController::class, 'downloadSuratMember'])->name('downloadSurat');


    // Re-Register
    Route::get('/user/reregister',[MemberController::class, 'userReRegisterPage'])->name('userReRegist');
    Route::post('/user/reregister',[MemberController::class, 'memberReregister'])->name('addMember2');

    Route::prefix('/user')->group(function() {
        Route::prefix('/reregister')->group(function() {
            Route::post('/linkedin', [MemberController::class, 'linkedinIsUnique']);
            Route::post('/github', [MemberController::class, 'githubIsUnique']);
        });
    });
});


Route::middleware(["auth", "admin"])->group(function(){
    // User
    Route::get('/admin', [AdminController::class,'viewUser'])->name('viewUser');

    Route::get('/admin/edit/{id}',[AdminController::class, 'getUpdatePage'])->name('updatePage');
    Route::patch('/admin/edit/{id}',[AdminController::class,'updateUser'])->name('updateUser');
    //Route::post('/admin/update/{id}',[AdminController::class,'updateUser'])->name('updateUser');
    Route::get('/admin/delete/{id}',[AdminController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/admin/download/{region}', [AdminController::class, 'downloadUserData'])->name('downloadUserData');

    // Payment
    Route::get('/admin/payment',[AdminController::class,'viewPaymentPage'])->name('adminPayment');
    Route::patch('/admin/payment/approve/{id}',[AdminController::class, 'approvePayment'])->name('approvePaymentAdmin');
    Route::patch('/admin/payment/reject/{id}',[AdminController::class, 'rejectPayment'])->name('rejectPaymentAdmin');
    Route::patch('/admin/payment/delete/{id}',[AdminController::class, 'deletePayment'])->name('deletePaymentAdmin');
    Route::get('/admin/payment/view-payment/{fn}',[AdminController::class,'viewPayment'])->name('viewPaymentAdmin');

    Route::get('/admin/payment/download/{region}', [AdminController::class, 'downloadPaymentData'])->name('downloadPaymentData');

    // Register
    Route::get('/admin/register',[AdminController::class,'getMember'])->name('viewMember');
    Route::get('/admin/register/delete/{id}',[AdminController::class,'deleteMember'])->name('deleteMember');
    Route::get('/admin/register/ktp/{id}',[AdminController::class, 'downloadKTP'])->name('downloadKTP');
    Route::get('/admin/register/fyp/{id}',[AdminController::class, 'downloadFYP'])->name('downloadFYP');
    Route::get('/admin/register/surat/{id}',[AdminController::class, 'downloadSurat'])->name('downloadSuratAdmin');
    Route::get('/admin/register/view-ktp/{fn}',[AdminController::class, 'viewKTP'])->name('viewAdminKTP');
    Route::get('/admin/register/view-fyp/{fn}', [AdminController::class, 'viewFYP'])->name('viewAdminFYP');
    Route::get('/admin/register/view-surat/{fn}', [AdminController::class, 'viewSurat'])->name('viewAdminSurat');

    Route::get('/admin/register/download/{region}', [AdminController::class, 'downloadMemberData'])->name('downloadMemberData');

    // Re-Register
    Route::get('/admin/reregister', [AdminController::class, 'getMember2'])->name('viewMember2');
    Route::get('/admin/reregister/delete/{id}',[AdminController::class, 'deleteMember2'])->name('deleteMember2');
    Route::get('/admin/reregister/download/{region}',[AdminController::class, 'downloadMember2Data'])->name('donwloadMember2Data');
});


Route::middleware(["auth", "super.admin"])->group(function(){
    // User
    Route::get('/superadmin',[SuperAdminController::class, 'viewUserData'])->name('viewSuperUser');

    Route::get('/superadmin/edit/{id}',[SuperAdminController::class, 'getUpdatePage'])->name('updatePageSuper');
    Route::patch('/superadmin/edit/{id}',[SuperAdminController::class,'updateUser'])->name('updateSuperUser');
    //Route::post('/superadmin/update/{id}',[SuperAdminController::class,'updateUser'])->name('updateSuperUser');

    Route::get('/superadmin/delete/{id}',[SuperAdminController::class, 'deleteUser'])->name('deleteSuperUser');

    Route::get('/superadmin/download/{region}', [SuperAdminController::class, 'downloadUserData'])->name('downloadSuperUserData');

    // Payment
    Route::get('/superadmin/payment',[SuperAdminController::class,'viewPaymentPage'])->name('superAdminPayment');
    Route::patch('/superadmin/payment/approve/{id}',[SuperAdminController::class, 'approvePayment'])->name('approvePayment');
    Route::patch('/superadmin/payment/reject/{id}',[SuperAdminController::class, 'rejectPayment'])->name('rejectPayment');
    Route::patch('/superadmin/payment/delete/{id}',[SuperAdminController::class, 'deletePayment'])->name('deletePayment');
    Route::get('/superadmin/payment/view-payment/{fn}', function(Request $request, $fn){
        return response()->file(storage_path('app/payment/' . $fn));
    })->name('viewPayment');

    Route::get('/superadmin/payment/download/{region}', [SuperAdminController::class, 'downloadPaymentData'])->name('downloadSuperPaymentData');

    // Register
    Route::get('/superadmin/register',[SuperAdminController::class,'getMember'])->name('viewMemberSuper');
    Route::get('/superadmin/register/delete/{id}',[SuperAdminController::class,'deleteMember'])->name('deleteSuperMember');
    Route::get('/superadmin/register/ktp/{id}',[SuperAdminController::class, 'downloadKTP'])->name('downloadSuperKTP');
    Route::get('/superadmin/register/fyp/{id}',[SuperAdminController::class, 'downloadFYP'])->name('downloadSuperFYP');
    Route::get('/superadmin/register/surat/{id}',[SuperAdminController::class, 'downloadSurat'])->name('downloadSuperSurat');
    Route::get('/superadmin/register/view-ktp/{fn}', function(Request $request, $fn){
        return response()->file(storage_path('app/ktp/' . $fn));
    })->name('viewKTP');
    Route::get('/superadmin/register/view-fyp/{fn}', function(Request $request, $fn){
        return response()->file(storage_path('app/fyp/' . $fn));
    })->name('viewFYP');
    Route::get('/superadmin/register/view-surat/{fn}', function(Request $request, $fn){
        return response()->file(storage_path('app/surat/' . $fn));
    })->name('viewSurat');

    Route::get('/superadmin/register/download/{region}', [SuperAdminController::class, 'downloadMemberData'])->name('downloadSuperMemberData');

    // Re-Register
    Route::get('/superadmin/reregister', [SuperAdminController::class, 'getMember2'])->name('viewMember2Super');
    Route::get('/superadmin/reregister/delete/{id}',[SuperAdminController::class, 'deleteMember2'])->name('deleteSuperMember2');
    Route::get('/superadmin/reregister/download/{region}',[SuperAdminController::class, 'downloadMember2Data'])->name('donwloadSuperMember2Data');

    Route::post('/supearadmin/test/edit',[SuperAdminController::class,'updateUsersStatus'])->name('updateStatus');
});

Route::get('/blastbackup/39cfe3a108916bc683c7a6effcd690e7689cda46bad754c239d0fa83', [App\Http\Controllers\Commons\BlastEmail::class, 'blastView'])->middleware(['auth', 'super.admin']);

Route::post('/blastbackup/39cfe3a108916bc683c7a6effcd690e7689cda46bad754c239d0fa83', [App\Http\Controllers\Commons\BlastEmail::class, 'blastAll'])->middleware(['auth', 'super.admin'])->name('blastall');

Route::get('/import/user', [UserController::class, 'importFromCsv']);

require __DIR__.'/auth.php';
