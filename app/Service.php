<?php

namespace App;

use App\Services\TypeServiceServices;
use Illuminate\Database\Eloquent\Model;

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
        'slug'
    ];
    
    public function typeService(){
    	return $this->belongsTo(TypeOfService::class,'type_of_services_id');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
