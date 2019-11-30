<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\WebSetting
 *
 * @property int $id
 * @property string $open_time
 * @property string $close_time
 * @property string $address
 * @property string $introduction
 * @property string|null $facebook
 * @property string $phone_number
 * @property string $email
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereCloseTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereIntroduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereOpenTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\WebSetting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        'facebook',
        'address',
        'introduction'
    ];
}
