<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\CaseController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ItemController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\DonerController;
use App\Http\Controllers\Dashboard\ImpactController;
use App\Http\Controllers\Dashboard\RegionController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\StorageController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DonationController;
use App\Http\Controllers\Dashboard\PurchaseController;
use App\Http\Controllers\Dashboard\TransferController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\VolunteerController;
use App\Http\Controllers\Dashboard\CategoryCaseController;
use App\Http\Controllers\Dashboard\NotificationController;




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

Route::get('test',function(){
    if (php_sapi_name() === 'cli') {
        die('This script should not be run from the command line.');
    }

    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');

    return "Cache cleared successfully";
});





Route::get('/', function () {
    if(Auth::user()){
        return redirect()->route('admin');
    }
    return view('auth.login');
})->name("auth");

Auth::routes([
    'register'=>false
]);

Route::get('/a',function(){
    return "wjshdf";
});







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change/lang',[MainController::class, 'lang'])->name('change.lang');
Route::get('/change/theme',[MainController::class, 'theme'])->name('change.theme');
Route::get('dashboard/users/export', [CaseController::class, 'export'])->name('cases.export');
// Route::post('dashboard/users/import', [CaseController::class, 'import'])->name('cases.import');



Route::group(['prefix'=>'dashboard','middleware' => ['auth','is_admin', 'setUserLocale' ]], function(){
    Route::get('/clear-cache',[MainController::class,'clearCache'])->name('clear.cache');

    Route::get('/',[DashboardController::class, 'index'])->name('admin');
    //roles
    Route::resource('roles',RoleController::class)->except('show');
    //amdin
    Route::resource('admins',AdminController::class)->except('show');
    //volunteer
    Route::resource('volunteers',VolunteerController::class);
    //doner
    Route::resource('doners',DonerController::class);
    Route::get('profile/security/{id}', [DonerController::class, 'security'])->name('doners.security');
    Route::post('profile/security/updatePassword/{id}', [DonerController::class, 'updatePassword'])->name("changePass");
        //category
    Route::resource('categories',CategoryController::class)->except('show');
    Route::get('categories/toggle/{category}',[CategoryController::class,'toggle'])->name('categories.toggle');
    //category cases
    Route::resource('categoriesCases',CategoryCaseController::class)->except('show');
    Route::get('categoriesCases/toggle/{category}',[CategoryCaseController::class,'toggle'])->name('categoriesCases.toggle');
    //item
    Route::resource('items',ItemController::class)->except('show');
    Route::get('items/toggle/{item}',[ItemController::class,'toggle'])->name('items.toggle');
    //case
    Route::resource('cases',CaseController::class)->except('destroy');
    Route::get('cases/toggle/{case}',[CaseController::class,'toggle'])->name('cases.toggle');
    Route::get('cases/recycle/{case}',[CaseController::class,'recycle'])->name('cases.recycle');
    Route::get('cases/archive/{case}',[CaseController::class,'archive'])->name('cases.archive');
    Route::get('cases/remove-from-archive/{case}',[CaseController::class,'RemoveFromArchive'])->name('cases.RemoveFromArchive');
    Route::get('cases/tranfer/{case}',[CaseController::class,'transfer'])->name('cases.transfer');
    Route::post('cases/import', [CaseController::class, 'import'])->name('cases.import');


    //donation
    Route::resource('donations',DonationController::class);
    Route::post('donations/confirm/{donation}',[DonationController::class,'confirm'])->name('donations.confirm');

    Route::resource('purchases',PurchaseController::class)->except('delete','show');


    Route::resource('transfers',TransferController::class);
    Route::resource('payments',PaymentController::class)->except('show');
    Route::get('storage',[StorageController::class,'show'])->name('storage.info');



    Route::resource('profile', ProfileController::class)->except('create','store','edit','show');
    Route::get('profile/security', [ProfileController::class, 'security'])->name('profile.security');
    Route::post('profile/security/updatePassword', [ProfileController::class, 'updatePassword']);
    Route::resource('settings', SettingController::class)->except('index','show','destroy','create');

    Route::resource('regions',RegionController::class);
    Route::resource('cities',CityController::class);
    Route::get('translations', [Barryvdh\TranslationManager\Controller::class, 'getIndex'])->name('translations');


    Route::resource("sliders",SliderController::class)->except("show");
    Route::get('sliders/toggle/{slider}',[SliderController::class,'toggle'])->name('sliders.toggle');
    Route::get('sliders/trash',[SliderController::class,'deleted'])->name('sliders.deleted');
    Route::get('sliders/{slider}/restore', [SliderController::class, 'restore'])->name('sliders.restore');

    Route::resource("impacts",ImpactController::class)->except("show");
    Route::get('impacts/toggle/{impact}',[ImpactController::class,'toggle'])->name('impacts.toggle');
    Route::get('impacts/trash',[ImpactController::class,'deleted'])->name('impacts.deleted');
    Route::post('impacts/{impact}/restore', [ImpactController::class, 'restore'])->name('impacts.restore');

    Route::resource("pages",PageController::class)->except("show");
    Route::get('pages/toggle/{page}',[PageController::class,'toggle'])->name('pages.toggle');
    Route::get('pages/trash',[PageController::class,'deleted'])->name('pages.deleted');
    Route::post('pages/{page}/restore', [PageController::class, 'restore'])->name('pages.restore');

    Route::resource("messages", MessageController::class);
    Route::post("messages/send/{id}", [MessageController::class, "sendMessage"])->name("messages.sendMessage");

    Route::resource("faqs",FaqController::class)->except('show');
    Route::get('faqs/toggle/{faq}',[FaqController::class,'toggle'])->name('faqs.toggle');
    Route::get('faqs/trash',[FaqController::class,'deleted'])->name('faqs.deleted');
    Route::post('faqs/{faq}/restore', [FaqController::class, 'restore'])->name('faqs.restore');

    Route::resource("notifications",NotificationController::class)->except("show");
    Route::put("notifications/{notification}/makeAsRead",[NotificationController::class,'makeAsRead'])->name('notifications.markAsRead');


});


