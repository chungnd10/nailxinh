<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PhotoLibrary
 *
 * @property int $id
 * @property string $image
 * @property int $type_of_service_id
 * @property int $display_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\PhotoLibrary $photo_library
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereUpdatedAt($value)
 * @mixin \Illuminate\Database\Eloquent\Collection
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class PhotoLibrary extends Model
{
    protected $table = 'photo_library';

    protected $fillable = [
        'type_of_service_id',
        'display_status_id'
    ];

    public function category(){
        return $this->belongsTo(TypeOfService::class, 'type_of_service_id');
    }
}
