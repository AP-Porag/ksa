<?php

use App\Http\Controllers\Admin\About\AboutController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Entry\EntryController;
use App\Http\Controllers\Admin\Grading\GradingController;
use App\Http\Controllers\Admin\Label\LabelController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Profile\UserProfileController;
use App\Http\Controllers\Admin\Promo\PromoController;
use App\Http\Controllers\Admin\Promo\SpecialPromoController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\ThirdParty\AuthenticatorController;
use App\Http\Controllers\Admin\ThirdParty\ThirdPartyDropOffController;
use App\Http\Controllers\Admin\User\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Receiving\ReceivingController;
use Illuminate\Support\Facades\Artisan;
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
    return redirect()->route('login');
});

Route::get('/execute-command', function () {
//    return redirect()->route('login');
//    Artisan::call('storage:link');
    Artisan::call('migrate:fresh --seed');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');
    dd('All commands executed successfully');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//all routes for admin
Route::prefix('admin')->as('admin.')->group(function () {
    // USER
    Route::resource('users', UsersController::class);

    //Role
    Route::resource('roles', RoleController::class);

    // PROFILE
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.info');
    Route::post('/avatar/update', [UserProfileController::class, 'avatarUpdate'])->name('avatar.update');
    Route::put('/profile/update/{id}', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/pass/update/', [UserProfileController::class, 'updatePassword'])->name('update.password');

    //about
    Route::resource('about', AboutController::class);

    //third party drop off
    Route::resource('thirds', ThirdPartyDropOffController::class);
    Route::post('/thirds/find/if/exists', [ThirdPartyDropOffController::class,'findIfExists']);

    //authenticators
    Route::resource('authenticators', AuthenticatorController::class);
    Route::get('/authenticators/change/status/{id}', [AuthenticatorController::class,'changeStatus'])->name('authenticators.change-status');
    Route::post('/authenticators/save/status/{id}', [AuthenticatorController::class,'saveStatus'])->name('authenticators.save-status');
    Route::post('/authenticators/find/if/exists', [AuthenticatorController::class,'findIfExists']);


    //promos
    Route::resource('promos', PromoController::class);
    Route::get('/promos/makeSPC/${id}',[PromoController::class,'makeSPC'] )->name('promos.makeSPC');

    Route::resource('slpromos', SpecialPromoController::class);
    Route::get('/slpromos/makeNPC/${id}',[SpecialPromoController::class,'makeNPC'] )->name('slpromos.makeNPC');
    Route::get('/slpromos/attach/aditional/customer/${id}',[SpecialPromoController::class,'attachAditionalCustomer'] )->name('slpromos.attachAditionalCustomer');
    Route::post('/slpromos/save/aditional/customer',[SpecialPromoController::class,'saveAditionalCustomer'] )->name('slpromos.saveAditionalCustomer');

    //entries
    Route::resource('entries', EntryController::class);
    Route::get('/entries/get-customer/info/{id}',[EntryController::class,'getCustomerInfo'] )->name('entries.getCustomerInfo');
    Route::get('/entries/print/order/{id}',[EntryController::class,'printOrder'] )->name('entries.print.order');
    Route::post('/entries/add-additional/pieces',[EntryController::class,'addAdditionalPieces'] )->name('entries.addAdditional.pieces');
    Route::post('/entries/entry/item/destroy',[EntryController::class,'itemDestroy'] )->name('entries.entry.item.destroy');
    Route::post('/entries/add/new/item',[EntryController::class,'newItemAdd'] )->name('entries.add.new.item');
    Route::post('/entries/edit/new/item',[EntryController::class,'newItemEdit'] )->name('entries.edit.new.item');

    //receiving
    Route::resource('receiving', ReceivingController::class);
    Route::post('/receiving/get-order/info/byId',[ReceivingController::class,'getOrderInfo'] )->name('receiving.getOrderInfo');
    Route::get('/receiving/get-order/info/{id}',[ReceivingController::class,'getOrderInfoByID'] )->name('receiving.getOrderInfoByID');
    Route::post('/receiving/add/new/item',[ReceivingController::class,'newItemAdd'] )->name('receiving.add.new.item');
    Route::post('/receiving/edit/new/item',[ReceivingController::class,'newItemEdit'] )->name('receiving.edit.new.item');
    Route::post('/receiving/add-additional/pieces',[ReceivingController::class,'addAdditionalPieces'] )->name('receiving.addAdditional.pieces');
    Route::post('/receiving/entry/item/destroy',[ReceivingController::class,'itemDestroy'] )->name('receiving.entry.item.destroy');
    Route::get('/receiving/entry/received/{id}',[ReceivingController::class,'updateEntryToReceived'] )->name('receiving.updateEntryToReceived');
    Route::get('/receiving/entry/rec-list/{id}',[ReceivingController::class,'getEntryItemsInReceiving'] )->name('receiving.getEntryItemsInReceiving');
    Route::post('/receiving/entry/item/destroy',[ReceivingController::class,'itemDestroy'] )->name('receiving.entry.item.destroy');
    Route::post('/receiving/submit-entry/multiID/{id}',[ReceivingController::class,'updateMultiEntryID'] )->name('receiving.updateMultiEntryID');
    //receiving
    Route::resource('grading', GradingController::class);
    Route::post('/grading/get-order/info/byId',[GradingController::class,'getOrderInfo'] )->name('grading.getOrderInfo');
    Route::get('/grading/get-order/info/{id}',[GradingController::class,'getOrderInfoByID'] )->name('grading.getOrderInfoByID');
    Route::post('/grading/upgrade/to/grade/{id}',[GradingController::class,'OrderUpdateToGradedByID'] )->name('grading.OrderUpdateToGradedByID');
    Route::get('/grading/entry/grade-list/{id}',[GradingController::class,'getEntryItemsInGrading'] )->name('grading.getEntryItemsInGrading');
    Route::get('/grading/entry/graded/{id}',[GradingController::class,'updateEntryToGraded'] )->name('receiving.updateEntryToGraded');


    //label
    Route::resource('label', LabelController::class);
//    Route::get('/label/print/view',[LabelController::class,'printLabels'] )->name('label.print.view');
    Route::get('/label/print/view/{id}',[LabelController::class,'printLabels'] )->name('label.print.view');

    //customers
    Route::resource('customers', CustomerController::class);

    //products
    Route::resource('products', ProductController::class);

});

//all routes for manager
Route::prefix('manager')->as('manager.')->group(function () {

});

//all routes for HR
Route::prefix('hr')->as('hr.')->group(function () {

});

//all routes for Employee
Route::prefix('employee')->as('employee.')->group(function () {

});


