<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserTypeServices
 *
 * @property int $id
 * @property int $user_id
 * @property int $type_of_service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTypeServices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTypeServices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTypeServices query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTypeServices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTypeServices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTypeServices whereTypeOfServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTypeServices whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserTypeServices whereUserId($value)
 * @mixin \Eloquent
 */
class UserTypeServices extends Model
{
    protected $table = 'user_type_services';
}
