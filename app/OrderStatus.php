<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_statuses';
}
