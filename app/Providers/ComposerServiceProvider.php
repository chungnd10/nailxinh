<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'client.index',
                'client.booking',
                'client.booking-test',
                'client.contact',
                'client.gallery',
                'client.introduction',
                'client.services',
                'client.service-detail',
                'admin.photo_library.index',
                'admin.photo_library.create',
                'admin.photo_library.show'

            ], 'App\Http\ViewComposers\CommonComposer'
        );
    }
}
