<?php

namespace App;

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
    public function typeservice(){
    	return $this->belongsTo('App\TypeOfService', 'type_of_services_id', 'id');
    }
}
