<?php

use App\Http\Controllers\AdminCausesController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\RazorpayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEventsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\FundUsersController;
use App\Http\Controllers\AdminFundUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CauseController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CityController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [HomeController::class, 'login']);

Route::group(['prefix' => 'fund', 'as' => 'fund-'], function () {
    Route::post('/users-login', [FundUsersController::class, 'login'])->name('users-login');
    Route::post('/users-otp-verify', [FundUsersController::class, 'verify'])->name('users-otp-verify');
    Route::get('/users-create', [FundUsersController::class, 'create'])->name('users-create');
    Route::post('/users-store', [FundUsersController::class, 'store'])->name('users-store');
});

// Fundraise from frontend user
Route::group(['prefix' => 'cause', 'as' => 'cause-'], function () {
    Route::get('/causes', [CauseController::class, 'index'])->name('causes');
    Route::get('/create', [CauseController::class, 'create'])->name('create');
    Route::post('/add', [CauseController::class, 'store'])->name('add');
});
Route::get('cause-details/{token}', [CauseController::class, 'show'])->name('cause-details');
Route::get('get-cause-subcat', [FrontendController::class, 'getcauseSubcat']);

// Fundraise from frontend user

Route::group(['prefix' => 'events', 'as' => 'events-'], function () {
    Route::get('/list', [EventsController::class, 'index'])->name('list');
});


Route::get('signout', function () {
    session()->forget('fund_user_id');
    session()->flush();
    return redirect('/');
})->name('signout');

Route::get('/home', [FrontendController::class, 'home'])->name('home');
 Route::get('/causes', [FrontendController::class, 'causes'])->name('causes');
 Route::get('/causes_details', [FrontendController::class, 'causes_details'])->name('causes_details');
Route::get('/events', [FrontendController::class, 'events'])->name('events');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/about', [FrontendController::class, 'about'])->name('about');






// blood doner
Route::get('/blood_doner-add', [FrontendController::class, 'blood_doner_add'])->name('blood_doner_add');
Route::get('/blood_doner-edit', [FrontendController::class, 'blood_doner_edit'])->name('blood_doner_edit');
Route::get('/blood_doner-manage', [FrontendController::class, 'blood_doner_manage'])->name('blood_doner_manage');
Route::get('/blood_doner-view', [FrontendController::class, 'blood_doner_view'])->name('blood_doner_view');




// fund doner
Route::get('/fund_doner-add', [FrontendController::class, 'fund_doner_add'])->name('fund_doner_add');
Route::get('/fund_doner-edit', [FrontendController::class, 'fund_doner_edit'])->name('fund_doner_edit');
Route::get('/fund_doner-manage', [FrontendController::class, 'fund_doner_manage'])->name('fund_doner_manage');
Route::get('/fund_doner-view', [FrontendController::class, 'fund_doner_view'])->name('fund_doner_view');



// fund raiser category
//Route::get('/fund_raisers-add', [FrontendController::class, 'fund_raisers_add'])->name('fund_raisers_add');
//Route::get('/fund_raisers-edit', [FrontendController::class, 'fund_raisers_edit'])->name('fund_raisers_edit');
//Route::get('/fund_raisers-manage', [FrontendController::class, 'fund_raisers_manage'])->name('fund_raisers_manage');
//Route::get('/fund_raisers-view', [FrontendController::class, 'fund_raisers_view'])->name('fund_raisers_view');




// hospital raisers
Route::get('/hospital_raisers-add', [FrontendController::class, 'hospital_raisers_add'])->name('hospital_raisers_add');
Route::get('/hospital_raisers-edit', [FrontendController::class, 'hospital_raisers_edit'])->name('hospital_raisers_edit');
Route::get('/hospital_raisers-manage', [FrontendController::class, 'hospital_raisers_manage'])->name('hospital_raisers_manage');
Route::get('/hospital_raisers-view', [FrontendController::class, 'hospital_raisers_view'])->name('hospital_raisers_view');





// my fundraisers
Route::get('/my_fundraisers-add', [FrontendController::class, 'my_fundraisers_add'])->name('my_fundraisers_add');
Route::get('/my_fundraisers-edit', [FrontendController::class, 'my_fundraisers_edit'])->name('my_fundraisers_edit');
Route::get('/my_fundraisers-manage', [FrontendController::class, 'my_fundraisers_manage'])->name('my_fundraisers_manage');
Route::get('/my_fundraisers-view', [FrontendController::class, 'my_fundraisers_view'])->name('my_fundraisers_view');

// settings
Route::get('/settings-add', [FrontendController::class, 'settings_add'])->name('settings_add');
Route::get('/settings-edit', [FrontendController::class, 'settings_edit'])->name('settings_edit');
Route::get('/settings-manage', [FrontendController::class, 'settings_manage'])->name('settings_manage');
Route::get('/settings-view', [FrontendController::class, 'settings_view'])->name('settings_view');
Route::get('/settings-marque', [FrontendController::class, 'settings_marque'])->name('settings_marque');
Route::get('/settings-footer', [FrontendController::class, 'settings_footer'])->name('settings_footer');

// sips
Route::get('/sip-add', [FrontendController::class, 'sip_add'])->name('sip_add');
Route::get('/sip-edit', [FrontendController::class, 'sip_edit'])->name('sip_edit');
Route::get('/sip-manage', [FrontendController::class, 'sip_manage'])->name('sip_manage');
Route::get('/sip-view', [FrontendController::class, 'sip_view'])->name('sip_view');

//Admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin-login');
Route::post('/admin/login-verify', [AdminController::class, 'loginVerify'])->name('admin-login-verify');

Route::group(['prefix' => 'admin', 'as' => 'admin-'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/changeFundraiserStatus', [AdminCausesController::class, 'changeFundraiserStatus'])->name('changeFundraiserStatus');
    Route::get('/fund-users', [AdminFundUserController::class, 'index'])->name('fund-users');
    Route::get('/donors-lists', [AdminFundUserController::class, 'donors_list'])->name('donors-list');

    Route::group(['prefix' => 'cause-category', 'as' => 'cause-category-'], function () {
        Route::get('/list', [CategoryController::class, 'index'])->name('list');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/add', [CategoryController::class, 'store'])->name('add');
        Route::get('/edit/{token}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{token}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{token}', [CategoryController::class, 'delete'])->name('delete');
    });



    Route::group(['prefix' => 'cause-sub-category', 'as' => 'cause-sub-category-'], function () {
        Route::get('/list', [SubCategoryController::class, 'index'])->name('list');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('create');
        Route::post('/add', [SubCategoryController::class, 'store'])->name('add');
        Route::get('/edit/{token}', [SubCategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{token}', [SubCategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{token}', [SubCategoryController::class, 'delete'])->name('delete');
    });


    Route::group(['prefix' => 'fundraiser', 'as' => 'fundraiser-'], function () {
        Route::get('/list', [AdminCausesController::class, 'index'])->name('list');
        Route::get('/details/{token}', [AdminCausesController::class, 'show'])->name('details');
    });

    Route::group(['prefix' => 'events', 'as' => 'events-'], function () {
        Route::get('/list', [AdminEventsController::class, 'index'])->name('list');
        Route::get('/create', [AdminEventsController::class, 'create'])->name('create');
        Route::post('/add', [AdminEventsController::class, 'store'])->name('add');
        Route::get('/edit/{token}', [AdminEventsController::class, 'edit'])->name('edit');
        Route::post('/update/{token}', [AdminEventsController::class, 'update'])->name('update');
        Route::delete('/delete/{token}', [AdminEventsController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings-'], function () {
        Route::get('/header-banner', [SettingsController::class, 'headerBanner'])->name('header-banner');
        Route::get('/slider_create', [SettingsController::class, 'slider_create'])->name('slider_create');
        Route::post('/header-banner-create', [SettingsController::class, 'headerBannerSave'])->name('header-banner-create');
        Route::get('banner-delete/{id}', [SettingsController::class, 'deleteBannner']);
    });


    Route::group(['prefix' => 'city', 'as' => 'city-'], function () {
        Route::get('/list', [CityController::class, 'index'])->name('list');
        Route::get('/create', [CityController::class, 'create'])->name('create');
        Route::post('/add', [CityController::class, 'store'])->name('add');
        Route::get('/edit/{token}', [CityController::class, 'edit'])->name('edit');
        Route::put('/update/{token}', [CityController::class, 'update'])->name('update');
        Route::delete('/delete/{token}', [CityController::class, 'delete'])->name('delete');
    });

    // hospitals
    Route::get('/hospitals-add', [FrontendController::class, 'hospitals_add'])->name('hospitals_add');
    Route::post('/hospitals-save', [FrontendController::class, 'hospitals_save'])->name('hospitals_save');
    Route::get('/hospitals-edit/{id}', [FrontendController::class, 'hospitals_edit'])->name('hospitals_edit');
    Route::get('/hospitals-manage', [FrontendController::class, 'hospitals_manage'])->name('hospitals_manage');
    Route::get('/hospitals-view', [FrontendController::class, 'hospitals_view'])->name('hospitals_view');
    Route::post('/update-hospital', [FrontendController::class, 'hospitals_update'])->name('hospitals_update');

    Route::get('/states', [SettingsController::class, 'headerBanner'])->name('states');
    Route::get('/delete-fundraiser-row', [AdminCausesController::class, 'delete_fundraiser_row']);

    Route::get('/blood-requirement-list', [HospitalController::class, 'all_requirement_list']);
    Route::get('hospital/{hospital_id}/requirement/edit/{id}', [HospitalController::class, 'admin_blood_requirement_edit']);
    Route::post('hospital/requirement/update', [HospitalController::class, 'admin_blood_requirement_update']);
    Route::get('/hospitals-details-view/{id}', [HospitalController::class, 'hospitals_details']);


});

Route::post('razorpay', [RazorpayController::class, 'razorpay'])->name('razorpay');
//Route::post('razorpay', [RazorpayController::class, 'razorpay'])->name('razorpay');
Route::post('razorpaypayment', [RazorpayController::class, 'payment'])->name('payment');
Route::get('payment-response', [RazorpayController::class, 'payment_response']);

//Route::get('razorpay-success', [RazorpayController::class, 'razorpay'])->name('razorpay');
Route::get('deleteFromGallery', [DashboardController::class, 'deleteFromGallery']);
Route::get('admin/dashboard/headerhomeSlider',[SettingsController::class,'sliders']);
Route::get('admin/dashboard/header-home-slider-Create',[SettingsController::class,'slider_create']);
Route::post('admin/dashboard/header-home-slider-save',[SettingsController::class,'slider_save']);
Route::get('admin/dashboard/header-home-slider-edit/{id}',[SettingsController::class,'slider_edit']);
Route::post('admin/dashboard/header-home-slider-update',[SettingsController::class,'slider_update']);

Route::group(['prefix' => 'users/', 'as' => 'users-'], function () {
    Route::get('dashboard/{url}', [DashboardController::class, 'dashboard']);
    Route::get('/fundraiser/{id}', [DashboardController::class, 'getlistFundraiser']);
    Route::get('/edit-fundraiser/{id}/{url}', [DashboardController::class, 'getFundraiser']);
    Route::post('/edit-fundraiser', [DashboardController::class, 'edit']);
    Route::get('/view-all-donors/{id}', [DashboardController::class, 'viewalldonars']);
    Route::get('/donated/{id}', [DashboardController::class, 'getDonatedList']);
    Route::get('/view-fundraiser/{id}', [DashboardController::class, 'view_fundraiser']);
    Route::get('/profile/{id}', [DashboardController::class, 'profile']);

});



Route::group(['prefix' => 'hospital/', 'as' => 'hospital-'], function () {
    Route::get('login', [HospitalController::class, 'login']);
    Route::post('login-verify', [HospitalController::class, 'loginVerify']);
    Route::get('/', [HospitalController::class, 'index']);
    Route::get('dashboard/{url}', [HospitalController::class, 'dashboard']);
    Route::get('{id}/requirement/list', [HospitalController::class, 'requirement_list']);
    Route::get('{id}/requirement/create', [HospitalController::class, 'requirement_create']);
    Route::post('/requirement/save', [HospitalController::class, 'requirement_save']);
    Route::get('{hospital_id}/requirement/edit/{id}', [HospitalController::class, 'requirement_edit']);
    Route::get('{hospital_id}/requirement/view/{id}', [HospitalController::class, 'requirement_view']);
    Route::post('/requirement/update', [HospitalController::class, 'requirement_update']);
    Route::get('{hospital_id}/requirement/delete/{id}', [HospitalController::class, 'requirement_delete']);


});
Route::get('search-by',[DashboardController::class,'search_by']);
Route::get('search-by-city',[DashboardController::class,'search_by_city']);
Route::get('/qrcode', [QrCodeController::class, 'index']);
