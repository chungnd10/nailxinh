<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'web_settings';

    protected $fillable = [
        'phone_number',
        'email',
        'open_time',
        'close_time',
        'facebook'
    ];
}
