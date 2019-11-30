<?php

namespace App;

use App\Services\TypeServiceServices;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Service
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string|null $description
 * @property float $price
 * @property string $completion_time
 * @property string $slug
 * @property int $type_of_services_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\TypeOfService $typeService
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCompletionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereTypeOfServicesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';

    protected $fillable =[
    	'name',
    	'description',
    	'price',
    	'completion_time',
    	'type_of_services_id',
    ];
    
    public function typeService(){
    	return $this->belongsTo(TypeOfService::class,'type_of_services_id');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
