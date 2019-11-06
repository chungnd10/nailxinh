<?php

namespace App\Http\ViewComposers;

use App\Services\TypeServiceServices;
use App\Services\WebSettingServices;
use Illuminate\View\View;

class CommonComposer
{
    protected $web_setting_services;
    protected $type_services;

    public function __construct(
        WebSettingServices $web_setting_services,
        TypeServiceServices $type_services
)
    {
        $this->web_setting_services = $web_setting_services;
        $this->type_services = $type_services;
    }

    public function compose(View $view)
    {
        $view->with( 'info', $this->web_setting_services->all() );

        $view->with( 'type_services', $this->type_services->all() );
    }
}
