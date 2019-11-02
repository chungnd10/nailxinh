<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfService extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_of_services';
    protected $fillable = [
    	'name',
    	'slug',
    	'description'
    ];
    public function services(){
    	return $this->hasMany(Service::class);
    }
    public function processofservices(){
    	return $this->hasMany('App\ProcessOfService','type_of_services_id');
    }

}
