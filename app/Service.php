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
<<<<<<< HEAD
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
=======

    public function users(){
        return $this->belongsToMany(User::class);
>>>>>>> 7cd21e51db3045e154517057ccb59ff96567b129
    }
}
