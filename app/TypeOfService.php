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

    public function services()
    {
    	return $this->hasMany(Service::class);
    }

    public function processOfServices()
    {
    	return $this->hasMany(ProcessOfService::class,'type_of_services_id');
    }

    public function showServices($id)
    {
        return Service::where('type_of_services_id', $id)->get();
    }
}
