<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserServices
 *
 * @property int $id
 * @property int $user_id
 * @property int $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserServices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserServices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserServices query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserServices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserServices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserServices whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserServices whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserServices whereUserId($value)
 * @mixin \Eloquent
 */
class UserServices extends Model
{
    protected $table = 'user_services';

    protected $fillable =[
      'service_id',
      'user_id'
    ];
}
