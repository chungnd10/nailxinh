<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RestrictedList
 *
 * @property int $id
 * @property string $phone_number
 * @property string $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RestrictedList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RestrictedList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RestrictedList query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RestrictedList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RestrictedList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RestrictedList whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RestrictedList wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RestrictedList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RestrictedList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'restricted_lists';
}
