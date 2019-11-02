<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessOfService extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'process_of_services';
    protected $fillable = [
    	'name',
    	'step',
    	'content',
    	'type_of_services_id'
    ];

    public function typeservice(){
    	return $this->belongsTo('App\TypeOfService', 'type_of_services_id', 'id');
    }
}
