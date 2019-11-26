<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BillStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BillStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BillStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BillStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BillStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BillStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BillStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BillStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BillStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bill_statuses';
}
