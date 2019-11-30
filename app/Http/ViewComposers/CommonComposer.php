<?php

namespace App\Http\ViewComposers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CommonComposer extends Controller
{

    public function compose(View $view)
    {
        $view->with( 'info', $this->web_setting_services->first() );

        $view->with( 'type_services', $this->type_services->all() );
    }
}
