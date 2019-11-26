<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OperationStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OperationStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OperationStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'operation_statuses';
}
