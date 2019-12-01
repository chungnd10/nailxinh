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


Auth::routes(['register' => false]);
//client

Route::get('/', 'Client\ClientController@index')
    ->name('index');

Route::get('/introduction', 'Client\ClientController@introduction')
    ->name('introduction');

Route::get('/contact', 'Client\ClientController@contact')
    ->name('contact');

Route::get('/services', 'Client\ClientController@services')
    ->name('services');
Route::get('/services-detail/{slug}/{id}', 'Client\ClientController@servicesDetail')
    ->name('service-detail');

Route::get('/type-services/{slug}/{id}', 'Client\ClientController@typeServices')
    ->name('type-service');

Route::get('/booking', 'Client\ClientController@booking')
    ->name('booking');
Route::post('/booking', 'Client\ClientController@store');

Route::get('/booking-test', 'Client\ClientController@bookingTest')
    ->name('booking-test');
Route::post('/booking-test', 'Client\ClientController@bookingTestStore');

Route::get('/gallery', 'Client\ClientController@gallery')
    ->name('gallery');

Route::post('/subscribe','Client\ClientController@subscribe')
    ->name('subscribe');

Route::get('/download-excel','Subscribe\SubscribeController@downloadExcel')
    ->name('download-excel');

// end client


Route::prefix('admin')->middleware('auth')->group(function () {


    Route::get('', 'Dashboard\DashboardController@index')
        ->name('admin.index');

    //profile
    Route::get('profile/{id}', 'User\UserController@profile')
        ->name('profile');

    Route::post('profile/{id}', 'User\UserController@updateProfile')
        ->name('profile');

    Route::post('update-image-profile/{id}', 'User\UserController@updateImageProfile')
        ->name('update-image-profile');

    Route::post('change-password/{id}', 'User\UserController@changePassword')
        ->name('change-password');
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
            ->middleware('can:edit-users')
            ->name('set.password');

        Route::post('set-services/{id}', 'User\UserController@setServices')
            ->middleware('can:edit-users')
            ->name('set.services');

        Route::get('change-status', 'User\UserController@changeStatus')
            ->middleware('can:edit-users')
            ->name('users.change-status');

        Route::post('change-image-profile/{id}', 'User\UserController@changeImageProfile')
            ->name('users.change-image-profile');
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

        Route::post('get-procces-with-services',
            'ProcessTypeServices\ProcessTypeServicesController@getProcessWithTypeServices')
            ->middleware('can:add-process-of-services')
            ->name('get-procces-with-services');
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
    Route::prefix('bills')->group(function () {

        Route::get('', 'Bill\BillController@index')
            ->middleware('can:view-bills')
            ->name('bills.index');

        Route::get('show/{id}', 'Bill\BillController@show')
            ->middleware('can:print-bills')
            ->name('bills.show');

        Route::get('print/{id}', 'Bill\BillController@print')
            ->middleware('can:print-bills')
            ->name('bills.print');

        Route::get('update/{id}', 'Bill\BillController@showUpdate')
            ->middleware('can:update-bill-status')
            ->name('bills.update');

        Route::post('update/{id}', 'Bill\BillController@update')
            ->middleware('can:update-bill-status')
            ->name('bills.update');
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
            ->middleware('can:update-orders')
            ->name('orders.show');

        Route::post('update/{id}', 'Order\OrderController@update')
            ->middleware('can:update-orders')
            ->name('orders.update');

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

    //membership_type
    Route::prefix('membership_type')->group(function () {

        Route::get('', 'MembershipType\MembershipTypeController@index')
            ->middleware('can:view-membership-type')
            ->name('membership_type.index');

        Route::get('create', 'MembershipType\MembershipTypeController@create')
            ->middleware('can:add-membership-type')
            ->name('membership_type.create');

        Route::post('create', 'MembershipType\MembershipTypeController@store')
            ->middleware('can:add-membership-type')
            ->name('membership_type.store');

        Route::get('update/{id}', 'MembershipType\MembershipTypeController@show')
            ->middleware('can:edit-membership-type')
            ->name('membership_type.show');

        Route::post('update/{id}', 'MembershipType\MembershipTypeController@update')
            ->middleware('can:edit-membership-type')
            ->name('membership_type.update');

        Route::get('destroy/{id}', 'MembershipType\MembershipTypeController@destroy')
            ->middleware('can:remove-membership-type')
            ->name('membership_type.destroy');
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
    Route::prefix('feedbacks')->group(function () {

        Route::get('', 'Feedback\FeedbackController@index')
            ->middleware('can:view-feedback')
            ->name('feedbacks.index');

        Route::get('create', 'Feedback\FeedbackController@create')
            ->middleware('can:add-feedback')
            ->name('feedbacks.create');

        Route::post('create', 'Feedback\FeedbackController@store')
            ->middleware('can:add-feedback')
            ->name('feedbacks.store');

        Route::get('update/{id}', 'Feedback\FeedbackController@show')
            ->middleware('can:edit-feedback')
            ->name('feedbacks.show');

        Route::post('update/{id}', 'Feedback\FeedbackController@update')
            ->middleware('can:edit-feedback')
            ->name('feedbacks.update');

        Route::get('update-status/', 'Feedback\FeedbackController@changeStatus')
            ->middleware('can:edit-feedback')
            ->name('feedbacks.change-status');

        Route::get('destroy/{id}', 'Feedback\FeedbackController@destroy')
            ->middleware('can:remove-feedback')
            ->name('feedbacks.destroy');
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

        Route::get('', 'WebSettings\WebSettingsController@index')
            ->middleware('can:view-web-settings')
            ->name('web-settings.index');

        Route::post('update', 'WebSettings\WebSettingsController@update')
            ->middleware('can:edit-web-settings')
            ->name('web-settings.update');
    });

    //slides
    Route::prefix('slides')->group(function () {

        Route::get('', 'Slides\SlidesController@index')
            ->middleware('can:view-slide')
            ->name('slides.index');

        Route::get('create', 'Slides\SlidesController@create')
            ->middleware('can:add-slide')
            ->name('slides.create');

        Route::post('create', 'Slides\SlidesController@store')
            ->middleware('can:add-slide')
            ->name('slides.store');

        Route::get('update/{id}', 'Slides\SlidesController@show')
            ->middleware('can:edit-slide')
            ->name('slides.show');

        Route::post('update/{id}', 'Slides\SlidesController@update')
            ->middleware('can:edit-slide')
            ->name('slides.update');

        Route::get('destroy/{id}', 'Slides\SlidesController@destroy')
            ->middleware('can:remove-slide')
            ->name('slides.destroy');

        Route::get('change-status', 'Slides\SlidesController@changeStatus')
            ->middleware('can:edit-slide')
            ->name('slides.change-status');
    });

    //introductions
    Route::prefix('introductions')->group(function () {

        Route::get('', 'Introduction\IntroductionController@index')
            ->middleware('can:edit-introduction-page')
            ->name('introductions.index');

        Route::post('update', 'Introduction\IntroductionController@update')
            ->middleware('can:edit-introduction-page')
            ->name('introductions.update');
    });

    //subscribe
    Route::prefix('subscribe')->group(function () {

        Route::get('', 'Subscribe\SubscribeController@index')
            ->middleware('can:view-subscribe')
            ->name('subscribe.index');

        Route::get('destroy/{id}', 'Subscribe\SubscribeController@destroy')
            ->middleware('can:remove-subscribe')
            ->name('subscribe.destroy');

        Route::post('delete-many', 'Subscribe\SubscribeController@deleteMany')
            ->middleware('can:remove-subscribe')
            ->name('subscribe.delete-many');
    });

    //photo-library
    Route::prefix('photo-library')->group(function () {

        Route::get('', 'PhotoLibrary\PhotoLibraryController@index')
            ->middleware('can:view-photo-library')
            ->name('photo-library.index');

        Route::get('create', 'PhotoLibrary\PhotoLibraryController@create')
            ->middleware('can:add-photo-library')
            ->name('photo-library.create');

        Route::post('create', 'PhotoLibrary\PhotoLibraryController@store')
            ->middleware('can:add-photo-library')
            ->name('photo-library.create');

        Route::get('update/{photo}', 'PhotoLibrary\PhotoLibraryController@show')
            ->middleware('can:edit-photo-library')
            ->name('photo-library.show');

        Route::post('update/{photo}', 'PhotoLibrary\PhotoLibraryController@update')
            ->middleware('can:edit-photo-library')
            ->name('photo-library.update');

        Route::get('destroy/{photo}', 'PhotoLibrary\PhotoLibraryController@destroy')
            ->middleware('can:remove-photo-library')
            ->name('photo-library.destroy');

        Route::get('change-status', 'PhotoLibrary\PhotoLibraryController@changeStatus')
            ->middleware('can:edit-photo-library')
            ->name('photo-library.change-status');

        Route::post('delete-many', 'PhotoLibrary\PhotoLibraryController@deleteMany')
            ->middleware('can:remove-photo-library')
            ->name('photo-library.delete-many');

        Route::get('change-type-services', 'PhotoLibrary\PhotoLibraryController@changeTypeServices')
            ->middleware('can:view-photo-library')
            ->name('photo-library.change-type-services');

        Route::get('load-diff', 'PhotoLibrary\PhotoLibraryController@loadDiff')
            ->middleware('can:view-photo-library')
            ->name('photo-library.load-diff');

        //ajax
        Route::get('delete', 'PhotoLibrary\PhotoLibraryController@deleteAjax')
            ->middleware('can:remove-photo-library')
            ->name('photo-library.delete');
    });
});

Route::bind('id', function ($id) {
    return $id =  Hashids::decode($id)[0] ?? "";
});

