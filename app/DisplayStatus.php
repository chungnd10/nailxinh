<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DisplayStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DisplayStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DisplayStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DisplayStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DisplayStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DisplayStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DisplayStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DisplayStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DisplayStatus extends Model
{
    protected $table = 'display_statuses';
}
