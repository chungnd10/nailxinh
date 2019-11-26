<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gender
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Gender whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Gender extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genders';
}
