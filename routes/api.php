<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgetPasswordController;

use App\Http\Controllers\Api\Auth\RestPasswordController;

use App\Http\Controllers\Api\Auth\VerfiedController;
use App\Http\Controllers\Api\CaseController;
use App\Http\Controllers\Api\CategoryCaseController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\FireBaseController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ImpactController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\VolunteerController;
use App\Http\Controllers\TestController;
use App\Imports\CaseImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Event\Code\Test;




Route::group(['prefix'=>'auth'],function(){
    Route::post('register/check',[AuthController::class, 'check_register']);
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout'])->middleware('auth-api');
    Route::post('email/verfied',[VerfiedController::class,'verfiedEmail']);
    Route::post('email/verfied/resendCode',[VerfiedController::class,'resendCode']);
    Route::post('forget/password',[ForgetPasswordController::class,'ForgetPassword']);
    Route::post('rest/password',[RestPasswordController::class,'RestPassword']);
});
Route::post('dashboard/users/import', function(){
    dd('lds');
});


Route::post('import', function (Request $request) {
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv', // تحقق من نوع الملف
    ]);


    Excel::import(new CaseImport, $request->file('file'));

    return response()->json(['message' => 'تم استيراد البيانات بنجاح!'], 200);
});


Route::group(['middleware'=>['auth-api','userLangApi']],function(){
    Route::group(['prefix'=>'profile'],function(){
        Route::get('show',[ProfileController::class, 'show']);
        Route::put('update',[ProfileController::class,'update']);
        Route::put('changePassword',[ProfileController::class, 'changePassword']);
        Route::put('changeLang',[ProfileController::class, 'changeLang']);
        Route::post('changeImage',[ProfileController::class, 'changeImage']);
    });
    Route::get('donations',[DonationController::class, 'index']);
    Route::post('donations',[DonationController::class, 'store']);

    Route::resource('likes',LikeController::class)->except('show','edit','create','update');
    Route::get('notifications',[NotificationController::class, 'index']);

});

Route::get('locations',[HomeController::class ,'locations']);


Route::get('home',[HomeController::class ,'home']);
Route::get('filter',[HomeController::class ,'filter']);

Route::get('categories',[CategoryCaseController::class ,'index']);
Route::get('categories/{id}',[CategoryCaseController::class ,'show']);

Route::get('cases',[CaseController::class ,'index']);
Route::get('cases/{id}',[CaseController::class ,'show']);

Route::get('volunteers',[VolunteerController::class, 'index']);
Route::get('volunteers/{id}',[VolunteerController::class, 'show']);

Route::get('impacts',[ImpactController::class, 'index']);
Route::get('impacts/{id}',[ImpactController::class, 'show']);

Route::get('pages',[PageController::class, 'index']);
Route::get('pages/{id}',[PageController::class, 'show']);

Route::get('faqs',[FaqController::class, 'index']);



Route::post('firbase/sendNotification',[FireBaseController::class, 'sendNotification']);
// Route::post('firbase/sendNotification',[TestController::class, 'sendNotification']);







