<?php

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


Route::get('/', function () {
    return view('admin.index');
});

Route::get('login', 'Auth\AuthController@login')->name('login');
Route::post('login', 'Auth\AuthController@checkLogin')->name('login');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');


Route::prefix('admin')->group(function () {
    Route::get('', 'Dashboard\DashboardController@index')->name('admin.index');

    //profile
    Route::get('profile/{id}', 'User\UserController@profile')
        ->name('profile');
    Route::post('profile/{id}', 'User\UserController@updateProfile')->name('profile');
    Route::post('update-image-profile/{id}', 'User\UserController@updateImageProfile')
        ->name('update-image-profile');

    Route::post('changePassword/{id}', 'User\UserController@changePassword')->name('changePassword');
    //user
    Route::prefix('users')->group(function () {
        Route::get('', 'User\UserController@index')
            ->middleware('can:view-users')
            ->name('users.index');

        Route::get('create', 'User\UserController@create')
            ->middleware('can:add-users')
            ->name('users.create');
        Route::post('create', 'User\UserController@store')
            ->middleware('can:add-users')
            ->name('users.store');

        Route::get('update/{id}', 'User\UserController@show')
            ->middleware('can:edit-users')
            ->name('users.show');
        Route::post('update/{id}', 'User\UserController@update')
            ->middleware('can:edit-users')
            ->name('users.update');

        Route::get('destroy/{id}', 'User\UserController@destroy')
            ->middleware('can:remove-users')
            ->name('users.destroy');
        Route::post('set-password/{id}', 'User\UserController@setPassword')
            ->name('set.password');
    });

    //type of services
    Route::prefix('type-services')->group(function () {
        Route::get('', 'TypeServices\TypeServicesController@index')
            ->middleware('can:view-services')
            ->name('type-services.index');

        Route::get('create', 'TypeServices\TypeServicesController@create')
            ->middleware('can:add-services')
            ->name('type-services.create');
        Route::post('create', 'TypeServices\TypeServicesController@store')
            ->middleware('can:add-services')
            ->name('type-services.store');

        Route::get('update/{id}', 'TypeServices\TypeServicesController@show')
            ->middleware('can:edit-services')
            ->name('type-services.show');
        Route::post('update/{id}', 'TypeServices\TypeServicesController@update')
            ->middleware('can:edit-services')
            ->name('type-services.update');

        Route::get('destroy/{id}', 'TypeServices\TypeServicesController@destroy')
            ->middleware('can:remove-services')
            ->name('type-services.destroy');
    });

    //process type of services
    Route::prefix('process-type-services')->group(function () {
        Route::get('', 'ProcessTypeServices\ProcessTypeServicesController@index')
            ->middleware('can:view-process-of-services')
            ->name('process-type-services.index');

        Route::get('create', 'ProcessTypeServices\ProcessTypeServicesController@create')
            ->middleware('can:add-process-of-services')
            ->name('process-type-services.create');
        Route::post('create', 'ProcessTypeServices\ProcessTypeServicesController@store')
            ->middleware('can:add-process-of-services')
            ->name('process-type-services.store');

        Route::get('update/{id}', 'ProcessTypeServices\ProcessTypeServicesController@show')
            ->middleware('can:edit-process-of-services')
            ->name('process-type-services.show');
        Route::post('update/{id}', 'ProcessTypeServices\ProcessTypeServicesController@update')
            ->middleware('can:edit-process-of-services')
            ->name('process-type-services.update');

        Route::get('destroy/{id}', 'ProcessTypeServices\ProcessTypeServicesController@destroy')
            ->middleware('can:remove-process-of-services')
            ->name('process-type-services.destroy');
    });

    //services
    Route::prefix('services')->group(function () {
        Route::get('', 'Services\ServicesController@index')
            ->middleware('can:view-services')
            ->name('services.index');

        Route::get('create', 'Services\ServicesController@create')
            ->middleware('can:add-services')
            ->name('services.create');
        Route::post('create', 'Services\ServicesController@store')
            ->middleware('can:add-services')
            ->name('services.store');

        Route::get('update/{id}', 'Services\ServicesController@show')
            ->middleware('can:edit-services')
            ->name('services.show');
        Route::post('update/{id}', 'Services\ServicesController@update')
            ->middleware('can:edit-services')
            ->name('services.update');

        Route::get('destroy/{id}', 'Services\ServicesController@destroy')
            ->middleware('can:remove-services')
            ->name('services.destroy');
    });

    //bill
    Route::prefix('bill')->group(function () {
        Route::get('', 'Bill\BillController@index')
            ->middleware('can:view-bills')
            ->name('bill.index');

        Route::get('create', 'Bill\BillController@create')
            ->middleware('can:add-bills')
            ->name('bill.create');
        Route::post('create', 'Bill\BillController@store')
            ->middleware('can:add-bills')
            ->name('bill.store');

        Route::get('update/{id}', 'Bill\BillController@show')
            ->middleware('can:edit-bills')
            ->name('bill.show');
        Route::post('update/{id}', 'Bill\BillController@update')
            ->middleware('can:edit-bills')
            ->name('bill.update');

        Route::get('destroy/{id}', 'Bill\BillController@destroy')
            ->middleware('can:remove-bills')
            ->name('bill.destroy');
    });

    //order
    Route::prefix('orders')->group(function () {
        Route::get('', 'Order\OrderController@index')
            ->middleware('can:view-orders')
            ->name('orders.index');

        Route::get('create', 'Order\OrderController@create')
            ->middleware('can:add-orders')
            ->name('orders.create');
        Route::post('create', 'Order\OrderController@store')
            ->middleware('can:add-orders')
            ->name('orders.store');

        Route::get('update/{id}', 'Order\OrderController@show')
            ->middleware('can:edit-orders')
            ->name('orders.show');
        Route::post('update/{id}', 'Order\OrderController@update')
            ->middleware('can:edit-orders')
            ->name('orders.update');

        Route::get('destroy/{id}', 'Order\OrderController@destroy')
            ->middleware('can:remove-orders')
            ->name('orders.destroy');
    });

    //branch
    Route::prefix('branch')->group(function () {
        Route::get('', 'Branch\BranchController@index')
            ->middleware('can:view-branchs')
            ->name('branch.index');

        Route::get('create', 'Branch\BranchController@create')
            ->middleware('can:add-branchs')
            ->name('branch.create');
        Route::post('create', 'Branch\BranchController@store')
            ->middleware('can:add-branchs')
            ->name('branch.store');

        Route::get('update/{id}', 'Branch\BranchController@show')
            ->middleware('can:edit-branchs')
            ->name('branch.show');
        Route::post('update/{id}', 'Branch\BranchController@update')
            ->middleware('can:edit-branchs')
            ->name('branch.update');

        Route::get('destroy/{id}', 'Branch\BranchController@destroy')
            ->middleware('can:remove-branchs')
            ->name('branch.destroy');
    });

    //accumulate points
    Route::prefix('accumulate-points')->group(function () {
        Route::get('', 'AccumulatePoints\AccumulatePointsController@index')
            ->middleware('can:view-accumulate-points')
            ->name('accumulate-points.index');

        Route::get('destroy/{id}', 'AccumulatePoints\AccumulatePointsController@destroy')
            ->middleware('can:remove-accumulate-points')
            ->name('accumulate-points.destroy');
    });

    //discount
    Route::prefix('discount')->group(function () {
        Route::get('', 'Discount\DiscountController@index')
            ->middleware('view-discount')
            ->name('discount.index');

        Route::get('create', 'Discount\DiscountController@create')
            ->middleware('can:add-discount')
            ->name('discount.create');
        Route::post('create', 'Discount\DiscountController@store')
            ->middleware('can:add-discount')
            ->name('discount.store');

        Route::get('update/{id}', 'Discount\DiscountController@show')
            ->middleware('can:edit-discount')
            ->name('discount.show');
        Route::post('update/{id}', 'Discount\DiscountController@update')
            ->middleware('can:edit-discount')
            ->name('discount.update');

        Route::get('destroy/{id}', 'Discount\DiscountController@destroy')
            ->middleware('can:remove-discount')
            ->name('discount.destroy');
    });

    //restricted lists
    Route::prefix('restricted-lists')->group(function () {
        Route::get('', 'RestrictedLists\RestrictedListsController@index')
            ->middleware('can:view-restricted-lists')
            ->name('restricted-lists.index');

        Route::get('destroy/{id}', 'RestrictedLists\RestrictedListsController@destroy')
            ->middleware('can:remove-restricted-lists')
            ->name('restricted-lists.destroy');
    });

    //feedback
    Route::prefix('feedback')->group(function () {
        Route::get('', 'Feedback\FeedbackController@index')
            ->middleware('can:view-feedback')
            ->name('feedback.index');

        Route::get('update/{id}', 'Feedback\FeedbackController@show')
            ->middleware('can:edit-feedback')
            ->name('feedback.show');
        Route::post('update/{id}', 'Feedback\FeedbackController@update')
            ->middleware('can:edit-feedback')
            ->name('feedback.update');

        Route::get('destroy/{id}', 'Feedback\FeedbackController@destroy')
            ->middleware('can:remove-feedback')
            ->name('feedback.destroy');
    });

    // roles
    Route::prefix('roles')->group(function () {
        Route::get('', 'Roles\RolesController@index')
            ->middleware('can:view-roles')
            ->name('roles.index');

        Route::post('update/{id}', 'Roles\RolesController@update')
            ->middleware('can:edit-roles')
            ->name('roles.update');
    });

    // web_settings
    Route::prefix('web-settings')->group(function () {
        Route::get('{id}', 'WebSettings\WebSettingsController@index')
            ->middleware('can:view-web-settings')
            ->name('web-settings.index');

        Route::post('update/{id}', 'WebSettings\WebSettingsController@update')
            ->middleware('can:edit-web-settings')
            ->name('web-settings.update');
    });

    //slides
    Route::prefix('slides')->group(function () {
        Route::get('', 'Slides\SlidesController@index')
            ->middleware('can:view-slide')
            ->name('slides.index');

        Route::post('update/{id}', 'Slides\SlidesController@update')
            ->middleware('can:edit-slide')
            ->name('slides.update');
    });

    //introduction
    Route::prefix('introduction')->group(function () {
        Route::get('', 'Introduction\IntroductionController@index')
            ->middleware('can:view-introduction-page')
            ->name('introduction.index');

        Route::post('update/{id}', 'Introduction\IntroductionController@update')
            ->middleware('can:edit-introduction-page')
            ->name('introduction.update');
    });
});
