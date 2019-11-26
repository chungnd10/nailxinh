<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subscribe
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscribe whereUpdatedAt($value)
 * @mixin \Illuminate\Database\Eloquent\Collection
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Subscribe extends Model
{
    protected $table = 'subscribes';

    protected $fillable = [ 'email'];
}
