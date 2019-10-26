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


Route::prefix('admin')->group(function () {
    Route::get('index', 'Dashboard\DashboardController@index')->name('admin.index');

    //user
    Route::prefix('users')->group(function () {
        Route::get('', 'User\UserController@index')->name('users.index');

        Route::get('create', 'User\UserController@create')->name('users.create');
        Route::post('create', 'User\UserController@create')->name('users.store');

        Route::get('update/{id}', 'User\UserController@show')->name('users.show');
        Route::post('update/{id}', 'User\UserController@update')->name('users.update');

        Route::get('destroy/{id}', 'User\UserController@destroy')->name('users.destroy');
        Route::post('set-password/{id}', 'User\UserController@setPassword')->name('set.password');
    });

    //type of services
    Route::prefix('type-services')->group(function () {
        Route::get('', 'TypeServices\TypeServicesController@index')->name('type-services.index');

        Route::get('create', 'TypeServices\TypeServicesController@create')->name('type-services.create');
        Route::post('create', 'TypeServices\TypeServicesController@create')->name('type-services.store');

        Route::get('update/{id}', 'TypeServices\TypeServicesController@show')->name('type-services.show');
        Route::post('update/{id}', 'TypeServices\TypeServicesController@update')->name('type-services.update');

        Route::get('destroy/{id}', 'TypeServices\TypeServicesController@destroy')
            ->name('type-services.destroy');
    });

    //process type of services
    Route::prefix('process-type-services')->group(function () {
        Route::get('', 'ProcessTypeServices\ProcessTypeServicesController@index')
            ->name('process-type-services.index');

        Route::get('create', 'ProcessTypeServices\ProcessTypeServicesController@create')
            ->name('process-type-services.create');
        Route::post('create', 'ProcessTypeServices\ProcessTypeServicesController@create')
            ->name('process-type-services.store');

        Route::get('update/{id}', 'ProcessTypeServices\ProcessTypeServicesController@show')
            ->name('process-type-services.show');
        Route::post('update/{id}', 'ProcessTypeServices\ProcessTypeServicesController@update')
            ->name('process-type-services.update');

        Route::get('destroy/{id}', 'ProcessTypeServices\ProcessTypeServicesController@destroy')
            ->name('process-type-services.destroy');
    });

    //services
    Route::prefix('services')->group(function () {
        Route::get('', 'Services\ServicesController@index')->name('services.index');

        Route::get('create', 'Services\ServicesController@create')->name('services.create');
        Route::post('create', 'Services\ServicesController@create')->name('services.store');

        Route::get('update/{id}', 'Services\ServicesController@show')->name('services.show');
        Route::post('update/{id}', 'Services\ServicesController@update')->name('services.update');

        Route::get('destroy/{id}', 'Services\ServicesController@destroy')->name('services.destroy');
    });

    //bill
    Route::prefix('bill')->group(function () {
        Route::get('', 'Bill\BillController@index')->name('bill.index');

        Route::get('create', 'Bill\BillController@create')->name('bill.create');
        Route::post('create', 'Bill\BillController@create')->name('bill.store');

        Route::get('update/{id}', 'Bill\BillController@show')->name('bill.show');
        Route::post('update/{id}', 'Bill\BillController@update')->name('bill.update');

        Route::get('destroy/{id}', 'Bill\BillController@destroy')->name('bill.destroy');
    });

    //order
    Route::prefix('order')->group(function () {
        Route::get('', 'Order\OrderController@index')->name('order.index');

        Route::get('create', 'Order\OrderController@create')->name('order.create');
        Route::post('create', 'Order\OrderController@create')->name('order.store');

        Route::get('update/{id}', 'Order\OrderController@show')->name('order.show');
        Route::post('update/{id}', 'Order\OrderController@update')->name('order.update');

        Route::get('destroy/{id}', 'Order\OrderController@destroy')->name('order.destroy');
    });

    //branch
    Route::prefix('branch')->group(function () {
        Route::get('', 'Branch\BranchController@index')->name('branch.index');

        Route::get('create', 'Branch\BranchController@create')->name('branch.create');
        Route::post('create', 'Branch\BranchController@create')->name('branch.store');

        Route::get('update/{id}', 'Branch\BranchController@show')->name('branch.show');
        Route::post('update/{id}', 'Branch\BranchController@update')->name('branch.update');

        Route::get('destroy/{id}', 'Branch\BranchController@destroy')->name('branch.destroy');
    });

    //accumulate points
    Route::prefix('accumulate-points')->group(function () {
        Route::get('', 'AccumulatePoints\AccumulatePointsController@index')
            ->name('accumulate-points.index');

        Route::get('destroy/{id}', 'AccumulatePoints\AccumulatePointsController@destroy')
            ->name('accumulate-points.destroy');
    });

    //discount
    Route::prefix('discount')->group(function () {
        Route::get('', 'Discount\DiscountController@index')->name('discount.index');

        Route::get('create', 'Discount\DiscountController@create')->name('discount.create');
        Route::post('create', 'Discount\DiscountController@create')->name('discount.store');

        Route::get('update/{id}', 'Discount\DiscountController@show')->name('discount.show');
        Route::post('update/{id}', 'Discount\DiscountController@update')->name('discount.update');

        Route::get('destroy/{id}', 'Discount\DiscountController@destroy')->name('discount.destroy');
    });

    //restricted lists
    Route::prefix('restricted-lists')->group(function () {
        Route::get('', 'RestrictedLists\RestrictedListsController@index')
            ->name('restricted-lists.index');

        Route::get('destroy/{id}', 'RestrictedLists\RestrictedListsController@destroy')
            ->name('restricted-lists.destroy');
    });

    //feedback
    Route::prefix('feedback')->group(function () {
        Route::get('', 'Feedback\FeedbackController@index')->name('feedback.index');

        Route::get('update/{id}', 'Feedback\FeedbackController@show')->name('feedback.show');
        Route::post('update/{id}', 'Feedback\FeedbackController@update')->name('feedback.update');

        Route::get('destroy/{id}', 'Feedback\FeedbackController@destroy')->name('feedback.destroy');
    });

    // roles
    Route::prefix('roles')->group(function () {
        Route::get('', 'Roles\RolesController@index')->name('roles.index');

        Route::post('update/{id}', 'Roles\RolesController@update')->name('roles.update');
    });

    // web_settings
    Route::prefix('web-settings')->group(function () {
        Route::get('', 'WebSettings\WebSettingsController@index')->name('web-settings.index');

        Route::post('update/{id}', 'WebSettings\WebSettingsController@update')->name('web-settings.update');
    });

    //slides
    Route::prefix('slides')->group(function () {
        Route::get('', 'Slides\SlidesController@index')->name('slides.index');

        Route::post('update/{id}', 'Slides\SlidesController@update')->name('slides.update');
    });

    //introduction
    Route::prefix('introduction')->group(function () {
        Route::get('', 'Introduction\IntroductionController@index')->name('introduction.index');

        Route::post('update/{id}', 'Introduction\IntroductionController@update')->name('introduction.update');
    });
});
